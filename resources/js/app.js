import './bootstrap';

// Animate on scroll functionality
document.addEventListener('DOMContentLoaded', function() {
    const animateElements = document.querySelectorAll('.animate-fadeInUp, .animate-fadeInLeft, .animate-fadeInRight');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0) translateX(0)';
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    animateElements.forEach(el => {
        el.style.opacity = '0';
        if (el.classList.contains('animate-fadeInUp')) {
            el.style.transform = 'translateY(30px)';
        } else if (el.classList.contains('animate-fadeInLeft')) {
            el.style.transform = 'translateX(-30px)';
        } else if (el.classList.contains('animate-fadeInRight')) {
            el.style.transform = 'translateX(30px)';
        }
        el.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
        observer.observe(el);
    });
});
