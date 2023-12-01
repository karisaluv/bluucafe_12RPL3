<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BluuCafe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--link CDN agar icon coffe muncul-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>



<!--        HEADER      -->

<?php
include "controllers/c_koneksi.php";
$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$_SESSION[username_bluucafe]'");
$record = mysqli_fetch_array($query);
?>

<nav class="navbar navbar-expand bg-tertiary navbar-dark sticky-top" style="background-color: #f2f2f2;">

    <!-- <div class="container-fluid"> LEBAR PENUH-->
    <!-- <div class="container"> berukuran tidak penuh, dan letaknya di tengah-->
    <div class="container-lg">
        <!-- fungsi lg = digunakan untuk mengatur grid pada monitor komputer yang berukuran besar -->

        <a class="navbar-brand text-dark" href="."><b><i class="bi bi-cup-hot-fill"></i> BluuCafe</b></a>
        <!--<i class="bi bi-cup-hot"> = icon coffe from getbootstrap.com icon -->

        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link me-3 text-dark ps-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'home') || !isset($_GET['x']))?>"
                        aria-current="page" href="home"><b>Home</b></a>
                </li>
                <!-- justify-content-end    =    agar navbar berada dibagian kiri-->

                <li class="nav-item dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <b><?php echo $hasil['nama']; ?> as
                        <?php
                        if ($hasil['level'] == 1) {
                            echo "Admin";
                        } elseif ($hasil['level'] == 2) {
                            echo "Kasir";
                        } elseif ($hasil['level'] == 3) {
                            echo "Pelayan";
                        } elseif ($hasil['level'] == 4) {
                            echo "Dapur";
                        }

                        ?>
                        <i class="bi bi-person-workspace"></i></b>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end mt-2">
                        <!-- dropdown-menu-end   =   agar tidak perlu scroll layar setelah membuka menu Username(akibat layar tidak cukup sehingga memperlukan layar untuk scroll) -->
                        <!-- mt = margin top -->

                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#ModalUbahProfile"><i class="bi bi-person-circle"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#ModalUbahPassword"><i class="bi bi-key-fill"></i>
                                Change Password</a></li>
                        <li><a class="dropdown-item" href="logout"><i class="bi bi-door-closed"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--        END OF HEADER   -->

<!-- Modal Ubah Password-->

<!-- menggunakan < ? php echo $row['id_user'] ? > agar semua data tampil, tidak hanya row 1 saja -->

<div class="modal fade" id="ModalUbahPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="routers/r_ubah_password.php" method="POST">


                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input disabled type="email" class="form-control" id="floatingInput"
                                    placeholder="name@example.com" name="username" required
                                    value="<?php echo $_SESSION['username_bluucafe'] ?>">
                                <label for="floatingInput">Username</label>
                                <div class="invalid-feedback">
                                    Enter username.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="passwordlama"
                                    required>
                                <label for="floatingInput">Old password</label>
                                <div class="invalid-feedback">
                                    Enter old password.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingInput" name="passwordbaru"
                                    required>
                                <label for="floatingInput">New password</label>
                                <div class="invalid-feedback">
                                    Enter new password.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="repasswordbaru"
                                    required>
                                <label for="floatingInput">Repeat new password</label>
                                <div class="invalid-feedback">
                                    Repeat new password.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="ubah_password_validate" value="123">Save
                            changes</button>


                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- end of modal Ubah Password-->





<!-- Modal Ubah Profile-->

<!-- menggunakan < ? php echo $row['id_user'] ? > agar semua data tampil, tidak hanya row 1 saja -->

<div class="modal fade" id="ModalUbahProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Your profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="routers/r_ubah_profile.php" method="POST">


                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input disabled type="email" class="form-control" id="floatingInput"
                                    placeholder="name@example.com" name="username" required
                                    value="<?php echo $_SESSION['username_bluucafe'] ?>">
                                <label for="floatingInput">Username</label>
                                <div class="invalid-feedback">
                                    Enter username.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPassword" name="nama" required
                                    value="<?php echo $record['nama'] ?>">
                                <label for="floatingInput">Your name</label>
                                <div class="invalid-feedback">
                                    Enter your name.
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" name="mobile" required
                                    value="<?php echo $record['mobile'] ?>">
                                <label for="floatingInput">Your mobile</label>
                                <div class="invalid-feedback">
                                    Enter your mobile.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" style="height:100px" id="floatingInput"
                                    name="alamat" value="<?php echo $record['alamat'] ?>">
                                <label for="floatingInput">Your address</label>
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="ubah_profile_validate" value="123">Save
                            changes</button>


                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- end of modal Ubah Profile-->