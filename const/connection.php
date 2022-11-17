<?php
define("CURRENCY", "৳");

$server = "localhost";
$username = "root";
$password = "";
$db = "ecommerce_app";

$con = mysqli_connect($server, $username, $password, $db);

if (!$con) {
   die("Connection Failed" . mysqli_connect_error());
}
