<?php 
session_start(); 

include('../php/check.php');
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Reservation | Modifier</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../css/icon.css" type="text/css" />
  <link rel="stylesheet" href="../css/font.css" type="text/css" />
  <link rel="stylesheet" href="../css/app.css" type="text/css" />  
  <link rel="stylesheet" href="../js/calendar/bootstrap_calendar.css" type="text/css" />
  <link rel="stylesheet" href="../js/chosen/chosen.css" type="text/css" />
</head>
<body class="" >

  <section class="vbox">
    <?php include("../php/header.php"); ?>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black aside-md hidden-print hidden-xs" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">

                <?php include("../php/nav.php"); ?>                
                
              </div>
            </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder">              
                  <section class="row m-b-md">
                      <center>
                        <?php
                          if (isset($_SESSION['flash'])) 
                          {
                            echo"<div class='alert alert-success'><strong>" .$_SESSION['flash']. "</strong></div>";
                            unset($_SESSION['flash']);
                          }
                        ?>  
                      </center>
                  </section>
                  <div class="row">

                    <div class="col-md-4">
                                 
                    </div>
                    <div class="col-md-4">
                
                    <?php

                        $ide = $_GET['id'];

                        $hotelid = $_SESSION['hotelid'];
                        
                        include('../connection.php');

                        $sql = "SELECT * FROM Reservation WHERE ID= '$ide' AND HotelID = '$hotelid'"; 
    
                        $result = mysqli_query($conn, $sql);

                        $sql1 = "SELECT * FROM TypeChambre WHERE HotelID = '$hotelid'"; 
    
                        $result1 = mysqli_query($conn, $sql1);
    
                        mysqli_close($conn);

                    ?>  

<!-- Material form subscription -->
<form method="post" action="edit_process.php">
    <p class="h4 text-center mb-4">Modifier Information Reservation</p>
    <br>

    <!-- Material input montant -->
    <div class="md-form ">
        <input type="hidden" name="id" id="id" value="<?php foreach ($result as $roie){ echo $roie['ID']; } ?>">
    </div>
    <br>

    <!-- Material input type -->
    <div class="md-form">
        
        <input type="text" id="nom" class="form-control" value="<?php foreach ($result as $roie){ echo $roie['Nom']; } ?>" name="nom" required autofocus>
        <label for="materialFormSubscriptionEmailEx">Nom</label>
    </div>
    <br>

      <!-- Material input type -->
      <div class="md-form">
        
        <input type="date" id="datedebut" class="form-control" value="<?php foreach ($result as $roie){ echo $roie['DateDebut']; } ?>" name="datedebut" autofocus>
        <label for="materialFormSubscriptionEmailEx">Debut</label>
    </div>
    <br>

      <!-- Material input type -->
      <div class="md-form">
        
        <input type="date" id="datefin" class="form-control" value="<?php foreach ($result as $roie){ echo $roie['DateFin']; } ?>" name="datefin" autofocus>
        <label for="materialFormSubscriptionEmailEx">Fin</label>
    </div>
    <br>

    <!-- Material input type -->
    <div class="md-form">
        <input type="number" min="0" max="24" id="temps" class="form-control" value="<?php foreach ($result as $roie){ echo $roie['Temps']; } ?>" name="temps" autofocus>
        <label for="materialFormSubscriptionEmailEx">Temps</label>
    </div>
    <br>

      <!-- Material input type -->
      <div class="md-form ">  
        <select class="form-control chosen-select" id="typechambreid" name="typechambreid" required>
                  <option value=""></option>
                  <?php foreach($result1 as $roiv){ ?>
                  <option value="<?php echo $roiv['ID'] ?>" data-tokens="<?php echo $roiv['Libelle'] ?>" <?php foreach ($result as $roie){ if ($roie['TypeChambreID'] ==  $roiv['ID']){echo "selected"; }}?>><?php echo $roiv['Libelle'] ?></option>
                  <?php } ?> 
        </select>
        <label for="materialFormSubscriptionNameEx">Type</label>
    </div>
    <br>

    <!-- Material input type -->
    <div class="md-form">
        <input type="text" id="commentaire" class="form-control" value="<?php foreach ($result as $roie){ echo $roie['Commentaire']; } ?>" name="commentaire" autofocus>
        <label for="materialFormSubscriptionEmailEx">Commentaire</label>
    </div>
    <br>


    <div class="text-center mt-4">
        <button class="btn btn-outline-info" type="submit" name="submit">Valider<i class="fa fa-paper-plane-o ml-2"></i></button>
    </div>
</form>
<!-- Material form subscription -->

                           
                    </div>
                  </div>
				  
                </section>
              </section>
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>
    </section>
  </section>
  <script src="../js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../js/bootstrap.js"></script>
  <!-- App -->
  <script src="../js/app.js"></script>  
  <script src="../js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <script src="../js/charts/sparkline/jquery.sparkline.min.js"></script>
  <script src="../js/charts/flot/jquery.flot.min.js"></script>
  <script src="../js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="../js/charts/flot/jquery.flot.spline.js"></script>
  <script src="../js/charts/flot/jquery.flot.pie.min.js"></script>
  <script src="../js/charts/flot/jquery.flot.resize.js"></script>
  <script src="../js/charts/flot/jquery.flot.grow.js"></script>
  <script src="../js/charts/flot/demo.js"></script>

  <script src="../js/chosen/chosen.jquery.min.js"></script>

  <script src="../js/calendar/bootstrap_calendar.js"></script>
  <script src="../js/calendar/demo.js"></script>

  <script src="../js/sortable/jquery.sortable.js"></script>
  <script src="../js/app.plugin.js"></script>
</body>
</html>