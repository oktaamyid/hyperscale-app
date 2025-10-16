<footer class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white overflow-hidden">
  <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary-500 via-purple-500 to-pink-500"></div>
  <div class="absolute inset-0 bg-grid-white opacity-5"></div>

  <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
      <div class="lg:col-span-1">
        <div class="flex items-center space-x-3 mb-6">
          <div
            class="w-12 h-12 bg-gradient-to-br from-primary-500 to-purple-600 rounded-xl flex items-center justify-center transform hover:rotate-6 transition-transform duration-300"
          >
            <i class="fas fa-cube text-white text-xl" aria-hidden="true"></i>
          </div>
          <span class="text-2xl font-bold bg-gradient-to-r from-primary-400 to-purple-400 bg-clip-text text-transparent"
            >HyperScale</span
          >
        </div>
        <p class="text-gray-400 mb-6 leading-relaxed">
          Platform as a Service terdepan untuk mengembangkan, deploy, dan mengelola aplikasi modern dengan mudah.
        </p>
        <div class="flex space-x-4">
          {#each [
            { href: 'https://twitter.com', icon: 'fab fa-twitter', label: 'Twitter' },
            { href: 'https://linkedin.com', icon: 'fab fa-linkedin', label: 'LinkedIn' },
            { href: 'https://github.com', icon: 'fab fa-github', label: 'GitHub' },
            { href: 'https://youtube.com', icon: 'fab fa-youtube', label: 'YouTube' }
          ] as social}
            <a
              href={social.href}
              target="_blank"
              rel="noopener noreferrer"
              class="group w-10 h-10 bg-white/5 hover:bg-gradient-to-br hover:from-primary-500 hover:to-purple-600 rounded-lg flex items-center justify-center transition-all duration-300"
              aria-label={social.label}
            >
              <i class={`${social.icon} text-gray-400 group-hover:text-white transition-colors`} aria-hidden="true"></i>
            </a>
          {/each}
        </div>
      </div>

      <div>
        <h3 class="text-lg font-bold mb-6 flex items-center">
          <span class="w-1 h-6 bg-gradient-to-b from-primary-500 to-purple-600 rounded-full mr-3"></span>
          Produk
        </h3>
        <ul class="space-y-3">
          {#each [
            { href: '/services', label: 'Platform Overview' },
            { href: '/services', label: 'Hosting' },
            { href: '/services', label: 'Database' },
            { href: '/services', label: 'Analytics' }
          ] as link}
            <li>
              <a
                href={link.href}
                class="text-gray-400 hover:text-white hover:translate-x-1 inline-block transition-all duration-300 group"
              >
                <i
                  class="fas fa-chevron-right text-primary-500 mr-2 text-xs opacity-0 group-hover:opacity-100 transition-opacity"
                  aria-hidden="true"
                ></i>
                {link.label}
              </a>
            </li>
          {/each}
        </ul>
      </div>

      <div>
        <h3 class="text-lg font-bold mb-6 flex items-center">
          <span class="w-1 h-6 bg-gradient-to-b from-primary-500 to-purple-600 rounded-full mr-3"></span>
          Perusahaan
        </h3>
        <ul class="space-y-3">
          {#each [
            { href: '/about', label: 'Tentang Kami' },
            { href: '/about', label: 'Tim' },
            { href: '#', label: 'Karir' },
            { href: '/contact', label: 'Kontak' }
          ] as link}
            <li>
              <a
                href={link.href}
                class="text-gray-400 hover:text-white hover:translate-x-1 inline-block transition-all duration-300 group"
              >
                <i
                  class="fas fa-chevron-right text-primary-500 mr-2 text-xs opacity-0 group-hover:opacity-100 transition-opacity"
                  aria-hidden="true"
                ></i>
                {link.label}
              </a>
            </li>
          {/each}
        </ul>
      </div>

      <div>
        <h3 class="text-lg font-bold mb-6 flex items-center">
          <span class="w-1 h-6 bg-gradient-to-b from-primary-500 to-purple-600 rounded-full mr-3"></span>
          Support
        </h3>
        <ul class="space-y-3">
          {#each [
            { href: '#', label: 'Dokumentasi' },
            { href: '#', label: 'API Reference' },
            { href: '/contact', label: 'Help Center' },
            { href: '#', label: 'Status Page' }
          ] as link}
            <li>
              <a
                href={link.href}
                class="text-gray-400 hover:text-white hover:translate-x-1 inline-block transition-all duration-300 group"
              >
                <i
                  class="fas fa-chevron-right text-primary-500 mr-2 text-xs opacity-0 group-hover:opacity-100 transition-opacity"
                  aria-hidden="true"
                ></i>
                {link.label}
              </a>
            </li>
          {/each}
        </ul>
      </div>
    </div>

    <div class="border-t border-white/10 pt-8">
      <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <p class="text-gray-400 text-sm">
          © {new Date().getFullYear()} HyperScale. All rights reserved. Made with
          <i class="fas fa-heart text-red-500 mx-1 animate-pulse" aria-hidden="true"></i>
          in Indonesia
        </p>
        <div class="flex items-center space-x-6 text-sm">
          <a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a>
          <span class="text-gray-700">•</span>
          <a href="#" class="text-gray-400 hover:text-white transition-colors">Terms of Service</a>
          <span class="text-gray-700">•</span>
          <a href="#" class="text-gray-400 hover:text-white transition-colors">Cookie Policy</a>
        </div>
      </div>
    </div>
  </div>
</footer>
