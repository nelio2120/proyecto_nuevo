
<?php include ("../../db/db.php");?>

      <?php if (isset($_SESSION['message'])) { ?>

        <?= $_SESSION['message']?>
      <?php session_unset(); } ?>


<?php

include("admin_index.php");
?>


  
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
  
	<?php
$query = "SELECT fullname FROM user";
$result_publicacion = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result_publicacion)) { ?>


 <h2>Hola Adminnistrador  <?php echo $row['fullname']; ?></h2>
<center>     <img src="../../Img/admin_bien.gif" alt="l" class= "bien"  > </center>
<!-- <h3><a href="enlacepagina.html">Haz clic para ir a tu menu</a></h3>-->
<?php } ?>