
                       
                       
					    <div id="cart" class="col-md-14"><!-- col-md-9 Begin -->
						 <div class="box-header"><!-- box-header Begin -->
						
               <center><!-- center Begin -->
                         
						 <?php
						   if(isset($_GET["id_details"]))echo"<h1>Order details of Invoice number #".$_GET["id_details"]."</h1>";
						   
						   ?>
                           
                       </center><!-- center Finish -->
              
					     <div class="table-responsive"><!-- table-responsive Begin -->
                           
                           <table class="table"><!-- table Begin -->
                               
                               <thead><!-- thead Begin -->
                                   
                                   <tr><!-- tr Begin -->
                                       
                                       <th colspan="2">Product</th>
                                       <th>Quantity</th>
                                       <th>Unit Price</th>
									   
                                       <th colspan="2">Sub-Total</th>
                                       
                                   </tr><!-- tr Finish -->
                                   
                               </thead><!-- thead Finish -->
							      
								  <?php
					   
					   $link=connect();
					   $id_details=$_GET['id_details'];
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
							echo "<td>  <img class='img-responsive' src='../admin_area/product_images/".$pro['p_image']."' alt='".$pro['p_name']."'> </td>";
							echo "<td><a href='../details.php?id_pro=".$pro['id_pro']."' >".$pro['p_name']."</a></td>";
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
					   
                 </div>
				
                       
                   </div><!-- box-header Finish -->
	