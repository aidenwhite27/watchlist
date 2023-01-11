<!-- Create new user account from form -->

<?php

include "db_connect.php";

// Get inputs from SignUp form
$new_username = $_GET["newusername"];
$new_password = $_GET["newpassword"];
$new_name = $_GET["newname"];

// Insert new user into users table
$sql = "INSERT INTO user(userID, username, password, name) VALUES (NULL, '$new_username', '$new_password', '$new_name');";
$result = $mysqli->query($sql) or die("An error has occurred");
echo "Account Created";

?>

<a href="index.php">Return to main page</a>