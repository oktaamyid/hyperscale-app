<script lang="ts">
  import { page } from '$app/stores';
  import { onMount } from 'svelte';

  const links = [
    { href: '/', label: 'Beranda' },
    { href: '/about', label: 'Tentang' },
    { href: '/services', label: 'Layanan' },
    { href: '/contact', label: 'Kontak' }
  ];

  let mobileMenuOpen = false;
  let scrolled = false;
  let currentPath = '/';

  const closeMobileMenu = () => {
    mobileMenuOpen = false;
  };

  const toggleMobileMenu = () => {
    mobileMenuOpen = !mobileMenuOpen;
  };

  const isActive = (href: string) => currentPath === href;

  onMount(() => {
    const handleScroll = () => {
      scrolled = window.scrollY > 20;
    };

    handleScroll();
    window.addEventListener('scroll', handleScroll);

    return () => {
      window.removeEventListener('scroll', handleScroll);
    };
  });

  $: currentPath = $page.url.pathname || '/';
</script>

<nav
  class="fixed inset-x-0 top-0 z-50 transition-all duration-300"
  class:bg-white/95={scrolled}
  class:backdrop-blur-xl={scrolled}
  class:shadow-lg={scrolled}
  class:border-b={scrolled}
  class:border-gray-200={scrolled}
>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-20">
      <a href="/" class="flex items-center space-x-3 group">
        <div class="relative">
          <div
            class="w-12 h-12 bg-gradient-to-br from-primary-500 via-purple-600 to-pink-500 rounded-xl flex items-center justify-center transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg"
          >
            <i class="fas fa-cube text-white text-xl" aria-hidden="true"></i>
          </div>
          <div
            class="absolute inset-0 bg-gradient-to-br from-primary-500 to-purple-600 rounded-xl blur-md opacity-0 group-hover:opacity-50 transition-opacity duration-300"
          ></div>
        </div>
        <span
          class="text-2xl font-bold transition-all duration-300"
          class:bg-gradient-to-r={scrolled}
          class:from-primary-600={scrolled}
          class:via-purple-600={scrolled}
          class:to-pink-600={scrolled}
          class:bg-clip-text={scrolled}
          class:text-transparent={scrolled}
          class:text-white={!scrolled}
        >
          HyperScale
        </span>
      </a>

      <div class="hidden lg:flex items-center space-x-1">
        {#each links as link}
          {@const active = isActive(link.href)}
          <a
            href={link.href}
            class="relative px-4 py-2 font-medium transition-all duration-300 group"
            class:text-white={!scrolled && active}
            class:text-white/90={!scrolled && !active}
            class:text-primary-600={scrolled && active}
            class:text-gray-700={scrolled && !active}
            class:hover\:text-white={!scrolled}
            class:hover\:text-primary-600={scrolled}
          >
            <span class="relative z-10">{link.label}</span>
            <div
              class="absolute inset-0 rounded-lg transition-all duration-300"
              class:bg-white/10={!scrolled && active}
              class:bg-gradient-to-r={scrolled && active}
              class:from-primary-50={scrolled && active}
              class:to-purple-50={scrolled && active}
              class:opacity-100={active}
              class:opacity-0={!active}
            ></div>
            {#if active}
              <div
                class="absolute bottom-0 left-0 right-0 h-0.5 transition-all duration-300"
                class:bg-white={!scrolled}
                class:bg-gradient-to-r={scrolled}
                class:from-primary-600={scrolled}
                class:to-purple-600={scrolled}
              ></div>
            {/if}
          </a>
        {/each}

        <div class="ml-4 flex items-center space-x-3">
          <a
            href="/contact"
            class="group relative px-6 py-2.5 overflow-hidden rounded-xl bg-gradient-to-r from-primary-600 via-purple-600 to-pink-600 text-white font-semibold shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105"
          >
            <span class="relative z-10 flex items-center">
              <span>Mulai Sekarang</span>
              <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform" aria-hidden="true"></i>
            </span>
            <div
              class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"
            ></div>
          </a>
        </div>
      </div>

      <div class="lg:hidden">
        <button
          type="button"
          on:click={toggleMobileMenu}
          class="relative w-10 h-10 rounded-lg flex items-center justify-center transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-primary-500"
          class:bg-gray-100={scrolled}
          class:hover\:bg-gray-200={scrolled}
          class:bg-white/10={!scrolled}
          class:hover\:bg-white/20={!scrolled}
          aria-expanded={mobileMenuOpen}
          aria-label="Toggle navigation"
        >
          <div class="relative w-6 h-5">
            <span
              class="absolute block w-6 h-0.5 transform transition-all duration-300"
              class:bg-gray-600={scrolled}
              class:bg-white={!scrolled}
              class:rotate-45={mobileMenuOpen}
              class:translate-y-2={mobileMenuOpen}
            ></span>
            <span
              class="absolute block w-6 h-0.5 top-2 transition-all duration-300"
              class:bg-gray-600={scrolled}
              class:bg-white={!scrolled}
              class:opacity-0={mobileMenuOpen}
            ></span>
            <span
              class="absolute block w-6 h-0.5 transform transition-all duration-300"
              class:bg-gray-600={scrolled}
              class:bg-white={!scrolled}
              class:-rotate-45={mobileMenuOpen}
              class:translate-y-2={mobileMenuOpen}
              class:translate-y-4={!mobileMenuOpen}
            ></span>
          </div>
        </button>
      </div>
    </div>
  </div>

  {#if mobileMenuOpen}
    <div
      class="lg:hidden bg-white/95 backdrop-blur-xl border-t border-gray-200 shadow-xl"
      role="dialog"
      aria-label="Mobile navigation"
    >
      <div class="px-4 pt-4 pb-6 space-y-2">
        {#each links as link}
          {@const active = isActive(link.href)}
          <a
            href={link.href}
            class="flex items-center px-4 py-3 rounded-xl transition-all"
            class:bg-gradient-to-r={active}
            class:from-primary-50={active}
            class:to-purple-50={active}
            class:text-primary-600={active}
            class:text-gray-700={!active}
            class:hover\:text-primary-600={!active}
            class:hover\:bg-gray-50={!active}
            on:click={closeMobileMenu}
          >
            {#if link.href === '/'}
              <i class="fas fa-home mr-3" aria-hidden="true"></i>
            {:else if link.href === '/about'}
              <i class="fas fa-info-circle mr-3" aria-hidden="true"></i>
            {:else if link.href === '/services'}
              <i class="fas fa-server mr-3" aria-hidden="true"></i>
            {:else}
              <i class="fas fa-envelope mr-3" aria-hidden="true"></i>
            {/if}
            <span>{link.label}</span>
          </a>
        {/each}
        <a
          href="/contact"
          class="flex items-center justify-center mt-4 bg-gradient-to-r from-primary-600 via-purple-600 to-pink-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all"
          on:click={closeMobileMenu}
        >
          <span>Mulai Sekarang</span>
          <i class="fas fa-arrow-right ml-2" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  {/if}
</nav>

<style>
  nav :global(a.active) {
    color: inherit;
  }
</style>
