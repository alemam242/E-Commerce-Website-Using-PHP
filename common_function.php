<?php
include('const/connection.php');


function getFeaturedProduct()
{
  global $con;
  $sql = "select * from `feature_product`";
  $res = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_array($res)) {
    $id = $row['id'];
    $product_name = $row['name'];
    $product_image = $row['image'];
    $product_details = $row['details'];
    $product_price = $row['price'];
    echo '<div class="col-4">
      <img style="background:#F1F1F1; float: center;width: 250px;height: 250px;object-fit: cover; object-fit:contain; !important" src=' . $product_image . ' />
      <h4>' . $product_name . '</h4>
      <div class="rating">
        <h5>' . $product_details . '</h5>
      </div>
      <p>' . CURRENCY . '.' . $product_price . '</p>
      <a href="index.php?add_to_cart=' . $id . '" class="btn">Add to cart</a>
    </div>';
  }
}

// fetch item from latest product table
function getLatestProduct()
{
  global $con;
  $sql = "select * from `latest_product`";
  $res = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_array($res)) {
    $id = $row['id'];
    $product_name = $row['name'];
    $product_image = $row['image'];
    $product_details = $row['details'];
    $product_price = $row['price'];
    echo '<div class="col-4">
      <img style="background:#F1F1F1; float: center;width: 250px;height: 250px;object-fit: cover; object-fit:contain; !important" src=' . $product_image . ' />
      <h4>' . $product_name . '</h4>
      <div class="rating">
        <h5>' . $product_details . '</h5>
      </div>
      <p>' . CURRENCY . '.' . $product_price . '</p>
      <a href="index.php?add_to_cart=' . $id . '" class="btn">Add to cart</a>
    </div>';
  }
}

function IteminLatestProduct()
{
  global $con;
  $sql = "select * from `latest_product`";
  $res = mysqli_query($con, $sql);
  $count = mysqli_num_rows($res);

  return $count;
}

function getAllProduct()
{
  global $con;
  $sql = "select * from `product` order by rand()";
  $res = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_array($res)) {
    $id = $row['product_id'];
    $product_name = $row['product_name'];
    $product_image = $row['product_image'];
    $product_details = $row['product_details'];
    $product_price = $row['product_price'];
    echo '<div class="col-4">
      <center><img class="" style="background:#F1F1F1; float: center;width: 250px;height: 250px;object-fit: cover; object-fit:contain; !important" src=' . $product_image . ' /></center>
      <h4>' . $product_name . '</h4>
      <div class=""> 
        <h5>' . $product_details . '</h5>
      </div>
      <p>' . CURRENCY . '.' . $product_price . '</p>
      <div>
      <a href="index.php?add_to_cart=' . $id . '" class="btn">Add to cart</a>
      </div>
    </div>';
  }
}

function AddtoCart()
{
  global $con;
  if (isset($_GET['add_to_cart'])) {
    $product_id = $_GET['add_to_cart'];
    $ip = getIpaddress();
    $quantity = 1;

    $check_sql = "select * from cart_details where product_id='$product_id' and ip_address='$ip'";
    $result = mysqli_query($con, $check_sql);
    $count_row = mysqli_num_rows($result);
    if ($count_row == 0) {

      $sql = "insert into cart_details (product_id,ip_address,quantity) values('$product_id','$ip','$quantity')";
      $res = mysqli_query($con, $sql);
      if ($res) {
        echo "<script>alert('Item added to cart')</script>";
        echo "<script>window.open('products.php','_self')</script>";
        //         echo '<div class="alert alert-success" role="alert">
        //         <strong>Success..<br></strong> Item added to cart
        //  </div>';
      } else {
        die(mysqli_error($con));
      }
    } else {
      echo "<script>alert('This item  is already present inside cart')</script>";
      echo "<script>window.open('products.php','_self')</script>";
      //       echo '<div class="alert alert-warning" role="alert">
      //    <strong>Success..<br></strong> This item  is already present inside cart
      //  </div>';
    }
  }
}

function viewCart()
{
  global $con;
  $ip = getIpaddress();
  $sql = "select * from cart_details where ip_address = '$ip'";
  $res = mysqli_query($con, $sql);
  if ($res) {
    while ($row = mysqli_fetch_assoc($res)) {
      $product_id = $row['product_id'];
      $quantity = $row['quantity'];
      $product_sql = "select * from product where product_id='$product_id'";
      $result = mysqli_query($con, $product_sql);
      while ($product_row = mysqli_fetch_assoc($result)) {
        $image = $product_row['product_image'];
        $name = $product_row['product_name'];
        $price = $product_row['product_price'];
        $total = $price * $quantity;
        echo '<tr>
      <td>
        <div class="cart-info">
          <img style="object-fit:contain" src=' . $image . ' />
          <div>
            <p>' . $name . '</p>
            <small>Price: ' . CURRENCY . '.' . $price . '</small>
            <br />
            <a href="delete_from_cart.php?product_id=' . $product_id . '">Remove</a>
          </div>
        </div>
      </td>
      <td><a href="update.php?product_id=' . $product_id . '"><input name="cart_update" type="number" value=' . $quantity . ' onchange="update_cart()" id="update_quantity"/></a></td>
      <td>' . CURRENCY . '.' . $total . '</td>
    </tr>';
      }
    }
  } else {
    die(mysqli_error($con));
  }
}

function getIpaddress()
{
  //whether ip is from the share internet  
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  //whether ip is from the remote address  
  else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

function ItemInCart()
{
  global $con;
  $ip = getIpaddress();
  $sql = "select * from cart_details where ip_address = '$ip'";
  $res = mysqli_query($con, $sql);
  $count_row = mysqli_num_rows($res);

  return $count_row;
}

function searchItem()
{
  global $con;
  if (isset($_GET['submit'])) {
    $key = $_GET['search'];
    $sql = "select * from product where product_keywords like '%$key%'";
    $res = mysqli_query($con, $sql);
    $num_rows = mysqli_num_rows($res);
    if ($num_rows == 0) {
      echo "<h2 class='text-center text-danger'>No stock for this product</h2>";
    }
    if ($res) {
      while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['product_id'];
        $product_name = $row['product_name'];
        $product_image = $row['product_image'];
        $product_details = $row['product_details'];
        $product_price = $row['product_price'];
        echo '<div class="col-4">
      <img src=' . $product_image . ' />
      <h4>' . $product_name . '</h4>
      <div class="rating">
        <h5>' . $product_details . '</h5>
      </div>
      <p>' . CURRENCY . '.' . $product_price . '</p>
      <a href="index.php?add_to_cart=' . $id . '" class="btn">Add to cart</a>
    </div>';
      }
    } else {
      die(mysqli_error($con));
    }
  }
}


// Profile page
function getUserInfo()
{
  if (isset($_POST['profile'])) {
    echo "<h2>Hello Whats going on</h2>";
  }
}
