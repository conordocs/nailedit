<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['user_40180801'])) {
    $userIsset = 'true';
} else {
    $userIsset = 'false';
}
?>

<nav class="my-navbar navbar navbar-expand-md navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">NailedIT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link 
                    <?php
                    if (basename($_SERVER['PHP_SELF']) == "index.php") {
                        echo "active";
                    } else {
                        echo "";
                    }
                    ?>
                    " href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Trades</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="tradesElectrician.php">Electrician</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="tradesPlumber.php">Plumber</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="tradesBricky.php">Bricklayer</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="tradesPD.php">Painter & Decorator</a>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link 
                    <?php
                    if (basename($_SERVER['PHP_SELF']) == "products.php" || basename($_SERVER['PHP_SELF']) == "tool.php") {
                        echo "active";
                    } else {
                        echo "";
                    }
                    ?>
                    " href="products.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                    <?php
                    if (basename($_SERVER['PHP_SELF']) == "jobs.php") {
                        echo "active";
                    } else {
                        echo "";
                    }
                    ?>
                    " href="jobs.php">Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                    <?php
                    if (basename($_SERVER['PHP_SELF']) == "about.php") {
                        echo "active";
                    } else {
                        echo "";
                    }
                    ?>
                    " href="about.php">About Us</a>
                </li>

                <?php
                if ($userIsset == 'false') {
                    echo "<li class='nav-item'><a class='nav-link' href='login.php'>Login</a></li>";
                } else {
                    echo "<li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown'>My Account</a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <a class='dropdown-item' href='profile.php'>Profile</a>
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='orders.php'>Orders</a>
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='bookings.php'>Bookings</a>
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='logout.php'>Log Out</a>
                    </div>
                    </li>";
                }

                ?>

            </ul>
        </div>
    </div>

</nav>