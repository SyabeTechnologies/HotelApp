<?php 

session_start(); 

include('../php/check.php');

include('../connection.php');

$hotelid = $_SESSION['hotelid'];

$sql = "SELECT SUM(Montant) AS Gain, CASE MONTH(Date) 
WHEN 1 THEN 'Janvier'
WHEN 2 THEN 'Février'
WHEN 3 THEN 'Mars'                                                                  
WHEN 4 THEN 'Avril'
WHEN 5 THEN 'Mai'
WHEN 6 THEN 'Juin'
WHEN 7 THEN 'Juillet'
WHEN 8 THEN 'Août'
WHEN 9 THEN 'Septembre'
WHEN 10 THEN 'Octobre'
WHEN 11 THEN 'Novembre'
ELSE 'Décembre' END AS Mois                                                                                                                                
FROM Enregistrement
WHERE YEAR(DATE) = YEAR(NOW()) AND HotelID = '$hotelid'
GROUP BY MONTH(Date)"; 

$result = mysqli_query($conn, $sql);




$sql1 = "SELECT SUM(Montant) AS Sortie, CASE MONTH(Date) 
WHEN 1 THEN 'Janvier'
WHEN 2 THEN 'Février'
WHEN 3 THEN 'Mars'                                                                  
WHEN 4 THEN 'Avril'
WHEN 5 THEN 'Mai'
WHEN 6 THEN 'Juin'
WHEN 7 THEN 'Juillet'
WHEN 8 THEN 'Août'
WHEN 9 THEN 'Septembre'
WHEN 10 THEN 'Octobre'
WHEN 11 THEN 'Novembre'
ELSE 'Décembre' END AS Mois
FROM Decaissement 
WHERE YEAR(DATE) = YEAR(NOW()) AND HotelID = '$hotelid'
GROUP BY MONTH(Date)";         
  
$result1 = mysqli_query($conn, $sql1);




$sql2 = "SELECT COUNT(TypeChambre.ID) AS nombre, TypeChambre.Libelle AS type
FROM TypeChambre
INNER JOIN Chambre ON TypeChambre.ID = Chambre.TypeChambreID
INNER JOIN Enregistrement ON Enregistrement.ChambreID = Chambre.ID
WHERE Enregistrement.HotelID = '$hotelid'
AND YEAR(Enregistrement.Date) = YEAR(NOW())
GROUP BY type"; 

$result2 = mysqli_query($conn, $sql2);


$sql3 = "SELECT COUNT(Enregistrement.ID) AS Nombre, CASE MONTH(Enregistrement.Date) 
WHEN 1 THEN 'Janvier'
WHEN 2 THEN 'Février'
WHEN 3 THEN 'Mars'                                                                  
WHEN 4 THEN 'Avril'
WHEN 5 THEN 'Mai'
WHEN 6 THEN 'Juin'
WHEN 7 THEN 'Juillet'
WHEN 8 THEN 'Août'
WHEN 9 THEN 'Septembre'
WHEN 10 THEN 'Octobre'
WHEN 11 THEN 'Novembre'
ELSE 'Décembre' END AS Mois
FROM Enregistrement
WHERE YEAR(Enregistrement.Date) = YEAR(NOW())
AND Enregistrement.HotelID = '$hotelid'
GROUP BY MONTH(Date)"; 

$result3 = mysqli_query($conn, $sql3);

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>HotelApp - Tableau de bord</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../css/icon.css" type="text/css" />
  <link rel="stylesheet" href="../css/font.css" type="text/css" />
  <link rel="stylesheet" href="../css/app.css" type="text/css" />  
  <link rel="stylesheet" href="../js/calendar/bootstrap_calendar.css" type="text/css" />
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawBasic); 

        function drawBasic()  
        {  
           var data = google.visualization.arrayToDataTable([  
                ['Mois', 'Gain'],  
                  <?php  
                    while($row = mysqli_fetch_array($result))  
                      {  
                        echo "['".$row["Mois"]."', ".$row["Gain"]."],";  
                      }  
                 ?>  
                     ]);  
            var options = {  
                title: 'Vos Gains par Mois',
                 hAxis: {
                    title: 'Mois',
                    viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                    }
                 },
                  vAxis: {
                     title: 'Gains (en Franc CFA)'
                    }   
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('piechart_gain'));  
            chart.draw(data, options);


            var data = google.visualization.arrayToDataTable([  
                ['Mois', 'Sortie', {role: "style"}],  
                  <?php  
                    while($row = mysqli_fetch_array($result1))  
                      {  
                        echo "['".$row["Mois"]."', ".$row["Sortie"].", 'color: red'],";  
                      }  
                 ?>  
                     ]);  
            var options = {  
                title: 'Vos Sortie par Mois',
                 hAxis: {
                    title: 'Mois',
                    viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                    }
                 },
                  vAxis: {
                     title: 'Sortie (en Franc CFA)'
                    }   
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('piechart_sortie'));  
            chart.draw(data, options); 
            
        } 

        google.charts.load('current', {'packages':['corechart']});  
        google.charts.setOnLoadCallback(drawChart);  
        function drawChart()  
        {  
           var data = google.visualization.arrayToDataTable([  
                ['Type', 'Nombre'],  
                  <?php  
                    while($row = mysqli_fetch_array($result2))  
                      {  
                        echo "['".$row["type"]."', ".$row["nombre"]."],";  
                      }  
                 ?>  
                     ]);  
            var options = {  
                title: 'Pourcentage des types de chambre occupées année en cours',  
                is3D:true,  
                pieHole: 0.4  
            };  
            var chart = new google.visualization.PieChart(document.getElementById('piechart2'));  
            chart.draw(data, options); 


            var data = google.visualization.arrayToDataTable([  
                ['Mois', 'Nombre'],  
                  <?php  
                    while($row = mysqli_fetch_array($result3))  
                      {  
                        echo "['".$row["Mois"]."', ".$row["Nombre"]."],";  
                      }  
                 ?>  
                     ]);  
            var options = {  
                title: "Pourcentage des prises de chambre dans l'année",  
                is3D:true,  
                pieHole: 0.4  
            };  
            var chart = new google.visualization.PieChart(document.getElementById('piechart3'));  
            chart.draw(data, options);   
        }  


    </script>   
</head>

<body>
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
                <center>          
                  <div class="row">
                    <h2>Bilan Statistique</h2>
                    <br>
                    <div>  
                      <div style="width:80%;" id="piechart_gain"></div>  
                    </div>
                    <br>
                    <div>  
                      <div style="width:80%;" id="piechart_sortie"></div>  
                    </div>
                    <br>
                    <div>  
                      <div style="width:80%;" id="piechart2"></div>  
                    </div> 
                    <br>
                    <div>  
                      <div style="width:80%;" id="piechart3"></div>  
                    </div>  
                  </div>
                </center>
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

  <script src="../js/calendar/bootstrap_calendar.js"></script>
  <script src="../js/calendar/demo.js"></script>

  <script src="../js/sortable/jquery.sortable.js"></script>
  <script src="../js/app.plugin.js"></script>
</body>
</html>