<?php
require("dbconnect.php");

function getbag() {
	global $conn;
	$sql = "select * from bag ;";
	return mysqli_query($conn,$sql);
}
function getCarding(){
    global $conn;
	$sql = "select * from carding;";
	return mysqli_query($conn,$sql);
}
function getMyCarding($userName){
    global $conn;
	//$sql = "select cardID, deadline, highestprice, bidID from carding where userID='$userName';";
    $sql = "select * from carding where userID='$userName';";
	return mysqli_query($conn,$sql);
}
function get($userName){
    global $conn;
	$sql = "select * from card where userName='$userName' ORDER BY cardName Desc;";
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
function update11($highestprice){
    global $conn;
	$highestprice=mysqli_real_escape_string($conn,$highestprice);
	$sql = "update bag set highestprice='$highestprice';";
	return mysqli_query($conn, $sql);
    
}
function update12($userName,$lessMoney){
    global $conn;
	$sql ="update user set Money ='$lessMoney' where userName='$userName'";
	return mysqli_query($conn,$sql);   
}
function update13($userName){
    global $conn;
    $sql = "update bag set userName ='$userName' ";
    return mysqli_query($conn,$sql);
}
function update14($highestprice,$userName){
    global $conn;
    $sql = "update carding set highestprice = '$highestprice' where userName='$userName' ";
    return mysqli_query($conn,$sql);
}
function baginsert($r1,$userName){
	global $conn;
	$sql = "insert into card (cardName,userName) values ('$r1','$userName');";
	return mysqli_query($conn,$sql);
}
function baginsert1($r2,$userName){
	global $conn;
	$sql = "insert into card (cardName,userName) values ('$r2','$userName');";
	return mysqli_query($conn,$sql);
}
function baginsert2($r3,$userName){
	global $conn;
	$sql = "insert into card (cardName,userName) values ('$r3','$userName');";
	return mysqli_query($conn,$sql);
}
function delbagID($bagID,$userName) {
	global $conn;
	$sql = "delete from bag where bagID=$bagID;";
	return mysqli_query($conn,$sql);
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

function getcardID($cardID){
    global $conn;
	$sql = "select * from card where cardID='$cardID';";
	return mysqli_query($conn,$sql);
}

function bid($cardID,$deadline, $bidMoney, $uID) {//賣卡片
    global $conn;
    $cardID=mysqli_real_escape_string($conn,$cardID);
    $deadline=mysqli_real_escape_string($conn,$deadline);
    $bidMoney=mysqli_real_escape_string($conn,$bidMoney);
    $uID=mysqli_real_escape_string($conn,$uID);
    $sql = "insert into carding (cardID, deadline, price, userID) values ('$cardID', '$deadline', '$bidMoney', '$uID');";
    return mysqli_query($conn,$sql);
}

function getCardName($cardID) {//從cardID find cardNmae
    global $conn;
    $cardID=mysqli_real_escape_string($conn,$cardID);
    $sql = "select * from card where cardID='$cardID';";
	$r = mysqli_query($conn,$sql);
    if($r1 = mysqli_fetch_assoc($r)) {
        return $r1['cardName'];
    }
    else {
        $n = "nothing";
        return $n;
    } 
}
?>