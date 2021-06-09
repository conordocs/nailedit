<?php
include 'connection/config.php';

// Selecting faq data
$faqQuery = "SELECT * FROM faq";
$faqResult = $conn->query($faqQuery);
// selecting about us data
$aboutQuery = "SELECT * FROM aboutus";
$aboutResult = $conn->query($aboutQuery);
// selecting information for all shops
$shopQuery = "SELECT * FROM shops";
$shopResult = $conn->query($shopQuery);

?>

<!DOCTYPE html>
<html>

<head>
    <title>NailedIt - About</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
        <div class="container">
            <div class="products-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-left">
                <h1 class="display-4">About Us</h1>
                <h1 class="display-5">Who we are, What we do & Why we do it:</h1>
                <div class="container aboutUs">
                    <div class="row">
                        <div class="col-md-6">
                        <!-- while loop to print out about us information -->
                            <?php
                            while ($row = $aboutResult->fetch_assoc()) {
                                $aboutID = $row['id'];
                                $about = $row['about'];
                                echo "<ul>
                                <li>$about</li>
                            </ul>";
                            }
                            ?>
                        </div>
                        <div class="about-us-img col-md-6 text-center">
                            <img src="img/about us/about us.png" alt="aboutUs.png" name="about-us-img" height="250" margin="auto">
                        </div>
                    </div>


                </div>

            </div>


            <div class='products-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-left'>
                <h1 class='display-5'>Frequently Asked Questions</h1>
                <div class='containter'>
                    <div class='row'>
                        <div class='about-us-img col-md-6 text-center'>
                            <img src='img/about us/faq.jpg' alt='aboutUs.png' name='about-us-img' height="250" margin="auto">
                        </div>
                        <div class='col-md-6'>
                        <!-- while loop to print out FAQ's -->
                            <?php
                            while ($row = $faqResult->fetch_assoc()) {
                                $questionID = $row['id'];
                                $question = $row['question'];
                                $nailedItAns = $row['nailedItAns'];
                                $ansShop1 = $row['ansShop1'];
                                $ansShop2 = $row['ansShop2'];
                                $ansShop3 = $row['ansShop3'];

                                // implementing the information into an accordion so each question will only show answers according to the question.
                                echo "<div id='accordion'>
                                    <div class='card'>
                                        <div class='card-header' id='headingOne'>
                                            <h5 class='mb-0'>
                                            <div class='responsive'>
                                                <button class='btn btn-link collapsed' data-toggle='collapse' data-target='#$questionID' aria-expanded='true' aria-controls='$questionID'>
                                                <p>$question</p>
                                                </button>
                                                </div>
                                            </h5>
                                        </div>

                                        <div id='$questionID' class='collapse' aria-labelledby='headingOne' data-parent='#accordion'>
                                            <div class='card-body'>
                                                <p><b>NailedIT:</b> $nailedItAns</p>
                                                <p><b>Shop 1:</b> $ansShop1</p>
                                                <p><b>Shop 2:</b> $ansShop2</p>
                                                <p><b>Shop 3:</b> $ansShop3</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="products-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-left">
                <h1 class='display-5'>Shops We Work With:</h1>
                <br>
                <h1 class="display-5"> </h1>
                <div class="container aboutUs">
                    <div class="row">
                        <!-- while loop to print out shop address, contact information & opening hours -->
                            <?php
                            while ($row = $shopResult->fetch_assoc()) {
                                $shopID = $row['id'];
                                $name = $row['shop_name'];
                                $address = $row['address'];
                                $number = $row['number'];
                                $email = $row['email'];
                                $monday = $row['monday'];
                                $tuesday = $row['tuesday'];
                                $wednesday = $row['wednesday'];
                                $thursday = $row['thursday'];
                                $friday = $row['friday'];
                                $saturday = $row['saturday'];
                                $sunday = $row['sunday'];
                                $map = $row['map'];

                                // printing into a card to make it look more neat and professional
                                echo "<div class='col-md-6'>
                                        <div class='card mb-4 box-shadow'>
                                            <div class='card-body'>
                                            <h3><b>$name</b></h3>
                                            <b>Address: Click below to see on map</b> <br>
                                                <p><a href='$map'>$address</a></p>
                                                <p><a href='tel:$number'>$number</a></p>
                                                <p><a href='mailto:$email'>$email</a></p>
                                                <b>Opening Hours:</b> <br>
                                                <b>Monday: </b>$monday <br>
                                                <b>Tuesday: </b>$tuesday <br>
                                                <b>Wednesday: </b>$wednesday <br>
                                                <b>Thursday: </b>$thursday <br>
                                                <b>Friday: </b>$friday <br>
                                                <b>Saturday: </b>$saturday <br>
                                                <b>Sunday: </b>$sunday
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>";
                            }
                            ?>
                        
                        <div class='col-md-6'>
                        
                        </div>

                    </div>


                </div>

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