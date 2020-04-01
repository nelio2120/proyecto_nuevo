<?php
session_start();
require '../BDD.php';
$id = $_GET['id'];
$datos = BDD::CONSULTAR("curso","nivel,paralelo","idcurso=$id ");
if(!$datos){
    print "<script>alert('NO EXISTE ESE ROL');</script>";
    header("location: ../admin/");
}

if(isset($_POST['button_submit']))
{
    $rol = filter_input(INPUT_POST,"nivel");
    $curso = filter_input(INPUT_POST,"paralelo");
    $array = array("nivel"=>$rol,"paralelo"=>$curso);
    $id = BDD::ACTUALIZAR_DESDE_ARRAY("curso",$array);
    if($id){
        header("location: ../admin/");
    }else{
        print "<script>alert('Error para Actualizar');</script>";
    }
}

?>
<html>
<head>
    <title>Actualizar de Registro Curso</title>
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
            <h2>Actualizar Curso</h2>

            <form role="form" name="registro" id="form_usuario" method="post">
                <div class="form-group">
                    <label for="username">Nivel</label>
                    <input type="text" class="form-control" id="username" value="<?php echo $datos['nivel']?>" name="nivel" placeholder="nivel">
                </div>
                <div class="form-group">
                    <label for="username">Paralelo</label>
                    <input type="text" class="form-control" id="username"value="<?php echo $datos['paralelo']; ?>" name="paralelo" placeholder="Paralelo">
                </div>
                <button type="submit" id="boton_submit" class="btn btn-default">Registrar</button>
            </form>

        </div>
    </div>
</div>
<script src="js/valida_registro.js"></script>
</body>
</html>