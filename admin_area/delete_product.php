<?php
if ( !(isset($_COOKIE['idadmin'])) ){
		header("location:login.php");
		}
		include("includes/db.php");
		$link=connect();
?>
<?php 

    if(isset($_GET['delete_product'])){
        
        $p_id = $_GET['delete_product'];
        
		
        $sql = "UPDATE product SET p_available = '0' WHERE id_pro ='$p_id';";
        
        $res = mysqli_query($link,$sql);
        
        if($res){
            
            echo "<script>alert('One of your product has been Deleted')</script>";
            
            echo "<script>window.open('index.php?dashboard','_self')</script>";
            
        }
        
    }

?>
