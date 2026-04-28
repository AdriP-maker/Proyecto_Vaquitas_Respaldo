<?php
// Sube un nivel desde Paginas_php para acceder a la carpeta raiz del Frontend
$dir_base = dirname(__DIR__);

// Ruta a los componentes compartidos del dashboard (sidebar, topbar, etc.)
define('COMPLEMENTOS', $dir_base . '/Complementos_html/HTML_Dashboard');

// Ruta a la carpeta de estilos CSS
define('CSS',          $dir_base . '/Componentes_Visuales_Animados/css');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>HOFLOC.SA - Configuracion</title>

  <!-- Fuentes tipograficas del sistema -->
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>

  <!-- Iconos Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

  <!-- Estilos base del panel de administracion -->
  <link rel="stylesheet" href="../Componentes_Visuales_Animados/css/admin_styles.css"/>

  <!-- Framework Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>

  <!-- Estilos propios de la pagina de configuracion -->
  <link rel="stylesheet" href="../Componentes_Visuales_Animados/css/cfg_estilos.css"/>
</head>
<body>

<div class="admin-shell">

  <!-- Barra lateral de navegacion -->
  <?php include COMPLEMENTOS . '/sidebar.html'; ?>

  <!-- Barra superior con usuario y notificaciones -->
  <?php include COMPLEMENTOS . '/topbar.html'; ?>

  <!-- Contenido principal de la pagina -->
  <main class="admin-main">
    <?php include COMPLEMENTOS . '/cfg_contenido.html'; ?>
  </main>

</div>

<!-- Scripts de la pagina -->
<?php include __DIR__ . '/cfg_scripts.php'; ?>

</body>
</html>
