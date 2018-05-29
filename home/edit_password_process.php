<?php

    session_start();

    include('../connection.php');

    include('../php/check.php');

    if(isset($_POST['submit']))
    {

        $oldpassword = $_POST['oldpassword'];

        $newpassword = $_POST['newpassword'];

        $newpasswordrepeat = $_POST['newpasswordrepeat'];

        $utilisateurid = $_SESSION['userid'];

        $hotelid = $_SESSION['hotelid'];

        if ($newpassword != $newpasswordrepeat)
        {
            $_SESSION['flash'] = "Confirmation nouveau Password different";

            echo "<script type='text/javascript'>location.href = 'edit_password.php';</script>";
        }
        else
        {
            $sql = "SELECT * FROM Utilisateur WHERE ID = '$utilisateurid' AND HotelID = '$hotelid'"; 

            $result = mysqli_query($conn, $sql);

            foreach ($result as $roti)
            {
            $en = $roti['Password'];
            }

            if ($oldpassword != $en)
            {
                $_SESSION['flash'] = "Ancien Password different";

                echo "<script type='text/javascript'>location.href = 'edit_password.php';</script>";
            }
            else
            {
                $sql1 = "UPDATE Utilisateur SET Password = '$newpassword' WHERE ID = '$utilisateurid' AND HotelID = '$hotelid'"; 

                $result1 = mysqli_query($conn, $sql1);

                if ($result1 == true)
                {
                    $_SESSION['flash'] = "Password modifié";

                    echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
                }
                else
                {
                    $_SESSION['flash'] = "Modification echouée";

                    echo "<script type='text/javascript'>location.href = 'edit_password.php';</script>";
                }
            }
        }

    }

    mysqli_close($conn);

?>