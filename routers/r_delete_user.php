<?php

include "../controllers/c_koneksi.php";

//htmlentities untuk mengantisipasi sistem tidak menjalankan tag html
$id_user = (isset($_POST['id_user'])) ? htmlentities($_POST['id_user']) : "";

if(!empty($_POST['input_user_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM user WHERE id_user='$id_user'");
    
    if(!$query){
        $message = '<script>alert("Data failed to delete")</script>';
    }else{
        $message = '<script>alert("Data deleted successfully");
                    window.location="../user"</script>
                    </script>';
    }

}echo $message;
?>