<?php
	date_default_timezone_set('America/New_York'); #PHP needed for date, time, and including 2 other php files
	include 'dbh.inc.php';
	include 'comments.inc.php'; #this file includes 
?>


<!DOCTYPE html>
<html>
<head>
</head>
	<title>Title here</title>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
<body>

<?php
$cid = $_POST['cid']; //assigning the cid value to the local variable $cid (comment id) so it can be used below in the form element for editing comments
$uid = $_POST['uid']; //assigning the uid value to the local variable $uid (user id) so it can be used below in the form element for editing comments
$date = $_POST['date']; //assigning the date value to the local variable $date so it can be used below in the form element for editing comments
$message = $_POST['message']; //assigning the message value to the local variable $message so it can be used below in the form element for editing comments

echo "<form method='POST' action='".editComments($conn)."'>
	<input type='hidden' name='cid' value='".$cid."'>
	<input type='hidden' name='uid' value='".$uid."'>
	<input type='hidden' name='date' value='".$date."'>
	<textarea name='message'>".$message."</textarea><br>
	<button type='submit' name='commentSubmit'>Edit</button>
</form>"; //this form element action calls the editComments function which is located in the comments.inc.php file(passing the connection variable)
//This code runs when the Edit button on this html/php page is clicked 
//echo prints the text to the user
?>

</body>
</html>