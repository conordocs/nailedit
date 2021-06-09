<?php
include 'connection/config.php';

// pulling form data from search
$search_query = $_GET['search'];

// searching database table where provided search is similar to a specific product
$sql = "SELECT * FROM products WHERE name LIKE '%$search_query%'";

$result = $conn->query($sql);

if (!$result) {

    echo $conn->error;
}

// fetching number of rows
$num_rows = $result->num_rows;

?>
<!DOCTYPE html>
<html>

<head>
    <title>NailedIT - Search</title>
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
            <h1 class="display-4">Product Search</h1>
            <h3 class="display-5">Your search for '<i><?= $search_query; ?></i>' returned:</h3>
        </div>
        <div class='row'>
            <?php

            // if there are greater than 0 records similar to users search print out
            if ($num_rows > 0) {
                // using while loop to fetch any data 
                while ($row = $result->fetch_assoc()) {
                    $productID = $row['id'];
                    $name = $row['name'];
                    $img = $row['img'];

                    echo "<div class='col-md-4'>
                        <div class='card mb-4 box-shadow'>
                            <a href ='tool.php?tool_id=$productID'><img class='card-img-top' src='img/tools/$img' height='250' alt='img'></a>
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
            } else {
                // else print error stating there are no records for the users search
                echo "<div class='col-md-12'>
                <div class='alert alert-danger d-flex justify-content-center'>There are no tools similar to your search for '<i>$search_query</i>'.</div>
                </div>";
            }
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