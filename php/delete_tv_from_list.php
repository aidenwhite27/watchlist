<html>
<head></head>
<body>
<?php
include "db_connect.php";

// Access session variables
session_start();
$editing_watchlist = $_SESSION['editing_watchlist'];
$tvID = $_GET["tvID"];

// Get listID
$sql = "SELECT * FROM watchlist WHERE listName = '" . $editing_watchlist . "';";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$listID = "$row[listID]";

// Delete record from listcontent table and redirect back to edit_watchlist.php
$sql2 = "DELETE FROM listcontent WHERE listID = '" . $listID . "' AND mediaID = '" . $tvID . "' AND media_type = 'tv';";
$result = $mysqli->query($sql2) or die("An error has occurred");
echo "tv show deleted";

echo "<br><a href=\"edit_watchlist.php?new_watchlist_name=$editing_watchlist\">Return to watchlist</a>";

?>
</body>
</html>