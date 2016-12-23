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
function gethighestprice($userName) {
	global $conn;
    $cardID=$_POST[cardID];
	$userName =mysqli_real_escape_string($conn,$userName);
	$sql = "SELECT highestprice FROM bag WHERE cardID='$cardID'";
	if ($result = mysqli_query($conn,$sql)) {
		if ($row=mysqli_fetch_assoc($result)) {
				return $row['highestprice'];
			} 
		}
	
	return -1;
}
function getcardinghighestprice($userName) {
	global $conn;
    $cardID=$_POST["cardID"];
	$userName =mysqli_real_escape_string($conn,$userName);
	$sql = "SELECT highestprice FROM carding WHERE cardID='$cardID'";
	if ($result = mysqli_query($conn,$sql)) {
		if ($row=mysqli_fetch_assoc($result)) {
				return $row['highestprice'];
			} 
		}
	
	return -1;
}
function getprice($userName) {
	global $conn;
    $cardID=$_POST["cardID"];
	$userName =mysqli_real_escape_string($conn,$userName);
	$sql = "SELECT price FROM carding WHERE cardID='$cardID'";
	if ($result = mysqli_query($conn,$sql)) {
		if ($row=mysqli_fetch_assoc($result)) {
				return $row['price'];
			} 
		}
	
	return -1;
}
//function getcardID1($userName) {
	//global $conn;
	//$userName =mysqli_real_escape_string($conn,$userName);
	//$sql = "SELECT cardID FROM carding WHERE cardID='$cardID'";
	//if ($result = mysqli_query($conn,$sql)) {
		//if ($row=mysqli_fetch_assoc($result)) {
				//return $row['cardID'];
			//} 
		//}
	
	//return -1;
//}
function getbidName() {
	global $conn;
	$userName =mysqli_real_escape_string($conn,$userName);
    $cardID1=cardingGet();
	$sql = "SELECT bidName FROM carding WHERE cardID='$cardID1'";
	if ($result = mysqli_query($conn,$sql)) {
		if ($row=mysqli_fetch_assoc($result)) {
				return $row['bidName'];
			} 
		}
	
	return -1;
}
function getbagID($userName) {
	global $conn;
	$userName =mysqli_real_escape_string($conn,$userName);
	$sql = "SELECT bagID FROM bag WHERE userName='$userName'";
	if ($result = mysqli_query($conn,$sql)) {
		if ($row=mysqli_fetch_assoc($result)) {
				return $row['bagID'];
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