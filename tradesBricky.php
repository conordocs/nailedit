<?php
include 'connection/config.php';
$productQuery = "SELECT * FROM products WHERE trade_id = 3";
$productResult = $conn->query($productQuery);
$numRows = $productResult->num_rows;
?>

<!DOCTYPE html>
<html>

<head>
    <title>NailedIt - Bricklayer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <header>
        <?php
        include 'nav&foot/navbar.php';
        ?>
    </header>

    <main class="container container1">
        <div class="products-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-left">
            <h1 class="display-4">Bricklayer:</h1>
            <h5>Have a look at all the products that are suitable for bricklaying.</h5>
        </div>

        <div class="row">
            <?php

            while ($row = $productResult->fetch_assoc()) {
                $productID = $row['id'];
                $name = $row['name'];
                $img = $row['img'];
                $tradeID = $row['trade_id'];

                if ($numRows > 0) {
                    echo "<div class='col-md-4'>
                    <div class='card mb-4 box-shadow'>
                        <a href ='tool.php?tool_id=$productID'><img class='card-img-top' style='background : #fff;' src='img/tools/$img' height='250' alt='img'></a>
                        <div class='card-body'>
                            <h5><b>$name</b></h5>
                            <div class='d-flex justify-content-between align-items-center'>
                                <div class='btn-group'>
                                    <a href='tool.php?tool_id=$productID' class='btn btn-sm btn-outline-default'>View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
                } else {
                    echo "<h1><div class='alert alert-danger d-flex justify-content-center'>Stock Tracking Not Available.</div></h1>";
                } 
            }

            ?>
        </div>
 <?php

 ?>

        </div>
        <div class="products-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-left">
            <h1 class="display-5">Looking for a Bricklayer?</h1>
            <p></p>
            <a class="link-secondary" href="bookAppointment.php">Book an Appointment</a>
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