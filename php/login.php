<!-- Validate user login from form -->

<head>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      heightStyle: "content"
    });
  } );
  </script>
  
</head>


<?php

include "db_connect.php";

// Store user info in session variables for future queries
// in other php files
session_start();
$_SESSION['username'] = $_GET["username"];
$_SESSION['password'] = $_GET["password"];
$username = $_SESSION['username'];
$password = $_SESSION['password'];

// Search the user table to validate login
$sql = "SELECT * FROM user WHERE username = '" . $username . "' AND password = '" . $password . "';";
$result = $mysqli->query($sql);

// If a user with matching information is found in the table,
// redirect to their homepage. Otherwise, print "Login Failed"
// and redirect to landing page.
if ($result->num_rows > 0) {
	include "homepage.php";
} else {
  echo "Login Failed";
  echo "<br><a href=\"index.php\">Return to main page</a>";
}
?>