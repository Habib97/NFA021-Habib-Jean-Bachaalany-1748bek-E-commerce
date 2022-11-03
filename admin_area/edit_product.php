<?php
if ( !(isset($_COOKIE['idadmin'])) ){
		header("location:login.php");
		}
		include("includes/db.php");
		$link=connect();
?>

<?php 

    if(isset($_GET['edit_product'])){
        
        $p_id = $_GET['edit_product'];
        
        $sql = "select * from product where id_pro='$p_id';";
        
        $res = mysqli_query($link,$sql);
        
        $pro = mysqli_fetch_array($res);
        
        $pro_id = $pro['id_pro'];
        $p_name = $pro['p_name'];
        $p_cat = $pro['id_cat'];
        $p_image = $pro['p_image'];
        $p_price = $pro['p_price'];
        $p_desc = $pro['p_desc'];
        $p_qte=$pro['p_qte'];
    }
        
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Products </title>
</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Products
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                    Edit Product 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
               <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Name </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="p_name" type="text" class="form-control" value="<?php echo $p_name;?>"required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                 
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Category </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <select name="p_cat" class="form-control"><!-- form-control Begin -->
                              
                             
                              
                              <?php 
                              
                              $sql = "select * from categories where c_available='1';";
                              $res = mysqli_query($link,$sql);
                              
                              while ($row_p_cats=mysqli_fetch_array($res)){
                                  
                                  $id_cat = $row_p_cats['id_cat'];
                                  $cat_name = $row_p_cats['cat_name'];
                                 if($id_cat==$p_cat){ 
                                  echo "<option value='$id_cat' selected> $cat_name </option>";
                                 }
								 else  echo "<option value='$id_cat' > $cat_name </option>";
                                 $i--; 
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                 
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Image  </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="p_image" type="file" class="form-control" required>
						  
                          <br>
                          
                          <img width="70" height="70" src="product_images/<?php echo $p_image; ?>" alt="<?php echo $p_image; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Price </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="p_price" type="text" class="form-control" value="<?php echo $p_price;?>" 
						  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
				   
				   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Quantity </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="p_qte" type="text" class="form-control" value="<?php echo $p_qte;?>" 
						  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Desc </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="p_desc" cols="19" rows="6" class="form-control" ><?php echo $p_desc;?></textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Edit Product" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
   
</body>
</html>


<?php 

if(isset($_POST['update'])){
    
    $p_name = $_POST['p_name'];
    $p_cat = $_POST['p_cat'];
    $p_price = $_POST['p_price'];
    $p_desc = $_POST['p_desc'];
	$p_qte=$_POST['p_qte'];
    $p_image = $_FILES['p_image']['name'];
    
    $temp_name = $_FILES['p_image']['tmp_name'];
    $img=$p_name.".jpg";
    
    move_uploaded_file($temp_name,"product_images/$img");
   $sql = "update product set p_name='$p_name',p_desc='$p_desc',p_qte='$p_qte',p_price='$p_price',p_image='$img',p_available='1',id_cat='$p_cat' where id_pro='$pro_id';"; 
   $res = mysqli_query($link,$sql);
        
        if($res){
            
        echo "<script>alert('Your product has been updated Successfully')</script>"; 
            
        echo "<script>window.open('index.php?dashboard','_self')</script>"; 
            
        }
    }
    


?>

