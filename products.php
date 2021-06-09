<?php
include 'connection/config.php';

// pagination to display a total of 6 products per page
$products_per_page = 6;
$page = '';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$start_from = ($page - 1) * $products_per_page;

$productQuery = "SELECT * FROM products ORDER BY id ASC LIMIT $start_from, $products_per_page";
$productResult = $conn->query($productQuery);


?>
<!DOCTYPE html>
<html>

<head>
    <title>NailedIt - Products</title>
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
            <h1 class="display-4">Products:</h1>
            <h5>Have a look at all the products that we track.</h5>
        </div>

        <div class="row">

            <?php

            // using while loop to fetch details of each product and display them in cards for a more professional look
            while ($row = $productResult->fetch_assoc()) {
                $productID = $row['id'];
                $name = $row['name'];
                $img = $row['img'];
                $tradeID = $row['trade_id'];

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
            }




            ?>


        </div>
        <?php

        // pageination continueing
        $page_query = "SELECT * FROM products ORDER BY id ASC";
        $page_result = $conn->query($page_query);
        $total_records = mysqli_num_rows($page_result);
        $total_pages = ceil($total_records / $products_per_page);

        echo '<ul class="pagination justify-content-center">';
        for ($i = 1; $i <= $total_pages; $i++) {
            echo '<h5><a class="page-link" href="products.php?page=' . $i . '">' . $i . '</a></h5>';
        }
        echo'</ul>';
        ?>

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