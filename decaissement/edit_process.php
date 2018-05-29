<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];

        $description = $_POST['description'];

        $montant = $_POST['montant'];

        $utilisateurid = $_SESSION['userid'];

        $hotelid = $_SESSION['hotelid'];

        $sql = "UPDATE Decaissement
                SET   Description = '$description', Montant = '$montant', UtilisateurID = '$utilisateurid'
                WHERE ID ='$id' AND HotelID = '$hotelid'"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Decaissement modifié avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash']="Erreur survenue lors de la modification du Decaissement";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>