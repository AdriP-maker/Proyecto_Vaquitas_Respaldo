<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>HOFLOG</title>
  <link rel="stylesheet" href="../Componentes_Visuales_Animados/css/styles.css" />
  <link rel="stylesheet" href="../Componentes_Visuales_Animados/css/GModal.css" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Jost:wght@300;400;500&family=Poppins:wght@500;900&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>

<body>
    <!-- ===== NAVBAR ===== -->
    <?php include '../Complementos_html/Inicio_HTML/navbar.html'; ?>
    <!-- ===== FIN NAVBAR ===== --> 

    <!-- ===== CARRUSEL ===== -->
    <?php include '../Complementos_html/Inicio_HTML/Carrusel.html'; ?>
    <!-- ===== FIN CARRUSEL ===== -->

    <!-- =====Contenedor de Nuestra esencia ====== --> 
    <section class="esencia" id="esencia">
      <div class="esencia-container">
        <?php include '../Complementos_html/Inicio_HTML/Esencia.html'; ?>
      </div>
    </section>
    <!-- =====Fin Contenedor de Nuestra esencia ====== --> 

    <!-- =====Contenedor de Ganado Disponible ====== --> 
    <section class="ganado" id="ganado">
      <div class="ganado-container">
        <h2 class="ganado-titulo">GANADO DISPONIBLE</h2>
        <a href="#" class="ganado-link">Ver catálogo completo</a>
        <!-- Carrusel de cards -->
        <div class="ganado-wrapper">
          <button class="ganado-btn prev" id="ganadoPrev">&#8249;</button>
          <div class="ganado-track-outer">
            <div class="ganado-track" id="ganadoTrack">
            <?php include '../Complementos_html/Inicio_HTML/CardGanado.html'; ?>
            </div><!-- /ganado-track -->
          </div><!-- /ganado-track-outer -->
          <button class="ganado-btn next" id="ganadoNext">&#8250;</button>
        </div><!-- /ganado-wrapper -->
        <!-- Solo 2 dots, uno por grupo -->
        <div class="ganado-dots" id="ganadoDots">
          <button class="gdot active" data-index="0"></button>
          <button class="gdot" data-index="3"></button>
        </div>
      </div>
    </section>
    <!-- =====Fin Contenedor de Ganado Disponible ====== -->

    <!-- =====Inicio Garrafon ====== --> 
    <?php include '../Complementos_html/Inicio_HTML/Garrafon.html'; ?>
    <!-- =====Fin Garrafon ====== -->

    <!-- =====Inicio Footer ====== --> 
    <?php include '../Complementos_html/Inicio_HTML/Footer.html'; ?>
    <!-- =====Fin Footer ====== -->

     <!-- =====Inicio Modal de las CardGanado ====== -->
    <?php include '../Complementos_html/Inicio_HTML/CGanado_Modal.html'; ?>
      <!-- =====Fin Modal de las CardGanado====== -->

    <!-- ===== Animación del carrusel ===== -->
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../Componentes_Visuales_Animados/js/LgCarrusel.js"></script>
    <script src="../Componentes_Visuales_Animados/js/GanadoModal.js"></script>
</body>
</html>
