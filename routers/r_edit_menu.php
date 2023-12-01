<?php

include "../controllers/c_koneksi.php";

//htmlentities untuk mengantisipasi sistem tidak menjalankan tag html
$id_menu = (isset($_POST['id_menu'])) ? htmlentities($_POST['id_menu']) : "";
$nama_menu = (isset($_POST['nama_menu'])) ? htmlentities($_POST['nama_menu']) : "";
$keterangan = (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan']) : "";
$kategori = (isset($_POST['kategori'])) ? htmlentities($_POST['kategori']) : "";
$harga = (isset($_POST['harga'])) ? htmlentities($_POST['harga']) : "";
$stok = (isset($_POST['stok'])) ? htmlentities($_POST['stok']) : "";

//nama file ditambahkan kode random, "-" merupakan nama file nya apa, agar tidak ke-replace
$kode_rand = rand(10000, 99999)."-";
//target directory
$target_dir = "../assets/img/".$kode_rand;
$target_file = $target_dir . basename($_FILES['foto']['name']);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


if (!empty($_POST['input_menu_validate'])) {
    //cek apakah gambar atau bukan
    $cek = getimagesize($_FILES['foto']['tmp_name']);
    if ($cek == false) {
        $message = "this is not an image file";
        $statusUpload = 0;

    } else {
        $statusUpload = 1;
        if (file_exists($target_file)) {
            $message = "Sorry, the file you entered already exists";
            $statusUpload = 0;
        } else {
            if ($_FILES['foto']['size'] > 500000) { //500kb      
                $message = "The uploaded photo file is too large";
                $statusUpload = 0;
            } else { // != merupakan tidak sama dengan
                if ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif") {
                    $message = "Sorry, only images in JPG, JPEG, PNG and GIF formats are allowed";
                    $statusUpload = 0;
                }
            }
        }
    }

    if ($statusUpload == 0) {
        $message = '<script>alert("' . $message . ', Image failed to upload");
        window.location="../menu"</script>';
    
        } else {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $query = mysqli_query($conn, "UPDATE menu SET foto = '" . $kode_rand. $_FILES['foto']['name'] . "', nama_menu='$nama_menu', keterangan='$keterangan', kategori='$kategori', harga='$harga', stok='$stok' WHERE id_menu='$id_menu'");

                if ($query) {
                    $message = '<script>alert("Successfully changed data!");
                    window.location="../menu"</script>';
                } else {
                    $message = '<script>alert("Failed to change data!");
                    window.location="../menu"</script>';

                }
            } else {
                $message = '<script>alert("Sorry, an error occurred so the file could not be uploaded");
                window.location="../menu"</script>';
            }
        }
    
}
echo $message;
?>