<!-- User profile landing page which displays their watchlists -->

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

<?php
include "db_connect.php";
include "get_userID.php";

// Store userID as session variable and access username and password variables
session_start();
$_SESSION['userID'] = $userID;
$username = $_SESSION['username'];
$password = $_SESSION['password'];

echo "<h1>$username's WatchLists:</h1><br>";

// Return all of the user's watchlists from watchlist table
$sql = "SELECT * FROM user INNER JOIN watchlist ON user.userID = watchlist.userID WHERE username = '" . $username . "' AND password = '" . $password . "';";
$result = $mysqli->query($sql);

?>

<!-- Display user's watchlists using accordion style -->
<div id="accordion">

<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<h6>$row[listName]</h6>";
	
	echo "<div><p>";
	
	
	// Edit Button
	echo "<form class=\"form-horizontal\" action=\"edit_watchlist.php\">";
	echo "<fieldset><div class=\"form-group\"><label class=\"col-md-4 control-label\" for=\"singlebutton\"></label>";
	echo "<input type=\"hidden\" name=\"new_watchlist_name\" value=\"$row[listName]\">";
	echo "<div class=\"col-md-4\"><button id=\"singlebutton\" name=\"editbutton\" class=\"btn btn-success\">Edit</button>";
	echo "</div></div></fieldset></form>";
	
	// Delete Button
	echo "<form class=\"form-horizontal\" action=\"delete_watchlist.php\">";
	echo "<fieldset><div class=\"form-group\"><label class=\"col-md-4 control-label\" for=\"singlebutton\"></label>";
	echo "<input type=\"hidden\" name=\"new_watchlist_name\" value=\"$row[listName]\">";
	echo "<div class=\"col-md-4\"><button id=\"singlebutton\" name=\"deletebutton\" class=\"btn btn-danger\">Delete</button>";
	echo "</div></div></fieldset></form>";
	
	// Rename Form
	echo "<form class=\"form-horizontal\" action=\"rename_watchlist.php\">";
	echo "<fieldset><div class=\"form-group\"><label class=\"col-md-4 control-label\" for=\"textinput\">Rename Watchlist</label>";
	echo "<div class=\"col-md-4\"><input id=\"textinput\" name=\"newname\" type=\"text\" placeholder=\"ex. Star Trek Movies\" class=\"form-control input-md\">";
    echo "<input type=\"hidden\" name=\"new_watchlist_name\" value=\"$row[listName]\">";
	echo "<span class=\"help-block\">Enter new name</span></div></div>";  
	echo "<div class=\"form-group\"><label class=\"col-md-4 control-label\" for=\"singlebutton\"></label>";
    echo "<div class=\"col-md-4\"><button id=\"singlebutton\" name=\"singlebutton\" class=\"btn btn-primary\">Rename</button>";
	echo "</div></div></fieldset></form>";
	
	echo "</p></div>";
  }
} else {
  echo "0 watchlists";
}


?>

</div>

<hr>

<!-- Create New Watchlist Form -->
<form class="form-horizontal" action = "create_watchlist.php">
<fieldset>

<!-- Form Name -->
<legend>Make A New WatchList</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Name</label>  
  <div class="col-md-4">
  <input id="textinput" name="new_watchlist_name" type="text" placeholder="ex. Spider-Man Movies" class="form-control input-md" required="">
  <span class="help-block">Enter a title for your list</span>  
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="newwatchlistsubmit"></label>
  <div class="col-md-4">
    <button id="newwatchlistsubmit" name="newwatchlistsubmit" class="btn btn-primary">Create WatchList</button>
  </div>
</div>

</fieldset>
</form>