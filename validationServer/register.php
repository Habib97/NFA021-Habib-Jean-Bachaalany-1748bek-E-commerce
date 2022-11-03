<?php
session_start();
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$email=$_POST["email"];
$pass1=$_POST["pass1"];
$country=$_POST["country"];
$city=$_POST["city"];
$address=$_POST["address"];
$contact=$_POST["contact"];

include("../db.php");
$link=connect();
if ( (isset($fname)) || (isset($lname)) || (isset($email)) || (isset($pass1)) || (isset($country)) || (isset($city)) || (isset($address)) || (isset($contact))){
	$sql="SELECT * FROM user where email='$email';";
	$res = mysqli_query($link, $sql);	
		if(!$res){
			echo "error sql in select user".mysqli_error();
		}
		elseif(mysqli_num_rows($res)>0){	
				$_SESSION["msg"]= "User already exist, choose another email!";
				header("location:../customer_register.php");
		}
		else{
			$sql="insert into user values(null,'$fname','$lname','$email','$pass1','$country','$city','$address','$contact');";
			$res = mysqli_query($link,$sql);
			if(isset($_SESSION["msg"]))unset ($_SESSION["msg"]);
			$_SESSION["msg1"]= "User have been register,now u can log in into your account.";
			header("location:../customer_register.php");
		}
}
mysqli_close($link);
?>