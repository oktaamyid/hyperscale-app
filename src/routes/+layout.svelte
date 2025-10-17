<script lang="ts">
  import "../app.css";
  import Navigation from "../lib/components/Navigation.svelte";
  import Footer from "../lib/components/Footer.svelte";
</script>

<svelte:head>
  <title>HyperScale</title>
  <meta
    name="description"
    content="HyperScale menyediakan solusi Platform as a Service (PaaS) terdepan untuk mempercepat pengembangan dan deployment aplikasi Anda."
  />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  />
</svelte:head>

<Navigation />

<main class="min-h-screen bg-white text-gray-900">
  <slot />
</main>

<Footer />

<a
  href="https://wa.me/628889623663?text=Halo%20HyperScale,%20saya%20tertarik%20dengan%20layanan%20PaaS%20Anda"
  class="whatsapp-float"
  target="_blank"
  rel="noopener noreferrer"
  aria-label="Chat WhatsApp"
>
  <i class="fab fa-whatsapp" aria-hidden="true"></i>
  <span class="whatsapp-tooltip">Chat WhatsApp</span>
</a>
