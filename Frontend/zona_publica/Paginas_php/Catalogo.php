<?php
  require __DIR__ . '/cat_datos.php';
  $total = count($animales);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Catálogo — HOFLOC, S.A.</title>

  <!-- Fuentes igual que el resto del proyecto -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Jost:wght@300;400;500&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

  <!-- Chart.js (usado por los modales Ver Detalles) -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- CSS compartido navbar -->
  <link rel="stylesheet" href="../Componentes_Visuales_Animados/css/InicioCSS/navbarTodos.css"/>

  <!-- CSS modal ganado -->
  <link rel="stylesheet" href="../Componentes_Visuales_Animados/css/InicioCSS/GModal.css"/>

  <!-- CSS base del Inicio (define ganado-card, botones, footer, etc.) -->
  <link rel="stylesheet" href="../Componentes_Visuales_Animados/css/InicioCSS/styles.css"/>

  <!-- CSS propio del catálogo -->
  <link rel="stylesheet" href="../Componentes_Visuales_Animados/css/CatalogoCSS/Catalogo.css"/>
</head>

<!-- ===== NAVBAR ===== -->
<?php include '../Complementos_html/Inicio_HTML/navbar.html'; ?>
<!-- ===== FIN NAVBAR ===== -->

<!-- ===== HERO ===== -->
<?php include '../Complementos_html/Catalogo_HTML/cat_hero.html'; ?>
<!-- ===== FIN HERO ===== -->

<!-- ===== FILTROS ===== -->
<?php include '../Complementos_html/Catalogo_HTML/cat_filtros.html'; ?>
<!-- ===== FIN FILTROS ===== -->

<!-- ===== TARJETAS ===== -->
<?php include '../Paginas_php/cat_cards.php'; ?> 
<!-- ===== FIN TARJETAS ===== -->

<!-- ===== FOOTER ===== -->
<?php include '../Complementos_html/Inicio_HTML/Footer.html'; ?>
<!-- ===== FIN FOOTER ===== -->

<!-- ===== MODALES (Me Interesa + Ver Detalles) ===== -->
<?php include '../Complementos_html/Inicio_HTML/CGanado_Modal.html'; ?>
<!-- ===== FIN MODALES ===== -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS modales — mismo que usa Inicio.php -->
<script src="../Componentes_Visuales_Animados/js/InicioJS/GanadoModal.js"></script>

<!-- JS catálogo — filtros, animaciones, navbar scroll -->
<script src="../Componentes_Visuales_Animados/js/CatalogoJS/Catalogo.js"></script>

</body>
</html>
