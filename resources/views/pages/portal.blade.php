@extends('layouts.app')

@section('title', 'Portal - Pilih Paket Layanan Anda')
@section('description', 'Pilih paket layanan PaaS yang sesuai dengan kebutuhan project Anda')

@section('content')
<!-- Hero Portal Section -->
<section class="relative pt-32 pb-20 bg-linear-to-br from-gray-900 via-primary-900 to-gray-800 overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-grid-white opacity-5"></div>
        <div class="absolute top-20 right-20 w-96 h-96 bg-primary-500 rounded-full filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute bottom-20 left-20 w-96 h-96 bg-primary-600 rounded-full filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12 animate-fadeInUp">
            <div class="inline-flex items-center space-x-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-6 py-2 mb-6">
                <i class="fas fa-rocket text-primary-300"></i>
                <span class="text-white text-sm font-medium">Get Started Today</span>
            </div>
            
            <h1 class="text-5xl md:text-6xl font-extrabold text-white leading-tight mb-6">
                Pilih Paket
                <span class="bg-linear-to-r from-primary-400 to-primary-300 bg-clip-text text-transparent">
                    Yang Tepat
                </span>
            </h1>
            
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                Mulai perjalanan cloud Anda dengan paket yang sesuai kebutuhan. Upgrade atau downgrade kapan saja.
            </p>
        </div>
    </div>
</section>

