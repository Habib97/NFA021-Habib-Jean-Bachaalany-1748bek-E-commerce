<?php
session_start();
$email=$_POST["email"];
$pass=$_POST["pass"];

include("../db.php");
$link=connect();
if ( (isset($email)) || (isset($pass1)) ){
	$sql="SELECT id_user,f_name FROM user where email='$email' and password='$pass';";
		$res = mysqli_query($link,$sql);
		if(!$res){
			echo "error sql in select id user".mysqli_error();
		}
		elseif(mysqli_num_rows($res)>0){
				$u=mysqli_fetch_assoc($res);
				$id=$u['id_user'];
				$temps_expire = time() + 365*24*3600;
				setcookie('idu',$id, $temps_expire,"/"); 
				header("location:../success_login.php");
		}
		else{
			$_SESSION["lgn"]= "User not exist, please check your email or your password.";
			header("location:../login.php");
		}
}
mysqli_close($link);
?>