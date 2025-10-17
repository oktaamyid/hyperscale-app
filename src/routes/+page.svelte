<script lang="ts">
  import { animateOnScroll } from '$lib/actions/animateOnScroll';

  type CounterKey = 'clients' | 'projects' | 'uptime' | 'support';

  const counterTargets: Record<CounterKey, { target: number; decimals?: number }> = {
    clients: { target: 500 },
    projects: { target: 1000 },
    uptime: { target: 99.9, decimals: 1 },
    support: { target: 24 }
  };

  let counters: Record<CounterKey, number> = {
    clients: 0,
    projects: 0,
    uptime: 0,
    support: 0
  };

  let countersStarted = false;

  function startCounters() {
    if (countersStarted) return;
    countersStarted = true;

    (Object.keys(counterTargets) as CounterKey[]).forEach((key) => {
      const { target, decimals = 0 } = counterTargets[key];
      const step = target / 100;

      const timer = setInterval(() => {
        const current = counters[key];
        if (current >= target) {
          counters = { ...counters, [key]: Number(target.toFixed(decimals)) };
          clearInterval(timer);
          return;
        }

        const next = Math.min(target, current + step);
        counters = { ...counters, [key]: Number(next.toFixed(decimals)) };
      }, 20);
    });
  }

  function statsObserver(node: HTMLElement) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          startCounters();
          observer.disconnect();
        }
      });
    });

    observer.observe(node);

    return {
      destroy() {
        observer.disconnect();
      }
    };
  }
</script>

