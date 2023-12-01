<!--        SIDEBAR     -->
<div class="container-lg">
    <div class="row">

        <div class="col-lg-3">

            <nav class="navbar navbar-expand rounded  mt-2 bg-tertiary">
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
                                    <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'about') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?>"
                                        href="about"><i class="bi bi-house-door"></i>
                                        About</a>
                                </li>

                                <?php if ($hasil['level'] == 1 || $hasil['level'] == 3) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'menu') ? 'active link-light' : 'link-dark'; ?>"
                                            href="menu"><i class="bi bi-menu-button-wide"></i>
                                            Menu list</a>
                                    </li>
                                <?php } ?>

                                <?php if ($hasil['level'] == 1 || $hasil['level'] == 2 || $hasil['level'] == 3) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'order') ? 'active link-light' : 'link-dark'; ?>"
                                            href="order"><i class="bi bi-bag-dash"></i>
                                            Order</a>
                                    </li>
                                <?php } ?>

                                <?php if ($hasil['level'] == 1 || $hasil['level'] == 4) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'kitchen') ? 'active link-light' : 'link-dark'; ?>"
                                            href="kitchen"><i class="bi bi-fire"></i>
                                            Kitchen</a>
                                    </li>
                                <?php } ?>


                                <!--    LEVER USER ADMIN     -->
                                <?php if ($hasil['level'] == 1) { ?>

                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'user') ? 'active link-light' : 'link-dark'; ?>"
                                            href="user"><i class="bi bi-card-list"></i>
                                            User</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'report') ? 'active link-light' : 'link-dark'; ?>"
                                            href="report"><i class="bi bi-file-bar-graph"></i>
                                            Report</a>
                                    </li>

                                <?php } ?>
                                <!--    END OF LEVER USER ADMIN     -->

                            </ul>
                        </div>
                    </div>
                </div>

            </nav>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>

        <!-- END OF SIDEBAR -->