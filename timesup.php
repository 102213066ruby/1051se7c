<?php
session_start();
require("Msg.php");
require("User.php");
$act = $_REQUEST['act'];
switch($act){
	case "timesup":
        $userName=whoGetBag();
		$Money=getMoney11($userName);
		$highestprice=gethighestprice();
		$lessMoney=$Money-$highestprice;
		$bagID=getBagID();
        $r1 = rand(1,8);
        $r2 = rand(1,8);
        $r3 = rand(1,8);
        date_default_timezone_set('Asia/Taipei');
        $datetime = date ("Y-m-d H:i:s" , mktime(date('H'), date('i')+30, date('s'), date('m'), date('d'), date('Y'))) ; 
        if($highestprice == NULL &&delbagID($bagID)&&insertbagID($bagID,$userName,$datetime)){
            header("Location: cardingWhere.php");
        }else if($highestprice!==NULL&&update12($userName,$lessMoney)&&baginsert($r1,$userName)&&baginsert1($r2,$userName)&&baginsert2($r3,$userName)&&delbagID($bagID)&&insertbagID($bagID,$userName,$datetime)){
            header("Location: cardingWhere.php");		
		}
		break;
    case "timesup1":
        $userName=$_SESSION['uID'];
		$cardID = getcardID2();
        $highestprice=getcardinghighestprice($cardID);
        $bidName=getbidName($cardID);
		$userID=getuserID($cardID);
		$bidNameMoney=getbidNameMoney($bidName);
		$userIDMoney=getuserIDMoney($userID);
		$lessMoney=$bidNameMoney-$highestprice;
		$MoreMoney=$userIDMoney+$highestprice;
		$cardingcardname=getcardingcardname($cardID);
        //date_default_timezone_set('Asia/Taipei');
        //$datetime = date ("Y-m-d H:i:s");
        if($highestprice!=NULL&&update100($bidName,$lessMoney)&&update101($bidName,$cardID)&&update102($MoreMoney,$userID)&&del100($cardID)){
            echo"success";
            header("Location: player.php");
        }else if($highestprice==NULL&&del100($cardID)){
			header("Location: player.php");
            
        }
		break;
        default:
}   