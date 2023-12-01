<?php

include "controllers/c_koneksi.php";
include_once "views/template/header.php";
include_once "views/template/sidebar.php";

$query = mysqli_query($conn, "SELECT * FROM user");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<!--    CONTENT     -->

<div class="col-lg-9 mt-2"> <!-- style="background-color: #f4f3ef;" -->

    <div class="card bg-light">
        <center><h3 class="mt-2"><b>User Page</b></h3></center>
            <div class="card-body">
                <div class="row">

                <center><p class="card-text mt-3 fs-9">Welcome to the '<b>Website User Menu</b>' at Bluucafe. As an admin, you have full access to manage and organize our website settings. Monitor visitor statistics, control content, and manage user information. We provide efficient tools to ensure an optimal user experience and smooth website operations. Thank you for your dedication in ensuring that Bluucafe remains a captivating online destination.
                    </p></center>

                    <!-- agar button dikanan menggunakan d-flex justify-content-end-->
                    <div class="col d-flex justify-content-end mb-2">
                        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Add
                            User</button>

                    </div>
                </div>

                <!-- Modal Add User-->
                <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add new data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="routers/r_input_user.php"
                                    method="POST">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Your Name" name="nama" required>
                                                <label for="floatingInput">Name</label>
                                                <div class="invalid-feedback">
                                                    Enter name.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="floatingInput"
                                                    placeholder="name@example.com" name="username" required>
                                                <label for="floatingInput">Username</label>
                                                <div class="invalid-feedback">
                                                    Enter username.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" aria-label="Default select example"
                                                    name="level" required>
                                                    <option selected hidden value="">Select User Level</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Kasir</option>
                                                    <option value="3">Pelayan</option>
                                                    <option value="4">Dapur</option>
                                                </select>
                                                <label for="floatingInput">Level User</label>
                                                <div class="invalid-feedback">
                                                    Select user level.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-8">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput"
                                                    placeholder="08xxxxx" name="mobile">
                                                <label for="floatingInput">Mobile</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" id="floatingInput"
                                                    placeholder="Password" disabled value="123" name="password">
                                                <label for="floatingPassword">Password</label>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="form-floating">
                                        <textarea class="form-control" name="alamat" id=""
                                            style="height:100px"></textarea>
                                        <label for="floatingInput">Address</label>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="input_user_validate"
                                            value="123">Save
                                            changes</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- end of modal Add User -->

                <?php

                foreach ($result as $row) {
                    ?>

                    <!-- Modal View-->

                    <!-- menggunakan < ? php echo $row['id_user'] ? > agar semua data tampil, tidak hanya row 1 saja -->

                    <div class="modal fade" id="ModalView<?php echo $row['id_user'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">View detailed data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="routers/r_input_user.php"
                                        method="POST">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput"
                                                        placeholder="Your Name" name="nama"
                                                        value="<?php echo $row['nama'] ?>">
                                                    <label for="floatingInput">Name</label>
                                                    <div class="invalid-feedback">
                                                        Enter name.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="email" class="form-control" id="floatingInput"
                                                        placeholder="name@example.com" name="username"
                                                        value="<?php echo $row['username'] ?>">
                                                    <label for="floatingInput">Username</label>
                                                    <div class="invalid-feedback">
                                                        Enter username.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" aria-label="Default select example"
                                                        required name="level" id="">
                                                        <?php
                                                        $data = array("Admin", "Kasir", "Pelayan", "Dapur");
                                                        foreach ($data as $key => $value) {
                                                            //level dimulai dari 1, 1 gabisa dibandingkan dengan 0 makan ditambahkan +1 karena admin index 1, kasir index 2, pelayan index 3, dapur index 4
                                                            if ($row['level'] == $key + 1) {
                                                                echo "<option selected value='$key'>$value</option>";
                                                            } else {
                                                                echo "<option value='$key'>$value</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="floatingInput">Level User</label>
                                                    <div class="invalid-feedback">
                                                        Select user level.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-8">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput"
                                                        placeholder="08xxxxx" name="mobile"
                                                        value="<?php echo $row['mobile'] ?>">
                                                    <label for="floatingInput">Mobile</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-floating">
                                            <textarea disabled class="form-control" name="alamat" id=""
                                                style="height:100px"><?php echo $row['alamat'] ?></textarea>
                                            <label for="floatingInput">Address</label>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- end of modal view-->





                    <!-- Modal Edit-->

                    <!-- menggunakan < ? php echo $row['id_user'] ? > agar semua data tampil, tidak hanya row 1 saja -->

                    <div class="modal fade" id="ModalEdit<?php echo $row['id_user'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit data
                                        <?php echo $row['nama'] ?>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="routers/r_edit_user.php"
                                        method="POST">
                                        <input type="hidden" value="<?php echo $row['id_user'] ?>" name="id_user">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput"
                                                        placeholder="Your Name" name="nama" required
                                                        value="<?php echo $row['nama'] ?>">
                                                    <label for="floatingInput">Name</label>
                                                    <div class="invalid-feedback">
                                                        Enter name.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <!-- tidak bisa mengedit pada bagian username yang sedang dijalani dibagian table data user-->
                                                    <input <?php echo ($row['username'] == $_SESSION['username_bluucafe']) ? 'disabled' : ''; ?> type="email" class="form-control"
                                                        id="floatingInput" placeholder="name@example.com" name="username"
                                                        required value="<?php echo $row['username'] ?>">
                                                    <label for="floatingInput">Username</label>
                                                    <div class="invalid-feedback">
                                                        Enter username.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" aria-label="Default select example" required
                                                        name="level" id="">
                                                        <?php
                                                        $data = array("admin", "kasir", "pelayan", "dapur");
                                                        foreach ($data as $key => $value) {
                                                            //level dimulai dari 1, 1 gabisa dibandingkan dengan 0 makan ditambahkan +1 karena admin index 1, kasir index 2, pelayan index 3, dapur index 4
                                                            if ($row['level'] == $key + 1) {
                                                                echo "<option selected value=" . ($key + 1) . ">$value</option>";
                                                            } else {
                                                                echo "<option value=" . ($key + 1) . ">$value</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="floatingInput">Level User</label>
                                                    <div class="invalid-feedback">
                                                        Select user level.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-8">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput"
                                                        placeholder="08xxxxx" name="mobile"
                                                        value="<?php echo $row['mobile'] ?>">
                                                    <label for="floatingInput">Mobile</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-floating">
                                            <textarea class="form-control" name="alamat" id=""
                                                style="height:100px"><?php echo $row['alamat'] ?></textarea>
                                            <label for="floatingInput">Address</label>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="input_user_validate"
                                                value="123">Save
                                                changes</button>


                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- end of modal Edit-->



                    <!-- Modal Delete-->

                    <!-- menggunakan < ? php echo $row['id_user'] ? > agar semua data tampil, tidak hanya row 1 saja -->

                    <div class="modal fade" id="ModalDelete<?php echo $row['id_user'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete data user</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="routers/r_delete_user.php"
                                        method="POST">
                                        <input type="hidden" value="<?php echo $row['id_user'] ?>" name="id_user">
                                        <div class="col-lg-12">
                                            <!-- dibuat seperti ini agar kita tidak bisa menghapus akun yang sedang dijalankan -->
                                            <?php
                                            if ($row['username'] == $_SESSION['username_bluucafe']) {
                                                echo "<div class='alert alert-danger'>You cannot delete your own account.</div>";
                                            } else {
                                                echo "Are you sure you want to delete this <b>$row[nama]</b> user";
                                            }
                                            ?>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger" name="input_user_validate"
                                                    value="123" <?php echo ($row['username'] == $_SESSION['username_bluucafe']) ? 'disabled' : ''; ?>>Delete</button>
                                                <!-- Dalam tag PHP, tombol delete tidak berfungsi untuk menghapus akun yang sedang dijalankan -->

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- end of modal Delete-->



                    <!-- Modal Reset PASSword-->

                    <!-- menggunakan < ? php echo $row['id_user'] ? > agar semua data tampil, tidak hanya row 1 saja -->

                    <div class="modal fade" id="ModalResetPassword<?php echo $row['id_user'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reset password user</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="routers/r_reset_password.php"
                                        method="POST">
                                        <input type="hidden" value="<?php echo $row['id_user'] ?>" name="id_user">
                                        <div class="col-lg-12">
                                            <!-- dibuat seperti ini agar kita tidak bisa menghapus akun yang sedang dijalankan -->
                                            <?php
                                            if ($row['username'] == $_SESSION['username_bluucafe']) {
                                                echo "<div class='alert alert-danger'>You cannot reset your own password.</div>";
                                            } else {
                                                echo "Are you sure you want to reset the <b>$row[nama]</b> user password to the default system password (<b>123</b>)";


                                            }
                                            ?>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success" name="input_user_validate"
                                                    value="123" <?php echo ($row['username'] == $_SESSION['username_bluucafe']) ? 'disabled' : ''; ?>>Reset password</button>
                                                <!-- Dalam tag PHP, tombol delete tidak berfungsi untuk menghapus akun yang sedang dijalankan -->

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- end of modal Reset PASSword-->




                <?php } ?>



                <?php
                if (empty($result)) {
                    echo "User data is missing";
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
                                        Name
                                    </th>
                                    <th scope="col">
                                        Username
                                    </th>
                                    <th scope="col">
                                        Level
                                    </th>
                                    <th scope="col">
                                        Mobile
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
                                            <?php echo $row['nama'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['username'] ?>
                                        </td>
                                        <td>

                                            <!-- bagian level seperti ini agar pada table user bukan angka yang tampil -->
                                            <?php
                                            if ($row['level'] == 1) {
                                                echo "Admin";
                                            } elseif ($row['level'] == 2) {
                                                echo "Kasir";
                                            } elseif ($row['level'] == 3) {
                                                echo "Pelayan";
                                            } elseif ($row['level'] == 4) {
                                                echo "Dapur";
                                            }

                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $row['mobile'] ?>
                                        </td>
                                        <td class="d-flex">
                                            <!-- menggunakan < ? php echo $row['id_user'] ? > agar emua data tampil, tidak hanya row 1 saja -->
                                            <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                                                data-bs-target="#ModalView<?php echo $row['id_user'] ?>"> <i
                                                    class="bi bi-eye"></i></button>
                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                                                data-bs-target="#ModalEdit<?php echo $row['id_user'] ?>"><i
                                                    class="bi bi-pencil"></i></button>
                                            <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                                                data-bs-target="#ModalDelete<?php echo $row['id_user'] ?>"><i
                                                    class="bi bi-trash3"></i></button>
                                            <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#ModalResetPassword<?php echo $row['id_user'] ?>"><i
                                                    class="bi bi-key-fill"></i></i></button>
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