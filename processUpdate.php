<?php
// session start
session_start();

// if user not logged in then return them to index.php
if(!isset($_SESSION['user_40180801'])){
    header("Location: index.php");
}

include 'connection/config.php';

$conn->set_charset('utf8');

// sanitising form data
$updatefname= $conn->real_escape_string($_POST["fname"]);
$updatelname= $conn->real_escape_string($_POST["lname"]);
$updateemail= $conn->real_escape_string($_POST["emailAddress"]);
$updateunumber= $conn->real_escape_string($_POST["phone"]);
$updateoccupation= $conn->real_escape_string($_POST["occupation"]);
$updateaboutme= $conn->real_escape_string($_POST["aboutMe"]);

$iddata = $conn->real_escape_string($_POST["rowid"]);

// updating users details with new form data
$updatequery = "UPDATE users SET firstName='$updatefname', lastName='$updatelname', emailAddress='$updateemail', phoneNumber='$updateunumber', occupation='$updateoccupation', about='$updateaboutme' WHERE id='$iddata' ";
 
$result = $conn->query($updatequery);

if(!$result){
    
    echo $conn->error;

}
// return to profile
header("Location: profile.php");
