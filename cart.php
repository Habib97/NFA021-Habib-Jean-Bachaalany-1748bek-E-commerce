<?php
session_start();
 include("db.php");
if ( !(isset($_COOKIE['idu'])) ){
		$_SESSION["msg"]= "You need to Log in before adding to your cart!<br><h4>already have an account?<br><a href='login.php'>Log in Now</a></h4>";
		header("location:customer_register.php");
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"><!--for mobile and pc-->
    <title>SUPERTECH Store</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

   
 <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
		   
               
               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
                   <img src="images/logoTech.png" alt="SUPERTECH Store Logo" >
				   
               </a><!-- navbar-brand home Finish -->
			   
			 
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               
			   </button>
			        <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only">Toggle Search</span>
                   
                   <i class="fa fa-search"></i>
                   
               </button>
				
				
			   
           </div><!-- navbar-header Finish -->
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
               <div class="padding-nav"><!-- padding-nav Begin -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
                       <li class="active">
                           <a href="index.php">Home</a>
                       </li>
                       <li>
                           <a href="shop.php">Shop</a>
                       </li>
                       <li>
                           <a href="customer/my_account.php">My Account</a>
                       </li>
					    <li>
                           <a href="customer_register.php">Register</a>
                       </li>
                       <li>
                           <a href="cart.php">Shopping Cart</a>
                       </li>
                       <li>
                           <a href="contact.php">Contact Us</a>
                       </li>
					   
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <a href="cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   
                   <i class="fa fa-shopping-cart"></i>
                  <?php
				   if ( isset($_COOKIE['idu']) ) {
					   $idu=$_COOKIE['idu'];
					   $link=connect();
					    $sql="SELECT count(1) FROM cart ";
						$sql.="JOIN product ON cart.id_pro=product.id_pro ";
						$sql.=" where cart.id_user='$idu' and product.p_available='1';";
						$res = mysqli_query($link, $sql);	
						$row = mysqli_fetch_array($res);
						$item = $row[0];
						
						if(!$res){
						echo "error sql in select user".mysqli_error();
						}
						elseif($item == 0){	
						echo "<span> 0 Items In Your Cart </span>";
						}
						else{
						echo "<span> $item Items In Your Cart</span>";
						}
					mysqli_close($link);
					}
					else {
						echo "<span> 0 Items In Your Cart </span>";
					}
					
				   ?>
                   
                   
               </a><!-- btn navbar-btn btn-primary Finish -->
               
               
           </div><!-- navbar-collapse collapse Finish -->
		   <div class="navbar-collapse collapse right" id="search">
						<form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->
                       
							<div class="input-group"><!-- input-group Begin -->
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                           <span class="input-group-btn"><!-- input-group-btn Begin -->
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               
                               <i class="fa fa-search"></i>
                               
                           </button><!-- btn btn-primary Finish -->
                           
                           </span><!-- input-group-btn Finish -->
                           
                       </div><!-- input-group Finish -->
                       
                   </form><!-- navbar-form Finish -->
               
               </div>
           
       </div><!-- container Finish -->
       
   </div><!-- navbar navbar-default Finish -->    
       
   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Cart
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div id="cart" class="col-md-9"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <form action="cart.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
                       
                       <h1>Shopping Cart</h1>
					     <p class="text-muted">You currently have <?php echo $item;?> item(s) in your cart</p>
					     
                       <div class="table-responsive"><!-- table-responsive Begin -->
                           
                           <table class="table"><!-- table Begin -->
                               
                               <thead><!-- thead Begin -->
                                   
                                   <tr><!-- tr Begin -->
                                       
                                       <th colspan="2">Product</th>
                                       <th>Quantity</th>
                                       <th>Unit Price</th>
									   <th colspan="1">Delete</th>
                                       <th colspan="2">Sub-Total</th>
                                       
                                   </tr><!-- tr Finish -->
                                   
                               </thead><!-- thead Finish -->
                          
                               
							   <?php
					   $idu=$_COOKIE['idu'];
					   $link=connect();
					   $sql="SELECT product.id_pro,product.p_name,product.p_price,product.p_qte,product.p_image,cart.qte_cart,cart.id_cart "; 
					   $sql.=" FROM cart JOIN product ON cart.id_pro=product.id_pro ";
					   $sql.="where cart.id_user='$idu' and product.p_available='1';";
						$res = mysqli_query($link, $sql);	
					
						if(!$res){
						echo "error sql in select product".mysqli_error();
						}
						elseif($item>0){
							$ids=array();
							$j=0;
							$tot=0;
							while($pro = mysqli_fetch_assoc($res)){
							$ids[$j]=$pro['id_pro'];
							$j++;							
							echo "<tbody> <tr>";
							echo "<input type='hidden' value='".$pro['id_cart']."' id='".$pro['id_pro']."idcart'> ";
							echo "<td>  <img class='img-responsive' src='admin_area/product_images/".$pro['p_image']."' alt='".$pro['p_name']."'> </td>";
							echo "<td><a href='details.php?id_pro=".$pro['id_pro']."' >".$pro['p_name']."</a></td>";
							echo "<td>";
							echo "<button type='button'  value='plus' class='btn btn-success' onclick='ProAdd(".$pro['id_pro'].")'>";
                            echo "<i class='fa fa-plus' ></i>";
                            echo "</button>";
							echo "<span>   </span>";
							echo "<input type='number' value='".$pro['qte_cart']."' id='".$pro['id_pro']."qte' name='qte' class='from-control' min='1' max='".$pro['p_qte']."' readonly>";
							echo "<input type='hidden' value='".$pro['p_qte']."' id='".$pro['id_pro']."max'> ";
							echo "<button type='button'  value='minus' class='btn btn-danger' onclick='ProLess(".$pro['id_pro'].")'>";
                            echo "<i class='fa fa-minus' ></i>";
                            echo "</button>";
							echo "</td>";
							echo "<td id='".$pro['id_pro']."price'>".number_format($pro['p_price'], 2)."</td>";
							$sub=$pro['p_price']*$pro['qte_cart'];
							$tot+=$sub;
							echo "<td>";
							echo "<button type='button'  value='delete' class='btn btn-warning' onclick='Delpro(".$pro['id_cart'].")'>";
                            echo "<i class='fa fa-trash' ></i>";
                            echo "</button>";
							echo "</td>";
							echo "<td id='".$pro['id_pro']."total'>".number_format($sub, 2)."</td>";
							echo "</tr></tbody>";
							}
						}
					   ?>
                                   
                               
                               <tfoot><!-- tfoot Begin -->
                                   
                                   <tr><!-- tr Begin -->
                                       
                                       <th colspan="5">Total</th>
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
                       
                       <div class="box-footer"><!-- box-footer Begin -->
                           
                           <div class="pull-left"><!-- pull-left Begin -->
						     
                               <a href="shop.php" class="btn btn-default"><!-- btn btn-default Begin -->
                                   
                                   <i class="fa fa-chevron-left"></i> Continue Shopping
                                   
                               </a><!-- btn btn-default Finish -->
                               
                           </div><!-- pull-left Finish -->
                           
                           <div class="pull-right"><!-- pull-right Begin -->
                               
                          
                               
                               <a href="checkout.php?total=<?php if(isset($tot))echo number_format($tot, 2); else echo "0"; ?>" class="btn btn-primary">
                                   
                                   Proceed Checkout <i class="fa fa-chevron-right"></i>
                                   
                               </a>
                               
                           </div><!-- pull-right Finish -->
                           
                       </div><!-- box-footer Finish -->
                       
                   </form><!-- form Finish -->
                   
               </div><!-- box Finish -->
               
           
           </div><!-- col-md-9 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
               
               <div id="order-summary" class="box"><!-- box Begin -->
                   
                   <div class="box-header"><!-- box-header Begin -->
                       
                       <h3>Order Summary</h3>
                       
                   </div><!-- box-header Finish -->
                   
                   <p class="text-muted"><!-- text-muted Begin -->
                       
                       Shipping and additional costs are calculated based on value you have entered
                       
                   </p><!-- text-muted Finish -->
                   
                   <div class="table-responsive"><!-- table-responsive Begin -->
                       
                       <table class="table"><!-- table Begin -->
                           
                           <tbody><!-- tbody Begin -->
                               
                               <tr><!-- tr Begin -->
                                   
                                   <td> Order Sub-Total </td>
                                   
								   <th>
								   <span id="total1"><?php 
								   if(isset($tot))echo number_format($tot, 2);
									   else echo "0";
									   ?></span>
								   <span> $</span>
								   </th>
                                   
                               </tr><!-- tr Finish -->
                               
                               <tr><!-- tr Begin -->
                                   
                                   <td> Shipping and Handling </td>
                                   <td> 0.00 $ </td>
                                   
                               </tr><!-- tr Finish -->
                               
                               <tr><!-- tr Begin -->
                                   
                                   <td> Tax </td>
                                   <th> 0.00 $ </th>
                                   
                               </tr><!-- tr Finish -->
                               
                               <tr class="total"><!-- tr Begin -->
                                   
                                   <td> Total </td>
                                 
								 <th>
								   <span id="total2">
								   <?php 
								   if(isset($tot))echo number_format($tot, 2);
									   else echo "0";
									   ?></span>
								   <span> $</span>
								   </th>
                                   
                                   
                               </tr><!-- tr Finish -->
                               
                           </tbody><!-- tbody Finish -->
                           
                       </table><!-- table Finish -->
                       
                   </div><!-- table-responsive Finish -->
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-3 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
	 <script>
		function ProAdd(id) {
		  
		  var q = document.getElementById(id+'qte');
		  var m = document.getElementById(id+'max');
		  var p = document.getElementById(id+'price');
		  var car = document.getElementById(id+'idcart');
		  
		  var idcar= parseFloat(car.value);
		  var max = parseFloat(m.value);
		  var qte = parseFloat(q.value);
		  var price = parseFloat(p.innerHTML);
	
		  if(qte<max){
		  qte++;
		  }
		  
		  q.setAttribute('value', qte);
		  document.getElementById(id+'total').innerHTML=((price*qte).toFixed(2));
		  
		  var ids = <?php echo json_encode($ids); ?>;
		  som=0;
		  for(var i=0; i<ids.length	; i++){  
		  var t = parseFloat(document.getElementById(ids[i]+'total').innerHTML);
			  som+=t;
			}
			document.getElementById('total').innerHTML=((som).toFixed(2));
			document.getElementById('total1').innerHTML=((som).toFixed(2));
			document.getElementById('total2').innerHTML=((som).toFixed(2));
			
			var url="validationServer/updateCart.php?id_cart="+idcar+"&qte="+qte;
			window.location.href=url;
		  
		}
		
		function ProLess(id) {
		  
		  var q = document.getElementById(id+'qte');
		  var m = document.getElementById(id+'max');
		  var p = document.getElementById(id+'price');
		  var car = document.getElementById(id+'idcart');
		  
		  var idcar= parseFloat(car.value);
		  var max = parseFloat(m.value);
		  var qte = parseFloat(q.value);
		  var price = parseFloat(p.innerHTML);
	
		  if(qte>1){
		  qte--;
		  }
		  q.setAttribute('value', qte);
		  document.getElementById(id+'total').innerHTML=((price*qte).toFixed(2));
		  
		  var ids = <?php echo json_encode($ids); ?>;
		  som=0;
		  for(var i=0; i<ids.length	; i++){  
		  var t = parseFloat(document.getElementById(ids[i]+'total').innerHTML);
			  som+=t;
			}
			document.getElementById('total').innerHTML=((som).toFixed(2));
			document.getElementById('total1').innerHTML=((som).toFixed(2));
			document.getElementById('total2').innerHTML=((som).toFixed(2));
			var url="validationServer/updateCart.php?id_cart="+idcar+"&qte="+qte;
			window.location.href=url;
		      
		}
		function Delpro(id){
			var url="validationServer/DelCart.php?id_cart="+id;
			window.location.href=url;
		}
		
	</script>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>