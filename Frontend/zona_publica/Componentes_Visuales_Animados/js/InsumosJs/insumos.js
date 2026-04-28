document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.querySelector('.nav-links');

    // Menú móvil
    hamburger.addEventListener('click', () => {
        navLinks.classList.toggle('active');
        hamburger.classList.toggle('open');
    });

    // Cambio de estilo en Navbar al hacer Scroll
    window.addEventListener('scroll', () => {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
            navbar.style.background = 'rgba(20, 42, 30, 0.98)';
        } else {
            navbar.classList.remove('scrolled');
            navbar.style.background = 'rgba(57, 92, 67, 0.96)';
        }
    });
});