<style>

  /* ── Contenedor del toggle (switch Si/No) ── */
  .toggle-wrapper { display:flex; align-items:center; gap:.55rem; justify-content:flex-end; }

  /* Texto que muestra "Si" o "No" al lado del toggle */
  .toggle-label-txt { font-size:.82rem; color:#8aabab; font-weight:500; min-width:22px; text-align:right; }

  /* Estilo base del checkbox convertido en toggle */
  .form-check-input[type="checkbox"].toggle-switch { width:42px; height:22px; background-color:#c8d8c8; border:none; cursor:pointer; background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='white'/%3e%3c/svg%3e"); transition:background-color .25s; }

  /* Color verde cuando el toggle esta activado */
  .form-check-input[type="checkbox"].toggle-switch:checked { background-color:var(--teal-500); }

  /* Borde de enfoque accesible al usar teclado */
  .form-check-input[type="checkbox"].toggle-switch:focus { box-shadow:0 0 0 3px rgba(74,140,63,.2); }


  /* ── Tarjetas de configuracion ── */
  .config-card { background:var(--card-bg); border:1px solid var(--card-border); border-radius:var(--radius); box-shadow:var(--shadow-card); margin-bottom:1.4rem; overflow:hidden; animation:fadeUp .4s ease both; }

  /* Animacion escalonada para la segunda y tercera tarjeta */
  .config-card:nth-child(2) { animation-delay:.08s; }
  .config-card:nth-child(3) { animation-delay:.16s; }

  /* Encabezado de cada tarjeta */
  .config-card-title { font-family:var(--font-display); font-size:1rem; font-weight:700; color:var(--teal-800); padding:1.1rem 1.5rem .9rem; border-bottom:1px solid var(--card-border); background:rgba(115,200,131,.06); letter-spacing:.01em; }


  /* ── Fila de una opcion de configuracion ── */
  .config-row { display:flex; align-items:center; justify-content:space-between; padding:.95rem 1.5rem; border-bottom:1px solid rgba(0,0,0,.05); gap:1rem; }

  /* La ultima fila no lleva borde inferior */
  .config-row:last-child { border-bottom:none; }

  /* Texto descriptivo de la opcion (lado izquierdo) */
  .config-label { font-size:.88rem; font-weight:600; color:#2e4a32; min-width:220px; }

  /* Contenedor del control (input, select o toggle) */
  .config-control { flex:1; max-width:340px; }

  /* Estilos base para inputs y selects dentro de la fila */
  .config-control .form-control, .config-control .form-select { border:1px solid rgba(0,0,0,.14); border-radius:var(--radius-sm); font-family:var(--font-body); font-size:.88rem; color:#1e2e1e; background:#fff; padding:.45rem .85rem; transition:border-color .2s,box-shadow .2s; }

  /* Resaltado verde al hacer foco en el campo */
  .config-control .form-control:focus, .config-control .form-select:focus { border-color:var(--teal-400); box-shadow:0 0 0 3px rgba(74,140,63,.15); outline:none; }


  /* ── Botones de accion al pie de la pagina ── */
  .config-footer { display:flex; justify-content:flex-end; gap:.8rem; padding:1.2rem 0 .4rem; }

  /* Boton secundario: cancelar */
  .btn-cancel { padding:.5rem 1.4rem; border-radius:var(--radius-sm); border:1px solid var(--card-border); background:#fff; color:#3a5858; font-family:var(--font-body); font-size:.88rem; font-weight:600; cursor:pointer; transition:all .2s; }
  .btn-cancel:hover { background:var(--page-bg); }

  /* Boton principal: guardar */
  .btn-save { padding:.5rem 1.5rem; border-radius:var(--radius-sm); border:none; background:var(--teal-500); color:#fff; font-family:var(--font-body); font-size:.88rem; font-weight:700; cursor:pointer; transition:background .2s,transform .15s; }
  .btn-save:hover  { background:var(--teal-600); transform:translateY(-1px); }
  .btn-save:active { transform:translateY(0); }


  /* ── Overlay oscuro detras del modal ── */
  .overlay-confirm { position:fixed; inset:0; background:rgba(0,0,0,0.45); display:none; z-index:9999; align-items:center; justify-content:center; backdrop-filter:blur(4px); }

  /* Muestra el overlay cuando tiene la clase active */
  .overlay-confirm.active { display:flex; }

  /* Caja blanca del modal de confirmacion */
  .modal-confirm-box { background:#fff; border-radius:16px; width:100%; max-width:420px; padding:1.8rem 1.6rem; box-shadow:0 20px 60px rgba(0,0,0,0.25); text-align:center; animation:modalFadeIn .3s ease; }

  /* Animacion de entrada del modal */
  @keyframes modalFadeIn { from{opacity:0;transform:translateY(20px) scale(0.95)} to{opacity:1;transform:translateY(0) scale(1)} }

  /* Icono circular de advertencia dentro del modal */
  .modal-confirm-icon { width:60px; height:60px; margin:0 auto 12px; border-radius:50%; background:rgba(192,57,43,0.1); display:flex; align-items:center; justify-content:center; }

  /* Titulo del modal */
  .modal-confirm-title { font-size:1.2rem; font-weight:700; color:#1e2e1e; margin-bottom:.4rem; }

  /* Descripcion del modal */
  .modal-confirm-desc { font-size:.9rem; color:#6b7d7d; line-height:1.4; margin-bottom:1.2rem; }

  /* Fila de botones del modal */
  .modal-confirm-actions { display:flex; gap:.6rem; justify-content:center; }
  .modal-confirm-actions .btn-cancel { flex:1; }

  /* Boton rojo de accion destructiva dentro del modal */
  .btn-modal-danger { flex:1; background:#c0392b; color:#fff; border:none; border-radius:8px; font-weight:600; padding:.5rem; cursor:pointer; transition:all .2s; }
  .btn-modal-danger:hover { background:#a93226; transform:translateY(-1px); }


  /* ── Responsive: apila label y control en pantallas pequenas ── */
  @media (max-width:768px) { .config-row{flex-direction:column;align-items:flex-start} .config-control{max-width:100%;width:100%} }

</style>
