<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'connection/config.php';

// fetching specific tool information using tool id
$toolID = htmlentities($_GET["tool_id"]);

// 
$productQuery = "SELECT * FROM products WHERE products.id = $toolID";
$productResult = $conn->query($productQuery);
$s1Query = "SELECT * FROM shop1products WHERE product_id = $toolID";
$s1Result = $conn->query($s1Query);
$s2Query = "SELECT * FROM shop2products WHERE product_id = $toolID";
$s2Result = $conn->query($s2Query);
$s3Query = "SELECT * FROM shop3products WHERE product_id = $toolID";
$s3Result = $conn->query($s3Query);
$num1 = $s1Result->num_rows;
$num2 = $s2Result->num_rows;
$num3 = $s3Result->num_rows;

while ($row = $productResult->fetch_assoc()) {
    $productID = $row['id'];
    $name = $row['name'];
    $des = $row['description'];
    $img = $row['img'];
    $tradeID = $row['trade_id'];
}
while ($row1 = $s1Result->fetch_assoc()) {
    $price1 = $row1['price'];
    $userPrice1 = $row1['userPrice'];
    $available1 = $row1['quantity'];
}
while ($row2 = $s2Result->fetch_assoc()) {
    $price2 = $row2['price'];
    $userPrice2 = $row2['userPrice'];
    $available2 = $row2['quantity'];
}
while ($row3 = $s3Result->fetch_assoc()) {
    $price3 = $row3['price'];
    $userPrice3 = $row3['userPrice'];
    $available3 = $row3['quantity'];
}
// Posting review to data base
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
$POSTI = filter_var_array($_POST, FILTER_SANITIZE_NUMBER_INT);

if (isset($POST['starRate'])) {
    $starRate = mysqli_real_escape_string($conn, $POSTI['starRate']);
    $rateMsg = mysqli_real_escape_string($conn, $POST['rateMsg']);
    $date = mysqli_real_escape_string($conn, $POST['date']);
    $userName = mysqli_real_escape_string($conn, $POST['name']);
    $userEmail = mysqli_real_escape_string($conn, $POST['email']);


    $sql = $conn->prepare("SELECT * FROM rating WHERE userEmail=?");
    $sql->bind_param("s", $userEmail);
    $sql->execute();
    $res = $sql->get_result();
    $rst = $res->fetch_assoc();
    $val = $rst["userEmail"];

    $stmt = $conn->prepare("INSERT INTO rating (userName, userEmail, userReview, userMessage, dateReviewed, product_id) VALUES (?,?,?,?,?,?) ");
    $stmt->bind_param("ssssss", $userName, $userEmail, $starRate, $rateMsg, $date, $toolID);
    $stmt->execute();
    echo "Thanks for your review!";
}
// review post finished

$myTime = getdate(date("U"));
$date = "$myTime[weekday], $myTime[month] $myTime[mday], $myTime[year]";

$ratingQ = "SELECT id FROM rating WHERE product_id = $toolID";
$ratingR = $conn->query($ratingQ);
$rating_num_rows = $ratingR->num_rows;

$ratingSQL = $conn->query("SELECT SUM(userReview) AS total FROM rating WHERE product_id = $toolID");
$ratingData = $ratingSQL->fetch_array();
$totalRating = $ratingData["total"];

$averageRating = '';

if ($rating_num_rows != 0) {
    if (is_nan(round(($totalRating / $rating_num_rows), 1))) {
        $averageRating = 0;
    } else {
        $averageRating = round(($totalRating / $rating_num_rows), 1);
    }
} else {
    $averageRating = 0;
}
// echo $averageRating;



?>
<!DOCTYPE html>
<html>

<head>
    <?php echo "<title>NailedIt - $name</title>"; ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/rating.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="jquery/main.js"></script> -->

</head>

