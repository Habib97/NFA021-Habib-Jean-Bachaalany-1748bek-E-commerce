
<?php
if ( !(isset($_COOKIE['idadmin'])) ){
		header("location:login.php");
		}
		include("includes/db.php");
		$link=connect();
?>
<?php 

    if(isset($_GET['delete_p_cat'])){
        
        $id_cat = $_GET['delete_p_cat'];
        
		
        $sql = "UPDATE categories SET c_available = '0' WHERE id_cat ='$id_cat';";
        
        $res = mysqli_query($link,$sql);
        
        if($res){
            
            echo "<script>alert('One of your categories has been Deleted')</script>";
            
            echo "<script>window.open('index.php?dashboard','_self')</script>";
            
        }
        
    }

?>
