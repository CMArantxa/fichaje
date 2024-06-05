document.addEventListener("DOMContentLoaded", () => {
    const h1 = document.getElementById('animated-title');
    const letters = h1.textContent.split('');
    
    h1.innerHTML = '';
    
    letters.forEach((letter, index) => {
        const span = document.createElement('span');
        span.textContent = letter;
        h1.appendChild(span);
    });

    const options = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const spans = h1.querySelectorAll('span');
                spans.forEach((span, index) => {
                    setTimeout(() => {
                        span.classList.add('rotate');
                    }, index * 100); // Delay de 100ms entre cada letra
                });
                observer.unobserve(h1); // Deja de observar después de animar
            }
        });
    }, options);

    observer.observe(h1);
});
