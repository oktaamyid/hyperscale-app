<script lang="ts">
  import { animateOnScroll } from '$lib/actions/animateOnScroll';

  type ToastType = 'success' | 'error';
  type Toast = {
    id: number;
    type: ToastType;
    title: string;
    message: string;
  };

  let toasts: Toast[] = [];

  let formData = {
    name: '',
    email: '',
    phone: '',
    subject: '',
    message: ''
  };

  let isSubmitting = false;

  function showToast(type: ToastType, title: string, message: string) {
    const id = Date.now();
    toasts = [...toasts, { id, type, title, message }];
    setTimeout(() => hideToast(id), 5000);
  }

  function hideToast(id: number) {
    toasts = toasts.filter((toast) => toast.id !== id);
  }

  async function handleSubmit(event: SubmitEvent) {
    event.preventDefault();
    if (isSubmitting) return;

    isSubmitting = true;

    try {
      const payload = new FormData();
      payload.append('name', formData.name);
      payload.append('email', formData.email);
      payload.append('phone', formData.phone);
      payload.append('inquiry_type', formData.subject);
      payload.append('message', formData.message);
      payload.append('_subject', 'Pesan Baru dari Website HyperScale');
      payload.append('_captcha', 'false');
      payload.append('_template', 'table');
      payload.append('_autoresponse', 'Terima kasih telah menghubungi HyperScale. Tim kami akan segera merespons dalam 24 jam.');

      const response = await fetch('https://formsubmit.co/raffayudapratama20@gmail.com', {
        method: 'POST',
        body: payload
      });

      if (!response.ok) {
        throw new Error('Request failed');
      }

      showToast('success', 'Pesan Berhasil Dikirim', 'Tim kami akan menghubungi Anda dalam 24 jam.');
      formData = { name: '', email: '', phone: '', subject: '', message: '' };
    } catch (error) {
      console.error(error);
      showToast('error', 'Gagal Mengirim Pesan', 'Terjadi kesalahan. Silakan coba lagi atau hubungi kami via WhatsApp.');
    } finally {
      isSubmitting = false;
    }
  }
</script>

