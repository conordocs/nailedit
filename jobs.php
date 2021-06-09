<?php
include 'connection/config.php';

// selecting all trades
$tradeQ = "SELECT * FROM trades";
$tradeR = $conn->query($tradeQ);

// electrician information using inner join
$jobsQuery1 = "SELECT * FROM jobs INNER JOIN trades ON trades.id = jobs.trade_id WHERE trades.id = 1";
$jobsResult1 = $conn->query($jobsQuery1);
$num1 = $jobsResult1->num_rows;
// plumber information using inner join
$jobsQuery2 = "SELECT * FROM jobs INNER JOIN trades ON trades.id = jobs.trade_id WHERE trades.id = 2";
$jobsResult2 = $conn->query($jobsQuery2);
$num2 = $jobsResult2->num_rows;
// bricky information using inner join
$jobsQuery3 = "SELECT * FROM jobs INNER JOIN trades ON trades.id = jobs.trade_id WHERE trades.id = 3";
$jobsResult3 = $conn->query($jobsQuery3);
$num3 = $jobsResult3->num_rows;
// paint & decor information using inner join
$jobsQuery4 = "SELECT * FROM jobs INNER JOIN trades ON trades.id = jobs.trade_id WHERE trades.id = 4";
$jobsResult4 = $conn->query($jobsQuery4);
$num4 = $jobsResult4->num_rows;
// handyman information using inner join
$jobsQuery5 = "SELECT * FROM jobs INNER JOIN trades ON trades.id = jobs.trade_id WHERE trades.id = 5";
$jobsResult5 = $conn->query($jobsQuery5);
$num5 = $jobsResult5->num_rows;
// other information using inner join
$jobsQuery6 = "SELECT * FROM jobs INNER JOIN trades ON trades.id = jobs.trade_id WHERE trades.id = 6";
$jobsResult6 = $conn->query($jobsQuery6);
$num6 = $jobsResult6->num_rows;

?>
<!DOCTYPE html>
<html>

