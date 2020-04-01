<?php
require '../../BDD.php';
if(!empty($_POST)){
	if(isset($_POST["usuario"])
        &&isset($_POST["rol"])
        &&isset($_POST["email"])
        &&isset($_POST["password"])
        &&isset($_POST["persona"])
        &&isset($_POST["confirm_password"])){
	        if($_POST['password']==$_POST['confirm_password'])
            {
                $array = array("usuario"=>$_POST['username'],"clave"=>$_POST['password'],"idpersona"=>$_POST['persona']
                ,"idrol"=>$_POST['rol'],"email"=>$_POST['email']);
                if(BDD::INSERTAR_DESDE_ARRAY("usuario",$array))
                {
                    print "<script>alert('SE HA GUARDADO EL REGISTRO DE MANERA EXITOSA');</script>";
                    header('location: ../ingresar.php');
                }
                else{
                    print "<script>alert('Ha ocurrido un error al guardar');</script>";
                    header('location: ../ingresar.php');
                }
		}else{
                print "<script>alert('Deben coincidir el usuario y la contraseña');</script>";
                header('location: ../registro.php');
            }

    }
}



?>