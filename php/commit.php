<!-- This is the transaction that double checks if a user wants to delete watchlist -->

<?php

include "db_connect.php";

session_start();
$listID = $_SESSION['listID'];
$choice = $_GET["commitbutton"];

$mysqli->autocommit(false);

// Delete the watchlist's content from listcontent then delete the watchlist,
// or rollback if user selected no
$mysqli->query("START TRANSACTION;");

$sql4 = "DELETE FROM listcontent WHERE listID = '" . $listID . "';";
$sql5 = "DELETE FROM watchlist WHERE listID = '" . $listID . "';";
$mysqli->query($sql4) or die("An error has occurred");
$mysqli->query($sql5) or die("An error has occurred");

if($choice == "selected"){
	$mysqli->query("COMMIT;");
}
else{
	$mysqli->query("ROLLBACK;");
}

$mysqli->autocommit(true);
include "homepage.php";
?>