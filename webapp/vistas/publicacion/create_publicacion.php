<?php

require '../BDD.php';
if (isset($_POST['guardar_public'])) {
    $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $general = $_POST['usuario'];
  $usuario = $_POST['curso'];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $creacion =$_POST['fecha_c'];
    $eliminar = $_POST['fecha_l'];
    $array = array("titulo"=>$titulo,"descripcion"=>$descripcion
    ,"creado_en"=>$creacion,"termina_en"=>$eliminar,"id_curso"=>$usuario,"idusuario"=>$general,"imagen"=>$imagen);
    if(BDD::INSERTAR_DESDE_ARRAY("publicacion",$array)){
        print "<script>alert('se guardo el registro')</script>";
        $_SESSION['message'] = 'Publicacion se guardo con exito';
        $_SESSION['message_type'] = 'exito';
      header('Location: publicacion_index.php');
    }else{
        print "<script>alert('no se guardo el registro')</script>";
        header('Location: publicacion_index.php');
    }


}

?>