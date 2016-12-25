<?php
session_start();
require("dbconnect.php");
require("Msg.php");
require("user.php");
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
			update11($highestprice,$userName);
            update13($userName);
			//update12($userName,$lessMoney);
			echo"success </br>";
			echo"<a href='cardingwhere.php'> 返回</a>";
		} else if ($highestprice < $baghighestprice&& $highestprice=$baghighestprice) {
			echo "Need more Money";
            echo"<a href='cardingWhere.php'>競標&拍賣 </a></br>";
		}else if($Money < $highestprice){
			echo "錢不夠";
			echo"<a href='cardingWhere.php'>競標&拍賣 </a></br>";
		}
		break;
		default:
}

?>
