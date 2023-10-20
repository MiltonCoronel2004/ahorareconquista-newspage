<?php 

include("forbbiden/database/database.php");
// Supongamos que tienes un array de ubicaciones con sus respectivos IDs.
$ubicaciones = array();
for ($i = 51; $i <= 54; $i++) {
    $ubicaciones[] = $i;
}


$titulos_noticias = array();


// Iteramos sobre cada ubicación y obtenemos la información de la noticia correspondiente.
foreach ($ubicaciones as $ubicacion_id) {
    $consulta = "SELECT titulo, img1, id FROM news WHERE place = $ubicacion_id";
    $resultado = mysqli_query($connection, $consulta);
    $noticia = mysqli_fetch_assoc($resultado);
    
    // Si encontramos una noticia, almacenamos la imagen y el título en los arrays correspondientes.
    if ($noticia) {
        $titulos_noticias[$ubicacion_id] = $noticia['titulo'];
        $link_noticias[$ubicacion_id] = $noticia['id'];
    } else {
        // Si no se encontró una noticia para la ubicación actual, puedes manejarlo como desees.
        // Aquí, simplemente almacenamos un valor predeterminado en los arrays de imágenes y títulos.
        $img1_noticias[$ubicacion_id] = "ruta/a/imagen/default.jpg";
        $titulos_noticias[$ubicacion_id] = "No se encontró noticia";
    }
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link rel="icon" type="image/png" href="forbbiden/img/logo.png">
  <link rel="stylesheet" href="forbbiden/css/navbar.css?v=1">
  <link rel="stylesheet" href="forbbiden/css/ads.css?v=1">
  <link rel="stylesheet" href="forbbiden/css/news.css?v=1">
  <link rel="stylesheet" href="forbbiden/css/styles.css?v=1">
  <style>
    @media(max-width: 992px) {
      .ad-sense div {
      top: 7%;
    }
    }
    @media(max-width: 768px) {
      .ad-sense div {
      top: 16%;
      }
    }
  </style>
  <title>Avellaneda | Ahora Reconquista</title>
</head>
<body>
  
<div class="container-fluid text-center text-md-start" style="background-color: #182b33;">
    <div class="row text-center text-md-start"> 
      <div class="col-12 py-4 text-center text-md-start"><a href="https://ahorareconquista.com.ar"><img src="forbbiden/img/ahorareconquistalogo.png" alt="Logo" width="280px"></a></div>
    </div>  
  </div>
    
      
  </div>

  <div class="container-fluid mt-3 w-100">
    <nav>
      <ul class="ul w-100">
        <li><a href="https://ahorareconquista.com.ar">Inicio</a></li>
        <li><a href="reconquista">Reconquista</a></li>
        <li><a href="avellaneda">Avellaneda</a></li>
        <li><a href="provinciales">Provinciales</a></li>
        <li><a href="actualidad">Actualidad</a></li>
        <li><a href="policiales">Policiales</a></li>
        <li><a href="deportes">Deportes</a></li>
      </ul>
      <div class="hide">
        <i class="fa-solid fa-bars" style="color: #000 !important;" aria-hidden="true"></i>
      </div>
    </nav>
  </div>

  <div class="container">

  <div class="row mb-4 pt-2 px-5 d-flex g-1 marquee-container">
    <div class="col-12 text-center col-lg-2 text-lg-start py-2">
      <span id="ultimas-noticias">Últimas Noticias</span>
    </div>
    <div class="col-12 col-lg-10 py-2">
      <marquee behavior="alternate" direction="left"><a href="noticias/noticia.php?id=<?php echo $link_noticias[51]; ?>"><?php echo $titulos_noticias[51]; ?></a> - <a href="noticias/noticia.php?id=<?php echo $link_noticias[52]; ?>"><?php echo $titulos_noticias[52]; ?></a> - <a href="noticias/noticia.php?id=<?php echo $link_noticias[53]; ?>"><?php echo $titulos_noticias[53]; ?></a> - <a href="noticias/noticia.php?id=<?php echo $link_noticias[54]; ?>"><?php echo $titulos_noticias[54]; ?></a> </marquee>
    </div>
  </div>

    <div class="row mt-5"><h1>Avellaneda</h1></div>
    <div class="container-fluid mt-2 mb-5 divider" style="width: 100%; height: 2px; background-color: #000;"></div>

    <!-- Agregar el contenedor para los cards -->
    <div class="row mt-5 mb-5 card-container">
      <!-- Los cards generados por PHP se agregarán aquí -->
      <?php
      function recortarTexto($texto, $longitudMaxima) {
        if (strlen($texto) > $longitudMaxima) {
          $texto = substr($texto, 0, $longitudMaxima); // Recortar el texto a la longitud máxima
          $texto = substr($texto, 0, strrpos($texto, ' ')) . '...'; // Asegurarse de no cortar en medio de una palabra
        }
        return $texto;
      }

      include("forbbiden/database/database.php");

      $registrosPorPagina = 20;
      $paginaActual = isset($_GET['page']) ? (int)$_GET['page'] : 1;
      $offset = ($paginaActual - 1) * $registrosPorPagina;

      $consulta = "SELECT * FROM news WHERE category = 'Avellaneda' ORDER BY fecha DESC LIMIT $offset, $registrosPorPagina";
      $resultado = mysqli_query($connection, $consulta);
      $cantidadRegistros = mysqli_num_rows($resultado);

      if ($cantidadRegistros > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
      ?>
        <div class="col-12 col-lg-3">
          <div class="card mb-4" style="width: 100%;">
            <a href="noticias/noticia.php?id=<?php echo $fila['id']; ?>"><img src="php/files/<?php echo $fila['img1']; ?>" class="card-img-top" alt="..."></a>
              <a href="noticias/noticia.php?id=<?php echo $fila['id']; ?>">
                <div class="card-body">  
                  <p class="card-text"><?php echo recortarTexto($fila['titulo'], 100); ?></p>
                </div>
              </a>
          </div>
        </div>
      <?php 
        }
      }
      ?>
    </div>

    <!-- Agregar aquí la sección de paginación -->
    <div class="pagination mt-4 mb-4">
      <ul class="pagination justify-content-center">
        <?php if ($paginaActual > 1) { ?>
          <li class="page-item" id="previous"><a class="page-link" href="?page=<?php echo $paginaActual - 1; ?>">Anterior</a></li>
        <?php } ?>
        <?php if ($cantidadRegistros == $registrosPorPagina) { ?>
          <li class="page-item" id="next"><a class="page-link" href="?page=<?php echo $paginaActual + 1; ?>">Siguiente</a></li>
        <?php } ?>
      </ul>
    </div>


  </div>


  <div class="container-fluid px-5 pt-4 mt-5" style="background-color: #ffffff; box-shadow:#000; padding: 0 60px !important; padding-top: 25px !important;">
    <footer class="">
