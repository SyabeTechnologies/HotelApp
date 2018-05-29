<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];

        $nom = $_POST['nom'];

        $debut = $_POST['datedebut'];

        $fin = $_POST['datefin'];

        $temps = $_POST['temps'];

        $type = $_POST['typechambreid'];

        $commentaire = $_POST['commentaire'];

        $utilisateur = $_SESSION['userid'];

        $hotelid = $_SESSION['hotelid'];

        $sql = "UPDATE Reservation 
                SET  Nom = '$nom', DateDebut = '$debut', DateFin = '$fin', Temps = '$temps', TypeChambreID ='$type', Commentaire = '$commentaire', UtilisateurID = '$utilisateur'
                WHERE ID ='$id' AND HotelID = '$hotelid'"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Reservation modifiée avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash']="Erreur survenue lors de la modification de la reservation";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>