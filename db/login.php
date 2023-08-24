<?php
include('connection.php');
session_start();

$user = $_POST['Uname'];
$pass = $_POST['Upass'];


$sql = mysqli_query($conn, "SELECT *FROM customers WHERE username = '$user' AND password = '$pass' ");



if ($row = mysqli_fetch_array($sql)) {
    $_SESSION['name'] = $row['username'];
    $_SESSION['id'] = $row['customer_id'];
    header("LOCATION:../home.php");
} else {
    header("LOCATION:../index.php");
}
