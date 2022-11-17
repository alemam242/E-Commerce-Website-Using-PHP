<?php
include('common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cart - RedHut | E-Commerce</title>
  <link rel="stylesheet" href="CSS/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" />


  <!-- js for fontawesome kit  -->
  <script src="https://kit.fontawesome.com/f4edef5943.js" crossorigin="anonymous"></script>

  <!--  -->
  <!--  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
    /* Button used to open the contact form - fixed at the bottom of the page */
    .open-button {
      background-color: #555;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      opacity: 0.8;
      position: fixed;
      bottom: 23px;
      right: 28px;
      width: 280px;
      /* height: 280px; */
    }

    /* The popup form - hidden by default */
    .form-popup {
      /* display: none; */
      display: flex;
      justify-content: center;
      align-items: center;
      /* position: fixed; */
      bottom: 0;
      right: 15px;
      /* border: 3px solid #f1f1f1; */
      z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
      max-width: 300px;
      padding: 10px;
      background-color: white;
    }

    /* Full-width input fields */
    .form-container input[type=text],
    .form-container input[type=password] {
      width: 100%;
      height: 50px;
      padding: 15px;
      margin: 10px 0 10px 0;
      border: 3px solid white;
      border-radius: 10px;
      background: #f1f1f1;
    }

    .form-container input[placeholder="Username"],
    .form-container input[placeholder="Password"] {
      font-size: small;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus,
    .form-container input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Set a style for the submit/login button */
    .form-container .btn {
      background-color: #04AA6D;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      height: 50px;
      margin-bottom: 10px;
      opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
      background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover,
    .open-button:hover {
      opacity: 1;
    }

    .row h3 {
      font-size: medium;
    }
  </style>
  <!--  -->
  <!--  -->
</head>

<body>
  <?php include('const/header.php'); ?>



  <!-- Cart items details -->
  <div class="small-container cart-page">
    <table>
      <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Subtotal</th>
      </tr>
      <?php viewCart(); ?>

      <script>
        let q = document.getElementById('update_quantity');
        document.cookie = "quantity = " + (-9999999);

        function update_cart() {
          document.cookie = "quantity = " + q.value;
        }
      </script>
      <!-- <tr>
        <td>
          <div class="cart-info">
            <img src="images/buy-1.jpg" />
            <div>
              <p>Red Printed T-shirt</p>
              <small>Price: $50.00</small>
              <br />
              <a href="">Remove</a>
            </div>
          </div>
        </td>
        <td><input type="number" value="1" /></td>
        <td>$50.00</td>
      </tr> -->
    </table>
    <?php
    $ip = getIpaddress();
    $sql = "select * from cart_details where ip_address = '$ip'";
    $res = mysqli_query($con, $sql);
    $count_row = mysqli_num_rows($res);
    $stotal = 0;
    // $tax = $count_row * 10;
    $tax = 0;
    $subtotal = 0;
    $total_quantity = 0;
    if ($res) {
      while ($row = mysqli_fetch_assoc($res)) {
        $product_id = $row['product_id'];
        $quantity = $row['quantity'];
        $total_quantity += $quantity;
        $product_sql = "select * from product where product_id='$product_id'";
        $result = mysqli_query($con, $product_sql);
        while ($product_row = mysqli_fetch_assoc($result)) {
          $image = $product_row['product_image'];
          $name = $product_row['product_name'];
          $price = $product_row['product_price'];
          $total = $price * $quantity;
          $stotal += $total;
        }
      }
      $tax = $total_quantity * 10;
      $subtotal = $stotal + $tax;
    } else {
      die(mysqli_error($con));
    }
    ?>
    <div class="total-price">
      <table>
        <tr>
          <td>SubTotal</td>
          <td><?php echo '' . CURRENCY . '.' . $stotal . ''; ?></td>
        </tr>
        <tr>
          <td>Tax</td>
          <td><?php echo '' . CURRENCY . '.' . $tax . ''; ?></td>
        </tr>
        <tr>
          <td>SubTotal</td>
          <td><?php echo '' . CURRENCY . '.' . $subtotal . ''; ?></td>
        </tr>
        <tr>
          <?php
          $session = false;
          if (isset($_SESSION['username'])) {
            $session = true;
          }
          $cart_item = ItemInCart();

          if ($cart_item > 0) {

            if (!isset($_SESSION['username'])) {
              echo '<td><a href="products.php" class="btn">Shopping</a></td>
            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="border:none; !important">Checkout</button></td>';
            } else {
              echo '<td><a href="products.php" class="btn">Shopping</a></td>
             <td><a href="payment.php" class="btn">Checkout</a></td>';
            }

            // echo '<td><a href="products.php" class="btn">Shopping</a></td>
            // <td><a href="checkout.php" class="btn">Checkout</a></td>';
          } else {
            echo '<td><a href="products.php" class="btn">Shopping</a></td>';
          }
          ?>
          <!-- <td><a href="products.php" class="btn">Shopping</a></td>
          <td><a href="checkout.php" class="btn">Checkout</a></td> -->
        </tr>
      </table>
    </div>
  </div>

  <!--  -->
  <!--  -->
  <!--  -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!-- <div class="modal-dialog"> -->
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-popup" id="myForm">
            <form action="user_area/checkout_login.php" class="form-container" method="post">
              <h1>Login</h1>

              <input type="text" placeholder="Username" name="username" required>

              <input type="password" placeholder="Password" name="password" required>

              <button type="submit" class="btn" name="Login">Login</button>
              <a href="">Forgot password?</a>
              <a href="account.php"><button type="button" class="btn cancel">Go For Registration</button></a>
            </form>
          </div>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


  <script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
      myInput.focus()
    })
  </script>
  <!--  -->
  <!--  -->
  <!--  -->



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

  <!-- footer  -->
  <?php
  include('const/footer.php');
  include('const/back_to_top.php');
  ?>

</body>

</html>