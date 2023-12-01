<?php


include "../controllers/c_koneksi.php";

//htmlentities untuk mengantisipasi sistem tidak menjalankan tag html
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";
$meja = (isset($_POST['meja'])) ? htmlentities($_POST['meja']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";
$total = (isset($_POST['total'])) ? htmlentities($_POST['total']) : "";
$uang = (isset($_POST['uang'])) ? htmlentities($_POST['uang']) : "";
$kembalian = $uang - $total;

if (!empty($_POST['bayar_validate'])) {
    if ($kembalian < 0) {
        $message = '<script>alert("The nominal amount of money is not enough!");
        window.location="../?x=orderitem&order=' . $kode_order . ' &meja=' . $meja . ' &pelanggan=' . $pelanggan . ' "</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_bayar (id_bayar, nominal_uang, total_bayar) values ('$kode_order', '$uang', '$total') ");

        if (!$query) {
            $message = '<script>alert("Payment failed");       
                window.location="../?x=orderitem&order=' . $kode_order . ' &meja=' . $meja . ' &pelanggan=' . $pelanggan . ' "</script>';

        } else {
            $message = '<script>alert("Payment successful \nRp'.$kembalian .' cash back!");
                        window.location="../?x=orderitem&order=' . $kode_order . ' &meja=' . $meja . ' &pelanggan=' . $pelanggan . ' "</script>';
        }
    }
}


echo $message;
?>