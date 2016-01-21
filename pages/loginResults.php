<?php

// Sessions
session_start();
$_SESSION['loggedIn'] = FALSE;
// /. Session

// Required/Included Files
require_once ('../config/normalUser.php');
// /. Required/Included Files

// Open Database Connection
$conn = new mysqli($host, $user, $pwrd, $dbase);
if (mysqli_connect_errno()) {
    printf("Database connection failed due to: %s\n", mysqli_connect_error());
    exit();
}
// /. Open Database Connection

// Log In Form Validation
if (isset($_POST['submit'])) {

    $email  = $_POST['email'];
    $pwrd   = $_POST['pwrd'];

    if (empty($email) || empty($pwrd)) {
        echo "All Fields Must Be Completed To Log In.";
    } else {

        $select = "SELECT `email` FROM `user` WHERE `email` LIKE BINARY '".$email."'";
        $result = $conn -> query($select) or die($conn.__LINE__);

        if (!$result) {
            echo "Your email DOES NOT match any we have on record, please try again or register.";
        } else {

            $select = "SELECT `password` FROM `user` WHERE `email` LIKE BINARY '".$email."'";
            $result = $conn -> query($select) or die($conn.__LINE__);

            while ($row = $result -> fetch_assoc()) {
                $dbpwrd = $row['password'];

                $pwrdVerify = password_verify($pwrd, $dbpwrd);

                if ($pwrdVerify != TRUE) {
                    echo "Your password DOES NOT match what we have on file, please try again";
                } else {
                    $_SESSION['email'] = $email;
                    $_SESSION['pwrd'] = $pwrd;
                    $_SESSION['loggedIn'] = TRUE;

                    echo "Welcome ".$_SESSION['email']." You Have Successfully Logged In";
                }
            }
        }
    }

}
// /. Log In Form Validation

?>
<!doctype html>
<html>
<head>
    <title>Session Practice</title>
</head>
<body>

<!-- Content -->
<h1>Log In Results</h1>
<p>This page will show the user the results of them trying to log in.  If they have entered details that match an entry in the database then they will be logged in, otherwise they will be shown an error message and asked to try again or register.</p>
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
// Close Database Connection
mysqli_close($conn);
// /. Close Database Connection
?>