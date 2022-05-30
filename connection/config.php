<?php
$myPass = "";
$webs = "localhost";
$dbName = "cdoherty101";
$myUser = "root";

$conn = new mysqli($webs, $myUser, $myPass, $dbName);

if ($conn->connect_errno) {
    echo "Failed to connect." . $conn->connect_error;
}
