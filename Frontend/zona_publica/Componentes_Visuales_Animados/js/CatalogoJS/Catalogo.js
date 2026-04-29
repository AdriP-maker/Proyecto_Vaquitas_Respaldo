/**
 * Catalogo.js — HOFLOC, S.A. | Archivo Agrario
 * -----------------------------------------------
 * Maneja:
 *   - Filtro por tipo Y por raza (simultáneo)
 *   - Animación de entrada de tarjetas (IntersectionObserver)
 *   - Contador de resultados con animación numérica
 *   - Scroll del navbar
 *   - Hamburger del menú mobile
 *
 * Los modales (Me Interesa y Ver Detalles) los gestiona
 * GanadoModal.js, que es el mismo que usa Inicio.php.
 */

document.addEventListener('DOMContentLoaded', function () {

    /* ── Navbar: efecto scroll ────────────────────────────────── */
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        window.addEventListener('scroll', function () {
            navbar.classList.toggle('scrolled', window.scrollY > 80);
        });
    }

    /* ── Hamburger mobile ─────────────────────────────────────── */
    const hamburger = document.getElementById('hamburger');
    const navMobile = document.getElementById('navMobile');

    if (hamburger && navMobile) {
        hamburger.addEventListener('click', function () {
            hamburger.classList.toggle('open');
            navMobile.classList.toggle('open');
        });
    }

    /* ── Marcar link activo en el navbar ─────────────────────── */
    document.querySelectorAll('.nav-links li a').forEach(function (link) {
        if (link.textContent.trim() === 'Catálogo') {
            link.classList.add('active');
        }
    });

    /* ── Animación de entrada con IntersectionObserver ──────── */
    const tarjetas = document.querySelectorAll('.cat-col-card');

    const observer = new IntersectionObserver(
        function (entries) {
            entries.forEach(function (entry, i) {
                if (entry.isIntersecting) {
                    setTimeout(function () {
                        entry.target.classList.add('visible');
                    }, i * 80);
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.08, rootMargin: '0px 0px -40px 0px' }
    );

    tarjetas.forEach(function (card) {
        observer.observe(card);
    });

    /* ── Animación del contador inicial ──────────────────────── */
    animarContador();

    /* ── Manejo de error en imágenes ─────────────────────────── */
    document.querySelectorAll('.cat-card img').forEach(function (img) {
        img.addEventListener('error', function () {
            this.src = 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="300" height="220"%3E%3Crect fill="%23f6f2ec" width="300" height="220"/%3E%3Ctext fill="%23888" font-family="Arial" font-size="13" x="50%25" y="50%25" text-anchor="middle" dy=".3em"%3EImagen no disponible%3C/text%3E%3C/svg%3E';
        });
    });

});


/* ═══════════════════════════════════════════
   FILTRADO DUAL — tipo + raza
   Puede llamarse desde el onchange del select
   o sin argumentos para releer ambos selects.
   ═══════════════════════════════════════════ */
function filtrarAnimales(valorTipo) {
    var selectTipo  = document.getElementById('filtroTipo');
    var selectRaza  = document.getElementById('filtroRaza');

    // Si se llama desde el select de tipo, valorTipo ya viene;
    // si no (raza cambia), leemos el valor actual de tipo.
    var tipo = (typeof valorTipo !== 'undefined') ? valorTipo : selectTipo.value;
    var raza = selectRaza ? selectRaza.value : 'todas';

    var columnas      = document.querySelectorAll('.cat-col-card');
    var sinResultados = document.getElementById('sinResultados');
    var visibles      = 0;

    columnas.forEach(function (col, i) {
        var colTipo = col.dataset.tipo;
        var colRaza = col.dataset.raza;

        var matchTipo = (tipo === 'todos' || tipo === '' || colTipo === tipo);
        var matchRaza = (raza === 'todas' || raza === '' || colRaza === raza);

        if (matchTipo && matchRaza) {
            col.style.display = '';
            visibles++;
            // Reanima con escalonado
            col.classList.remove('visible');
            setTimeout(function () {
                col.classList.add('visible');
            }, visibles * 60);
        } else {
            col.style.display = 'none';
            col.classList.remove('visible');
        }
    });

    // Actualiza contador
    var contador = document.getElementById('contadorResultados');
    if (contador) {
        contador.textContent = visibles;
    }

    // Mensaje sin resultados
    if (sinResultados) {
        sinResultados.classList.toggle('d-none', visibles > 0);
    }
}


/* ── Animación numérica del contador ─────────────────────────── */
function animarContador() {
    var el = document.getElementById('contadorResultados');
    if (!el) return;

    var target    = parseInt(el.textContent, 10) || 0;
    var current   = 0;
    var increment = Math.ceil(target / 20);

    var timer = setInterval(function () {
        current += increment;
        if (current >= target) {
            el.textContent = target;
            clearInterval(timer);
        } else {
            el.textContent = current;
        }
    }, 40);
}
