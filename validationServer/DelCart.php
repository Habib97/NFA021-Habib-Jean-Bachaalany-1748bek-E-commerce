
<?php

 include("../db.php");
$link=connect();
 $idc=$_GET["id_cart"];

if ( isset($idc) ){
			$sql="DELETE FROM cart WHERE id_cart='$idc';"; 
			$res = mysqli_query($link, $sql);
			
				if(!$res){
						echo "error sql in delete cart".mysqli_error();
						
				}
      header("location:../cart.php");				
			}
?>