<!-- Pricing Plans Section -->
<section class="relative py-20 bg-white" x-data="{ billingPeriod: 'monthly' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Billing Toggle -->
        <div class="flex justify-center mb-12 animate-fadeInUp">
            <div class="bg-gray-100 rounded-full p-1 inline-flex">
                <button @click="billingPeriod = 'monthly'" 
                        :class="billingPeriod === 'monthly' ? 'bg-white shadow-md' : 'bg-transparent'"
                        class="px-6 py-2 rounded-full font-semibold text-sm transition-all duration-300">
                    Monthly
                </button>
                <button @click="billingPeriod = 'yearly'" 
                        :class="billingPeriod === 'yearly' ? 'bg-white shadow-md' : 'bg-transparent'"
                        class="px-6 py-2 rounded-full font-semibold text-sm transition-all duration-300 relative">
                    Yearly
                    <span class="absolute -top-2 -right-2 bg-green-500 text-white text-xs px-2 py-0.5 rounded-full">-20%</span>
                </button>
            </div>
        </div>

        <!-- Pricing Cards -->
        <div class="grid lg:grid-cols-3 gap-8 mb-16">
            <!-- Starter Plan -->
            <div class="relative bg-white border-2 border-gray-200 rounded-3xl p-8 hover:border-primary-300 transition-all duration-300 hover:shadow-2xl animate-fadeInUp">
                <div class="mb-6">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-gray-100 rounded-xl mb-4">
                        <i class="fas fa-cube text-gray-600 text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Pemula</h3>
                    <p class="text-gray-600">Sempurna untuk proyek kecil dan pengujian</p>
                </div>

                <div class="mb-8">
                    <div class="flex items-baseline">
                        <span class="text-3xl font-extrabold text-gray-900" x-text="billingPeriod === 'monthly' ? '20.000 IDR' : '240.000 IDR'"></span>
                        <span class="text-gray-600 ml-2">/bulan</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1" x-show="billingPeriod === 'yearly'">Ditagih 240.000 IDR/tahun</p>
                </div>

                <ul class="space-y-4 mb-8">
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700">1 GB RAM</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700">10 GB Storage</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700">1 vCPU</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700">100 GB Bandwidth</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700">SSL Certificate</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700">Email Support</span>
                    </li>
                    <li class="flex items-start text-gray-400">
                        <i class="fas fa-times mt-1 mr-3"></i>
                        <span>Auto Scaling</span>
                    </li>
                    <li class="flex items-start text-gray-400">
                        <i class="fas fa-times mt-1 mr-3"></i>
                        <span>Priority Support</span>
                    </li>
                </ul>

                <button @click="window.location.href = '{{ route('checkout') }}?plan=pemula&billing=' + billingPeriod"
                        class="w-full px-6 py-3 bg-gray-900 text-white rounded-xl font-semibold hover:bg-gray-800 transition-all duration-300 transform hover:scale-105">
                    Pilih Pemula
                </button>
            </div>

            <!-- Professional Plan (Popular) -->
            <div class="relative bg-linear-to-br from-primary-600 to-primary-700 rounded-3xl p-8 shadow-2xl transform scale-105 animate-fadeInUp">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2">
                    <span class="bg-yellow-400 text-gray-900 px-6 py-1.5 rounded-full text-sm font-bold shadow-lg">
                        🔥 Paling Populer
                    </span>
                </div>

                <div class="mb-6">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-white/20 rounded-xl mb-4">
                        <i class="fas fa-rocket text-white text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-2">Menengah</h3>
                    <p class="text-primary-100">Sempurna untuk proyek menengah</p>
                </div>

                <div class="mb-8">
                    <div class="flex items-baseline">
                        <span class="text-3xl font-extrabold text-white" x-text="billingPeriod === 'monthly' ? '50.000 IDR' : '600.000 IDR'"></span>
                        <span class="text-primary-100 ml-2">/bulan</span>
                    </div>
                    <p class="text-sm text-primary-200 mt-1" x-show="billingPeriod === 'yearly'">Ditagih 600.000 IDR/tahun</p>
                </div>

                <ul class="space-y-4 mb-8">
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-300 mt-1 mr-3"></i>
                        <span class="text-white">4 GB RAM</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-300 mt-1 mr-3"></i>
                        <span class="text-white">50 GB Storage</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-300 mt-1 mr-3"></i>
                        <span class="text-white">2 vCPU</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-300 mt-1 mr-3"></i>
                        <span class="text-white">500 GB Bandwidth</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-300 mt-1 mr-3"></i>
                        <span class="text-white">SSL Certificate</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-300 mt-1 mr-3"></i>
                        <span class="text-white">Auto Scaling</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-300 mt-1 mr-3"></i>
                        <span class="text-white">Priority Email Support</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-300 mt-1 mr-3"></i>
                        <span class="text-white">Daily Backups</span>
                    </li>
                </ul>

                <button @click="window.location.href = '{{ route('checkout') }}?plan=menengah&billing=' + billingPeriod"
                        class="w-full px-6 py-3 bg-white text-primary-600 rounded-xl font-semibold hover:bg-primary-50 transition-all duration-300 transform hover:scale-105 shadow-xl">
                    Pilih Menengah
                </button>
            </div>

            <!-- Enterprise Plan -->
            <div class="relative bg-white border-2 border-gray-200 rounded-3xl p-8 hover:border-primary-300 transition-all duration-300 hover:shadow-2xl animate-fadeInUp">
                <div class="mb-6">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-gray-900 rounded-xl mb-4">
                        <i class="fas fa-crown text-yellow-400 text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Sepuh</h3>
                    <p class="text-gray-600">Untuk aplikasi skala besar</p>
                </div>

                <div class="mb-8">
                    <div class="flex items-baseline">
                        <span class="text-3xl font-extrabold text-gray-900" x-text="billingPeriod === 'monthly' ? '99.000 IDR' : '79.000 IDR'"></span>
                        <span class="text-gray-600 ml-2">/bulan</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1" x-show="billingPeriod === 'yearly'">Ditagih 948.000 IDR/tahun</p>
                </div>

                <ul class="space-y-4 mb-8">
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700">16 GB RAM</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700">200 GB Storage</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700">8 vCPU</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700">Unlimited Bandwidth</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700">SSL Certificate</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700">Advanced Auto Scaling</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700">24/7 Priority Support</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700">Hourly Backups</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700">Dedicated Account Manager</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span class="text-gray-700">SLA 99.99% Uptime</span>
                    </li>
                </ul>

                <button @click="window.location.href = '{{ route('checkout') }}?plan=sepuh&billing=' + billingPeriod"
                        class="w-full px-6 py-3 bg-gray-900 text-white rounded-xl font-semibold hover:bg-gray-800 transition-all duration-300 transform hover:scale-105">
                    Pilih Sepuh
                </button>
            </div>
        </div>

        <!-- Features Comparison -->
        <div class="bg-gray-50 rounded-3xl p-8 animate-fadeInUp">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Perbandingan Fitur Lengkap</h3>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b-2 border-gray-200">
                            <th class="text-left py-4 px-4 font-semibold text-gray-900">Features</th>
                            <th class="text-center py-4 px-4 font-semibold text-gray-900">Pemula</th>
                            <th class="text-center py-4 px-4 font-semibold text-primary-600">Menengah</th>
                            <th class="text-center py-4 px-4 font-semibold text-gray-900">Sepuh</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="py-4 px-4 text-gray-700">Custom Domain</td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                        <tr>
                            <td class="py-4 px-4 text-gray-700">CI/CD Integration</td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                        <tr>
                            <td class="py-4 px-4 text-gray-700">Team Members</td>
                            <td class="text-center py-4 px-4 text-gray-600">1</td>
                            <td class="text-center py-4 px-4 text-gray-600">5</td>
                            <td class="text-center py-4 px-4 text-gray-600">Unlimited</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-4 text-gray-700">Staging Environment</td>
                            <td class="text-center py-4 px-4"><i class="fas fa-times text-gray-300"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                        <tr>
                            <td class="py-4 px-4 text-gray-700">Load Balancing</td>
                            <td class="text-center py-4 px-4"><i class="fas fa-times text-gray-300"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                        <tr>
                            <td class="py-4 px-4 text-gray-700">DDoS Protection</td>
                            <td class="text-center py-4 px-4"><i class="fas fa-times text-gray-300"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-times text-gray-300"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                        <tr>
                            <td class="py-4 px-4 text-gray-700">Custom SLA</td>
                            <td class="text-center py-4 px-4"><i class="fas fa-times text-gray-300"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-times text-gray-300"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 animate-fadeInUp">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
            <p class="text-xl text-gray-600">Punya pertanyaan? Kami punya jawabannya</p>
        </div>

        <div class="space-y-4" x-data="{ active: null }">
            <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                <button @click="active = active === 1 ? null : 1"
                        class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-all">
                    <span class="font-semibold text-gray-900">Apakah saya bisa upgrade/downgrade paket?</span>
                    <i class="fas fa-chevron-down transition-transform" :class="active === 1 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="active === 1" x-collapse class="px-6 pb-4">
                    <p class="text-gray-600">Ya! Anda bisa upgrade atau downgrade paket kapan saja. Perubahan akan diterapkan segera dan billing akan disesuaikan secara proporsional.</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                <button @click="active = active === 2 ? null : 2"
                        class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-all">
                    <span class="font-semibold text-gray-900">Apakah ada free trial?</span>
                    <i class="fas fa-chevron-down transition-transform" :class="active === 2 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="active === 2" x-collapse class="px-6 pb-4">
                    <p class="text-gray-600">Kami menyediakan 14 hari free trial untuk paket Professional dan Enterprise. Tidak perlu kartu kredit untuk memulai trial.</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                <button @click="active = active === 3 ? null : 3"
                        class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-all">
                    <span class="font-semibold text-gray-900">Metode pembayaran apa yang diterima?</span>
                    <i class="fas fa-chevron-down transition-transform" :class="active === 3 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="active === 3" x-collapse class="px-6 pb-4">
                    <p class="text-gray-600">Kami menerima pembayaran melalui credit card (Visa, Mastercard, AMEX), PayPal, dan transfer bank untuk paket Enterprise.</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                <button @click="active = active === 4 ? null : 4"
                        class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 transition-all">
                    <span class="font-semibold text-gray-900">Bagaimana dengan data backup?</span>
                    <i class="fas fa-chevron-down transition-transform" :class="active === 4 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="active === 4" x-collapse class="px-6 pb-4">
                    <p class="text-gray-600">Semua paket mendapatkan automated backup. Professional mendapat daily backup, Enterprise mendapat hourly backup dengan retention hingga 30 hari.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trust Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <p class="text-gray-600 mb-6">Dipercaya oleh perusahaan terkemuka</p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center opacity-50">
                <div class="text-center">
                    <i class="fab fa-google text-5xl"></i>
                </div>
                <div class="text-center">
                    <i class="fab fa-microsoft text-5xl"></i>
                </div>
                <div class="text-center">
                    <i class="fab fa-amazon text-5xl"></i>
                </div>
                <div class="text-center">
                    <i class="fab fa-apple text-5xl"></i>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

