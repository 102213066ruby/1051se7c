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
function checkCarding() {
	var now1= new Date(); //get the current time
	//check each bomb with a for loop
	//array length: number of items in the global array: myArray
	for (j=0; j <= qArray.length;j++) {	
		var today=new Date(qArray[j]['deadline']); //convert the date string into date object in javascript
		if (today <= now1) { 
			//expired, set the explode image and text
			//$("#bomb" + i).attr('src',"images/explode.jpg");
			$("#timerj"+j).html("截標")
            location.href="timesup.php?act=timesup1";
		} else {
			//set the bomb image  and calculate count down
			//$("#bomb" + i).attr('src',"images/bomb.jpg");
			$("#timerj"+j).html(Math.floor((today-now1)/1000))			
		}
	}
}

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
    setInterval(function () {
		checkCarding()
    }, 1000);
};

</script>
<STYLE TYPE="text/css"> 
<!-- 
  @import url(http://www.mysite.com/style.css); 
--> 
body{
	background-image:url(image/6.jpg);
	font-size:15pt;
	font-family:cursive, Microsoft JhengHei;
	A:active;
	
}
table{
	text-align:center;
	color:white;
	font-weight:bolder;
}
h1{
	text-align:center;
	background-image:url(image/1.gif);
	color:white;
}
p{
	text-align:center;
}
a{
	text-decoration:none;
	color:white;
	text-align:center;
}
a:hover{
	color:gold;
}
</STYLE>
<body>
<h1>
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
</h1>
<p>拍賣&競標 </p>
<table width="1000" border="5" align="center">
  <tr>
    <td>卡片名稱</td>
    <td>剩餘時間</td>
    <td>招標底價</td>
    <td>最高出價</td>
    <td>最高得標者</td>
    <td>出價</td>
  </tr>
<?php
$j=0; //counter for bombs
$sql1="select * from carding"; //select all bomb information from DB
$res1=mysqli_query($conn,$sql1) or die ("db錯了");
$arr1 = array();
if ($res1) {
	while ($row1=mysqli_fetch_assoc($res1)) {
        $arr1[]=$row1;
        echo "<tr><td>" .$row1['cardName'] . "</td>";
        echo "<td><div id = 'timerj$j'>--</div></td>";
        echo "<td>". $row1['price'] ."</td>";
        echo "<td>" , $row1['highestprice'], "</td>";
        echo "<td>" . $row1['bidName'] . "</td>";
        echo"<td><a href='cardingsetprice.php?cardID={$row1['cardID']}'><img src =\"image/7.png\"> </a> </td> </tr>";
        $j++;
    }
} else {
	echo "<tr><td>No data found!<td></tr>";
}
?>
<script>
<?php
    echo"var qArray=" .json_encode($arr1);    
?>
</script>

</table>
</hr>
<p>福袋</p>
<table width="1000" border="5" align="center">
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
        echo"<td><a href='setprice.php'><img src =\"image/7.png\"> </a> </td></tr>";
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
<center>
<a href='player.php'>返回</a><a href="logout.php"><image src='image/3.jpg '>
</center>
</body>
</html>