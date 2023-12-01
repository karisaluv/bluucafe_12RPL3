<?php


include "../controllers/c_koneksi.php";

//htmlentities untuk mengantisipasi sistem tidak menjalankan tag html
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";
$meja = (isset($_POST['meja'])) ? htmlentities($_POST['meja']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";
$pelayan = (isset($_POST['pelayan'])) ? htmlentities($_POST['pelayan']) : "";


if (!empty($_POST['input_order_validate'])) {

    $select = mysqli_query($conn, "SELECT * FROM tb_order WHERE id_order='$kode_order'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("The order entered already exists");
        window.location="../order"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_order (id_order, meja, pelanggan, pelayan) values ('$kode_order', '$meja', '$pelanggan', '$pelayan' ) ");

        if (!$query) {
            $message = '<script>alert("Data failed to enter");            
                    window.location="../order"</script>';

        } else {
            $message = '<script>alert("Data entered successfully");
                    window.location="../?x=orderitem&order='. $kode_order.' &meja='.$meja.' &pelanggan='. $pelanggan.' "</script>';
        }
    }

}
echo $message;
?>