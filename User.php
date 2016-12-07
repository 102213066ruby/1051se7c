<?php
require("dbconnect.php");

function checkUser($uID, $Pwd) {
	global $conn;
	$uID =mysqli_real_escape_string($conn,$uID);
	$sql = "SELECT Pwd FROM user WHERE userID='$uID'";
	if ($result = mysqli_query($conn,$sql)) {
		if ($row=mysqli_fetch_assoc($result)) {
			if ($row['password'] === $Pwd) {
				//return role ID
//return $row['role'];
			} 
		}
	}
	//-1 ==> fail
	return -1;
}

/*function checkDepartment($uID, $Pwd) {
	global $conn;
	$uID =mysqli_real_escape_string($conn,$uID);
	$sql = "SELECT password,department FROM user WHERE loginID='$uID'";
	if ($result = mysqli_query($conn,$sql)) {
		if ($row=mysqli_fetch_assoc($result)) {
			if ($row['password'] === $Pwd) {
				//return role ID
				return $row['department'];
			} 
		}
	}
	//-1 ==> fail
	return -1;
}
*/

?>
