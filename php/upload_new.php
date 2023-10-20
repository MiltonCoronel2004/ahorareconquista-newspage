<?php

include("../forbbiden/database/database.php");

$title = $_POST["title"];
$category = $_POST["category"];
$place = $_POST["place"];
$txt1 = nl2br($_POST["txt1"]);
$txt2 = nl2br($_POST["txt2"]);
$txt3 = nl2br($_POST["txt3"]);
$txt4 = nl2br($_POST["txt4"]);
$img1 = str_replace(' ', '_', $_FILES['img1']['name']);
$img2 = str_replace(' ', '_', $_FILES['img2']['name']);
$img3 = str_replace(' ', '_', $_FILES['img3']['name']);
$img4 = str_replace(' ', '_', $_FILES['img4']['name']);
$upload = $_POST["upload"];

if (isset($upload)) {
    if ($category != "undefined") {
        if ($place != "undefined") {

            
    $imagenes = array($img1, $img2, $img3, $img4);

    for ($i = 0; $i < count($imagenes); $i++) {
        // ... (código existente)
        $imagen = $imagenes[$i];

        // ... (código existente)
        $consultaExistenciaImagen = "SELECT * FROM news WHERE img" . ($i + 1) . " = '$imagen'";
        $resultadoExistenciaImagen = mysqli_query($connection, $consultaExistenciaImagen);

        if ($resultadoExistenciaImagen !== false && mysqli_num_rows($resultadoExistenciaImagen) > 0) {
            // ... (código existente)

            // ... (código existente)
            $actualizarConsulta = "UPDATE news SET img" . ($i + 1) . " = '$nuevo_nombre' WHERE img" . ($i + 1) . " = '$imagenes[$i]'";
            mysqli_query($connection, $actualizarConsulta);

            // ... (código existente)
        } else {
            // ... (código existente)
        }
    }
            // Obtener la fecha y hora actual en formato para MySQL
            $fecha_actual = date('Y-m-d H:i:s');

            $consultaPlaceExistence = "SELECT * FROM news WHERE place = $place";
            $resultadoPlaceExistence = mysqli_query($connection, $consultaPlaceExistence);

            if (mysqli_num_rows($resultadoPlaceExistence) > 0) {
                // If the place value already exists, set the place to 0 in the existing record(s)
                $updatePlaceZero = "UPDATE news SET place = 0 WHERE place = $place";
                mysqli_query($connection, $updatePlaceZero);
            }
            $consulta = "INSERT INTO news (titulo, category, place, texto1, texto2, texto3, texto4, img1, img2, img3, img4, fecha) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($connection, $consulta);
            mysqli_stmt_bind_param($stmt, "ssssssssssss", $title, $category, $place, $txt1, $txt2, $txt3, $txt4, $img1, $img2, $img3, $img4, $fecha_actual);            
        

            move_uploaded_file($_FILES['img1']['tmp_name'], 'files/' . $img1);
            move_uploaded_file($_FILES['img2']['tmp_name'], 'files/' . $img2);
            move_uploaded_file($_FILES['img3']['tmp_name'], 'files/' . $img3);
            move_uploaded_file($_FILES['img4']['tmp_name'], 'files/' . $img4);

            if (mysqli_stmt_execute($stmt)) {
                header("Location:../admin/controlpanel.php");
            } else {
                echo "Error: " . mysqli_stmt_error($stmt);
            }
        }
        else {
            header("Location:../admin/controlpanel.php");
          }
    }
    else {
        header("Location:../admin/controlpanel.php");
      }
}
else {
    header("Location:../admin/controlpanel.php");
  }


?>