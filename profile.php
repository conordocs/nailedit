<?php
// session start
if (!isset($_SESSION)) {
    session_start();
}
// if user not logged in return them to index.php
if(!isset($_SESSION['user_40180801'])){
    header("Location: index.php");
}
include 'connection/config.php';

// getting id of user from the session
$iddata = $_SESSION['user_40180801'];

// selecting data from database table for specific user using the $iddata
$query = "SELECT * FROM users WHERE id = $iddata";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html>

<head>
    <title>NailedIT - Profile</title>
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

        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <?php

            // using for loop to fetch users information
            while ($row = $result->fetch_assoc()) {
                $fname = $row["firstName"];
                $lname = $row["lastName"];
                $email = $row["emailAddress"];
                $phone = $row["phoneNumber"];
                $occupation = $row["occupation"];
                $aboutMe = $row["about"];
                $img = $row["img"];

                echo "<div class='container'>
                <div class='main-body'>
                    <div class='row gutters-sm'>
                        <div class='col-md-4 mb-3'>
                            <div class='card'>
                                <div class='card-body'>
                                    <div class='d-flex flex-column align-items-center text-center'>
                                        <img src='img/users/$img' alt='user' class='rounded-circle' width='150'>
                                        <div class='mt-3'>
                                            <h4>$fname $lname</h4>
                                            <form method='POST' action='processImg.php' enctype='multipart/form-data'>
                                                <p><div class='text-center'>
                                                    <label for='imgUpload' >Image:</label> <input type='file' name='imgdata' required/>
                                                </div></p>
                            
                                                <input type='hidden' name='rowid' value='$iddata'>
                                                <button class='btn submit_btn' id='upload' type='submit'>Upload Photo</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-8'>
                            <div class='card mb-3'>
                                <div class='card-body'>
                                <h4>$fname's Profile</h4>
                                <h4><hr></h4>
                                    <div class='row'>
                                        <div class='col-sm-4'>
                                            <h6 class='mb-0 align-items-left text-left'><b>Full Name</b></h6>
                                        </div>
                                        <div class='col-sm-8 text-secondary align-items-left text-left'>
                                            $fname $lname
                                        </div>
                                    </div>
                                    <hr>
                                    <div class='row'>
                                        <div class='col-sm-4'>
                                            <h6 class='mb-0 align-items-left text-left'><b>Email</b></h6>
                                        </div>
                                        <div class='col-sm-8 text-secondary align-items-left text-left'>
                                            $email
                                        </div>
                                    </div>
                                    <hr>
                                    <div class='row'>
                                        <div class='col-sm-4'>
                                            <h6 class='mb-0 align-items-left text-left'><b>Phone</b></h6>
                                        </div>
                                        <div class='col-sm-8 text-secondary align-items-left text-left'>
                                            $phone
                                        </div>
                                    </div>
                                    <hr>
                                    <div class='row'>
                                        <div class='col-sm-4'>
                                            <h6 class='mb-0 align-items-left text-left'><b>Occupation</b></h6>
                                        </div>
                                        <div class='col-sm-8 text-secondary align-items-left text-left'>
                                            $occupation
                                        </div>
                                    </div>
                                    <hr>
                                    <div class='row'>
                                        <div class='col-sm-4'>
                                            <h6 class='mb-0 align-items-left text-left'><b>About Me</b></h6>
                                        </div>
                                        <div class='col-sm-8 text-secondary align-items-left text-left'>
                                            $aboutMe
                                        </div>
                                    </div>
                                    <hr>
                                    <a href='updateDetails.php'><button class='btn submit_btn' id='upload' type='submit'>Update Details</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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