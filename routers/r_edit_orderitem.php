<?php


include "../controllers/c_koneksi.php";

//htmlentities untuk mengantisipasi sistem tidak menjalankan tag html
$id_list_order = (isset($_POST['id_list_order'])) ? htmlentities($_POST['id_list_order']) : "";
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";
$meja = (isset($_POST['meja'])) ? htmlentities($_POST['meja']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";
$catatan = (isset($_POST['catatan'])) ? htmlentities($_POST['catatan']) : "";
$menu = (isset($_POST['menu'])) ? htmlentities($_POST['menu']) : "";
$jumlah = (isset($_POST['jumlah'])) ? htmlentities($_POST['jumlah']) : "";

if (!empty($_POST['edit_orderitem_validate'])) {

        //jika item tidak ada, maka tb_list_order terisi
        $query = mysqli_query($conn, "UPDATE tb_list_order SET menu='$menu', jumlah='$jumlah', catatan='$catatan' WHERE id_list_order='$id_list_order'");

        if (!$query) {
            $message = '<script>alert("Failed to change data!");       
            window.location="../?x=orderitem&order='. $kode_order.' &meja='.$meja.' &pelanggan='. $pelanggan.' "</script>';

        } else {
            $message = '<script>alert("Successfully changed data!");
                    window.location="../?x=orderitem&order='. $kode_order.' &meja='.$meja.' &pelanggan='. $pelanggan.' "</script>';
        }
    }


echo $message;
?>