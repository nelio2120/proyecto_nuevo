<?php 
	
	

	include "../../db/conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['curso']) || empty($_POST['usuario'])  || empty($_POST['rol']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

			$id_usuario = $_POST['id_usuario'];
			$nombre = $_POST['nombre'];
			$curso  = $_POST['curso'];
			$usuario   = $_POST['usuario'];
			$clave  = md5($_POST['clave']);
			$rol    = $_POST['rol'];


			$query = mysqli_query($conection,"SELECT * FROM usuario 
													   WHERE (usuario = '$usuario' AND id_usuario != $id_usuario)
													   OR (curso = '$curso' AND id_usuario != $id_usuario) ");

			$result = mysqli_fetch_array($query);

			if($result > 0){
				$alert='<p class="msg_error">El  usuario ya existe.</p>';
			}else{

				if(empty($_POST['clave']))
				{

					$sql_update = mysqli_query($conection,"UPDATE usuario
															SET nombre = '$nombre', curso='$curso',usuario='$usuario',rol='$rol'
															WHERE id_usuario= $id_usuario ");
				}else{
					$sql_update = mysqli_query($conection,"UPDATE usuario
															SET nombre = '$nombre', curso='$curso',usuario='$usuario',clave='$clave', rol='$rol'
															WHERE id_usuario= $id_usuario ");

				}

				if($sql_update){
					$alert='<p class="msg_save">Usuario actualizado correctamente.</p>';
				}else{
					$alert='<p class="msg_error">Error al actualizar el usuario.</p>';
				}

			}


		}

	}

	//Mostrar Datos
	if(empty($_REQUEST['id']))
	{
		header('Location: lista_usuarios.php');
		mysqli_close($conection);
	}
	$iduser = $_REQUEST['id'];

	$sql= mysqli_query($conection,"SELECT u.id_usuario, u.nombre,u.curso,u.usuario, (u.rol) as idrol, (r.rol) as rol
									FROM usuario u
									INNER JOIN rol r
									on u.rol = r.idrol
									WHERE id_usuario= $iduser ");
	mysqli_close($conection);
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: lista_usuarios.php');
	}else{
		$option = '';
		while ($data = mysqli_fetch_array($sql)) {
			# code...
			$iduser  = $data['id_usuario'];
			$nombre  = $data['nombre'];
			$curso  = $data['curso'];
			$usuario = $data['usuario'];
			$idrol   = $data['idrol'];
			$rol     = $data['rol'];

			if($idrol == 1){
				$option = '<option value="'.$idrol.'" select>'.$rol.'</option>';
			}else if($idrol == 2){
				$option = '<option value="'.$idrol.'" select>'.$rol.'</option>';	
			}else if($idrol == 3){
				$option = '<option value="'.$idrol.'" select>'.$rol.'</option>';
			}


		}
	}

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../../css/registro.css">
		<title>Actualizar Usuario</title>
</head>
<body>
	<?php include "../admin/admin_index.php"; ?>
	<section id="container">
		
		<div class="form_register">
			<h1>Actualizar usuario</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<input type="hidden" name="id_usuario" value="<?php echo $iduser; ?>">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre completo" value="<?php echo $nombre; ?>">
				<label for="correo">Curso</label>
				<input type="text" name="curso" id="curso" placeholder="Curso" value="<?php echo $curso; ?>">
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario" placeholder="Usuario" value="<?php echo $usuario; ?>">
				<label for="clave">Clave</label>
				<input type="password" name="clave" id="clave" placeholder="Clave de acceso">
				<label for="rol">Tipo Usuario</label>

				<?php 
					include "../../db/conexion.php";
					$query_rol = mysqli_query($conection,"SELECT * FROM rol");
					mysqli_close($conection);
					$result_rol = mysqli_num_rows($query_rol);

				 ?>

				<select name="rol" id="rol" class="notItemOne">
					<?php
						echo $option; 
						if($result_rol > 0)
						{
							while ($rol = mysqli_fetch_array($query_rol)) {
					?>
							<option value="<?php echo $rol["idrol"]; ?>"><?php echo $rol["rol"] ?></option>
					<?php 
								# code...
							}
							
						}
					 ?>
				</select>
				<input type="submit" value="Actualizar usuario" class="btn_save">

			</form>


		</div>


	</section>
	
</body>
</html>