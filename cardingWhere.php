<?php
session_start();
require("Msg.php");
$userName = $_SESSION["uID"];
$result=getCarding();
$re=getbag();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>拍賣&競標&福袋</title>
</head>
<script type="text/javascript" src="jquery.js"></script>
<script language="javascript">
function checkBag() {
	now= new Date(); //get the current time
	//check each bomb with a for loop
	//array length: number of items in the global array: myArray
	for (i=0; i < pArray.length;i++) {	
		tday=new Date(pArray[i]['expire']); //convert the date string into date object in javascript
		if (tday <= now) { 
			//expired, set the explode image and text
			//$("#bomb" + i).attr('src',"images/explode.jpg");
			$("#timer"+i).html("截標")
            location.href="timesup.php? act=timesup";
		} else {
			//set the bomb image  and calculate count down
			//$("#bomb" + i).attr('src',"images/bomb.jpg");
			$("#timer"+i).html(Math.floor((tday-now)/1000))			
		}
	}
}

//javascript, to set the timer on windows load event
window.onload = function () {
	//check the bomb status every 1 second
    setInterval(function () {
		checkBag()
    }, 1000);
};
</script>

<body>
<?php 
$r = getMoney($userName);
if ($r) {
 	while (	$r=mysqli_fetch_assoc($r)) {
         ?>
         您現在有<?php echo $r['Money'];?>元
     <?php 
         break;
     }
 }
?>
<p>拍賣&競標 </p>
<hr />
<table width="1000" border="5">
  <tr>
    <td>卡片名稱</td>
    <td>剩餘時間</td>
    <td>招標底價</td>
    <td>最高出價</td>
    <td>最高得標者</td>
    <td>出價</td>
  </tr>
<?php
if ($result) {
	while (	$rs=mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . getCardName($rs['cardID']) . "</td>";
        echo "<td>". $rs['deadline'] ."</td>";
        echo "<td>". $rs['price'] ."</td>";
        echo "<td>" , $rs['highestprice'], "</td>";
        echo "<td>" . $rs['bidName'] . "</td>";
        echo"<td><a href='cardingsetprice.php'>出價 </a> </td> </tr>";
    }
} else {
	echo "<tr><td>No data found!<td></tr>";
}
?>
</table>
<p>福袋</p>
<hr />
<table width="1000" border="5">
  <tr>
    <td>福袋</td>
    <td>剩餘時間</td>
    <td>最高出價</td>
    <td>最高得標者</td>
    <td>出價</td>
  </tr>
<?php
$i=0; //counter for bombs
$sql="select * from bag"; //select all bomb information from DB
$res=mysqli_query($conn,$sql) or die ("db錯了");
$arr = array();
      if($row=mysqli_fetch_assoc($res)){
         $arr[]=$row  ; 
		echo"<tr><td>" . $row['bagID'] . "</td>";
		echo"<td><div id = 'timer$i'>--</div></td>";
		echo"<td>".$row['highestprice']."</td>";
		echo"<td>" . $row['userName'] . "</td>";        
        echo"<td><a href='setprice.php'>出價 </a> </td> </tr>";
        $i++;
     }else{
         echo"沒有福袋了";
     }
?>
<script>
<?php
    echo"var pArray=" .json_encode($arr);    
?>
</script>

</table>
<a href='loginForm.php'>登出</a>
</body>
</html>