<!--<?php
	date_default_timezone_set('America/New_York'); #PHP needed for date, time, and including 2 other php files
	include 'dbh.inc.php'; #this file enables the connection to the database, and displays an error if connection failed
	include 'comments.inc.php'; #this file includes 
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
<title>Dutch Reports</title>
	<meta charset="utf-8">
    <meta name="description" content="This is a webpage about blah.">
    <meta http-equiv="X-UA compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Dutch Reports</h1>

<div class="float-div">
<a href="backuppark.php">Home</a>
</div>
<!--
<h3>Select a lot:</h3>
<select>
  <option value="Dutch">Dutch</option>
  <option value="Indian">Indian</option>
  <option value="Colonial">Colonial</option>
  <option value="State">State</option>
</select>
<h3>How is the lot right now?</h3>
<select>
  <option value="Almost full/No spots">Almost full/No spots</option>
  <option value="Very few spots">Very few spots</option>
  <option value="A few open spots">A few open spots</option>
  <option value="Nearly empty">Nearly empty</option>
</select>
<br><br>
<?php
echo "<form method='POST' action='".setComments($conn)."'>
	<input type='hidden' name='uid' value='Anonymous'> 
	<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
	<textarea name='message'></textarea><br>
	<button type='submit' name='commentSubmit'>Comment</button>
</form>";
//form element; anon user, records date and time, allows user to input text and press submit button
getComments($conn); //This method calls getComments and passes the connection variable. This is what displays the feed of comments
?> -->
</body>
</html>