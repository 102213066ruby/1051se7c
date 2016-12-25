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
function CardingGet(){
    date_default_timezone_set('Asia/Taipei');
    $datetime = date ("Y-m-d H:i:s");
    global $conn;
	$sql = "select cardID from carding where deadline<='$datetime';";
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
	$sql="update user set Money ='$lessMoney'where userName ='$userName'";
	return mysqli_query($conn,$sql);
}
function update13($userName){
    global $conn;
    $sql = "update bag set userName ='$userName'";
    return mysqli_query($conn,$sql);
}
function update14($highestprice,$cardID){
    global $conn;
    $cardID=$_POST["cardID"];
    $userName=$_SESSION["uID"];
    $sql = "update carding set highestprice = '$highestprice' where cardID='$cardID' ";
    $sql2 = "update carding set bidName = '$userName' where cardID='$cardID' ";
    mysqli_query($conn,$sql);
    mysqli_query($conn,$sql2);
}

function update16($cardID,$bidName){
    global $conn;
    $sql = "update card set userName = '$bidName' where cardID='$cardID' ";
    mysqli_query($conn,$sql);
}
function baginsert($r1,$userName){
	global $conn;
	$sql="insert into card (cardName,userName) values ('$r1','$userName')";
	return mysqli_query($conn,$sql);
}
function baginsert1($r2,$userName){
	global $conn;
	$sql="insert into card (cardName,userName) values ('$r2','$userName')";
	return mysqli_query($conn,$sql);
}
function baginsert2($r3,$userName){
	global $conn;
	$sql="insert into card (cardName,userName) values ('$r3','$userName')";
	return mysqli_query($conn,$sql);
}
function delbagID($bagID) {
	global $conn;
	$sql = "delete from bag where bagID=$bagID;";
	return mysqli_query($conn,$sql);
}
function insertbagID($bagID,$userName,$datetime){
    global $conn;
    $sql = "insert into bag (bagID,expire) values ('1','$datetime');";
    return mysqli_query($conn,$sql);
}
function getcardID($cardID){
    global $conn;
	$sql = "select * from card where cardID='$cardID';";
	return mysqli_query($conn,$sql);
}
function getcardID2(){
    global $conn;
	$sql = "select cardID from carding where deadline < NOW();";
	if ($result = mysqli_query($conn,$sql)) {
		if ($row=mysqli_fetch_assoc($result)) {
				return $row['cardID'];
			} 
		}
	return -1;
}
function bid($cardID,$deadline, $price, $userName,$cardName) {//賣卡片
    global $conn;
    $sql = "insert into carding (cardID, deadline, price, userID,cardName) values ('$cardID', '$deadline', '$price', '$userName','$cardName');";
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
function baginsert4($r1,$r2,$r3,$userName){
	global $conn;
	$sql = "insert into card (cardName,userName) values ('$r1','$userName');";
    $sql1 = "insert into card (cardName,userName) values ('$r2','$userName');";
    $sql2 = "insert into card (cardName,userName) values ('$r3','$userName');";
	mysqli_query($conn,$sql);
    mysqli_query($conn,$sql1);
    mysqli_query($conn,$sql2);
}
function whoGetBag() {
    global $conn;
	//$userName =mysqli_real_escape_string($conn,$userName);
	$sql = "select userName from bag ;";
	if ($result = mysqli_query($conn,$sql)) {
		if ($row=mysqli_fetch_assoc($result)) {
				return $row['userName'];
			} 
		}
	return -1;
}
function reward($userName) {
    global $conn;
    $userName=mysqli_real_escape_string($conn,$userName);
    $sql = "select * from user where userName='$userName';";
    $r = mysqli_query($conn,$sql);
    while($r1 = mysqli_fetch_assoc($r)) {
        $money = $r1['Money'] + 10000;
        break;
    }
    $sql = "update user set Money = $money where userName='$userName';";
    return mysqli_query($conn,$sql);
}
function getMoney11($userName){
    global $conn;
	$sql = "select Money from user where userName='$userName';";
	if ($result = mysqli_query($conn,$sql)) {
		if ($row=mysqli_fetch_assoc($result)) {
				return $row['Money'];
			} 
		}
	
	return -1;
}
function Satisfy($userName) {//玩家有幾種卡片
    global $conn;
    $count = 0;
    $cardtype[0] = 0;
    $cardtype[1] = 0;
    $cardtype[2] = 0;
    $cardtype[3] = 0;
    $cardtype[4] = 0;
    $cardtype[5] = 0;
    $cardtype[6] = 0;
    $cardtype[7] = 0;
    $userName=mysqli_real_escape_string($conn,$userName);
    $sql = "select * from card where userName='$userName';";
    $r = mysqli_query($conn,$sql);
    while($r1 = mysqli_fetch_assoc($r)) {
        $card = $r1['cardName'];
        $index = $card-1;
        $cardtype[$index] = 1;
    }
    
    for($i = 0; $i < count($cardtype); $i++) {
        if($cardtype[$i] == 1) {
            $count++;
        }
    }
    return $count;
}
function update100($bidName,$lessMoney){//扣款
    global $conn;
	$sql="update user set Money ='$lessMoney'where userName ='$bidName';";
    //$sql = "update user set Money = '$lessMoney' where userName='$bidName'; ";
    return mysqli_query($conn,$sql);
}
function update101($bidName,$cardID){
    global $conn;
    $sql = "update card set userName ='$bidName' where cardID ='$cardID';";
    return mysqli_query($conn,$sql);
}
function update102($MoreMoney,$userID){
    global $conn;
    $sql = "update user set Money ='$MoreMoney' where userName ='$userID';";
    return mysqli_query($conn,$sql);
}
function del100($cardID) {
	global $conn;
	$sql = "delete from carding where cardID=$cardID;";
	return mysqli_query($conn,$sql);
}
?>