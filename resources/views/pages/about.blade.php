@extends('layouts.app')

@section('title', 'Tentang HyperScale - Visi & Misi Kami')
@section('description', 'Kami adalah tim yang berdedikasi menghadirkan solusi Platform as a Service terbaik, membantu developer dan perusahaan mencapai potensi maksimal mereka.')

@section('content')
<!-- Hero Section -->
<section class="relative pt-20 pb-32 bg-linear-to-br from-gray-900 via-primary-900 to-gray-800 overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-20 -left-20 w-96 h-96 bg-primary-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-40 -right-20 w-96 h-96 bg-primary-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-20 left-1/2 w-96 h-96 bg-primary-700 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
        <div class="absolute inset-0 bg-grid-white opacity-5"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24">
        <div class="text-center mb-16 animate-fadeInUp">
            <div class="flex justify-center space-x-4 mb-8">
                <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-lg flex items-center justify-center animate-float">
                    <i class="fas fa-users text-white text-xl"></i>
                </div>
                <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-lg flex items-center justify-center animate-float animation-delay-2000">
                    <i class="fas fa-rocket text-white text-xl"></i>
                </div>
                <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-lg flex items-center justify-center animate-float animation-delay-4000">
                    <i class="fas fa-lightbulb text-white text-xl"></i>
                </div>
            </div>
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6">
                Tentang
                <span class="bg-linear-to-r from-primary-400 to-primary-500 bg-clip-text text-transparent">HyperScale</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                Kami adalah tim yang berdedikasi menghadirkan solusi Platform as a Service terbaik, membantu developer dan perusahaan mencapai potensi maksimal mereka.
            </p>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L60 110C120 100 240 80 360 70C480 60 600 60 720 65C840 70 960 80 1080 85C1200 90 1320 90 1380 90L1440 90V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white" />
        </svg>
    </div>
</section>