<!-- Hero Section -->
<section class="relative pt-20 pb-32 bg-gradient-to-br from-gray-900 via-primary-900 to-gray-800 overflow-hidden">
  <div class="absolute inset-0">
    <div class="absolute top-20 -left-20 w-96 h-96 bg-primary-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
    <div class="absolute top-40 -right-20 w-96 h-96 bg-primary-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
    <div class="absolute -bottom-20 left-40 w-96 h-96 bg-primary-700 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    <div class="absolute inset-0 bg-grid-white opacity-5"></div>
    <div class="absolute top-32 left-1/4 animate-float">
      <div class="w-16 h-16 bg-white/10 backdrop-blur-sm rounded-xl flex items-center justify-center transform -rotate-12">
        <i class="fas fa-code text-white text-xl" aria-hidden="true"></i>
      </div>
    </div>
    <div class="absolute top-48 right-1/4 animate-float animation-delay-2000">
      <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-lg flex items-center justify-center transform -rotate-12">
        <i class="fas fa-database text-white" aria-hidden="true"></i>
      </div>
    </div>
    <div class="absolute bottom-32 left-1/3 animate-float animation-delay-4000">
      <div class="w-14 h-14 bg-white/10 backdrop-blur-sm rounded-xl flex items-center justify-center">
        <i class="fas fa-cloud text-white text-lg" aria-hidden="true"></i>
      </div>
    </div>
  </div>

  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20">
    <div class="text-center mb-12" use:animateOnScroll>
      <div class="inline-flex items-center space-x-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-6 py-2 mb-8">
        <span class="relative flex h-2 w-2">
          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
          <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
        </span>
        <span class="text-white text-sm font-medium">Platform PaaS Terpercaya</span>
      </div>

      <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-white leading-tight mb-6">
        Deploy Aplikasi Anda
        <br />
        <span class="bg-gradient-to-r from-primary-400 to-primary-300 bg-clip-text text-transparent">
          Dalam Hitungan Detik
        </span>
      </h1>

      <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto mb-10 leading-relaxed">
        Platform cloud terdepan untuk developer modern. Build, deploy, dan scale aplikasi Anda dengan teknologi cloud-native.
      </p>

      <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
        <a
          href="/contact"
          class="group relative inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white bg-primary-600 rounded-xl overflow-hidden shadow-2xl hover:shadow-primary-500/50 transition-all duration-300 transform hover:scale-105"
        >
          <span class="relative z-10 flex items-center">
            <i class="fas fa-rocket mr-2" aria-hidden="true"></i>
            Mulai Gratis
          </span>
          <div class="absolute inset-0 bg-primary-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </a>
        <a
          href="/services"
          class="group inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white border-2 border-white/30 backdrop-blur-sm rounded-xl hover:bg-white/10 hover:border-white/50 transition-all duration-300"
        >
          <span class="flex items-center">
            Lihat Demo
            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform" aria-hidden="true"></i>
          </span>
        </a>
      </div>

      <div class="grid grid-cols-3 gap-8 max-w-2xl mx-auto">
        <div class="text-center">
          <div class="text-3xl md:text-4xl font-bold text-white mb-1">500+</div>
          <div class="text-sm text-gray-400">Active Users</div>
        </div>
        <div class="text-center border-l border-r border-white/20">
          <div class="text-3xl md:text-4xl font-bold text-white mb-1">99.9%</div>
          <div class="text-sm text-gray-400">Uptime</div>
        </div>
        <div class="text-center">
          <div class="text-3xl md:text-4xl font-bold text-white mb-1">24/7</div>
          <div class="text-sm text-gray-400">Support</div>
        </div>
      </div>
    </div>

    <div class="relative max-w-5xl mx-auto" use:animateOnScroll>
  <div class="relative">
  <div class="absolute -inset-4 bg-gradient-to-r from-primary-500 to-primary-600 rounded-3xl blur-2xl opacity-30"></div>
        <div class="relative bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl overflow-hidden shadow-2xl">
          <div class="flex items-center justify-between px-6 py-4 border-b border-white/10">
            <div class="flex space-x-2">
              <div class="w-3 h-3 bg-red-500 rounded-full"></div>
              <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
              <div class="w-3 h-3 bg-green-500 rounded-full"></div>
            </div>
            <div class="text-white/60 text-sm font-mono">hyperscale-dashboard</div>
            <div class="text-white/40">
              <i class="fas fa-window-maximize" aria-hidden="true"></i>
            </div>
          </div>

          <div class="p-8">
            <div class="grid md:grid-cols-2 gap-6">
              <div class="bg-gray-900/50 rounded-xl p-4 border border-white/5">
                <div class="flex items-center space-x-2 mb-3">
                  <i class="fas fa-terminal text-green-400" aria-hidden="true"></i>
                  <span class="text-white/80 text-sm font-mono">Terminal</span>
                </div>
                <div class="space-y-2 font-mono text-xs">
                  <div class="text-green-400">$ git push hyperscale main</div>
                  <div class="text-white/60">Deploying to production...</div>
                  <div class="text-blue-400">✓ Build successful</div>
                  <div class="text-green-400 flex items-center">
                    <span class="animate-pulse mr-2">●</span> Live in 3.2s
                  </div>
                </div>
              </div>

              <div class="bg-gradient-to-br from-primary-500/20 to-primary-500/20 rounded-xl p-4 border border-primary-500/30">
                <div class="flex items-center justify-between mb-3">
                  <span class="text-white/80 text-sm font-semibold">Performance</span>
                  <i class="fas fa-chart-line text-green-400" aria-hidden="true"></i>
                </div>
                <div class="space-y-3">
                  <div>
                    <div class="flex justify-between text-xs text-white/60 mb-1">
                      <span>CPU Usage</span>
                      <span>23%</span>
                    </div>
                    <div class="h-2 bg-white/10 rounded-full overflow-hidden">
                      <div class="h-full bg-gradient-to-r from-green-400 to-green-500 rounded-full" style="width: 23%"></div>
                    </div>
                  </div>
                  <div>
                    <div class="flex justify-between text-xs text-white/60 mb-1">
                      <span>Memory</span>
                      <span>45%</span>
                    </div>
                    <div class="h-2 bg-white/10 rounded-full overflow-hidden">
                      <div class="h-full bg-gradient-to-r from-blue-400 to-blue-500 rounded-full" style="width: 45%"></div>
                    </div>
                  </div>
                  <div>
                    <div class="flex justify-between text-xs text-white/60 mb-1">
                      <span>Response Time</span>
                      <span>89ms</span>
                    </div>
                    <div class="h-2 bg-white/10 rounded-full overflow-hidden">
                      <div class="h-full bg-gradient-to-r from-primary-400 to-primary-500 rounded-full" style="width: 65%"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="absolute -top-6 -right-6 bg-white/10 backdrop-blur-sm rounded-xl px-4 py-2 border border-white/20 hidden lg:block">
        <div class="flex items-center space-x-2">
          <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
          <span class="text-white text-sm font-medium">Auto Scaling Active</span>
        </div>
      </div>
      <div class="absolute -bottom-6 -left-6 bg-white/10 backdrop-blur-sm rounded-xl px-4 py-2 border border-white/20 hidden lg:block">
        <div class="flex items-center space-x-2">
          <i class="fas fa-shield-alt text-blue-400" aria-hidden="true"></i>
          <span class="text-white text-sm font-medium">SSL Secured</span>
        </div>
      </div>
    </div>
  </div>

  <div class="absolute bottom-0 left-0 right-0">
    <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto" aria-hidden="true">
      <path
        d="M0 0L60 10C120 20 240 40 360 46.7C480 53 600 47 720 43.3C840 40 960 40 1080 46.7C1200 53 1320 67 1380 73.3L1440 80V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0V0Z"
        fill="white"
      />
    </svg>
  </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-white relative overflow-hidden">
  <div class="absolute top-0 right-0 w-96 h-96 bg-primary-100 rounded-full filter blur-3xl opacity-30 -translate-y-1/2 translate-x-1/2"></div>
  <div class="absolute bottom-0 left-0 w-96 h-96 bg-primary-100 rounded-full filter blur-3xl opacity-30 translate-y-1/2 -translate-x-1/2"></div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="text-center mb-16" use:animateOnScroll>
      <div class="inline-block bg-primary-100 rounded-full px-6 py-2 mb-4">
        <span class="text-primary-600 font-semibold text-sm">🚀 Powerful Features</span>
      </div>
      <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
        Mengapa Memilih
        <span class="bg-gradient-to-r from-primary-600 to-primary-500 bg-clip-text text-transparent">HyperScale</span>?
      </h2>
      <p class="text-xl text-gray-600 max-w-3xl mx-auto">
        Platform kami dirancang untuk memberikan pengalaman development yang seamless dengan fitur-fitur canggih dan performa tinggi.
      </p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      <div
        class="group relative bg-gradient-to-br from-white to-gray-50 rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:border-primary-200 transition-all duration-500 overflow-hidden"
        use:animateOnScroll
      >
        <div class="absolute inset-0 bg-primary-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative z-10">
          <div class="w-16 h-16 bg-primary-500 rounded-2xl flex items-center justify-center mb-6 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
            <i class="fas fa-rocket text-white text-2xl" aria-hidden="true"></i>
          </div>
          <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-primary-600 transition-colors">Deploy Instant</h3>
          <p class="text-gray-600 leading-relaxed">
            Deploy aplikasi Anda dalam hitungan detik dengan zero-downtime deployment dan automatic rollback.
          </p>
          <div class="mt-4 flex items-center text-primary-600 font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
            <span class="text-sm">Learn more</span>
            <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform" aria-hidden="true"></i>
          </div>
        </div>
        <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-primary-200 to-transparent rounded-bl-full opacity-20"></div>
      </div>

      <div
        class="group relative bg-gradient-to-br from-white to-gray-50 rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:border-gray-300 transition-all duration-500 overflow-hidden"
        use:animateOnScroll
      >
        <div class="absolute inset-0 bg-gray-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative z-10">
          <div class="w-16 h-16 bg-gray-700 rounded-2xl flex items-center justify-center mb-6 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
            <i class="fas fa-expand-arrows-alt text-white text-2xl" aria-hidden="true"></i>
          </div>
          <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-gray-700 transition-colors">Auto Scaling</h3>
          <p class="text-gray-600 leading-relaxed">
            Skala aplikasi Anda secara otomatis berdasarkan traffic dan beban kerja tanpa intervensi manual.
          </p>
          <div class="mt-4 flex items-center text-gray-700 font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
            <span class="text-sm">Learn more</span>
            <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform" aria-hidden="true"></i>
          </div>
        </div>
        <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-gray-200 to-transparent rounded-bl-full opacity-20"></div>
      </div>

      <div
        class="group relative bg-gradient-to-br from-white to-gray-50 rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:border-primary-200 transition-all duration-500 overflow-hidden"
        use:animateOnScroll
      >
        <div class="absolute inset-0 bg-primary-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative z-10">
          <div class="w-16 h-16 bg-primary-600 rounded-2xl flex items-center justify-center mb-6 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
            <i class="fas fa-shield-alt text-white text-2xl" aria-hidden="true"></i>
          </div>
          <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-primary-600 transition-colors">Keamanan Terjamin</h3>
          <p class="text-gray-600 leading-relaxed">
            Enterprise-grade security dengan SSL encryption, DDoS protection, dan compliance standards.
          </p>
          <div class="mt-4 flex items-center text-primary-600 font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
            <span class="text-sm">Learn more</span>
            <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform" aria-hidden="true"></i>
          </div>
        </div>
        <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-primary-200 to-transparent rounded-bl-full opacity-20"></div>
      </div>

      <div
        class="group relative bg-gradient-to-br from-white to-gray-50 rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:border-gray-300 transition-all duration-500 overflow-hidden"
        use:animateOnScroll
      >
        <div class="absolute inset-0 bg-gray-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative z-10">
          <div class="w-16 h-16 bg-gray-800 rounded-2xl flex items-center justify-center mb-6 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
            <i class="fas fa-cogs text-white text-2xl" aria-hidden="true"></i>
          </div>
          <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-gray-800 transition-colors">DevOps Friendly</h3>
          <p class="text-gray-600 leading-relaxed">
            Integrasi CI/CD, observability, dan pipeline otomatis yang mempermudah workflow tim DevOps Anda.
          </p>
          <div class="mt-4 flex items-center text-gray-800 font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
            <span class="text-sm">Learn more</span>
            <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform" aria-hidden="true"></i>
          </div>
        </div>
        <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-gray-200 to-transparent rounded-bl-full opacity-20"></div>
      </div>

      <div
        class="group relative bg-gradient-to-br from-white to-gray-50 rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:border-primary-200 transition-all duration-500 overflow-hidden"
        use:animateOnScroll
      >
        <div class="absolute inset-0 bg-primary-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative z-10">
          <div class="w-16 h-16 bg-primary-700 rounded-2xl flex items-center justify-center mb-6 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
            <i class="fas fa-chart-line text-white text-2xl" aria-hidden="true"></i>
          </div>
          <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-primary-700 transition-colors">Analytics Mendalam</h3>
          <p class="text-gray-600 leading-relaxed">
            Insight real-time mengenai performa aplikasi dengan dashboard interaktif dan alert cerdas.
          </p>
          <div class="mt-4 flex items-center text-primary-700 font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
            <span class="text-sm">Learn more</span>
            <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform" aria-hidden="true"></i>
          </div>
        </div>
        <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-primary-200 to-transparent rounded-bl-full opacity-20"></div>
      </div>

      <div
        class="group relative bg-gradient-to-br from-white to-gray-50 rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:border-gray-300 transition-all duration-500 overflow-hidden"
        use:animateOnScroll
      >
        <div class="absolute inset-0 bg-gray-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative z-10">
          <div class="w-16 h-16 bg-gray-600 rounded-2xl flex items-center justify-center mb-6 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
            <i class="fas fa-headset text-white text-2xl" aria-hidden="true"></i>
          </div>
          <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-gray-600 transition-colors">Support 24/7</h3>
          <p class="text-gray-600 leading-relaxed">
            Tim support ahli siap membantu kapan pun Anda membutuhkan dengan waktu respons yang cepat.
          </p>
          <div class="mt-4 flex items-center text-gray-600 font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
            <span class="text-sm">Learn more</span>
            <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform" aria-hidden="true"></i>
          </div>
        </div>
        <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-gray-200 to-transparent rounded-bl-full opacity-20"></div>
      </div>
    </div>

    <div class="mt-16 text-center" use:animateOnScroll>
      <a
        href="/contact"
        class="inline-flex items-center px-8 py-4 bg-white text-gray-900 rounded-xl font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl"
      >
        <span>Join Our Growing Community</span>
        <i class="fas fa-arrow-right ml-2" aria-hidden="true"></i>
      </a>
    </div>
  </div>
