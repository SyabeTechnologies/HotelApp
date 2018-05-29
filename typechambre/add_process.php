<?php
    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {

        $libelle = $_POST['libelle'];

        $hotelid = $_SESSION['hotelid'];

        $sql = "INSERT INTO TypeChambre (Libelle, HotelID) 
                VALUES ('$libelle', '$hotelid')"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash']="Type Chambre ajouté avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash']="Erreur survenue lors de l'ajout d type chambre";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>