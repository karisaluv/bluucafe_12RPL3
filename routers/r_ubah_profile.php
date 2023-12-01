<?php
session_start();
include "../controllers/c_koneksi.php";

//htmlentities untuk mengantisipasi sistem tidak menjalankan tag html
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$mobile = (isset($_POST['mobile'])) ? htmlentities($_POST['mobile']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";


if (!empty($_POST['ubah_profile_validate'])){


            $query = mysqli_query($conn, "UPDATE user SET nama='$nama', mobile='$mobile', alamat='$alamat' WHERE username = '$_SESSION[username_bluucafe]'");
            if ($query) {
                $message = '<script>alert("Profile changed successfully");
                        window.history.back()</script>';
            }else{
                $message = '<script>alert("Profile failed to change");
                        window.history.back()</script>';

            }
            }else{
                $message = '<script>alert("Error occurs");
                        window.history.back()</script>';
            }
        
echo $message;
?>