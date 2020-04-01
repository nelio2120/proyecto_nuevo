<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width, initial-scale=-1">
        <link rel="stylesheet" href="../css/flexslider.css" type="text/css">
        <link rel="stylesheet" href="../css/index.css" type="text/css">
        	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        	<script src="../js_slider/jquery.flexslider.js"></script>
        	<script type="text/javascript" charset="utf-8">

        	 
        	
          $(window).load(function() {
            $('.flexslider').flexslider({
            	touch: true,
            	pauseOnAction: false,
            	pauseOnHover: false,
            });
          });
        </script>
        <title>Colegio P.R</title> 
</head>

<body>
<?php include 'header.php';?>


<div class="flexslider">
		<ul class="slides">
			<li>
				<img src="../Img/slider_1.jpg" alt="">
				<section class="flex-caption">
					<h2>EVENTOS</h2>
				</section>
			</li>
			<li>
				<img src="../Img/slider_2.jpg" alt="">
				<section class="flex-caption">
					<h2>NUESTRAS INTALACIONES</h2>
				</section>
			</li>
			<li>
				<img src="../Img/slider_3.jpg" alt="">
				<section class="flex-caption">
					<h2>LABORATORIOS</h2>
				</section>
			</li>
		</ul>
	</div>
	

	
	
	
	
	



<?php include 'footer.php';?>
</body>

</html>