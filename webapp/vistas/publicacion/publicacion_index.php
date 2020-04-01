<?php include("../../db/db.php"); ?>
<?php include("../login/model/conexion.php"); ?>
<?php include("../profesor/profesor_index.php"); // me dirijo a al index de DOCENTE plantilla de inicio
?> 


<style>
 .centrado{
		    margin:10px auto;
		    display:block;
    }
</style>
        	    
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width, initial-scale=-1">
        <link rel="stylesheet" href="../css/flexslider.css" type="text/css">
             <link rel="stylesheet" href="../../css/menu_vertical.css" type="text/css"> 
     
</head>

		<a href="../../reportes/reporte_publicaciones.php" target="_blank">
            <img src="../../Img/pdf_icono.png" alt="logo_pr" class= "centrado"width="40px" height="40px" > </a>
                 <p  align="center">REPORTE DE TUS PUBLICAIONES</p>	
<br>
<br>

<main class="container p-4">
  <div class="row">
   <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); }
      require '../BDD.php';
      $arry = BDD::QUERY("SELECT idcurso as id,concat(nivel,' ',paralelo) as nombres FROM curso");
      $array = BDD::QUERY("SELECT idusuario as id,usuario as nombres FROM usuario");
      $html = "";
      if(!empty($arry))
      {
          foreach ($arry as $key=>$value) {
              $html .= "<option value=\"" . $value['id'] . "\" > " . $value['nombres'] . " </option>";
          }
      }else{
          $html .= "<option value=\"null\" selected >No existen registros</option>";
      }
      $html1 = "";
      if(!empty($array))
      {
          foreach ($array as $key=>$value) {
              $html1 .= "<option value=\"" . $value['id'] . "\" > " . $value['nombres'] . " </option>";
          }
      }else{
          $html1 .= "<option value=\"null\" selected >No existen registros</option>";
      }

      ?>


      <!-- AGG PUBLICACION  -->
      
      <div class="form-group">
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
              <input type="text" name="titulo" class="form-control" placeholder="Escribe el titulo" autofocus>
          </div>
          <div class="form-group">
              <textarea name="descripcion" rows="2" class="form-control" placeholder="Escribe la descripcion"></textarea>
          </div>
          <div class="form-group">
              <input type="date" name="fecha_c" class="form-control" placeholder="fecha de creacion" >
          </div>
          <div class="form-group">
              <input type="date" name="fecha_l" class="form-control" placeholder="Escribe a que curso va dirigido" >
          </div>
          <div class="form-group">
              <input type="file" name="imagen" id="imagen" class="form-control" placeholder="imagen" accept="image/png, .jpeg, .jpg ">
          </div>
          <input type="submit" name="guardar_public" class="btn btn-success btn-block" value="Guardar">
          <form action="create_publicacion.php" method="POST"enctype="multipart/form-data"  >
        </form>
      </div>
    </div>
   
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
           <th>Autor</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Creado en</th>
            <th>Para</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM publicacion";
          $result_publicacion = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_publicacion)) { ?>
          <tr>
            <td><?php echo $row['idusuario']; ?></td>
            <td><?php echo $row['titulo']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['creado_en']; ?></td>
            <td><?php echo $row['id_curso']; ?></td>
            <td>
              <a href="update_publicacion.php?id=<?php echo $row['idpublicacion']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_publicacion.php?id_publicacion=<?php echo $row['idpublicacion']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    
  </div>
</main>


