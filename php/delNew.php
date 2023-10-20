<?php 

include("../forbbiden/database/database.php");

$noticia_id = $_POST["noticia_id"];


$consulta = "DELETE FROM news WHERE id = '$noticia_id'";
$resultado = mysqli_query($connection,$consulta);

if($resultado) {
  header("Location:../delPanel.php");
}
else {
  header("Location:../delPanel.php");
}


?>

