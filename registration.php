<?php
include 'connection/config.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>NailedIT - Registration</title>
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

    <div>

    </div>

    <main class="container container1">
        <div class="container h-100">
            <p></p>
            <?php
            // fetching form data from register form
            if (isset($_POST['create'])) {
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $emailAddress = $_POST['emailAddress'];
                $phoneNumber = $_POST['phoneNumber'];
                $occupation = $_POST['occupation'];
                $userPassword = $_POST['userPassword'];
                $repeatPassword = $_POST['repeatPassword'];
                if ($userPassword != $repeatPassword) {
                    // form IS NOT valid
                    echo '<div class="alert alert-danger d-flex justify-content-center">Your passwords do not match.</div>';
                } else {
                    // form IS valid
                    // sanitise the form data
                    $firstName = $conn->real_escape_string($firstName);
                    $lastName = $conn->real_escape_string($lastName);
                    $emailAddress = $conn->real_escape_string($emailAddress);
                    $phoneNumber = $conn->real_escape_string($phoneNumber);
                    $occupation = $conn->real_escape_string($occupation);
                    $userPassword = $conn->real_escape_string($userPassword);
                    $repeatPassword = $conn->real_escape_string($repeatPassword);

                    // checking for duplicate email and phone number
                    $check_duplicate_email = "SELECT * FROM users WHERE emailAddress = '$emailAddress'";
                    $check_duplicate_number = "SELECT * FROM users WHERE phoneNumber = '$phoneNumber'";

                    $result = mysqli_query($conn, $check_duplicate_email);
                    $result2 = mysqli_query($conn, $check_duplicate_number);

                    
                    if (mysqli_num_rows($result) > 0) {
                        echo '<div class="alert alert-danger d-flex justify-content-center">Email already in use. Please use another email. </div>';
                    } else if (mysqli_num_rows($result2) > 0) {
                        echo '<div class="alert alert-danger d-flex justify-content-center">Phone number already in use. Please use another. </div>';
                    } else {
                        // if no duplicates then insert user details into database
                        $sql = "INSERT INTO users (firstName, lastName, emailAddress, phoneNumber, occupation, userPassword) VALUES ('$firstName', '$lastName', '$emailAddress', '$phoneNumber', '$occupation', '$userPassword')";

                        if ($conn->query($sql) === TRUE) {
                            echo '<div class="alert alert-success d-flex justify-content-center">User Successfully Created!</div>';
                        } else {
                            echo '<div class="alert alert-danger d-flex justify-content-center">There was an error. Please try again.</div>' . $sql;
                        }
                    }
                    $conn->close();
                }
            }
            ?>
            <div class="d-flex justify-content-center h-100">
                <div class="register_user_card">
                    <div class="d-flex justify-content-center">
                        <div class="register_brand_logo_container">
                            <img src="img/logo/Don't Just Fix It, Nail IT.png" class="register_brand_logo" alt="NailedIT Logo">
                        </div>
                        <div class="d-flex justify-conten-center form_container">
                            <!-- register form -->
                            <h1><br>Register</h1>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center form_container">
                        <form action="registration.php" method="post">
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
                                <input type="email" name="emailAddress" id="emailAddress" class="form-control input_email" placeholder="Email Address: *" required>
                            </div>
                            <!-- phone number -->
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name="phoneNumber" id="phoneNumber" class="form-control input_phone" placeholder="Phone Number: *" required>
                            </div>
                            <!-- occupation -->
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                                </div>
                                <input type="text" name="occupation" id="occupation" class="form-control input_occupation" placeholder="Occupation:">
                            </div>
                            <!-- password -->
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="userPassword" id="userPassword" class="form-control input_pass" placeholder="Password: *" required>
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="repeatPassword" id="repeatPassword" class="form-control input_pass" placeholder="Retype Password: *" required>
                            </div>
                            <div class="d-flex justify-content-center mt-3 login_container">
                                <button type="submit" name="create" id="register" class="btn login_btn">Register</button>
                            </div>
                        </form>
                    </div>

                    <!-- login button -->
                    <div class="mt-4">
                        <div class="d-flex justify-content-center links">
                            Already have an account? <a href="login.php" class="ml-2">Log In Here</a>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>