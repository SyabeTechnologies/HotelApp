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

        $chambreid = $_POST['chambreid'];

        $utilisateurid = $_SESSION['userid'];

        $hotelid = $_SESSION['hotelid'];

        $sql = "INSERT INTO Maintenance (Description, Date, Heure, ChambreID, UtilisateurID, Status, HotelID) 
                VALUES ('$description', '$date', '$heure', '$chambreid', '$utilisateurid', 1, '$hotelid')"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash'] = "Maintenance ajoutée avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash'] = "Erreur survenue lors de l'ajout de la maintenance";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>