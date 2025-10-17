<script lang="ts">
  import { onMount } from "svelte";

  const links = [
    { href: "/", label: "Beranda" },
    { href: "/about", label: "Tentang" },
    { href: "/services", label: "Layanan" },
    { href: "/contact", label: "Kontak" },
  ];

  let mobileMenuOpen = false;
  let scrolled = false;
  let currentPath = "/";

  const cn = (...xs: Array<string | false | null | undefined>) =>
    xs.filter(Boolean).join(" ");

  const normalizePath = (p: string) => {
    if (!p) return "/";
    if (p !== "/" && p.endsWith("/")) return p.slice(0, -1);
    return p;
  };

  // "/" exact; others exact or prefix segment (e.g., /services/pricing)
  const isActive = (href: string) => {
    const h = normalizePath(href);
    const c = currentPath;
    if (h === "/") return c === "/";
    return c === h || c.startsWith(h + "/");
  };

  onMount(() => {
    const onScroll = () => (scrolled = window.scrollY > 12);
    onScroll();
    window.addEventListener("scroll", onScroll);

    // initialize currentPath from window.location (avoid $app/stores)
    const updatePath = () => {
      currentPath = normalizePath(window.location.pathname || "/");
    };
    updatePath();

    // update on history navigation (back/forward)
    const onPop = () => updatePath();
    window.addEventListener("popstate", onPop);

    return () => {
      window.removeEventListener("scroll", onScroll);
      window.removeEventListener("popstate", onPop);
    };
  });
</script>

