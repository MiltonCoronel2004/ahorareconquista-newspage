<?php 
include("forbbiden/database/database.php");

// Supongamos que tienes un array de ubicaciones con sus respectivos IDs.
$ubicaciones = array();
for ($i = 1; $i <= 100; $i++) {
    $ubicaciones[] = $i;
}

// Definimos arrays para almacenar las imágenes y títulos de noticias para cada ubicación.
$img1_noticias = array();
$titulos_noticias = array();
$link_noticias = array();


// Iteramos sobre cada ubicación y obtenemos la información de la noticia correspondiente.
foreach ($ubicaciones as $ubicacion_id) {
    $consulta = "SELECT titulo, img1, id FROM news WHERE place = $ubicacion_id";
    $resultado = mysqli_query($connection, $consulta);
    $noticia = mysqli_fetch_assoc($resultado);
    
    // Si encontramos una noticia, almacenamos la imagen y el título en los arrays correspondientes.
    if ($noticia) {
        $img1_noticias[$ubicacion_id] = $noticia['img1'];
        $titulos_noticias[$ubicacion_id] = $noticia['titulo'];
        $link_noticias[$ubicacion_id] = $noticia['id'];
    } else {
        // Si no se encontró una noticia para la ubicación actual, puedes manejarlo como desees.
        // Aquí, simplemente almacenamos un valor predeterminado en los arrays de imágenes y títulos.
        $img1_noticias[$ubicacion_id] = "ruta/a/imagen/default.jpg";
        $titulos_noticias[$ubicacion_id] = "No se encontró noticia";
    }
}

