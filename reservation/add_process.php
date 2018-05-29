<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {

        $date = date("Y-m-d");

        $heure = date("h:i:s");

        $nom = $_POST['nom'];

        $debut = $_POST['datedebut'];

        $fin = $_POST['datefin'];

        $temps = $_POST['temps'];

        $type = $_POST['typechambreid'];

        $commentaire = $_POST['commentaire'];

        $utilisateur = $_SESSION['userid'];

        $hotelid = $_SESSION['hotelid'];

        $sql = "INSERT INTO Reservation (Date, Heure, Nom, DateDebut, DateFin, Temps, TypeChambreID, Commentaire, UtilisateurID, HotelID) 
                VALUES ('$date', '$heure', '$nom', '$debut', '$fin', '$temps', '$type', '$commentaire', '$utilisateur', '$hotelid')"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash'] = "Reservation ajoutée avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash'] = "Erreur survenue lors de l'ajout de la reservation";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>