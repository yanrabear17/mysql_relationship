<?php

include('connection.php');
$qty = $_POST['itemQty'];
$amount = $_POST['itemAmount'];
$itemId = $_POST['itemId'];
$customerId = $_POST['customerId'];

mysqli_query($conn, "INSERT INTO orders (item_id,quantity,amount,customer_id) VALUES
('$itemId','$qty','$amount','$customerId')");
?>
<script>
    alert('Success add to your cart!');
    window.location = "/mysql_relation_training/home.php";
</script>