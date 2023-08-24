<?php
session_start();

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
            <h1>My Cart</h1>
            <p><?php echo $_SESSION['name']; ?></p>
            <form action="mycart.php" class="btn_form" method="post">
                <button name="logout">Logout</button>
            </form>

            <!-- Logout -->
            <?php if (isset($_POST['logout'])) {
                header("LOCATION:index.php");
                session_destroy();
            } ?>
            <!-- Logout -->

            <form action="home.php" method="post" class="btn_form">
                <button>Back to market</button>
            </form>
        </div>
        <table class="table">

            <tr>
                <th>Item</th>
                <th>Amount</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>


            <?php
            $customerId = $_SESSION['id'];
            include('db/cart_list.php');
            while ($result = mysqli_fetch_array($sql)) {
                $total =  $result['Qty'] * $result['amount']  ?>
                <tr class="products">
                    <td><?php echo $result['item_name']; ?></td>
                    <td><?php echo $result['amount']; ?></td>
                    <td><?php echo $result['Qty']; ?></td>
                    <td><?php echo $total; ?></td>
                    <form action="db/deletecart.php" method="post">
                        <input type="number" hidden name="deleteId" value="<?php echo $result['item_id']; ?>">
                        <td><button>Delete</button></td>
                    </form>

                </tr>
            <?php  } ?>
        </table>

    </div>

</body>

</html>