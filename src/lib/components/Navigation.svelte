<script lang="ts">
  import { onMount } from "svelte";
  import { page } from "$app/stores";
  import { afterNavigate } from "$app/navigation";

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

    afterNavigate(({ to }) => {
      currentPath = normalizePath(to.url.pathname || "/");
    });

    return () => window.removeEventListener("scroll", onScroll);
  });

  $: currentPath = normalizePath($page.url.pathname || "/");
</script>

<nav class="fixed inset-x-0 top-0 z-50" data-sveltekit-preload-data="hover">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div
      class={cn(
        "relative mx-auto mt-3 h-14 sm:h-16 rounded-full transition-all duration-300 bg-neutral-100/50 shadow-[0_4px_30px_rgba(0,0,0,0.1)] backdrop-blur-md border border-neutral-200/50",
        scrolled && "scale-[1.002]"
      )}
    >
      <div
        class="relative z-10 flex h-full items-center justify-between px-3 sm:px-4"
      >
        <!-- Logo -->
        <a
          href="/"
          aria-current={isActive("/") ? "page" : undefined}
          class="group flex items-center gap-2"
        >
          <div
            class="grid h-9 w-9 place-items-center rounded-x"
          >
            <img src="/images/black-logo.png" alt="" srcset="" />
          </div>
          <span
            class="hidden sm:inline-block text-[17px] font-semibold tracking-tight text-neutral-900"
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
                "relative isolate rounded-full px-4 py-1.5 text-sm font-medium transition-colors",
                active
                  ? "text-neutral-900"
                  : "text-neutral-700 hover:text-neutral-900"
              )}
            >
              <!-- Active pill (now above glass, below text) -->
              <span
                class={cn(
                  "absolute inset-0 z-0 rounded-full transition-[opacity,transform] duration-200 will-change-transform",
                  active ? "opacity-100 scale-100" : "opacity-0 scale-95"
                )}
                style="
                  background: oklch(1 0 0 / 0.55);
                  border: 1px solid oklch(0.92 0 0 / 0.55);
                  -webkit-backdrop-filter: blur(6px);
                  backdrop-filter: blur(6px);
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
            class="hidden sm:inline-flex items-center justify-center rounded-full bg-neutral-900 px-4 py-1.5 text-sm font-semibold text-white shadow-[0_8px_18px_rgba(0,0,0,0.18)] transition-transform hover:scale-[1.02]"
          >
            Mulai
          </a>

          <button
            type="button"
            aria-label="Toggle navigation"
            aria-expanded={mobileMenuOpen}
            on:click={() => (mobileMenuOpen = !mobileMenuOpen)}
            class="md:hidden grid h-9 w-9 place-items-center rounded-full bg-neutral-900/10 hover:bg-neutral-900/15 transition-colors"
            style="-webkit-backdrop-filter: blur(10px); backdrop-filter: blur(10px);"
          >
            <div class="relative h-4 w-5">
              <span
                class={cn(
                  "absolute block h-0.5 w-5 bg-neutral-900 transition-all",
                  mobileMenuOpen && "translate-y-1.5 rotate-45"
                )}
              />
              <span
                class={cn(
                  "absolute top-1.5 block h-0.5 w-5 bg-neutral-900 transition-all",
                  mobileMenuOpen && "opacity-0"
                )}
              />
              <span
                class={cn(
                  "absolute block h-0.5 w-5 bg-neutral-900 transition-all",
                  mobileMenuOpen ? "-translate-y-1 -rotate-45" : "translate-y-3"
                )}
              />
            </div>
          </button>
        </div>
      </div>

      {#if mobileMenuOpen}
        <div
          class="absolute left-0 right-0 top-[calc(100%+10px)] mx-auto w-full rounded-2xl p-2 md:hidden"
          style="
            background: oklch(0.98 0 0 / 0.86);
            border: 1px solid oklch(0.85 0 0 / 0.32);
            -webkit-backdrop-filter: blur(16px);
            backdrop-filter: blur(16px);
            box-shadow: var(--glass-shadow);
          "
        >
          {#each links as link}
            {@const active = isActive(link.href)}
            <a
              href={link.href}
              aria-current={active ? "page" : undefined}
              on:click={() => (mobileMenuOpen = false)}
              class={cn(
                "flex items-center gap-3 rounded-xl px-3 py-2 text-[15px] transition-colors",
                active
                  ? "text-neutral-900 bg-white/70"
                  : "text-neutral-800 hover:bg-white/70"
              )}
            >
              <i
                class={cn(
                  "fas",
                  link.href === "/" && "fa-home",
                  link.href === "/about" && "fa-info-circle",
                  link.href === "/services" && "fa-server",
                  link.href === "/contact" && "fa-envelope"
                )}
                aria-hidden="true"
              />
              <span>{link.label}</span>
            </a>
          {/each}
        </div>
      {/if}
    </div>
  </div>
</nav>
