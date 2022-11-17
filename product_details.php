<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>All Products - RedHut | E-Commerce</title>
  <link rel="stylesheet" href="CSS/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" />

  <!-- js for fontawesome kit  -->
  <script src="https://kit.fontawesome.com/f4edef5943.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php include('const/header.php'); ?>

  <!-- single product details -->
  <div class="small-container single-product">
    <div class="row">
      <div class="col-2">
        <img src="images/gallery-1.jpg" width="100%" id="ProductImg" />

        <div class="small-img-row">
          <div class="small-img-col">
            <img src="images/gallery-1.jpg" width="100%" class="SmallImg" />
          </div>
          <div class="small-img-col">
            <img src="images/gallery-2.jpg" width="100%" class="SmallImg" />
          </div>
          <div class="small-img-col">
            <img src="images/gallery-3.jpg" width="100%" class="SmallImg" />
          </div>
          <div class="small-img-col">
            <img src="images/gallery-4.jpg" width="100%" class="SmallImg" />
          </div>
        </div>
      </div>
      <div class="col-2">
        <p>Home / T-Shirt</p>
        <h1>Red Printed T-Shirt by HRX</h1>
        <h4>$50.00</h4>
        <select>
          <option>Select Size</option>
          <option>XXL</option>
          <option>XL</option>
          <option>L</option>
          <option>M</option>
          <option>S</option>
        </select>
        <input type="number" value="1" />
        <a href="" class="btn">Add to Cart</a>
        <h3>Product Details <i class="fa fa-indent"></i></h3>
        <br />
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus
          corporis eius at necessitatibus repellendus maiores odio dignissimos
          quis commodi alias!
        </p>
      </div>
    </div>
  </div>

  <!-- Title  -->
  <div class="small-container">
    <div class="row row-2">
      <h2>Related Products</h2>
      <p>View More &#8594;</p>
    </div>
  </div>
  <!-- Products -->

  <div class="small-container">
    <div class="row">
      <div class="col-4">
        <img src="images/product-9.jpg" />
        <h4>Red Printed T-Shirt</h4>
        <div class="rating">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star-o"></i>
        </div>
        <p>$30.00</p>
      </div>
      <div class="col-4">
        <img src="images/product-10.jpg" />
        <h4>Red Printed T-Shirt</h4>
        <div class="rating">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star-o"></i>
        </div>
        <p>$25.00</p>
      </div>
      <div class="col-4">
        <img src="images/product-11.jpg" />
        <h4>Red Printed T-Shirt</h4>
        <div class="rating">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star-o"></i>
        </div>
        <p>$20.00</p>
      </div>
      <div class="col-4">
        <img src="images/product-12.jpg" />
        <h4>Red Printed T-Shirt</h4>
        <div class="rating">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star-o"></i>
        </div>
        <p>$50.00</p>
      </div>
    </div>
  </div>


  <!-- footer  -->
  <?php
  include('const/footer.php');
  include('const/back_to_top.php');
  ?>




  <!-- js for toggle menu -->
  <script>
    var MenuItems = document.getElementById("MenuItems");
    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
      if (MenuItems.style.maxHeight == "0px") {
        MenuItems.style.maxHeight = "200px";
      } else {
        MenuItems.style.maxHeight = "0px";
      }
    }
  </script>

  <!-- js for toggle gallery -->
  <script>
    var ProductImg = document.getElementById("ProductImg");
    var SmallImg = document.getElementsByClassName("SmallImg");

    SmallImg[0].onclick = function() {
      ProductImg.src = SmallImg[0].src;
    };
    SmallImg[1].onclick = function() {
      ProductImg.src = SmallImg[1].src;
    };
    SmallImg[2].onclick = function() {
      ProductImg.src = SmallImg[2].src;
    };
    SmallImg[3].onclick = function() {
      ProductImg.src = SmallImg[3].src;
    };
  </script>
</body>

</html>