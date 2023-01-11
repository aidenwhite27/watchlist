<?php
// This file basically acts as a function that can be included
// to fetch the userID from the user table, provided the username
// and password have already been stored as session variables
include "db_connect.php";

// Access session variables
session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];

// Search the user table for userID and store it as local variable
$sql = "SELECT * FROM user WHERE username = '" . $username . "' AND password = '" . $password . "';";
$result = $mysqli->query($sql);
$user = $result->fetch_assoc();
$userID = "$user[userID]";
?>