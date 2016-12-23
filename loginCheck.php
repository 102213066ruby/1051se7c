<?php
session_start();
require("dbconnect.php");
$userName = $_POST['userName'];
$passWord = $_POST['passWord'];
$userName = mysqli_real_escape_string($conn,$userName);
$sql = "SELECT userName,passWord FROM user WHERE userName='$userName'";
if ($result = mysqli_query($conn,$sql)) {
	if ($row=mysqli_fetch_assoc($result)) {
		if ($row['passWord'] == $passWord) {
			//keep the user ID in session as a mark of login
			//$_SESSION['uID'] = $row['userName'];
            $_SESSION['uID'] = $_POST['userName'];
			//provide a link to the message list UI
			echo "<a href='player.php'>welcome</a>";
		} else {
			//print error message
			echo "Please try again ";
		}
	}
} 
?>
