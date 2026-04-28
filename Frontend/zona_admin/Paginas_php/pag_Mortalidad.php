<?php

// ======= PAGINA PRINCIPAL DE MORTALIDAD ============

// 1. Ruta base: subimos un nivel desde Paginas_php para entrar a zona_admin
$dir_base = __DIR__ . '/..';

//Se define la carpeta donde están todos mis archivos HTML
define('COMPONENTES', $dir_base . '/Complementos_html/HTML_Mortalidad');

// 2. Definimos la carpeta donde están todos tus archivos HTML (según tu imagen)
define('COMPLEMENTOS', $dir_base . '/Complementos_html/HTML_Dashboard');

$pageTitle  = "Mortalidad";
$breadcrumb = [
    ['label' => 'Inicio', 'url' => 'dashboard.php'],
    ['label' => 'Operaciones'],
    ['label' => 'Mortalidad']
];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HOFLOC.SA – <?= htmlspecialchars($pageTitle) ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&family=Manrope:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="../Componentes_Visuales_Animados/css/admin_styles.css" />
    <link rel="stylesheet" href="../Componentes_Visuales_Animados/css/mortalidad_styles.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="admin-shell">
        <?php include COMPLEMENTOS . '/sidebar.html'; ?> <!--Se incluye menu de navegación -->
        <?php include COMPLEMENTOS . '/topbar.html'; ?> <!--Se incluye la actualización de migas de Pan-->

        <!---Inicio del contenedor Mortalidad y su información-->
        <main class="admin-main">
            <!--Inicia el include del llamado del Header-->
            <?php include COMPONENTES . '/header.html'; ?>

            <!--Inicia el include del llamado de modal dea la tabla-->
            <?php include COMPONENTES . '/modal_tabla.html'; ?>

            <!--Inicia el include del llamado de la Tabla de Datos-->
            <?php include COMPONENTES . '/tabla.html'; ?>

            <!--Inicia el include del llamado del Tarjetas Estadísticas-->
            <?php include COMPONENTES . '/cards_Estadisticas.html'; ?>

            <!--Inicia el include del llamado del Tarjetas grafica-->
            <?php include COMPONENTES . '/grafica.html'; ?>

            <!-- Modal de nuevo registro -->
            <?php include COMPONENTES . '/nuevo_registro.html'; ?>
        </main>
    </div>

    <script>
        // Actualizar migas de pan dinámicamente
        document.addEventListener('DOMContentLoaded', () => {
            const breadcrumbCurrent = document.getElementById('breadcrumb-current');
            if (breadcrumbCurrent) {
                breadcrumbCurrent.textContent = 'Mortalidad';
            }
        });
    </script>
</body>

<script src="../Componentes_Visuales_Animados/js/admin_dashboard.js"></script>
<script src="../Componentes_Visuales_Animados/js/mortalidad.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>

<!--Mejora del color resaltado del Sidebar y desactivar el active y colocar el 
resaltado en la opción correcta-->
<script>
    document.addEventListener("DOMContentLoaded", () => {

        const currentPage = window.location.pathname.split("/").pop();

        const navItems = document.querySelectorAll(".nav-item");

        // quitar todos los active
        navItems.forEach(item => item.classList.remove("active"));

        // asignar el correcto
        navItems.forEach(item => {
            const href = item.getAttribute("href");

            if (href && href === currentPage) {
                item.classList.add("active");

                // abrir submenu si aplica
                const submenu = item.closest(".nav-submenu");
                if (submenu) {
                    submenu.classList.add("open");

                    const parent = submenu.previousElementSibling;
                    if (parent) parent.classList.add("open");
                }
            }
        });

    });
</script>