<head>
    <title>NailedIt - Jobs</title>
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
            <h1 class="display-4">Looking for work:</h1>
            <h5>Here is a list of tradesmen who have lost their jobs due to COVID-19.</h5>
            <h5>Also, if you yourself have faced this issue then please fill out the form below and your details will be posted aswell!</h5>
        </div>

        <?php

        // displaying electricians
        echo "<br><h1>Electricians</h1><br>
        <div class='row'>";
        // if no electrians then display that there are no records
        if ($num1 <= 0) {
            echo "<div class='col-md-12'>
                <div class='alert alert-danger d-flex justify-content-center'>There are no record of any electricians.</div>
            </div>";
        } else {
            while ($row1 = $jobsResult1->fetch_assoc()) {
                $productID1 = $row1['id'];
                $name1 = $row1['full_name'];
                $phone1 = $row1['phone_number'];
                $email1 = $row1['email_address'];
                $about1 = $row1['about_me'];
                $img1 = $row1['img'];
                $trade1 = $row1['trade'];
                
                // else print out all electricians in cards using while loop
                echo "<div class='col-md-6'>
                    <div class='card mb-3'>
                        <div class='row no-gutters align-items-center' style='background : #fff;'>
                            <div class='col-md-4'>
                                <img src='img/jobs/$img1' class='card-img' alt='no image'>
                            </div>
                            <div class='col-md-8'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$name1</h5>
                                    <p class='card-text'> <a href='tel:$phone1'>$phone1</a></p>
                                    <p class='card-text'> <a href='mailto:$email1'>$email1</a></p>
                                    <p class='card-text'>$about1</p>
                                    <p class='card-text'><small class='text-muted'>$trade1</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ";
            }
        }
        echo "</div>";

        // displaying plumbers
        echo "<br><h1>Plumbers</h1><br>
        <div class='row'>";
        if ($num2 <= 0) {
            // if no plumbers then display that there are no records
            echo "<div class='col-md-12'>
                <div class='alert alert-danger d-flex justify-content-center'>There are no record of any plumbers.</div>
            </div>";
        } else {
            while ($row2 = $jobsResult2->fetch_assoc()) {
                $productID2 = $row2['id'];
                $name2 = $row2['full_name'];
                $phone2 = $row2['phone_number'];
                $email2 = $row2['email_address'];
                $about2 = $row2['about_me'];
                $img2 = $row2['img'];
                $trade2 = $row2['trade'];

                // else print out all plumbers in cards using while loop
                echo "<div class='col-md-6'>
                    <div class='card mb-3'>
                        <div class='row no-gutters align-items-center' style='background : #fff;'>
                            <div class='col-md-4'>
                                <img src='img/jobs/$img2' class='card-img' alt='no image'>
                            </div>
                            <div class='col-md-8'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$name2</h5>
                                    <p class='card-text'> <a href='tel:$phone2'>$phone2</a></p>
                                    <p class='card-text'> <a href='mailto:$email2'>$email2</a></p>
                                    <p class='card-text'>$about2</p>
                                    <p class='card-text'><small class='text-muted'>$trade2</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ";
            }
        }
        echo "</div>";

        // displaying bricky
        echo "<br><h1>Bricklayers</h1><br>
        <div class='row'>";
        // if no bricklayers then display that there are no records
        if ($num3 <= 0) {
            echo "<div class='col-md-12'>
                <div class='alert alert-danger d-flex justify-content-center'>There are no record of any bricklayers.</div>
            </div>";
        } else {
            while ($row3 = $jobsResult3->fetch_assoc()) {
                $productID3 = $row3['id'];
                $name3 = $row3['full_name'];
                $phone3 = $row3['phone_number'];
                $email3 = $row3['email_address'];
                $about3 = $row3['about_me'];
                $img3 = $row3['img'];
                $trade3 = $row3['trade'];

                // else print out all bricklayers in cards using while loop
                echo "<div class='col-md-6'>
                    <div class='card mb-3'>
                        <div class='row no-gutters align-items-center' style='background : #fff;'>
                            <div class='col-md-4'>
                                <img src='img/jobs/$img3' class='card-img' alt='no image'>
                            </div>
                            <div class='col-md-8'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$name3</h5>
                                    <p class='card-text'> <a href='tel:$phone3'>$phone3</a></p>
                                    <p class='card-text'> <a href='mailto:$email3'>$email3</a></p>
                                    <p class='card-text'>$about3</p>
                                    <p class='card-text'><small class='text-muted'>$trade3</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ";
            }
        }
        echo "</div>";

        // displaying painting & decor
        echo "<br><h1>Painter & Decorators</h1><br>
        <div class='row'>";
        // if no painter & decor then display that there are no records
        if ($num4 <= 0) {
            echo "<div class='col-md-12'>
                <div class='alert alert-danger d-flex justify-content-center'>There are no record of any Painter & Decorators.</div>
            </div>";
        } else {
            while ($row4 = $jobsResult4->fetch_assoc()) {
                $productID4 = $row4['id'];
                $name4 = $row4['full_name'];
                $phone4 = $row4['phone_number'];
                $email4 = $row4['email_address'];
                $about4 = $row4['about_me'];
                $img4 = $row4['img'];
                $trade4 = $row4['trade'];

                // else print out all painter and decorators in cards using while loop
                echo "<div class='col-md-6'>
                    <div class='card mb-3'>
                        <div class='row no-gutters align-items-center' style='background : #fff;'>
                            <div class='col-md-4'>
                                <img src='img/jobs/$img4' class='card-img' alt='no image'>
                            </div>
                            <div class='col-md-8'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$name4</h5>
                                    <p class='card-text'> <a href='tel:$phone4'>$phone4</a></p>
                                    <p class='card-text'> <a href='mailto:$email4'>$email4</a></p>
                                    <p class='card-text'>$about4</p>
                                    <p class='card-text'><small class='text-muted'>$trade4</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ";
            }
        }
        echo "</div>";

        // displaying handymen
        echo "<br><h1>Handymen</h1><br>
        <div class='row'>";
        // if no handymen then display that there are no records
        if ($num5 <= 0) {
            echo "<div class='col-md-12'>
                <div class='alert alert-danger d-flex justify-content-center'>There are no record of any Handymen.</div>
            </div>";
        } else {
            while ($row5 = $jobsResult5->fetch_assoc()) {
                $productID5 = $row5['id'];
                $name5 = $row5['full_name'];
                $phone5 = $row5['phone_number'];
                $email5 = $row5['email_address'];
                $about5 = $row5['about_me'];
                $img5 = $row5['img'];
                $trade5 = $row5['trade'];

                // else print out all handyment in cards using while loop
                echo "<div class='col-md-6'>
                    <div class='card mb-3'>
                        <div class='row no-gutters align-items-center' style='background : #fff;'>
                            <div class='col-md-4'>
                                <img src='img/jobs/$img5' class='card-img' alt='no image'>
                            </div>
                            <div class='col-md-8'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$name5</h5>
                                    <p class='card-text'> <a href='tel:$phone5'>$phone5</a></p>
                                    <p class='card-text'> <a href='mailto:$email5'>$email5</a></p>
                                    <p class='card-text'>$about5</p>
                                    <p class='card-text'><small class='text-muted'>$trade5</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ";
            }
        }
        echo "</div>";

        // displaying other
        echo "<br><h1>Other</h1><br>
        <div class='row'>";
        // if no other then display that there are no records
        if ($num6 <= 0) {
            echo "<div class='col-md-12'>
                <div class='alert alert-danger d-flex justify-content-center'>There are no record of any 'Other' tradesmen.</div>
            </div>";
        } else {
            while ($row6 = $jobsResult6->fetch_assoc()) {
                $productID6 = $row6['id'];
                $name6 = $row6['full_name'];
                $phone6 = $row6['phone_number'];
                $email6 = $row6['email_address'];
                $about6 = $row6['about_me'];
                $img6 = $row6['img'];
                $trade6 = $row6['trade'];

                // else print out all others in cards using while loop
                echo "<div class='col-md-6'>
                    <div class='card mb-3'>
                        <div class='row no-gutters align-items-center' style='background : #fff;'>
                            <div class='col-md-4'>
                                <img src='img/jobs/$img6' class='card-img' alt='no image'>
                            </div>
                            <div class='col-md-8'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$name6</h5>
                                    <p class='card-text'> <a href='tel:$phone6'>$phone6</a></p>
                                    <p class='card-text'> <a href='mailto:$email6'>$email6</a></p>
                                    <p class='card-text'>$about6</p>
                                    <p class='card-text'><small class='text-muted'>$trade6</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ";
            }
        }
        echo "</div>";

        ?>

        <?php

        // fetching data submitted in form and processing image upload
        if (isset($_POST['submit'])) {
            $targetDir = "img/jobs/";
            $updateimg = $_FILES["file"]["name"];
            $targetFilePath = $targetDir . $updateimg;

            $uFullName = $_POST['fullName'];
            $uEmailAddress = $_POST['email'];
            $uPhoneNumber = $_POST['phoneNumber'];
            $uAbout = $_POST['about'];
            $uTrade = $_POST['trade'];

            // sanitising input data
            $uFullName = $conn->real_escape_string($uFullName);
            $uEmailAddress = $conn->real_escape_string($uEmailAddress);
            $uPhoneNumber = $conn->real_escape_string($uPhoneNumber);
            $uAbout = $conn->real_escape_string($uAbout);
            $uTrade = $conn->real_escape_string($uTrade);


            // uploading image into folder
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {

                // inserting data into database table with image
                $sql = "INSERT INTO jobs (full_name, phone_number, email_address, about_me, img, trade_id) VALUES ('$uFullName', '$uPhoneNumber', '$uEmailAddress', '$uAbout', '$updateimg', '$uTrade')";



                $result = $conn->query($sql);

                if (!$result) {

                    echo $conn->error;
                }
            } else {
                // inserting data into database table without image
                $sql = "INSERT INTO jobs (full_name, phone_number, email_address, about_me, trade_id) VALUES ('$uFullName', '$uPhoneNumber', '$uEmailAddress', '$uAbout', '$uTrade')";
                $result = $conn->query($sql);

                if (!$result) {

                    echo $conn->error;
                }
            }

            // success message
            $msg = "<div class='alert alert-success d-flex justify-content-center text-center'>Successfully Uploaded Details</div>";
        } else {
            // failed message
            $msg1 = '<div class="alert alert-danger d-flex justify-content-center">There was an error. Please try again.</div>';
        }


        ?>

        <div class="products-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-left">
            <h1 class="display-4">Upload your details:</h1>
        </div>
        <br>
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>
        <br>
        <br>
        <!-- form to upload your contact details -->
        <div class="d-flex justify-content-center h-100">
            <div class="click_collect_card">
                <div class="d-flex justify-content-center">
                    <div class="register_brand_logo_container">
                        <img src="img/logo/Don't Just Fix It, Nail IT.png" class="register_brand_logo" alt="NailedIT Logo">
                    </div>
                    <div class="d-flex justify-conten-center form_container">
                        <!-- <h1>Join Us</h1> -->
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form class="job_form" action="" method="post" enctype='multipart/form-data'>
                        <!-- full name -->
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="fullName" id="fullName" class="form-control input_full" placeholder="Full Name: *" required width="200px">
                        </div>
                        <!-- email address -->
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                            </div>
                            <input type="email" name="email" id="email" class="form-control input_email" placeholder="Email Address: *" required>
                        </div>
                        <!-- phone number -->
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" name="phoneNumber" id="phoneNumber" class="form-control input_phone" placeholder="Phone Number: *" required>
                        </div>
                        <!-- Address -->
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            </div>
                            <textarea type="text" name="about" id="about" class="form-control input_about" placeholder="About You: *" required></textarea>
                        </div>
                        <!-- trade needed -->
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            </div>
                            <select name="trade" id="trade" class="form-control input_trade">
                                <option value="" disabled selected>Tradesman: *</option>
                                <?php foreach ($tradeR as $output) { ?>
                                    <?= "<option value=$output[id]> $output[trade] </option>" ?>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- image -->
                        <p>
                        <p>Image is not rquired but might enhance your chances of receiving jobs</p>
                        <div class="input-group mb-2">
                            <label for='file'>Image:<br></label> <input type='file' id="file" name='file' />
                        </div>
                        </p>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="submit" class="btn login_btn">Upload</button>
                        </div>
                    </form>
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