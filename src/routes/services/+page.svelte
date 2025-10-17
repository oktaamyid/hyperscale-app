<script lang="ts">
  import { animateOnScroll } from '$lib/actions/animateOnScroll';
</script>

<section class="relative pt-20 pb-32 bg-gradient-to-br from-gray-900 via-primary-900 to-gray-800 overflow-hidden">
  <div class="absolute inset-0">
    <div class="absolute top-16 -left-16 w-80 h-80 bg-primary-500 rounded-full filter blur-3xl opacity-30 animate-blob"></div>
    <div class="absolute top-32 -right-16 w-80 h-80 bg-primary-600 rounded-full filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
    <div class="absolute bottom-24 left-1/2 w-72 h-72 bg-primary-700 rounded-full filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>
    <div class="absolute inset-0 bg-grid-white opacity-5"></div>
  </div>

  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24">
    <div class="text-center mb-16" use:animateOnScroll>
      <h1 class="text-5xl md:text-7xl font-bold text-white mb-6">
        Layanan
        <span class="bg-gradient-to-r from-primary-400 to-primary-300 bg-clip-text text-transparent">HyperScale</span>
      </h1>
      <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
        Infrastruktur cloud modern dengan fitur lengkap untuk membantu tim Anda membangun, mengelola, dan menskalakan aplikasi dalam hitungan menit.
      </p>
      <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
        <a
          href="#pricing"
          class="inline-flex items-center justify-center px-8 py-4 bg-primary-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all"
        >
          <i class="fas fa-tags mr-2" aria-hidden="true"></i>
          Lihat Harga
        </a>
        <a
          href="/contact"
          class="inline-flex items-center justify-center px-8 py-4 border border-white/40 text-white font-semibold rounded-xl hover:bg-white/10 transition-all"
        >
          <i class="fas fa-headset mr-2" aria-hidden="true"></i>
          Konsultasi Gratis
        </a>
      </div>
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
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16" use:animateOnScroll>
      <div class="inline-flex items-center px-4 py-2 bg-primary-100 text-primary-600 rounded-full font-semibold mb-4">
        <i class="fas fa-layer-group mr-2" aria-hidden="true"></i>
        <span>Platform Capabilities</span>
      </div>
      <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Semua yang Anda Butuhkan</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">
        HyperScale menawarkan solusi menyeluruh mulai dari hosting, database, observability, hingga workflow DevOps otomatis.
      </p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      {#each [
        {
          icon: 'fas fa-server',
          title: 'Managed Hosting',
          description: 'Deploy aplikasi Node.js, Laravel, Go, atau container dengan auto scaling, zero-downtime deployment, dan rollback instan.'
        },
        {
          icon: 'fas fa-database',
          title: 'Database as a Service',
          description: 'PostgreSQL, MySQL, Redis, dan MongoDB dengan automated backup, point-in-time recovery, serta pemantauan performa.'
        },
        {
          icon: 'fas fa-chart-area',
          title: 'Observability',
          description: 'Monitoring terpadu dengan metrics, logs, tracing, dan alert pintar untuk menjaga reliabilitas aplikasi.'
        },
        {
          icon: 'fas fa-lock',
          title: 'Security & Compliance',
          description: 'Enkripsi end-to-end, WAF, DDoS protection, dan sertifikasi keamanan untuk memenuhi standar enterprise.'
        },
        {
          icon: 'fas fa-code-branch',
          title: 'CI/CD Otomatis',
          description: 'Pipeline bawaan terintegrasi GitHub/GitLab dengan preview deployments dan workflow approvals.'
        },
        {
          icon: 'fas fa-robot',
          title: 'AI & Edge Ready',
          description: 'Menjalankan workload AI, cron jobs, serta edge functions untuk pengalaman pengguna ultra cepat.'
        }
      ] as feature}
        <div class="group bg-white border border-gray-100 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2" use:animateOnScroll>
          <div class="w-14 h-14 flex items-center justify-center rounded-xl bg-primary-500 text-white text-2xl mb-6">
            <i class={feature.icon} aria-hidden="true"></i>
          </div>
          <h3 class="text-2xl font-semibold text-gray-900 mb-4">{feature.title}</h3>
          <p class="text-gray-600 leading-relaxed">{feature.description}</p>
        </div>
      {/each}
    </div>
  </div>
</section>

