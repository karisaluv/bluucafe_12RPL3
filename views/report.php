<?php

include "controllers/c_koneksi.php";
include_once "views/template/header.php";
include_once "views/template/sidebar.php";
//kode ordernya diambil dari waktu indonesia
date_default_timezone_set('Asia/Jakarta');

$query = mysqli_query($conn, "SELECT tb_order.*, tb_bayar.*, SUM(harga*jumlah) AS harganya FROM tb_order
LEFT JOIN tb_list_order ON tb_list_order.orderan = tb_order.id_order
LEFT JOIN menu ON menu.id_menu = tb_list_order.menu
JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order
GROUP BY id_order ORDER BY waktu_order DESC");

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<!--    CONTENT     -->

<div class="col-lg-9 mt-2"> <!-- style="background-color: #f4f3ef;" -->

    <div class="card bg-tertiary">
        <div class="card-header bg-tertiary">
        <center><h3 class="mt-2"><b>Report</b></h3></center>

            <div class="card-body">
                <div class="row">

                <center><p class="card-text mt-3 mb-4 fs-9">Welcome to the '<b>Customer Order Data Report Menu</b>' at Bluucafe. As an admin, you have exclusive access to view and analyze reports on customer order data. Monitor ordering trends, analyze menu performance, and gain in-depth insights to guide strategic decisions. We provide detailed information to help you understand customer order dynamics, enhance services, and elevate the culinary experience at Bluucafe.
                    </p></center>

                </div>



                <?php
                foreach ($result as $row) {
                    ?>


                <?php }
                ?>



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
                                        No
                                    </th>
                                    <th scope="col">
                                        Order Code
                                    </th>
                                    <th scope="col">
                                        Order Time
                                    </th>
                                    <th scope="col">
                                        Payment Time
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
                                            <?php echo $row['waktu_order'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['waktu_bayar'] ?>
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
                                        <td class="d-flex">
                                            <!-- menggunakan < ? php echo $row['id_order'] ? > agar emua data tampil, tidak hanya row 1 saja -->
                                            <a class="btn btn-info btn-sm me-1"
                                                href="./?x=viewitem&order=<?php echo $row['id_order'] . "&meja=" . $row['meja'] . "&pelanggan=" . $row['pelanggan'] ?>"><i
                                                    class="bi bi-menu-up"></i></a>
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