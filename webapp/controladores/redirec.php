<?php

session_start();

if($_SESSION['cargo'] == 2){
    header('location: ../vistas/profesor/profesor_index.php'); //me dirijo ha profesor pantalla de inicio
}else if($_SESSION['cargo'] == 3){
    header('location: ../vistas/estudiante/estudiante_index.php');//me dirijo ha estudiante
}

?>
