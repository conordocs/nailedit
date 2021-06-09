<?php
// start session
session_start();
// if user is not logged in redirect them to index.php
if(!isset($_SESSION['user_40180801'])){
    header("Location: index.php");
}

include 'connection/config.php';

$conn->set_charset('utf8');

// getting name of image
$updateimg = $_FILES['imgdata']['name'];
$updateimgtemp = $_FILES['imgdata']['tmp_name'];

// uploading image to desired folder
if (!empty($updateimg)) {
    move_uploaded_file($updateimgtemp, "img/users/$updateimg");
} else {
    header("Location: profile.php");
    die();
}

$iddata = $conn->real_escape_string($_POST["rowid"]);

// updating the user information with the new image
$updatequery = "UPDATE users SET img='$updateimg' WHERE id='$iddata' ";

$result = $conn->query($updatequery);

// return user to their profile
header("Location: profile.php");

if (!$result) {

    echo $conn->error;
}
