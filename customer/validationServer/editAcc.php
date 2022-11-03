 <?php
session_start();
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$country=$_POST["country"];
$city=$_POST["city"];
$address=$_POST["address"];
$contact=$_POST["contact"];
$idu=$_COOKIE['idu'];
include("../../db.php");
$link=connect();
if ( (isset($fname)) || (isset($lname)) || (isset($country)) || (isset($city)) || (isset($address)) || (isset($contact))){
		$sql = "UPDATE user SET f_name='$fname',l_name='$lname',country='$country',city='$city',adress='$address',contact='$contact' WHERE id_user='$idu'";
		$res = mysqli_query($link, $sql);	
		if(!$res){
			$_SESSION["edit"]= "Failed to edit account.";
			echo "error sql in update user".mysqli_error();
		}
		else {	
				$_SESSION["edit"]= "Account have been edited succesfully!";
				header("location:../my_account?edit_account");
		}
}
mysqli_close($link);
?> 