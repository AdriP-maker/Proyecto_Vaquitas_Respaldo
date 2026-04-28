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
      <input class="form-check-input toggle-switch" type="checkbox" id="cfg-inventario-neg" onchange="updateToggle(this,'lbl-inventario-neg')"/>
    </div>
  </div>
  <div class="config-row">
    <span class="config-label">Notificaciones de stock bajo</span>
    <div class="toggle-wrapper">
      <span class="toggle-label-txt" id="lbl-stock-bajo">Sí</span>
      <input class="form-check-input toggle-switch" type="checkbox" id="cfg-stock-bajo" checked onchange="updateToggle(this,'lbl-stock-bajo')"/>
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
      <input class="form-check-input toggle-switch" type="checkbox" id="cfg-2fa" onchange="updateToggle(this,'lbl-2fa')"/>
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

<!-- Botones -->
<div class="config-footer">
  <button class="btn-cancel" onclick="cancelarCambios()">Cancelar</button>
  <button class="btn-save" onclick="guardarCambios()">
    <i class="fa-solid fa-floppy-disk me-1"></i> Guardar Cambios
  </button>
</div>

<!-- Modal -->
<div class="overlay-confirm" id="overlayConfirm" onclick="cerrarSiAfuera(event)">
  <div class="modal-confirm-box" id="modalConfirmBox">
    <div class="modal-confirm-icon">
      <i class="fa-solid fa-triangle-exclamation" style="font-size:1.4rem; color:#c0392b;"></i>
    </div>
    <p class="modal-confirm-title">¿Cancelar cambios?</p>
    <p class="modal-confirm-desc">
      Todos los cambios que realizaste en esta página <strong>se perderán</strong> y el formulario volverá a su estado original. ¿Deseas continuar?
    </p>
    <div class="modal-confirm-actions">
      <button class="btn-cancel" onclick="cerrarModalConfirm()">Volver a editar</button>
      <button class="btn-modal-danger" onclick="confirmarCancelar()">Sí, cancelar</button>
    </div>
  </div>
</div>
