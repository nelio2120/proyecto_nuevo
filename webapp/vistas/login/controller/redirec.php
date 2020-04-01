<?php

  session_start();

  if($_SESSION['cargo'] == 1){
    header('location: ../view/admin/bienvenido.php');
  }else if($_SESSION['cargo'] == 2){
    header('location: ../view/user/ingresar.php');
  }
 

 ?>
