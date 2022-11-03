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
                
                <i class="fa fa-dashboard"></i> Dashboard / View Orders
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                  Order details of Invoice number #<?php echo $_GET["ord_details"];?>
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
								<th colspan="2"> Product: </th>
                                <th> Quantity: </th>
                                <th> Unit Price: </th>
								<th colspan="2"> Sub-Total:</th>
                           </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                         <?php
					   
					   $link=connect();
					   $id_details=$_GET['ord_details'];
					   $sql="SELECT product.p_name,product.p_image,order_details.qte_pro,order_details.price_pro,order_details.id_pro "; 
					   $sql.=" FROM order_details JOIN product ON order_details.id_pro=product.id_pro ";
					   $sql.="where order_details.id_order='$id_details';";
					   $res = mysqli_query($link, $sql);	
						if(!$res){
						echo "error sql in select user".mysqli_error();
						}
						$tot=0;
						while($pro = mysqli_fetch_assoc($res)){							
							echo "<tbody> <tr>";
							echo "<td>  <img width='60' height='60' src='../admin_area/product_images/".$pro['p_image']."' alt='".$pro['p_name']."'> </td>";
							echo "<td>".$pro['p_name']."</td>";
							echo "<td>";
							echo "<span>".$pro['qte_pro']."</span>";
						    echo "</td>";
							echo "<td id='".$pro['id_pro']."price'>".number_format($pro['price_pro'], 2)."</td>";
							$sub=$pro['price_pro']*$pro['qte_pro'];
							$tot+=$sub;
							echo "<td id='".$pro['id_pro']."total'>".number_format($sub, 2)."</td>";
							echo "</tr></tbody>";
							}
					   ?>

							<tfoot><!-- tfoot Begin -->
                                   
                                   <tr><!-- tr Begin -->
                                       
                                       <th colspan="4">Total</th>
                                       <th colspan="2"><span id="total">
									   <?php 
									   if(isset($tot))echo number_format($tot, 2);
									   else echo "0";		
									   ?>
									   </span><span> $</span></th>
                                       
                                   </tr><!-- tr Finish -->
                                   
                               </tfoot><!-- tfoot Finish -->
								
                               
                           </table><!-- table Finish -->
                           
                       </div><!-- table-responsive Finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
