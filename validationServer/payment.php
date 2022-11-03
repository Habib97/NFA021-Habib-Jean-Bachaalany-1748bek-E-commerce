<?php
session_start();
$payment=$_POST["payment_mode"];
$tot=$_POST["tot"];
$idu=$_COOKIE['idu'];
include("../db.php");
$link=connect();
if ( !(isset($_COOKIE['idu'])) ){
		header("location:../index.php");
		}
if (isset($payment)){
	$sql="SELECT * FROM cart where id_user='$idu';";
	$rescar = mysqli_query($link, $sql);	
		if(!$rescar){
			echo "error sql in select user".mysqli_error();
		}
		elseif(mysqli_num_rows($rescar)>0){
			
			$myDate = date("Y-m-d");			
			$sql="insert into orders values(null,'$myDate','$tot','$payment','$idu');";
			$res = mysqli_query($link,$sql);
			$id_order = mysqli_insert_id($link);
			
			
			while ( $pro = mysqli_fetch_assoc($rescar) ) {
			
			$id_pro=$pro['id_pro'];
			$sql="select p_price,p_qte from product where id_pro='$id_pro';";
			$res1 = mysqli_query($link,$sql);
			$p=mysqli_fetch_assoc($res1);
			
			$p_price=$p['p_price'];
			$old_qte=$p['p_qte'];
			$qte=$pro['qte_cart'];
            $new_qte=$old_qte-$qte;
			
			$sql="UPDATE product SET `p_qte` = '$new_qte' WHERE id_pro ='$id_pro';";
			$r = mysqli_query($link,$sql);
			
			$sql="insert into order_details values(null,'$qte','$p_price','$idu','$id_order','$id_pro');";
			$r = mysqli_query($link,$sql);
			
			
		}
			$sql="DELETE FROM cart WHERE id_user ='$idu';";
			$res=mysqli_query($link,$sql);
			$_SESSION["succ_payment"]="Your <strong>SUPER</strong> order has been registered.";
			header("location:../customer/my_account.php");
}
}
mysqli_close($link);
?>