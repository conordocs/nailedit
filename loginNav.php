<!-- navbar for login page to return to home -->
<nav class="my-navbar navbar navbar-expand-md navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">NailedIT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=="index.php"){ echo "active"; } else { echo ""; }  ?>" href="index.php">Return to Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>