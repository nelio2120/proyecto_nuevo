<?php session_start();
?>
<html>
	<head>
	 
    	<title>Formulario de Registro</title>
		
		
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
            background-image: url("../../Img/fondo2.jpg");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
           
        }
        .contact-form
        {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 400px;
            height: 500px;
            padding: 80px 40px;
            box-sizing: border-box;
            
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
        .contact-form h2 {
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
        p{
            text-align: center;
        }
 
 </style>
 		
		
		
	</head>
	<body>
	
<div class="container">
<div class="row">
<div class="col-md-6">
<div class="contact-form">

 <img src="../../Img/admin_log.gif" class="avatar">
        <h2>Iniciar sesion</h2>

		<form role="form" name="login" action="php/login.php" method="post">
		            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
		  <div class="form-group">
		  
		    <label for="username">Nombre de usuario o email</label>
		    <input type="text" class="form-control" id="username" name="usuario" placeholder="Nombre de usuario">
		  </div>
		  </div>.
		  
		  <div class="form-group">
		    <label for="password">Contrase&ntilde;a</label>
		    
		   <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
            
		    <input type="password" class="form-control" id="password" name="pass" placeholder="Contrase&ntilde;a">
		  </div>
		  
		  
		  </div>
		  <input type="submit" name="" value="Ingresar">
		  
		  <br><br>
		  <section class="text-accent center">
              <div class="spacing-2"></div>
              
              <p>
                 <a href="../login/index.php"> Regresar</a>
              </p>
            </section>
		  
		</form>
  </div>		
</div>
</div>
</div>
		<script src="js/valida_login.js"></script>
	</body>
</html>