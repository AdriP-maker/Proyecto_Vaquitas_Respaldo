<?php
/**
 * IniciarLogin.php — HOFLOC, S.A. | Archivo Agrario
 * --------------------------------------------------
 * Se ejecuta al inicio de Login.php (antes del HTML).
 * Prepara las variables que el panel_derecho.html necesita:
 *   - Token CSRF para proteger el formulario
 *   - Mensaje de error si ValidarLogin.php mandó uno por GET
 *   - El usuario que escribió, para no perderlo si falla el login
 */

// Arrancar sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Limpiar sesión para que siempre pida los datos
session_unset();
session_destroy();
session_start();

// Leer el código de error que viene en la URL desde ValidarLogin.php
$codigoError = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';

// Mapear el código a clase Bootstrap y mensaje legible
$alertas = [
    'vacios'       => ['clase' => 'alert-warning', 'texto' => 'Por favor complete todos los campos.'],
    'credenciales' => ['clase' => 'alert-danger',  'texto' => 'Usuario o contraseña incorrectos.'],
    'bloqueado'    => ['clase' => 'alert-danger',  'texto' => 'Cuenta bloqueada. Contacte al administrador.'],
];

// $alerta queda null si no hay error, o con [clase, texto] si hay uno
$alerta = $alertas[$codigoError] ?? null;

// Rescatar el usuario que escribió para pre-llenarlo en el campo
$usuarioGuardado = isset($_GET['usuario']) ? htmlspecialchars($_GET['usuario']) : '';