function recortarTexto($texto, $longitudMaxima)   {
  if (strlen($texto) > $longitudMaxima) {
    $texto = substr($texto, 0, $longitudMaxima); // Recortar el texto a la longitud máxima
    $texto = substr($texto, 0, strrpos($texto, ' ')) . '...'; // Asegurarse de no cortar en medio de una palabra
  }
  return $texto;
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
  <link rel="stylesheet" href="forbbiden/css/carousel.css?v=1">
  <link rel="stylesheet" href="forbbiden/css/styles.css?v=1">
  <link rel="stylesheet" href="forbbiden/css/sides.css?v=1">
  <link rel="stylesheet" href="forbbiden/css/imageGigan.css?v=1"> 
  <link rel="stylesheet" href="forbbiden/css/categorys.css?v=1">
  <link rel="stylesheet" href="forbbiden/css/ads.css?v=1">



  <title>Ahora Reconquista</title>
  <meta property="og:title" content="Ahora Reconquista">
  <meta property="og:description" content="Sitio web N° 1 de Noticias de Reconquista Santa Fe">
  <meta property="og:image" content="forbbiden/img/logo.png">
  <meta property="og:url" content="https://ahorareconquista.com.ar">
  <meta property="og:icon" content="https://ahorareconquista.com.ar">
  <meta property="og:type" content="website"> <!-- Puedes usar "website", "article", "product", etc. según el contenido -->

  <!-- <style>
    * {
      border: 1px solid black !important;
    }
  </style>
   -->
</head>

<style>
    body {
      overflow-x: hidden; /* Bloquear scroll horizontal */
    }
</style>

<body>

<div class="container-fluid text-center text-md-start" style="background-color: #182b33;">
    <div class="row text-center text-md-start"> 
      <div class="col-12 py-4 text-center text-md-start"><a href="https://ahorareconquista.com.ar"><img src="forbbiden/img/ahorareconquistalogo.png" alt="Logo" width="280px"></a></div>
    </div>  
  </div>


  <div class="container-fluid mt-3 w-100" >
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




    <div class="row">
      
      <div class="col-lg-3 side left">  
        <div class="row mb-4">
          <a href="noticias/noticia.php?id=<?php echo $link_noticias[1]; ?>" class="side-img" style="background-image: url('php/files/<?php echo $img1_noticias[1]; ?>');"></a>
          <article>
            <p class="px-2 pt-1"><a class="side-title" style="font-size: 80%;" href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>"><?php echo recortarTexto($titulos_noticias[1], 80); ?></a></p>
          </article>
        </div>


        <div class="row mb-2 card ">
          <a href="noticias/noticia.php?id=<?php echo $link_noticias[2]; ?>" class="side-img" style="background-image: url('php/files/<?php echo $img1_noticias[2]; ?>');"></a>
 
          <article>
            <p class="px-2 pt-1"><a class="side-title" style="font-size: 80%;" href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>"><?php echo recortarTexto($titulos_noticias[2], 80); ?></a></p>
          </article>
        </div>

        <div class="row mb-4 card bg-transparent border-0 item-list">
          <div class="card" style="width: 100%">
            <ul class="list-group list-group-flush">
              <a href="https://instagram.com/maxiruizdiaaz"><li class="list-group-item border-0">Contacto Publicidad</li></a>
              <a href="https://instagram.com/miltoncoronel__"><li class="list-group-item border-0">Contacto Desarrollo Web/Software</li></a>
              <a href="https://instagram.com/maxiruizdiaaz"><li class="list-group-item border-0">Contacto Noticias</li></a>
            </ul>
          </div>
        </div>

      </div>


      
      <div class="col-lg-6">
        <div class="row">
          <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="5000">
                  <a href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>">
                  <div class="image1" style="background-image: url('php/files/<?php echo $img1_noticias[10]; ?>');">
                  <div class="image-div">
                    <p class="text-white ps-2"><?php echo recortarTexto($titulos_noticias[10], 85); ?></p>
                  </div>
                </div>
                  </a>
                <div class="carousel-caption d-none d-lg-block">
                </div>
              </div>
              <div class="carousel-item" data-bs-interval="5000">
                <a href="noticias/noticia.php?id=<?php echo $link_noticias[11]; ?>">
                    <div class="image2" style="background-image: url('php/files/<?php echo $img1_noticias[11]; ?>');">
                    <div class="image-div">
                      <p class="text-white ps-2"><?php echo recortarTexto($titulos_noticias[11], 85); ?></p>
                    </div>
                  </div>
                </a>
                <div class="carousel-caption d-none d-lg-block"></div>
              </div>
              <div class="carousel-item">
                <a href="noticias/noticia.php?id=<?php echo $link_noticias[12]; ?>">
                      <div class="image3" style="background-image: url('php/files/<?php echo $img1_noticias[12]; ?>');">
                      <div class="image-div">
                        <p class="text-white ps-2"><?php echo recortarTexto($titulos_noticias[12], 85); ?></p>
                      </div>
                    </div>
                </a>
                <div class="carousel-caption d-none d-lg-block"></div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">              
              <i class="fa-solid fa-chevron-left" style="color: #ffffff;"></i>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
              <i class="fa-solid fa-chevron-right" style="color: #ffffff;"></i>
              <span class="visually-hidden">Next</span>
            </button>
          </div>  
        </div>



        <div class="row" style="margin-top: 30px;">
          <div class="col-12 col-md-6 mb-5">
          <a href="noticias/noticia.php?id=<?php echo $link_noticias[3]; ?>"><div class="side-img" style="background-image: url('php/files/<?php echo $img1_noticias[3]; ?>');"></div></a>
            <article>
              <p class="px-3 pt-2 pb-3"><a class="side-title" style="font-size: 80%;" href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>"><?php echo recortarTexto($titulos_noticias[3], 80); ?></a></p>
            </article>
          </div>
          <div class="col-12 col-md-6">
            <a href="noticias/noticia.php?id=<?php echo $link_noticias[4]; ?>"><div class="side-img" style="background-image: url('php/files/<?php echo $img1_noticias[4]; ?>');"></div></a>
            <article>
              <p class="px-3 pt-2 pb-3"><a class="side-title" style="font-size: 80%;" href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>"><?php echo recortarTexto($titulos_noticias[4], 80); ?></a></p>
            </article>
          </div>
        </div>
      </div>

      <div class="col-lg-3 side right mt-4 mt-lg-0">
        <div class="row side-right-item border-none">
          <div class="col-3 col-sm-2 col-lg-4 pt-lg-1">
            <div class="side-post" style="background-image: url('php/files/<?php echo $img1_noticias[6]; ?>');"></div>
          </div>
          <div class="col-8">
            <a href="noticias/noticia.php?id=<?php echo $link_noticias[6]; ?>"><p class="side-text"><?php echo recortarTexto($titulos_noticias[6], 85); ?></p></a>
          </div>
        </div>

        <div class="row side-right-item">
          <div class="col-3 col-sm-2 col-lg-4 pt-lg-1">
            <div class="side-post" style="background-image: url('php/files/<?php echo $img1_noticias[7]; ?>');"></div>
          </div>
          <div class="col-8">
            <a href="noticias/noticia.php?id=<?php echo $link_noticias[7]; ?>"><p class="side-text"><?php echo recortarTexto($titulos_noticias[7], 80); ?></p></a>
          </div>
        </div>

        <div class="row side-right-item">
          <div class="col-3 col-sm-2 col-lg-4 pt-lg-1">
            <div class="side-post" style="background-image: url('php/files/<?php echo $img1_noticias[8]; ?>');"></div>
          </div>
          <div class="col-8">
            <a href="noticias/noticia.php?id=<?php echo $link_noticias[8]; ?>"><p class="side-text"><?php echo recortarTexto($titulos_noticias[8], 80); ?></p></a>
          </div>
        </div>

        <div class="row side-right-item">
          <div class="col-3 col-sm-2 col-lg-4 pt-lg-1">
            <div class="side-post" style="background-image: url('php/files/<?php echo $img1_noticias[9]; ?>')"></div>
          </div>
          <div class="col-8">
            <a href="noticias/noticia.php?id=<?php echo $link_noticias[9]; ?>"><p class="side-text"><?php echo recortarTexto($titulos_noticias[9], 80); ?></p></a>
          </div>
        </div>

        <div class="row  px-3 py-2">
          <a href="noticias/noticia.php?id=<?php echo $link_noticias[5]; ?>" class="side-img" style="background-image: url('php/files/<?php echo $img1_noticias[5]; ?>');"></a>
          <article>
            <p class="px-3"><a class="side-title" style="font-size: 80%;" href="noticias/noticia.php?id=<?php echo $link_noticias[10]; ?>"><?php echo recortarTexto($titulos_noticias[5], 65); ?></a></p>
          </article>
          </div>

          
  
      </div>
    </div>

      <div class="row mt-5 mb-5" style="width: 100%; height: 2px; background-color: #000;"></div>
    
    <div class="row gigantography mt-5">

      <div class="col-12 col-lg-4 mb-4">
      <a href="noticias/noticia.php?id=<?php echo $link_noticias[13]; ?>">
        <div class="container imageGigan" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('php/files/<?php echo $img1_noticias[13]; ?>');">
        <p class="text-white px-3"><?php echo recortarTexto($titulos_noticias[13], 81); ?></p>
        </div>
        </a>
      </div>

      <div class="col-12 col-lg-4 mb-4">
      <a href="noticias/noticia.php?id=<?php echo $link_noticias[14]; ?>">
        <div class="container imageGigan" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('php/files/<?php echo $img1_noticias[14]; ?>');">
        <p class="text-white px-3"><?php echo recortarTexto($titulos_noticias[14], 81); ?></p>
        </div>
        </a>
      </div>

      <div class="col-12 col-lg-4 mb-4">
        <a href="noticias/noticia.php?id=<?php echo $link_noticias[15] ?>">
        <div class="container imageGigan" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('php/files/<?php echo $img1_noticias[15]; ?>');">
        <p class="text-white px-3"><?php echo recortarTexto($titulos_noticias[15], 81); ?></p>
        </div>
        </a>
      </div>

    </div>






    <div class="row mt-5"><h1>RECONQUISTA</h1></div>
    <div class="row mt-5 mb-5" style="width: 100%; height: 3px; background-color: #000;"></div>


    <div class="row">
    <?php


    // Realiza la consulta SQL para obtener las noticias de la categoría "Reconquista" ordenadas por fecha
    $sql = "SELECT * FROM news WHERE category = 'Reconquista' ORDER BY fecha DESC";
    $resultado = mysqli_query($connection,$sql);

    // Contadores para controlar la cantidad de noticias mostradas
    $bigCategoryCount = 0;
    $smallCategoryCount = 0;

    while ($fila = $resultado->fetch_assoc()) {
        $enlace = "noticias/noticia.php?id=" . $fila["id"];
        $titulo = recortarTexto($fila["titulo"], $smallCategoryCount < 2 ? 70 : 80);
        $imagen = "php/files/" . $fila["img1"];

        // Verifica si debes mostrar una bigCategory o smallCategory
        if ($bigCategoryCount < 2) {
            // Muestra bigCategory
    ?>
            <div class="col-12 col-lg-6">
                <a href="<?php echo $enlace; ?>">
                    <div class="bigCategory mb-4" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('<?php echo $imagen; ?>');">
                        <div class="category-img-word">
                            <p class="text-white ps-2"><?php echo $titulo; ?></p>
                        </div>
                    </div>
                </a>
            </div>
    <?php
            $bigCategoryCount++;
        } elseif ($smallCategoryCount < 3) {
            // Muestra smallCategory
    ?>
            <div class="col-12 col-lg-4">
                <a href="<?php echo $enlace; ?>">
                    <div class="smallCategory" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('<?php echo $imagen; ?>');">
                        <div class="category-img-word2">
                            <p class="text-white ps-2"><?php echo $titulo; ?></p>
                        </div>
                    </div>
                </a>
            </div>
    <?php
            $smallCategoryCount++;
        }

        // Si se han mostrado 2 bigCategory y 3 smallCategory, sal del bucle
        if ($bigCategoryCount >= 2 && $smallCategoryCount >= 3) {
            break;
        }
    }
    


    ?>
</div>

    <div class="row mt-5 mb-5" style="width: 100%; height: 2px; background-color: #000;"></div>
    <div class="row mt-5"><h1>AVELLANEDA</h1></div>
    <div class="row mt-5 mb-5" style="width: 100%; height: 3px; background-color: #000;"></div>


    <div class="row">
    <?php


    // Realiza la consulta SQL para obtener las noticias de la categoría "Reconquista" ordenadas por fecha
    $sql = "SELECT * FROM news WHERE category = 'Avellaneda' ORDER BY fecha DESC";
    $resultado = mysqli_query($connection,$sql);

    // Contadores para controlar la cantidad de noticias mostradas
    $bigCategoryCount = 0;
    $smallCategoryCount = 0;

    while ($fila = $resultado->fetch_assoc()) {
        $enlace = "noticias/noticia.php?id=" . $fila["id"];
        $titulo = recortarTexto($fila["titulo"], $smallCategoryCount < 2 ? 70 : 80);
        $imagen = "php/files/" . $fila["img1"];

        // Verifica si debes mostrar una bigCategory o smallCategory
        if ($bigCategoryCount < 2) {
            // Muestra bigCategory
    ?>
            <div class="col-12 col-lg-6">
                <a href="<?php echo $enlace; ?>">
                    <div class="bigCategory mb-4" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('<?php echo $imagen; ?>');">
                        <div class="category-img-word">
                            <p class="text-white ps-2"><?php echo $titulo; ?></p>
                        </div>
                    </div>
                </a>
            </div>
    <?php
            $bigCategoryCount++;
        } elseif ($smallCategoryCount < 3) {
            // Muestra smallCategory
    ?>
            <div class="col-12 col-lg-4">
                <a href="<?php echo $enlace; ?>">
                    <div class="smallCategory" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('<?php echo $imagen; ?>');">
                        <div class="category-img-word2">
                            <p class="text-white ps-2"><?php echo $titulo; ?></p>
                        </div>
                    </div>
                </a>
            </div>
    <?php
            $smallCategoryCount++;
        }

        // Si se han mostrado 2 bigCategory y 3 smallCategory, sal del bucle
        if ($bigCategoryCount >= 2 && $smallCategoryCount >= 3) {
            break;
        }
    }
    


    ?>
</div>


    <div class="row mt-5 mb-5" style="width: 100%; height: 2px; background-color: #000;"></div>
    <div class="row mt-5"><h1>ACTUALIDAD</h1></div>
    <div class="row mt-5 mb-5" style="width: 100%; height: 3px; background-color: #000;"></div>


    <div class="row">
    <?php


    // Realiza la consulta SQL para obtener las noticias de la categoría "Reconquista" ordenadas por fecha
    $sql = "SELECT * FROM news WHERE category = 'Actualidad' ORDER BY fecha DESC";
    $resultado = mysqli_query($connection,$sql);

    // Contadores para controlar la cantidad de noticias mostradas
    $bigCategoryCount = 0;
    $smallCategoryCount = 0;

    while ($fila = $resultado->fetch_assoc()) {
        $enlace = "noticias/noticia.php?id=" . $fila["id"];
        $titulo = recortarTexto($fila["titulo"], $smallCategoryCount < 2 ? 70 : 80);
        $imagen = "php/files/" . $fila["img1"];

        // Verifica si debes mostrar una bigCategory o smallCategory
        if ($bigCategoryCount < 2) {
            // Muestra bigCategory
    ?>
            <div class="col-12 col-lg-6">
                <a href="<?php echo $enlace; ?>">
                    <div class="bigCategory mb-4" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('<?php echo $imagen; ?>');">
                        <div class="category-img-word">
                            <p class="text-white ps-2"><?php echo $titulo; ?></p>
                        </div>
                    </div>
                </a>
            </div>
    <?php
            $bigCategoryCount++;
        } elseif ($smallCategoryCount < 3) {
            // Muestra smallCategory
    ?>
            <div class="col-12 col-lg-4">
                <a href="<?php echo $enlace; ?>">
                    <div class="smallCategory" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('<?php echo $imagen; ?>');">
                        <div class="category-img-word2">
                            <p class="text-white ps-2"><?php echo $titulo; ?></p>
                        </div>
                    </div>
                </a>
            </div>
    <?php
            $smallCategoryCount++;
        }

        // Si se han mostrado 2 bigCategory y 3 smallCategory, sal del bucle
        if ($bigCategoryCount >= 2 && $smallCategoryCount >= 3) {
            break;
        }
    }
    


    ?>
</div>







    <div class="row mt-5 mb-5" style="width: 100%; height: 2px; background-color: #000;"></div>
    <div class="row mt-5"><h1>PROVINCIALES</h1></div>
    <div class="row mt-5 mb-5" style="width: 100%; height: 3px; background-color: #000;"></div>


    <div class="row">
    <?php


    // Realiza la consulta SQL para obtener las noticias de la categoría "Reconquista" ordenadas por fecha
    $sql = "SELECT * FROM news WHERE category = 'Provinciales' ORDER BY fecha DESC";
    $resultado = mysqli_query($connection,$sql);

    // Contadores para controlar la cantidad de noticias mostradas
    $bigCategoryCount = 0;
    $smallCategoryCount = 0;

    while ($fila = $resultado->fetch_assoc()) {
        $enlace = "noticias/noticia.php?id=" . $fila["id"];
        $titulo = recortarTexto($fila["titulo"], $smallCategoryCount < 2 ? 70 : 80);
        $imagen = "php/files/" . $fila["img1"];

        // Verifica si debes mostrar una bigCategory o smallCategory
        if ($bigCategoryCount < 2) {
            // Muestra bigCategory
    ?>
            <div class="col-12 col-lg-6">
                <a href="<?php echo $enlace; ?>">
                    <div class="bigCategory mb-4" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('<?php echo $imagen; ?>');">
                        <div class="category-img-word">
                            <p class="text-white ps-2"><?php echo $titulo; ?></p>
                        </div>
                    </div>
                </a>
            </div>
    <?php
            $bigCategoryCount++;
        } elseif ($smallCategoryCount < 3) {
            // Muestra smallCategory
    ?>
            <div class="col-12 col-lg-4">
                <a href="<?php echo $enlace; ?>">
                    <div class="smallCategory" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('<?php echo $imagen; ?>');">
                        <div class="category-img-word2">
                            <p class="text-white ps-2"><?php echo $titulo; ?></p>
                        </div>
                    </div>
                </a>
            </div>
    <?php
            $smallCategoryCount++;
        }

        // Si se han mostrado 2 bigCategory y 3 smallCategory, sal del bucle
        if ($bigCategoryCount >= 2 && $smallCategoryCount >= 3) {
            break;
        }
    }
    


    ?>
</div>
    

    <div class="row mt-5 mb-5" style="width: 100%; height: 2px; background-color: #000;"></div>
    <div class="row mt-5"><h1>POLICIALES</h1></div>
    <div class="row mt-5 mb-5" style="width: 100%; height: 3px; background-color: #000;"></div>


    <div class="row">
    <?php


    // Realiza la consulta SQL para obtener las noticias de la categoría "Reconquista" ordenadas por fecha
    $sql = "SELECT * FROM news WHERE category = 'Policiales' ORDER BY fecha DESC";
    $resultado = mysqli_query($connection,$sql);

    // Contadores para controlar la cantidad de noticias mostradas
    $bigCategoryCount = 0;
    $smallCategoryCount = 0;

    while ($fila = $resultado->fetch_assoc()) {
        $enlace = "noticias/noticia.php?id=" . $fila["id"];
        $titulo = recortarTexto($fila["titulo"], $smallCategoryCount < 2 ? 70 : 80);
        $imagen = "php/files/" . $fila["img1"];

        // Verifica si debes mostrar una bigCategory o smallCategory
        if ($bigCategoryCount < 2) {
            // Muestra bigCategory
    ?>
            <div class="col-12 col-lg-6">
                <a href="<?php echo $enlace; ?>">
                    <div class="bigCategory mb-4" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('<?php echo $imagen; ?>');">
                        <div class="category-img-word">
                            <p class="text-white ps-2"><?php echo $titulo; ?></p>
                        </div>
                    </div>
                </a>
            </div>
    <?php
            $bigCategoryCount++;
        } elseif ($smallCategoryCount < 3) {
            // Muestra smallCategory
    ?>
            <div class="col-12 col-lg-4">
                <a href="<?php echo $enlace; ?>">
                    <div class="smallCategory" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('<?php echo $imagen; ?>');">
                        <div class="category-img-word2">
                            <p class="text-white ps-2"><?php echo $titulo; ?></p>
                        </div>
                    </div>
                </a>
            </div>
    <?php
            $smallCategoryCount++;
        }

        // Si se han mostrado 2 bigCategory y 3 smallCategory, sal del bucle
        if ($bigCategoryCount >= 2 && $smallCategoryCount >= 3) {
            break;
        }
    }
    


    ?>
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

  


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://kit.fontawesome.com/42b5b848d1.js" crossorigin="anonymous"></script>
  <script src="forbbiden/js/getYear.js"></script>
</body>
</html>

<script>
  $(".hide").on('click', function() {
    $("nav ul").toggle('slow');
  })
</script>

