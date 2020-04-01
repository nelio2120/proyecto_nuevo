<?php

if(!empty($_POST)){
	if(isset($_POST["usuario"]) &&isset($_POST["pass"])){
		if($_POST["usuario"]!=""&&$_POST["pass"]!=""){
		    require '../../BDD.php';
			$usuario  = $_POST['usuario'];
			$pass = $_POST['pass'];
			$user_id=null;
            $consulta = BDD::CONSULTAR("usuario","idusuario as id", "(usuario= '$usuario' or email='$usuario') and clave='$pass'  and idrol = 2");
            $user_id = $consulta['id'];
            if($user_id==null){
				print "<script>alert(\"Acceso invalido.\");window.location='../login.php';</script>";
			}else{
				session_start();
				$_SESSION["user_id"]=$user_id;
				print "<script>window.location='../bienvenido.php';</script>";				
			}
		}
	}
}



?>