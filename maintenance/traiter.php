<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $hotelid = $_SESSION['hotelid'];

        $sql1= "UPDATE Maintenance
                SET Status = 0 
                WHERE ID = '$id' AND HotelID = '$hotelid'"; 

        $result1 = mysqli_query($conn, $sql1);

        if ($result1 == true )
        {

            $_SESSION['flash'] = "Traitement effectuée avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash'] = "Erreur survenue lors du traitement'";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>