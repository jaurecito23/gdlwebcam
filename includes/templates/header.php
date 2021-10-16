<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Pagina Web</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/all.min.css">

  <?php

    $archivo = basename($_SERVER["PHP_SELF"]);
    $pagina = str_replace(".php","", $archivo);
    if($pagina == "invitados" || $pagina == "index"){

      echo '<link rel="stylesheet" href="css/colorbox.css">';

    }else if($pagina == "conferencia"){

      echo '<link rel="stylesheet" href="css/lightbox.css">';

    }
?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Oswald:wght@400;700&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>


  <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo $pagina; ?>">
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->

    <header class="site-header">

        <div class="hero">

            <div class="contenido-header">

                    <nav class="redes-sociales">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </nav>

                    <div class="informacion-evento">
                      <div class="clearfix">
                      <p class="fecha"><i class="fas fa-calendar-alt"></i> 10-12 Dic</p>
                      <p class="ciudad"><i class="fas fa-map-marker-alt"></i>Guadalajara, MX</p>
                    </div>

                    <h1 class="nombre-sitio">GdlWebCamp</h1>
                    <p class="slogan">La mejor conferencia de <span>diseño web</span></p>
                  </div><!-- Informacion evento -->
            </div>
        </div>
        <!--.hero-->
    </header>

    <div class="barra">
        <div class="contenedor clearfix">
          <div class="logo">
            <a href="index.php">
              <img src="img/logo.svg" alt="Logo GDLWEBCAM">
            </a>
            </div>
          <div class="menu-movil">
            <i class="fas fa-bars"></i>
            </div>


            <nav class="navegacion-principal  clearfix">
              <a href="conferencia.php">Conferencia</a>
              <a href="calendario.php">Calendario</a>
              <a href="invitados.php">Invitados</a>
              <a href="registro.php">Reservaciones</a>
            </nav>

          </div><!--Contenedor-->
          </div><!--BARRA NAVEGACIÓN-->