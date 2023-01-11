<!-- Create a new watchlist for the current user -->

<?php
include "db_connect.php";

// Access session variables
session_start();
$username = $_SESSION['username'];
$new_watchlist_name = $_GET["new_watchlist_name"];

// Get userID (redundant, remove later)
$sql = "SELECT * FROM user WHERE username = '" . $username . "';";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$userID = "$row[userID]";

// Insert new watchlist record into watchlist and redirect to edit_watchlist.php
$sql = "INSERT INTO watchlist(listID, userID, listName) VALUES (NULL, '$userID', '$new_watchlist_name');";
$result = $mysqli->query($sql) or die("An error has occurred");
include "edit_watchlist.php";
?>