<?php
function setComments($conn) { //setComments function gets called to insert/apply the comments to the database, located at bottom of dutchrep.php page
	if(isset($_POST['commentSubmit'])) { //if commentSubmit is clicked... execute the following
		$uid = $_POST['uid']; //user id variable. Currently fixed to Anonymous
		$date = $_POST['date']; //date variable; pulls the current date and time to be posted with the comment(s)
		$message = $_POST['message']; //message contains the textarea input from the user ie. the comment
		
		$sql = "INSERT INTO comments (uid, date, message) VALUES ('$uid', '$date', '$message')"; //SQL to insert values into the database
		$result = mysqli_query($conn, $sql); //result is a connection to the query showing the data from the table
	}
}

function getComments($conn) { //function called to get the comments from the SQL database table, located at bottom of dutchrep.php page
	$sql = "SELECT * FROM comments"; //simple SQL statement which pulls all values from the table
	$result = mysqli_query($conn, $sql); //result is a connection to the query showing the data from the table
	
	while($row = $result->fetch_assoc()) { //while loop 
		echo "<div class='comment-box'><p>"; //echoing the comment box div element
			echo $row['uid']."<br><br>"; //echoed user id variable. Fixed to Anonymous. <br> tags between "" allow us to manipulate how the comments appear
			echo $row['date']."<br><br>"; //echoed date variable; pulls the current date and time to be posted with the comment(s)
			echo nl2br($row['message']); //message contains the textarea input from the user ie. the comment
		echo "</p>
		
			<form class='delete-form' method='POST' action='".deleteComments($conn)."'>
				<input type='hidden' name='cid' value='".$row['cid']."'>
				<button type='submit 'name='commentDelete'>Delete</button>
			</form>
		
			<form class='edit-form' method='POST' action='editcomment.php'>
				<input type='hidden' name='cid' value='".$row['cid']."'>
				<input type='hidden' name='uid' value='".$row['uid']."'>
				<input type='hidden' name='date' value='".$row['date']."'>
				<input type='hidden' name='message' value='".$row['message']."'>
				<button>Edit</button>
			</form>
			
		</div>";	/*
					^^^Form elements for the Edit and Delete buttons that the user can click. First element action calls the deleteComments
					function listed below, passing the connection variable to it; this is the variable that presumably connects to the table in the db
					
					The second element action calls the actual editcomment.php file, this is the page that allows the user to edit the comment
					Echo displays these two form element buttons to the screen
					*/
	}
}

function editComments($conn) { //edit comments function being called from its form element above
	if(isset($_POST['commentSubmit'])) { //if statement checking if commentSubmit was selected, ie. the Submit button was clicked
		$cid = $_POST['cid']; //assigning the cid value to the local variable $cid (comment id) so it can be used below in the form element for editing comments
		$uid = $_POST['uid']; //assigning the uid value to the local variable $uid (user id) so it can be used below in the form element for editing comments
		$date = $_POST['date']; //assigning the date value to the local variable $date so it can be used below in the form element for editing comments
		$message = $_POST['message']; //assigning the message value to the local variable $message so it can be used below in the form element for editing comments
		
		$sql = "UPDATE comments SET message='$message' WHERE cid='$cid'"; //simple SQL statement which performs an UPDATE on the comments table 
		$result = mysqli_query($conn, $sql); //result is a connection to the query showing the data from the table
		header("Location: backuppark.php"); /*the edit comments button, textarea, and page, are all related to the 
		comments section located on dutchrep.php file*/
	}
}

function deleteComments($conn){ //delete comments function being called from its form element above
	if(isset($_POST['commentDelete'])) { //if statement checking if commentDelete was selected, ie. the Delete button was clicked
		$cid = $_POST['cid']; //assigning the cid value to the local variable $cid (comment id) so it can be used below in the form element for editing comments
		
		$sql = "DELETE FROM comments WHERE cid='$cid'"; /*simple SQL statement instructing where any comments with the comment id (cid) is equal to $cid the
			local variable to be deleted from the table*/
		$result = mysqli_query($conn, $sql); //run the SQL query function passing the connection variable and $sql
		header("Location: backuppark.php"); //the delete button is related to the comments section located on the dutchrep.php file
	}

}