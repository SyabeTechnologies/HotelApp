<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $hotelid = $_SESSION['hotelid'];

        $sql= "DELETE FROM Enregistrement WHERE ID = '$id' AND HotelID = '$hotelid'"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {

            $sql1= "UPDATE Chambre
               SET Status = 0 
               WHERE ID = '$chambreid' AND HotelID = '$hotelid'"; 

            $result1 = mysqli_query($conn, $sql1);

            if ($result1 == true )
            {

            $_SESSION['flash']="Enregistrement supprimé avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

            }
            else
            {
                $_SESSION['flash']="Erreur survenue lors de la liberation de la chambre'";

                echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
            }

        }
        else
        {
            $_SESSION['flash']="Erreur survenue lors de la supression de l'enregistrement'";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>