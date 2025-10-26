@extends('layouts.app')

@section('title', 'Hubungi HyperScale - Tim Siap Membantu Anda')
@section('description', 'Tim kami siap membantu Anda menemukan solusi terbaik untuk kebutuhan platform dan aplikasi Anda. Mari diskusikan project Anda!')

@section('content')
<!-- Toast Container -->
<div class="toast-container" x-data="toastNotification()" x-show="show" x-cloak>
    <div class="toast" :class="[show ? 'show' : 'hide', type]" x-show="show">
        <div class="toast-header">
            <div class="toast-icon">
                <i :class="type === 'success' ? 'fas fa-check' : 'fas fa-exclamation-triangle'"></i>
            </div>
            <div class="toast-title" x-text="title"></div>
            <button class="toast-close" type="button" @click="hide()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="toast-message" x-text="message"></div>
        <div class="toast-progress"></div>
    </div>
</div>

<!-- Hero Section -->
<section class="relative pt-20 pb-32 bg-linear-to-br from-gray-900 via-primary-900 to-gray-800 overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-20 -left-20 w-96 h-96 bg-primary-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-40 -right-20 w-96 h-96 bg-primary-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-20 left-1/2 w-96 h-96 bg-primary-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
        <div class="absolute inset-0 bg-grid-white opacity-5"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24">
        <div class="text-center mb-16 animate-fadeInUp">
            <div class="flex justify-center space-x-4 mb-8">
                <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-lg flex items-center justify-center animate-float">
                    <i class="fas fa-envelope text-white text-xl"></i>
                </div>
                <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-lg flex items-center justify-center animate-float animation-delay-2000">
                    <i class="fas fa-phone text-white text-xl"></i>
                </div>
                <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-lg flex items-center justify-center animate-float animation-delay-4000">
                    <i class="fas fa-comments text-white text-xl"></i>
                </div>
            </div>
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6">
                Hubungi
                <span class="bg-linear-to-r from-primary-400 to-primary-500 bg-clip-text text-transparent">HyperScale</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                Tim kami siap membantu Anda menemukan solusi terbaik untuk kebutuhan platform dan aplikasi Anda. Mari diskusikan project Anda!
            </p>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L60 110C120 100 240 80 360 70C480 60 600 60 720 65C840 70 960 80 1080 85C1200 90 1320 90 1380 90L1440 90V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white" />
        </svg>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-12 items-start">
        <!-- Contact Info -->
        <div class="space-y-8 animate-fadeInLeft">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Kami ingin mendengar dari Anda</h2>
                <p class="text-gray-600 text-lg">
                    Sampaikan kebutuhan atau pertanyaan Anda melalui formulir di samping. Tim kami akan merespon dalam 24 jam pada hari kerja.
                </p>
            </div>

            <div class="grid sm:grid-cols-2 gap-6">
                @foreach([
                    ['icon' => 'fas fa-phone', 'title' => 'Telepon', 'primary' => '+62 888-9623-663', 'secondary' => 'Senin - Jumat, 09.00 - 18.00 WIB'],
                    ['icon' => 'fas fa-map-marker-alt', 'title' => 'Alamat', 'primary' => 'Jl. Gatot Subroto No. 25, Jakarta Selatan', 'secondary' => 'Kunjungan by appointment'],
                    ['icon' => 'fas fa-envelope-open-text', 'title' => 'Email', 'primary' => 'hello@hyperscale.id', 'secondary' => 'Support & business inquiries'],
                    ['icon' => 'fas fa-comments', 'title' => 'Komunitas', 'primary' => 'Join komunitas Discord kami untuk berdiskusi dan belajar bersama.', 'secondary' => '']
                ] as $info)
                <div class="p-6 rounded-2xl border border-gray-100 shadow-lg animate-fadeInUp">
                    <div class="w-12 h-12 rounded-xl bg-linear-to-br from-primary-500 to-primary-700 text-white flex items-center justify-center mb-4 text-xl">
                        <i class="{{ $info['icon'] }}"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $info['title'] }}</h3>
                    <p class="text-gray-600">{{ $info['primary'] }}</p>
                    @if($info['secondary'])
                    <p class="text-gray-500 text-sm">{{ $info['secondary'] }}</p>
                    @endif
                    @if($info['title'] === 'Komunitas')
                    <a href="#" class="text-primary-600 font-semibold hover:underline">Gabung Discord</a>
                    @endif
                </div>
                @endforeach
            </div>
        </div>

        <!-- Contact Form -->
        <div class="relative animate-fadeInRight" x-data="contactForm()">
            <div class="absolute -inset-1 bg-linear-to-r from-primary-500 to-primary-600 rounded-3xl blur opacity-20"></div>
            <form class="relative bg-white rounded-3xl shadow-2xl border border-gray-100 p-8 space-y-6" 
                  @submit.prevent="submitForm"
                  method="POST"
                  action="{{ route('contact.submit') }}">
                @csrf
                
                @if(session('success'))
                <div class="p-4 bg-green-50 border border-green-200 rounded-xl text-green-800">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
                @endif

                @if($errors->any())
                <div class="p-4 bg-red-50 border border-red-200 rounded-xl text-red-800">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2" for="name">Nama Lengkap</label>
                        <input id="name" name="name" type="text" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-500"
                               placeholder="Masukkan nama" 
                               value="{{ old('name') }}"
                               required />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2" for="email">Email</label>
                        <input id="email" name="email" type="email"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-500"
                               placeholder="nama@perusahaan.com"
                               value="{{ old('email') }}"
                               required />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2" for="phone">Nomor Telepon</label>
                        <input id="phone" name="phone" type="tel"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-500"
                               placeholder="0812-xxxx-xxxx"
                               value="{{ old('phone') }}" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2" for="subject">Jenis Kebutuhan</label>
                        <select id="subject" name="subject"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-500"
                                required>
                            <option value="">Pilih salah satu</option>
                            <option value="Konsultasi" {{ old('subject') == 'Konsultasi' ? 'selected' : '' }}>Konsultasi Solusi</option>
                            <option value="Demo" {{ old('subject') == 'Demo' ? 'selected' : '' }}>Demo Platform</option>
                            <option value="Kemitraan" {{ old('subject') == 'Kemitraan' ? 'selected' : '' }}>Kemitraan</option>
                            <option value="Teknis" {{ old('subject') == 'Teknis' ? 'selected' : '' }}>Pertanyaan Teknis</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2" for="message">Pesan</label>
                    <textarea id="message" name="message" rows="6"
                              class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-500"
                              placeholder="Ceritakan kebutuhan atau tantangan Anda"
                              required>{{ old('message') }}</textarea>
                </div>
                <button type="submit"
                        class="w-full inline-flex items-center justify-center px-6 py-3 bg-linear-to-r from-primary-600 via-primary-700 to-primary-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all disabled:opacity-60 disabled:cursor-not-allowed"
                        :disabled="isSubmitting">
                    <template x-if="isSubmitting">
                        <svg class="animate-spin h-5 w-5 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                        </svg>
                    </template>
                    <span x-text="isSubmitting ? 'Mengirim...' : 'Kirim Pesan'"></span>
                    <template x-if="!isSubmitting">
                        <i class="fas fa-paper-plane ml-2"></i>
                    </template>
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Support CTA Section -->
<section class="py-20 bg-linear-to-br from-primary-50 via-white to-primary-50 overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 animate-fadeInUp">
        <div class="relative bg-white rounded-3xl shadow-2xl border border-primary-100 p-10 md:p-16">
            <div class="absolute inset-0 bg-grid-white opacity-10 rounded-3xl"></div>
            <div class="relative text-center">
                <div class="inline-flex items-center space-x-2 bg-primary-100 text-primary-600 px-6 py-2 rounded-full font-semibold mb-6">
                    <i class="fas fa-life-ring"></i>
                    <span>Butuh bantuan cepat?</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Support 24/7 siap membantu</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-10">
                    Gunakan kanal support premium kami untuk akses prioritas, sesi onboarding, dan pendampingan teknis mendalam dari tim HyperScale.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="mailto:support@hyperscale.id"
                       class="inline-flex items-center justify-center px-8 py-4 bg-linear-to-r from-primary-600 via-primary-700 to-primary-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all">
                        <i class="fas fa-envelope mr-2"></i>
                        Email Support
                    </a>
                    <a href="https://wa.me/628889623663"
                       class="inline-flex items-center justify-center px-8 py-4 border border-primary-200 text-primary-600 font-semibold rounded-xl hover:bg-primary-50 transition-all">
                        <i class="fab fa-whatsapp mr-2"></i>
                        Chat WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
function contactForm() {
    return {
        isSubmitting: false,
        submitForm(event) {
            this.isSubmitting = true;
            // Form akan disubmit secara normal ke Laravel
            event.target.submit();
        }
    }
}

function toastNotification() {
    return {
        show: false,
        type: 'success',
        title: '',
        message: '',
        init() {
            // Check for success message from session
            @if(session('success'))
                this.showToast('success', 'Pesan Berhasil Dikirim', '{{ session('success') }}');
            @endif
            @if($errors->any())
                this.showToast('error', 'Gagal Mengirim Pesan', 'Silakan periksa form dan coba lagi.');
            @endif
        },
        showToast(type, title, message) {
            this.type = type;
            this.title = title;
            this.message = message;
            this.show = true;
            setTimeout(() => {
                this.hide();
            }, 5000);
        },
        hide() {
            this.show = false;
        }
    }
}
</script>
@endpush
