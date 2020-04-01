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
      <?php session_unset(); } ?>


      <!-- AGG PUBLICACION  -->
      
      <div class="form-group">
        <form action="create_publicacion.php" method="POST"  >
          <div class="form-group">
				<input type="text" name="usuario" class="form-control"  placeholder="DOCENTE necesitamos confirmar tu nombre " autofocus>
		</div>		
          
          <div class="form-group">
            <input type="text" name="general" class="form-control" placeholder="Escribe a que curso va dirigido" autofocus>
          </div>
          
          <div class="form-group">
            <input type="text" name="titulo" class="form-control" placeholder="Escribe el titulo" autofocus>
          </div>
          <div class="form-group">
            <textarea name="descripcion" rows="2" class="form-control" placeholder="Escribe la descripcion"></textarea>
          </div>
          <input type="submit" name="guardar_public" class="btn btn-success btn-block" value="Guardar">
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
            <td><?php echo $row['usuario']; ?></td>
            <td><?php echo $row['titulo']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['creado_en']; ?></td>
            <td><?php echo $row['general']; ?></td>
            <td>
              <a href="update_publicacion.php?id_publicacion=<?php echo $row['id_publicacion']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_publicacion.php?id_publicacion=<?php echo $row['id_publicacion']?>" class="btn btn-danger">
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


