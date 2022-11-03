<?php
if ( !(isset($_COOKIE['idadmin'])) ){
		header("location:login.php");
		}
		include("includes/db.php");
		$link=connect();
?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Products
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Products
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> Product ID: </th>
                                <th> Product Name: </th>
								<th> Product Description: </th>
                                <th> Product Image: </th>
                                <th> Product Price: </th>
								<th> Product Quantity: </th>
                                <th> Product Delete: </th>
                                <th> Product Edit: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                            
                                $sql = "select * from product where p_available='1';";
                                
                                $res = mysqli_query($link,$sql);
          
                                while($pro=mysqli_fetch_array($res)){
                                    
                                    $p_id = $pro['id_pro'];
                                    $p_name = $pro['p_name'];
                                    $p_image = $pro['p_image'];
                                    $p_price = $pro['p_price'];
                                    $p_qte=$pro['p_qte'];    
									$p_desc=$pro['p_desc'];	
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $p_id; ?> </td>
								<td> <?php echo $p_name; ?> </td>
								<td><?php echo $p_desc; ?></td>
                                <td> <img src="product_images/<?php echo $p_image; ?>" width="60" height="60"></td>
                                <td> $ <?php echo $p_price; ?> </td>
                                <td> <?php echo $p_qte; ?></td>
                                <td> 
                                     
                                     <a href="index.php?delete_product=<?php echo $p_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                                <td> 
                                     
                                     <a href="index.php?edit_product=<?php echo $p_id; ?>">
                                     
                                        <i class="fa fa-pencil"></i> Edit
                                    
                                     </a> 
                                    
                                </td>
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
