<?php

include('../../db/db.php');

if (isset($_POST['guardar_public'])) {
 $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $general = $_POST['general'];
  $usuario = $_POST['usuario'];
  $query = "INSERT INTO publicacion(titulo, descripcion, general,usuario) VALUES ('$titulo', '$descripcion','$general','$usuario')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Publicacion se guardo con exito';
  $_SESSION['message_type'] = 'exito';
  header('Location: publicacion_index.php');

}

?>