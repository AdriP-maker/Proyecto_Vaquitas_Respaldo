<?php

/**
 * ValidarLogin.php — HOFLOC, S.A. | Archivo Agrario
 * ---------------------------------------------------
 * Verificación simulada (sin base de datos).
 * Cuando tengas BD, reemplaza el arreglo $usuarios
 * por una consulta real.
 *
 * Credenciales:
 *   Usuario   : admin
 *   Contraseña: HoFloc@2024!
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Solo aceptar POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: Login.php');
    exit;
}

// ── Usuarios simulados ──────────────────────────────────────────
// Cuando tengas BD, quita este arreglo y haz la consulta aquí.
$usuarios = [
    [
        'usuario'    => 'Horacio',
        'password'   => 'HoFloc@2026!',
        'usuario'    => 'admin',
        'password'   => 'HoFloc@2024!',
        'nombre'     => 'Horacio Flores',
        'email'      => 'horacio.flores@hofloc.com',
        'rol'        => 'admin',
    ],
];
// ───────────────────────────────────────────────────────────────

$usuarioIngresado  = trim($_POST['usuario']  ?? '');
$passwordIngresado = trim($_POST['password'] ?? '');

// Campos vacíos
if ($usuarioIngresado === '' || $passwordIngresado === '') {
    header('Location: Login.php?error=vacios');
    exit;
}

// Buscar el usuario y verificar contraseña
$encontrado = null;
foreach ($usuarios as $u) {
    if (
        strcasecmp($u['usuario'], $usuarioIngresado) === 0 ||
        strcasecmp($u['email'],   $usuarioIngresado) === 0
    ) {
        if ($u['password'] === $passwordIngresado) {
            $encontrado = $u;
        }
        break;
    }
}

// Credenciales incorrectas
if ($encontrado === null) {
    header('Location: Login.php?error=credenciales&usuario=' . urlencode($usuarioIngresado));
    exit;
}

// ── Sesión exitosa ──────────────────────────────────────────────
// Guardamos temporalmente para que dashboard.php pueda leer los datos,
// pero NO persistimos la sesión entre visitas al login.
$_SESSION['usuario_nombre'] = $encontrado['nombre'];
$_SESSION['usuario_email']  = $encontrado['email'];
$_SESSION['usuario_rol']    = $encontrado['rol'];
$_SESSION['login_time']     = time();


header('Location: /Proyecto_Vaquitas_Respaldo/Frontend/zona_admin/Paginas_php/dashboard.php');

header('Location: dashboard.php');

exit;
