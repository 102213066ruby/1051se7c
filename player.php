<?php
session_start();
require("Msg.php");
require "dbconnect.php";
$userName=$_SESSION['uID'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<STYLE TYPE="text/css"> 
<!-- 
  @import url(http://www.mysite.com/style.css); 
--> 
body{
	font-size:15pt;
	font-family:cursive, Microsoft JhengHei;
	A:active;
	background-image:url(image/1.gif);
background-repeat;

}
p1{
	text-align:right;

	
}
p2{
	text-align:center;

}
h1{	
text-align:center;
color:white;
background-image:url(image/1.gif);
background-repeat;

}
table{
	text-align:center;
}
</STYLE>
<body>
<h1 style="font-family:cursive, Microsoft JhengHei"><?php echo $userName;?>您好&nbsp <a href="logout.php"><image src='image/3.jpg '></a></h1>
<a href="cardingWhere.php" style="color:white;"> 競標&拍賣</a> <a href='change.php'style="color:white;">兌換獎品</a>
<hr/>
<h2 style="font-family:cursive, Microsoft JhengHei; text-align:center; padding:5px;color:white;">您擁有的卡片 </h2>
<div style=" background-image:url(image/6.jpg);background-position:center; width=100 ;height=100;color:white" >
<div><center> <table width="800" border="0" >
<tr>
<td>cardname</td>
</tr>
<?php 
$result=get($userName);
if ($result) {
	while (	$rs=mysqli_fetch_assoc($result)) {
        ?>
        <tr>
        <?php echo"<td>" .$rs['cardName']."</td>" ?>
        <td><a href='carding.php?cardID=<?php echo $rs['cardID'];?>'><img src='image/8.png'width="100" height="60"></a></td>
		</tr>
        <?php 
	}
}
?>
</center>
</table>
</div>
<hr />
</body>