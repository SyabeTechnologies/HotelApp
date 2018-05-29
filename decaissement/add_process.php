<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {

        $description = $_POST['description'];

        $date = $_POST['date'];

        $heure = date("h:i:s");

        $montant = $_POST['montant'];

        $utilisateurid = $_SESSION['userid'];

        $hotelid = $_SESSION['hotelid'];

        $sql = "INSERT INTO Decaissement (Description, Date, Heure, Montant, UtilisateurID, HotelID) 
                VALUES ('$description', '$date','$heure', '$montant', '$utilisateurid', '$hotelid')"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash'] = "Decaissement ajoutée avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash'] = "Erreur survenue lors de l'ajout du decaissement";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>