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

function register($UserID,$password) {
	global $conn;
	$UserID =mysqli_real_escape_string($conn,$UserID);
    $password =mysqli_real_escape_string($conn,$password);
	$money="1000";
    $sql = "insert into user (userName, passWord,Money) values ('$UserID', '$password','$money')";
	if (mysqli_query($conn,$sql)) {
        $card1 = rand(1,8);
        $card2 = rand(1,8);
        $card3 = rand(1,8);
        
        $sql_2 = "insert into card (cardName, userName) values ('$card1', '$UserID'),
        ('$card2', '$UserID'),('$card3', '$UserID')";
        if (mysqli_query($conn,$sql_2)) {
            //
        } else {
            echo "insert card error";
        }
        return true;
    } else {
        return false;
    }
}


?>