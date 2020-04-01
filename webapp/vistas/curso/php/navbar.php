<nav class="navbar navbar-default" role="navigation">
<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="./"><b>MYAPP</b></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <?php if(!isset($_SESSION["user_id"])):?>
      <li><a href="../admin/registro.php">REGISTRO Admin</a></li>
          <li><a href="../rol/index.php">REGISTRO ROL</a></li>
          <li><a href="./index.php">REGISTRO CURSO</a></li>
      <li><a href="../admin/login.php">LOGIN</a></li>
    <?php else:?>
      <li><a href="../admin/php/logout.php">SALIR</a></li>
    <?php endif;?>
    </ul>

  </div><!-- /.navbar-collapse -->
</div>
</nav>