<?php
	date_default_timezone_set('America/New_York');
	include 'dbh.inc.php';
	include 'comments.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Dutch Reports</title>
	<meta charset="utf-8">
    <meta name="description" content="This is a webpage about blah.">
    <meta http-equiv="X-UA compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css"> <!--should be in head--> 
</head>
	
<body>
<h1>Dutch Reports</h1>

<?php

echo "<form method='POST' action='".setComments($conn)."'>
	<input type='hidden' name='uid' value='Anonymous'>
	<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
	<textarea name='message'></textarea><br>
	<button type='submit' name='commentSubmit'>Comment</button>
</form>";

getComments($conn);

?>

</body>
</html>