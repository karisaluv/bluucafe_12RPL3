<?php

include "../controllers/c_koneksi.php";

//htmlentities untuk mengantisipasi sistem tidak menjalankan tag html
$id_list_order = (isset($_POST['id_list_order'])) ? htmlentities($_POST['id_list_order']) : "";
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";
$meja = (isset($_POST['meja'])) ? htmlentities($_POST['meja']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";

if (!empty($_POST['delete_orderitem_validate'])) {

    $query = mysqli_query($conn, "DELETE FROM tb_list_order WHERE id_list_order='$id_list_order'");

    if (!$query) {
        $message = '<script>alert("Data failed to delete");
        window.location="../?x=orderitem&order='. $kode_order.' &meja='.$meja.' &pelanggan='. $pelanggan.' "</script>';
    } else {
        $message = '<script>alert("Data deleted successfully");
        window.location="../?x=orderitem&order='. $kode_order.' &meja='.$meja.' &pelanggan='. $pelanggan.' "</script>';
    }
}

echo $message;
?>