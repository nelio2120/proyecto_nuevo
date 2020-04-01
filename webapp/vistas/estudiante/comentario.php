<?php

include("estudiante_index.php");
?>

<?php include ("../../db/db.php");?>

      <?php if (isset($_SESSION['message'])) { ?>

        <?= $_SESSION['message']?>
      <?php session_unset(); } ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  
<title>comentario</title>
<link rel="stylesheet" href="comentario_d.css" type="text/css"> 
</head>
<body>
<br><br>
<!-- Contenedor Principal -->
	<?php
$query = "SELECT * FROM publicacion";
$result_publicacion = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result_publicacion)) { ?>
          
	<div class="comments-container">
		<h3>Publicacion dirgido a:  <?php echo $row['general']; ?></h3>

		<ul id="comments-list" class="comments-list">
			<li>
				<div class="comment-main-level">
					<!-- Avatar -->
					<div class="comment-avatar"><img src="perfil_doc.gif" alt=""></div>
					<!-- Contenedor del Comentario -->
					<div class="comment-box">
						<div class="comment-head">
							<h6 class="comment-name by-author"><?php echo $row['usuario']; ?></h6>
							<span><?php echo $row['creado_en']; ?></span>
							<i class="fa fa-reply"></i>
							<i class="fa fa-heart"></i>
						</div>
						<div class="comment-content">
							
							<br>
							<?php echo $row['titulo']; ?>
							<br>
							<?php echo $row['descripcion']; ?>
						</div>
					</div>
				</div>
					</li>
</ul>
</div>
          <?php } ?>
</body>
</html>

          
          
