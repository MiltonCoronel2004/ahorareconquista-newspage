<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link rel="icon" type="image/png" href="../forbbiden/img/logo.png">
  <link rel="stylesheet" href="css/controlpanel.css">
  

  <title>Editar Noticia</title>
</head>
<body>

  <?php
  
  include("../forbbiden/database/database.php");

  $consulta = "SELECT * FROM news";
  $resultado = mysqli_query($connection,$consulta);

  function recortarTexto($texto, $longitudMaxima) {
    if (strlen($texto) > $longitudMaxima) {
      $texto = substr($texto, 0, $longitudMaxima); // Recortar el texto a la longitud máxima
      $texto = substr($texto, 0, strrpos($texto, ' ')) . '...'; // Asegurarse de no cortar en medio de una palabra
    }
    return $texto;
  }

  ?>
<div class="containe-fluid">
    <div class="row mt-4 back-button-div">
      <div class="col-6 ms-5 mt-2"><a href="#" class="btn" onclick="goBack()">Volver</a></div>
    </div>
</div>
  <div class="container px-5">

    <div class="row mt-5">
      <h1 class="text-center">Elegir Noticia a Eliminar</h1>
    </div>

    <div class="row text-md-center mt-5">
      <form action="../php/delNew.php" method="post">
        <select name="noticia_id" id="noticia" class="w-100 mb-5">
        <?php 
          while($noticia = mysqli_fetch_assoc($resultado)) {
            ?> 
              <option value="<?php echo $noticia['id']; ?>"><?php echo recortarTexto($noticia['titulo'], 50); ?><?php echo $noticia['id']; ?></option>
            <?php
          }
        ?>
        </select>
<!--         <input type="submit" name="editar" id="editar" value="Editar"> -->
        <input type="submit" name="eliminar" id="eliminar" value="Eliminar">
      </form>

    </div>


  </div>

  <script>
  function goBack() {
    window.history.back();
  }
  </script>

</body>
</html>