<nav class="fixed inset-x-0 top-0 z-50" data-sveltekit-preload-data="hover">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div
      class={cn(
        "relative mx-auto mt-3 h-14 sm:h-16 rounded-full transition-all duration-500 ease-out",
        scrolled && "scale-[1.002] translate-y-0.5"
      )}
      style="
        background: linear-gradient(135deg, 
          rgba(255, 255, 255, 0.25) 0%,
          rgba(255, 255, 255, 0.18) 25%,
          rgba(255, 255, 255, 0.12) 50%,
          rgba(255, 255, 255, 0.08) 75%,
          rgba(255, 255, 255, 0.05) 100%
        );
        border: 1px solid rgba(255, 255, 255, 0.18);
        box-shadow: 
          0 8px 32px rgba(0, 0, 0, 0.08),
          0 4px 16px rgba(0, 0, 0, 0.04),
          inset 0 1px 0 rgba(255, 255, 255, 0.3),
          inset 0 -1px 0 rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(24px) saturate(200%);
        -webkit-backdrop-filter: blur(24px) saturate(200%);
      "
    >
      <!-- Animated gradient overlay -->
      <div
        class="absolute inset-0 rounded-full opacity-60 transition-opacity duration-500"
        style="
          background: linear-gradient(45deg, 
            rgba(26, 115, 232, 0.05) 0%,
            rgba(26, 115, 232, 0.02) 25%,
            rgba(255, 255, 255, 0.08) 50%,
            rgba(26, 115, 232, 0.02) 75%,
            rgba(26, 115, 232, 0.05) 100%
          );
          background-size: 200% 200%;
          animation: glassMorphGradient 8s ease-in-out infinite;
        "
      />
      <div
        class="relative z-10 flex h-full items-center justify-between px-3 sm:px-4"
      >
        <!-- Logo -->
        <a
          href="/"
          aria-current={isActive("/") ? "page" : undefined}
          class="group flex items-center gap-2"
        >
          <div class="grid h-9 w-9 place-items-center rounded-x">
            <img
              src="/images/black-logo.png"
              alt="HyperScale Logo"
              class="w-full h-full object-contain"
            />
          </div>
          <span
            class="hidden sm:inline-block text-[17px] font-semibold tracking-tight transition-colors duration-300"
            style="
              color: rgba(17, 24, 39, 0.95);
              text-shadow: 0 1px 2px rgba(255, 255, 255, 0.5);
            "
          >
            HyperScale
          </span>
        </a>

        <!-- Desktop Nav -->
        <div class="hidden md:flex items-center gap-1">
          {#each links as link}
            {@const active = isActive(link.href)}
            <a
              href={link.href}
              aria-current={active ? "page" : undefined}
              class={cn(
                "relative isolate rounded-full px-4 py-1.5 text-sm font-medium transition-all duration-300 hover:scale-105",
                active ? "" : ""
              )}
              style={active
                ? "color: rgba(17, 24, 39, 0.95); text-shadow: 0 1px 2px rgba(255, 255, 255, 0.5);"
                : "color: rgba(55, 65, 81, 0.9); text-shadow: 0 1px 2px rgba(255, 255, 255, 0.3);"}
            >
              <!-- Active pill with enhanced glassmorphism -->
              <span
                class={cn(
                  "absolute inset-0 z-0 rounded-full transition-all duration-300 will-change-transform",
                  active ? "opacity-100 scale-100" : "opacity-0 scale-95"
                )}
                style="
                  background: linear-gradient(135deg, 
                    rgba(255, 255, 255, 0.5) 0%,
                    rgba(255, 255, 255, 0.35) 50%,
                    rgba(255, 255, 255, 0.25) 100%
                  );
                  border: 1px solid rgba(255, 255, 255, 0.4);
                  box-shadow: 
                    0 4px 16px rgba(0, 0, 0, 0.08),
                    inset 0 1px 0 rgba(255, 255, 255, 0.6),
                    inset 0 -1px 0 rgba(255, 255, 255, 0.2);
                  backdrop-filter: blur(12px) saturate(150%);
                  -webkit-backdrop-filter: blur(12px) saturate(150%);
                "
              />
              <!-- Hover glass effect -->
              <span
                class={cn(
                  "absolute inset-0 z-0 rounded-full transition-all duration-300 will-change-transform opacity-0 hover:opacity-100",
                  !active && "group-hover:opacity-100"
                )}
                style="
                  background: linear-gradient(135deg, 
                    rgba(255, 255, 255, 0.25) 0%,
                    rgba(255, 255, 255, 0.15) 50%,
                    rgba(255, 255, 255, 0.1) 100%
                  );
                  border: 1px solid rgba(255, 255, 255, 0.3);
                  backdrop-filter: blur(8px);
                  -webkit-backdrop-filter: blur(8px);
                "
              />
              <!-- Text sits above pill -->
              <span class="relative z-10">{link.label}</span>
            </a>
          {/each}
        </div>

        <!-- CTA + Mobile Toggle -->
        <div class="flex items-center gap-2">
          <a
            href="/contact"
            aria-current={isActive("/contact") ? "page" : undefined}
            class="hidden sm:inline-flex items-center justify-center rounded-full px-4 py-1.5 text-sm font-semibold text-white transition-all duration-300 hover:scale-105 hover:-translate-y-0.5 group"
            style="
              background: linear-gradient(135deg, 
                rgba(26, 115, 232, 0.9) 0%,
                rgba(26, 115, 232, 0.8) 50%,
                rgba(26, 115, 232, 0.9) 100%
              );
              border: 1px solid rgba(26, 115, 232, 0.3);
              box-shadow: 
                0 8px 24px rgba(26, 115, 232, 0.2),
                0 4px 12px rgba(26, 115, 232, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
              backdrop-filter: blur(12px);
              -webkit-backdrop-filter: blur(12px);
            "
          >
            <span class="relative z-10">Mulai</span>
            <!-- Hover glow effect -->
            <div
              class="absolute inset-0 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"
              style="
                background: linear-gradient(135deg, 
                  rgba(26, 115, 232, 0.4) 0%,
                  rgba(26, 115, 232, 0.2) 100%
                );
                filter: blur(8px);
                transform: scale(1.2);
              "
            />
          </a>

          <button
            type="button"
            aria-label="Toggle navigation"
            aria-expanded={mobileMenuOpen}
            on:click={() => (mobileMenuOpen = !mobileMenuOpen)}
            class="md:hidden grid h-9 w-9 place-items-center rounded-full transition-all duration-300 hover:scale-110 active:scale-95 relative z-20"
            style="
              background: linear-gradient(135deg, 
                rgba(255, 255, 255, 0.3) 0%,
                rgba(255, 255, 255, 0.2) 100%
              );
              border: 1px solid rgba(255, 255, 255, 0.25);
              backdrop-filter: blur(12px);
              -webkit-backdrop-filter: blur(12px);
              box-shadow: 
                0 4px 16px rgba(0, 0, 0, 0.06),
                inset 0 1px 0 rgba(255, 255, 255, 0.4);
            "
          >
            <div class="relative h-4 w-5">
              <span
                class={cn(
                  "hamburger-line absolute block h-0.5 w-5 rounded-full transition-all duration-300",
                  mobileMenuOpen
                    ? "translate-y-1.5 rotate-45 bg-primary-600"
                    : "translate-y-0 rotate-0 bg-neutral-900"
                )}
                style="box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);"
              />
              <span
                class={cn(
                  "hamburger-line absolute top-1.5 block h-0.5 w-5 rounded-full transition-all duration-300",
                  mobileMenuOpen
                    ? "opacity-0 scale-0"
                    : "opacity-100 scale-100 bg-neutral-900"
                )}
                style="box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);"
              />
              <span
                class={cn(
                  "hamburger-line absolute block h-0.5 w-5 rounded-full transition-all duration-300",
                  mobileMenuOpen
                    ? "-translate-y-1 -rotate-45 bg-primary-600"
                    : "translate-y-3 rotate-0 bg-neutral-900"
                )}
                style="box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);"
              />
            </div>
          </button>
        </div>
      </div>

      <!-- Mobile Menu Backdrop Overlay -->
      {#if mobileMenuOpen}
        <!-- svelte-ignore a11y-click-events-have-key-events -->
        <!-- svelte-ignore a11y-no-static-element-interactions -->
        <div
          class="fixed inset-0 -z-10 backdrop-enter md:hidden"
          style="
            background: rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
          "
          on:click={() => (mobileMenuOpen = false)}
        />
      {/if}

      {#if mobileMenuOpen}
        <div
          class="absolute left-0 right-0 top-[calc(100%+12px)] mx-auto w-full rounded-2xl p-3 md:hidden mobile-menu-enter"
          style="
            background: linear-gradient(135deg, 
              rgba(255, 255, 255, 0.35) 0%,
              rgba(255, 255, 255, 0.25) 50%,
              rgba(255, 255, 255, 0.15) 100%
            );
            border: 1px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(24px) saturate(200%);
            -webkit-backdrop-filter: blur(24px) saturate(200%);
            box-shadow: 
              0 16px 48px rgba(0, 0, 0, 0.12),
              0 8px 24px rgba(0, 0, 0, 0.08),
              inset 0 1px 0 rgba(255, 255, 255, 0.4),
              inset 0 -1px 0 rgba(255, 255, 255, 0.15);
          "
        >
          <div class="space-y-1">
            {#each links as link}
              {@const active = isActive(link.href)}
              <a
                href={link.href}
                aria-current={active ? "page" : undefined}
                on:click={() => (mobileMenuOpen = false)}
                class={cn(
                  "flex items-center gap-3 rounded-xl px-4 py-3 text-[15px] font-medium transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]",
                  active ? "" : "hover:bg-white/20"
                )}
                style={active
                  ? `
                background: linear-gradient(135deg, 
                  rgba(255, 255, 255, 0.6) 0%,
                  rgba(255, 255, 255, 0.45) 50%,
                  rgba(255, 255, 255, 0.35) 100%
                );
                border: 1px solid rgba(255, 255, 255, 0.5);
                box-shadow: 
                  0 4px 16px rgba(26, 115, 232, 0.08),
                  0 2px 8px rgba(0, 0, 0, 0.04),
                  inset 0 1px 0 rgba(255, 255, 255, 0.6);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                color: rgba(17, 24, 39, 0.95);
                text-shadow: 0 1px 2px rgba(255, 255, 255, 0.5);
              `
                  : `
                color: rgba(55, 65, 81, 0.9);
                text-shadow: 0 1px 2px rgba(255, 255, 255, 0.3);
              `}
              >
                <div
                  class="w-8 h-8 rounded-lg flex items-center justify-center transition-all duration-300"
                  style={`
                  background: ${
                    active
                      ? "linear-gradient(135deg, rgba(26, 115, 232, 0.15) 0%, rgba(26, 115, 232, 0.08) 100%)"
                      : "linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0.1) 100%)"
                  };
                  border: 1px solid ${active ? "rgba(26, 115, 232, 0.2)" : "rgba(255, 255, 255, 0.2)"};
                  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
                `}
                >
                  <i
                    class={cn(
                      "fas text-sm transition-all duration-300",
                      link.href === "/" && "fa-home",
                      link.href === "/about" && "fa-info-circle",
                      link.href === "/services" && "fa-server",
                      link.href === "/contact" && "fa-envelope"
                    )}
                    style={`color: ${active ? "rgba(26, 115, 232, 0.9)" : "rgba(26, 115, 232, 0.7)"};`}
                    aria-hidden="true"
                  />
                </div>
                <span class="flex-1">{link.label}</span>
                {#if active}
                  <div
                    class="w-1.5 h-1.5 rounded-full"
                    style="
                    background: rgba(26, 115, 232, 0.8);
                    box-shadow: 0 0 8px rgba(26, 115, 232, 0.4);
                  "
                  />
                {/if}
              </a>
            {/each}
          </div>

          <!-- Mobile CTA Button -->
          <div class="pt-2 mt-2 border-t border-white/20">
            <a
              href="/contact"
              on:click={() => (mobileMenuOpen = false)}
              class="flex items-center justify-center gap-2 rounded-xl px-4 py-3 text-[15px] font-semibold text-white transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] group"
              style="
                background: linear-gradient(135deg, 
                  rgba(26, 115, 232, 0.95) 0%,
                  rgba(26, 115, 232, 0.85) 50%,
                  rgba(26, 115, 232, 0.95) 100%
                );
                border: 1px solid rgba(26, 115, 232, 0.4);
                box-shadow: 
                  0 8px 24px rgba(26, 115, 232, 0.25),
                  0 4px 12px rgba(26, 115, 232, 0.15),
                  inset 0 1px 0 rgba(255, 255, 255, 0.25);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
              "
            >
              <i class="fas fa-rocket text-sm" aria-hidden="true"></i>
              <span>Mulai Sekarang</span>
              <i
                class="fas fa-arrow-right text-xs transition-transform duration-300 group-hover:translate-x-1"
                aria-hidden="true"
              ></i>
            </a>
          </div>
        </div>
      {/if}
    </div>
  </div>
</nav>

<style>
  @keyframes glassMorphGradient {
    0%,
    100% {
      background-position: 0% 50%;
    }
    50% {
      background-position: 100% 50%;
    }
  }

  /* Enhanced glass morphism utilities */
  .glass-nav {
    backdrop-filter: blur(24px) saturate(200%);
    -webkit-backdrop-filter: blur(24px) saturate(200%);
  }

  /* Liquid glass hover effects */
  .nav-link-hover:hover {
    transform: translateY(-1px) scale(1.02);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }

  /* Mobile menu animations */
  @keyframes slideInFromTop {
    from {
      opacity: 0;
      transform: translateY(-10px) scale(0.95);
    }
    to {
      opacity: 1;
      transform: translateY(0) scale(1);
    }
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }

  .mobile-menu-enter {
    animation: slideInFromTop 0.3s cubic-bezier(0.4, 0, 0.2, 1) forwards;
  }

  .backdrop-enter {
    animation: fadeIn 0.2s ease-out forwards;
  }

  /* Hamburger icon animations */
  .hamburger-line {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    transform-origin: center;
  }
</style>
