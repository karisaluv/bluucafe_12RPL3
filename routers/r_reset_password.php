<?php

include "../controllers/c_koneksi.php";

//htmlentities untuk mengantisipasi sistem tidak menjalankan tag html
$id_user = (isset($_POST['id_user'])) ? htmlentities($_POST['id_user']) : "";

if(!empty($_POST['input_user_validate'])) {
    $query = mysqli_query($conn, "UPDATE user SET password=md5('123') WHERE id_user='$id_user'");
    
    if(!$query){
        $message = '<script>alert("Password failed to reset")</script>';
        
    }else{
        $message = '<script>alert("Password reset successfully");
                    window.location="../user"</script>';
    }

}echo $message;
?>