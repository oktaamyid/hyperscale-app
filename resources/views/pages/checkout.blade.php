@extends('layouts.app')

@section('title', 'Checkout - Lengkapi Pesanan Anda')
@section('description', 'Lengkapi informasi untuk melanjutkan pemesanan paket HyperScale')

@section('content')
<section class="py-32 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Main Form Section -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-6">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Lengkapi Pesanan Anda</h1>
                    <p class="text-gray-600 mb-8">Isi informasi di bawah untuk melanjutkan</p>

                    <form action="{{ route('checkout.process') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="plan" value="{{ request('plan', 'pemula') }}">
                        <input type="hidden" name="billing" value="{{ request('billing', 'monthly') }}">

                        @if ($errors->any())
                            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                                <ul class="list-disc list-inside text-sm">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Personal Information -->
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-user mr-3 text-primary-600"></i>
                                Informasi Pribadi
                            </h2>
                            
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Nama Depan <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           name="first_name" 
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                                           placeholder="John">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Nama Belakang <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           name="last_name" 
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                                           placeholder="Doe">
                                </div>
                            </div>

                            <div class="mt-4">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" 
                                       name="email" 
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                                       placeholder="john.doe@example.com">
                            </div>

                            <div class="mt-4">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Nomor Telepon <span class="text-red-500">*</span>
                                </label>
                                <input type="tel" 
                                       name="phone" 
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                                       placeholder="+62 812 3456 7890">
                            </div>
                        </div>

                        <!-- Company Information (Optional) -->
                        <div class="border-t border-gray-200 pt-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-building mr-3 text-primary-600"></i>
                                Informasi Perusahaan (Opsional)
                            </h2>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Nama Perusahaan
                                </label>
                                <input type="text" 
                                       name="company" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                                       placeholder="PT. Teknologi Indonesia">
                            </div>
                        </div>

                        <!-- Project Information -->
                        <div class="border-t border-gray-200 pt-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-rocket mr-3 text-primary-600"></i>
                                Informasi Project
                            </h2>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Nama Project <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       name="project_name" 
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all"
                                       placeholder="my-awesome-app">
                                <p class="text-xs text-gray-500 mt-1">Nama project untuk deployment Anda</p>
                            </div>
                        </div>

                        <!-- Terms & Conditions -->
                        <div class="border-t border-gray-200 pt-6">
                            <label class="flex items-start space-x-3 cursor-pointer">
                                <input type="checkbox" 
                                       name="accept_terms" 
                                       required
                                       class="mt-1 w-5 h-5 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                                <span class="text-sm text-gray-700">
                                    Saya setuju dengan <a href="#" class="text-primary-600 hover:underline font-semibold">Terms of Service</a>, 
                                    <a href="#" class="text-primary-600 hover:underline font-semibold">Privacy Policy</a>, dan 
                                    <a href="#" class="text-primary-600 hover:underline font-semibold">Refund Policy</a>
                                </span>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="border-t border-gray-200 pt-6">
                            @if (Auth::check())
                            <button type="submit"
                                    class="w-full px-8 py-4 bg-primary-600 text-white rounded-xl font-bold text-lg hover:bg-primary-700 transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center justify-center">
                                <i class="fas fa-lock mr-3"></i>
                                Lanjutkan ke Pembayaran
                            </button>
                                
                            @else
                            <a href="{{ route('login') }}" class="w-full px-8 py-4 bg-primary-600 text-white rounded-xl font-bold text-lg hover:bg-primary-700 transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center justify-center">
                                <i class="fas fa-lock mr-3"></i>
                                Lanjutkan ke Pembayaran
                            </a>
                                
                            @endif

                            <p class="text-center text-sm text-gray-500 mt-4">
                                <i class="fas fa-shield-alt mr-2 text-green-500"></i>
                                Pembayaran aman dan terenkripsi
                            </p>
                        </div>
                    </form>
                </div>

                <!-- Security Features -->
                <div class="grid md:grid-cols-3 gap-4">
                    <div class="bg-white rounded-xl p-4 text-center shadow-sm">
                        <i class="fas fa-lock text-3xl text-green-500 mb-2"></i>
                        <p class="text-sm font-semibold text-gray-900">Pembayaran Aman</p>
                    </div>
                    <div class="bg-white rounded-xl p-4 text-center shadow-sm">
                        <i class="fas fa-undo text-3xl text-blue-500 mb-2"></i>
                        <p class="text-sm font-semibold text-gray-900">30 Hari Garansi</p>
                    </div>
                    <div class="bg-white rounded-xl p-4 text-center shadow-sm">
                        <i class="fas fa-headset text-3xl text-primary-500 mb-2"></i>
                        <p class="text-sm font-semibold text-gray-900">Support 24/7</p>
                    </div>
                </div>
            </div>

            <!-- Order Summary Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Ringkasan Pesanan</h2>

                    @php
                        $plans = [
                            'pemula' => ['name' => 'Pemula', 'monthly' => 20000, 'yearly' => 84000],
                            'menengah' => ['name' => 'Menengah', 'monthly' => 50000, 'yearly' => 276000],
                            'sepuh' => ['name' => 'Sepuh', 'monthly' => 99000, 'yearly' => 948000]
                        ];
                        
                        $selectedPlan = request('plan', 'pemula');
                        $billing = request('billing', 'monthly');
                        $plan = $plans[$selectedPlan] ?? $plans['pemula'];
                        $price = $billing === 'yearly' ? $plan['yearly'] : $plan['monthly'];
                        $originalPrice = $billing === 'yearly' ? ($plan['monthly'] * 12) : $plan['monthly'];
                        $discount = $billing === 'yearly' ? ($originalPrice - $price) : 0;
                    @endphp

                    <!-- Selected Plan -->
                    <div class="bg-primary-50 rounded-xl p-4 mb-4">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">{{ $plan['name'] }} Plan</h3>
                                <p class="text-sm text-gray-600">
                                    {{ $billing === 'yearly' ? 'Paket 12 Bulan' : 'Paket Bulanan' }}
                                </p>
                            </div>
                            <a href="{{ route('portal') }}" class="text-primary-600 hover:text-primary-700 text-sm font-semibold">
                                Ubah
                            </a>
                        </div>
                        
                        @if($billing === 'yearly')
                        <div class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full inline-block">
                            <i class="fas fa-tag mr-1"></i>
                            Hemat 20% dengan paket tahunan
                        </div>
                        @endif
                    </div>

                    <!-- Pricing Breakdown -->
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-gray-700">
                            <span>{{ $plan['name'] }} - {{ $billing === 'yearly' ? '12 Bulan' : '1 Bulan' }}</span>
                            <span class="font-semibold">{{ number_format($originalPrice, 0) }} IDR</span>
                        </div>
                        
                        @if($discount > 0)
                        <div class="flex justify-between text-green-600">
                            <span>Diskon Tahunan (20%)</span>
                            <span class="font-semibold">-${{ number_format($discount, 0) }}</span>
                        </div>
                        @endif


                        <div class="flex justify-between text-green-600">
                            <span>Setup Fee Gratis</span>
                            <span class="font-semibold">0 IDR</span>
                        </div>

                        <div class="border-t border-gray-200 pt-3 mt-3">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-gray-900">Total</span>
                                <div class="text-right">
                                    <div class="text-2xl font-bold text-primary-600">{{ number_format($price, 0) }} IDR</div>
                                    <div class="text-sm text-gray-500">{{ $billing === 'yearly' ? '/tahun' : '/bulan' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Plan Features -->
                    <div class="border-t border-gray-200 pt-4">
                        <h3 class="text-sm font-bold text-gray-900 mb-3">Yang Anda Dapatkan:</h3>
                        <ul class="space-y-2 text-sm text-gray-700">
                            @if($selectedPlan === 'pemula')
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                    <span>1 GB RAM</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                    <span>10 GB Storage</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                    <span>1 vCPU</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                    <span>100 GB Bandwidth</span>
                                </li>
                            @elseif($selectedPlan === 'menengah')
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                    <span>4 GB RAM</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                    <span>50 GB Storage</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                    <span>2 vCPU</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                    <span>Auto Scaling</span>
                                </li>
                            @else
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                    <span>16 GB RAM</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                    <span>200 GB Storage</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                    <span>8 vCPU</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                    <span>Dedicated Account Manager</span>
                                </li>
                            @endif
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                <span>SSL Certificate Gratis</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                <span>Daily Backups</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Money Back Guarantee -->
                    <div class="bg-green-50 border border-green-200 rounded-xl p-4 mt-6">
                        <div class="flex items-start">
                            <i class="fas fa-shield-alt text-green-600 text-xl mr-3 mt-0.5"></i>
                            <div>
                                <h4 class="font-bold text-green-900 text-sm mb-1">Jaminan 30 Hari Uang Kembali</h4>
                                <p class="text-xs text-green-700">Tidak puas? Kami akan mengembalikan 100% uang Anda dalam 30 hari pertama.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
