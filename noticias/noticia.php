<?php 

include("../forbbiden/database/database.php");
// Supongamos que tienes un array de ubicaciones con sus respectivos IDs.
$ubicaciones = array();
for ($i = 1; $i <= 100; $i++) {
    $ubicaciones[] = $i;
}


$titulos_noticias = array();
$link_noticias = array();

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

function recortarTexto($texto, $longitudMaxima) {
  if (strlen($texto) > $longitudMaxima) {
    $texto = substr($texto, 0, $longitudMaxima); // Recortar el texto a la longitud máxima
    $texto = substr($texto, 0, strrpos($texto, ' ')) . '...'; // Asegurarse de no cortar en medio de una palabra
  }
  return $texto;
}


?>


<?php
// Obtener el ID de la noticia desde la URL
if (isset($_GET['id'])) {
  $noticia_id = $_GET['id'];

  // Consultar la base de datos para obtener los detalles de la noticia
  // Utiliza el ID para filtrar la consulta y obtener solo la noticia específica
  $consulta = "SELECT * FROM news WHERE id = $noticia_id";
  $resultado = mysqli_query($connection, $consulta);
  $noticia = mysqli_fetch_assoc($resultado);

  // Verificar si se encontró la noticia con el ID dado
  if ($noticia) {
    // Mostrar el contenido completo de la noticia en la plantilla
    // Puedes acceder a los campos de la noticia con $noticia['campo']
    // Por ejemplo, $noticia['titulo'], $noticia['contenido'], etc.
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link rel="icon" type="image/png" href="../forbbiden/img/logo.png">
  <link rel="stylesheet" href="../forbbiden/css/styles.css?v=1.1">
  <link rel="stylesheet" href="../forbbiden/css/ads.css?v=1.1">
  <link rel="stylesheet" href="../forbbiden/css/navbar.css?v=1.1">
  <link rel="stylesheet" href="../forbbiden/noticia.css?v=1.1">

  <title><?php echo $noticia['titulo']  ?></title>
  <meta property="og:title" content="Ahora en Reconquista - <?php echo $noticia['titulo'] ?>">
  <meta property="og:description" content="Sitio Web de Noticias en Reconquista - Santa Fe">
  <meta property="og:image" content="../php/files/<?php echo $noticia['img1'] ?>">
  <meta property="og:url" content="https://ahorareconquista.com.ar/noticias/noticia.php?id=<?php echo $noticia['id'] ?>">
  <meta property="og:type" content="website"> <!-- Puedes usar "website", "article", "product", etc. según el contenido -->
</head>
<body>
  
<div class="container-fluid text-center text-md-start" style="background-color: #182b33;">
    <div class="row text-center text-md-start"> 
    <div class="col-12 py-4 text-center text-md-start"><a href="https://ahorareconquista.com.ar"><img src="../forbbiden/img/ahorareconquistalogo.png" alt="Logo" width="280px"></a></div>
    </div>  
  </div>


  <div class="container-fluid mt-3 w-100">
    <nav>
      <ul class="ul w-100">
        <li><a href="https://ahorareconquista.com.ar">Inicio</a></li>
        <li><a href="../reconquista">Reconquista</a></li>
        <li><a href="../avellaneda">Avellaneda</a></li>
        <li><a href="../provinciales">Provinciales</a></li>
        <li><a href="../actualidad">Actualidad</a></li>
        <li><a href="../policiales">Policiales</a></li>
        <li><a href="../deportes">Deportes</a></li>
      </ul>
      <div class="hide">
        <i class="fa-solid fa-bars" style="color: #000 !important;" aria-hidden="true"></i>
      </div>
    </nav>
  </div>

  <div class="container mb-5">

  <div class="row mb-4 pt-2 px-5 d-flex g-1 marquee-container">
    <div class="col-12 text-center col-lg-2 text-lg-start py-2">
      <span id="ultimas-noticias">Últimas Noticias</span>
    </div>
    <div class="col-12 col-lg-10 py-2">
      <marquee behavior="alternate" direction="left"><a href="noticia.php?id=<?php echo $link_noticias[51]; ?>"><?php echo $titulos_noticias[51]; ?></a> - <a href="noticia.php?id=<?php echo $link_noticias[52]; ?>"><?php echo $titulos_noticias[52]; ?></a> - <a href="noticia.php?id=<?php echo $link_noticias[53]; ?>"><?php echo $titulos_noticias[53]; ?></a> - <a href="noticia.php?id=<?php echo $link_noticias[54]; ?>"><?php echo $titulos_noticias[54]; ?></a> </marquee>
    </div>
  </div>

  <div class="row mt-4">
      <div class="col-12 col-md-1 share">
        <ul class="list-unstyled text-center">
          <li><a href="https://api.whatsapp.com/send?text=https://ahorareconquista.com.ar/noticias/noticia.php?id=<?php echo $noticia['id']; ?>" target="_blank"><img src="../forbbiden/img/whatsapp.png" width="60px" alt=""></a></li>
          <li><a href="https://facebook.com/sharer.php?u=https://ahorareconquista.com.ar/noticias/noticia.php?id=<?php echo $noticia['id']; ?>"><img src="../forbbiden/img/facebook.png" width="60px" alt=""></a></li>
          <li><a href="https://twitter.com/intent/tweet?url=https://ahorareconquista.com.ar/noticias/noticia.php?id=123&text=¡Echa un vistazo a esta noticia interesante en Ahora Reconquista!
          "><img src="../forbbiden/img/twitterr.png" width="60px" alt=""></a></li>
        </ul>
      </div>
      <div class="col-12 col-md-7 content">
        <div class="row title-container">
          <h1 class="titulo" style="word-wrap: break-word;"><?php echo $noticia['titulo'] ?></h1>
        </div>
        <div class="row">
          <img src="../php/files/<?php echo $noticia['img1']; ?>" alt="">
        </div>
        <div class="row">
          <p class="content"><?php echo $noticia['texto1'] ?></p>
        </div>

        <?php
        // Check if img2 exists and not empty
        if (!empty($noticia['img2'])) {
          ?>
          <div class="row">
            <div class="imgs img2 mb-4 mt-4" style="background-image: url(../php/files/<?php echo $noticia['img2']; ?>);"></div>
          </div>

          <?php
        }
        else {
          ?> <br>   <?php
        }
        
        ?>
          <div class="row">
            <p class="content"><?php echo $noticia['texto2'] ?></p>
          </div>
        <?php

        // Check if img3 exists and not empty
        if (!empty($noticia['img3'])) {
          ?>
          <div class="row">
            <div class="imgs img3 mb-4 mt-4" style="background-image: url(../php/files/<?php echo $noticia['img3']; ?>);"></div>
          </div>
          <?php
        }
        else {
          ?> <br>   <?php
        }

        ?>
        <div class="row">
          <p class="content"><?php echo $noticia['texto3'] ?></p>
        </div>
        <?php

        // Check if img4 exists and not empty
        if (!empty($noticia['img4'])) {
          ?>
          <div class="row">
            <div class="imgs img4 mb-4 mt-4" style="background-image: url(../php/files/<?php echo $noticia['img4']; ?>);"></div>
          </div>
          <?php
        }
        else {
          ?> <br>   <?php
        }

        ?>
        <div class="row">
          <p class="content"><?php echo $noticia['texto4'] ?></p>
        </div>
        <?php
        ?>
      </div>

        <div class="col-12 col-md-4 px-5">
          <h3 class="text-center mt-4 mb-4 lastNews">Ultimas Noticias <i class="fa-regular fa-newspaper fa-fade fa-xl"></i></h3>
          <?php 
          $consulta = "SELECT * FROM news ORDER BY fecha DESC LIMIT 4";
          $result = mysqli_query($connection, $consulta);

          if (mysqli_num_rows($result) == 0) {
            echo "No data";
          } else {
            while ($fila = mysqli_fetch_assoc($result)) {
          ?>
              <div class="row mb-5" style="word-wrap: break-word;">
              <a href="noticia.php?id=<?php echo $fila['id']; ?>" class="side-img" style="background-image: url('../php/files/<?php echo $fila["img1"]; ?>');"></a>
 
              <article>
                <p class="ps-1 pt-1"><a class="side-title" style="font-size: 80%;" href="noticia.php?id=<?php echo $fila['id']; ?>"><?php echo recortarTexto($fila["titulo"], 80); ?></a></p>
              </article>
              </div>
          <?php 
            }
          }
          ?>
        </div>

    </div>

  </div>

  <div class="container-fluid">
    <div class="row share2">
      <div class="col-12">
      <ul class="list-unstyled text-center">
          <li><a href="https://api.whatsapp.com/send?text=https://ahorareconquista.com.ar/noticias/noticia.php?id=<?php echo $noticia['id']; ?>" target="_blank"><img src="../forbbiden/img/whatsapp.png" width="60px" alt=""></a></li>
          <li><a href="https://facebook.com/sharer.php?u=https://ahorareconquista.com.ar/noticias/noticia.php?id=<?php echo $noticia['id']; ?>"><img src="../forbbiden/img/facebook.png" width="60px" alt=""></a></li>
          <li><a href="https://twitter.com/intent/tweet?url=https://ahorareconquista.com.ar/noticias/noticia.php?id=123&text=¡Echa un vistazo a esta noticia interesante en Ahora Reconquista!
          "><img src="../forbbiden/img/twitterr.png" width="60px" alt=""></a></li>
        </ul>
      </div>
    </div>
  </div>


  <div class="container-fluid px-5 pt-4 mt-5" style="background-color: #ffffff; box-shadow:#000; padding: 0 60px !important; padding-top: 25px !important;">
    <footer class="">
     <!--  <div class="row">
        <div class="col-6 col-md-2 mb-3 text-center text-md-start">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">Home</a></li>
            <li class="nav-item mb-2"><a href="noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">Features</a></li>
            <li class="nav-item mb-2"><a href="noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">Pricing</a></li>
            <li class="nav-item mb-2"><a href="noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">FAQs</a></li>
            <li class="nav-item mb-2"><a href="noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">About</a></li>
          </ul>
        </div>
  
        <div class="col-6 col-md-2 mb-3 text-center text-md-start">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">Home</a></li>
            <li class="nav-item mb-2"><a href="noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">Features</a></li>
            <li class="nav-item mb-2"><a href="noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">Pricing</a></li>
            <li class="nav-item mb-2"><a href="noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">FAQs</a></li>
            <li class="nav-item mb-2"><a href="noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">About</a></li>
          </ul>
        </div>
  
        <div class="col-12 col-md-2 mb-4 text-center text-md-start">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">Home</a></li>
            <li class="nav-item mb-2"><a href="noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">Features</a></li>
            <li class="nav-item mb-2"><a href="noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">Pricing</a></li>
            <li class="nav-item mb-2"><a href="noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">FAQs</a></li>
            <li class="nav-item mb-2"><a href="noticia.php?id=<?php echo $link_noticias[10]; ?>" class="nav-link p-0 text-body-secondary">About</a></li>
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
  <script src="../forbbiden/js/getYear.js"></script>
</body>
</html>

<?php
  } 
  else {
    // Si la noticia no se encontró con el ID dado, puedes mostrar un mensaje de error o redireccionar a una página de error.
    echo "Error 404. Page Not found.";
  }
} else {
  // Si no se proporcionó un ID de noticia válido, puedes mostrar un mensaje de error o redireccionar a una página de error.
  echo "ID de noticia no válido.";
}
?>
<script>
  $(".hide").on('click', function() {
    $("nav ul").toggle('slow');
  })
</script>

