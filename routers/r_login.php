<?php
session_start();
include "../controllers/c_koneksi.php";


//echo md5('123');   //enkripsi password

//htmlentities untuk mengantisipasi sistem tidak menjalankan tag html

$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "";

//echo $password; //untuk ngeliat password setelah log in

//exit();

if (!empty($_POST['submit_validate'])) {
    
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' && password = '$password'");
    
    $hasil = mysqli_fetch_array($query);
    
    if ($hasil) {
        $_SESSION['username_bluucafe'] = $username;
        $_SESSION['level_bluucafe'] = $hasil['level'];
        header('location:../home');
    } else { ?>
       
       <script>
            alert('The username or password you entered is incorrect');
            window.location = '../login'
        </script>


        <?php

    }
}

?>