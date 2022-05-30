<?php
include 'connection/config.php';

// rquesting PHPMailer so that the website can send emails
// require 'PHPMailer/PHPMailerAutoload.php';

// selecting all data from appointment table
$query = "SELECT * FROM appointment";
$result = $conn->query($query);
// selecting all data from trades table
$tradeQ = "SELECT * FROM trades";
$tradeR = $conn->query($tradeQ);

?>
<!DOCTYPE html>
<html>

<head>
    <title>NailedIT - Book Appointment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <header>
        <?php
        include 'nav&foot/navbar.php';
        ?>
    </header>

    <div>

    </div>

    <main class="container container1">
        <div class="container h-100">
            <br>
            <div class="products-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-left">
                <h1 class="display-4">Booking an Appointment:</h1>
                <h5>Please note that our tradesmen that can be booked through this page will charge a call out fee. Below are the prices:</h5>
                <h5>If these prices do not suit you then maybe our <a href="jobs.php">JOBS</a> page might help you find a cheaper alternative.</h5>
                <br>
                <div class="row">
                    <div class='col-md-4'>
                    </div>
                    <div class='col-md-4'>
                        <table class='table table-hover center-align text-center'>
                            <thead>
                                <th class='text-left' scope='col'>Trade</th>
                                <th scope='col'>Call Out Fee</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- using a while loop to print call out prices for each service -->
                                    <?php
                                    while ($row = $tradeR->fetch_assoc()) {
                                        $trade_name = $row["trade"];
                                        $call_out_fee = $row["call_out_fee"];
                                        $call_out_fee = number_format($call_out_fee, 2);

                                        echo "<tbody>
                                            <td class='text-left'>$trade_name</td>
                                            <td>&pound;$call_out_fee</td>
                                        </tbody>";
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class='col-md-4'>
                    </div>
                </div>
            </div>
            <p></p>
            <?php
            // retriving the data which has been submitted into the booking form
            if (isset($_POST['book'])) {
                $fullName = $_POST['fullName'];
                $emailAddress = $_POST['email'];
                $phoneNumber = $_POST['phoneNumber'];
                $address = $_POST['address'];
                $date = $_POST['date'];
                $time = $_POST['time'];
                $trade = $_POST['trade'];
                $newDate = date("d-m-Y", strtotime($date));

                // sanitising the input data
                $fullName = $conn->real_escape_string($fullName);
                $emailAddress = $conn->real_escape_string($emailAddress);
                $phoneNumber = $conn->real_escape_string($phoneNumber);
                $address = $conn->real_escape_string($address);
                $date = $conn->real_escape_string($date);
                $time = $conn->real_escape_string($time);
                $trade = $conn->real_escape_string($trade);

                // selecting trade and call out fee for the specific trade that was selected in the form
                $tradeQ1 = "SELECT trades.trade, trades.call_out_fee FROM trades WHERE trades.id = $trade";
                $tradeR1 = $conn->query($tradeQ1);

                // using while loop to extract the call out fee
                while ($row = $tradeR1->fetch_assoc()) {
                    $trade_name = $row["trade"];
                    $call_out_fee = $row["call_out_fee"];
                }

                // formatting the fee to have 2 decimal places.
                $call_out_fee = number_format($call_out_fee, 2);

                // inserting information from the form into the database table
                $sql = "INSERT INTO appointment (full_name, email, mobile_number, address, date, time, trade_id) VALUES ('$fullName', '$emailAddress', '$phoneNumber', '$address', '$date', '$time', '$trade')";


                $result = $conn->query($sql);

                if (!$result) {

                    echo $conn->error;
                }

                // success message
                echo "<div class='alert alert-success d-flex justify-content-center text-center'>Successfully Booked.<br> Check Email for confirmation!</div>";

                // using PHPMailer to send confirmation of booking to email which has been submitted in the form. 
                // $mail = new PHPMailer();
                // $mail->isSMTP();
                // $mail->SMTPAuth = true;
                // $mail->SMTPSecure = 'ssl';
                // $mail->Host = 'smtp.gmail.com';
                // $mail->Port = '465';
                // $mail->isHTML();
                // $mail->Username = 'nailedit.2407@gmail.com';
                // $mail->Password = 'Nailedit2021';
                // $mail->SetFrom('no-reply@nailedit.com');
                // $mail->Subject = 'Booking Confirmation';
                // $mail->Body = "Hi $fullName, 
                // <br><br> <b>---- Booking Details ----</b><br><br>
                //     <table cellspacing=\"4\" cellpadding=\"4\" border=\"1\" align=\"left\">
                //         <tr>
                //             <th align=\"center\" width=\"300\">Address</th>
                //             <th align=\"center\" width=\"150\">Date</th>
                //             <th align=\"center\" width=\"150\">Time</th>
                //             <th align=\"center\" width=\"200\">Tradesman</th>
                //             <th align=\"center\" width=\"200\">Call Out Fee</th>
                //         </tr>
                //         <tr>
                //             <td align=\"center\" width=\"300\">$address</td>
                //             <td align=\"center\" width=\"150\">$newDate</td>
                //             <td align=\"center\" width=\"150\">$time</td>
                //             <td align=\"center\" width=\"200\">$trade_name</td>
                //             <td align=\"center\" width=\"200\">&pound;$call_out_fee</td>
                //         </tr>
                //     </table><br><br><br>
                // <br><br>Thanks for booking with NailedIT. 
                // <br><br> Kind Regards, <br>NailedIT Team";
                // $mail->AddAddress($emailAddress);

                // $mail->Send();
            } else {
                // form failed message
                $msg = '<div class="alert alert-danger d-flex justify-content-center">There was an error. Please try again.</div>';
            }
            ?>
            <div class="d-flex justify-content-center h-100">
                <div class="register_user_card">
                    <div class="d-flex justify-content-center">
                        <div class="register_brand_logo_container">
                            <img src="img/logo/Don't Just Fix It, Nail IT.png" class="register_brand_logo" alt="NailedIT Logo">
                        </div>
                        <div class="d-flex justify-conten-center form_container">
                            <h1>Book Appointment</h1>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center form_container">

                        <?php
                        // creating a function for an array to hold times between 8am & 8pm with 2 hours between each time slot
                        function create_time_range($start, $end, $interval = '2 hours', $format = '12')
                        {
                            $start_time = strtotime($start);
                            $end_time = strtotime($end);
                            $return_time_format = ($format == '12') ? 'g:i:s A' : 'G:i:s';

                            $current = time();
                            $add_time = strtotime('+' . $interval, $current);
                            $diff = $add_time - $current;

                            $times = array();
                            while ($start_time < $end_time) {
                                $times[] = date($return_time_format, $start_time);
                                $start_time += $diff;
                            }
                            $times[] = date($return_time_format, $start_time);
                            return $times;
                        }

                        $times = create_time_range('8:00', '20:00', '2 hours');
                        ?>

                        <!-- booking appointment with tradesperson form -->

                        <form action="bookAppointment.php" method="post">
                            <!-- full name -->
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="fullName" id="fullName" class="form-control input_full" placeholder="Full Name: *" required>
                            </div>
                            <!-- email address -->
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                </div>
                                <input type="email" name="email" id="email" class="form-control input_email" placeholder="Email Address: *" required>
                            </div>
                            <!-- phone number -->
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name="phoneNumber" id="phoneNumber" class="form-control input_phone" placeholder="Phone Number: *" required>
                            </div>
                            <!-- Address -->
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <input type="text" name="address" id="address" class="form-control input_address" placeholder="Address: *" required>
                            </div>
                            <!-- date -->
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                                <select name="date" id="date" class="form-control input_date" required>
                                    <option value="">Select Date: *</option>

                                    <!-- using a for loop to only show the next 7 days -->
                                    <?php
                                    for ($i = 0; $i <= 7; $i++) { ?>
                                        <option><?php
                                                echo date('l', strtotime("+$i day"));
                                                echo ", </label><label>";
                                                echo date('M d Y', strtotime("+$i day"));

                                                ?></option>
                                        <br>
                                    <?php } ?>
                                </select>

                            </div>
                            <!-- time -->
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                </div>
                                <!-- using foreach loop to print out 2 hour time slots between the times of 8am and 8pm -->
                                <select name="time" id="time" class="form-control input_time" required>
                                    <option value="">Select Time: *</option>
                                    <?php foreach ($times as $key => $val) { ?>
                                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!-- trade needed -->
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                                </div>
                                <!-- using foreach loop to print out all trades that are held in database -->
                                <select name="trade" id="trade" class="form-control input_trade">
                                    <option value="" disabled selected>Tradesman: *</option>
                                    <?php foreach ($tradeR as $output) { ?>
                                        <?= "<option value=$output[id]> $output[trade] </option>" ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="d-flex justify-content-center mt-3 login_container">
                                <button type="submit" name="book" id="book" class="btn login_btn">Book</button>
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