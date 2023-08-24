<?php
session_start();
include('db/connection.php');

if (isset($_SESSION['name'])) {
} else {
    header("LOCATION:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Mysql Training Drills</title>
</head>

<body>
    <div class="main">
        <div class="header-title">
            <h1>Home Page</h1>
            <p><?php echo $_SESSION['name']; ?></p>
            <form action="home.php" method="post" class="btn_form">
                <button name="logout">Logout</button>
            </form>
            <form action="mycart.php" method="post" class="btn_form">
                <button>My Cart</button>
            </form>
            <?php if (isset($_POST['logout'])) {
                session_destroy();
                header('LOCATION:index.php');
            } ?>
        </div>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Item</th>
                <th>Amount</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            <?php $sqlProduct = mysqli_query($conn, "SELECT *FROM products");
            while ($row = mysqli_fetch_array($sqlProduct)) { ?>
                <tr class="products">
                    <td><?php echo $row['item_id']; ?></td>
                    <td><?php echo $row['item_name']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <form action="db/usercart.php" method="post">
                        <td><input type="number" required min="1" max="10" name="itemQty" placeholder="QTY"></td>
                        <input type="number" hidden name="itemId" value="<?php echo $row['item_id']; ?>">
                        <input type="number" hidden name="itemAmount" value="<?php echo $row['amount']; ?>">
                        <input type="number" hidden name="customerId" value="<?php echo $_SESSION['id']; ?>">
                        <td><Button id="userCart">Add to cart</Button></td>
                    </form>
                </tr>
            <?php } ?>

        </table>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="js/script.js"> </script>
</body>

</html>