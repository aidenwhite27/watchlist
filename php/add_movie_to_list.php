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
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$listID = "$row[listID]";

// Insert record into listcontent table and redirect back to edit_watchlist.php
$sql2 = "INSERT INTO listcontent(listID, mediaID, media_type) VALUES ('$listID', '$movieID', 'movie');";
$result = $mysqli->query($sql2) or die("An error has occurred");
echo "movie added";

echo "<br><a href=\"edit_watchlist.php?new_watchlist_name=$editing_watchlist\">Return to watchlist</a>";

?>
</body>
</html>