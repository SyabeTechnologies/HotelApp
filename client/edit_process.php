<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];

        $nom = $_POST['nom'];

        $contact = $_POST['contact'];

        $email = $_POST['email'];

        $hotelid = $_SESSION['hotelid'];

        $sql = "UPDATE Client SET  Nom='$nom', Contact='$contact', Email='$email' WHERE ID='$id' AND HotelID = '$hotelid'"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Client modifié avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash']="Erreur survenue lors de la modification du client";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>