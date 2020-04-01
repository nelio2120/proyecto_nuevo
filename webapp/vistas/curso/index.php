<?php
session_start();
require '../BDD.php';

$array_data = BDD::QUERY("select nivel,paralelo,idcurso from curso");
$data = "";
foreach ($array_data as $k){
    $data .="<tr>";
    foreach ($k as $atributo=>$valor){
        if(substr($atributo,0,2)=="id"){
            $data.= "<td><a href='./actualizar.php?id=$valor' class='btn'><i class=\"fas fa-pencil-alt\"></i></a></td>";
            $data.= "<td><a href='./eliminar.php?id=$valor' class='btn'><i class=\"fas fa-window-close\"></i></a></a></td>";
            continue;
        }
        $data .= "<td>$valor</td>";

    }
    $data .="</tr>";
}

?>
<html>
<head>
    <title>Registro Cursos</title>
    <link rel="stylesheet" type="text/css" href="../admin/bootstrap/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable( {
                "info":     false
            } );
        } );
    </script>

</head>

<body>
<?php include "./php/navbar.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Cursos</h2>
            <div class="table-responsive">
                <table  id="table_id" class="table table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>Nivel</th>
                            <th>Paralelo</th>
                            <th>Actualizar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php print $data;?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<script src="../../js_slider/jquery.flexslider-min.js"></script>
<script src="../../js_slider/jquery.flexslider.js"></script>

</body>
</html>





