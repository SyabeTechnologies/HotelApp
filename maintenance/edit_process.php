<?php

    ob_start();

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];

        $description = $_POST['description'];

        $chambreid = $_POST['chambreid'];

        $utilisateurid = $_SESSION['userid'];

        $hotelid = $_SESSION['hotelid'];

        $sql = "UPDATE Maintenance
                SET   Description = '$description', ChambreID = '$chambreid', UtilisateurID = '$utilisateurid'
                WHERE ID = '$id' AND HotelID = '$hotelid'"; 

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            $_SESSION['flash'] = "Maintenance modifiée avec succes";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

        }
        else
        {
            $_SESSION['flash'] = "Erreur survenue lors de la modification de la Maintenance";

            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

    }

    mysqli_close($conn);

    ob_end_flush();

?>