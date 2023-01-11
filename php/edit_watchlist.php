<!-- Displays a watchlist's content and allows for editing, deletion, and renaming -->

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
    });
  } );
  </script>
  
</head>
<!-- Display movies -->
<?php
include "db_connect.php";

// Access session variables
session_start();
$userID = $_SESSION['userID'];
$_SESSION['editing_watchlist'] = $_GET["new_watchlist_name"];
$watchlist_name = $_SESSION['editing_watchlist'];

echo "<h1>Watchlist: $watchlist_name</h1>";
echo "<a href=\"homepage.php\">Return to profile</a><hr>";
?>

<!-- Search for a movie to add form -->
<form class="form-horizontal" action ="search_keyword.php">
<fieldset>

<!-- Form Name -->
<legend>Search for content to add</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Search</label>  
  <div class="col-md-4">
  <input id="textinput" name="keyword" type="text" placeholder="ex. harry potter" class="form-control input-md" required="">
  <span class="help-block">Enter a movie or tv show title</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="searchbutton"></label>
  <div class="col-md-4">
    <button id="searchbutton" name="searchbutton" class="btn btn-primary">Search</button>
  </div>
</div>

</fieldset>
</form>
<hr>
<?php
echo "<h3>Movies</h3><h5>(Scroll to bottom for TV Shows)</h5><br>";
// Get the contents of the watchlist from listcontent table
$sql3 = "SELECT * FROM watchlist INNER JOIN listcontent ON watchlist.listID = listcontent.listID INNER JOIN movie ON listcontent.mediaID = movie.movieID WHERE userID = '" . $userID . "' AND listName = '" . $watchlist_name . "' AND media_type = 'movie';";
$result3 = $mysqli->query($sql3);
?>

<!-- Display contents using accordion style -->
<div id="accordion">

<?php

if ($result3->num_rows > 0) {
  // output data of each row
  while($row3 = $result3->fetch_assoc()) {
    echo "<img src=\"$row3[poster_url]\" style=\"width:100px;height:150px;\">";
	echo "<div><h3> $row3[title] </h3>";
	echo "<h4> Release Date: $row3[release_date] </h4>";
	echo "<h5> Rating: $row3[vote_average] </h5>";
	echo "<h5> Language: $row3[original_language] </h5>";
	echo "<h5> Genre: $row3[genre] </h5>";
	echo "<p> $row3[overview] </p>";
	
	// Delete button
	echo "<form class=\"form-horizontal\" action=\"delete_movie_from_list.php\">";
	echo "<fieldset><div class=\"form-group\"><label class=\"col-md-4 control-label\" for=\"singlebutton\"></label>";
	echo "<input type=\"hidden\" name=\"movieID\" value=\"$row3[movieID]\">";
	echo "<div class=\"col-md-4\"><button id=\"singlebutton\" name=\"addbutton\" class=\"btn btn-danger\">Remove</button>";
	echo "</div></div></fieldset></form></div>";
  }
} else {
  echo "0 movies";
}


?>

<!-- Display tv shows -->
<?php
include "db_connect.php";

// Access session variables
session_start();
$userID = $_SESSION['userID'];
$_SESSION['editing_watchlist'] = $_GET["new_watchlist_name"];
$watchlist_name = $_SESSION['editing_watchlist'];

// Get the contents of the watchlist from listcontent table
$sql = "SELECT * FROM watchlist INNER JOIN listcontent ON watchlist.listID = listcontent.listID INNER JOIN tvshow ON listcontent.mediaID = tvshow.tvID WHERE userID = '" . $userID . "' AND listName = '" . $watchlist_name . "' AND media_type = 'tv';";
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
	
	// Delete button
	echo "<form class=\"form-horizontal\" action=\"delete_tv_from_list.php\">";
	echo "<fieldset><div class=\"form-group\"><label class=\"col-md-4 control-label\" for=\"singlebutton\"></label>";
	echo "<input type=\"hidden\" name=\"tvID\" value=\"$row[tvID]\">";
	echo "<div class=\"col-md-4\"><button id=\"singlebutton\" name=\"addbutton\" class=\"btn btn-danger\">Remove</button>";
	echo "</div></div></fieldset></form></div>";
  }
} else {
  echo "0 tv shows";
}


?>


</div>