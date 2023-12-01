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
}

$select_menu = mysqli_query($conn, "SELECT id_menu, nama_menu FROM menu");

?>

<!--    CONTENT     -->

<div class="col-lg-9 mt-2"> <!-- style="background-color: #f4f3ef;" -->

    <div class="card bg-tertiary">
        <div class="card-header bg-tertiary">
        <center><h3 class="mt-2"><b>Customer order menu data</b></h3></center>
       
            <div class="card-body">
                <a href="report" class="btn btn-dark mb-3">Back</a>
                <div class="row">
                    
                <center><p class="text mt-3 mb-4 fs-9">Welcome to the '<b>Customer Order Data Menu</b>' at Bluucafe, accessed by the cashier. As an admin, you have full control over the customer order data accessed by cashiers. Monitor order status, manage payments, and ensure smooth transactions. We provide efficient tools to ensure an optimal customer experience and operational efficiency. Thank you for your dedication in maintaining the smooth operation of our services at Bluucafe.</p></center>
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







                <?php

                foreach ($result as $row) {

                    ?>



                <?php } ?>



                <?php
                if (empty($result)) {
                    echo "Menu data is missing";
                } else {

                    ?>


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
                                        Status
                                    </th>
                                    <th scope="col">
                                        Notes
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
                                            <?php if (empty($row['status'])) {
                                                echo "<span class='badge text-bg-danger'>Unprocessed</span>";
                                            } elseif ($row['status'] == 1) {
                                                echo "<span class='badge text-bg-warning'>Enter the kitchen</span>";
                                            } elseif ($row['status'] == 2) {
                                                echo "<span class='badge text-bg-success'>Ready to be served</span>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $row['catatan'] ?>
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