# HyperScale - Platform as a Service Website

Website company profile untuk HyperScale, sebuah layanan Platform as a Service (PaaS) modern dengan desain yang profesional dan responsif.

## 🚀 Fitur

- **Desain Modern**: UI/UX yang clean dan profesional dengan gradient dan animasi halus
- **Responsive**: Sempurna di semua device (desktop, tablet, mobile)
- **Interactive**: Menggunakan Alpine.js untuk interaktivitas yang smooth
- **Multi-Page**: Struktur website dengan beberapa halaman terpisah
- **SEO Friendly**: Meta tags dan struktur HTML yang SEO-optimized

## 📁 Struktur Proyek

```
hyperscale-app/
│
├── index.html          # Halaman utama
├── about.html          # Halaman tentang perusahaan
├── services.html       # Halaman layanan dan pricing
├── contact.html        # Halaman kontak dengan form
├── README.md          # Dokumentasi proyek
│
├── css/
│   └── style.css       # Custom CSS dan animasi
│
├── js/
│   └── main.js         # JavaScript dan Alpine.js logic
│
└── images/            # Folder untuk gambar (kosong - siap digunakan)
```

## 🛠️ Teknologi yang Digunakan

- **HTML5**: Struktur semantik dan modern
- **Tailwind CSS**: Framework CSS utility-first
- **Alpine.js**: Framework JavaScript lightweight untuk interaktivitas
- **Font Awesome**: Icon library
- **Google Fonts (Inter)**: Typography yang modern

## 🎨 Fitur Design

### Color Palette
- **Primary**: Biru ungu (#667eea)
- **Secondary**: Purple gradient
- **Accent**: Green, Blue, Orange untuk variasi

### Typography
- **Font**: Inter (Google Fonts)
- **Hierarki**: H1-H6 dengan sizing yang konsisten

### Komponen
- **Navigation**: Fixed header dengan mobile menu
- **Hero Section**: Full-width dengan CTA prominent
- **Cards**: Hover effects dan shadow
- **Forms**: Interactive dengan validation states
- **Buttons**: Hover animations dan multiple variants

## 📱 Halaman Website

### 1. Homepage (index.html)
- Hero section dengan value proposition
- Feature highlights (6 fitur utama)
- Statistics counter dengan animasi
- Call-to-action sections

### 2. About (about.html)
- Company story dan visi-misi
- Timeline perjalanan perusahaan
- Tim leadership dengan avatar
- Company values

### 3. Services (services.html)
- Service overview (Core Platform, Developer Tools, Enterprise)
- Detailed service descriptions
- Pricing plans dengan toggle monthly/yearly
- Interactive pricing calculator

### 4. Contact (contact.html)
- Contact information lengkap
- Interactive contact form dengan Alpine.js
- FAQ section dengan accordion
- Social media links

## ⚡ Fitur Interaktif

### Alpine.js Components
- **Navigation**: Mobile menu toggle
- **Contact Form**: Form handling dengan loading states
- **Stats Counter**: Animated number counting
- **Pricing Toggle**: Monthly/yearly pricing switch
- **FAQ Accordion**: Expandable Q&A sections

### CSS Animations
- **Fade In**: Scroll-triggered animations
- **Hover Effects**: Button dan card interactions
- **Transitions**: Smooth state changes
- **Loading States**: Form submission feedback

## 🚀 Cara Menjalankan

1. **Clone atau download** proyek ini
2. **Buka** file `index.html` di browser
3. **Atau gunakan local server**:
   ```bash
   # Dengan Python
   python -m http.server 8000
   
   # Dengan PHP
   php -S localhost:8000
   
   # Dengan Node.js (http-server)
   npx http-server
   ```

## 📊 Performance & SEO

- **Optimized Images**: Placeholder untuk lazy loading
- **CDN Resources**: Tailwind, Alpine.js, Font Awesome dari CDN
- **Meta Tags**: Complete SEO meta untuk setiap halaman
- **Semantic HTML**: Structure yang SEO-friendly
- **Mobile First**: Responsive design approach

## 🔧 Customization

### Mengubah Warna
Edit variabel warna di `tailwind.config` di setiap HTML file:
```javascript
colors: {
    primary: {
        500: '#your-color',
        600: '#your-darker-color',
        // ...
    }
}
```

### Menambah Animasi
Edit file `css/style.css` untuk custom animations:
```css
@keyframes your-animation {
    from { /* start state */ }
    to { /* end state */ }
}
```

### Menambah Interaktivitas
Edit `js/main.js` untuk Alpine.js components baru:
```javascript
Alpine.data('yourComponent', () => ({
    // your data and methods
}));
```

## 📧 Kontak

Untuk pertanyaan atau dukungan terkait website ini:
- Email: hello@hyperscale.id
- Phone: +62 21 5099 5000

## 📄 License

© 2024 HyperScale. All rights reserved.

---

**Developed with ❤️ for HyperScale**