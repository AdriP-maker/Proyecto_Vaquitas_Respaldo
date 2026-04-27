
// ── Navbar scroll effect ──
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 20);
});

// ── Hamburger mobile menu ──
const hamburger = document.getElementById('hamburger');
const navMobile = document.getElementById('navMobile');
hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('open');
    navMobile.classList.toggle('open');
});

// ── Form validation & submit ──
const btn = document.getElementById('btnEnviar');
const toast = document.getElementById('toast');

btn.addEventListener('click', () => {
    const nombre = document.getElementById('nombre').value.trim();
    const correo = document.getElementById('correo').value.trim();
    const asunto = document.getElementById('asunto').value.trim();
    const mensaje = document.getElementById('mensaje').value.trim();

    const fields = [
        { el: document.getElementById('nombre'), val: nombre },
        { el: document.getElementById('correo'), val: correo },
        { el: document.getElementById('asunto'), val: asunto },
        { el: document.getElementById('mensaje'), val: mensaje },
    ];

    let valid = true;
    fields.forEach(f => {
        if (!f.val) { f.el.style.borderColor = '#e05c5c'; valid = false; }
        else { f.el.style.borderColor = ''; }
    });

    if (correo && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correo)) {
        document.getElementById('correo').style.borderColor = '#e05c5c';
        valid = false;
    }
    if (!valid) return;

    btn.textContent = 'Enviando…';
    btn.disabled = true;

    setTimeout(() => {
        fields.forEach(f => { f.el.value = ''; f.el.style.borderColor = ''; });
        btn.innerHTML = `Enviar mensaje <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>`;
        btn.disabled = false;
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 3500);
    }, 1200);
});

document.querySelectorAll('input, textarea').forEach(el => {
    el.addEventListener('focus', () => { el.style.borderColor = ''; });
});