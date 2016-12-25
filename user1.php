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
function getcardinghighestprice($userName,$cardID1) {
	global $conn;
	$sql = "SELECT highestprice FROM carding WHERE cardID='$cardID1'";
	if ($result = mysqli_query($conn,$sql)) {
		if ($row=mysqli_fetch_assoc($result)) {
				return $row['highestprice'];
			} 
		}
	
	return -1;
}
function getuserID($datetime) {
	global $conn;
	$sql = "SELECT userID FROM carding WHERE deadline<= '$datetime' ";
    $result = mysqli_query($conn,$sql);
	if ($row=mysqli_fetch_assoc($result)) {
		return $row['userID'];
	} 
	

}

?>