<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];

        $temps = $_POST['temps'];

        $debut = $_POST['datedebut'];

        $fin = $_POST['datefin'];

        $montant = $_POST['montant'];

        $hotelid = $_SESSION['hotelid'];

        $sql = "UPDATE Enregistrement 
                SET  DateDebut = '$debut', DateFin = '$fin', Temps = '$temps', Montant = '$montant' 
                WHERE ID='$id' AND HotelID = '$hotelid'"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Enregistrement modifié avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash']="Erreur survenue lors de la modification de l'enregistrement'";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>