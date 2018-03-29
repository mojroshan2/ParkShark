<?php
	date_default_timezone_set('America/New_York'); #PHP needed for date, time, and including 2 other php files
	include 'dbh.inc.php'; #this file enables the connection to the database, and displays an error if connection failed
	include 'comments.inc.php'; #this file includes 
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Park Shark</title>

    <meta charset="utf-8">
    <meta name="description" content="This is a webpage about blah.">
    <meta http-equiv="X-UA compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
	<link rel="stylesheet" href = "style.css">

</head>
    
<body>



<img src="shark1.png" class="image" alt="Park Shark" />
<h2>Check current reports!</h2>
<button onclick="window.location.href='dutchrep.php'" class="buttons">Dutch</button>
<button onclick="window.location.href='colrep.html'" class="buttons">Colonial</button>
<button onclick="window.location.href='indrep.html'" class="buttons">Indian</button>
<button onclick="window.location.href='staterep.html'" class="buttons">State</button><br>
<button onclick="window.location.href='empcomrep.html'" class="buttons">Empire Com.</button>
<button onclick="window.location.href='libterrep.html'" class="buttons">Liberty Ter.</button>
<button onclick="window.location.href='facultyrep.html'" class="buttons">Faculty Lots</button>
    
<div class="mapouter"><div class="gmap_canvas"><iframe width="480" height="720" id="gmap_canvas" 
src="https://maps.google.com/maps?q=1400 washington ave, albany ny&t=&z=13&ie=UTF8&iwloc=&output=embed" 
frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
</div>
<br>
<?php
	echo "<form method='POST' action='".getLogin($conn)."'>
		<input type='text' name='uid'>
		<input type='password' name='pwd'>
		<button type='submit' name='loginSubmit'>Login</button>
	</form>";
	
	echo "<form method='POST' action='".userLogout()."'>
		<button type='submit' name='logoutSubmit'>Log out</button>
	</form>";
?>

<h3>Make a report! Select a lot:</h3>
<select onchange="val()" id="parkLot">
  <option value="Dutch">Dutch</option>
  <option value="Indian">Indian</option>
  <option value="Colonial">Colonial</option>
  <option value="State">State</option>
</select>

<h3>How is the lot right now?</h3>
<select onchange="val2()" id="lotCap">
  <option value="Almost Full/No Spots">Almost Full/No Spots</option>
  <option value="Very Few Spots">Very Few Spots</option>
  <option value="A Few Open Spots">A Few Open Spots</option>
  <option value="Nearly Empty">Nearly Empty</option>
</select>
<br><br>

<?php
	if(isset($_SESSION['id'])){
		echo "You are logged in as (username goes here) ";
	}
	else
		echo "You are NOT logged in! ";
	

	if(isset($_SESSION['id'])){
		echo "<form method='POST' action='".setComments($conn)."'>
			<input type='hidden' name='uid' value='".$_SESSION['id']."'> 
			<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
			<textarea name='message'></textarea><br>
			<button type='submit' name='commentSubmit'>Comment</button>
		</form>";
	}
	else
		echo "You need to be logged in to comment!
	<br><br>";
	

//form element; anon user, records date and time, allows user to input text and press submit button
getComments($conn); //This method calls getComments and passes the connection variable. This is what displays the feed of comments
?>

<script>
function val() {
    alertval = document.getElementById("parkLot").value;
    alert(alertval);
}
function val2() {
    alertval2 = document.getElementById("lotCap").value;
    alert(alertval2);
}
</script>

<!--OLD STUFF
<h4>Start here!</h4>
<p>Which Parking Lot are you in?</p>
<div class="float-div">
<a href="dutchrep.php">Dutch</a>
</div>
<div class="float-div">
<a href="colrep.html">Colonial</a>
</div>
<div class="float-div">
<a href="staterep.html">State</a>
</div>
<div class="float-div">
<a href="indrep.html">Indian</a>
</div>
<div class="float-div">
<a href="empcomrep.html">Empire Commons</a>
</div>
<div class="float-div">
<a href="libterrep.html">Liberty Terrace</a>
</div>
<div class="float-div">
<a href="facultyrep.html">Faculty Lots</a>
</div>
-->
</body>
</html>