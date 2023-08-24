<?php

include('connection.php');

$firstname = $_POST['u_fname'];
$lastname = $_POST['u_lname'];
$age = $_POST['u_age'];
$country = $_POST['u_country'];
$username = $_POST['u_username'];
$password = $_POST['u_password'];

$sql = mysqli_query($conn, "INSERT INTO customers(first_name, last_name, age, country, username, password)
VALUES ('$firstname','$lastname','$age','$country','$username','$password')");


header('LOCATION:../index.php');