<!--       <div class="row">
        <div class="col-6 col-md-2 mb-3 text-center text-md-start">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">Home</a></li>
            <li class="nav-item mb-2"><a href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">Features</a></li>
            <li class="nav-item mb-2"><a href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">Pricing</a></li>
            <li class="nav-item mb-2"><a href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">FAQs</a></li>
            <li class="nav-item mb-2"><a href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">About</a></li>
          </ul>
        </div>
  
        <div class="col-6 col-md-2 mb-3 text-center text-md-start">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">Home</a></li>
            <li class="nav-item mb-2"><a href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">Features</a></li>
            <li class="nav-item mb-2"><a href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">Pricing</a></li>
            <li class="nav-item mb-2"><a href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">FAQs</a></li>
            <li class="nav-item mb-2"><a href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">About</a></li>
          </ul>
        </div>
  
        <div class="col-12 col-md-2 mb-4 text-center text-md-start">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">Home</a></li>
            <li class="nav-item mb-2"><a href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">Features</a></li>
            <li class="nav-item mb-2"><a href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">Pricing</a></li>
            <li class="nav-item mb-2"><a href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">FAQs</a></li>
            <li class="nav-item mb-2"><a href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">About</a></li>
          </ul>
        </div>
  
        <div class="col-md-5 offset-md-1 mb-3">
          <form>
            <h5>Suscribete a Nuestro Boletin informativo</h5>
            <p>Resumen mensual de lo que es nuevo y emocionante de nosotros.</p>
            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
              <label for="newsletter1" class="visually-hidden">Correo electrónico</label>
              <input id="newsletter1" type="text" class="form-control" placeholder="Correo electrónico">
              <button class="btn btn-primary" type="button">Subscribe</button>
            </div>
          </form>
        </div>
      </div> -->
  
      <div class="d-flex flex-column flex-sm-row justify-content-between mb-2 pt-3 border-top border-black">
        <p class="text-center text-md-start"><a href="https://instagram.com/miltoncoronel__">© <span id="currentYear"></span> Milton Coronel. All rights reserved.</a></p>
        <p class="text-center text-md-start"><a href="">© <span id="currentYear"></span> Maximiliano Ruiz Diaz. All rights reserved.</a></p>
      </div>
    </footer>
  </div>

  <script src="https://kit.fontawesome.com/42b5b848d1.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="forbbiden/js/getYear.js"></script>


  <script>
    $(".hide").on('click', function() {
      $("nav ul").toggle('slow');
    });
  </script>


</body>
</html>
