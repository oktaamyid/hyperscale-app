<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('pages.checkout');
    }

    public function process(Request $request)
    {
        // Validate and store checkout data in session
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'project_name' => 'required|string|max:255',
            'plan' => 'required|in:pemula,menengah,sepuh',
            'billing' => 'required|in:monthly,yearly',
        ]);

        // Store in session for payment page
        session([
            'checkout.customer' => [
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'company' => $validated['company'] ?? null,
                'project_name' => $validated['project_name'],
            ],
            'checkout.plan' => $validated['plan'],
            'checkout.billing' => $validated['billing'],
        ]);

        return redirect()->route('payment');
    }
}
