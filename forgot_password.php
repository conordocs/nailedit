<?php
include 'connection/config.php';
// rquesting PHPMailer so that the website can send emails
// require 'PHPMailer/PHPMailerAutoload.php';

// pulling information from forgot passowrd form
if ($_POST) {
    $email = $_POST['emailAddress'];
    $selectquery = "SELECT * FROM users WHERE emailAddress = '$email'";
    $result = $conn->query($selectquery);
    $num = $result->num_rows;

    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $fname = $row["firstName"];
        $password = $row["userPassword"];
    }

    // if email entered is registered then email will be sent to given email with password
    if ($num > 0) {
        // $mail = new PHPMailer();
        // $mail->isSMTP();
        // $mail->SMTPAuth = true;
        // $mail->SMTPSecure = 'ssl';
        // $mail->Host = 'smtp.gmail.com';
        // $mail->Port = '465'; //587 465
        // $mail->isHTML();
        // $mail->Username = 'nailedit.2407@gmail.com';
        // $mail->Password = 'Nailedit2021';
        // $mail->SetFrom('no-reply@nailedit.com');
        // $mail->Subject = 'Password Query';
        // $mail->Body = "Hi $fname, <br><br> Your password is: '$password'. <br><br> Kind Regards, <br>NailedIT Team";
        // $mail->AddAddress($email);

        // $mail->Send();

        // success message
        $msg = "<div class='alert alert-success d-flex justify-content-center'>Your password has been sent to your email.</div>";
    } else {
        // error message because email isn't found
        $msg = "<div class='alert alert-danger d-flex justify-content-center'>User not found. Please try again.</div>";
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>NailedIT - Forgot Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <header>
        <?php
        include 'loginNav.php';
        ?>
    </header>

    <main class="container container1">
        <div class="container h-100">
            <p></p>
            <?php
            if (isset($msg)) {
                echo $msg;
            }
            ?>
            <div class="d-flex justify-content-center h-100">
                <div class="login_user_card">
                    <div class="d-flex justify-content-center">
                        <div class="login_brand_logo_container">
                            <img src="img/logo/Don't Just Fix It, Nail IT.png" class="login_brand_logo" alt="NailedIT Logo">
                        </div>
                        <!-- forgot password form -->
                        <div class="d-flex justify-conten-center login_form_container">
                            <h1>Forgot Password</h1>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div class="d-flex justify-content-center form_container">
                        <form method='POST' action=''>
                            <!-- email address -->
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                </div>
                                <input type="text" name="emailAddress" id="emailAddress" class="form-control input_user" placeholder="Email Address:" required>
                            </div>
                            <!-- submit button -->
                            <div class="d-flex justify-content-center mt-3 login_container">
                                <button type="submit" class="btn login_btn">Submit</button>
                            </div>

                            <div class="mt-4">
                                <div class="d-flex justify-content-center">
                                    <a href="login.php" class="ml-2">Login</a>
                                </div>
                            </div>
                        </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>