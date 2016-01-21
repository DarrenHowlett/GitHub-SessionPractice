<?php

session_start();

if ($_SESSION['loggedIn'] != TRUE) {
    echo "No Action Taken As You Were NOT Logged In.";
} else {
    session_destroy();
    echo "You Have Logged Out Successfully.";
}

?>
<!doctype html>
<html>
<head>
    <title>Session Practice</title>
</head>
<body>

<!-- Content -->
<h1>Log Out</h1>
<p>By navigating to this page, a user if logged in will automatically be logged out.  Otherwise no action will be taken.</p>
<!-- /. Content -->

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