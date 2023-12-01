<?php

include "controllers/c_koneksi.php";
include_once "views/template/header.php";
include_once "views/template/sidebar.php";
//kode ordernya diambil dari waktu indonesia
date_default_timezone_set('Asia/Jakarta');

$query = mysqli_query($conn, "SELECT tb_order.*, tb_bayar.*, SUM(harga*jumlah) AS harganya FROM tb_order
LEFT JOIN tb_list_order ON tb_list_order.orderan = tb_order.id_order
LEFT JOIN menu ON menu.id_menu = tb_list_order.menu
LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order
GROUP BY id_order ORDER BY waktu_order DESC");

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<!--    CONTENT     -->

<div class="col-lg-9 mt-2"> <!-- style="background-color: #f4f3ef;" -->

    <div class="card bg-tertiary">
        <div class="card-header bg-tertiary">
        <center><h3 class="mt-2"><b>Customer order data</b></h3></center>
            <div class="card-body">
                <div class="row">

                    <center><p class="card-text mt-3 fs-9">Welcome to our '<b>Results of customer order data</b>' — a curated collection of dishes handpicked from the favorite orders of our loyal Bluucafe customers. Each dish here is an expression of flavor that has captivated their taste buds and hearts. Discover beauty in every bite and make your culinary experience unforgettable with us.
                    </p></center>

                    <!-- agar button dikanan menggunakan d-flex justify-content-end-->
                    <div class="col d-flex justify-content-end mb-2">
                        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalTambahMenu">Add
                            New Order</button>

                    </div>
                </div>

                <!-- Modal Add Order-->
                <div class="modal fade" id="ModalTambahMenu" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add new order</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">


                                <form class="needs-validation" novalidate action="routers/r_input_order.php"
                                    method="POST">

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-floating mb-3">
                                                <!-- m = margin -->
                                                <!-- kode order diambil dari tahun, bulan, hari, jam, menit dan ditambah kode random biar ga sama, dari 100-999 -->
                                                <input type="text" class="form-control" id="uploadFoto"
                                                    value="<?php echo date('ymdHi') . rand(100, 999) ?>"
                                                    name="kode_order" readonly>
                                                <label for="uploadFoto">Order code</label>
                                                <div class="invalid-feedback">
                                                    Enter the order code.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="meja"
                                                    placeholder="Table number" name="meja" required>
                                                <label for="meja">Table</label>
                                                <div class="invalid-feedback">
                                                    Enter table number.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="pelanggan"
                                                    placeholder="Customer" name="pelanggan" required>
                                                <label for="pelanggan">Customer's name</label>
                                                <div class="invalid-feedback">
                                                    Enter the customer's name.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="pelayan"
                                                    placeholder="Waiter" name="pelayan" required>
                                                <label for="pelayan">Waiter's name</label>
                                                <div class="invalid-feedback">
                                                    Enter the waiter's name.
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="input_order_validate"
                                            value="123">Add</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- end of modal Add Order -->

                <?php
                foreach ($result as $row) {
                    ?>

                    <!-- Modal Edit Order-->

                    <!-- menggunakan < ? php echo $row['id_order'] ? > agar semua data tampil, tidak hanya row 1 saja -->

                    <div class="modal fade" id="ModalEdit<?php echo $row['id_order'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit order</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="routers/r_edit_order.php"
                                        method="POST">
                                        <input type="hidden" value="<?php echo $row['id_order'] ?>" name="id_order">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <!-- m = margin -->
                                                    <!-- kode order diambil dari tahun, bulan, hari, jam, menit dan ditambah kode random biar ga sama, dari 100-999 -->
                                                    <input readonly type="text" class="form-control" id="uploadFoto"
                                                        value="<?php echo $row['id_order'] ?>" name="kode_order" readonly>
                                                    <label for="uploadFoto">Order code</label>
                                                    <div class="invalid-feedback">
                                                        Enter the order code.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="meja"
                                                        placeholder="Table number" name="meja" required
                                                        value="<?php echo $row['meja'] ?>">
                                                    <label for="meja">Table</label>
                                                    <div class="invalid-feedback">
                                                        Enter the table number.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="pelanggan"
                                                        placeholder="Customer" name="pelanggan" required
                                                        value="<?php echo $row['pelanggan'] ?>">
                                                    <label for="pelanggan">Customer's name</label>
                                                    <div class="invalid-feedback">
                                                        Enter the customer's name.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="pelayan"
                                                        placeholder="Waiter" name="pelayan" required
                                                        value="<?php echo $row['pelayan'] ?>">
                                                    <label for="pelayan">Waiter's name</label>
                                                    <div class="invalid-feedback">
                                                        Enter the waiter's name.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="edit_order_validate"
                                        value="123">Save
                                        Changes</button>
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>


                    <!-- end of modal Edit Order Menu-->



                    <!-- Modal Delete-->

                    <!-- menggunakan < ? php echo $row['id_order'] ? > agar semua data tampil, tidak hanya row 1 saja -->

                    <div class="modal fade" id="ModalDelete<?php echo $row['id_order'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete order</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="routers/r_delete_order.php"
                                        method="POST">
                                        <input type="hidden" value="<?php echo $row['id_order'] ?>" name="kode_order">
                                        <div class="col-lg-12">
                                            <?php

                                            echo "Are you sure you want to delete the order from customer <b>$row[pelanggan]</b> with table number <b>$row[meja]</b> and order code <b>$row[id_order]</b> ?";

                                            ?>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger" name="delete_order_validate"
                                                    value="123">Delete</button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- end of modal Delete-->




                <?php }
                ?>



                <?php
                if (empty($result)) {
                    echo "Menu data is missing";
                } else {

                    ?>


                    <div class="table-responsive">
                        <table class="table border table-hover">

                            <thead class="table-tertiary">
                                <tr class="text-nowrap">
                                    <th scope="col">
                                        No
                                    </th>
                                    <th scope="col">
                                        Order Code
                                    </th>
                                    <th scope="col">
                                        Customer
                                    </th>
                                    <th scope="col">
                                        Table
                                    </th>
                                    <th scope="col">
                                        Total Price
                                    </th>
                                    <th scope="col">
                                        Waiter
                                    </th>
                                    <th scope="col">
                                        Status
                                    </th>
                                    <th scope="col">
                                        Order Time
                                    </th>
                                    <th scope="col">
                                        Action
                                    </th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php

                                $no = 1;
                                foreach ($result as $row) {

                                    ?>

                                    <tr>
                                        <th scope="row">
                                            <?php echo $no++ ?>
                                        </th>
                                        <td>
                                            <?php echo $row['id_order'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['pelanggan'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['meja'] ?>
                                        </td>
                                        <td>
                                            <?php echo number_format($row['harganya'], 0, ',', '.') ?>
                                        </td>
                                        <td>
                                            <?php echo $row['pelayan'] ?>
                                        </td>
                                        <td>
                                            <?php echo (!empty($row['id_bayar'])) ? "<span class='badge text-bg-success'>Paid</span>" : "<span class='badge text-bg-danger'>Not yet paid</span>"; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['waktu_order'] ?>
                                        </td>
                                        <td class="d-flex">
                                            <!-- menggunakan < ? php echo $row['id_order'] ? > agar emua data tampil, tidak hanya row 1 saja -->
                                            <a class="btn btn-info btn-sm me-1"
                                                href="./?x=orderitem&order=<?php echo $row['id_order'] . "&meja=" . $row['meja'] . "&pelanggan=" . $row['pelanggan'] ?>"><i
                                                    class="bi bi-menu-up"></i></a>
                                            <button
                                                class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1"; ?>"
                                                data-bs-toggle="modal"
                                                data-bs-target="#ModalEdit<?php echo $row['id_order'] ?>"><i
                                                    class="bi bi-pencil"></i></button>
                                            <button
                                                class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1"; ?>"
                                                data-bs-toggle="modal"
                                                data-bs-target="#ModalDelete<?php echo $row['id_order'] ?>"><i
                                                    class="bi bi-trash3"></i></button>
                                        </td>

                                    </tr>

                                    <?php
                                }
                                ?>

                            </tbody>

                        </table>
                    </div>

                    <?php
                }
                ?>

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