<!-- Visi & Misi Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="animate-fadeInLeft">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8">Visi & Misi Kami</h2>
                <div class="mb-12">
                    <h3 class="text-2xl font-semibold text-primary-600 mb-4">Visi</h3>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Menjadi platform cloud terdepan di Asia Tenggara yang memberdayakan developer dan perusahaan untuk menciptakan inovasi teknologi yang mengubah dunia.
                    </p>
                </div>
                <div>
                    <h3 class="text-2xl font-semibold text-primary-600 mb-4">Misi</h3>
                    <ul class="space-y-3 text-lg text-gray-600">
                        @foreach([
                            'Menyediakan platform yang mudah digunakan dan dapat diandalkan.',
                            'Mendukung pertumbuhan startup dan enterprise dengan teknologi terdepan.',
                            'Memberikan layanan terbaik dengan dukungan 24/7.',
                            'Berinovasi terus-menerus menghadapi tantangan masa depan.'
                        ] as $mission)
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary-500 mt-1 mr-3"></i>
                            {{ $mission }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="animate-fadeInRight">
                <div class="relative">
                    <div class="bg-linear-to-br from-primary-500 to-primary-700 rounded-2xl p-8 shadow-xl">
                        <div class="grid grid-cols-2 gap-6 text-white">
                            @foreach([
                                ['value' => '2020', 'label' => 'Tahun Didirikan'],
                                ['value' => '500+', 'label' => 'Happy Clients'],
                                ['value' => '50+', 'label' => 'Team Members'],
                                ['value' => '99.9%', 'label' => 'Uptime']
                            ] as $stat)
                            <div class="text-center">
                                <div class="text-3xl font-bold mb-2">{{ $stat['value'] }}</div>
                                <div class="text-sm opacity-90">{{ $stat['label'] }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="absolute -bottom-8 -right-8 w-32 h-32 bg-primary-200 rounded-full blur-3xl opacity-60"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-20 bg-linear-to-br from-gray-50 via-primary-50/30 to-primary-50/30 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-linear-to-l from-primary-100/20 to-transparent"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center mb-16 animate-fadeInUp">
            <div class="inline-block px-4 py-2 bg-primary-100 rounded-full mb-4">
                <span class="text-primary-600 font-semibold text-sm">OUR VALUES</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Nilai-Nilai Kami</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Nilai-nilai ini memandu setiap keputusan dan tindakan kami dalam memberikan layanan terbaik.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach([
                ['icon' => 'fas fa-lightbulb', 'title' => 'Inovasi', 'description' => 'Kami selalu mencari cara baru untuk meningkatkan platform dan memberikan nilai lebih kepada pengguna.'],
                ['icon' => 'fas fa-users', 'title' => 'Kolaborasi', 'description' => 'Kami percaya kerjasama tim dan partnership yang kuat adalah kunci kesuksesan bersama.'],
                ['icon' => 'fas fa-star', 'title' => 'Excellence', 'description' => 'Kami berkomitmen memberikan kualitas terbaik dalam setiap aspek layanan dan produk.'],
                ['icon' => 'fas fa-heart', 'title' => 'Customer First', 'description' => 'Kami menempatkan kebutuhan pelanggan sebagai prioritas utama dalam setiap keputusan.']
            ] as $value)
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-gray-100 animate-fadeInUp">
                <div class="relative">
                    <div class="w-16 h-16 bg-linear-to-br from-primary-500 to-primary-700 rounded-2xl flex items-center justify-center mx-auto mb-6 transform group-hover:rotate-6 transition-transform duration-300">
                        <i class="{{ $value['icon'] }} text-white text-2xl"></i>
                    </div>
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-16 h-16 bg-primary-500 rounded-2xl blur-xl opacity-30 group-hover:opacity-50 transition-opacity"></div>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4 text-center">{{ $value['title'] }}</h3>
                <p class="text-gray-600 text-center">{{ $value['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Journey Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-fadeInUp">
            <div class="inline-block px-4 py-2 bg-primary-100 rounded-full mb-4">
                <span class="text-primary-600 font-semibold text-sm">OUR JOURNEY</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Perjalanan Kami</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Kami terus berkembang untuk memberikan teknologi terbaik bagi para developer dan bisnis di seluruh Indonesia.
            </p>
        </div>

        <div class="relative border-l-2 border-primary-100 pl-8 space-y-12 animate-fadeInUp">
            @foreach([
                ['year' => '2020', 'title' => 'Diluncurkan ke Publik', 'description' => 'HyperScale resmi diluncurkan sebagai platform PaaS lokal pertama dengan fokus pada developer experience.'],
                ['year' => '2021', 'title' => 'Pertumbuhan Pengguna', 'description' => 'Mencapai 10.000+ deployment dan meluncurkan fitur auto scaling serta observability terpadu.'],
                ['year' => '2022', 'title' => 'Ekspansi Enterprise', 'description' => 'Bermitra dengan berbagai perusahaan enterprise untuk modernisasi aplikasi dan migrasi cloud.'],
                ['year' => '2023', 'title' => 'Platform AI Ready', 'description' => 'Menambahkan layanan managed AI workloads dan integrasi edge computing untuk performa lebih tinggi.']
            ] as $milestone)
            <div class="relative pl-8">
                <div class="absolute -left-10 top-1 w-6 h-6 bg-primary-500 border-4 border-white rounded-full shadow-lg"></div>
                <div class="absolute -left-12 top-1 w-12 h-12 bg-primary-500/10 rounded-full"></div>
                <span class="inline-flex items-center px-4 py-1 bg-primary-50 text-primary-600 rounded-full font-semibold text-sm mb-3">
                    {{ $milestone['year'] }}
                </span>
                <h3 class="text-2xl font-semibold text-gray-900 mb-2">{{ $milestone['title'] }}</h3>
                <p class="text-gray-600 leading-relaxed">{{ $milestone['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-linear-to-br from-primary-50 via-white to-primary-50 overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 animate-fadeInUp">
        <div class="relative bg-white rounded-3xl shadow-2xl p-10 md:p-16 border border-primary-100">
            <div class="absolute inset-0 bg-grid-white opacity-10 rounded-3xl"></div>
            <div class="relative text-center">
                <div class="inline-flex items-center space-x-2 bg-primary-100 text-primary-600 px-6 py-2 rounded-full font-semibold mb-6">
                    <i class="fas fa-hands-helping"></i>
                    <span>Kolaborasi Bersama</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Mari Bangun Masa Depan Cloud Indonesia
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-10">
                    Kami siap membantu Anda merancang, membangun, dan mengoperasikan aplikasi modern dengan performa tinggi. Hubungi kami untuk berdiskusi lebih lanjut.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}"
                       class="inline-flex items-center justify-center px-8 py-4 bg-linear-to-r from-primary-600 via-primary-700 to-primary-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        Jadwalkan Konsultasi
                    </a>
                    <a href="{{ route('services') }}"
                       class="inline-flex items-center justify-center px-8 py-4 border border-primary-200 text-primary-600 font-semibold rounded-xl hover:bg-primary-50 transition-all">
                        <i class="fas fa-layer-group mr-2"></i>
                        Jelajahi Layanan
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
