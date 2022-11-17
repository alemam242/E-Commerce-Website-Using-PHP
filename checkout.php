<?php
session_start();

if (isset($_SESSION['username'])) {
    include('products.php');
} else {
    include('user_area/checkout_login.php');
}
