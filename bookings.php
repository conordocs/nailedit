<?php

// session start if user is logged on
if (!isset($_SESSION)) {
    session_start();
}

// if user is not logged on redirect them back to homepage
if (!isset($_SESSION['user_40180801'])) {
    header("Location: index.php");
}
include 'connection/config.php';

// pulling users id data from the session 
$iddata = $_SESSION['user_40180801'];

// selecting the specific users information
$query = "SELECT * FROM users WHERE id = $iddata";
$result = $conn->query($query);

// using while loop to fetch information regarding the correct user
while ($row = $result->fetch_assoc()) {
    $fname = $row["firstName"];
    $lname = $row["lastName"];
    $email = $row["emailAddress"];
    $phone = $row["phoneNumber"];
    $occupation = $row["occupation"];
    $aboutMe = $row["about"];
    $img = $row["img"];
}

// pagination so that only 10 records held per page
$bookings_per_page = 10;
$page = '';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$start_from = ($page - 1) * $bookings_per_page;

// selecting specific data from 2 different tables using an INNER JOIN
$booking_query = "SELECT appointment.id, appointment.address, appointment.date, appointment.time, appointment.trade_id, appointment.date_of_booking, trades.trade FROM appointment INNER JOIN trades ON trades.id = appointment.trade_id WHERE trades.id = appointment.trade_id AND appointment.email = '$email' ORDER BY appointment.id ASC LIMIT $start_from, $bookings_per_page";
$booking_result = $conn->query($booking_query);

?>
<!DOCTYPE html>
<html>

<head>
    <title>NailedIT - Bookings</title>
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
            <!-- using a table to display users bookings -->
            <?php
            echo "<div class='container'>
                <div class='main-body'>
                    <div class='row gutters-sm'>
                        <div class='col-md-12'>
                            <div class='card mb-3'>
                                <div class='card-body'>
                                    <h3><b>$fname's Bookings's</b></h3>
                                    <br>
                                    <div class='table-responsive'>
                                    <table class='table table-hover'>
                                        <thead>
                                            <th scope='col'>Booking</th>
                                            <th scope='col'>Address</th>
                                            <th scope='col'>Date</th>
                                            <th scope='col'>Time</th>
                                            <th scope='col'>Tradesman</th>
                                            <th scope='col'>Date of Booking</th>
                                            </tr>
                                        </thead>";
                                        ?>
                                        <?php
                                        // using while loop to fetch desired data to display on table
                                        while ($row1 = $booking_result->fetch_assoc()) {
                                            $booking_id = $row1["id"];
                                            $address = $row1["address"];
                                            $date = $row1["date"];
                                            $newDate = date("d-m-Y", strtotime($date));
                                            $time = $row1["time"];
                                            $dob = $row1["date_of_booking"];
                                            $newDob = date("d-m-Y", strtotime($dob));
                                            $trade = $row1["trade"];

                                            echo "<tbody>
                                                <tr>
                                                <th scope='row'>#$booking_id</th>
                                                <td>$address</td>
                                                <td>$newDate</td>
                                                <td>$time</td>
                                                <td>$trade</td>
                                                <td>$newDob</td>
                                                
                                                </tr>
                                            </tbody>";
                                    }
                                    echo "</table>";
                                    ?>

                                    <?php


                                    // selecting data to separate it into different pages using pagination
                                    $page_query = "SELECT appointment.id, appointment.address, appointment.date, appointment.time, appointment.trade_id, appointment.date_of_booking, trades.trade FROM appointment INNER JOIN trades ON trades.id = appointment.trade_id WHERE trades.id = appointment.trade_id AND appointment.email = '$email' ORDER BY appointment.id ASC";
                                    $page_result = $conn->query($page_query);
                                    $total_bookings = mysqli_num_rows($page_result);
                                    $total_pages = ceil($total_bookings / $bookings_per_page);

                                    // links to different pages
                                    echo '<ul class="pagination justify-content-center">';
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        echo '<h5><a class="page-link" href="bookings.php?page=' . $i . '">' . $i . '</a></h5>';
                                    }
                                    echo '</ul>';


                                    ?>

                                    <?php
                                echo "</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
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