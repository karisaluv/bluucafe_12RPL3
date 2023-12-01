<?php

include "../controllers/c_koneksi.php";

//htmlentities untuk mengantisipasi sistem tidak menjalankan tag html
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";

if (!empty($_POST['delete_order_validate'])) {
    $select = mysqli_query($conn, "SELECT orderan FROM tb_list_order WHERE orderan='$kode_order'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("This customer`s order already has an order list, so this order data cannot be deleted!");
        window.location="../order"</script>';
    } else {

        $query = mysqli_query($conn, "DELETE FROM tb_order WHERE id_order='$kode_order'");

        if (!$query) {
            $message = '<script>alert("Data failed to delete");
        window.location="../order"</script>';
        } else {
            $message = '<script>alert("Data deleted successfully");
                    window.location="../order"</script>';
        }
    }
}
echo $message;
?>