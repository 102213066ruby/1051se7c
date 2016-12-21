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
        if(update12($userName,$lessMoney)&& baginsert($r1,$userName)&& baginsert1($r2,$userName)&& baginsert2($r3,$userName)&&delbagID($bagID,$userName)){
            echo"success";
            header("Location: player.php");
        }else{
            echo"fail";
        }
		break;
        default:
}