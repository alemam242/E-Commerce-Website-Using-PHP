<?php include('common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>RedHut | E-Commerce</title>
  <link rel="stylesheet" href="CSS/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <!-- js for fontawesome kit  -->
  <script src="https://kit.fontawesome.com/f4edef5943.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="header">
    <div class="container">
      <div class="navbar">
        <div class="logo">
          <a href="index.php"><img src="images/logo.png" width="125px" /></a>
        </div>
        <nav>
          <ul id="MenuItems">
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="#contact_us">About</a></li>
            <li><a href="#contact_us">Contact</a></li>
            <!-- <li><a href="account.php">Account</a></li> -->
            <?php
            if (isset($_SESSION['username'])) {
              $username = $_SESSION['username'];
              echo '<li><a href="user_area/profile.php">Hi, ' . $username . '</a></li>';
            } else {
              echo '<li><a href="account.php">Account</a></li>';
            }
            ?>
          </ul>
        </nav>
        <a href="cart.php"><img src="images/cart.png" width="30px" height="30px" /><sup><?php echo ItemInCart(); ?></sup></a>
        <img src="images/menu.png" class="menu-icon" onclick="menutoggle()" />
      </div>
      <div class="row">
        <div class="col-2">
          <h1>
            Browse Our New <br />
            Products
          </h1>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis
            consequuntur ut distinctio quasi similique sed voluptate
            exercitationem. Dolorum, incidunt reiciendis.
          </p>
          <a href="products.php" class="btn">Explore Now &#8594;</a>
        </div>
        <div class="col-2">
          <img src="images/cvr_img.png" />
        </div>
      </div>
    </div>
  </div>

  <?php AddtoCart(); ?>

  <!-- Featured Products -->
  <div class="small-container">
    <h2 class="title">Featured Products</h2>
    <div class="row">
      <?php getFeaturedProduct(); ?>
    </div>

    <!-- Latest Products -->
    <?php
    $count = IteminLatestProduct();
    if ($count > 0) {
      echo '<h2 class="title">Latest Products</h2>';
    }
    ?>
    <div class="row">
      <?php getLatestProduct(); ?>
    </div>

  </div>

  <!-- Offer Products -->
  <div class="offer">
    <div class="small-container">
      <div class="row">
        <div class="col-2">
          <img src="images/exclusive.png" class="offer-img" />
        </div>
        <div class="col-2">
          <p>Exclusively Available on RedStore</p>
          <h1>Smart Band 4</h1>
          <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et
            incidunt ratione a? Nam corporis architecto pariatur, molestias
            ipsam perspiciatis et.</small>
          <a href="index.php?add_to_cart=8" class="btn">Buy Now &#8594;</a>
        </div>
      </div>
    </div>
  </div>

  <?php AddtoCart(); ?>
  <!-- Testimonial -->

  <div class="testimonial">
    <div class="small-container">
      <div class="row">
        <div class="col-3">
          <i class="fa fa-quote-left"></i>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt
            beatae accusantium, consectetur expedita esse iusto vitae,
            reiciendis voluptatibus laboriosam possimus tempore assumenda et
            eos?
          </p>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <img src="images/user-1.png" alt="" />
          <h3>Sean Parker</h3>
        </div>
        <div class="col-3">
          <i class="fa fa-quote-left"></i>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt
            beatae accusantium, consectetur expedita esse iusto vitae,
            reiciendis voluptatibus laboriosam possimus tempore assumenda et
            eos?
          </p>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <img src="images/user-2.png" alt="" />
          <h3>Mike Smith</h3>
        </div>
        <div class="col-3">
          <i class="fa fa-quote-left"></i>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt
            beatae accusantium, consectetur expedita esse iusto vitae,
            reiciendis voluptatibus laboriosam possimus tempore assumenda et
            eos?
          </p>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <img src="images/user-3.png" alt="" />
          <h3>Aka Joe</h3>
        </div>
      </div>
    </div>
  </div>

  <!-- Brands -->
  <div class="brands">
    <div class="small-container">
      <div class="row">
        <div class="col-5">
          <img src="images/logo-godrej.png" />
        </div>
        <div class="col-5">
          <img src="images/logo-oppo.png" />
        </div>
        <div class="col-5">
          <img src="images/logo-coca-cola.png" />
        </div>
        <div class="col-5">
          <img src="images/logo-paypal.png" />
        </div>
        <div class="col-5">
          <img src="images/logo-philips.png" />
        </div>
      </div>
    </div>
  </div>

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
</body>

</html>