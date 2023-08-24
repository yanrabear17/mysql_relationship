<?php
session_start();

if (isset($_SESSION['name'])) {
    header('LOCATION:home.php');
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Mysql Training Drills</title>
</head>

<body>
    <div class="main">
        <div class="header-title">
            <h1>Login Page</h1>
        </div>
        <form action="db/login.php" class="login-form" method="post">
            <input type="text" placeholder="Username" name="Uname">Username
            <input type="password" placeholder="Password" name="Upass">Password
            <Button name="login">Login</Button></td>
            <Button><a href="create.php"> Register</a></Button></td>
        </form>
        </table>
    </div>
</body>

</html>