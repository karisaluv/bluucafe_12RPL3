<?php


include "../controllers/c_koneksi.php";

//htmlentities untuk mengantisipasi sistem tidak menjalankan tag html
$id_list_order = (isset($_POST['id_list_order'])) ? htmlentities($_POST['id_list_order']) : "";
$catatan = (isset($_POST['catatan'])) ? htmlentities($_POST['catatan']) : "";

if (!empty($_POST['ready_order_validate'])) {

        $query = mysqli_query($conn, "UPDATE tb_list_order SET catatan='$catatan', status=2 WHERE id_list_order='$id_list_order'");

        if ($query) {
            $message = '<script>alert("Orders are ready to be served");       
            window.location="../kitchen"</script>';

        } else {
            $message = '<script>alert("Order failed to process");       
            window.location="../kitchen"</script>';
        }
    }


echo $message;
?>