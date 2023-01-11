<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>

<?php
include "db_connect.php";


// Access session variables
session_start();
$username = $_SESSION['username'];
$_SESSION['editing_watchlist'] = $_GET["new_watchlist_name"];
$watchlist_name = $_SESSION['editing_watchlist'];

// Get userID (redundant, remove later)
$sql = "SELECT * FROM user WHERE username = '" . $username . "';";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$userID = "$row[userID]";

// Get the contents of the watchlist from listcontent table
$sql3 = "SELECT * FROM watchlist WHERE userID = '" . $userID . "' AND listName = '" . $watchlist_name . "';";
$result3 = $mysqli->query($sql3);
$row3 = $result3->fetch_assoc();
$listID = "$row3[listID]";
$_SESSION['listID'] = $listID;

echo "<h1> Are You Sure You Want to Delete $watchlist_name ? </h1>";
?>
</body>

<!-- Are You Sure? Form -->
<form class="form-horizontal" action="commit.php">
<fieldset>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
    <button id="button1id" name="rollbackbutton" value="selected" class="btn btn-success">Don't Delete</button>
    <button id="button2id" name="commitbutton" value="selected" class="btn btn-danger">Delete</button>
  </div>
</div>

</fieldset>
</form>

</html>