<?php 
	
	include "../../db/conexion.php";

	if(!empty($_POST))
	{
		if($_POST['id_usuario'] == 1){
			header("location: lista_usuarios.php");
			mysqli_close($conection);
			exit;
		}
		$id_usuario = $_POST['id_usuario'];

		//$query_delete = mysqli_query($conection,"DELETE FROM usuario WHERE id_usuario =$id_usuario ");//
		
		$query_delete = mysqli_query($conection,"UPDATE usuario SET estado = 0 WHERE id_usuario = $id_usuario ");
		mysqli_close($conection);
		if($query_delete){
			header("location: lista_usuarios.php");
		}else{
			echo "Error al eliminar";
		}

	}




	if(empty($_REQUEST['id']) || $_REQUEST['id'] == 1 )
	{
		header("location: lista_usuarios.php");
		mysqli_close($conection);
	}else{

		$id_usuario = $_REQUEST['id'];

		$query = mysqli_query($conection,"SELECT u.nombre,u.usuario,r.rol
												FROM usuario u
												INNER JOIN
												rol r
												ON u.rol = r.idrol
												WHERE u.id_usuario = $id_usuario ");
		
		mysqli_close($conection);
		$result = mysqli_num_rows($query);

		if($result > 0){
			while ($data = mysqli_fetch_array($query)) {
				# code...
				$nombre = $data['nombre'];
				$usuario = $data['usuario'];
				$rol     = $data['rol'];
			}
		}else{
			header("location: lista_usuarios.php");
		}


	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../css/buscador.css">
		<link rel="stylesheet" type="text/css" href="../../css/lista.css">

	<title>Eliminar Usuario</title>
</head>
<body>
	<?php include "../admin/admin_index.php"; ?>
	<section id="container">
		<div class="data_delete">
			<h2>¿Estas seguro de eliminar el siguiente registro?</h2>
			<p>Nombre: <span><?php echo $nombre; ?></span></p>
			<p>usuario: <span><?php echo $usuario; ?></span></p>
			<p>Tipo Usuario: <span><?php echo $rol; ?></span></p>

			<form method="post" action="">
				<input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
				<a href="lista_usuarios.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>
		</div>


	</section>
	
</body>
</html>