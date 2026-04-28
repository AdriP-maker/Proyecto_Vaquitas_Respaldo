<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../Componentes_Visuales_Animados/js/admin_dashboard.js"></script>
<script>

  // ── Toggles Sí/No ────────────────────────────────────────
  // Actualiza el texto del label según el estado del checkbox
  function updateToggle(checkbox, labelId) {
    document.getElementById(labelId).textContent = checkbox.checked ? 'Sí' : 'No';
  }

  // ── Reloj en tiempo real (GMT-5) ──────────────────────────
  // Se ejecuta cada segundo y muestra la hora en formato 12h
  function updateClock() {
    const now  = new Date();
    const gmt5 = new Date(now.getTime() + now.getTimezoneOffset() * 60000 - 5 * 3600000);
    const pad  = n => String(n).padStart(2, '0');

    let hh     = gmt5.getHours();
    const ampm = hh >= 12 ? 'PM' : 'AM';
    hh         = hh % 12 || 12;

    const input = document.getElementById('cfg-fecha-hora');
    if (input) input.value = `${pad(gmt5.getDate())}/${pad(gmt5.getMonth()+1)}/${gmt5.getFullYear()}  ${hh}:${pad(gmt5.getMinutes())}:${pad(gmt5.getSeconds())} ${ampm}  (GMT-5)`;
  }
  updateClock();
  setInterval(updateClock, 1000);

  // ── Guardar cambios ───────────────────────────────────────
  // Muestra feedback visual en el botón por 2 segundos
  function guardarCambios() {
    const btn = document.querySelector('.btn-save');
    btn.innerHTML    = '<i class="fa-solid fa-check me-1"></i> Guardado';
    btn.style.background = 'var(--teal-700)';
    setTimeout(() => {
      btn.innerHTML    = '<i class="fa-solid fa-floppy-disk me-1"></i> Guardar Cambios';
      btn.style.background = '';
    }, 2000);
  }

  // ── Modal cancelar ────────────────────────────────────────
  function cancelarCambios()    { document.getElementById('overlayConfirm').classList.add('active');    } // Abre el modal
  function cerrarModalConfirm() { document.getElementById('overlayConfirm').classList.remove('active'); } // Cierra el modal
  function confirmarCancelar()  { location.reload(); }                                                    // Recarga la página descartando cambios
  function cerrarSiAfuera(e)    { if (e.target.id === 'overlayConfirm') cerrarModalConfirm(); }           // Cierra al hacer clic fuera del modal

  // ── Navegación activa + Breadcrumb ────────────────────────
  document.addEventListener('DOMContentLoaded', function () {

    // Quita la clase active de todos los items del menú
    document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));

    const path = window.location.pathname.split('/').pop(); // Nombre del archivo actual

    // Marca como activo el item del menú que corresponde a esta página
    if (path === 'configuracion.php') {
      const el = document.getElementById('nav-configuracion');
      if (el) el.classList.add('active');
    }

    // Construye el breadcrumb dinámicamente según la página actual
    const bc = document.getElementById('breadcrumb');
    if (!bc) return;

    const labels = {
      'configuracion.php' : 'Configuración',
      'reportes.php'      : 'Reportes',
      'alertas.php'       : 'Alertas'
    };

    bc.innerHTML = `<a href="dashboard.php"><i class="fa-solid fa-house"></i></a>
      <a href="dashboard.php">Inicio</a><span class="breadcrumb-sep"> › </span>
      <span class="breadcrumb-current">${labels[path] ?? 'Página'}</span>`;
  });

</script>
