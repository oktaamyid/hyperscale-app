@extends('layouts.app')

@section('title', 'Payment - Selesaikan Pembayaran')
@section('description', 'Selesaikan pembayaran untuk mengaktifkan layanan HyperScale')

@section('content')
<section class="py-32 bg-gray-50 min-h-screen" x-data="paymentForm()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Progress Steps -->
        <div class="mb-12">
            <div class="flex items-center justify-center">
                <div class="flex items-center gap-4">
                    <div class="flex items-center text-primary-600 relative">
                        <div class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-primary-600 bg-primary-600 flex items-center justify-center">
                            <i class="fas fa-check text-white"></i>
                        </div>
                        <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium text-primary-600">Pilih Paket</div>
                    </div>
                    <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-primary-600"></div>
                    <div class="flex items-center text-primary-600 relative">
                        <div class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-primary-600 bg-primary-600 flex items-center justify-center">
                            <i class="fas fa-check text-white"></i>
                        </div>
                        <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium text-primary-600">Informasi</div>
                    </div>
                    <div class="flex-auto border-t-2 transition duration-500 ease-in-out border-primary-600"></div>
                    <div class="flex items-center text-white relative">
                        <div class="rounded-full transition duration-500 ease-in-out h-12 w-12 py-3 border-2 border-primary-600 bg-primary-600 flex items-center justify-center">
                            <span class="text-white font-bold">3</span>
                        </div>
                        <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium text-primary-600">Pembayaran</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Payment Form Section -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Metode Pembayaran</h1>
                    <p class="text-gray-600 mb-8">Pilih metode pembayaran yang Anda inginkan</p>

                    <form @submit.prevent="submitPayment" class="space-y-6">
                        @csrf

                        <!-- Payment Method Selection -->
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-credit-card mr-3 text-primary-600"></i>
                                Pilih Metode Pembayaran
                            </h2>

                            <div class="grid md:grid-cols-2 gap-4">
                                <!-- QRIS (Default & Recommended) -->
                                <div @click="paymentMethod = 'qris'" 
                                     :class="paymentMethod === 'qris' ? 'border-primary-600 bg-primary-50' : 'border-gray-200'"
                                     class="border-2 rounded-xl p-4 cursor-pointer hover:border-primary-300 transition-all relative">
                                    <div class="absolute -top-2 -right-2 bg-green-500 text-white text-xs px-2 py-1 rounded-full font-bold">
                                        Tercepat
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-qrcode text-2xl text-primary-600"></i>
                                            <div>
                                                <h3 class="font-bold text-gray-900">QRIS</h3>
                                                <p class="text-xs text-gray-500">Scan & Pay Instantly</p>
                                            </div>
                                        </div>
                                        <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center"
                                             :class="paymentMethod === 'qris' ? 'border-primary-600' : 'border-gray-300'">
                                            <div x-show="paymentMethod === 'qris'" 
                                                 class="w-3 h-3 bg-primary-600 rounded-full"></div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <!-- Credit Card -->
                                <div @click="paymentMethod = 'credit_card'" 
                                     :class="paymentMethod === 'credit_card' ? 'border-primary-600 bg-primary-50' : 'border-gray-200'"
                                     class="border-2 rounded-xl p-4 cursor-pointer hover:border-primary-300 transition-all">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-credit-card text-2xl text-gray-700"></i>
                                            <div>
                                                <h3 class="font-bold text-gray-900">Kartu Kredit/Debit</h3>
                                                <p class="text-xs text-gray-500">Visa, Mastercard, AMEX</p>
                                            </div>
                                        </div>
                                        <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center"
                                             :class="paymentMethod === 'credit_card' ? 'border-primary-600' : 'border-gray-300'">
                                            <div x-show="paymentMethod === 'credit_card'" 
                                                 class="w-3 h-3 bg-primary-600 rounded-full"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- PayPal -->
                                <div @click="paymentMethod = 'paypal'" 
                                     :class="paymentMethod === 'paypal' ? 'border-primary-600 bg-primary-50' : 'border-gray-200'"
                                     class="border-2 rounded-xl p-4 cursor-pointer hover:border-primary-300 transition-all">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <i class="fab fa-paypal text-2xl text-blue-600"></i>
                                            <div>
                                                <h3 class="font-bold text-gray-900">PayPal</h3>
                                                <p class="text-xs text-gray-500">Pembayaran aman</p>
                                            </div>
                                        </div>
                                        <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center"
                                             :class="paymentMethod === 'paypal' ? 'border-primary-600' : 'border-gray-300'">
                                            <div x-show="paymentMethod === 'paypal'" 
                                                 class="w-3 h-3 bg-primary-600 rounded-full"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Bank Transfer -->
                                <div @click="paymentMethod = 'bank_transfer'" 
                                     :class="paymentMethod === 'bank_transfer' ? 'border-primary-600 bg-primary-50' : 'border-gray-200'"
                                     class="border-2 rounded-xl p-4 cursor-pointer hover:border-primary-300 transition-all">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-university text-2xl text-gray-700"></i>
                                            <div>
                                                <h3 class="font-bold text-gray-900">Transfer Bank</h3>
                                                <p class="text-xs text-gray-500">BCA, Mandiri, BNI</p>
                                            </div>
                                        </div>
                                        <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center"
                                             :class="paymentMethod === 'bank_transfer' ? 'border-primary-600' : 'border-gray-300'">
                                            <div x-show="paymentMethod === 'bank_transfer'" 
                                                 class="w-3 h-3 bg-primary-600 rounded-full"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- E-Wallet -->
                                <div @click="paymentMethod = 'e_wallet'" 
                                     :class="paymentMethod === 'e_wallet' ? 'border-primary-600 bg-primary-50' : 'border-gray-200'"
                                     class="border-2 rounded-xl p-4 cursor-pointer hover:border-primary-300 transition-all">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <i class="fas fa-wallet text-2xl text-gray-700"></i>
                                            <div>
                                                <h3 class="font-bold text-gray-900">E-Wallet</h3>
                                                <p class="text-xs text-gray-500">GoPay, OVO, DANA</p>
                                            </div>
                                        </div>
                                        <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center"
                                             :class="paymentMethod === 'e_wallet' ? 'border-primary-600' : 'border-gray-300'">
                                            <div x-show="paymentMethod === 'e_wallet'" 
                                                 class="w-3 h-3 bg-primary-600 rounded-full"></div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                        <!-- QRIS Payment -->
                        <div x-show="paymentMethod === 'qris'" 
                             x-transition
                             class="border-t border-gray-200 pt-6">
                            <div class="bg-gradient-to-br from-primary-50 to-blue-50 border border-primary-200 rounded-xl p-6 text-center">
                                <div class="flex justify-center mb-4">
                                    <div class="bg-white p-4 rounded-xl shadow-lg">
                                        <i class="fas fa-qrcode text-6xl text-primary-600"></i>
                                    </div>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Pembayaran QRIS</h3>
                                <p class="text-sm text-gray-600 mb-4">
                                    Setelah klik "Bayar Sekarang", Anda akan menerima QR code untuk pembayaran melalui aplikasi e-wallet favorit Anda.
                                </p>
                                <div class="flex items-center justify-center gap-3 mb-4">
                                    <div class="flex items-center gap-2 bg-white px-3 py-2 rounded-lg">
                                        <i class="text-green-600 text-sm">●</i>
                                        <span class="text-xs font-semibold text-gray-700">GoPay</span>
                                    </div>
                                    <div class="flex items-center gap-2 bg-white px-3 py-2 rounded-lg">
                                        <i class="text-purple-600 text-sm">●</i>
                                        <span class="text-xs font-semibold text-gray-700">OVO</span>
                                    </div>
                                    <div class="flex items-center gap-2 bg-white px-3 py-2 rounded-lg">
                                        <i class="text-blue-600 text-sm">●</i>
                                        <span class="text-xs font-semibold text-gray-700">DANA</span>
                                    </div>
                                    <div class="flex items-center gap-2 bg-white px-3 py-2 rounded-lg">
                                        <i class="text-red-600 text-sm">●</i>
                                        <span class="text-xs font-semibold text-gray-700">LinkAja</span>
                                    </div>
                                </div>
                                <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                                    <p class="text-xs text-blue-800">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        Pembayaran akan diproses otomatis setelah Anda scan QR code
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Credit Card Form -->
                        <div x-show="paymentMethod === 'credit_card'" 
                             x-transition
                             class="border-t border-gray-200 pt-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-4">Informasi Kartu</h2>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Nomor Kartu <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           x-model="cardNumber"
                                           @input="formatCardNumber"
                                           maxlength="19"
                                           placeholder="1234 5678 9012 3456"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                                    <div class="flex space-x-2 mt-2">
                                        <i class="fab fa-cc-visa text-3xl text-blue-600"></i>
                                        <i class="fab fa-cc-mastercard text-3xl text-red-600"></i>
                                        <i class="fab fa-cc-amex text-3xl text-blue-500"></i>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Nama Pemegang Kartu <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           x-model="cardName"
                                           placeholder="JOHN DOE"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all uppercase">
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                                            Berlaku Hingga <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" 
                                               x-model="cardExpiry"
                                               @input="formatExpiry"
                                               maxlength="5"
                                               placeholder="MM/YY"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                                            CVV <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" 
                                               x-model="cardCVV"
                                               maxlength="4"
                                               placeholder="123"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PayPal Info -->
                        <div x-show="paymentMethod === 'paypal'" 
                             x-transition
                             class="border-t border-gray-200 pt-6">
                            <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 text-center">
                                <i class="fab fa-paypal text-6xl text-blue-600 mb-4"></i>
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Lanjutkan dengan PayPal</h3>
                                <p class="text-sm text-gray-600 mb-4">Anda akan diarahkan ke PayPal untuk menyelesaikan pembayaran dengan aman.</p>
                            </div>
                        </div>

                        <!-- Bank Transfer Info -->
                        <div x-show="paymentMethod === 'bank_transfer'" 
                             x-transition
                             class="border-t border-gray-200 pt-6">
                            <div class="bg-gray-50 border border-gray-200 rounded-xl p-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-4">Pilih Bank</h3>
                                <div class="grid grid-cols-3 gap-4">
                                    <div @click="selectedBank = 'bca'" 
                                         :class="selectedBank === 'bca' ? 'border-primary-600 bg-primary-50' : 'border-gray-300'"
                                         class="border-2 rounded-lg p-4 cursor-pointer hover:border-primary-300 transition-all text-center">
                                        <div class="font-bold text-blue-600">BCA</div>
                                    </div>
                                    <div @click="selectedBank = 'mandiri'" 
                                         :class="selectedBank === 'mandiri' ? 'border-primary-600 bg-primary-50' : 'border-gray-300'"
                                         class="border-2 rounded-lg p-4 cursor-pointer hover:border-primary-300 transition-all text-center">
                                        <div class="font-bold text-yellow-600">Mandiri</div>
                                    </div>
                                    <div @click="selectedBank = 'bni'" 
                                         :class="selectedBank === 'bni' ? 'border-primary-600 bg-primary-50' : 'border-gray-300'"
                                         class="border-2 rounded-lg p-4 cursor-pointer hover:border-primary-300 transition-all text-center">
                                        <div class="font-bold text-orange-600">BNI</div>
                                    </div>
                                </div>
                                <div x-show="selectedBank" class="mt-4 p-4 bg-white rounded-lg border border-gray-200">
                                    <p class="text-sm text-gray-600">Setelah checkout, Anda akan menerima nomor rekening dan instruksi transfer.</p>
                                </div>
                            </div>
                        </div>

                        <!-- E-Wallet Info -->
                        <div x-show="paymentMethod === 'e_wallet'" 
                             x-transition
                             class="border-t border-gray-200 pt-6">
                            <div class="bg-gray-50 border border-gray-200 rounded-xl p-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-4">Pilih E-Wallet</h3>
                                <div class="grid grid-cols-3 gap-4">
                                    <div @click="selectedWallet = 'gopay'" 
                                         :class="selectedWallet === 'gopay' ? 'border-primary-600 bg-primary-50' : 'border-gray-300'"
                                         class="border-2 rounded-lg p-4 cursor-pointer hover:border-primary-300 transition-all text-center">
                                        <div class="font-bold text-green-600">GoPay</div>
                                    </div>
                                    <div @click="selectedWallet = 'ovo'" 
                                         :class="selectedWallet === 'ovo' ? 'border-primary-600 bg-primary-50' : 'border-gray-300'"
                                         class="border-2 rounded-lg p-4 cursor-pointer hover:border-primary-300 transition-all text-center">
                                        <div class="font-bold text-purple-600">OVO</div>
                                    </div>
                                    <div @click="selectedWallet = 'dana'" 
                                         :class="selectedWallet === 'dana' ? 'border-primary-600 bg-primary-50' : 'border-gray-300'"
                                         class="border-2 rounded-lg p-4 cursor-pointer hover:border-primary-300 transition-all text-center">
                                        <div class="font-bold text-blue-600">DANA</div>
                                    </div>
                                </div>
                                <div x-show="selectedWallet" class="mt-4 p-4 bg-white rounded-lg border border-gray-200">
                                    <p class="text-sm text-gray-600">Scan QR code yang akan muncul setelah checkout.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="border-t border-gray-200 pt-6 flex gap-4">
                            <a href="{{ route('checkout') }}{{ request()->getQueryString() ? '?' . request()->getQueryString() : '' }}"
                               class="flex-1 px-8 py-4 border-2 border-gray-300 text-gray-700 rounded-xl font-bold text-lg hover:bg-gray-50 transition-all duration-300 text-center">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Kembali
                            </a>
                            <button type="submit"
                                    :disabled="isProcessing"
                                    :class="isProcessing ? 'opacity-50 cursor-not-allowed' : 'hover:bg-primary-700 hover:scale-105'"
                                    class="flex-1 px-8 py-4 bg-primary-600 text-white rounded-xl font-bold text-lg transition-all duration-300 transform shadow-lg">
                                <span x-show="!isProcessing">
                                    <i class="fas fa-check-circle mr-2"></i>
                                    Bayar Sekarang
                                </span>
                                <span x-show="isProcessing" class="flex items-center justify-center">
                                    <svg class="animate-spin h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Memproses...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Security Features -->
                <div class="grid md:grid-cols-3 gap-4 mt-6">
                    <div class="bg-white rounded-xl p-4 text-center shadow-sm">
                        <i class="fas fa-shield-alt text-3xl text-green-500 mb-2"></i>
                        <p class="text-sm font-semibold text-gray-900">SSL Encryption</p>
                    </div>
                    <div class="bg-white rounded-xl p-4 text-center shadow-sm">
                        <i class="fas fa-lock text-3xl text-blue-500 mb-2"></i>
                        <p class="text-sm font-semibold text-gray-900">PCI Compliant</p>
                    </div>
                    <div class="bg-white rounded-xl p-4 text-center shadow-sm">
                        <i class="fas fa-check-circle text-3xl text-primary-500 mb-2"></i>
                        <p class="text-sm font-semibold text-gray-900">Verified Secure</p>
                    </div>
                </div>
            </div>

            <!-- Order Summary Sidebar (Same as checkout page) -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Ringkasan Pesanan</h2>

                    @php
                        $plans = [
                            'pemula' => ['name' => 'Pemula', 'monthly' => 20000, 'yearly' => 84000],
                            'menengah' => ['name' => 'Menengah', 'monthly' => 50000, 'yearly' => 276000],
                            'sepuh' => ['name' => 'Sepuh', 'monthly' => 99000, 'yearly' => 948000]
                        ];

                        $selectedPlan = session('checkout.plan', request('plan', 'pemula'));
                        $billing = session('checkout.billing', request('billing', 'monthly'));
                        $plan = $plans[$selectedPlan] ?? $plans['pemula'];
                        $price = $billing === 'yearly' ? $plan['yearly'] : $plan['monthly'];
                        $originalPrice = $billing === 'yearly' ? ($plan['monthly'] * 12) : $plan['monthly'];
                        $discount = $billing === 'yearly' ? ($originalPrice - $price) : 0;
                        
                        $customerInfo = session('checkout.customer', [
                            'first_name' => 'Customer',
                            'last_name' => '',
                            'email' => 'customer@example.com'
                        ]);
                    @endphp

                    <!-- Customer Info -->
                    <div class="bg-gray-50 rounded-xl p-4 mb-4">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-600">Pemesan</h3>
                                <p class="text-lg font-bold text-gray-900">{{ $customerInfo['first_name'] }} {{ $customerInfo['last_name'] }}</p>
                                <p class="text-sm text-gray-600">{{ $customerInfo['email'] }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Selected Plan -->
                    <div class="bg-primary-50 rounded-xl p-4 mb-4">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">{{ $plan['name'] }} Plan</h3>
                                <p class="text-sm text-gray-600">
                                    {{ $billing === 'yearly' ? 'Paket 12 Bulan' : 'Paket Bulanan' }}
                                </p>
                            </div>
                        </div>
                        
                        @if($billing === 'yearly')
                        <div class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full inline-block">
                            <i class="fas fa-tag mr-1"></i>
                            Hemat 20%
                        </div>
                        @endif
                    </div>

                    <!-- Pricing Breakdown -->
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-gray-700">
                            <span>{{ $plan['name'] }} - {{ $billing === 'yearly' ? '12 Bulan' : '1 Bulan' }}</span>
                            <span class="font-semibold">${{ number_format($originalPrice, 0) }}</span>
                        </div>
                        
                        @if($discount > 0)
                        <div class="flex justify-between text-green-600">
                            <span>Diskon Tahunan (20%)</span>
                            <span class="font-semibold">-${{ number_format($discount, 0) }}</span>
                        </div>
                        @endif

                        <div class="border-t border-gray-200 pt-3 mt-3">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-gray-900">Total Pembayaran</span>
                                <div class="text-right">
                                    <div class="text-2xl font-bold text-primary-600">{{ number_format($price, 0) }} IDR</div>
                                    <div class="text-sm text-gray-500">{{ $billing === 'yearly' ? '/tahun' : '/bulan' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Money Back Guarantee -->
                    <div class="bg-green-50 border border-green-200 rounded-xl p-4">
                        <div class="flex items-start">
                            <i class="fas fa-shield-alt text-green-600 text-xl mr-3 mt-0.5"></i>
                            <div>
                                <h4 class="font-bold text-green-900 text-sm mb-1">100% Aman</h4>
                                <p class="text-xs text-green-700">Jaminan uang kembali 30 hari</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- QR Code Modal (Inside Alpine.js scope) -->
    <div x-show="showQrModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click.away="closeModal()" 
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-8" 
             @click.stop
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95">
        <div class="text-center">
            <div class="mb-6">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-qrcode text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Scan QR Code untuk Bayar</h3>
                <p class="text-gray-600 text-sm">Gunakan aplikasi e-wallet Anda untuk scan QR code</p>
            </div>
            
            <!-- QR Code Canvas (Generated by QRCode.js) -->
            <div class="bg-white p-6 rounded-xl border-2 border-primary-200 mb-6">
                <div id="qrcode" class="flex justify-center items-center min-h-[256px]">
                    <!-- QR Code will be generated here -->
                    <div class="text-gray-400 text-sm">
                        <i class="fas fa-spinner fa-spin text-2xl mb-2"></i>
                        <p>Generating QR Code...</p>
                    </div>
                </div>
            </div>
            
            <!-- Payment URL Display -->
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6">
                <p class="text-xs text-gray-600 mb-2">Link Pembayaran:</p>
                <p class="text-sm text-blue-600 font-mono break-all" x-text="paymentUrl"></p>
            </div>
            
            <!-- Supported E-Wallets -->
            <div class="mb-6">
                <p class="text-sm text-gray-500 mb-3">Didukung oleh:</p>
                <div class="flex justify-center items-center gap-3">
                    <div class="bg-white px-3 py-2 rounded-lg border border-gray-200">
                        <i class="fab fa-google text-blue-600 text-lg"></i>
                        <span class="text-xs text-gray-600 ml-1">GoPay</span>
                    </div>
                    <div class="bg-white px-3 py-2 rounded-lg border border-gray-200">
                        <i class="fas fa-wallet text-purple-600 text-lg"></i>
                        <span class="text-xs text-gray-600 ml-1">OVO</span>
                    </div>
                    <div class="bg-white px-3 py-2 rounded-lg border border-gray-200">
                        <i class="fas fa-coins text-blue-500 text-lg"></i>
                        <span class="text-xs text-gray-600 ml-1">DANA</span>
                    </div>
                    <div class="bg-white px-3 py-2 rounded-lg border border-gray-200">
                        <i class="fas fa-mobile-alt text-red-600 text-lg"></i>
                        <span class="text-xs text-gray-600 ml-1">LinkAja</span>
                    </div>
                </div>
            </div>
            
            <!-- Actions -->
            <div class="flex gap-3">
                <button @click="closeModal()" class="flex-1 px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl font-semibold transition">
                    <i class="fas fa-times mr-2"></i>
                    Tutup
                </button>
                <button @click="openPaymentLink()" class="flex-1 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold transition">
                    <i class="fas fa-external-link-alt mr-2"></i>
                    Buka Link
                </button>
            </div>
        </div>
    </div>
</section>

<!-- QRCode.js Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<script>
function paymentForm() {
    return {
        paymentMethod: 'qris',
        cardNumber: '',
        cardName: '',
        cardExpiry: '',
        cardCVV: '',
        selectedBank: '',
        selectedWallet: '',
        isProcessing: false,
        qrCodeUrl: null,
        paymentUrl: null,
        showQrModal: false,
        qrCodeInstance: null,
        
        generateQRCode(url) {
            // Get QR container
            const qrContainer = document.getElementById('qrcode');
            
            if (!qrContainer) {
                console.error('QR Code container not found!');
                return;
            }
            
            // Clear previous QR code
            qrContainer.innerHTML = '';
            
            try {
                // Generate new QR code
                this.qrCodeInstance = new QRCode(qrContainer, {
                    text: url,
                    width: 256,
                    height: 256,
                    colorDark: '#1e40af',  // Primary blue color
                    colorLight: '#ffffff',
                    correctLevel: QRCode.CorrectLevel.H
                });
                console.log('QR Code created for URL:', url);
            } catch (error) {
                console.error('Error creating QR code:', error);
                qrContainer.innerHTML = '<p class="text-red-600 text-sm">Gagal membuat QR Code. Gunakan tombol "Buka Link".</p>';
            }
        },
        
        openPaymentLink() {
            if (this.paymentUrl) {
                window.open(this.paymentUrl, '_blank');
            }
        },
        
        closeModal() {
            this.showQrModal = false;
            // Reset QR code container after modal is closed
            setTimeout(() => {
                const qrContainer = document.getElementById('qrcode');
                if (qrContainer) {
                    qrContainer.innerHTML = '';
                }
                this.qrCodeInstance = null;
            }, 300);
        },
        
        formatCardNumber() {
            let value = this.cardNumber.replace(/\s/g, '');
            let formattedValue = value.match(/.{1,4}/g);
            this.cardNumber = formattedValue ? formattedValue.join(' ') : value;
        },
        
        formatExpiry() {
            let value = this.cardExpiry.replace(/\D/g, '');
            if (value.length >= 2) {
                this.cardExpiry = value.slice(0, 2) + '/' + value.slice(2, 4);
            } else {
                this.cardExpiry = value;
            }
        },
        
        async submitPayment() {
            if (this.isProcessing) {
                console.log('Payment already in progress...');
                return;
            }
            
            const orderId = 'HS-' + Date.now();
            
            // Payment method mapping
            let paymentMethodMap = {
                'credit_card': 'credit_card',
                'paypal': 'paypal',
                'bank_transfer': 'bank_transfer',
                'e_wallet': 'qris',
                'qris': 'qris'
            };
            
            this.isProcessing = true;
            
            try {
                // Send to Laravel backend instead of directly to Tako.id
                const response = await fetch('{{ route("payment.process") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        payment_method: paymentMethodMap[this.paymentMethod] || 'qris',
                        order_id: orderId
                    })
                });
                
                const result = await response.json();
                
                console.log('Payment Response:', result);
                
                if (result.success) {
                    this.isProcessing = false;
                    
                    // Extract payment data (handle Tako.id response structure)
                    const data = result.data || {};
                    
                    // Get payment URL from various possible fields
                    this.paymentUrl = data.paymentUrl || data.payment_url || data.url || null;
                    
                    console.log('Payment URL:', this.paymentUrl);
                    console.log('Full Response Data:', data);
                    
                    if (this.paymentUrl) {
                        // Redirect directly to Tako.id payment page
                        console.log('Redirecting to payment URL:', this.paymentUrl);
                        window.location.href = this.paymentUrl;
                    } else {
                        // No payment URL, show error message
                        alert(`Payment URL tidak ditemukan. Silakan hubungi customer support.\n\nOrder ID: ${orderId}`);
                    }
                } else {
                    // Payment failed
                    alert(`Pembayaran gagal: ${result.message || 'Terjadi kesalahan pada server'}`);
                    this.isProcessing = false;
                }
            } catch (error) {
                console.error('Payment error:', error);
                alert(`Terjadi kesalahan: ${error.message}\n\nSilakan coba lagi atau hubungi customer support.`);
                this.isProcessing = false;
            }
        }
    }
}
</script>
@endsection
