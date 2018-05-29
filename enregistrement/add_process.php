<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {

        $date = date("Y-m-d");

        $heure = date("h:i:s");

        $debut = $_POST['datedebut'];

        $fin = $_POST['datefin'];

        $temps = $_POST['temps'];

        $montant = $_POST['montant'];

        $clientid = $_POST['clientid'];

        $chambreid = $_POST['chambreid'];

        $utilisateur = $_SESSION['userid'];

        $hotelid = $_SESSION['hotelid'];

        $sql = "INSERT INTO Enregistrement (Date, Heure, DateDebut, DateFin, Temps, Montant, ClientID, ChambreID, UtilisateurID, Status, HotelID) 
                VALUES ('$date', '$heure', '$debut', '$fin', '$temps', '$montant', '$clientid', '$chambreid', '$utilisateur', 1, '$hotelid')"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $sql1 = "UPDATE Chambre
                    SET Status = 1
                    WHERE ID='$chambreid'";

            $result1 = mysqli_query($conn, $sql1);

            if ($result1 == true)
            {
                $_SESSION['flash']="Enregistrement ajouté avec succes";

                echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
            }

        }
        else
        {
            $_SESSION['flash']="Erreur survenue lors de l'ajout de l'enregistrement";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>