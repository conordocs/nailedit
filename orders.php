<?php

// session start if user is logged on
if (!isset($_SESSION)) {
    session_start();
}

// if user is not logged on redirect them back to homepage
if (!isset($_SESSION['user_40180801'])) {
    header("Location: index.php");
}
include 'connection/config.php';

// pulling users id data from the session 
$iddata = $_SESSION['user_40180801'];

// selecting the specific users information
$query = "SELECT * FROM users WHERE id = $iddata";
$result = $conn->query($query);

// using while loop to fetch information regarding the correct user
while ($row = $result->fetch_assoc()) {
    $fname = $row["firstName"];
    $lname = $row["lastName"];
    $email = $row["emailAddress"];
    $phone = $row["phoneNumber"];
    $occupation = $row["occupation"];
    $aboutMe = $row["about"];
    $img = $row["img"];
}

// pagination so that only 10 records held per page
$orders_per_page = 10;
$page = '';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$start_from = ($page - 1) * $orders_per_page;

// selecting specific data from 3 different tables using an INNER JOIN
$order_query = "SELECT orders.id, orders.product_id, orders.shop_id, orders.date_ordered, orders.quantity, orders.total, products.name, shops.shop_name
FROM orders 
INNER JOIN products 
ON products.id = orders.product_id 
INNER JOIN shops 
ON shops.id = orders.shop_id
WHERE products.id = orders.product_id 
AND orders.email_address = '$email' ORDER BY orders.id ASC LIMIT $start_from, $orders_per_page";
$order_result = $conn->query($order_query);

?>
<!DOCTYPE html>
<html>

<head>
    <title>NailedIT - Orders</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #5271ff;">
            <img src="img/logo/Don't Just Fix It, Nail IT.png" height="150" alt="logo" style="display: block; margin-left: auto; margin-right: auto;" />
        </nav>

        <?php
        include 'nav&foot/navbar.php';
        ?>

    </header>

    <main class="container container1">

        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <!-- using a table to display users orders -->
            <?php
            echo "<div class='container'>
                <div class='main-body'>
                    <div class='row gutters-sm'>
                        <div class='col-md-12'>
                            <div class='card mb-3'>
                                <div class='card-body'>
                                    <h3><b>$fname's Order's</b></h3>
                                    <br>
                                    <div class='table-responsive'>
                                    <table class='table table-hover'>
                                        <thead>
                                            <th scope='col'>Order</th>
                                            <th scope='col'>Product</th>
                                            <th scope='col'>Quantity</th>
                                            <th scope='col'>Shop</th>
                                            <th scope='col'>Date Ordered</th>
                                            <th scope='col'>Total</th>
                                            </tr>
                                        </thead>";
                                    ?>
                                    <?php
                                    // using while loop to fetch desired data to display on table
                                    while ($row1 = $order_result->fetch_assoc()) {
                                        $order_id = $row1["id"];
                                        $product = $row1["name"];
                                        $quantity = $row1["quantity"];
                                        $shop = $row1["shop_name"];
                                        $total = $row1["total"];
                                        $total = number_format($total, 2);
                                        $order_date = $row1["date_ordered"];
                                        $originalDate = $order_date;
                                        $newDate = date("d-m-Y", strtotime($originalDate));

                                        echo "<tbody>
                                                <tr>
                                                <th scope='row'>#$order_id</th>
                                                <td>$product</td>
                                                <td>$quantity</td>
                                                <td>$shop</td>
                                                <td>$newDate</td>
                                                <td>£$total</td>
                                                
                                                </tr>
                                            </tbody>";
                                            }
                                            echo "</table>";
                                            ?>

                                            <?php

                                            // selecting data to separate it into different pages using pagination
                                            $page_query = "SELECT orders.id, orders.product_id, orders.shop_id, orders.date_ordered, orders.quantity, orders.total, products.name, shops.shop_name
                                            FROM orders 
                                            INNER JOIN products 
                                            ON products.id = orders.product_id 
                                            INNER JOIN shops 
                                            ON shops.id = orders.shop_id
                                            WHERE products.id = orders.product_id 
                                            AND orders.email_address = '$email' ORDER BY orders.id ASC";
                                            $page_result = $conn->query($page_query);
                                            $total_orders = mysqli_num_rows($page_result);
                                            $total_pages = ceil($total_orders / $orders_per_page);

                                            // links to different pages
                                            echo '<ul class="pagination justify-content-center">';
                                            for ($i = 1; $i <= $total_pages; $i++) {
                                                echo '<h5><a class="page-link" href="orders.php?page=' . $i . '">' . $i . '</a></h5>';
                                            }
                                            echo '</ul>';
                                            ?>


                                            <?php
                                echo "</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
            ?>
        </div>
    </main>

    <?php
    include 'nav&foot/footer.php';
    ?>


    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>