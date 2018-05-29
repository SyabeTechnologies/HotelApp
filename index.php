<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en" class=" ">
<head>  
  <meta charset="utf-8" />
  <title>Connexion | HotelApp</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/icon.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />  
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body>
    <center>
     <?php
      if (isset($_SESSION['flash'])) 
      {
        echo"<div class='alert alert-danger'><strong>" .$_SESSION['flash']. "</strong></div>";
        unset($_SESSION['flash']);
      }
    ?>  
    </center>
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xl">
      <a class="navbar-brand block" href="index.html">HOTELAPP</a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong>Se connecter</strong>
        </header>
        <form action="login.php" method="post">
          <div class="list-group">
            <div class="list-group-item">
              <input type="text" placeholder="Pseudo" class="form-control no-border" id="username" name ="username" required autofocus>
            </div>
            <div class="list-group-item">
               <input type="password" placeholder="Mot de passe" class="form-control no-border" id="password" name = "password" required autofocus>
            </div>
          </div>
          <button type="submit" id="submit" name="submit" value="submit" class="btn btn-lg btn-primary btn-block">Connexion</button>
          <!-- <div class="text-center m-t m-b"><a href="#"><small>Mot de passe oublié ?</small></a></div>
          <div class="line line-dashed"></div>
          <p class="text-muted text-center"><small>Vous n'avez pas de compte ?</small></p>
          <a href="signup.html" class="btn btn-lg btn-default btn-block">Inscription</a> -->
        </form>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
      <small>&copy; 2018. Conçu par <a href="http://www.syabe-group.com" target="_blank">Syabe Technologies.</a></small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>  
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/app.plugin.js"></script>
</body>
</html>