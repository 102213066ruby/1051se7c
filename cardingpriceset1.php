<?php
session_start();
require("dbconnect.php");
require("Msg.php");
require("User.php");
if(! isset($_POST["act"])) {
	exit(0);
}
$act =$_POST["act"];
switch($act) {
        case "update112":
		$userName=$_SESSION['uID'];
        $highestprice=$_POST['highestprice'];
		$Money=getMoney1($userName);
		$cardinghighestprice=getcardinghighestprice($userName);
        $price=getprice($userName);
		if ( $highestprice > $cardinghighestprice && $Money > $highestprice &&$highestprice>$price) {
			$lessMoney=$Money-$highestprice;
            echo"$price";
			//update11($highestprice,$userName);
			//update12($userName,$lessMoney);
            update14($highestprice,$userName);
			echo"success </br>";
			//echo"$userName</br>";
			//echo"$lessMoney</br>";
			echo"<a href='cardingWhere.php'> 返回</a>";
		} else if ($highestprice < $cardinghighestprice) {
			echo "Need more Money";
            echo"<a href='cardingWhere.php'>競標&拍賣 </a></br>";
		}else if($Money < $highestprice){
			echo "錢不夠";
            echo"<a href='cardingWhere.php'> 返回</a>";
		}else if($highestprice<$price){
            echo"未超過底價";
            echo"<a href='cardingWhere.php'> 返回</a>";
        }
		break;
		default:
        
}

?>