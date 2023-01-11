<html>
<head></head>
<body>
<?php
include "db_connect.php";

session_start();
$userID = $_SESSION['userID'];
$newname = $_GET['newname'];
$new_watchlist_name = $_GET['new_watchlist_name'];

$sql = "UPDATE watchlist INNER JOIN user ON watchlist.userID = user.userID SET listName = '" . $newname . "' WHERE listName = '" . $new_watchlist_name . "' AND watchlist.userID = '" . $userID . "';";
$mysqli->query($sql);

include "homepage.php";
?>
</body>
</html>