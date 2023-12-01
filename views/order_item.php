<?php

include "controllers/c_koneksi.php";
include_once "views/template/header.php";
include_once "views/template/sidebar.php";

$query = mysqli_query($conn, "SELECT *, SUM(harga*jumlah) AS harganya FROM tb_list_order

LEFT JOIN tb_order ON tb_order.id_order = tb_list_order.orderan
LEFT JOIN menu ON menu.id_menu = tb_list_order.menu
LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order
GROUP BY id_list_order
HAVING tb_list_order.orderan = $_GET[order]"); //HAVING digunakan untuk menggantikan WHERE dalam proses filter data saat menggunakan GROUP BY, dengan catatan datanya di agregasi. Jadi, pada tabel hanya muncul orderan sesuai kode orderannya, ga semua orderan masuk ke table CUSTOMER ORDER MENU DATA

$kode = $_GET['order'];
$meja = $_GET['meja'];
$pelanggan = $_GET['pelanggan'];

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
    //$kode = $record['id_order'];
    //$meja = $record['meja'];
    //$pelanggan = $record['pelanggan'];
}

$select_menu = mysqli_query($conn, "SELECT id_menu, nama_menu FROM menu");

?>

<!--    CONTENT     -->

<div class="col-lg-9 mt-2"> <!-- style="background-color: #f4f3ef;" -->

    <div class="card bg-tertiary">
        <div class="card-header bg-tertiary">
        <center><h3 class="mt-2"><b>Customer order menu data</b></h3></center>

            <div class="card-body">
                <a href="order" class="btn btn-dark mb-3">Back</a>
                <div class="row">
                <center><p class="text mt-3 mb-4 fs-9">Welcome to our '<b>Customer Order Data Menu</b>,' where as a cashier, you can easily access and manage all customer order information. View order history, check payment details, and ensure their shopping experience at Bluucafe goes smoothly. We provide convenient tools to assist you in delivering better service and ensuring the satisfaction of every customer.</p></center>
                    <div class="col-lg-4">
                        <div class="form-floating mb-3">
                            <!-- m = margin -->
                            <input disabled type="text" class="form-control" id="kodeorder"
                                value="<?php echo $kode; ?>">
                            <label for="uploadFoto">Order code</label>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-floating mb-3">
                            <!-- m = margin -->
                            <input disabled type="text" class="form-control" id="meja" value="<?php echo $meja; ?>">
                            <label for="uploadFoto">Table</label>
                        </div>
                    </div>


                    <div class="col-lg-5">
                        <div class="form-floating mb-3">
                            <input disabled type="text" class="form-control" id="pelanggan"
                                value="<?php echo $pelanggan; ?>">
                            <label for="uploadFoto">Customer</label>
                        </div>
                    </div>
                </div>



                <!-- Modal Add Item Baru-->
                <div class="modal fade" id="TambahItem" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add order</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">


                                <form class="needs-validation" novalidate action="routers/r_input_orderitem.php"
                                    method="POST">

                                    <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                    <input type="hidden" name="meja" value="<?php echo $meja ?>">
                                    <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">

                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" name="menu" id="">
                                                    <option selected hidden value="">Select menu</option>
                                                    <?php
                                                    foreach ($select_menu as $value) {
                                                        echo "<option value=$value[id_menu]>$value[nama_menu]</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <label for="menu">Menu</label>
                                                <div class="invalid-feedback">
                                                    Enter menu.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput"
                                                    placeholder="Number of servings" name="jumlah" required>
                                                <label for="floatingInput">Number of servings</label>
                                                <div class="invalid-feedback">
                                                    Enter the number of servings.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Notes" name="catatan">
                                                <label for="floatingPassword">Notes</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="input_orderitem_validate"
                                            value="123">Add</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- end of modal Add Item -->



                <?php

                foreach ($result as $row) {
                    

                    ?>


                    <!-- Modal Edit Menu-->

                    <!-- menggunakan < ? php echo $row['id_list_order'] ? > agar semua data tampil, tidak hanya row 1 saja -->

                    <div class="modal fade" id="ModalEdit<?php echo $row['id_list_order'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit menu</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">

                                    <form class="needs-validation" novalidate action="routers/r_edit_orderitem.php"
                                        method="POST">
                                        <input type="hidden" value="<?php echo $row['id_list_order'] ?>"
                                            name="id_list_order">
                                        <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                        <input type="hidden" name="meja" value="<?php echo $meja ?>">
                                        <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">

                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" name="menu" id="">
                                                        <option selected hidden value="">Select menu</option>
                                                        <?php
                                                        foreach ($select_menu as $value) {
                                                            if ($row['menu'] == $value['id_menu']) {
                                                                echo "<option selected value=$value[id_menu]>$value[nama_menu]</option>";
                                                            } else {
                                                                echo "<option value=$value[id_menu]>$value[nama_menu]</option>";
                                                            }

                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="menu">Menu</label>
                                                    <div class="invalid-feedback">
                                                        Enter menu.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput"
                                                        placeholder="Number of servings" name="jumlah"
                                                        value="<?php echo $row['jumlah'] ?>" required>
                                                    <label for="floatingInput">Number of servings</label>
                                                    <div class="invalid-feedback">
                                                        Enter the number of servings.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput"
                                                        placeholder="Notes" name="catatan"
                                                        value="<?php echo $row['catatan'] ?>">
                                                    <label for="floatingPassword">Notes</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="edit_orderitem_validate"
                                                value="123">Save Changes</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- end of modal Edit Menu-->





                    <!-- Modal Delete-->

                    <!-- menggunakan < ? php echo $row['id_list_order'] ? > agar semua data tampil, tidak hanya row 1 saja -->

                    <div class="modal fade" id="ModalDelete<?php echo $row['id_list_order'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete the order menu</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="routers/r_delete_orderitem.php"
                                        method="POST">
                                        <input type="hidden" value="<?php echo $row['id_list_order'] ?>"
                                            name="id_list_order">
                                        <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                        <input type="hidden" name="meja" value="<?php echo $meja ?>">
                                        <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">


                                        <div class="col-lg-12">
                                            <?php

                                            echo "Are you sure you want to delete this <b>$row[nama_menu]</b> menu";

                                            ?>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger"
                                                    name="delete_orderitem_validate" value="123">Delete</button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- end of modal Delete-->




                <?php } ?>








                <!-- Modal Payment-->
                <div class="modal fade" id="Bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Payment</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                                <div class="table-responsive">
                                    <table class="table table-hover">

                                        <thead class="table-light">
                                            <tr class="text-nowrap">
                                                <th scope="col">
                                                    Menu
                                                </th>
                                                <th scope="col">
                                                    Price
                                                </th>
                                                <th scope="col">
                                                    Qty
                                                </th>
                                                <th scope="col">
                                                    Total Price
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php

                                            $total = 0;
                                            foreach ($result as $row) {

                                                ?>

                                                <tr>
                                                    <td>
                                                        <?php echo $row['nama_menu'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo number_format($row['harga'], 0, ',', '.') ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['jumlah'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo number_format($row['harganya'], 0, ',', '.') ?>
                                                    </td>

                                                </tr>

                                                <?php
                                                $total += $row['harganya'];
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="3" class="fw-bold">
                                                    Total Price
                                                </td>
                                                <td class="fw-bold">
                                                    <!-- 0 sebagai jumlah pecahan diakhir nomor nanti, 0 jadi 0, contoh 0 nya diubah jadi 2 total harga 1500 jadi 1.500.00 kalo 2 diubah jadi 0 makan hasilnya 1.500 '.' titik sebagai pemisah ribuan-->
                                                    <?php echo number_format($total, 0, ',', '.') ?>
                                                </td>
                                            </tr>

                                        </tbody>

                                    </table>
                                </div>

                                <!-- ditambahkan enctype="multipart/form-data" khusus untuk form mengupload file-->
                                <form class="needs-validation" novalidate action="routers/r_bayar.php" method="POST">
                                    <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                    <input type="hidden" name="meja" value="<?php echo $meja ?>">
                                    <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                    <input type="hidden" name="total" value="<?php echo $total ?>">
                                    <!-- variabel total dari table bagian total= $total += $row['harganya'];-->


                                    <div class="row">


                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Nominal money" name="uang" required>
                                                <label for="floatingPassword">Nominal money</label>
                                                <div class="invalid-feedback">
                                                    Enter the nominal amount of money!.
                                                </div>
                                            </div>
                                        </div>

                                    </div>




                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="bayar_validate"
                                            value="123">Pay</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- end of modal Payment -->




                <?php
                if (empty($result)) {
                    echo "Menu data is missing";
                } else {

                    ?>


                    <div class="table-responsive">
                        <table class="table table-hover">

                            <thead class="table-tertiary border">
                                <tr class="text-nowrap">
                                    <th scope="col">
                                        Menu
                                    </th>
                                    <th scope="col">
                                        Price
                                    </th>
                                    <th scope="col">
                                        Qty
                                    </th>
                                    <th scope="col">
                                        Status
                                    </th>
                                    <th scope="col">
                                        Notes
                                    </th>
                                    <th scope="col">
                                        Total Price
                                    </th>
                                    <th scope="col">
                                        Action
                                    </th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php

                                $total = 0;
                                foreach ($result as $row) {

                                    ?>

                                    <tr>
                                        <td>
                                            <?php echo $row['nama_menu'] ?>
                                        </td>
                                        <td>
                                            <?php echo number_format($row['harga'], 0, ',', '.') ?>
                                        </td>
                                        <td>
                                            <?php echo $row['jumlah'] ?>
                                        </td>
                                        <td>
                                            <?php if (empty($row['status'])) {
                                                echo "<span class='badge text-bg-danger'>Unprocessed</span>";
                                            } elseif ($row['status'] == 1) {
                                                echo "<span class='badge text-bg-warning'>Enter the kitchen</span>";
                                            } elseif ($row['status'] == 2) {
                                                echo "<span class='badge text-bg-success'>Ready</span>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $row['catatan'] ?>
                                        </td>
                                        <td>
                                            <?php echo number_format($row['harganya'], 0, ',', '.') ?>
                                        </td>
                                        <td class="d-flex">
                                            <!-- menggunakan < ? php echo $row['id_list_order'] ? > agar emua data tampil, tidak hanya row 1 saja -->
                                            <button
                                                class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1"; ?>"
                                                data-bs-toggle="modal"
                                                data-bs-target="#ModalEdit<?php echo $row['id_list_order'] ?>"><i
                                                    class="bi bi-pencil"></i></button>
                                            <button
                                                class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1"; ?>"
                                                data-bs-toggle="modal"
                                                data-bs-target="#ModalDelete<?php echo $row['id_list_order'] ?>"><i
                                                    class="bi bi-trash3"></i></button>
                                        </td>

                                    </tr>

                                    <?php
                                    $total += $row['harganya'];
                                }
                                ?>
                                <tr>
                                    <td colspan="5" class="fw-bold">
                                        Total Price
                                    </td>
                                    <td class="fw-bold">
                                        <!-- 0 sebagai jumlah pecahan diakhir nomor nanti, 0 jadi 0, contoh 0 nya diubah jadi 2
                                    total harga 1500 jadi 1.500.00 kalo 2 diubah jadi 0 makan hasilnya 1.500
                                        '.' titik sebagai pemisah ribuan-->
                                        <?php echo number_format($total, 0, ',', '.') ?>
                                    </td>
                                </tr>

                            </tbody>

                        </table>
                    </div>

                    <?php
                }
                ?>
                <!-- button item sama pay gak akan berfungsi lagi kalo sudah melakukan payment-->
                <div>
                    <button
                        class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-success btn-sm me-1"; ?>"
                        data-bs-toggle="modal" data-bs-target="#TambahItem"><i class="bi bi-bag-plus"></i> Item</button>
                    <button
                        class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-primary btn-sm me-1"; ?>"
                        data-bs-toggle="modal" data-bs-target="#Bayar"><i class="bi bi-cash-coin"></i> Pay</button>
                </div>

            </div>
        </div>
    </div>

</div>




<!--   END OF CONTENT     -->

</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</body>

</html>

<?php
include_once "views/template/footer.php";
?>