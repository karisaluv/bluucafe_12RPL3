<?php


include "../controllers/c_koneksi.php";

//htmlentities untuk mengantisipasi sistem tidak menjalankan tag html
$id_list_order = (isset($_POST['id_list_order'])) ? htmlentities($_POST['id_list_order']) : "";
$catatan = (isset($_POST['catatan'])) ? htmlentities($_POST['catatan']) : "";

if (!empty($_POST['terima_order_validate'])) {

        $query = mysqli_query($conn, "UPDATE tb_list_order SET catatan='$catatan', status=1 WHERE id_list_order='$id_list_order'");

        if (!$query) {
            $message = '<script>alert("Order failed to be received by the kitchen");       
            window.location="../kitchen"</script>';

        } else {
            $message = '<script>alert("The order was successfully received by the kitchen");       
            window.location="../kitchen"</script>';
        }
    }


echo $message;
?>