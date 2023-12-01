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

<body style="height: 3000px">

    <!--        HEADER      -->

    <nav class="navbar navbar-expand navbar-dark sticky-top" style="background-color: #374252;">

        <!-- <div class="container-fluid"> LEBAR PENUH-->
        <!-- <div class="container"> berukuran tidak penuh, dan letaknya di tengah-->
        <div class="container-lg">
            <!-- fungsi lg = digunakan untuk mengatur grid pada monitor komputer yang berukuran besar -->

            <a class="navbar-brand" href="#"> <i class="bi bi-cup-hot"></i> BluuCafe</a>
            <!--<i class="bi bi-cup-hot"> = icon coffe from getbootstrap.com icon -->

            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <!-- justify-content-end    =    agar navbar berada dibagian kiri-->

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Username
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end mt-2">
                            <!-- dropdown-menu-end   =   agar tidak perlu scroll layar setelah membuka menu Username(akibat layar tidak cukup sehingga memperlukan layar untuk scroll) -->
                            <!-- mt = margin top -->

                            <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Setting</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-door-closed"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--        END OF HEADER   -->


    <div class="container-lg">
        <div class="row">

            <!--        SIDEBAR     -->

            <div class="col-lg-3">

                <nav class="navbar navbar-expand rounded border mt-2" style="background-color: #edeae4;">
                    <div class="container-fluid">

                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                            aria-labelledby="offcanvasNavbarLabel" style="width:250px">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>

                            <div class="offcanvas-body">
                                <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">

                                    <li class="nav-item">
                                        <a class="nav-link active link-light" style="background-color: #374252;"
                                            aria-current="page" href="views/home.php"><i class="bi bi-house-door"></i>
                                            Home</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link link-dark" href="views/order.php"><i class="bi bi-bag-dash"></i>
                                            Order</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link link-dark" href="views/customer.php"><i
                                                class="bi bi-person-fill"></i>
                                            Customer</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link link-dark" href="views/product.php"><i class="bi bi-card-list"></i>
                                            Product</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link link-dark" href="views/report.php"><i
                                                class="bi bi-file-bar-graph"></i>
                                            Report</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                </nav>
            </div>

            <!-- END OF SIDEBAR -->

            <!--    CONTENT     -->

            <div class="col-lg-9 mt-2"> <!-- style="background-color: #f4f3ef;" -->

                <div class="card" style="background-color: #f4f3ef;">
                    <div class="card-header" style="background-color: #edeae4;">
                        Home
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-dark" style="background-color: #374252;">Go somewhere</a>
                    </div>
                </div>

            </div>

            <!--   END OF CONTENT     -->
        </div>

        <!-- FOOTER -->
        <div class="fixed-bottom text-light text-center" style="background-color: #374252;">
            copyright 2023 BluuCafe
        </div>
        <!-- END OF FOOTER -->

    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>