<?php
$dir_base = __DIR__ . '/..';
define('COMPLEMENTOS', $dir_base . '/Complementos_html/HTML_Dashboard');

$pageTitle = "Configuración";
$breadcrumb = [
  ['label' => 'Inicio', 'url' => 'dashboard.php'],
  ['label' => 'Configuración']
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>HOFLOC.SA – Configuración</title>

  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link rel="stylesheet" href="../Componentes_Visuales_Animados/css/admin_styles.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>

  <style>
    /* ── Toggles ─────────────────────────────────────────── */
    .toggle-wrapper {
      display: flex;
      align-items: center;
      gap: .55rem;
      justify-content: flex-end;
    }
    .toggle-label-txt {
      font-size: .82rem;
      color: #8aabab;
      font-weight: 500;
      min-width: 22px;
      text-align: right;
    }
    .form-check-input[type="checkbox"].toggle-switch {
      width: 42px;
      height: 22px;
      background-color: #c8d8c8;
      border: none;
      cursor: pointer;
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='white'/%3e%3c/svg%3e");
      transition: background-color .25s;
    }
    .form-check-input[type="checkbox"].toggle-switch:checked {
      background-color: var(--teal-500);
    }
    .form-check-input[type="checkbox"].toggle-switch:focus {
      box-shadow: 0 0 0 3px rgba(74,140,63,.2);
    }

    /* ── Config Cards ────────────────────────────────────── */
    .config-card {
      background: var(--card-bg);
      border: 1px solid var(--card-border);
      border-radius: var(--radius);
      box-shadow: var(--shadow-card);
      margin-bottom: 1.4rem;
      overflow: hidden;
      animation: fadeUp .4s ease both;
    }
    .config-card:nth-child(2) { animation-delay: .08s; }
    .config-card:nth-child(3) { animation-delay: .16s; }

    .config-card-title {
      font-family: var(--font-display);
      font-size: 1rem;
      font-weight: 700;
      color: var(--teal-800);
      padding: 1.1rem 1.5rem .9rem;
      border-bottom: 1px solid var(--card-border);
      background: rgba(115,200,131,.06);
      letter-spacing: .01em;
    }

    .config-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: .95rem 1.5rem;
      border-bottom: 1px solid rgba(0,0,0,.05);
      gap: 1rem;
    }
    .config-row:last-child { border-bottom: none; }

    .config-label {
      font-size: .88rem;
      font-weight: 600;
      color: #2e4a32;
      min-width: 220px;
    }

    .config-control { flex: 1; max-width: 340px; }

    .config-control .form-control,
    .config-control .form-select {
      border: 1px solid rgba(0,0,0,.14);
      border-radius: var(--radius-sm);
      font-family: var(--font-body);
      font-size: .88rem;
      color: #1e2e1e;
      background: #fff;
      padding: .45rem .85rem;
      transition: border-color .2s, box-shadow .2s;
    }
    .config-control .form-control:focus,
    .config-control .form-select:focus {
      border-color: var(--teal-400);
      box-shadow: 0 0 0 3px rgba(74,140,63,.15);
      outline: none;
    }

    /* ── Footer Buttons ──────────────────────────────────── */
    .config-footer {
      display: flex;
      justify-content: flex-end;
      gap: .8rem;
      padding: 1.2rem 0 .4rem;
    }

    .btn-cancel {
      padding: .5rem 1.4rem;
      border-radius: var(--radius-sm);
      border: 1px solid var(--card-border);
      background: #fff;
      color: #3a5858;
      font-family: var(--font-body);
      font-size: .88rem;
      font-weight: 600;
      cursor: pointer;
      transition: all .2s;
    }
    .btn-cancel:hover { background: var(--page-bg); }

    .btn-save {
      padding: .5rem 1.5rem;
      border-radius: var(--radius-sm);
      border: none;
      background: var(--teal-500);
      color: #fff;
      font-family: var(--font-body);
      font-size: .88rem;
      font-weight: 700;
      cursor: pointer;
      transition: background .2s, transform .15s;
    }
    .btn-save:hover  { background: var(--teal-600); transform: translateY(-1px); }
    .btn-save:active { transform: translateY(0); }

    @media (max-width: 768px) {
      .config-row { flex-direction: column; align-items: flex-start; }
      .config-control { max-width: 100%; width: 100%; }
    }

    /* ── Modal Confirm ───────────────────────────────────── */
    .overlay-confirm {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.45);
      display: none;
      z-index: 9999;
      align-items: center;
      justify-content: center;
      backdrop-filter: blur(4px);
    }
    .overlay-confirm.active {
      display: flex;
    }

    .modal-confirm-box {
      background: #ffffff;
      border-radius: 16px;
      width: 100%;
      max-width: 420px;
      padding: 1.8rem 1.6rem;
      box-shadow: 0 20px 60px rgba(0,0,0,0.25);
      text-align: center;
      animation: modalFadeIn 0.3s ease;
    }

    @keyframes modalFadeIn {
      from { opacity: 0; transform: translateY(20px) scale(0.95); }
      to   { opacity: 1; transform: translateY(0) scale(1); }
    }

    .modal-confirm-icon {
      width: 60px;
      height: 60px;
      margin: 0 auto 12px;
      border-radius: 50%;
      background: rgba(192, 57, 43, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .modal-confirm-title {
      font-size: 1.2rem;
      font-weight: 700;
      color: #1e2e1e;
      margin-bottom: .4rem;
    }

    .modal-confirm-desc {
      font-size: .9rem;
      color: #6b7d7d;
      line-height: 1.4;
      margin-bottom: 1.2rem;
    }

    .modal-confirm-actions {
      display: flex;
      gap: .6rem;
      justify-content: center;
    }
    .modal-confirm-actions .btn-cancel { flex: 1; }

    .btn-modal-danger {
      flex: 1;
      background: #c0392b;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      padding: .5rem;
      cursor: pointer;
      transition: all .2s;
    }
    .btn-modal-danger:hover { background: #a93226; transform: translateY(-1px); }
  </style>
</head>
<body>

<div class="admin-shell">

  <?php include COMPLEMENTOS . '/sidebar.html'; ?>
  <?php include COMPLEMENTOS . '/topbar.html'; ?>

  <main class="admin-main">

    <div class="page-header">
      <h1>Configuración</h1>
      <p>Gestiona las preferencias generales, inventario y seguridad del sistema</p>
    </div>

    <!-- Fecha y Hora -->
    <div class="config-card">
      <div class="config-card-title">Fecha y Hora Predeterminada</div>
      <div class="config-row">
        <label class="config-label" for="cfg-fecha-hora">Fecha y Hora actual del sistema</label>
        <div class="config-control">
          <input type="text" id="cfg-fecha-hora" class="form-control" readonly
                 style="background:#f4f7f0; font-weight:600; color:var(--teal-700);"/>
        </div>
      </div>
    </div>

    <!-- Inventario -->
    <div class="config-card">
      <div class="config-card-title">Configuración de Inventario</div>

      <div class="config-row">
        <label class="config-label" for="cfg-dias-alerta">Días de alerta antes de vencimiento</label>
        <div class="config-control">
          <input type="number" id="cfg-dias-alerta" class="form-control" placeholder="Ej. 7" min="1" max="90"/>
        </div>
      </div>

      <div class="config-row">
        <label class="config-label" for="cfg-unidad">Unidad de medida por defecto</label>
        <div class="config-control">
          <select id="cfg-unidad" class="form-select">
            <option value="kg" selected>Kilogramos (kg)</option>
            <option value="lb">Libras (lb)</option>
            <option value="l">Litros (L)</option>
            <option value="unidades">Unidades</option>
          </select>
        </div>
      </div>

      <div class="config-row">
        <span class="config-label">Permitir inventario negativo</span>
        <div class="toggle-wrapper">
          <span class="toggle-label-txt" id="lbl-inventario-neg">No</span>
          <input class="form-check-input toggle-switch" type="checkbox" id="cfg-inventario-neg"
                 onchange="updateToggle(this,'lbl-inventario-neg')"/>
        </div>
      </div>

      <div class="config-row">
        <span class="config-label">Notificaciones de stock bajo</span>
        <div class="toggle-wrapper">
          <span class="toggle-label-txt" id="lbl-stock-bajo">Sí</span>
          <input class="form-check-input toggle-switch" type="checkbox" id="cfg-stock-bajo"
                 checked onchange="updateToggle(this,'lbl-stock-bajo')"/>
        </div>
      </div>
    </div>

    <!-- Seguridad -->
    <div class="config-card">
      <div class="config-card-title">Seguridad</div>

      <div class="config-row">
        <span class="config-label">Autenticación de dos factores</span>
        <div class="toggle-wrapper">
          <span class="toggle-label-txt" id="lbl-2fa">No</span>
          <input class="form-check-input toggle-switch" type="checkbox" id="cfg-2fa"
                 onchange="updateToggle(this,'lbl-2fa')"/>
        </div>
      </div>

      <div class="config-row">
        <label class="config-label" for="cfg-sesion">Tiempo de sesión (minutos)</label>
        <div class="config-control">
          <input type="number" id="cfg-sesion" class="form-control" value="30" min="5" max="480"/>
        </div>
      </div>

      <div class="config-row">
        <label class="config-label" for="cfg-contrasena">Cambiar contraseña cada</label>
        <div class="config-control">
          <select id="cfg-contrasena" class="form-select">
            <option value="30">30 días</option>
            <option value="60">60 días</option>
            <option value="90" selected>90 días</option>
            <option value="180">180 días</option>
            <option value="365">365 días</option>
            <option value="0">Nunca</option>
          </select>
        </div>
      </div>
    </div>

    <!-- Botones footer -->
    <div class="config-footer">
      <button class="btn-cancel" onclick="cancelarCambios()">Cancelar</button>
      <button class="btn-save" onclick="guardarCambios()">
        <i class="fa-solid fa-floppy-disk me-1"></i> Guardar Cambios
      </button>
    </div>

  </main>
</div>

<!-- Modal confirmación cancelar -->
<div class="overlay-confirm" id="overlayConfirm" onclick="cerrarSiAfuera(event)">
  <div class="modal-confirm-box" id="modalConfirmBox">
    <div class="modal-confirm-icon">
      <i class="fa-solid fa-triangle-exclamation" style="font-size:1.4rem; color:#c0392b;"></i>
    </div>
    <p class="modal-confirm-title">¿Cancelar cambios?</p>
    <p class="modal-confirm-desc">
      Todos los cambios que realizaste en esta página
      <strong>se perderán</strong> y el formulario volverá a su estado original.
      ¿Deseas continuar?
    </p>
    <div class="modal-confirm-actions">
      <button class="btn-cancel" onclick="cerrarModalConfirm()">Volver a editar</button>
      <button class="btn-modal-danger" onclick="confirmarCancelar()">Sí, cancelar</button>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../Componentes_Visuales_Animados/js/admin_dashboard.js"></script>

<script>
  /* ── Toggles ─────────────────────────────────────────── */
  function updateToggle(checkbox, labelId) {
    document.getElementById(labelId).textContent = checkbox.checked ? 'Sí' : 'No';
  }

  /* ── Reloj GMT-5 ─────────────────────────────────────── */
  function updateClock() {
    const now  = new Date();
    const utc  = now.getTime() + now.getTimezoneOffset() * 60000;
    const gmt5 = new Date(utc - 5 * 3600000);

    const pad = n => String(n).padStart(2, '0');
    const dd   = pad(gmt5.getDate());
    const mm   = pad(gmt5.getMonth() + 1);
    const yyyy = gmt5.getFullYear();
    let   hh   = gmt5.getHours();
    const ampm = hh >= 12 ? 'PM' : 'AM';
    hh = hh % 12 || 12;
    const min = pad(gmt5.getMinutes());
    const ss  = pad(gmt5.getSeconds());

    const input = document.getElementById('cfg-fecha-hora');
    if (input) input.value = `${dd}/${mm}/${yyyy}  ${hh}:${min}:${ss} ${ampm}  (GMT-5)`;
  }
  updateClock();
  setInterval(updateClock, 1000);

  /* ── Guardar ─────────────────────────────────────────── */
  function guardarCambios() {
    const btn = document.querySelector('.btn-save');
    btn.innerHTML = '<i class="fa-solid fa-check me-1"></i> Guardado';
    btn.style.background = 'var(--teal-700)';
    setTimeout(() => {
      btn.innerHTML = '<i class="fa-solid fa-floppy-disk me-1"></i> Guardar Cambios';
      btn.style.background = '';
    }, 2000);
  }

  /* ── Modal cancelar ──────────────────────────────────── */
  function cancelarCambios()   { document.getElementById('overlayConfirm').classList.add('active'); }
  function cerrarModalConfirm(){ document.getElementById('overlayConfirm').classList.remove('active'); }
  function confirmarCancelar() { location.reload(); }
  function cerrarSiAfuera(e)   { if (e.target.id === 'overlayConfirm') cerrarModalConfirm(); }
</script>

<script>
  /* ── Nav activo ──────────────────────────────────────── */
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.nav-item').forEach(function(item){
      item.classList.remove('active');
    });
    const path = window.location.pathname.split('/').pop();
    if (path === 'configuracion.php') {
      const config = document.getElementById('nav-configuracion');
      if (config) config.classList.add('active');
    }
    if (path === 'dashboard.php' || path === '') {
      const finca = document.getElementById('nav-finca');
      if (finca) finca.classList.add('active');
    }
  });
</script>

<script>
  /* ── Breadcrumb ──────────────────────────────────────── */
  document.addEventListener('DOMContentLoaded', function () {
    const breadcrumb = document.getElementById('breadcrumb');
    if (!breadcrumb) return;
    const path = window.location.pathname.split('/').pop();
    let contenido = `<a href="dashboard.php"><i class="fa-solid fa-house"></i></a>`;
    if (path === 'dashboard.php' || path === '') {
      contenido += ` <a href="dashboard.php">Inicio</a>`;
    } else {
      contenido += `<a href="dashboard.php">Inicio</a><span class="breadcrumb-sep"> › </span>`;
      switch (path) {
        case 'configuracion.php': contenido += `<span class="breadcrumb-current">Configuración</span>`; break;
        case 'reportes.php':      contenido += `<span class="breadcrumb-current">Reportes</span>`;      break;
        case 'alertas.php':       contenido += `<span class="breadcrumb-current">Alertas</span>`;       break;
        default:                  contenido += `<span class="breadcrumb-current">Página</span>`;         break;
      }
    }
    breadcrumb.innerHTML = contenido;
  });
</script>

</body>
</html>
