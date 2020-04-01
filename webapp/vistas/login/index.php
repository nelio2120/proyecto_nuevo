<?php
  /*
    En ocasiones el usuario puede volver al login
    aun si ya existe una sesion iniciada, lo correcto
    es no mostrar otra ves el login sino redireccionarlo
    a su pagina principal mientras exista una sesion entonces
    creamos un archivo que controle el redireccionamiento
  */
  session_start();
  require '../BDD.php';
  if(isset($_POST['button_submit'])){
      $usuario = $_POST['usuario'];
      $consulta = BDD::CONSULTAR("usuario inner join rol on rol.idrol = usuario.idrol"
          ,"rol,clave","usuario ='$usuario' or email = '$usuario'");
      if ($consulta){
          if($consulta['clave']==$_POST['pass']){
              $rol = $consulta['rol'];
              if($rol == 'profesor'){
                  header('location: ../profesor/profesor_index.php');
              }
              if($rol=='estudiante'){
                  header('location: ../estudiante/estudiante_index.php');
              }
          }else{
              print "<script>alert('Contraseña incorrecta');</script>";
          }
      }else{
          print "<script>alert('Usuario o Contraseña incorrecta');</script>";
      }
  }
  // isset verifica si existe una variable o eso creo xd
  if(isset($_SESSION['id_usuario'])){
    
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login en PHP</title>
    <!-- Importamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario (más bonitas que el alert) -->
    <link rel="stylesheet" href="css/sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="css/style.css">
    <!--css -->
         <style type="text/css">
  
body{
            margin: 0;
            padding: 0;
        }
        body:before{
            content: '';
            position: fixed;
            width: 100vw;
            height: 100vh;
            background-image: url("fondo2.jpg");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
           
        }
      
        .avatar {
            position: absolute;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            top: calc(-80px/2);
            left: calc(46% - 40px);
        }
         h2 {
            margin: 0;
            padding: 0 0 20px;
            color: #fff;
            text-align: center;
            text-transform: uppercase;
            font-family:  cursive
        }
        .contact-form p
        {
            margin: 0;
            padding: 0;
            font-weight: bold;
            color: #fff;
            font-size: 20px;
             font-family: "arial", serif;
             
        }
        .contact-form input
        {
            width: 100%;
            margin-bottom: 20px;
        }
        .contact-form input[type="text"],
        .contact-form input[type="password"]
        {
            border: none;
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            height: 40px;
            color: #fff;
            font-size: 20px;
        }
        .contact-form input[type="submit"] {
            height: 40px;
            color: #fff;
            font-size: 15px;
            background:#106383;
            cursor: pointer;
            border-radius: 20px;
            border: none;
            outline: none;
            margin-top: 15%;
        }
        .contact-form a
        {
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
        }
        input[type="checkbox"] {
            width: 20%;
        }
        a{
        
        }
 
 </style>
  </head>
  <body>
    <div class="container">
    <br>
    <br>
    <br>
      <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
          <div class="spacing-1"></div>
 			<br>
          <br>
            <form method="post">
          <!-- Estructura del formulario -->
          <fieldset>
         
			 <img src="icono_login.gif" class="avatar">
            <legend class="center"><h2>Inicio de sesion</h2></legend>
            <br>	
            <!-- Caja de texto para usuario -->
            <label class="sr-only" for="user">Usuario</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <input type="text" class="form-control" id="user" name="usuario" placeholder="Ingresa tu usuario">
            </div>

            <!-- Div espaciador -->
            <div class="spacing-2"></div>
			            <br>	
            <!-- Caja de texto para la clave-->
            <label class="sr-only" for="clave">Contraseña</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
              <input type="password" autocomplete="off" class="form-control" id="clave" name="pass" placeholder="Ingresa tu contraseña">
            </div>

            <!-- Animacion de load (solo sera visible cuando el cliente espere una respuesta del servidor )-->
            <div class="row" id="load" hidden="hidden">
              <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
                <img src="img/load.gif" width="100%" alt="">
              </div>
              <div class="col-xs-12 center text-accent">
                <span>Validando información...</span>
              </div>
            </div>
            <!-- Fin load -->
				            <br>	
            <!-- boton #login para activar la funcion click y enviar el los datos mediante ajax -->
            <div class="row">
              <div class="col-xs-8 col-xs-offset-2">
                <div class="spacing-2"></div>
                <button type="submit" class="btn btn-primary btn-block" name="button_submit" id="login">Iniciar sesion</button>
              </div>
            </div>

            <section class="text-accent center">
              <div class="spacing-2"></div>
              
              <p>
                Eres Administrador? <a href="../admin/login.php"> Inicia aqui!</a>
              </p>
            </section>

          </fieldset>
            </form>
        </div>
      </div>
    </div>

    <!-- / Final Formulario login -->

    <!-- Jquery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- SweetAlert js -->
    <script src="js/sweetalert.min.js"></script>
    <!-- Js personalizado -->
    <script src="js/operaciones.js"></script>
  </body>
</html>
