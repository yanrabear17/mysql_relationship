<?php

include('connection.php');

$sql = mysqli_query($conn, "SELECT  orders.item_id,products.item_id,SUM(orders.quantity) as Qty,orders.quantity,products.item_name,orders.amount,orders.customer_id,customers.customer_id 
FROM orders JOIN products ON orders.item_id = products.item_id 
            JOIN customers ON orders.customer_id = customers.customer_id 
WHERE orders.customer_id = $customerId GROUP BY orders.item_id  ");