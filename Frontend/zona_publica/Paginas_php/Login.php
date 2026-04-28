<?php
/**
 * Login.php — HOFLOC, S.A. | Archivo Agrario
 * -------------------------------------------
 * Página de acceso al sistema. Orquesta los includes:
 *
 *   IniciarLogin.php              → sesión, CSRF, variables de error
 *   includes/head.html            → <head> con Bootstrap y Login.css
 *   includes/fondo.html           → imagen de fondo embebida
 *   includes/panel_izquierdo.html → branding estático
 *   includes/panel_derecho.html   → formulario (usa vars de IniciarLogin)
 *   includes/footer.html          → pie de página + Login.js
 */

<<<<<<< HEAD
=======
// Prepara sesión, token CSRF y variables de alerta antes del HTML
>>>>>>> 30caf87ffccb734589f2a2757afb7be61d3c479d
// __DIR__ = directorio donde está ESTE archivo (Paginas_php/)
// Así las rutas son absolutas y funcionan sin importar el CWD de XAMPP
define('LOGIN_DIR', __DIR__);
define('LOGIN_HTML', __DIR__ . '/../Complementos_html/Login_HTML/');

// Prepara sesión, token CSRF y variables de alerta antes del HTML
require_once LOGIN_DIR . '/IniciarLogin.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include LOGIN_HTML . 'head.html'; ?>
</head>
<body>

    <?php include LOGIN_HTML . 'fondo.html'; ?>

    <div class="login-card">
        <?php include LOGIN_HTML . 'panel_izquierdo.html'; ?>
        <?php include LOGIN_HTML . 'panel_derecho.html'; ?>
    </div>

    <?php include LOGIN_HTML . 'footer.html'; ?>

</body>
</html>