<section id="pricing" class="py-20 bg-gradient-to-br from-primary-50 via-white to-gray-50 overflow-hidden">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="text-center mb-16" use:animateOnScroll>
      <div class="inline-flex items-center px-4 py-2 bg-white text-primary-600 rounded-full font-semibold shadow-sm mb-4">
        <i class="fas fa-wallet mr-2" aria-hidden="true"></i>
        <span>Paket Harga Fleksibel</span>
      </div>
      <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Sesuaikan Dengan Kebutuhan Anda</h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">
        Dari startup hingga enterprise, kami menyediakan paket terukur yang dapat dikustomisasi sesuai stage bisnis Anda.
      </p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
      {#each [
        {
          name: 'Starter',
          price: 'Rp 499K',
          description: 'Cocok untuk prototipe dan aplikasi kecil dengan kebutuhan resource ringan.',
          features: ['2 vCPU & 4GB RAM', 'Database PostgreSQL 10GB', 'Bandwidth 1TB', 'Support via email']
        },
        {
          name: 'Growth',
          price: 'Rp 1,49JT',
          popular: true,
          description: 'Platform andal untuk aplikasi produksi dengan traffic menengah hingga tinggi.',
          features: ['4 vCPU & 8GB RAM', 'Database PostgreSQL 50GB', 'Bandwidth 3TB', 'Support 24/7 + SLA 99.9%']
        },
        {
          name: 'Enterprise',
          price: 'Hubungi Kami',
          description: 'Solusi kustom dengan kebutuhan compliance, keamanan, dan integrasi kompleks.',
          features: ['Cluster dedicated', 'Support prioritas', 'Consulting architecture', 'Onboarding & training']
        }
      ] as tier}
        <div
          class="relative bg-white rounded-3xl border border-gray-100 shadow-lg hover:shadow-2xl transition-all duration-300 p-8 flex flex-col"
          use:animateOnScroll
        >
          {#if tier.popular}
            <span class="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1 bg-primary-500 text-white text-sm font-semibold rounded-full shadow">
              Paling Populer
            </span>
          {/if}
          <h3 class="text-2xl font-bold text-gray-900 mb-2 text-center">{tier.name}</h3>
          <p class="text-4xl font-extrabold text-primary-600 text-center mb-4">{tier.price}</p>
          <p class="text-gray-600 text-center mb-6">{tier.description}</p>
          <ul class="space-y-3 text-gray-600 flex-1">
            {#each tier.features as feature}
              <li class="flex items-start">
                <i class="fas fa-check text-primary-500 mt-1 mr-3" aria-hidden="true"></i>
                <span>{feature}</span>
              </li>
            {/each}
          </ul>
          <a
            href="/contact"
            class="mt-8 inline-flex items-center justify-center px-6 py-3 rounded-xl font-semibold transition-all"
            class:bg-gradient-to-r={tier.popular}
            class:from-primary-600={tier.popular}
            class:to-primary-700={tier.popular}
            class:text-white={tier.popular}
            class:border={!tier.popular}
            class:border-primary-200={!tier.popular}
            class:text-primary-600={!tier.popular}
            class:hover\:bg-primary-50={!tier.popular}
          >
            <span>Mulai Sekarang</span>
            <i class="fas fa-arrow-right ml-2" aria-hidden="true"></i>
          </a>
        </div>
      {/each}
    </div>
  </div>
</section>

<section class="py-20 bg-white">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="relative bg-gradient-to-r from-primary-600 to-primary-700 rounded-3xl p-12 md:p-16 shadow-2xl overflow-hidden" use:animateOnScroll>
      <div class="absolute inset-0 bg-grid-white opacity-10"></div>
      <div class="relative text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
          Siap mempercepat pengembangan aplikasi Anda?
        </h2>
        <p class="text-xl text-white/90 max-w-3xl mx-auto mb-10">
          Coba HyperScale gratis selama 30 hari dan nikmati pengalaman deploy aplikasi yang cepat, aman, dan dapat diskalakan.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <a
            href="/contact"
            class="inline-flex items-center justify-center px-10 py-4 bg-white text-primary-600 font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all"
          >
            <i class="fas fa-rocket mr-2" aria-hidden="true"></i>
            Mulai Sekarang
          </a>
          <a
            href="/"
            class="inline-flex items-center justify-center px-10 py-4 border border-white/70 text-white font-semibold rounded-xl hover:bg-white/10 transition-all"
          >
            <i class="fas fa-play mr-2" aria-hidden="true"></i>
            Lihat Demo Platform
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
