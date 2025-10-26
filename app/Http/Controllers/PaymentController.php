<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function index()
    {
        // Check if checkout data exists
        if (!session()->has('checkout.customer')) {
            return redirect()->route('portal')->with('error', 'Silakan pilih paket terlebih dahulu');
        }
        
        return view('pages.payment');
    }

    public function process(Request $request)
    {
        $validated = $request->validate([
            'payment_method' => 'required|string',
            'order_id' => 'required|string',
        ]);

        // Get customer info from session
        $customer = session('checkout.customer');
        $plan = session('checkout.plan', 'pemula');
        $billing = session('checkout.billing', 'monthly');
        
        // Check if customer data exists
        if (!$customer) {
            return response()->json([
                'success' => false,
                'message' => 'Session expired. Silakan mulai dari awal.'
            ], 400);
        }

        // Calculate amount
        $plans = [
            'pemula' => ['monthly' => 20000, 'yearly' => 840000],
            'menengah' => ['monthly' => 50000, 'yearly' => 276000],
            'sepuh' => ['monthly' => 99000, 'yearly' => 948000]
        ];

        $amount = $plans[$plan][$billing] ?? 9000;
        $planNames = ['pemula' => 'Pemula', 'menengah' => 'Menengah', 'sepuh' => 'Sepuh'];
        
        // Check if payment with this order_id already exists and was successful
        $existingPayment = Payment::where('order_id', $validated['order_id'])
                                  ->where('status', 'success')
                                  ->first();
        
        if ($existingPayment && $existingPayment->payment_url) {
            // Return existing payment data
            return response()->json([
                'success' => true,
                'message' => 'Pembayaran sudah diproses sebelumnya.',
                'data' => [
                    'transactionId' => $existingPayment->tako_response['result']['transactionId'] ?? null,
                    'paymentUrl' => $existingPayment->payment_url,
                    'qrCodeUrl' => $existingPayment->qr_code_url,
                ]
            ]);
        }

        // Create payment record
        $payment = Payment::create([
            'order_id' => $validated['order_id'],
            'customer_name' => $customer['first_name'] . ' ' . $customer['last_name'],
            'customer_email' => $customer['email'],
            'customer_phone' => $customer['phone'],
            'plan' => $plan,
            'billing' => $billing,
            'amount' => $amount,
            'payment_method' => $validated['payment_method'],
            'status' => 'pending',
        ]);
        
        // Prepare payment data for Tako.id API
        $paymentData = [
            'name' => $customer['first_name'] . ' ' . $customer['last_name'],
            'email' => $customer['email'], // Required field
            'amount' => $amount,
            'message' => 'HS: ' . $validated['order_id'] . ' - ' . $planNames[$plan] . ' Plan',
            'paymentMethod' => $validated['payment_method']
        ];

        try {
            // Call Tako.id API
            $token = env('TAKO_API_TOKEN');
            
            Log::info('Payment Request Data:', $paymentData);
            
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ])->post('https://tako.id/api/gift/rafaar', $paymentData);

            Log::info('Tako API Response:', [
                'status' => $response->status(),
                'body' => $response->json()
            ]);

            // Tako.id returns 206 (Partial Content) for successful payment requests
            if ($response->status() === 206 || $response->successful()) {
                $responseData = $response->json();
                
                // Extract result from nested structure (Tako.id wraps data in 'result' field)
                $result = $responseData['result'] ?? $responseData;
                
                // Update payment record with response
                $payment->update([
                    'status' => 'success',
                    'payment_url' => $result['paymentUrl'] ?? $result['payment_url'] ?? null,
                    'qr_code_url' => $result['qrCodeUrl'] ?? $result['qr_code_url'] ?? null,
                    'tako_response' => $responseData,
                    'paid_at' => now(),
                ]);
                
                // DON'T clear session yet - let user retry if needed
                // session()->forget(['checkout.customer', 'checkout.plan', 'checkout.billing']);
                
                return response()->json([
                    'success' => true,
                    'message' => 'Pembayaran berhasil diproses!',
                    'data' => [
                        'transactionId' => $result['transactionId'] ?? null,
                        'paymentUrl' => $result['paymentUrl'] ?? $result['payment_url'] ?? null,
                        'qrCodeUrl' => $result['qrCodeUrl'] ?? $result['qr_code_url'] ?? null,
                    ]
                ]);
            } else {
                $errorData = $response->json();
                
                // Update payment status to failed
                $payment->update([
                    'status' => 'failed',
                    'tako_response' => $errorData,
                ]);
                
                return response()->json([
                    'success' => false,
                    'message' => $errorData['error']['message'] ?? 'Pembayaran gagal',
                    'error_details' => $errorData
                ], 400);
            }
        } catch (\Exception $e) {
            // Update payment status to failed
            $payment->update([
                'status' => 'failed',
            ]);
            
            Log::error('Payment Error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
