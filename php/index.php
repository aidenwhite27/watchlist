<html>
<!-- Main Landing Page -->
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
<h1><b>Welcome to WatchList!</b></h1><br><br>

<?php

include "db_connect.php";

?>

<!-- Login Form -->
<form class="form-horizontal" action="login.php">
<fieldset>

<!-- Form Name -->
<legend>Log In</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Username</label>  
  <div class="col-md-4">
  <input id="textinput" name="username" type="text" placeholder="username" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Password</label>
  <div class="col-md-4">
    <input id="passwordinput" name="password" type="password" placeholder="********" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="loginbutton"></label>
  <div class="col-md-4">
    <button id="loginbutton" name="loginbutton" class="btn btn-primary">Log In</button>
  </div>
</div>

</fieldset>
</form>

<!-- SignUp Form -->
<form class="form-horizontal" action="signup.php">
<fieldset>

<!-- Form Name -->
<legend>Sign Up</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Name</label>  
  <div class="col-md-4">
  <input id="textinput" name="newname" type="text" placeholder="ex. John Smith" class="form-control input-md" required="">
  <span class="help-block">Enter your name</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Username</label>  
  <div class="col-md-4">
  <input id="textinput" name="newusername" type="text" placeholder="ex. johnsmith1" class="form-control input-md" required="">
  <span class="help-block">Enter your desired username</span>  
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Password</label>
  <div class="col-md-4">
    <input id="passwordinput" name="newpassword" type="password" placeholder="********" class="form-control input-md" required="">
    <span class="help-block">Enter a secure password</span>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="createaccountbutton"></label>
  <div class="col-md-4">
    <button id="createaccountbutton" name="createaccountbutton" class="btn btn-primary">Create Account</button>
  </div>
</div>

</fieldset>
</form>

<?php

$mysqli->close();

?>

</body>

</html>

		