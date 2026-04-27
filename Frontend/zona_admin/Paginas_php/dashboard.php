<?php
// 1. Ruta base: subimos un nivel desde Paginas_php para entrar a zona_admin
$dir_base = __DIR__ . '/..';

// 2. Definimos la carpeta donde están todos tus archivos HTML (según tu imagen)
define('COMPLEMENTOS', $dir_base . '/Complementos_html/HTML_Dashboard');

$pageTitle  = "Dashboard";
$breadcrumb = [['label' => 'Inicio']];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>HOFLOC.SA – <?= htmlspecialchars($pageTitle) ?></title>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&family=Manrope:wght@400;700&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
<link rel="stylesheet" href="../Componentes_Visuales_Animados/css/admin_styles.css"/>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="admin-shell">
    <?php include COMPLEMENTOS . '/sidebar.html'; ?>
    <?php include COMPLEMENTOS . '/topbar.html'; ?>

    <main class="admin-main">
        <div class="page-header">
            <h1>Bienvenido, Horacio 👋</h1>
            <p>Resumen operativo de la finca — semana en curso</p>
        </div>

        <?php include COMPLEMENTOS . '/kpi_cards.html'; ?>

        <div class="section-title">Producción &amp; Distribución</div>
        <?php include COMPLEMENTOS . '/charts.html'; ?>

        <div class="section-title">Alertas Recientes</div>
        <?php include COMPLEMENTOS . '/alerts.html'; ?>
    </main>
</div>

<script src="../Componentes_Visuales_Animados/js/admin_dashboard.js"></script>
</body>
</html>