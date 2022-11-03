 <?php
session_start();
$pass1=$_POST["pass1"];
$idu=$_COOKIE['idu'];
include("../../db.php");
$link=connect();
if ( (isset($pass1)) ){
	$sql="SELECT password FROM user where id_user='$idu';";
	$res = mysqli_query($link, $sql);	
		if(!$res){
			echo "error sql in select user".mysqli_error();
		}
		elseif(mysqli_num_rows($res)>0){
				$u=mysqli_fetch_assoc($res);
				$passold=$u['password'];
				if($pass1 == $passold){
				$_SESSION["chg"]= "Password cannot be same as the old one.";
				header("location:../my_account?change_pass");
				}
		}
		$sql1 = "UPDATE user SET password='$pass1' WHERE id_user='$idu'";
		$res = mysqli_query($link, $sql1);	
		if(!$res){
			echo "error sql in update user".mysqli_error();
		}
		elseif( (mysqli_affected_rows($link)) == 1 ){	
				$_SESSION["chg"]= "Password have been changed succesfully!";
				header("location:../my_account?change_pass");
		}
		else{
			$_SESSION["chg"]= "Failed to change password.";
			header("location:../my_account?change_pass");
		}
}
mysqli_close($link);
?>