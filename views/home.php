<?php

include "controllers/c_koneksi.php";
include_once "views/template/header.php";
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Home - BluuCafe</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">




    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
</head>

<body>
    <main>

        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/cafehome.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption text-start">
                        <h1>BluuCafe: A Culinary Haven in Nature's Embrace</h1>
                        <p class="opacity-75">Indulge in the perfect symphony of flavors and tranquility at BluuCafe. Our sanctuary atop mesmerizing mountains, accompanied by the soothing serenade of the sea, creates a dining experience like no other. Welcome to BluuCafe, where every sip tells a story, and each corner unveils a scenic masterpiece. </p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Marketing messaging and featurettes
      ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->

            <div class="row">
                <center>
                    <div class="col-lg-6 mt-5 mb-5">
                        <a class="text-dark fs-1" href="."><b><i class="bi bi-cup-hot-fill"></i>
                            </b></a>
                        <h2 class="fw-normal">BluuCafe</h2>
                        <p>Welcome <b>
                                <?php echo $hasil['nama']; ?>
                            </b> to BluuCafe, where every employee is a cornerstone of our success! With your
                            arrival, the BluuCafe family is now more complete. We believe that you bring positive
                            energy and valuable contributions to create an extraordinary atmosphere here. Let's
                            weave success stories together, give our best, and make every customer experience at
                            BluuCafe truly special. <b>Congratulations on starting your journey with us, and let's
                                achieve peak achievements together</b>!</p>
                        <p><a class="btn btn-secondary" href="about">Go in &raquo;</a></p>
                    </div>
                </center>
            </div>
            <!-- /.row -->


            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 mb-3 mt-3">
                    <h2 class="featurette-heading fw-normal lh-1">BluuCafe: <span class="text-body-secondary">A
                            Tapestry
                            Woven in the Shadows of Majestic Mountains and Luminous Coastal Sunsets.</span></h2><br>
                    <p class="lead">BluuCafe is more than just a cafe; it is a work of art inspired by the beauty of
                        nature. Standing majestically at the mountain peaks, BluuCafe offers an unforgettable
                        experience
                        beneath the clear and bright blue sky.</p>

                    <p><a class="btn btn-secondary" href="sejarah">More &raquo;</a></p>
                </div>
                <div class="col-md-5 ">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="1"
                        height="1" xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice"
                        focusable="false">
                        <img src="assets/img/satu.jpg" class="d-block w-100" alt="...">
                    </svg>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2 mb-3 mt-3">
                    <h2 class="featurette-heading fw-normal lh-1">BluuCafe <span
                            class="text-body-secondary">address.</span></h2>
                    <br>
                    <p class="lead">BluuCafe, Nature's Beauty and Sea Views in Every Sip</p>

                    <p>BluuCafe invites you to a special coffee destination, situated at an elevation with
                        breathtaking views of the expansive sea. Here is the complete address:</p>

                    <h6>Address:</h6>
                    <p><i>Happy Peak Street No. 456<br>Cool Green Village, Blue District<br>Postal Code: 67890</i>
                    </p>
                    <br>
                    <p>BluuCafe offers more than just a cup of high-quality coffee; it provides a stunning seascape
                        from every angle. Strategically located on the coastal tourism route, BluuCafe seamlessly
                        combines the beauty of mountainous landscapes with the allure of the rolling waves. Welcome
                        to BluuCafe, where the aroma of coffee and the beauty of the sea unite in an unforgettable
                        coffee experience.</p>
                </div>
                <div class="col-md-5 order-md-1 mb-3 mt-3">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="1"
                        height="1" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <img src="assets/img/lokasi.png" class="d-block w-100" alt="...">
                    </svg>
                </div>
            </div>

            <hr class="featurette-divider">


            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->


        <!-- FOOTER -->
        <footer class="container">
            <p class="float-end fs-3 mt-5 "><a href="#"><i class="bi bi-file-arrow-up"></i></a></p>
            <p>&copy; 2023 BluuCafe, Inc. &middot;</p>
        </footer>
    </main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>