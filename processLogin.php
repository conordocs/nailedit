<?php
// start session
if (!isset($_SESSION)) {
    session_start();
}
// if user not logged in retrun to index.php
if(!isset($_SESSION['user_40180801'])){
    header("Location: login.php");
}
include 'connection/config.php';
// pulling data from login form
    if (isset($_POST['signin'])) {
        // login php script
        $myUser = $_POST['emailAddress'];
        $myPass = $_POST['userPassword'];
        // matching user with the email and password provided in the login form
        $checkUser = "SELECT * FROM users WHERE emailAddress = '$myUser' AND userPassword = '$myPass'";
        $result = $conn->query($checkUser);
        $num = $result->num_rows;

        // if user fouund then login and redirect to their profile page
        if ($num > 0) {
            while ($row = $result->fetch_assoc()) {
                $userID = $row['id'];
                $_SESSION['user_40180801'] = $userID;

                header("location: profile.php");
                echo '<div class="alert alert-success d-flex justify-content-center">Welcome Back!</div>';
            }
        } else {
            // else return message to user saying user isnt found
            echo '<div class="alert alert-danger d-flex justify-content-center">User not found. Please try again.</div>';
        }
    }
?>