/**
 * Login.js — HOFLOC, S.A. | Archivo Agrario
 * Maneja la interacción del formulario de login en el cliente.
 */

document.addEventListener('DOMContentLoaded', function () {

    // ── Elementos del formulario ──────────────────────────────────
    const form     = document.getElementById('form-login');
    const inputU   = document.getElementById('usuario');
    const inputP   = document.getElementById('password');
    const btnEnvio = document.getElementById('btn-envio');


    // ── Mostrar / ocultar contraseña ──────────────────────────────
    const togglePass = document.getElementById('toggle-password');

    if (togglePass) {
        togglePass.addEventListener('click', function () {
            const esPassword = inputP.type === 'password';
            inputP.type = esPassword ? 'text' : 'password';
            // Cambia el ícono del ojo según el estado
            togglePass.querySelector('svg').style.opacity = esPassword ? '1' : '0.4';
        });
    }


    // ── Validación básica antes de enviar ─────────────────────────
    if (form) {
        form.addEventListener('submit', function (e) {

            limpiarErrores();

            let valido = true;

            // Verificar que el campo usuario no esté vacío
            if (inputU.value.trim() === '') {
                marcarError(inputU, 'Ingrese su usuario o correo.');
                valido = false;
            }

            // Verificar que la contraseña tenga al menos 6 caracteres
            if (inputP.value.trim().length < 6) {
                marcarError(inputP, 'La contraseña debe tener al menos 6 caracteres.');
                valido = false;
            }

            // Si hay errores, se detiene el envío
            if (!valido) {
                e.preventDefault();
                return;
            }

            // Desactivar el botón para evitar doble envío
            btnEnvio.disabled = true;
            btnEnvio.textContent = 'Verificando...';
        });
    }


    // ── Quitar error visual al escribir en un campo ───────────────
    [inputU, inputP].forEach(function (campo) {
        if (!campo) return;
        campo.addEventListener('input', function () {
            quitarError(campo);
        });
    });


    // ── Cerrar alerta de Bootstrap manualmente ────────────────────
    const alertas = document.querySelectorAll('.alert-login');
    alertas.forEach(function (alerta) {
        // La alerta desaparece sola después de 5 segundos
        setTimeout(function () {
            alerta.style.transition = 'opacity 0.5s';
            alerta.style.opacity    = '0';
            setTimeout(function () { alerta.remove(); }, 500);
        }, 5000);
    });


    // ── Helpers ──────────────────────────────────────────────────

    /* Marca un campo con error y muestra el mensaje debajo */
    function marcarError(campo, mensaje) {
        campo.classList.add('input-error');
        const wrapper = campo.closest('.input-wrapper') || campo.parentElement;
        let span = wrapper.parentElement.querySelector('.campo-error');
        if (!span) {
            span = document.createElement('span');
            span.className = 'campo-error';
            wrapper.parentElement.appendChild(span);
        }
        span.textContent = mensaje;
    }

    /* Limpia el estado de error de un campo */
    function quitarError(campo) {
        campo.classList.remove('input-error');
        const wrapper = campo.closest('.input-wrapper') || campo.parentElement;
        const span = wrapper.parentElement.querySelector('.campo-error');
        if (span) span.remove();
    }

    /* Limpia todos los errores del formulario */
    function limpiarErrores() {
        document.querySelectorAll('.input-error').forEach(function (c) {
            c.classList.remove('input-error');
        });
        document.querySelectorAll('.campo-error').forEach(function (s) {
            s.remove();
        });
    }



    // ══════════════════════════════════════════════════════
    //  MODALES — RECUPERAR CONTRASEÑA
    // ══════════════════════════════════════════════════════

    // ── Referencia a elementos ────────────────────────────
    const olvidoLink    = document.querySelector('.forgot-link');
    const overlay1      = document.getElementById('modal-recuperar');
    const overlay2      = document.getElementById('modal-nueva-pass');
    const btnCerrar1    = document.getElementById('btn-cerrar-modal-1');
    const btnCerrar2    = document.getElementById('btn-cerrar-modal-2');
    const volver1       = document.getElementById('volver-desde-modal-1');
    const volver2       = document.getElementById('volver-desde-modal-2');
    const btnEnviarRec  = document.getElementById('btn-enviar-recuperar');
    const recUsuario    = document.getElementById('rec-usuario');
    const recError      = document.getElementById('rec-error');
    const btnGuardarP   = document.getElementById('btn-guardar-pass');
    const npPass1       = document.getElementById('np-pass1');
    const npPass2       = document.getElementById('np-pass2');
    const npError1      = document.getElementById('np-error1');
    const npError2      = document.getElementById('np-error2');
    const npAlertaOk    = document.getElementById('np-alerta-ok');
    const npFormWrap    = document.getElementById('np-form-wrap');

    // ── Helpers abrir / cerrar ────────────────────────────
    function abrirModal(overlay) {
        overlay.classList.add('activo');
        // Foco al primer input para accesibilidad
        const primer = overlay.querySelector('input');
        if (primer) setTimeout(function() { primer.focus(); }, 260);
    }

    function cerrarModal(overlay) {
        overlay.classList.remove('activo');
    }

    function cerrarTodos() {
        cerrarModal(overlay1);
        cerrarModal(overlay2);
    }

    // ── Abrir Modal 1 al clic en "¿Olvidó su contraseña?" ─
    if (olvidoLink) {
        olvidoLink.addEventListener('click', function(e) {
            e.preventDefault();
            // Limpiar estado previo
            recUsuario.value   = '';
            recError.style.display = 'none';
            recError.textContent   = '';
            abrirModal(overlay1);
        });
    }

    // ── Cerrar Modal 1 ────────────────────────────────────
    if (btnCerrar1) btnCerrar1.addEventListener('click', function() { cerrarModal(overlay1); });
    if (volver1)    volver1.addEventListener('click',    function() { cerrarModal(overlay1); });

    // Clic fuera del box cierra el modal
    if (overlay1) {
        overlay1.addEventListener('click', function(e) {
            if (e.target === overlay1) cerrarModal(overlay1);
        });
    }

    // ── Botón "Continuar" en Modal 1 → abre Modal 2 ───────
    if (btnEnviarRec) {
        btnEnviarRec.addEventListener('click', function() {
            var val = recUsuario.value.trim();
            if (val === '') {
                recError.textContent   = 'Ingrese su usuario o correo.';
                recError.style.display = 'block';
                recUsuario.focus();
                return;
            }
            recError.style.display = 'none';

            // Simular "envío" — pequeño delay visual
            btnEnviarRec.textContent = 'Verificando…';
            btnEnviarRec.disabled    = true;

            setTimeout(function() {
                btnEnviarRec.textContent = 'Continuar';
                btnEnviarRec.disabled    = false;
                cerrarModal(overlay1);

                // Limpiar Modal 2 antes de abrir
                npPass1.value              = '';
                npPass2.value              = '';
                npError1.style.display     = 'none';
                npError2.style.display     = 'none';
                npAlertaOk.style.display   = 'none';
                npFormWrap.style.display   = 'block';
                if (btnGuardarP) btnGuardarP.style.display = 'block';

                abrirModal(overlay2);
            }, 900);
        });
    }

    // ── Cerrar Modal 2 ────────────────────────────────────
    if (btnCerrar2) btnCerrar2.addEventListener('click', function() { cerrarModal(overlay2); });
    if (volver2)    volver2.addEventListener('click',    function() { cerrarModal(overlay2); });

    if (overlay2) {
        overlay2.addEventListener('click', function(e) {
            if (e.target === overlay2) cerrarModal(overlay2);
        });
    }

    // ── Botón "Guardar Contraseña" en Modal 2 ─────────────
    if (btnGuardarP) {
        btnGuardarP.addEventListener('click', function() {
            var p1 = npPass1.value.trim();
            var p2 = npPass2.value.trim();
            var valido = true;

            npError1.style.display = 'none';
            npError2.style.display = 'none';

            if (p1.length < 8) {
                npError1.textContent   = 'La contraseña debe tener al menos 8 caracteres.';
                npError1.style.display = 'block';
                valido = false;
            }

            if (p2 === '') {
                npError2.textContent   = 'Confirme su contraseña.';
                npError2.style.display = 'block';
                valido = false;
            } else if (p1 !== p2 && p1.length >= 8) {
                npError2.textContent   = 'Las contraseñas no coinciden.';
                npError2.style.display = 'block';
                valido = false;
            }

            if (!valido) return;

            // Simular guardado
            btnGuardarP.textContent = 'Guardando…';
            btnGuardarP.disabled    = true;

            setTimeout(function() {
                npFormWrap.style.display = 'none';
                npAlertaOk.style.display = 'block';

                // Cerrar modal y volver al login tras 2 s
                setTimeout(function() {
                    cerrarModal(overlay2);
                    btnGuardarP.textContent = 'Guardar Contraseña';
                    btnGuardarP.disabled    = false;
                }, 2200);
            }, 800);
        });
    }

    // ── Escape cierra cualquier modal abierto ─────────────
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') cerrarTodos();
    });

    // ── Toggle ver/ocultar en campos de nueva contraseña ──
    function setupToggle(btn, input) {
        if (!btn || !input) return;
        btn.addEventListener('click', function() {
            var visible = input.type === 'text';
            input.type = visible ? 'password' : 'text';
            btn.style.opacity = visible ? '0.45' : '0.9';
        });
    }
    setupToggle(document.getElementById('toggle-np1'), npPass1);
    setupToggle(document.getElementById('toggle-np2'), npPass2);


});
