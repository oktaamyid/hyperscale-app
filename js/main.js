// Main JavaScript file for HyperScale website
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fadeInUp');
            }
        });
    }, observerOptions);

    // Observe elements for animation
    const animatedElements = document.querySelectorAll('.animate-on-scroll');
    animatedElements.forEach(el => observer.observe(el));
});

// Alpine.js global data
document.addEventListener('alpine:init', () => {
    Alpine.data('navigation', () => ({
        mobileMenuOpen: false,
        toggleMobileMenu() {
            this.mobileMenuOpen = !this.mobileMenuOpen;
        },
        closeMobileMenu() {
            this.mobileMenuOpen = false;
        }
    }));

    Alpine.data('contactForm', () => ({
        formData: {
            name: '',
            email: '',
            phone: '',
            subject: '',
            message: ''
        },
        isSubmitting: false,
        isSubmitted: false,
        
        async submitForm() {
            this.isSubmitting = true;
            
            try {
                // Prepare form data
                const formData = new FormData();
                formData.append('name', this.formData.name);
                formData.append('email', this.formData.email);
                formData.append('phone', this.formData.phone || '');
                formData.append('inquiry_type', this.formData.subject);
                formData.append('message', this.formData.message);
                formData.append('_subject', 'Pesan Baru dari Website HyperScale');
                formData.append('_captcha', 'false');
                formData.append('_template', 'table');
                formData.append('_autoresponse', 'Terima kasih telah menghubungi HyperScale. Tim kami akan segera merespons dalam 24 jam.');

                // Submit to FormSubmit
                const response = await fetch('https://formsubmit.co/raffayudapratama20@gmail.com', {
                    method: 'POST',
                    body: formData
                });

                if (response.ok) {
                    // Show success toast
                    this.showToast('success', 'Pesan Berhasil Dikirim!', 'Tim kami akan segera merespons dalam 24 jam. Terima kasih!');
                    
                    // Reset form
                    this.formData = {
                        name: '',
                        email: '',
                        phone: '',
                        subject: '',
                        message: ''
                    };
                    
                    this.isSubmitted = true;
                } else {
                    throw new Error('Network response was not ok');
                }
            } catch (error) {
                console.error('Error:', error);
                // Show error toast
                this.showToast('error', 'Gagal Mengirim Pesan', 'Terjadi kesalahan. Silakan coba lagi atau hubungi kami via WhatsApp.');
            } finally {
                this.isSubmitting = false;
            }
        },

        showToast(type, title, message) {
            const toastContainer = document.getElementById('toast-container');
            const toastId = 'toast-' + Date.now();
            
            const toast = document.createElement('div');
            toast.id = toastId;
            toast.className = `toast ${type}`;
            
            toast.innerHTML = `
                <div class="toast-header">
                    <div class="toast-icon">
                        <i class="fas fa-${type === 'success' ? 'check' : 'exclamation-triangle'}"></i>
                    </div>
                    <div class="toast-title">${title}</div>
                    <button class="toast-close" onclick="hideToast('${toastId}')">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="toast-message">${message}</div>
                <div class="toast-progress"></div>
            `;
            
            toastContainer.appendChild(toast);
            
            // Show toast
            setTimeout(() => {
                toast.classList.add('show');
            }, 100);
            
            // Auto hide after 5 seconds
            setTimeout(() => {
                this.hideToast(toastId);
            }, 5000);
        },

        hideToast(toastId) {
            const toast = document.getElementById(toastId);
            if (toast) {
                toast.classList.add('hide');
                setTimeout(() => {
                    toast.remove();
                }, 300);
            }
        }
    }));

    Alpine.data('stats', () => ({
        counters: {
            clients: { current: 0, target: 500 },
            projects: { current: 0, target: 1000 },
            uptime: { current: 0, target: 99.9 },
            support: { current: 0, target: 24 }
        },
        started: false,

        startCounters() {
            if (this.started) return;
            this.started = true;

            Object.keys(this.counters).forEach(key => {
                this.animateCounter(key);
            });
        },

        animateCounter(key) {
            const counter = this.counters[key];
            const increment = counter.target / 100;
            const timer = setInterval(() => {
                if (counter.current < counter.target) {
                    counter.current += increment;
                    if (counter.current >= counter.target) {
                        counter.current = counter.target;
                        clearInterval(timer);
                    }
                }
            }, 20);
        }
    }));
});

// Global function for hiding toast
function hideToast(toastId) {
    const toast = document.getElementById(toastId);
    if (toast) {
        toast.classList.add('hide');
        setTimeout(() => {
            toast.remove();
        }, 300);
    }
}