<div class="toast-container" aria-live="polite">
  {#each toasts as toast (toast.id)}
    <div class={`toast ${toast.type} show`} role="status">
      <div class="toast-header">
        <div class="toast-icon">
          <i class={`fas ${toast.type === 'success' ? 'fa-check' : 'fa-exclamation-triangle'}`} aria-hidden="true"></i>
        </div>
        <div class="toast-title">{toast.title}</div>
        <button class="toast-close" type="button" on:click={() => hideToast(toast.id)} aria-label="Tutup notifikasi">
          <i class="fas fa-times" aria-hidden="true"></i>
        </button>
      </div>
      <div class="toast-message">{toast.message}</div>
      <div class="toast-progress"></div>
    </div>
  {/each}
</div>

<section class="relative pt-20 pb-32 bg-gradient-to-br from-gray-900 via-primary-900 to-purple-900 overflow-hidden">
  <div class="absolute inset-0">
    <div class="absolute top-20 -left-20 w-96 h-96 bg-primary-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
    <div class="absolute top-40 -right-20 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
    <div class="absolute -bottom-20 left-1/2 w-96 h-96 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    <div class="absolute inset-0 bg-grid-white opacity-5"></div>
  </div>

  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24">
    <div class="text-center mb-16" use:animateOnScroll>
      <div class="flex justify-center space-x-4 mb-8">
        <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-lg flex items-center justify-center animate-float">
          <i class="fas fa-envelope text-white text-xl" aria-hidden="true"></i>
        </div>
        <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-lg flex items-center justify-center animate-float animation-delay-2000">
          <i class="fas fa-phone text-white text-xl" aria-hidden="true"></i>
        </div>
        <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-lg flex items-center justify-center animate-float animation-delay-4000">
          <i class="fas fa-comments text-white text-xl" aria-hidden="true"></i>
        </div>
      </div>
      <h1 class="text-5xl md:text-7xl font-bold text-white mb-6">
        Hubungi
        <span class="bg-gradient-to-r from-primary-400 to-purple-400 bg-clip-text text-transparent">HyperScale</span>
      </h1>
      <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
        Tim kami siap membantu Anda menemukan solusi terbaik untuk kebutuhan platform dan aplikasi Anda. Mari diskusikan project Anda!
      </p>
    </div>
  </div>

  <div class="absolute bottom-0 left-0 right-0">
    <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <path
        d="M0 120L60 110C120 100 240 80 360 70C480 60 600 60 720 65C840 70 960 80 1080 85C1200 90 1320 90 1380 90L1440 90V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z"
        fill="white"
      />
    </svg>
  </div>
</section>

<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-12 items-start">
    <div class="space-y-8" use:animateOnScroll>
      <div>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Kami ingin mendengar dari Anda</h2>
        <p class="text-gray-600 text-lg">
          Sampaikan kebutuhan atau pertanyaan Anda melalui formulir di samping. Tim kami akan merespon dalam 24 jam pada hari kerja.
        </p>
      </div>

      <div class="grid sm:grid-cols-2 gap-6">
        <div class="p-6 rounded-2xl border border-gray-100 shadow-lg" use:animateOnScroll>
          <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-primary-500 to-purple-600 text-white flex items-center justify-center mb-4 text-xl">
            <i class="fas fa-phone" aria-hidden="true"></i>
          </div>
          <h3 class="text-xl font-semibold text-gray-900 mb-2">Telepon</h3>
          <p class="text-gray-600">+62 888-9623-663</p>
          <p class="text-gray-500 text-sm">Senin - Jumat, 09.00 - 18.00 WIB</p>
        </div>
        <div class="p-6 rounded-2xl border border-gray-100 shadow-lg" use:animateOnScroll>
          <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-primary-500 to-purple-600 text-white flex items-center justify-center mb-4 text-xl">
            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
          </div>
          <h3 class="text-xl font-semibold text-gray-900 mb-2">Alamat</h3>
          <p class="text-gray-600">Jl. Gatot Subroto No. 25, Jakarta Selatan</p>
          <p class="text-gray-500 text-sm">Kunjungan by appointment</p>
        </div>
        <div class="p-6 rounded-2xl border border-gray-100 shadow-lg" use:animateOnScroll>
          <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-primary-500 to-purple-600 text-white flex items-center justify-center mb-4 text-xl">
            <i class="fas fa-envelope-open-text" aria-hidden="true"></i>
          </div>
          <h3 class="text-xl font-semibold text-gray-900 mb-2">Email</h3>
          <p class="text-gray-600">hello@hyperscale.id</p>
          <p class="text-gray-500 text-sm">Support &amp; business inquiries</p>
        </div>
        <div class="p-6 rounded-2xl border border-gray-100 shadow-lg" use:animateOnScroll>
          <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-primary-500 to-purple-600 text-white flex items-center justify-center mb-4 text-xl">
            <i class="fas fa-comments" aria-hidden="true"></i>
          </div>
          <h3 class="text-xl font-semibold text-gray-900 mb-2">Komunitas</h3>
          <p class="text-gray-600">Join komunitas Discord kami untuk berdiskusi dan belajar bersama.</p>
          <a href="#" class="text-primary-600 font-semibold hover:underline">Gabung Discord</a>
        </div>
      </div>
    </div>

    <div class="relative" use:animateOnScroll>
      <div class="absolute -inset-1 bg-gradient-to-r from-primary-500 to-purple-500 rounded-3xl blur opacity-20"></div>
      <form class="relative bg-white rounded-3xl shadow-2xl border border-gray-100 p-8 space-y-6" on:submit|preventDefault={handleSubmit}>
        <div class="grid md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2" for="name">Nama Lengkap</label>
            <input
              id="name"
              class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-500"
              type="text"
              placeholder="Masukkan nama"
              bind:value={formData.name}
              required
            />
          </div>
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2" for="email">Email</label>
            <input
              id="email"
              class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-500"
              type="email"
              placeholder="nama@perusahaan.com"
              bind:value={formData.email}
              required
            />
          </div>
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2" for="phone">Nomor Telepon</label>
            <input
              id="phone"
              class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-500"
              type="tel"
              placeholder="0812-xxxx-xxxx"
              bind:value={formData.phone}
            />
          </div>
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2" for="subject">Jenis Kebutuhan</label>
            <select
              id="subject"
              class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-500"
              bind:value={formData.subject}
              required
            >
              <option value="">Pilih salah satu</option>
              <option value="Konsultasi">Konsultasi Solusi</option>
              <option value="Demo">Demo Platform</option>
              <option value="Kemitraan">Kemitraan</option>
              <option value="Teknis">Pertanyaan Teknis</option>
            </select>
          </div>
        </div>
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2" for="message">Pesan</label>
          <textarea
            id="message"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-500"
            rows="6"
            placeholder="Ceritakan kebutuhan atau tantangan Anda"
            bind:value={formData.message}
            required
          ></textarea>
        </div>
        <button
          type="submit"
          class="w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-primary-600 via-purple-600 to-pink-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all disabled:opacity-60 disabled:cursor-not-allowed"
          disabled={isSubmitting}
        >
          {#if isSubmitting}
            <svg class="animate-spin h-5 w-5 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
            </svg>
            Mengirim...
          {:else}
            <span>Kirim Pesan</span>
            <i class="fas fa-paper-plane ml-2" aria-hidden="true"></i>
          {/if}
        </button>
      </form>
    </div>
  </div>
</section>

<section class="py-20 bg-gradient-to-br from-primary-50 via-white to-purple-50 overflow-hidden">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10" use:animateOnScroll>
    <div class="relative bg-white rounded-3xl shadow-2xl border border-primary-100 p-10 md:p-16">
      <div class="absolute inset-0 bg-grid-white opacity-10 rounded-3xl"></div>
      <div class="relative text-center">
        <div class="inline-flex items-center space-x-2 bg-primary-100 text-primary-600 px-6 py-2 rounded-full font-semibold mb-6">
          <i class="fas fa-life-ring" aria-hidden="true"></i>
          <span>Butuh bantuan cepat?</span>
        </div>
        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Support 24/7 siap membantu</h2>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-10">
          Gunakan kanal support premium kami untuk akses prioritas, sesi onboarding, dan pendampingan teknis mendalam dari tim HyperScale.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <a
            href="mailto:support@hyperscale.id"
            class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-primary-600 via-purple-600 to-pink-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all"
          >
            <i class="fas fa-envelope mr-2" aria-hidden="true"></i>
            Email Support
          </a>
          <a
            href="https://wa.me/628889623663"
            class="inline-flex items-center justify-center px-8 py-4 border border-primary-200 text-primary-600 font-semibold rounded-xl hover:bg-primary-50 transition-all"
          >
            <i class="fab fa-whatsapp mr-2" aria-hidden="true"></i>
            Chat WhatsApp
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
