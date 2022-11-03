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
    
    ?>
               
           </div><!-- col-md-3 Finish -->
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
              
               <div class="row"><!-- row Begin -->
			  
			  <?php
			  
			   $link=connect();
			   if (isset($_GET['id_cat'])){
					
					$id_cat=$_GET['id_cat'];
                    $sql="SELECT * FROM product where id_cat='$id_cat' and p_available='1';";
					$res = mysqli_query($link, $sql);	
					
					if(!$res){
					echo "error sql in select product".mysqli_error();
					}
					
					elseif(mysqli_num_rows($res)>0){	
					
					while ($pro = mysqli_fetch_assoc($res) ) {
					echo "<div class='col-md-4 col-sm-6 center-responsive'> ";
					echo "<div class='product'>";
					echo "<a href='details.php?id_pro=".$pro['id_pro']."'>";
					echo "<img class='img-responsive' src='admin_area/product_images/".$pro['p_image']."' alt='".$pro['p_name']."'>";
					echo "</a>";
					echo " <div class='text'> <h3>";
					echo "<a href='details.php?id_pro=".$pro['id_pro']."'>";
                    echo $pro['p_name'];           
                    echo "</a> </h3>";
					echo " <p class='price'>".$pro['p_price']."$</p>";
					echo " <p class='button'>";
					echo "<a href='details.php?id_pro=".$pro['id_pro']."' class='btn btn-default'>View Details</a>";
					echo "<span>  </span>";
					echo "<a href='validationServer/AddCart.php?id_pro=".$pro['id_pro']."' class='btn btn-primary'>";
					echo "<i class='fa fa-shopping-cart'>Add To Cart</i></a>";
					echo "</p> </div> </div> </div>";
							}
					
					}		
					else{
					echo"<h1>Products not available now for this categorie.</h1>";
					}
               }
			   else{
					echo"<center><h1>Welcome to our SUPER store, choose any categorie to take a look at our SUPER products.</h1></center>";
					}
				mysqli_close($link);
			   ?>
			   <!--
                   <div class="col-md-4 col-sm-6 center-responsive">
                       <div class="product">
                   <a href="details.php">
                       <img class="img-responsive" src="admin_area/product_images/" alt="">
                   </a>
                   <div class="text">
                       
                       <h3>
                           <a href="details.php">
                              
                           </a>
                       </h3>
                       
                       <p class="price">$30</p>
                       
                       <p class="button">
                           
                           <a href="details.php" class="btn btn-default">View Details</a>
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Add To Cart
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div>
                   
               </div>
                       
                   </div>
				   -->
                  
               </div><!-- row Finish -->
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>