</section>

<!-- Stats Section -->
<section
  class="relative py-24 bg-gradient-to-br from-gray-900 via-primary-900 to-gray-800 overflow-hidden"
  use:statsObserver
>
  <div class="absolute inset-0">
    <div class="absolute top-0 left-0 w-full h-full bg-grid-white opacity-5"></div>
    <div class="absolute top-20 left-20 w-72 h-72 bg-primary-500 rounded-full filter blur-3xl opacity-20 animate-blob"></div>
    <div class="absolute bottom-20 right-20 w-96 h-96 bg-primary-600 rounded-full filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="text-center mb-16" use:animateOnScroll>
      <div class="inline-flex items-center space-x-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-6 py-2 mb-6">
        <span class="relative flex h-2 w-2">
          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
          <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
        </span>
        <span class="text-white text-sm font-medium">Real-time Statistics</span>
      </div>
      <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">
        Digunakan oleh
        <span class="bg-gradient-to-r from-primary-400 to-primary-300 bg-clip-text text-transparent">banyak developer</span>
      </h2>
      <p class="text-xl text-gray-300 max-w-2xl mx-auto">
        Angka-angka yang membuktikan komitmen kami untuk excellence
      </p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
      <div class="group relative bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-8 hover:bg-white/10 hover:border-white/20 transition-all duration-500" use:animateOnScroll>
        <div class="absolute inset-0 bg-primary-500/10 opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl"></div>
        <div class="relative z-10 text-center">
          <div class="w-16 h-16 bg-primary-500 rounded-2xl flex items-center justify-center mx-auto mb-4 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
            <i class="fas fa-users text-white text-2xl" aria-hidden="true"></i>
          </div>
          <div class="text-5xl md:text-6xl font-extrabold text-white mb-2">{Math.round(counters.clients)}+</div>
          <div class="text-lg text-gray-300 font-medium">Happy Clients</div>
          <div class="mt-3 text-sm text-primary-300">↑ 23% this month</div>
        </div>
      </div>

      <div class="group relative bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-8 hover:bg-white/10 hover:border-white/20 transition-all duration-500" use:animateOnScroll>
        <div class="absolute inset-0 bg-gray-500/10 opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl"></div>
        <div class="relative z-10 text-center">
          <div class="w-16 h-16 bg-gray-700 rounded-2xl flex items-center justify-center mx-auto mb-4 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
            <i class="fas fa-rocket text-white text-2xl" aria-hidden="true"></i>
          </div>
          <div class="text-5xl md:text-6xl font-extrabold text-white mb-2">{Math.round(counters.projects)}+</div>
          <div class="text-lg text-gray-300 font-medium">Projects Deployed</div>
          <div class="mt-3 text-sm text-gray-300">↑ 156 this week</div>
        </div>
      </div>

      <div class="group relative bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-8 hover:bg-white/10 hover:border-white/20 transition-all duration-500" use:animateOnScroll>
        <div class="absolute inset-0 bg-primary-500/10 opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl"></div>
        <div class="relative z-10 text-center">
          <div class="w-16 h-16 bg-primary-600 rounded-2xl flex items-center justify-center mx-auto mb-4 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
            <i class="fas fa-server text-white text-2xl" aria-hidden="true"></i>
          </div>
          <div class="text-5xl md:text-6xl font-extrabold text-white mb-2">{counters.uptime.toFixed(1)}%</div>
          <div class="text-lg text-gray-300 font-medium">Uptime</div>
          <div class="mt-3 text-sm text-primary-300">Last 30 days</div>
        </div>
      </div>

      <div class="group relative bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-8 hover:bg-white/10 hover:border-white/20 transition-all duration-500" use:animateOnScroll>
        <div class="absolute inset-0 bg-gray-500/10 opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl"></div>
        <div class="relative z-10 text-center">
          <div class="w-16 h-16 bg-gray-800 rounded-2xl flex items-center justify-center mx-auto mb-4 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
            <i class="fas fa-headphones-alt text-white text-2xl" aria-hidden="true"></i>
          </div>
          <div class="text-5xl md:text-6xl font-extrabold text-white mb-2">{Math.round(counters.support)}/7</div>
          <div class="text-lg text-gray-300 font-medium">Support Available</div>
          <div class="mt-3 text-sm text-gray-300">Average response: 45min</div>
        </div>
      </div>
    </div>

    <div class="mt-16 text-center" use:animateOnScroll>
      <a
        href="/contact"
        class="inline-flex items-center px-8 py-4 bg-white text-gray-900 rounded-xl font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-xl"
      >
        <span>Join Our Growing Community</span>
        <i class="fas fa-arrow-right ml-2" aria-hidden="true"></i>
      </a>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="relative py-24 bg-gradient-to-br from-primary-50 via-white to-gray-50 overflow-hidden">
  <div class="absolute inset-0">
    <div class="absolute top-0 right-0 w-96 h-96 bg-primary-200 rounded-full filter blur-3xl opacity-30 -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-gray-200 rounded-full filter blur-3xl opacity-30 translate-y-1/2 -translate-x-1/2"></div>
    <div class="absolute top-20 left-1/4 animate-float animation-delay-2000">
      <i class="fas fa-cloud text-primary-300 text-4xl opacity-30" aria-hidden="true"></i>
    </div>
    <div class="absolute bottom-20 right-1/4 animate-float animation-delay-4000">
      <i class="fas fa-rocket text-gray-400 text-3xl opacity-30" aria-hidden="true"></i>
    </div>
  </div>

  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="relative bg-gradient-to-r from-primary-600 to-primary-700 rounded-3xl p-12 md:p-16 shadow-2xl overflow-hidden" use:animateOnScroll>
      <div class="absolute inset-0 bg-grid-white opacity-10"></div>
      <div class="absolute -top-24 -right-24 w-96 h-96 bg-white rounded-full filter blur-3xl opacity-10"></div>
      <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-white rounded-full filter blur-3xl opacity-10"></div>

      <div class="relative z-10 text-center">
        <div class="inline-flex items-center space-x-2 bg-white/20 backdrop-blur-sm border border-white/30 rounded-full px-6 py-2 mb-8">
          <i class="fas fa-star text-yellow-300" aria-hidden="true"></i>
          <span class="text-white text-sm font-medium">Limited Time Offer</span>
        </div>

        <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 leading-tight">
          Siap untuk Memulai
          <br />
          <span class="bg-gradient-to-r from-white to-gray-200 bg-clip-text text-transparent">
            Perjalanan Cloud Anda?
          </span>
        </h2>

        <p class="text-xl md:text-2xl text-white/90 mb-10 max-w-3xl mx-auto leading-relaxed">
          Bergabunglah dengan developer lainnya yang telah mempercayai HyperScale untuk mengembangkan aplikasi mereka.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-10">
          <a
            href="/contact"
            class="group relative inline-flex items-center justify-center px-10 py-5 bg-white text-primary-600 rounded-2xl font-bold text-lg shadow-2xl hover:shadow-white/50 transition-all duration-300 transform hover:scale-105 overflow-hidden"
          >
            <span class="relative z-10 flex items-center">
              <i class="fas fa-rocket mr-3" aria-hidden="true"></i>
              Mulai Sekarang
            </span>
            <div class="absolute inset-0 bg-gradient-to-r from-primary-50 to-gray-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
          </a>
          <a
            href="/services"
            class="group inline-flex items-center justify-center px-10 py-5 border-2 border-white text-white rounded-2xl font-bold text-lg backdrop-blur-sm hover:bg-white/10 transition-all duration-300"
          >
            <span class="flex items-center">
              Lihat Harga Lengkap
              <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform" aria-hidden="true"></i>
            </span>
          </a>
        </div>

        <div class="grid md:grid-cols-3 gap-6 max-w-4xl mx-auto">
          <div class="flex items-center justify-center space-x-2 text-white/90">
            <i class="fas fa-check-circle text-green-300" aria-hidden="true"></i>
            <span>No Credit Card Required</span>
          </div>
          <div class="flex items-center justify-center space-x-2 text-white/90">
            <i class="fas fa-check-circle text-green-300" aria-hidden="true"></i>
            <span>Cancel Anytime</span>
          </div>
          <div class="flex items-center justify-center space-x-2 text-white/90">
            <i class="fas fa-check-circle text-green-300" aria-hidden="true"></i>
            <span>24/7 Expert Support</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
