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
    <?php include '../Complementos_html/ProduccionLeche_HTML/Carrusel.html'; ?>
    <!-- ===== FIN CARRUSEL ===== -->

    <!-- ══ CONTROL DE CALIDAD ══ -->
    <?php include '../Complementos_html/ProduccionLeche_HTML/calidad.html'; ?>
    <!-- ══ FIN CONTROL DE CALIDAD ══ -->
    
    <!-- ══ TRAZABILIDAD ══ -->
    <?php include '../Complementos_html/ProduccionLeche_HTML/trazabilidad.html'; ?>
    <!-- ══ FIN TRAZABILIDAD ══ -->
    
    <!-- ══ CONSULTAR DISPONIBILIDAD ══ -->
    <?php include '../Complementos_html/ProduccionLeche_HTML/disponibilidad.html'; ?>
    <!-- ══ FIN CONSULTAR DISPONIBILIDAD ══ -->
    <!-- =====Inicio Footer ====== --> 
    <?php include '../Complementos_html/ProduccionLeche_HTML/Footer.html'; ?>
    <!-- =====Fin Footer ====== -->

    <!-- ===== Animación del carrusel ===== -->
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../Componentes_Visuales_Animados/js/LgCarrusel.js"></script>
    <script src="../Componentes_Visuales_Animados/js/GanadoModal.js"></script>
</body>
</html>