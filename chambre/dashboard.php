<?php 
  session_start(); 
  
  include('../php/check.php');
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Chambre | Liste</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../css/icon.css" type="text/css" />
  <link rel="stylesheet" href="../css/font.css" type="text/css" />
  <link rel="stylesheet" href="../css/app.css" type="text/css" />  
  <link rel="stylesheet" href="../js/calendar/bootstrap_calendar.css" type="text/css" />

  <!-- Pour le Data table -->


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" />

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
                            echo"<div class='alert alert-success'><strong>" . $_SESSION['flash']. "</strong></div>";
                            unset($_SESSION['flash']);
                          }
                        ?>  
                      </center>
                  </section>
                  <p class="h4 text-center mb-4">Liste des Chambres</p>
                  <br>
                  <div class="text-center mt-4">
                    <a href="add.php"><button class="btn btn-outline-info">Ajouter</button></a>
                  </div>
                  <br>
                  <?php

                    include('../connection.php');

                    $hotelid = $_SESSION['hotelid'];

                    $sql = "SELECT Chambre.*, TypeChambre.Libelle AS TypeNom 
                            FROM Chambre
                            INNER JOIN TypeChambre ON Chambre.TypeChambreID = TypeChambre.ID
                            WHERE Chambre.HotelID = '$hotelid'"; 

                    $result = mysqli_query($conn, $sql);

                    mysqli_close($conn);

                  ?>

                  <div class="table-responsive">
    
                    <table id="myTable" class="display nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nom</th>
                          <th>Type</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php  
                            if ($result)
                            {
                              foreach($result as $roti) 
                              {
                                echo "<tr>";
                                echo "<td>" . $roti['ID'] . "</td>";
                                echo "<td>" . $roti['Nom'] . "</td>";
                                echo "<td>" . $roti['TypeNom'] . "</td>";
                                if ($roti['Status'] == 0){ echo "<td>Libre</td>";} else {echo "<td>Occupée</td>";};
                                echo '<td><div class="btn-group btn-group-md">';
                          ?>     
                                <a type="button" class="btn btn-warning" href="edit.php?id=<?php echo $roti['ID']; ?>">Modifier</a>
                                <a onclick="return confirm('Voulez-vous vraiment supprimer cette activité ?')" href="delete.php?id=<?php echo $roti['ID'];?>" type="button" class="btn btn-danger">Supprimer</a>
                                </td>         
                          <?php
                                echo "</tr>";      
                                                      
                              } 
                            }
                          
                          ?> 
                      </tbody>
                    </table>
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

  <script src="../js/calendar/bootstrap_calendar.js"></script>
  <script src="../js/calendar/demo.js"></script>

  <script src="../js/sortable/jquery.sortable.js"></script>
  <script src="../js/app.plugin.js"></script>


  <!--Js pour le DataTable-->
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.16/pagination/input.js"></script>

<!-- Pour le Data table -->
<script type="text/javascript">
$( document ).ready(function() 
{
  $('#myTable').DataTable(
  {
        "scrollX": true,

        "pageLength": 5,
        
        dom: 'Bfrtip',
        
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
  });
});
</script>  
</body>
</html>