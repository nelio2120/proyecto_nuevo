<?php

include("../../db/db.php");

if(isset($_GET['id_publicacion'])) {
  $id_publicacion = $_GET['id_publicacion'];
  $query = "DELETE FROM publicacion WHERE id_publicacion = $id_publicacion";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Se elimino el registro';
  $_SESSION['message_type'] = 'danger';
  header('Location: publicacion_index.php');
}

?>