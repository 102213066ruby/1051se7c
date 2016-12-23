<?php
session_start();
require("Msg.php");
require("User.php");
$act = $_REQUEST['act'];
switch($act){
	case "timesup":
        $userName=$_SESSION['uID'];
        $Money=getMoney1($userName);
        $highestprice=gethighestprice($userName);
        $lessMoney=$Money-$highestprice;
        $bagID=getBagID($userName);
        $r1 = rand(1,8);
        $r2 = rand(1,8);
        $r3 = rand(1,8);
        date_default_timezone_set('Asia/Taipei');
        $datetime = date ("Y-m-d H:i:s" , mktime(date('H'), date('i')+30, date('s'), date('m'), date('d'), date('Y'))) ; 
        if(update12($userName,$lessMoney)&& baginsert($r1,$userName)&& baginsert1($r2,$userName)&& baginsert2($r3,$userName)&&delbagID($bagID,$userName)&&insertbagID($bagID,$userName,$datetime)){
            echo"success";
            header("Location: player.php");
        }else{
            echo"fail";
        }
		break;
        default:
    
    case "timesup1":
        $userName=$_SESSION['uID'];
        $Money=getMoney1($userName);
        $highestprice=getcardinghighestprice($userName);
        $lessMoney=$Money-$highestprice;
        $bidName=getbidName($cardID);
        date_default_timezone_set('Asia/Taipei');
        $datetime = date ("Y-m-d H:i:s");
        if(update15($userName,$lessMoney)&&update17($bidName)&&update18($lessMoney)){
            echo"success";
            echo"$cardID";
            header("Location: player.php");
        }else{
            echo"fail";
        }
		break;
        default:
}     
