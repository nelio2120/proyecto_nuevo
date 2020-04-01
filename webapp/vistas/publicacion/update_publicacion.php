<?php include("../profesor/profesor_index.php"); require '../BDD.php';
?>

<?php
include("../../db/db.php");
$titulo = '';
$descripcion= '';

if  (isset($_GET['id'])) {
  $id_publicacion = $_GET['id'];
  $query = "SELECT * FROM publicacion WHERE idpublicacion=$id_publicacion";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
  }
}

if (isset($_POST['update'])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $general = $_POST['usuario'];
    $usuario = $_POST['curso'];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $creacion =$_POST['fecha_c'];
    $eliminar = $_POST['fecha_l'];
    $array = array("titulo"=>$titulo,"descripcion"=>$descripcion
    ,"creado_en"=>$creacion,"termina_en"=>$eliminar,"id_curso"=>$usuario,"idusuario"=>$general,"imagen"=>$imagen);
    if(BDD::ACTUALIZAR_DESDE_ARRAY("publicacion",$array,"idpublicacion=$id_publicacion")){
        print "<script>alert('se guardo el registro')</script>";
        $_SESSION['message'] = 'Publicacion se guardo con exito';
        $_SESSION['message_type'] = 'exito';
        header('Location: publicacion_index.php');
    }else{
        print "<script>alert('no se guardo el registro')</script>";
        header('Location: publicacion_index.php');
    }


}
$arry = BDD::QUERY("SELECT idcurso as id,concat(nivel,' ',paralelo) as nombres FROM curso");
$array = BDD::QUERY("SELECT idusuario as id,usuario as nombres FROM usuario");
$html = "";
if(!empty($arry))
{
    foreach ($arry as $key=>$value) {
        if($value['id']==$row['id_curso']) $selected = "selected";
        $html .= "<option $selected value=\"" . $value['id'] . "\" > " . $value['nombres'] . " </option>";
        $selected = "";
    }
}else{
    $html .= "<option value=\"null\" selected >No existen registros</option>";
}
$html1 = "";
if(!empty($array))
{
    foreach ($array as $key=>$value) {
        if($value['id']==$row['idusuario']) $selected = "selected";
        $html1 .= "<option value=\"" . $value['id'] . "\" > " . $value['nombres'] . " </option>";
        $selected = "";
    }
}else{
    $html1 .= "<option value=\"null\" selected >No existen registros</option>";
}

?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="update_publicacion.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data" method="POST">
          <div class="form-group">
              <select type="text" class="form-control" id="select" name="usuario" required>
                  <?php
                  print $html1;
                  ?>
              </select>
          </div>

          <div class="form-group">
              <select type="text" class="form-control" id="select" name="curso" required>
                  <?php
                  print $html;
                  ?>
              </select>
          </div>

          <div class="form-group">
              <input type="text" name="titulo" class="form-control" value="<?php echo $row['titulo']; ?>" placeholder="Escribe el titulo" autofocus>
          </div>
          <div class="form-group">
              <textarea name="descripcion" rows="2" class="form-control" value="<?php echo $row['descripcion']; ?>" placeholder="Escribe la descripcion"></textarea>
          </div>
          <div class="form-group">
              <input type="date" name="fecha_c" class="form-control" value="<?php echo $row['creado_en']; ?>" placeholder="fecha de creacion" >
          </div>
          <div class="form-group">
              <input type="date" name="fecha_l" class="form-control" value="<?php echo $row['termina_en']; ?>" placeholder="Escribe a que curso va dirigido" >
          </div>
          <div class="form-group">
              <input type="file" name="imagen" id="imagen" class="form-control" placeholder="imagen" accept="image/png, .jpeg, .jpg ">
          </div>        <button class="btn-success" name="update">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>

