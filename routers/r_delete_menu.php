<?php

include "../controllers/c_koneksi.php";

//htmlentities untuk mengantisipasi sistem tidak menjalankan tag html
$id_menu = (isset($_POST['id_menu'])) ? htmlentities($_POST['id_menu']) : "";

if(!empty($_POST['input_menu_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM menu WHERE id_menu='$id_menu'");
    
    if(!$query){
        $message = '<script>alert("Menu failed to delete")</script>';
    }else{
        $message = '<script>alert("Menu deleted successfully");
                    window.location="../menu"</script>
                    </script>';
    }

}echo $message;
?>