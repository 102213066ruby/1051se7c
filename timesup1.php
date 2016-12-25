<?php
session_start();
require("Msg.php");
require("User.php");
if(! isset($_POST["act"])) {
	exit(0);
}
$act = $_REQUEST['act'];
switch($act){
	case "timesup":
        $userName=whoGetBag();
        $Money=getMoney11($userName);
        $highestprice=gethighestprice($userName);
        $lessMoney=$Money-$highestprice;
        $bagID=getBagID($userName);
        $r1 = rand(1,8);
        $r2 = rand(1,8);
        $r3 = rand(1,8);
        date_default_timezone_set('Asia/Taipei');
        $datetime = date ("Y-m-d H:i:s" , mktime(date('H'), date('i')+30, date('s'), date('m'), date('d'), date('Y'))) ; 
        if($userName){
            update12($userName,$lessMoney);
            baginsert4($r1,$r2,$r3,$userName);
            delbagID();
            insertbagID($bagID,$datetime,$price);
            echo"success";
            header("Location: cardingWhere.php");
        }else {
            delbagID();
            insertbagID($bagID,$datetime,$price);
            echo"fail";
            header("Location: cardingWhere.php");
        }
		break;
    //時間結束，card裡的userName改成carding的bidName,update user裡面userName=bidName(扣錢).username=carding的userID,
    case "timesup1":
        date_default_timezone_set('Asia/Taipei');
        $datetime = date ("Y-m-d H:i:s");
        $cardID=getbidCardID($datetime);
        $userName=getbidName11($cardID);
        $Money=getbidMoney($userName);
        //原主
        $userID=getbidName12($cardID);
        $Money1=getbidMoney1($userID);
        //原主
        $highestprice=getbidHighestprice($cardID);
        $lessMoney=$Money-$highestprice;
        $higherMoney=$Money+$highestprice;
        //$bidName=
        if($userName){
            if(updatebid($userName,$lessMoney)&&updatebid1($userID,$higherMoney)&&updatebidcard($userName,$cardID)&&delcarding($cardID)){
            echo"success";
            echo"$cardID";
            header("Location: player.php");
            }
        }else{
            if(delcarding($cardID)){
            echo"fail";
            header("Location: player.php");
            }
        }
		break;
        default:
}   
?>