<body>
    <header>
        <?php
        include 'nav&foot/navbar.php';
        ?>
    </header>

    <main class="container container1">
        <div class="products-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-left">
            <?php
            echo "<h1 class='display-4'>$name</h1>";

            ?>
        </div>

        <div class="row">

            <?php

            echo "<div class='col-md-4 mb-3'>
                <div class='d-flex flex-column align-items-center text-center'>
                    <img src='img/tools/$img' class='img-thumbnail' alt='$img'>
                </div>
            </div>";

            echo "<div class='col-md-8 mb-3'>
            <div class='card'>
                <div class='card-body'>
                    <div class='d-flex flex-column align-items-left text-left'>
                            <p>$des</p>
                    </div>
                </div>
            </div>
        </div>";

            ?>


        </div>

        <div class="row">
            <?php

            if (isset($_SESSION['user_40180801'])) {

                if ($num1 > 0) {

                    echo "<div class='col-md-4 mb-3'>
                    <div class='card'>
                        <div class='card-body'>
                            <div class='d-flex flex-column align-items-center text-center'>
                                <h3>Ace Hardware</h3><br>
                                    <p><b>User Price:</b> £";
                    echo number_format($userPrice1, 2);
                    echo "</p>
                                <p>There are <b>$available1</b> available.</p>
                            </div>
                            <div class='d-flex flex-column align-items-center text-center'>
                                <a href='CnC1.php' class='btn btn-sm btn-outline-default'>Click & Collect</a>
                            </div>
                        </div>
                    </div>
                    </div>";
                } else {
                    echo "<div class='col-md-4 mb-3'>
                    <div class='card'>
                        <div class='card-body'>
                            <div class='d-flex flex-column align-items-center text-center'>
                            <h3>Ace Hardware</h3><br>
                            <h5><div class='alert alert-danger d-flex justify-content-center'>Stock Tracking Not Available.</div></h5>
                            </div>
                        </div>
                    </div>
                    </div>";
                }
            } else {
                if ($num1 > 0) {

                    echo "<div class='col-md-4 mb-3'>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='d-flex flex-column align-items-center text-center'>
                                    <h3>Ace Hardware</h3><br>
                                    <p><b>Price:</b> £";
                    echo number_format($price1, 2);
                    echo "</p>
                                    <p>There are <b>$available1</b> available.</p>
                                </div>
                                <div class='d-flex flex-column align-items-center text-center'>
                                    <a href='CnC1.php' class='btn btn-sm btn-outline-default'>Click & Collect</a>
                                </div>
                            </div>
                        </div>
                    </div>";
                } else {
                    echo "<div class='col-md-4 mb-3'>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='d-flex flex-column align-items-center text-center'>
                                    <h3>Ace Hardware</h3><br>
                                    <h5><div class='alert alert-danger d-flex justify-content-center'>Stock Tracking Not Available.</div></h5>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
            }

            if (isset($_SESSION['user_40180801'])) {
                if ($num2 > 0) {
                    echo "<div class='col-md-4 mb-3'>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='d-flex flex-column align-items-center text-center'>
                                    <h3>Home Hardware</h3><br>
                                    <p><b>User Price:</b> £";
                    echo number_format($userPrice2, 2);
                    echo "</p>
                                    <p>There are <b>$available2</b> available.</p>
                                </div>
                                <div class='d-flex flex-column align-items-center text-center'>
                                    <a href='CnC2.php' class='btn btn-sm btn-outline-default'>Click & Collect</a>
                                </div>
                            </div>
                        </div>
                    </div>";
                } else {
                    echo "<div class='col-md-4 mb-3'>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='d-flex flex-column align-items-center text-center'>
                                    <h3>Home Hardware</h3><br>
                                    <h5><div class='alert alert-danger d-flex justify-content-center'>Stock Tracking Not Available.</div></h5>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
            } else {
                if ($num2 > 0) {
                    echo "<div class='col-md-4 mb-3'>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='d-flex flex-column align-items-center text-center'>
                                    <h3>Home Hardware</h3><br>
                                    <p><b>Price:</b> £";
                    echo number_format($price2, 2);
                    echo "</p>
                                    <p>There are <b>$available2</b> available.</p>
                                </div>
                                <div class='d-flex flex-column align-items-center text-center'>
                                    <a href='CnC2.php' class='btn btn-sm btn-outline-default'>Click & Collect</a>
                                </div>
                            </div>
                        </div>
                    </div>";
                } else {
                    echo "<div class='col-md-4 mb-3'>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='d-flex flex-column align-items-center text-center'>
                                <h3>Home Hardware</h3><br>
                                <h5><div class='alert alert-danger d-flex justify-content-center'>Stock Tracking Not Available.</div></h5>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
            }

            if (isset($_SESSION['user_40180801'])) {
                if ($num3 > 0) {
                    echo "<div class='col-md-4 mb-3'>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='d-flex flex-column align-items-center text-center'>
                                    <h3>Harbor Freight</h3><br>
                                        <p><b>User Price:</b> £";
                    echo number_format($userPrice3, 2);
                    echo "</p>
                                    <p>There are <b>$available3</b> available.</p>
                                </div>
                                <div class='d-flex flex-column align-items-center text-center'>
                                    <a href='CnC3.php' class='btn btn-sm btn-outline-default'>Click & Collect</a>
                                </div>
                            </div>
                        </div>
                    </div>";
                } else {
                    echo "<div class='col-md-4 mb-3'>
                    <div class='card'>
                        <div class='card-body'>
                            <div class='d-flex flex-column align-items-center text-center'>
                            <h3>Harbor Freight</h3><br>
                            <h5><div class='alert alert-danger d-flex justify-content-center'>Stock Tracking Not Available.</div></h5>
                            </div>
                        </div>
                    </div>
                </div>";
                }
            } else {
                if ($num3 > 0) {
                    echo "<div class='col-md-4 mb-3'>
                    <div class='card'>
                        <div class='card-body'>
                            <div class='d-flex flex-column align-items-center text-center'>
                                <h3>Harbor Freight</h3><br>
                                <p><b>Price:</b> £";
                    echo number_format($price3, 2);
                    echo "</p>
                                <p>There are <b>$available3</b> available.</p>
                            </div>
                            <div class='d-flex flex-column align-items-center text-center'>
                                <a href='CnC3.php' class='btn btn-sm btn-outline-default'>Click & Collect</a>
                            </div>
                        </div>
                    </div>
                </div>";
                } else {
                    echo "<div class='col-md-4 mb-3'>
                    <div class='card'>
                        <div class='card-body'>
                            <div class='d-flex flex-column align-items-center text-center'>
                                <h3>Harbor Freight</h3><br>
                                <h5><div class='alert alert-danger d-flex justify-content-center'>Stock Tracking Not Available.</div></h5>
                            </div>
                        </div>
                    </div>
                </div>";
                }
            }
            ?>

        </div>

        <div class="container">
            <div class="products-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-left">
                <?php
                echo "<h1 class='display-5'>Reviews</h1>";
                ?>
            </div>
            <div class="rating-review">
                <div class="tri table-flex">
                    <div class="row">
                        <!-- <table> -->
                        <!-- <tbody> -->
                        <tr>
                            <div class="col-md-6 mb-3" align="center">
                                <td>
                                    <div class="rnb rvl">
                                        <h3><?= $averageRating; ?>/5</h3>
                                    </div>
                                    <div class="pdt-rate">
                                        <div class="pro-rating">
                                            <div class="clearfix rating mart8">
                                                <div class="rating-stars">
                                                    <div class="grey-stars"></div>
                                                    <div class="filled-stars" style="width: <?php echo $averageRating * 20 ?>%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rnrn">
                                        <p class="rars"><?php if ($rating_num_rows == 0) {
                                                            echo "No";
                                                        } else {
                                                            echo $rating_num_rows;
                                                        } ?> Reviews</p>
                                    </div>
                                </td>
                            </div>

                            <div class="col-md-6 mb-3" align="center">
                                <td>
                                    <div class="rrb">
									<br>
                                        <p>Please Review This Product</p>
                                        <button class="rbtn opmd">Add Review</button>
                                    </div>
                                </td>
                            </div>
                        </tr>
                        <!-- </tbody> -->
                        <!-- </table> -->
                    </div>
                    <div class="review-modal" style="display: none;">
                        <div class="review-bg"></div>
                        <div class="rmp">
                            <div class="rpc">
                                <span><i class="fas fa-times"></i></span>
                            </div>
                            <div class="rps" align="center">
                                <i class="fa fa-star" data-index="0" style="display:none"></i>
                                <i class="fa fa-star" data-index="1"></i>
                                <i class="fa fa-star" data-index="2"></i>
                                <i class="fa fa-star" data-index="3"></i>
                                <i class="fa fa-star" data-index="4"></i>
                                <i class="fa fa-star" data-index="5"></i>
                            </div>
                            <input type="hidden" value="" class="starRateV">
                            <input type="hidden" value="<?php echo $date; ?>" class="rateDate">
                            <div class="rptf" align="center">
                                <input type="text" class="raterName" placeholder="Enter your name: *">
                            </div>
                            <div class="rptf" align="center">
                                <input type="email" class="raterEmail" placeholder="Enter your email: *">
                            </div>
                            <div class="rptf" align="center">
                                <textarea class="rateMsg" id="rate-field" placeholder="What did you like or dislike about this product? *"></textarea>
                            </div>
                            <div class="rate-error" align="center"></div>
                            <div class="rpsb" align="center">
                                <button class="rpbtn">Post Review</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bri">
                    <div class="uscm">
                        <?php
                        $sqlQ = "SELECT * FROM rating WHERE product_id = $toolID";
                        $sqlR = $conn->query($sqlQ);
                        if (mysqli_num_rows($sqlR) > 0) {
                            while ($row4 = $sqlR->fetch_assoc()) {
                        ?>
                                <div class="uscm-secs">
                                    <div class="us-img">
                                        <p><?= substr($row4['userName'], 0, 1); ?></p>
                                    </div>
                                    <div class="uscms">
                                        <div class="us-rate">
                                            <div class="pdt-rate">
                                                <div class="pro-rating">
                                                    <div class="clearfix rating mart8">
                                                        <div class="rating-stars">
                                                            <div class="grey-stars"></div>
                                                            <div class="filled-stars" style="width:<?= $row4['userReview'] * 20; ?>%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="us-cmt">
                                            <p><?= $row4['userMessage']; ?></p>
                                        </div>
                                        <div class="us-nm">
                                            <p><i>By <span class="cdnm"><?= $row4['userName']; ?></span> on <span class="cmdt"><?= $row4['dateReviewed']; ?></span></i></p>
                                        </div>
                                    </div>

                                </div>
                        <?php
                            }
                        }
                        ?>
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
    <script src="jquery/main.js"></script>
</body>

</html>