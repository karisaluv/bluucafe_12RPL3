<?php

include "../controllers/c_koneksi.php";

//htmlentities untuk mengantisipasi sistem tidak menjalankan tag html
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";
$mobile = (isset($_POST['mobile'])) ? htmlentities($_POST['mobile']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
//password tetap disabled namun value nya dari sini, tidak perlu diambil dari post password
$password = md5('password');

if (!empty($_POST['input_user_validate'])) {

    $select = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("The username entered already exists");
        window.location="../user"</script>
        </script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO user (nama, username, level, mobile, alamat, password) values ('$nama', '$username', '$level', '$mobile', '$alamat', '$password') ");

        if (!$query) {
            $message = '<script>alert("Data failed to enter")</script>';
        } else {
            $message = '<script>alert("Data entered successfully");
                    window.location="../user"</script>';
        }
    }

}
echo $message;
?>