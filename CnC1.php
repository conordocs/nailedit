<?php
include 'connection/config.php';
// rquesting PHPMailer so that the website can send emails
// require 'PHPMailer/PHPMailerAutoload.php';

// selecting information for Ace Hardware
$shopQ = "SELECT * FROM shops WHERE id = 2";
$shopR = $conn->query($shopQ);
// selecting all products where stock is available
$s1Query = "SELECT * FROM shop1products WHERE quantity > 0";
$s1Result = $conn->query($s1Query);

// using while loop to fetch information for Ace Hardware
while ($row = $shopR->fetch_assoc()) {
    $shopID = $row['id'];
    $shop_name = $row['shop_name'];
    $address = $row['address'];
    $number = $row['number'];
    $email = $row['email'];
    $mon = $row['monday'];
    $tue = $row['tuesday'];
    $wed = $row['wednesday'];
    $thurs = $row['thursday'];
    $fri = $row['friday'];
    $sat = $row['saturday'];
    $sun = $row['sunday'];
    $map = $row['map'];
    $img = $row['image'];
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>NailedIt - <?php echo $shop_name ?> C&C</title>
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
        <br>
        <?php

        ?>

        <?php

        // fetching the data that has been submitted through the form
        if (isset($_POST['CnC1'])) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $emailAddress = $_POST['email'];
            $phoneNumber = $_POST['phoneNumber'];
            $product = $_POST['product'];
            $quantity = $_POST['quantity'];

            // fetching information regarding the tool that has been selected
            $s1Query2 = "SELECT * FROM shop1products WHERE product_id = $product";
            $s1Result2 = $conn->query($s1Query2);
            while ($row2 = $s1Result2->fetch_assoc()) {
                $price = $row2['price'];
                $userPrice = $row2['userPrice'];
                $quantity1 = $row2['quantity'];
                $product_name = $row2['name'];
            }

            // sanitising the form data
            $firstName = $conn->real_escape_string($firstName);
            $lastName = $conn->real_escape_string($lastName);
            $emailAddress = $conn->real_escape_string($emailAddress);
            $phoneNumber = $conn->real_escape_string($phoneNumber);
            $product = $conn->real_escape_string($product);
            $quantity = $conn->real_escape_string($quantity);
            $total = $userPrice * $quantity;
            $total = number_format($total, 2);
            $total2 = $price * $quantity;
            $total2 = number_format($total2, 2);

            if ($quantity > $quantity1) {
                // failed message if the user tries to buy more than what is available
                echo "<div class='alert alert-danger d-flex justify-content-center'>You cannot order more than what is available. Please try again.</div>";
            } else {
                // if user is logged on then they will receive discount so this is checking this.
                if (isset($_SESSION['user_40180801'])) {

                    $sql = "INSERT INTO orders (first_name, last_name, email_address, phone_number, product_id, quantity, total, shop_id) VALUES ('$firstName', '$lastName', '$emailAddress', '$phoneNumber', '$product', '$quantity', '$total', 2)";

                    $sql2 = "UPDATE `shop1products` SET `quantity`=GREATEST(0, `quantity`-$quantity) WHERE `product_id` = $product";

                    $result = $conn->query($sql);
                    $result2 = $conn->query($sql2);

                    if (!$result) {

                        echo $conn->error;
                    }
                    if (!$result2) {

                        echo $conn->error;
                    }

                    // if user is logged on then send email with user price instead of RRP.
                    // $mail = new PHPMailer();
                    // $mail->isSMTP();
                    // $mail->SMTPAuth = true;
                    // $mail->SMTPSecure = 'ssl';
                    // $mail->Host = 'smtp.gmail.com';
                    // $mail->Port = '465';
                    // $mail->isHTML();
                    // $mail->Username = 'nailedit.2407@gmail.com';
                    // $mail->Password = 'Nailedit2021';
                    // $mail->SetFrom('no-reply@nailedit.com');
                    // $mail->Subject = 'Order Confirmation';
                    // $mail->Body = "Hi $firstName, 
                    //     <br><br> <b>---- Order Details ----</b><br><br>
                    //     <table cellspacing=\"4\" cellpadding=\"4\" border=\"1\" align=\"left\">
                    //         <tr>
                    //             <th align=\"center\" width=\"200\">Shop</th>
                    //             <th align=\"center\" width=\"200\">Product</th>
                    //             <th align=\"center\" width=\"100\">Price</th>
                    //             <th align=\"center\" width=\"100\">Quantity</th>
                    //             <th align=\"center\" width=\"100\">Total</th>
                    //         </tr>
                    //         <tr>
                    //             <td align=\"center\" width=\"200\">$shop_name</td>
                    //             <td align=\"center\" width=\"200\">$product_name</td>
                    //             <td align=\"center\" width=\"100\">&pound;$userPrice</td>
                    //             <td align=\"center\" width=\"100\">$quantity</td>
                    //             <td align=\"center\" width=\"100\">&pound;$total</td>
                    //         </tr>
                    //     </table><br><br><br>
                    // <br><br>Thanks for ordering with NailedIT. 
                    // <br><br> Kind Regards, <br>NailedIT Team";
                    // $mail->AddAddress($emailAddress);

                    // $mail->Send();
                } else {

                    // if user isn't logged in the continue with order but with RRP
                    $sql = "INSERT INTO orders (first_name, last_name, email_address, phone_number, product_id, quantity, total, shop_id) VALUES ('$firstName', '$lastName', '$emailAddress', '$phoneNumber', '$product', '$quantity', '$total2', 2)";

                    $sql2 = "UPDATE `shop1products` SET `quantity`=GREATEST(0, `quantity`-$quantity) WHERE `product_id` = $product";

                    $result = $conn->query($sql);
                    $result2 = $conn->query($sql2);

                    if (!$result) {

                        echo $conn->error;
                    }
                    if (!$result2) {

                        echo $conn->error;
                    }

                    // send email with RRP instead of user price
                    // $mail = new PHPMailer();
                    // $mail->isSMTP();
                    // $mail->SMTPAuth = true;
                    // $mail->SMTPSecure = 'ssl';
                    // $mail->Host = 'smtp.gmail.com';
                    // $mail->Port = '465';
                    // $mail->isHTML();
                    // $mail->Username = 'nailedit.2407@gmail.com';
                    // $mail->Password = 'Nailedit2021';
                    // $mail->SetFrom('no-reply@nailedit.com');
                    // $mail->Subject = 'Order Confirmation';
                    // $mail->Body = "Hi $firstName, 
                    // <br><br> <b>---- Order Details ----</b><br><br>
                    //     <table cellspacing=\"4\" cellpadding=\"4\" border=\"1\" align=\"left\">
                    //         <tr>
                    //             <th align=\"center\" width=\"200\">Shop</th>
                    //             <th align=\"center\" width=\"200\">Product</th>
                    //             <th align=\"center\" width=\"100\">Price</th>
                    //             <th align=\"center\" width=\"100\">Quantity</th>
                    //             <th align=\"center\" width=\"100\">Total</th>
                    //         </tr>
                    //         <tr>
                    //             <td align=\"center\" width=\"200\">$shop_name</td>
                    //             <td align=\"center\" width=\"200\">$product_name</td>
                    //             <td align=\"center\" width=\"100\">&pound;$price</td>
                    //             <td align=\"center\" width=\"100\">$quantity</td>
                    //             <td align=\"center\" width=\"100\">&pound;$total2</td>
                    //         </tr>
                    //     </table><br><br><br>
                    // <br><br>Thanks for ordering with NailedIT. 
                    // <br><br> Kind Regards, <br>NailedIT Team";
                    // $mail->AddAddress($emailAddress);

                    // $mail->Send();
                }
                // success message
                $msg = "<div class='alert alert-success d-flex justify-content-center text-center'>Successfully Ordered. <br> Check Email for confirmation receipt!</div>";
            }
        } else {
            // $msg = '<div class="alert alert-danger d-flex justify-content-center">There was an error. Please try again.</div>';
        }


        ?>
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>
        <div class="products-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-left">
            <h1 class="display-4">Click & Collect: <?php echo $shop_name ?></h1>
        </div>

        <div class="row">

            <?php

            // shop information for Ace Hardware with embedded map of location of shop
            echo "<div class='col-md-4 mb-3'>
                <div class='d-flex flex-column align-items-center text-center'>
                    <img src='img/shops/$img' class='img-thumbnail' alt='$img'>
                </div>
            </div>";

            echo "<div class='col-md-8 mb-3'>
                <div class='card'>
                    <div class='card-body flex-column align-items-left text-left'>
                    <div class='row'>
                        <div class='col-md-4 mb-3'>
                            <b>Address: </b>
                            <p>$address</p>
                            <b>Contact Number: </b>
                            <p><a href='tel:$number'>$number</a><br></p>
                            <b>Email: </b>
                            <p><a href='mailto:$email'>$email</a></p>
                            <b>Opening Hours:</b> <br>
                            <b>Monday:</b> $mon <br>
                            <b>Tuesday:</b> $tue <br>
                            <b>Wednesday:</b> $wed <br>
                            <b>Thursday:</b> $thurs <br>
                            <b>Friday:</b> $fri <br> 
                            <b>Saturday:</b> $sat <br> 
                            <b>Sunday:</b> $sun <br>
                        </div>
                        <div class='col-md-8 mb-3'>
                            <div class='d-flex flex-column align-items-center text-center'>
                            <br>
                                <iframe src='https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9249.347336005138!2d-5.9757196!3d54.5804387!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4861089b8f102b9f%3A0xc44a80bd4e650b7c!2sBoucher%20Crescent!5e0!3m2!1sen!2suk!4v1611945726334!5m2!1sen!2suk' width='300' height='300' frameborder='0' style='border:0;' allowfullscreen='' aria-hidden='false' tabindex='0'></iframe>
                            </div>
                        </div>
                        </div>
                    </div>
                    
                </div>
            </div>";

            ?>

        </div>
        <div class='dropdown-divider'></div>
        <div class="d-flex justify-content-center h-100">
            <!-- click and collect form -->
            <div class="click_collect_card">
                <div class="d-flex justify-content-center">
                    <h1>Click & Collect</h1><br>
                </div>
                <br>
                <div class="d-flex justify-content-center form_container">
                    <form action="CnC1.php" method="post">
                        <!-- first name -->
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="firstName" id="firstName" class="form-control input_first" placeholder="First Name: *" required>
                        </div>
                        <!-- last name -->
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="lastName" id="lastName" class="form-control input_last" placeholder="Last Name: *" required>
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
                        <!-- tool -->
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-tools"></i></span>
                            </div>
                            <select name="product" id="product" class="form-control input_product" required>
                                <option value="" disabled selected>Tool: *</option>
                                <!-- if user is logged in then show user price -->
                                <?php if (isset($_SESSION['user_40180801'])) {
                                    foreach ($s1Result as $output) { ?>
                                        <?= "<option value=$output[product_id]> $output[name] || (£$output[userPrice]) || (<b>$output[quantity]</b> in stock)</option>"; ?>
                                        <!-- if user is NOT logged in then show RRP -->
                                    <?php }
                                } else {

                                    foreach ($s1Result as $output) { ?>
                                        <?= "<option value=$output[product_id]> $output[name] || (£$output[price]) || (<b>$output[quantity]</b> in stock)</option>"; ?>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <!-- quantity -->
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
                            </div>
                            <input type="number" name="quantity" id="quantity" class="form-control input_quantity" placeholder="Quantity: *" required>
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="CnC1" id="CnC1" class="btn login_btn">Click & Collect</button>
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