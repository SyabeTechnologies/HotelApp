<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Bilan - Journalier</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../css/icon.css" type="text/css" />
  <link rel="stylesheet" href="../css/font.css" type="text/css" />
  <link rel="stylesheet" href="../css/app.css" type="text/css" />  
  <link rel="stylesheet" href="../js/calendar/bootstrap_calendar.css" type="text/css" />
  <link rel="stylesheet" href="../css/bootstrap-datepicker.css" type="text/css" />
  <link rel="stylesheet" href="../js/bootstrap-datepicker.pt-BR.min.js" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
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
                    <div class="col-sm-6">
                      
                    </div>
                  </section>
                  <div class="row">


                    <center>
                        

<!-- Material form subscription -->

<?php

  include('../connection.php');

  include('../php/check.php');

  if(isset($_POST['submit']))
  {
    $date = $_POST['date'];

    $date1 = strtotime($date); 
    $new_date = date('d-m-Y', $date1);

    $hotelid = $_SESSION['hotelid'];

    $sql = "SELECT * FROM Enregistrement WHERE Date = '$date' AND HotelID = '$hotelid'"; 
    
    $result = mysqli_query($conn, $sql);

    $sql1 = "SELECT * FROM Decaissement WHERE Date = '$date' AND HotelID = '$hotelid'"; 
    
    $result1 = mysqli_query($conn, $sql1);

    $enreg = 0;

    $decai = 0;

    foreach ($result as $roti)
    {
      $enreg = $enreg + $roti['Montant'];
    }

    foreach ($result1 as $roto)
    {
      $decai = $decai + $roto['Montant'];
    }

    echo "<h1>Bilan du " . $new_date . "</h1>";

    echo "<h2>Entrées : " . number_format($enreg, 0, ',', ' ') . " FCFA</h2>" ;

    echo "<h2>Sorties : " . number_format($decai, 0, ',', ' '). " FCFA</h2>" ;

    mysqli_close($conn);
  }

?>  

    


<!-- Material form subscription -->
                      
                           
                    </center>
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
  <script src="../js/bootstrap-datepicker.min.js"></script>
  <script src="../js/calendar/bootstrap_calendar.js"></script>
  <script src="../js/calendar/demo.js"></script>

  <script src="../js/sortable/jquery.sortable.js"></script>
  <script src="../js/app.plugin.js"></script>

  <script type="text/javascript">
  
  $('.date').datepicker({
    format: 'dd/mm/yyyy',
    startDate: '-3d'
});
  
  </script>
</body>
</html>