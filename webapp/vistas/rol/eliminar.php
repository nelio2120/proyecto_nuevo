<?php
session_start();
require '../BDD.php';
$id = $_GET['id'];
$datos = BDD::CONSULTAR("rol","idrol,rol,idcurso","idrol=$id ");
$arry = BDD::QUERY("SELECT idcurso as id,concat(nivel,' ',paralelo) as nombres FROM curso");
$html = "";
if(!$datos){
    print "<script>alert('NO EXISTE ESE ROL');</script>";
    header("location: ../admin/");
}
if(!empty($arry))
{
    foreach ($arry as $key=>$value) {
        if($value['id']==$datos['idcurso']) $selected = "selected";
        $html .= "<option value=\"" . $value['id'] . "\"  $selected> " . $value['nombres'] . " </option>";
        $selected = "";
    }
}else{
    $html .= "<option value=\"null\" selected >No existen registros</option>";
}

if(isset($_POST['button_submit']))
{
    $rol = filter_input(INPUT_POST,"rol");
    $curso = filter_input(INPUT_POST,"curso");
    $array = array("rol"=>$rol,"idcurso"=>$curso);
    $id = BDD::ELIMINAR_DATOS("rol","idrol=$id");
    if($id){
        header("location: ../admin/");
    }else{
        print "<script>alert('Error para Eliminar');</script>";
    }
}

?>
<html>
<head>
    <title>Eliminar de Registro Roles</title>
    <link rel="stylesheet" type="text/css" href="../admin/bootstrap/css/bootstrap.min.css">
    <script src="../../js_slider/jquery.flexslider-min.js"></script>
</head>

<body>
<?php include "./php/navbar.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Eliminar Rol</h2>

            <form role="form" name="registro" id="form_usuario" method="post">
                <div class="form-group">
                    <label for="username">Estas seguro de eliminar este rol?</label>
                    <input type="text" class="form-control" id="username" disabled value="<?php echo $datos['rol'] ?>" name="usuario" placeholder="Nombre de usuario">
                </div>
                <button type="submit" id="boton_submit" class="btn btn-default">Eliminar</button>
            </form>

        </div>
    </div>
</div>
<script src="js/valida_registro.js"></script>
</body>
</html>

