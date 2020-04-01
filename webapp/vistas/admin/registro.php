<?php
    session_start();
    require '../BDD.php';
    $arry = BDD::QUERY("select idpersona as id,concat(nombre,' ',apellido) as nombres from persona");
    $html = "";
    if(!empty($arry))
    {
        foreach ($arry as $key=>$value)
        {
            $html .= "<option value=\"".$value['id']."\" > ".$value['nombres']." </option>";
        }
    }else{
        $html .= "<option value=\"null\" selected >No existen registros</option>";
    }
$arry_rol = BDD::QUERY("select idrol as id, rol as nombres from rol ");
$html1 = "";
if(!empty($arry_rol))
{
    foreach ($arry_rol as $key=>$value)
    {
        $html1 .= "<option value=\"".$value['id']."\" > ".$value['nombres']." </option>";
    }
}else{
    $html1 .= "<option value=\"null\" selected >No existen registros</option>";
}


?>
<html>
	<head>
		<title>Formulario de Registro</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <script src="../../js_slider/jquery.flexslider-min.js"></script>
	</head>

	<body>
	<?php include "php/navbar.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-6">
		<h2>Registro Usuario</h2>

		<form role="form" name="registro" action="php/registro.php" id="form_usuario" method="post">
		  <div class="form-group">
		    <label for="username">Nombre de usuario</label>
		    <input type="text" class="form-control" id="username" name="usuario" placeholder="Nombre de usuario">
		  </div>
		  <div class="form-group">
		    <label for="email">Correo Electronico</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico">
		  </div>
		  <div class="form-group">
		    <label for="password">Contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
		  </div>
		  <div class="form-group">
		    <label for="confirm_password">Confirmar Contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmar Contrase&ntilde;a">
		  </div>
            <div class="form-group">
                <label for="select">Persona</label>
                <select type="text" class="form-control" id="select" name="persona" required>
                    <?php
                        print $html;
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="rol">Rol</label>
                <select type="text" class="form-control" id="rol" name="rol" required>
                    <?php
                    print $html1;
                    ?>
                </select>
            </div>


		  <button type="submit" id="boton_submit" class="btn btn-default">Registrar</button>
		</form>

		</div>
		</div>
		</div>
		<script src="js/valida_registro.js"></script>
	</body>
</html>