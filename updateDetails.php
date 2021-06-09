<?php
if (!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['user_40180801'])){
    header("Location: index.php");
}
include 'connection/config.php';
// $_SESSION['user_40180801'];
$iddata = $_SESSION['user_40180801'];

$query = "SELECT * FROM users WHERE id = $iddata";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html>

<head>
    <title>NailedIT - Update Profile</title>
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
            <!-- <div class="alert alert-success d-flex justify-content-center">Welcome Back!</div> -->
            <?php

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
                        </div>";
            ?>

            <?php
                echo "
                        <div class='col-md-8'>
                            <div class='card mb-3'>
                                <div class='card-body'>
                                <form method='POST' action='processUpdate.php' enctype='multipart/form-data'>
                                    <div class='row'>
                                        <div class='col-sm-3'>
                                            <h6 class='mb-0'><b>First Name</b></h6>
                                        </div>
                                        <div class='col-sm-9 text-secondary'>
                                            <textarea class='form-control' width='20px' height='20px' name='fname'>$fname</textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class='row'>
                                        <div class='col-sm-3'>
                                            <h6 class='mb-0'><b>Last Name</b></h6>
                                        </div>
                                        <div class='col-sm-9 text-secondary'>
                                            <textarea class='form-control' width='20px' height='20px' name='lname'>$lname</textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class='row'>
                                        <div class='col-sm-3'>
                                            <h6 class='mb-0'><b>Email</b></h6>
                                        </div>
                                        <div class='col-sm-9 text-secondary'>
                                        <textarea class='form-control' width='20px' height='20px' name='emailAddress'>$email</textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class='row'>
                                        <div class='col-sm-3'>
                                            <h6 class='mb-0'><b>Phone</b></h6>
                                        </div>
                                        <div class='col-sm-9 text-secondary'>
                                        <textarea class='form-control' width='20px' height='20px' name='phone'>$phone</textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class='row'>
                                        <div class='col-sm-3'>
                                            <h6 class='mb-0'><b>Occupation</b></h6>
                                        </div>
                                        <div class='col-sm-9 text-secondary'>
                                        <textarea class='form-control' width='20px' height='20px' name='occupation'>$occupation</textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class='row'>
                                        <div class='col-sm-3'>
                                            <h6 class='mb-0'><b>About Me</b></h6>
                                        </div>
                                        <div class='col-sm-9 text-secondary'>
                                        <textarea class='form-control' width='20px' height='20px' name='aboutMe'>$aboutMe</textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <input type='hidden' name='rowid' value='$iddata'>
                                    <button class='btn submit_btn' id='upload' type='submit'>Update Details</button>
                                    </form>
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