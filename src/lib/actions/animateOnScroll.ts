export type AnimateOnScrollOptions = {
  animationClass?: string;
  rootMargin?: string;
  threshold?: number;
};

const DEFAULTS: Required<AnimateOnScrollOptions> = {
  animationClass: 'animate-fadeInUp',
  rootMargin: '0px 0px -50px 0px',
  threshold: 0.1
};

export function animateOnScroll(node: HTMLElement, options: AnimateOnScrollOptions = {}) {
  let config = { ...DEFAULTS, ...options };

  let observer = createObserver();

  function createObserver() {
    const instance = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            node.classList.add(config.animationClass);
            instance.unobserve(node);
          }
        });
      },
      {
        threshold: config.threshold,
        rootMargin: config.rootMargin
      }
    );

    instance.observe(node);
    return instance;
  }

  return {
    destroy() {
      observer.disconnect();
    },
    update(newOptions: AnimateOnScrollOptions = {}) {
      config = { ...DEFAULTS, ...newOptions };
      observer.disconnect();
      observer = createObserver();
    }
  };
}
