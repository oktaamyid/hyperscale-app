@extends('layouts.app')

@section('title', 'Layanan HyperScale - Platform PaaS Lengkap')
@section('description', 'Infrastruktur cloud modern dengan fitur lengkap untuk membantu tim Anda membangun, mengelola, dan menskalakan aplikasi dalam hitungan menit.')

@section('content')
<!-- Hero Section -->
<section class="relative pt-20 pb-32 bg-linear-to-br from-gray-900 via-primary-900 to-gray-800 overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-16 -left-16 w-80 h-80 bg-primary-500 rounded-full filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute top-32 -right-16 w-80 h-80 bg-primary-600 rounded-full filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-24 left-1/2 w-72 h-72 bg-primary-700 rounded-full filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>
        <div class="absolute inset-0 bg-grid-white opacity-5"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24">
        <div class="text-center mb-16 animate-fadeInUp">
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6">
                Layanan
                <span class="bg-linear-to-r from-primary-400 to-primary-300 bg-clip-text text-transparent">HyperScale</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                Infrastruktur cloud modern dengan fitur lengkap untuk membantu tim Anda membangun, mengelola, dan menskalakan aplikasi dalam hitungan menit.
            </p>
            <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
                <a href="#pricing"
                   class="inline-flex items-center justify-center px-8 py-4 bg-primary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all">
                    <i class="fas fa-tags mr-2"></i>
                    Lihat Harga
                </a>
                <a href="{{ route('contact') }}"
                   class="inline-flex items-center justify-center px-8 py-4 border border-white/40 text-white font-semibold rounded-xl hover:bg-white/10 transition-all">
                    <i class="fas fa-headset mr-2"></i>
                    Konsultasi Gratis
                </a>
            </div>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L60 110C120 100 240 80 360 70C480 60 600 60 720 65C840 70 960 80 1080 85C1200 90 1320 90 1380 90L1440 90V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white" />
        </svg>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-fadeInUp">
            <div class="inline-flex items-center px-4 py-2 bg-primary-100 text-primary-600 rounded-full font-semibold mb-4">
                <i class="fas fa-layer-group mr-2"></i>
                <span>Platform Capabilities</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Semua yang Anda Butuhkan</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                HyperScale menawarkan solusi menyeluruh mulai dari hosting, database, observability, hingga workflow DevOps otomatis.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach([
                ['icon' => 'fas fa-server', 'title' => 'Managed Hosting', 'description' => 'Deploy aplikasi Node.js, Laravel, Go, atau container dengan auto scaling, zero-downtime deployment, dan rollback instan.'],
                ['icon' => 'fas fa-database', 'title' => 'Database as a Service', 'description' => 'PostgreSQL, MySQL, Redis, dan MongoDB dengan automated backup, point-in-time recovery, serta pemantauan performa.'],
                ['icon' => 'fas fa-chart-area', 'title' => 'Observability', 'description' => 'Monitoring terpadu dengan metrics, logs, tracing, dan alert pintar untuk menjaga reliabilitas aplikasi.'],
                ['icon' => 'fas fa-lock', 'title' => 'Security & Compliance', 'description' => 'Enkripsi end-to-end, WAF, DDoS protection, dan sertifikasi keamanan untuk memenuhi standar enterprise.'],
                ['icon' => 'fas fa-code-branch', 'title' => 'CI/CD Otomatis', 'description' => 'Pipeline bawaan terintegrasi GitHub/GitLab dengan preview deployments dan workflow approvals.'],
                ['icon' => 'fas fa-robot', 'title' => 'AI & Edge Ready', 'description' => 'Menjalankan workload AI, cron jobs, serta edge functions untuk pengalaman pengguna ultra cepat.']
            ] as $feature)
            <div class="group bg-white border border-gray-100 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 animate-fadeInUp">
                <div class="w-14 h-14 flex items-center justify-center rounded-xl bg-primary-500 text-white text-2xl mb-6">
                    <i class="{{ $feature['icon'] }}"></i>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">{{ $feature['title'] }}</h3>
                <p class="text-gray-600 leading-relaxed">{{ $feature['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section id="pricing" class="py-20 bg-linear-to-br from-primary-50 via-white to-gray-50 overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16 animate-fadeInUp">
            <div class="inline-flex items-center px-4 py-2 bg-white text-primary-600 rounded-full font-semibold shadow-sm mb-4">
                <i class="fas fa-wallet mr-2"></i>
                <span>Paket Harga Fleksibel</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Sesuaikan Dengan Kebutuhan Anda</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Dari startup hingga enterprise, kami menyediakan paket terukur yang dapat dikustomisasi sesuai stage bisnis Anda.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @php
            $pricingTiers = [
                [
                    'slug' => 'pemula',
                    'name' => 'Pemula',
                    'price' => 'Rp 499K',
                    'monthlyPrice' => '$9',
                    'yearlyPrice' => '$84',
                    'popular' => false,
                    'description' => 'Cocok untuk prototipe dan aplikasi kecil dengan kebutuhan resource ringan.',
                    'features' => [
                        '2 vCPU & 4GB RAM',
                        'Database PostgreSQL 10GB',
                        'Bandwidth 1TB',
                        'Support via email'
                    ]
                ],
                [
                    'slug' => 'menengah',
                    'name' => 'Menengah',
                    'price' => 'Rp 1,49JT',
                    'monthlyPrice' => '$29',
                    'yearlyPrice' => '$276',
                    'popular' => true,
                    'description' => 'Platform andal untuk aplikasi produksi dengan traffic menengah hingga tinggi.',
                    'features' => [
                        '4 vCPU & 8GB RAM',
                        'Database PostgreSQL 50GB',
                        'Bandwidth 3TB',
                        'Support 24/7 + SLA 99.9%'
                    ]
                ],
                [
                    'slug' => 'sepuh',
                    'name' => 'Sepuh',
                    'price' => 'Hubungi Kami',
                    'monthlyPrice' => '$99',
                    'yearlyPrice' => '$948',
                    'popular' => false,
                    'description' => 'Solusi kustom dengan kebutuhan compliance, keamanan, dan integrasi kompleks.',
                    'features' => [
                        'Cluster dedicated',
                        'Support prioritas',
                        'Consulting architecture',
                        'Onboarding & training'
                    ]
                ]
            ];
            @endphp

            @foreach($pricingTiers as $tier)
            <div class="relative bg-white rounded-3xl border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 p-8 flex flex-col animate-fadeInUp">
                @if($tier['popular'])
                <span class="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1 bg-primary-500 text-white text-sm font-semibold rounded-full shadow">
                    Paling Populer
                </span>
                @endif
                <h3 class="text-2xl font-bold text-gray-900 mb-2 text-center">{{ $tier['name'] }}</h3>
                <p class="text-4xl font-extrabold text-primary-600 text-center mb-4">{{ $tier['price'] }}</p>
                <p class="text-gray-600 text-center mb-6">{{ $tier['description'] }}</p>
                <ul class="space-y-3 text-gray-600 flex-1">
                    @foreach($tier['features'] as $feature)
                    <li class="flex items-start">
                        <i class="fas fa-check text-primary-500 mt-1 mr-3"></i>
                        <span>{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>
                
                <!-- Billing Toggle -->
                <div class="mt-6 mb-4">
                    <div class="bg-gray-100 rounded-xl p-1 flex" data-billing-toggle>
                        <button type="button" 
                                data-billing="monthly"
                                class="billing-btn flex-1 px-4 py-2 rounded-lg font-semibold text-sm transition-all bg-white text-primary-600 shadow-sm">
                            Bulanan
                        </button>
                        <button type="button"
                                data-billing="yearly" 
                                class="billing-btn flex-1 px-4 py-2 rounded-lg font-semibold text-sm transition-all text-gray-600">
                            Tahunan
                            <span class="ml-1 text-xs text-green-600">-20%</span>
                        </button>
                    </div>
                </div>

                <a href="{{ route('checkout', ['plan' => $tier['slug'], 'billing' => 'monthly']) }}"
                   data-checkout-link
                   data-plan="{{ $tier['slug'] }}"
                   class="mt-2 inline-flex items-center justify-center px-6 py-3 rounded-xl font-semibold transition-all {{ $tier['popular'] ? 'bg-linear-to-r from-primary-600 to-primary-700 text-white' : 'border border-primary-200 text-primary-600 hover:bg-primary-50' }}">
                    <span>Mulai Sekarang</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle billing toggle for each pricing card
    const pricingCards = document.querySelectorAll('[data-billing-toggle]');
    
    pricingCards.forEach(card => {
        const toggleButtons = card.querySelectorAll('.billing-btn');
        const checkoutLink = card.closest('.rounded-3xl').querySelector('[data-checkout-link]');
        const plan = checkoutLink.dataset.plan;
        
        toggleButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const billing = this.dataset.billing;
                
                // Update button states
                toggleButtons.forEach(b => {
                    if (b.dataset.billing === billing) {
                        b.classList.add('bg-white', 'text-primary-600', 'shadow-sm');
                        b.classList.remove('text-gray-600');
                    } else {
                        b.classList.remove('bg-white', 'text-primary-600', 'shadow-sm');
                        b.classList.add('text-gray-600');
                    }
                });
                
                // Update checkout link
                const baseUrl = '{{ route("checkout") }}';
                checkoutLink.href = `${baseUrl}?plan=${plan}&billing=${billing}`;
            });
        });
    });
});
</script>

<!-- Final CTA Section -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative bg-linear-to-r from-primary-600 to-primary-700 rounded-3xl p-12 md:p-16 shadow-2xl overflow-hidden animate-fadeInUp">
            <div class="absolute inset-0 bg-grid-white opacity-10"></div>
            <div class="relative text-center">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    Siap mempercepat pengembangan aplikasi Anda?
                </h2>
                <p class="text-xl text-white/90 max-w-3xl mx-auto mb-10">
                    Coba HyperScale gratis selama 30 hari dan nikmati pengalaman deploy aplikasi yang cepat, aman, dan dapat diskalakan.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}"
                       class="inline-flex items-center justify-center px-10 py-4 bg-white text-primary-600 font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all">
                        <i class="fas fa-rocket mr-2"></i>
                        Mulai Sekarang
                    </a>
                    <a href="{{ route('home') }}"
                       class="inline-flex items-center justify-center px-10 py-4 border border-white/70 text-white font-semibold rounded-xl hover:bg-white/10 transition-all">
                        <i class="fas fa-play mr-2"></i>
                        Lihat Demo Platform
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
