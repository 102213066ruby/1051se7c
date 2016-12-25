<?php
session_start();
require("dbconnect.php");
require("Msg.php");
require("User.php");
if(! isset($_POST["act"])) {
	exit(0);
    
}
$userName=$_SESSION['uID'];

$act =$_POST["act"];
switch($act) {   

    case "sell":
		$userName=$_POST['userName'];
        $cardID=$_POST['cardID'];
        $deadline=$_POST['deadline'];
        $price=$_POST['price'];
		$cardName=$_POST['cardName'];
        if(bid($cardID,$deadline,$price,$userName,$cardName)){
            header("Location:player.php");
            echo"sucess";
        }else{
            echo "Error";
        }
        break;
    
    case "update":
        $loginID=$_SESSION['uID'];
        $name=$_POST['name'];
        $skill=$_POST['skill'];
        $status=$_POST['status'];
        $salary=$_POST['salary'];
        $birth=$_POST['birth'];
        $employer=$_POST['employer'];
        if(update($name,$skill,$status,$salary,$birth,$employer,$loginID)){
            echo"sucess";
        }else{
            echo "Error";
        }
        break;
	case "login":
		$UserID = $_POST['id'];
		$password = $_POST['pwd'];
		$role=checkUser($loginName, $password);
        $department = checkDepartment($loginName, $password);
		if ( $role == 0 ) {
			//set login session mark
			$_SESSION['uID'] = $loginName;
			$_SESSION['role'] = $role;
            $_SESSION['department'] = $department;
			echo "login OK<br>";
			echo "<a href='index.php'>guest Book Home</a>";
        }else if ( $role> 0 ) {
			//set login session mark
			$_SESSION['uID'] = $loginName;
			$_SESSION['role'] = $role;
            $_SESSION['department'] = $department;
			echo "login OK<br>";
			echo "<a href='index.php'>guest Book Home</a>";
		} else {
			//set login mark to empty
			$_SESSION['uID'] = "";
			$_SESSION['role'] = -1;
			echo "Login failed.<br>";
			echo "<a href='loginForm.php'>login</a>";
		}
    case "register":
		$UserID = $_POST['userName'];
		$password = $_POST['passWord'];
		if(register($UserID,$password)) {
            header("Location:loginForm.php");
        } else {
            echo "註冊失敗";
            header("Location:register.php");
        }
	default:
}
?>