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
				 include("db.php");
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
                       Shop
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
   <?php 
    
    include("includes/sidebar.php");		  
			   $link=connect();
			   if (isset($_GET['id_pro'])){
					
					$id_pro=$_GET['id_pro'];
                    $sql="SELECT * FROM product where id_pro='$id_pro';";
					$res = mysqli_query($link, $sql);	
					
					if(!$res){
					echo "error sql in select product".mysqli_error();
					}
					elseif(mysqli_num_rows($res)>0){	
					$pro = mysqli_fetch_assoc($res);
					if($pro['p_available']==0){
				echo "<script>alert('Product not available at this moment');window.history.back();</script>";
						}
					}
					else {
						header("location:shop.php");
			   }
			   }
    ?>
               
           </div><!-- col-md-3 Finish -->
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
               <div id="productMain" class="row"><!-- row Begin -->
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div id="mainImage"><!-- #mainImage Begin -->
                     <img class='img-responsive' src="admin_area/product_images/<?php echo $pro['p_image'] ?>" alt="<?php echo $pro['p_name'] ?>">
					
                       </div><!-- mainImage Finish -->
                   </div><!-- col-sm-6 Finish -->
                   
                   <div class="col-sm-6"><!-- col-sm-6 Begin -->
                       <div class="box"><!-- box Begin -->
                           <h1 class="text-center"><?php echo $pro['p_name'] ?></h1>
                           <div class="box" id="details"><!-- box Begin -->
                       
                       <h3 class="text-center">Product Details</h3>
                   
                   <h4>
                      <?php echo $pro['p_desc'] ?>
                   </h4>
                    <hr>
                   
               </div><!-- box Finish -->
                           <form action="validationServer/AddCart.php" class="form-horizontal" method="get"><!-- form-horizontal Begin -->
                               <div class="form-group"><!-- form-group Begin -->
							   
                                   <label for="" class="col-md-5 control-label">Products Quantity</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                          <input type="number" value="1" id="qte" name="qte" class="from-control"
											min="1" max="<?php echo $pro['p_qte'];?>">
								<input type="hidden" value="<?php echo $pro['id_pro'];?>" name="id_pro" class="from-control">
                                   
                                    </div><!-- col-md-7 Finish -->
                                   
                               </div><!-- form-group Finish -->
							   
							   <label for="" class="col-md-5 control-label">Unit Price</label>
							     <h3 class="price" id="price"> <?php echo number_format($pro['p_price'],2) ;?> $</h3>
								 
                               <label for="Tprice" class="col-md-5 control-label">Total Price</label>
                               <h3 class="price" id="Tprice"><?php echo number_format($pro['p_price'],2);?> $</h3>
                               
                               <p class="text-center buttons">
							  
							    <button class="btn btn-default i fa fa-credit-card-alt"> Buy Now</button>
							   <button class="btn btn-primary i fa fa-shopping-cart"> Add to cart</button>
							   
							   </p>
                               
                           </form><!-- form-horizontal Finish -->
                           
                       </div><!-- box Finish --> 
                       
                   </div><!-- col-sm-6 Finish -->
                   
                   
               </div><!-- row Finish -->              
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   <br>
   <?php 
    
    include("includes/footer.php");
    
    ?>
    <script>
	var num = document.querySelector('#qte');
	num.addEventListener('input', function () {
	var n = document.getElementById('Tprice');
	var price = <?php echo $pro['p_price']; ?>;
	var qte = parseFloat(num.value);
	var sub=(price*qte).toFixed(2);
	n.innerHTML=sub+" $";

});

//input type number only use arrows, no input with keyboard
document.getElementById("qte").addEventListener("keydown", e => e.preventDefault());
	</script>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>