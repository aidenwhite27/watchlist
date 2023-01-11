<!-- DEPRECATED: NOT USED IN CURRENT DESIGN -->

<?php

include "db_connect.php";
$new_movie_title = $_GET["title"];
$new_movie_date = $_GET["date"];
$new_movie_overview = $_GET["overview"];

$new_movie_title = addslashes($new_movie_title);
$new_movie_overview = addslashes($new_movie_overview);

// Search the database for the word home
echo "<h2>Trying to add a new movie: $new_movie_title $new_movie_date $new_movie_overview </h2>";
$sql = "INSERT INTO movie(movieID, title, release_date, overview) VALUES (NULL, '$new_movie_title', '$new_movie_date', '$new_movie_overview');";
$result = $mysqli->query($sql) or die("An error has occurred");

?>

<a href="index.php">Return to main page</a>