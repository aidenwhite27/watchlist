<html>
<!-- Seach movie and tv tables for user input -->

<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      heightStyle: "content"
    });
  } );
  </script>
  
</head>
<body>

<!-- Search Movies -->
<?php

include "db_connect.php";
$keywordfromform = $_GET["keyword"];
$keywordfromform = addslashes($keywordfromform);

// Search movies and store in a view
$sql = "CREATE OR REPLACE VIEW results AS SELECT * FROM movie WHERE title LIKE '%" . $keywordfromform . "%' LIMIT 50;";
$mysqli->query($sql);
$sql2 = "SELECT * FROM results;";
$result = $mysqli->query($sql2);

// Count number of movies found
$sql3 = "SELECT COUNT(*) AS results_count FROM results";
$result2 = $mysqli->query($sql3);
$results_count = $result2->fetch_assoc();

// Search the movie table for the keyword
echo "<h2>Showing all content with \"$keywordfromform\" </h2>";
echo "<h5>$results_count[results_count] movies found</h5>";
echo "<h6><a href=\"homepage.php\">Return to profile</a><hr>";
echo "<h3>Movies</h3><h5>(Scroll to bottom for TV Shows)</h5><br>";

?>

<!-- Display search results in accordion style -->
<div id="accordion">

<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<img src=\"$row[poster_url]\" style=\"width:100px;height:150px;\">";
	echo "<div><h3> $row[title] </h3>";
	echo "<h4> Release Date: $row[release_date] </h4>";
	echo "<h5> Rating: $row[vote_average] </h5>";
	echo "<h5> Language: $row[original_language] </h5>";
	echo "<h5> Genre: $row[genre] </h5>";
	echo "<p> $row[overview] </p>";
	
	// Add button
	echo "<form class=\"form-horizontal\" action=\"add_movie_to_list.php\">";
	echo "<fieldset><div class=\"form-group\"><label class=\"col-md-4 control-label\" for=\"singlebutton\"></label>";
	echo "<input type=\"hidden\" name=\"movieID\" value=\"$row[movieID]\">";
	echo "<div class=\"col-md-4\"><button id=\"singlebutton\" name=\"addbutton\" class=\"btn btn-success\">Add</button>";
	echo "</div></div></fieldset></form></div>";
  }
} else {
  echo "0 movie results";
}

?>

<!-- Search tvShows -->
<?php

include "db_connect.php";
$keywordfromform = $_GET["keyword"];
$keywordfromform = addslashes($keywordfromform);

// Search the tvshow table for the keyword
$sql = "SELECT * FROM tvshow WHERE title LIKE '%" . $keywordfromform . "%' LIMIT 50;";
$result = $mysqli->query($sql);

?>

<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<h3> $row[title] </h3>";
	echo "<div><h5> Release Date: $row[year] </h5>";
	echo "<h5> IMDB Rating: $row[imdb_rating] </h5>";
	echo "<h5> Rotten Tomatoes Rating: $row[rotten_tomatoes] </h5>";
	echo "<h5> Age: $row[age] </h5>";
	echo "<h5> Platforms: $row[platform] </h5>";
	
	// Add button
	echo "<form class=\"form-horizontal\" action=\"add_tv_to_list.php\">";
	echo "<fieldset><div class=\"form-group\"><label class=\"col-md-4 control-label\" for=\"singlebutton\"></label>";
	echo "<input type=\"hidden\" name=\"tvID\" value=\"$row[tvID]\">";
	echo "<div class=\"col-md-4\"><button id=\"singlebutton\" name=\"addbutton\" class=\"btn btn-success\">Add</button>";
	echo "</div></div></fieldset></form></div>";
  }
} else {
  echo "0 tv show results";
}

?>

</div>
</body>
</html>