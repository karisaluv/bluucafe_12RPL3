<?php

include "controllers/c_koneksi.php";
include_once "views/template/header.php";
include_once "views/template/sidebar.php";
?>

<!--    CONTENT     -->


<div class="col mt-2"> <!-- style="background-color: #f4f3ef;" -->

  <div class="row">
    <center>
      <div class="col-lg-5 mt-2 mb-2">
        <a class="text-dark fs-1" href="."><b><i class="bi bi-cup-hot-fill"></i>
          </b></a>
        <h2 class="fw-normal">BluuCafe</h2>
        <p>Welcome <b>
            <?php echo $hasil['nama']; ?>
          </b> to the <b>BluuCafe</b> Management Portal. This is where our employees can efficiently
          handle menus, bookings, and reports with ease. Get ready to create an exceptional customer
          experience. <b>Happy working</b>!</p>
      </div>
    </center>
  </div>

  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/img/cafe2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="assets/img/sunset.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="text bg-light mt-3 rounded border">

    <center>
      <h3 class="mt-2"><b>About BluuCafe</b></h3>
    </center>

    <p class="text mt-3 text-center">
      BluuCafe is a unique blend of a cozy cafe and the beauty of nature. Nestled at the peak of stunning mountains,
      BluuCafe offers a culinary experience accompanied by awe-inspiring sea views. We believe that the delight of
      coffee and delicious dishes becomes even more special when enjoyed amidst the breathtaking beauty of nature.</p>

    <h6 class="text ms-2">Natural Beauty</h6>

    <p class="text ms-4 me-4"><b>1. Stunning Sea Views:</b> From every corner of BluuCafe, you'll be treated to a breathtaking panorama of the sea. Enjoy
      a cup of warm coffee while gazing at the crashing waves and the vast blue expanse of the sea.<br>

       <b>2. Mountain Sunset:</b> As dusk approaches, the mountain peak transforms into a perfect backdrop for a romantic and
      magical atmosphere. The serene and enchanting ambiance sets the stage for special moments.</p>

      <h6 class="text ms-2">BluuCafe Experience</h6>

      <p class="text ms-4 me-4"><b>1. Love-Infused Coffee:</b> We serve high-quality coffee from carefully selected beans, presented with skill and love. Each sip is a captivating journey of flavors.<br>

       <b>2. Irresistibly Creative Menu:</b> Our menu is designed to pamper your taste buds. Delicious dishes with creative flair offer an unforgettable culinary experience.</p>

       <h6 class="text ms-2">Our Mission</h6>

    <p class="text ms-4 me-4">BluuCafe's mission is not just about serving quality coffee and food; it's also about connecting our guests with the beauty of nature. We are committed to being a destination that uplifts spirits and inspires every visitor.</p>

    <h5 class="text ms-2">Visit BluuCafe, Revel in Nature's Peak Delights</h5>

    <p class="text ms-4 me-4">BluuCafe is not just a cafe; it's a place where you can experience the beauty of nature while savoring quality coffee and cuisine. Join us at BluuCafe, where the sunset sky meets the mountain peak and the captivating sea. Enjoy an unforgettable experience at BluuCafe!</p><br><br><br>

  </div>

</div>

<!--   END OF CONTENT     -->

</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>

<?php
include_once "views/template/footer.php";
?>