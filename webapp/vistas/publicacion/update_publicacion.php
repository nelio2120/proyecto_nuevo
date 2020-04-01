<?php include("../profesor/profesor_index.php"); ?>

<?php
include("../../db/db.php");
$titulo = '';
$descripcion= '';

if  (isset($_GET['id_publicacion'])) {
  $id_publicacion = $_GET['id_publicacion'];
  $query = "SELECT * FROM publicacion WHERE id_publicacion=$id_publicacion";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $titulo = $row['titulo'];
    $descripcion = $row['descripcion'];
    $general = $row['general'];
    $usuario = $row['usuario'];
  }
}

if (isset($_POST['update'])) {
  $id_publicacion = $_GET['id_publicacion'];
  $titulo= $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $general = $_POST['general'];
  $usuario = $_POST['usuario'];
  
  $query = "UPDATE publicacion set titulo = '$titulo', descripcion = '$descripcion', general = '$general',usuario = '$usuario' WHERE id_publicacion=$id_publicacion";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'La actualizacion fue exitosa';
  $_SESSION['message_type'] = 'Aviso';
  header('Location: publicacion_index.php');
}

?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="update_publicacion.php?id=<?php echo $_GET['id_publicacion']; ?>" method="POST">
           <div class="form-group">
         <label for="nombre">Nombre usuario:</label>
				<input type="text" name="usuario" id="nombre" placeholder="Nombre completo" value="<?php echo ucfirst($_SESSION['nombre']); ?> ">
		</div>		
    
        
        <div class="form-group">
          <input name="general" type="text" class="form-control" value="<?php echo $general; ?>" placeholder="Para quien va dirigido">
        </div>
        
        <div class="form-group">
          <input name="titulo" type="text" class="form-control" value="<?php echo $titulo; ?>" placeholder="Actualizar titulo">
        </div>
        <div class="form-group">
        <textarea name="descripcion" class="form-control" cols="30" rows="10"><?php echo $descripcion;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>

