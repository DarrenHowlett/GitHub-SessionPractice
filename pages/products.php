<?php

// Sessions
session_start();
if ($_SESSION['loggedIn'] != TRUE) {
    require_once ('../config/normalUser.php');
    echo "Please Log In/Register To See The Products We Have For Sale";
} else {
    require_once ('../config/registeredUser.php');
    ?>
    <!-- Content -->
    <h1>Products</h1>
    <p>This page will show products for sale ONLY if the user is logged in, if the user has not logged in or registered they will not be able to see any products for sale.</p>
    <!-- /. Content -->
    <?php
}
// /. Sessions


// Open Database Connection
$conn = new mysqli($host, $user, $pwrd, $dbase);
if (mysqli_connect_errno()) {
    printf("Database connection failed due to: %s\n", mysqli_connect_error());
    exit();
}
// /. Open Database Connection

?>
<!doctype html>
<html>
<head>
    <title>Session Practice</title>
</head>
<body>

<!-- Navigation -->
<ul>
    <li><a href="../index.php">Home</a></li>
    <li><a href="login.php">Log In</a></li>
    <li><a href="products.php">Products</a></li>
    <li><a href="logout.php">Log Out</a></li>
</ul>
<!-- /. Navigation -->
</body>
</html>
<?php

?>