<?php
session_start();
require("Msg.php");
$userName=$_SESSION['uID'];
$result=getMoney($userName);
if ($result) {
	while (	$rs=mysqli_fetch_assoc($result)) {
	echo "<tr><td>" . $rs['Money'] . "</td>";

    }
}
    
?>