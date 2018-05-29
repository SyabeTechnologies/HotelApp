<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {

        $nom = $_POST['nom'];

        $contact = $_POST['contact'];

        $email = $_POST['email'];

        $hotelid = $_SESSION['hotelid'];

        $sql = "INSERT INTO Client (Nom, Contact, Email, HotelID) 
                VALUES ('$nom','$contact','$email', '$hotelid')"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Client ajouté avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash']="Erreur survenue lors de l'ajout du client";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>