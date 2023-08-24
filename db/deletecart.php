<?php
include('connection.php');
$orderId = $_POST['deleteId'];

mysqli_query($conn, "DELETE FROM orders WHERE item_id = $orderId");


header("LOCATION:../mycart.php");
