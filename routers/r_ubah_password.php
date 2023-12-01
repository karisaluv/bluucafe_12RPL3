<?php
session_start();
include "../controllers/c_koneksi.php";

//htmlentities untuk mengantisipasi sistem tidak menjalankan tag html
$id_user = (isset($_POST['id_user'])) ? htmlentities($_POST['id_user']) : "";
$passwordlama = (isset($_POST['passwordlama'])) ? md5(htmlentities($_POST['passwordlama'])) : "";
$passwordbaru = (isset($_POST['passwordbaru'])) ? md5(htmlentities($_POST['passwordbaru'])) : "";
$repasswordbaru = (isset($_POST['repasswordbaru'])) ? md5(htmlentities($_POST['repasswordbaru'])) : "";



if (!empty($_POST['ubah_password_validate'])) {

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$_SESSION[username_bluucafe]' && password = '$passwordlama'");

    $hasil = mysqli_fetch_array($query);


    if ($hasil) {
        if ($passwordbaru == $repasswordbaru) {



            $query = mysqli_query($conn, "UPDATE user SET password='$passwordbaru' WHERE username = '$_SESSION[username_bluucafe]'");
            if ($query) {
                $message = '<script>alert("Password changed successfully");
                        window.history.back()</script>';

            } else {
                $message = '<script>alert("Password failed to change");
                window.history.back()</script>';

            }
        } else {
            $message = '<script>alert("New password is not the same");
                        window.history.back()</script>';
        }

    } else {
        $message = '<script>alert("Old password is not the same");
                        window.history.back()</script>';

    }
} else {
    header('location:../home');

}
echo $message;
?>