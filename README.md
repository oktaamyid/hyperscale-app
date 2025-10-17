# HyperScale Web App (Svelte + Tailwind CSS v4)

A modern multi-page marketing site for HyperScale rebuilt with SvelteKit and Tailwind CSS v4. The UI mirrors the original design while adopting a component-driven architecture, reusable animations, and improved developer ergonomics.

## ✨ Highlights

- **SvelteKit 2 + Svelte 5** foundation with file-based routing and layouts.
- **Tailwind CSS v4 (alpha)** via the official Vite plugin for utility-first styling.
- **Reusable animations** implemented as Svelte actions (e.g., scroll-triggered fade-ins).
- **Shared layout** with navigation, footer, and floating WhatsApp CTA.
- **Dynamic interactions**: animated statistic counters and an async contact form with toast feedback.

## 🗂️ Project Structure

```
hyperscale-app/
├── package.json
├── svelte.config.js
├── tailwind.config.ts
├── vite.config.ts
├── src/
│   ├── app.css              # Tailwind import + global styles/animations
│   ├── app.d.ts
│   ├── lib/
│   │   ├── actions/
│   │   │   └── animateOnScroll.ts
│   │   └── components/
│   │       ├── Footer.svelte
│   │       └── Navigation.svelte
│   └── routes/
│       ├── +layout.svelte   # Shared layout, head tags, floating CTA
│       ├── +page.svelte     # Home page
│       ├── about/+page.svelte
│       ├── services/+page.svelte
│       └── contact/+page.svelte
└── README.md
```

## 🚀 Getting Started

```bash
# Install dependencies
npm install

# Start the development server
npm run dev

# Run type and accessibility checks
npm run check

# Build for production
npm run build
```

The dev server runs on <http://localhost:5173> by default.

## 🧩 Key Components

- **Navigation.svelte** – Sticky header with scroll-aware styling and mobile menu.
- **Footer.svelte** – Rich footer with quick links and social icons.
- **animateOnScroll.ts** – IntersectionObserver-based action that applies animation classes when elements enter the viewport.
- **Contact form** – Posts to FormSubmit, shows success/error toasts, and resets the form on completion.

## 🎨 Design Notes

- Custom gradients, blob animations, floating elements, and stat counters were ported from the original Tailwind prototype into Svelte components.
- Global styles (`src/app.css`) include keyframes and helper classes for bespoke animations, toast notifications, and the floating WhatsApp button.

## 📄 License

© 2024 HyperScale. All rights reserved.
