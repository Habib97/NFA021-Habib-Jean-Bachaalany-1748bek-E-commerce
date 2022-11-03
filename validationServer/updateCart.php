
<?php

 include("../db.php");
$link=connect();
 $idc=$_GET["id_cart"];
 $qte=$_GET["qte"];

if ( isset($idc) ){
			$sql="UPDATE cart SET qte_cart = '$qte' WHERE id_cart = '$idc';"; 
			$res = mysqli_query($link, $sql);
			
				if(!$res){
						echo "error sql in update cart".mysqli_error();
						
				}
    header("location:../cart.php");				
			}
?>
