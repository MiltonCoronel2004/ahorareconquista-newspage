<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link rel="icon" type="image/png" href="../forbbiden/img/logo.png">
  <link rel="stylesheet" href="../forbbiden/css/styles.css?v=1">
  <link rel="stylesheet" href="../forbbide/css/controlpanel.css?v=1">
  <style>
    textarea {
      height: 200px !important;
    }
  </style>

  <title>Panel de Control</title>
</head>
<body>


  <div class="container-fluid px-4 px-md-5">
    <div class="row mt-4 back-button-div">
      <div class="col-6"><a href="https://ahorareconquista.com.ar" class="btn">Volver</a></div>
      <div class="col-6 text-end"><a href="delPanel.php" class="btn">Eliminar</a></div>
    </div>
    <div class="row text-center mt-4">
      <h1>Control Panel</h1>
    </div>

    <form action="../php/upload_new.php" method="POST" enctype="multipart/form-data">
      <div class="row mb-4">
          <div class="col-12 col-md-4 text-center">
            <label for="title">Titulo</label>
            <input type="text" name="title" required class="d-block w-100">
          </div>
          <div class="col-12 col-md-4 text-center">
            <label for="Category">Categoria</label>
            <select name="category" id="category" class="d-block w-100 h-50">
              <option value="undefined">Seleccione una opción</option>
              <option value="Reconquista">Reconquista</option>
              <option value="Avellaneda">Avellaneda</option>
              <option value="Provinciales">Provinciales</option>
              <option value="Actualidad">Actualidad</option>
              <option value="Policiales">Policiales</option>
              <option value="Deportes">Deportes</option>
            </select>
          </div>
          <div class="col-12 col-md-4 text-center">
            <label for="place">Pagina Principal</label>
            <select name="place" id="place" class="d-block w-100 h-50">
              <option value="undefined">Seleccione una opción</option>
              <option value="0">Ninguna</option>
              <option value="51">Marquee 1</option>
              <option value="52">Marquee 2</option>
              <option value="53">Marquee 3</option>
              <option value="54">Marquee 4</option>
              <option value="1">Primera posicón</option>
              <option value="2">Segunda posicion</option>
              <option value="3">Tercera posicion</option>
              <option value="4">Cuarta posicion</option>
              <option value="5">Quinta posicion</option>
              <option value="6">Pequeño primera posicion</option>
              <option value="7">Pequeño segunda posicion</option>
              <option value="8">Pequeño tercera posicion</option>
              <option value="9">Pequeño cuarta posicion</option>
              <option value="10">Slide1</option>
              <option value="11">Slide2</option>
              <option value="12">Slide3</option>
              <option value="13">Gigantografia 1</option>
              <option value="14">Gigantografia 2</option>
              <option value="15">Gigantografia 3</option>
              <option value="55">Video 1</option>
              <option value="56">Video 2</option>
              <option value="57">Video 3</option>
              <option value="16">Reconquista 1</option>
              <option value="17">Reconquista 2</option>
              <option value="18">Reconquista 3</option>
              <option value="19">Reconquista 4</option>
              <option value="20">Reconquista 5</option>
              <option value="21">Avellaneda 1</option>
              <option value="22">Avellaneda 2</option>
              <option value="23">Avellaneda 3</option>
              <option value="24">Avellaneda 4</option>
              <option value="25">Avellaneda 5</option>
              <option value="26">Actualidad 1</option>
              <option value="27">Actualidad 2</option>
              <option value="28">Actualidad 3</option>
              <option value="29">Actualidad 4</option>
              <option value="30">Actualidad 5</option>
              <option value="31">Provinciales 1</option>
              <option value="32">Provinciales 2</option>
              <option value="33">Provinciales 3</option>
              <option value="34">Provinciales 4</option>
              <option value="35">Provinciales 5</option>
              <option value="36">Policiales 1</option>
              <option value="37">Policiales 2</option>
              <option value="38">Policiales 3</option>
              <option value="39">Policiales 4</option>
              <option value="40">Policiales 5</option>
              <!-- 51, 52, 53 y 54 estan arriba. -->
              <!-- 55, 56 y 57 estan despues de gigantografia. -->
   

            </select>
          </div>
      </div>

      <div class="row mb-4">
      <div class="col-12 col-md-3 text-center">
          <label for="img1">Imagen 1</label>
          <input type="file" name="img1" class="d-block w-100">
        </div>

        <div class="col-12 col-md-3 text-center">
          <label for="txt1">Texto 1</label>
          <textarea name="txt1" class="form-control" required></textarea>
        </div>


        <div class="col-12 col-md-3 text-center">
          <label for="img3">Imagen 3</label>
          <input type="file" name="img3" class="d-block w-100">
        </div>

        <div class="col-12 col-md-3 text-center">
          <label for="txt3">Texto 3</label>
          <textarea name="txt3" class="form-control"></textarea>
        </div>

      </div>

      <div class="row mb-4">
        <div class="col-12 col-md-3 text-center">
          <label for="img2">Imagen 2</label>
          <input type="file" name="img2" class="d-block w-100">
        </div>

        <div class="col-12 col-md-3 text-center">
          <label for="txt2">Texto 2</label>
          <textarea name="txt2" class="form-control"></textarea>
        </div>

        <div class="col-12 col-md-3 text-center">
          <label for="img4">Imagen 4</label>
          <input type="file" name="img4" class="d-block w-100">
        </div>

        <div class="col-12 col-md-3 text-center">
          <label for="txt4">Texto 4</label>
          <textarea name="txt4" class="form-control"></textarea>
        </div>   

      </div>


      <div class="row">      
        <div class="col-12 text-center">
          <button type="submit" name="upload" class="btn btn-primary mb-5">Subir Noticia</button>
        </div>
      </div>
  </form>


  </div>
  
</body>
</html>
