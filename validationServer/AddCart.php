
<html>
<head>
<?php
session_start();
 include("../db.php");
 $idu=$_COOKIE['idu'];
 $idp=$_GET["id_pro"];
 $qte=$_GET["qte"];
if ( !(isset($_COOKIE['idu'])) ){
		$_SESSION["msg"]= "You need to Log in before adding to your cart!<br><h4>already have an account?<br><a href='login.php'>Log in Now</a></h4>";
		header("location:../customer_register.php");
		}
elseif( !isset($idp) ){
	header("location:../index.php");
}
else{
	$link=connect();
	$sql="select * from cart where id_user='$idu' and id_pro='$idp';";
	$res = mysqli_query($link,$sql);
	if(mysqli_num_rows($res)>0){
		echo "<script>alert('Product already added to cart!!');window.history.back();</script>";
				
		}
	else{
		if(isset($qte)) $sql="insert into cart values(null,'$qte','$idp','$idu');";
		else $sql="insert into cart values(null,'1','$idp','$idu');";
		$res = mysqli_query($link,$sql);
		header("location:../cart.php");
	}	
	
}	
?>
</head>
<body>

</body>
</html>