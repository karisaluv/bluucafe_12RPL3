<?php

include "controllers/c_koneksi.php";
include_once "views/template/header.php";
include_once "views/template/sidebar.php";

$query = mysqli_query($conn, "SELECT * FROM tb_list_order

LEFT JOIN tb_order ON tb_order.id_order = tb_list_order.orderan
LEFT JOIN menu ON menu.id_menu = tb_list_order.menu
LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order
ORDER BY waktu_order DESC");


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
        <center><h3 class="mt-2"><b>Kitchen Section</b></h3></center>

            <div class="card-body">
                <center><p class="card-text mt-3 mb-4 fs-9">Welcome to our '<b>Kitchen Menu</b>,' where every order is received and meticulously prepared for processing. Track the status of customer orders here — whether they are in the preparation phase, cooking stage, or ready to be served. We pay special attention to every detail to ensure that each dish coming out of our kitchen meets the highest quality standards.</p></center>



                <?php

                foreach ($result as $row) {

                    ?>


                    <!-- Modal Terima Dapur-->

                    <!-- menggunakan < ? php echo $row['id_list_order'] ? > agar semua data tampil, tidak hanya row 1 saja -->

                    <div class="modal fade" id="Terima<?php echo $row['id_list_order'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Order data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">

                                    <form class="needs-validation" novalidate action="routers/r_terima_order.php"
                                        method="POST">
                                        <input type="hidden" name="id_list_order"
                                            value="<?php echo $row['id_list_order'] ?>">

                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" name="menu" id="">
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
                                                    <input disabled type="number" class="form-control" id="floatingInput"
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
                                            <button type="submit" class="btn btn-primary" name="terima_order_validate"
                                                value="123">Accept</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- end of modal Terima Dapur-->



                    <!-- Modal Siap Saji Dapur-->

                    <!-- menggunakan < ? php echo $row['id_list_order'] ? > agar semua data tampil, tidak hanya row 1 saja -->

                    <div class="modal fade" id="Ready<?php echo $row['id_list_order'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ready to be served</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">

                                    <form class="needs-validation" novalidate action="routers/r_ready_order.php"
                                        method="POST">
                                        <input type="hidden" name="id_list_order"
                                            value="<?php echo $row['id_list_order'] ?>">

                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" name="menu" id="">
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
                                                    <input disabled type="number" class="form-control" id="floatingInput"
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
                                            <button type="submit" class="btn btn-primary" name="ready_order_validate"
                                                value="123">Ready</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- end of modal Siap Saji Dapur-->





                <?php } ?>






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
                                        Menu
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
                                        <td>
                                            <?php echo $no++ ?>
                                        </td>
                                        <td>
                                            <?php echo $row['id_order'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['waktu_order'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['nama_menu'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['jumlah'] ?>
                                        </td>
                                        <td>
                                            <?php if ($row['status'] == 1) {
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
                                            <!-- menggunakan < ? php echo $row['id_list_order'] ? > agar emua data tampil, tidak hanya row 1 saja -->
                                            <button
                                                class="<?php echo (!empty($row['status'])) ? "btn btn-secondary btn-sm mb-2 disabled" : "btn btn-primary btn-sm mb-2"; ?>"
                                                data-bs-toggle="modal"
                                                data-bs-target="#Terima<?php echo $row['id_list_order'] ?>">Accept</i></button>
                                            <button
                                                class="<?php echo (empty($row['status']) || $row['status'] != 1) ? "btn btn-secondary btn-sm mb-2 disabled text-nowrap" : "btn btn-success btn-sm mb-2 text-nowrap"; ?>"
                                                data-bs-toggle="modal"
                                                data-bs-target="#Ready<?php echo $row['id_list_order'] ?>">Ready</button>
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