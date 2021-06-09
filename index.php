<?php
include 'connection/config.php';

// selecting 'hot items' from products
$productQuery = "SELECT * FROM products WHERE hot_item = TRUE";
$productResult = $conn->query($productQuery);
?>
<!DOCTYPE html>
<html>

<head>
    <title>NailedIT</title>
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

        <div class="products-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-left">
            <div class="row">
                <div class='col-md-6'>
                    <h1 class="display-3">NailedIT</h1>
                    <h1 class="display-5">Quickly find what you are looking for and compare prices.</h1>
                </div>
                <div class='index-img img-fluid col-md-6 text-center'>
                    <img name="index-img" src="img/index/hardwaretools.jpg" alt="homepageLogo" height="250" margin="auto">
                </div>
            </div>
            <br>
            <div class='row'>
                <div class='col-md-5'>
                <!-- search for product -->
                    <form action="search.php" class="form-inline my-2 my-lg-0" method="GET">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn search_btn my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
                <div class='col-md-7'>


                </div>


            </div>
            <div class="products-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1 class="display-4">Hot Items</h1>
            </div>
            <div class='row'>
                <?php

                // using while loop to fetch 'hot items'
                while ($row = $productResult->fetch_assoc()) {
                    $productID = $row['id'];
                    $name = $row['name'];
                    $img = $row['img'];

                    // displaying them in cards to made it look professional along with a 'Hot Item' ribbon
                    echo "<div class='col-md-4' style='background: #fff;'>
                        <div class='card mb-4 box-shadow' style='background: #fff;'>
                            <div class='ribbon-corner'><b><p>Hot Item!</p></b>
                                <a href ='tool.php?tool_id=$productID'><img class='card-img-top' style='background: #fff;' src='img/tools/$img' height='250' alt='img'></a>
                                <div class='card-body'>
                                    <h5><b>$name</b></h5>
                                    <div class='d-flex justify-content-between align-items-center'>
                                        <div class='btn-group'>
                                            <a href='tool.php?tool_id=$productID' class='btn btn-sm btn-outline-default'>View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>
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