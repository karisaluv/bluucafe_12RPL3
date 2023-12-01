<?php

include "controllers/c_koneksi.php";
include_once "views/template/header.php";
include_once "views/template/sidebar.php";

$query = mysqli_query($conn, "SELECT * FROM menu");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<!--    CONTENT     -->

<div class="col-lg-9 mt-2"> <!-- style="background-color: #f4f3ef;" -->

    <div class="card bg-tertiary">
        <div class="card-header bg-tertiary">
            <center><h3 class="mt-2"><b>Menu list</b></h3></center>
            <div class="card-body">
                <div class="row">



                <center><h5 class="card-text mt-3 mb-3 fs-9">Top 5 menus from <b>Bluucafe</b>.</h5></center>
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                            aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                            aria-label="Slide 5"></button>
                    </div>
                    <div class="carousel-inner">                        
                        <div class="carousel-item active">
                            <img src="assets/img/top2.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Top 1 menu</h5>
                                <b><p>Dessert delight</p></b>
                                <p>A delectable treat that combines rich flavors and a touch of elegance. With its luscious blue hue and exquisite taste, this dessert is a true delight for your senses. Indulge in a culinary experience like no other!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/1top.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Top 2 menu</h5>
                                <b><p>Purpe bowl</p></b>
                                <p>Indulge in the natural goodness of our Fruit Bowl Smoothie. A refreshing blend of selected fruits and creamy yogurt, creating a delicious and wholesome experience. Discover the goodness of nature in every delightful bowl!.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/top3.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Top 3 menu</h5>
                                <b><p>Blue pinkish mocktail</p></b>
                                <p>Experience the unique flavor of our Blue Pinkish Mocktail! The refreshing blend of blue curaçao with a hint of sweetness from pink syrup creates a classy and revitalizing drink. Enjoy the harmony of colors and delight in every sip. Serve refreshment with style!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/top4.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Top 4 menu</h5>
                                <b><p>Blue cake</p></b>
                                <p>Indulge in the elegance of our Blue Cake featuring smooth white cream and luscious black cherries. This delightful creation combines rich flavors with a visually appealing contrast. Experience the perfect balance of sweetness and sophistication in every slice!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/top5.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Top 5 menu</h5>
                                <b><p>Blue burger</p></b>
                                <p>Experience bold flavors with our Blue Burger – a savory delight featuring a juicy blue-colored patty, complemented by a medley of fresh toppings. Dive into a culinary adventure that combines innovation and taste, creating a burger experience like no other.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                
                    <center><p class="text mt-5 fs-9">Welcome to the Flavor Fiesta at <b>BluuCafe</b>, where every dish is a tale of unforgettable tastes! Dive into the mystery of our Blue Burger with its tantalizing blue-colored patty or indulge in the soft and elegant sensation of our Blue Cake adorned with white cream and black cherries. Let's turn each of your visits into an extraordinary culinary adventure at <b>BluuCafe</b>. Let's savor the extraordinary flavors together!</p></center>

                    <!-- agar button dikanan menggunakan d-flex justify-content-end-->
                    <div class="col d-flex justify-content-end mb-2">
                        <button class="btn btn-dark mb-2" data-bs-toggle="modal" data-bs-target="#ModalTambahMenu">Add
                            Menu</button>

                    </div>
                </div>

                
                <!-- Modal Add Menu-->
                <div class="modal fade" id="ModalTambahMenu" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add new menu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                                <!-- ditambahkan enctype="multipart/form-data" khusus untuk form mengupload file-->
                                <form class="needs-validation" novalidate action="routers/r_input_menu.php"
                                    method="POST" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group mb-3">
                                                <!-- m = margin -->
                                                <input type="file" class="form-control py-3" id="uploadFoto"
                                                    placeholder="Your Name" name="foto" required>
                                                <label class="input-group-text" for="uploadFoto">Upload photo
                                                    menu</label>
                                                <div class="invalid-feedback">
                                                    Enter photo file menu.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Menu name" name="nama_menu" required>
                                                <label for="floatingInput">Menu name</label>
                                                <div class="invalid-feedback">
                                                    Enter the menu name.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                    placeholder="Information" name="keterangan" required>
                                                <label for="floatingPassword">Information</label>
                                                <div class="invalid-feedback">
                                                    Enter menu information.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="kategori" required>
                                                        <option selected hidden value="">Select menu category</option>
                                                        <option value="1">Coffe</option>
                                                        <option value="2">Tea</option>
                                                        <option value="3">Milk</option>
                                                        <option value="4">Latte</option>
                                                        <option value="5">Sweet</option>
                                                        <option value="6">Fresh</option>
                                                        <option value="7">Cake</option>
                                                        <option value="8">Bread</option>
                                                        <option value="9">Snacks</option>
                                                        <option value="10">Meals</option>
                                                    </select>
                                                    <label for="floatingInput">Menu category</label>
                                                    <div class="invalid-feedback">
                                                        Select menu category.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput"
                                                        placeholder="Price" name="harga" required>
                                                    <label for="floatingPassword">Price</label>
                                                    <div class="invalid-feedback">
                                                        Enter menu price.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput"
                                                        placeholder="Stock" name="stok" required>
                                                    <label for="floatingPassword">Stock</label>
                                                    <div class="invalid-feedback">
                                                        Enter stock menu.
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="input_menu_validate"
                                            value="123">Add</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- end of modal Add menu -->

                <?php

                foreach ($result as $row) {
                    ?>

                    <!-- Modal View Menu-->


                    <!-- menggunakan < ? php echo $row['id_menu'] ? > agar semua data tampil, tidak hanya row 1 saja -->

                    <div class="modal fade" id="ModalViewMenu<?php echo $row['id_menu'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">View menu</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="routers/r_input_menu.php"
                                        method="POST">

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput"
                                                        placeholder="Menu name" name="nama_menu"
                                                        value="<?php echo $row['nama_menu'] ?>">
                                                    <label for="floatingInput">Menu name</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-9">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput"
                                                        placeholder="Information" name="keterangan"
                                                        value="<?php echo $row['keterangan'] ?>">
                                                    <label for="floatingPassword">Information</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" aria-label="Default select example"
                                                        name="level" id="">
                                                        <?php
                                                        $data = array("Coffe", "Tea", "Milk", "Latte", "Sweet", "Fresh", "Cake", "Bread", "Snacks", "Meals");
                                                        foreach ($data as $key => $value) {
                                                            //level dimulai dari 1, 1 gabisa dibandingkan dengan 0 makan ditambahkan +1 karena admin index 1, kasir index 2, pelayan index 3, dapur index 4
                                                            if ($row['kategori'] == $key + 1) {
                                                                echo "<option selected value='$key'>$value</option>";
                                                            } else {
                                                                echo "<option value='$key'>$value</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="floatingInput">Menu category</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput"
                                                        placeholder="Price" name="harga"
                                                        value="<?php echo $row['harga'] ?>">
                                                    <label for="floatingPassword">Price</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput"
                                                        placeholder="Stock" name="stok" value="<?php echo $row['stok'] ?>">
                                                    <label for="floatingPassword">Stock</label>
                                                </div>
                                            </div>

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





                    <!-- Modal Edit Menu-->

                    <!-- menggunakan < ? php echo $row['id_menu'] ? > agar semua data tampil, tidak hanya row 1 saja -->

                    <div class="modal fade" id="ModalEdit<?php echo $row['id_menu'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit menu
                                        <?php echo $row['nama_menu'] ?>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">

                                    <!-- ditambahkan enctype="multipart/form-data" khusus untuk form mengupload file-->
                                    <form class="needs-validation" novalidate action="routers/r_edit_menu.php" method="POST"
                                        enctype="multipart/form-data">
                                        <input type="hidden" value="<?php echo $row['id_menu'] ?>" name="id_menu">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <!-- m = margin -->
                                                    <input type="file" class="form-control py-3" id="uploadFoto"
                                                        placeholder="Your Name" name="foto" required>
                                                    <label class="input-group-text" for="uploadFoto">Upload photo
                                                        menu</label>
                                                    <div class="invalid-feedback">
                                                        Enter photo file menu.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput"
                                                        placeholder="Menu name" name="nama_menu" required
                                                        value="<?php echo $row['nama_menu'] ?>">
                                                    <label for="floatingInput">Menu name</label>
                                                    <div class="invalid-feedback">
                                                        Enter the menu name.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput"
                                                        placeholder="Information" name="keterangan" required
                                                        value="<?php echo $row['keterangan'] ?>">
                                                    <label for="floatingPassword">Information</label>
                                                    <div class="invalid-feedback">
                                                        Enter menu information.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" aria-label="Default select example"
                                                            required name="kategori" id="">
                                                            <?php
                                                            $data = array("Coffe", "Tea", "Milk", "Latte", "Sweet", "Fresh", "Cake", "Bread", "Snacks", "Meals");
                                                            foreach ($data as $key => $value) {
                                                                //level dimulai dari 1, 1 gabisa dibandingkan dengan 0 makan ditambahkan +1 karena admin index 1, kasir index 2, pelayan index 3, dapur index 4
                                                                if ($row['kategori'] == $key + 1) {
                                                                    echo "<option selected value=" . ($key + 1) . ">$value</option>";
                                                                } else {
                                                                    echo "<option value=" . ($key + 1) . ">$value</option>";
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <label for="floatingInput">Menu category</label>
                                                        <div class="invalid-feedback">
                                                            Select menu category.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput"
                                                            placeholder="Price" name="harga" required
                                                            value="<?php echo $row['harga'] ?>">
                                                        <label for="floatingPassword">Price</label>
                                                        <div class="invalid-feedback">
                                                            Enter menu price.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput"
                                                            placeholder="Stock" name="stok" required
                                                            value="<?php echo $row['stok'] ?>">
                                                        <label for="floatingPassword">Stock</label>
                                                        <div class="invalid-feedback">
                                                            Enter stock menu.
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>


                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="input_menu_validate"
                                                value="123">Save Change</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                    <!-- end of modal Edit Menu-->



                    <!-- Modal Delete-->

                    <!-- menggunakan < ? php echo $row['id_menu'] ? > agar semua data tampil, tidak hanya row 1 saja -->

                    <div class="modal fade" id="ModalDelete<?php echo $row['id_menu'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete menu</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="routers/r_delete_menu.php"
                                        method="POST">
                                        <input type="hidden" value="<?php echo $row['id_menu'] ?>" name="id_menu">
                                        <div class="col-lg-12">
                                            <?php

                                            echo "Are you sure you want to delete this <b>$row[nama_menu]</b> menu";

                                            ?>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger" name="input_menu_validate"
                                                    value="123">Delete</button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- end of modal Delete-->




                <?php } ?>



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
                                        Menu Photo
                                    </th>
                                    <th scope="col">
                                        Menu Name
                                    </th>
                                    <th scope="col">
                                        Information
                                    </th>
                                    <th scope="col">
                                        Category
                                    </th>
                                    <th scope="col">
                                        Price
                                    </th>
                                    <th scope="col">
                                        Stock
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
                                            <div style="width: 90px">
                                            </div>
                                            <img src="assets/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="...">
                                        </td>
                                        <td>
                                            <?php echo $row['nama_menu'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['keterangan'] ?>
                                        </td>
                                        <td>

                                            <!-- bagian kategori seperti ini agar pada table kategori bukan angka yang tampil -->
                                            <?php
                                            if ($row['kategori'] == 1) {
                                                echo "Coffe";
                                            } elseif ($row['kategori'] == 2) {
                                                echo "Tea";
                                            } elseif ($row['kategori'] == 3) {
                                                echo "Milk";
                                            } elseif ($row['kategori'] == 4) {
                                                echo "Latte";
                                            } elseif ($row['kategori'] == 5) {
                                                echo "Sweet";
                                            } elseif ($row['kategori'] == 6) {
                                                echo "Fresh";
                                            } elseif ($row['kategori'] == 7) {
                                                echo "Cake";
                                            } elseif ($row['kategori'] == 8) {
                                                echo "Bread";
                                            } elseif ($row['kategori'] == 9) {
                                                echo "Snacks";
                                            } elseif ($row['kategori'] == 10) {
                                                echo "Meals";
                                            }

                                            ?>
                                        </td>
                                        <td>
                                            <?php echo number_format($row['harga'], 0, ',', '.') ?>
                                        </td>
                                        <td>
                                            <?php echo $row['stok'] ?>
                                        </td>
                                        <td>
                                            <!-- menggunakan < ? php echo $row['id_menu'] ? > agar emua data tampil, tidak hanya row 1 saja -->
                                            <button class="btn btn-info btn-sm mb-2" data-bs-toggle="modal"
                                                data-bs-target="#ModalViewMenu<?php echo $row['id_menu'] ?>"><i
                                                    class="bi bi-eye"></i></button>
                                            <button class="btn btn-warning btn-sm mb-2" data-bs-toggle="modal"
                                                data-bs-target="#ModalEdit<?php echo $row['id_menu'] ?>"><i
                                                    class="bi bi-pencil"></i></button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#ModalDelete<?php echo $row['id_menu'] ?>"><i
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