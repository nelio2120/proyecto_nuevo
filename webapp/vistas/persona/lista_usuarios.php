<?php include "../../db/conexion.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/lista.css">
	<link rel="stylesheet" type="text/css" href="../../css/buscador.css">
	<title>Lista de usuarios</title>
</head>
<body>
	<?php include "../admin/admin_index.php"; ?>
	<section id="container">
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<h1>Lista de usuarios</h1>
		
		
		<form action="buscar_usuario.php" method="get" class="form_search">
		<a href="../../reportes/reporte_usuarios.php" target="_blank">
            <img src="../../Img/pdf_icono.png" alt="logo_pr" class= "" width="40px" height="40px" > </a>
		
		<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
			<input type="submit" value="Buscar" class="btn_search">
		</form>

		<table>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Curso</th>
				<th>Usuario</th>
				<th>Rol</th>
				<th>Acciones</th>
			</tr>
		<?php 
			//Paginador
			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM usuario WHERE estado = 1 ");
			$result_register = mysqli_fetch_array($sql_registe);
			$total_registro = $result_register['total_registro'];

			$por_pagina = 5;

			if(empty($_GET['pagina']))
			{
				$pagina = 1;
			}else{
				$pagina = $_GET['pagina'];
			}

			$desde = ($pagina-1) * $por_pagina;
			$total_paginas = ceil($total_registro / $por_pagina);

			$query = mysqli_query($conection,"SELECT u.id_usuario, u.nombre, u.curso, u.usuario, r.rol FROM usuario u INNER JOIN rol r ON u.rol = r.idrol WHERE estado = 1 ORDER BY u.id_usuario ASC LIMIT $desde,$por_pagina 
				");

			mysqli_close($conection);

			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
					
			?>
				<tr>
					<td><?php echo $data["id_usuario"]; ?></td>
					<td><?php echo $data["nombre"]; ?></td>
					<td><?php echo $data["curso"]; ?></td>
					<td><?php echo $data["usuario"]; ?></td>
					<td><?php echo $data['rol'] ?></td>
					<td>
						<a class="link_edit" href="editar_usuario.php?id=<?php echo $data["id_usuario"]; ?>">Editar</a>

					<?php if($data["id_usuario"] != 1){ ?>
						|
						<a class="link_delete" href="eliminar_confirmar_usuario.php?id=<?php echo $data["id_usuario"]; ?>">Eliminar</a>
					<?php } ?>
						
					</td>
				</tr>
			
		<?php 
				}

			}
		 ?>


		</table>
		
		<!--Paginador de la LISTA DE USUARIOS  --> 
		
				<div class="paginador">
			<ul>
			<?php 
				if($pagina != 1)
				{
			 ?>
				<li><a href="?pagina=<?php echo 1; ?>">|<</a></li>
				<li><a href="?pagina=<?php echo $pagina-1; ?>"><<</a></li>
			<?php 
				}
				for ($i=1; $i <= $total_paginas; $i++) { 
					# code...
					if($i == $pagina)
					{
						echo '<li class="pageSelected">'.$i.'</li>';
					}else{
						echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
					}
				}

				if($pagina != $total_paginas)
				{
			 ?>
				<li><a href="?pagina=<?php echo $pagina + 1; ?>">>></a></li>
				<li><a href="?pagina=<?php echo $total_paginas; ?> ">>|</a></li>
			<?php } ?>
			</ul>
		</div>


	</section>
	
</body>
</html>