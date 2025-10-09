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
            company: '',
            message: ''
        },
        isSubmitting: false,
        isSubmitted: false,
        
        async submitForm() {
            this.isSubmitting = true;
            
            // Simulate form submission
            await new Promise(resolve => setTimeout(resolve, 2000));
            
            this.isSubmitting = false;
            this.isSubmitted = true;
            
            // Reset form after 3 seconds
            setTimeout(() => {
                this.isSubmitted = false;
                this.formData = {
                    name: '',
                    email: '',
                    company: '',
                    message: ''
                };
            }, 3000);
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