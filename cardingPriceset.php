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
        case "update111":
		$userName=$_SESSION['uID'];
        $highestprice=$_POST['highestprice'];
		$Money=getMoney1($userName);
		$baghighestprice=getbagprice($userName);
		if ( $highestprice > $baghighestprice && $Money > $highestprice ) {
			$lessMoney=$Money-$highestprice;
			//update11($highestprice,$userName);
			//update12($userName,$lessMoney);
			echo"success </br>";
			echo"$userName</br>";
			echo"$lessMoney</br>";
			echo"<a href='cardingWhere.php'> 返回</a>";
		} else if ($highestprice < $baghighestprice) {
			echo "Need more Money";
            echo"<a href='cardingWhere.php'>競標&拍賣 </a></br>";
		}else if($Money < $highestprice){
			echo "錢不夠";
		}
		break;
        case "update112":
		$userName=$_SESSION['uID'];
        $highestprice=$_POST['highestprice'];
		$Money=getMoney1($userName);
		$cardinghighestprice=getcardinghighestprice($userName);
		if ( $highestprice > $cardinghighestprice && $Money > $highestprice ) {
			$lessMoney=$Money-$highestprice;
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
		}
		break;
		default:
        
        case "bidCard":
}

?>
