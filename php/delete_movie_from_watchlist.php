<html>
<head></head>
<body>
<?php
include "db_connect.php";

// Access session variables
session_start();
$editing_watchlist = $_SESSION['editing_watchlist'];
$movieID = $_GET["movieID"];

// Get listID
$sql = "SELECT * FROM watchlist WHERE listName = '" . $editing_watchlist . "';";
$stupid = $mysqli->query($sql);
$row = $stupid->fetch_assoc();
$listID = "$row[listID]";

// Insert record into listcontent table and redirect back to edit_watchlist.php
$sql2 = "DELETE FROM listcontent WHERE listID = '" . $listID . "' AND mediaID = '" . $movieID . "' AND media_type = 'movie';";
$dumb = $mysqli->query($sql2) or die("An error has occurred");
echo "movie deleted";

echo "<a href=\"edit_watchlist.php?new_watchlist_name=$editing_watchlist\">Return to watchlist</a>";

?>
</body>
</html>