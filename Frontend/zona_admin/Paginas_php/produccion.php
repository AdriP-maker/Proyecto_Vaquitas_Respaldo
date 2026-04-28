<?php
$dir_base = __DIR__ . '/..';

// NUEVA carpeta de componentes para Producción
define('COMPLEMENTOS', $dir_base . '/Complementos_html/HTML_Produccion');

// reutilizamos los del dashboard
define('COMPLEMENTOS_DASH', $dir_base . '/Complementos_html/HTML_Dashboard');

$pageTitle = "Producción";
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
<link rel="stylesheet" href="../Componentes_Visuales_Animados/css/produccion_styles.css"/>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<div class="admin-shell">

    <!-- REUTILIZADOS -->
    <?php include COMPLEMENTOS_DASH . '/sidebar.html'; ?>
    <?php include COMPLEMENTOS_DASH . '/topbar.html'; ?>

    <main class="admin-main">

        <?php include COMPLEMENTOS . '/header_produccion.html'; ?>
        <?php include COMPLEMENTOS . '/kpi_produccion.html'; ?>

        <?php include COMPLEMENTOS . '/modal_produccion.html'; ?>

        <div class="section-header">
            <h3>Tendencia Semanal</h3>
            <button id="btnAbrirModal" class="btn-primary">
                <i class="fa-solid fa-plus"></i> Registrar producción
            </button>
        </div>

        <div class="section-grid">
            <?php include COMPLEMENTOS . '/grafico_produccion.html'; ?>
            <?php include COMPLEMENTOS . '/top_produccion.html'; ?>
        </div>

        <?php include COMPLEMENTOS . '/tabla_produccion.html'; ?>

    </main>
</div>

<script src="../Componentes_Visuales_Animados/js/produccion.js"></script>

<script>
// Breadcrumb específico de esta página
document.addEventListener("DOMContentLoaded", () => {
    setBreadcrumb([
        { label: "Operaciones", href: "#" },
        { label: "Producción" }
    ]);
});
</script>

</body>
</html>