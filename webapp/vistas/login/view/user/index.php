<?php
  session_start();

  // Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
  if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 2){
    header('location: ../../ingresar.php');
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">  
    <title>principal estudiante</title>
    <link rel="stylesheet" href="../../../../css/menu_vertical.css" type="text/css">
        
      <style>
      h2{
       text-align: center;
       color:#f90;
        font-size:180%;
        font-weight:normal;
        text-transform: uppercase;
        position:absolute;
        left: 50%;
        top: 70%;
        transform: translateX(-50%) translateY(-50%);
        
      }
      .bien {
      width: 300px;
    	height: 300px;
    	border-radius: 40%;
    	
    	top: -50px;
    	left: calc(50% - 50px);
    	
      }
      
      
        h3{
       text-align: center;
       color:#f90;
        font-size:120%;
        font-weight:normal;
        text-transform: uppercase;
        position:absolute;
        left: 50%;
        top: 80%;
        transform: translateX(-50%) translateY(-50%);
        
      }
      </style>
      
        </head>
  <body>
   
   
<input type="checkbox" id="abrir-cerrar" name="abrir-cerrar" value="">
    <label for="abrir-cerrar">&#9776; <span class="abrir">Abrir</span><span class="cerrar">Cerrar</span></label>
    <div id="sidebar" class="sidebar">

<ul class="menu">
<li><img src="../../../../Img/estudiante.jpg" alt="Logo Fazt" class="avatar"></li>
<li><P class='titulo'>ESTUDIANTE</P></li>
<li><a href="../../../estudiante/comentario.php">Publicaciones</a></li>
<li><a href="../../controller/cerrarSesion.php">Cerrar sesion</a>
</ul>
</div>


<div id="contenido">
<p><a href="../../../index.php" target="_blank">
            <img src="../../../../Img/logoPR.jpg" alt="logo_pr" class= "avatar"> </a></p>
        <h1>U.E.P.R</h1>
</div>

<h2>Hola Estudiante <?php echo ucfirst($_SESSION['nombre']); ?> </h2>
<center>     <img src="../../../../Img/estudiante_bien.gif" alt="logo_pr" class= "bien"  > </center>
<!-- <h3><a href="enlacepagina.html">Haz clic para ir a tu menu</a></h3>-->

   
   
   
     </body>
</html>
