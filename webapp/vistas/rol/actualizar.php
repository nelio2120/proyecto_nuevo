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
    $id = BDD::ACTUALIZAR_DESDE_ARRAY("rol",$array);
    if($id){
        header("location: ../admin/");
    }else{
        print "<script>alert('Error para guardar');</script>";
    }
}

?>
<html>
<head>
    <title>Actualizar de Registro Roles</title>
    <link rel="stylesheet" type="text/css" href="../admin/bootstrap/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

</head>

<body>
<?php include "./php/navbar.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Registro Rol</h2>

            <form role="form" name="registro" id="form_usuario" method="post">
                <div class="form-group">
                    <label for="username">Nombre de Rol</label>
                    <input type="text" class="form-control" id="username" value="<?php echo $datos['rol'] ?>" name="usuario" placeholder="Nombre de usuario">
                </div>
                <div class="form-group">
                    <label for="">Curso</label>
                    <select type="text" class="form-control" id="select" name="curso" required>
                        <?php
                        print $html;
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
