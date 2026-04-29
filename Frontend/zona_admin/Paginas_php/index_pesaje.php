<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HOFLOC.SA – Pesaje</title>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Manrope:wght@400;500;600;700;800&display=swap" />

  <!-- ../  sale de Paginas_php/  -->
  <!-- ../  sale de zona_admin/   -->
  <!-- luego entra a Componentes_Visuales_Animados/css/css_pesaje/ -->
  <link rel="stylesheet" href="../Componentes_Visuales_Animados/css/css_pesaje/admin_stylespesaje.css" />
<link rel="stylesheet" href="../Componentes_Visuales_Animados/css/css_pesaje/pesaje_styles.css" />
</head>
<body>
<div class="admin-shell">

  <?php include __DIR__ . '/../Complementos_html/HTML_Pesaje/sidebar.html'; ?>
<?php include __DIR__ . '/../Complementos_html/HTML_Pesaje/Nav_pesaje.html'; ?>
<?php include __DIR__ . '/../Complementos_html/HTML_Pesaje/contenido.html'; ?>
<?php include __DIR__ . '/../Complementos_html/HTML_Pesaje/footer.html'; ?>

</div>
</body>
</html>