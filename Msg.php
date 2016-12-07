<?php
require("dbconnect.php");

function push($mid) {
	global $conn;
	$sql = "update guestbook set push = push+1 where id=$mid;";
	return mysqli_query($conn,$sql);
}

function getMsgList() {
	global $conn;
	$sql = "select * from student S ;";
	return mysqli_query($conn,$sql);
}
function get($userName){
    global $conn;
	$sql = "select * from card where userName='$userName';";
	return mysqli_query($conn,$sql);
}
function getMoney($userName){
    global $conn;
	$sql = "select Money  from user where userName='$userName';";
	return mysqli_query($conn,$sql);
}
function fire($department) {
	global $conn;
	$sql = "select * from student where employer= '$department' ;";
	return mysqli_query($conn,$sql);
}
function firefire($loginID) {
	global $conn;
	$sql = "update student set employer =null where loginID = '$loginID';";
	return mysqli_query($conn,$sql);
}
function hire() {
	global $conn;
	$sql = "select * from student  where employer is null ORDER BY salary DESC  ;";
	return mysqli_query($conn,$sql);
}
function hirehire($loginID,$department) {
	global $conn;
	$sql = "update student set employer = '$department' where loginID = '$loginID';";
	return mysqli_query($conn,$sql);
}

function update ($name,$skill,$status,$salary,$birth,$employer,$loginID){
    global $conn;
    $loginID=mysqli_real_escape_string($conn,$loginID);
	$name=mysqli_real_escape_string($conn,$name);
	$skill=mysqli_real_escape_string($conn,$skill);
	$status=mysqli_real_escape_string($conn,$status);
    $salary=mysqli_real_escape_string($conn,$salary);
    $birth=mysqli_real_escape_string($conn,$birth);
    $employer=mysqli_real_escape_string($conn,$employer);
$sql = "update student set name='$name',
                            skill= '$skill',
                            status='$status',
                            salary='$salary',
                            birth='$birth',
                            employer='$employer'
                            where loginID='$loginID';";
return mysqli_query($conn, $sql);
    
}
function addMsg($title, $msg, $name) {
	global $conn;
	$title=mysqli_real_escape_string($conn,$title);
	$msg=mysqli_real_escape_string($conn,$msg);
	$name=mysqli_real_escape_string($conn,$name);
	if ($title) { //if title is not empty
		$sql = "insert into guestbook (title, msg, name) values ('$title', '$msg','$name');";
		return mysqli_query($conn, $sql);
	} else {
		return false;
	}
}

function delMsg($msgID) {
	global $conn;
	$sql = "delete from guestbook where id=$msgID;";
	return mysqli_query($conn,$sql);
}



?>