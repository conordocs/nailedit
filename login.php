<?php
include 'connection/config.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>NailedIT - Login</title>
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
            
            ?>
            <!-- login form -->
            <div class="d-flex justify-content-center h-100">
                <div class="login_user_card">
                    <div class="d-flex justify-content-center">
                        <div class="login_brand_logo_container">
                            <img src="img/logo/Don't Just Fix It, Nail IT.png" class="login_brand_logo" alt="NailedIT Logo">
                        </div>
                        <div class="d-flex justify-conten-center login_form_container">
                            <h1>Log In</h1>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center form_container">
                        <form method='POST' action='processLogin.php'>
                            <!-- email address -->
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                </div>
                                <input type="text" name="emailAddress" id="emailAddress" class="form-control input_user" placeholder="Email Address:" required>
                            </div>
                            <!-- password -->
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="userPassword" id="userPassword" class="form-control input_pass" placeholder="Password:" required>
                            </div>
                            <!-- remember me -->
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="rememberMe" class="custom-control-input" id="customControlInline">
                                    <label for="customControlInline" class="custom-control-label">Remember Me</label>
                                </div>
                            </div>

                            <!-- log in button -->
                            <div class="d-flex justify-content-center mt-3 login_container">
                                <button type="submit" name="signin" id="login" class="btn login_btn">Log In</button>
                            </div>
                        </form>


                    </div>

                    <div class="mt-4">
                        <div class="d-flex justify-content-center links">
                            Don't have an account? <a href="registration.php" class="ml-2">Register Here</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="forgot_password.php" class="ml-2">Forgotten Password?</a>
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