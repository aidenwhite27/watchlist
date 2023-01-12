<?php

// variables for connection
$host = $_ENV["DB_HOST"];
$user = $_ENV["DB_USER"];
$password = $_ENV["DB_PASSWORD"];
$database = $_ENV["DB_NAME"];

// create a database connection instance
$mysqli = new mysqli($host, $user, $password, $database);

?>