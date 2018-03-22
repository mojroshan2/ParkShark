<?php

$conn  = mysqli_connect('localhost', 'root', '', 'commentsection'); //setting the value of the mysql connection variable to "$conn" used variously in the php

if(!$conn){ //if there is not a connection present... run the following code
	die("Connection failed: ".mysqli_connect_error()); //tell the user there was an error and present the specific error code
	
}