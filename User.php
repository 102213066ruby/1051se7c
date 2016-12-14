<?php
require("dbconnect.php");
function getMoney1($userName) {
	global $conn;
	$userName =mysqli_real_escape_string($conn,$userName);
	$sql = "SELECT Money FROM user WHERE userName='$userName'";
	if ($result = mysqli_query($conn,$sql)) {
		if ($row=mysqli_fetch_assoc($result)) {
				return $row['Money'];
			} 
		}
	
	return -1;
}

function getbagprice($userName) {
	global $conn;
	$userName =mysqli_real_escape_string($conn,$userName);
	$sql = "SELECT highestprice FROM bag ";
	if ($result = mysqli_query($conn,$sql)) {
		if ($row=mysqli_fetch_assoc($result)) {
				//return role ID
				return $row['highestprice'];
			} 
		}
	
	//-1 ==> fail
	return -1;
}


?>