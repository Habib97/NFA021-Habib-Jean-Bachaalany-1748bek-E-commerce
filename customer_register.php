<?php
session_start();
if ( (isset($_COOKIE['idu'])) ){
		header("location:success_login.php");
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
						<form method="get" action="results.php" class="navbar-form" ><!-- navbar-form Begin -->
                       
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
                       Register
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-1">
			</div>
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <div class="box-header"><!-- box-header Begin -->
                       
                       <center><!-- center Begin -->
                           <?php
						   if(isset($_SESSION["msg"]))echo"<h2>".$_SESSION["msg"]."</h2>";
						   elseif(isset($_SESSION["msg1"]))echo"<h4>".$_SESSION["msg1"]."<a href='login.php'>Login</a></h4>";
						   else echo "<h2> Register a new account </h2><h4>already have an account?<br><a href='login.php'>Log in Now</a></h4>";
						   ?>
                           
                           
                       </center><!-- center Finish -->
                       
                       <form name="Cform" action="validationServer/register.php" method="post" onsubmit="return validateform()" ><!-- form Begin -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>First Name</label>
                               
                               <input type="text" class="form-control" name="fname" required>
                               
                           </div><!-- form-group Finish -->
						   
						   <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Last Name</label>
                               
                               <input type="text" class="form-control" name="lname" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Email</label>
                               
                               <input type="text" class="form-control" name="email" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Password</label>
                               
                               <input type="password" class="form-control" name="pass1"  required>
                               
                           </div><!-- form-group Finish -->
						   
						   <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Confirm Password</label>
                               
                               <input type="password" class="form-control" name="pass2"  required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Country</label>
                               
                               <input type="text" class="form-control" name="country" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>City</label>
                               
                               <input type="text" class="form-control" name="city" required>
                               
                           </div><!-- form-group Finish -->
 
							<div class="form-group"><!-- form-group Begin -->
                               
                               <label>Address</label>
                               
                               <input type="text" class="form-control" name="address" required>
                               
                           </div><!-- form-group Finish -->
                            
                           <div class="form-group"><!-- form-group Begin -->
                               
                           
						   <label>Contact</label>
                               
                               <input type="text" class="form-control" name="contact"  required>
                               
                           </div><!-- form-group Finish -->
                           
                           
                           
                           <div class="text-center"><!-- text-center Begin -->
                               
                               <input type="submit" name="submit_form" value="Register">
                               
                               
                           </div><!-- text-center Finish -->
                           
                       </form><!-- form Finish -->
                       
                   </div><!-- box-header Finish -->
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
   
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
	<script>

	function validateform(){  
	
var pass1=document.Cform.pass1.value;    
var pass2=document.Cform.pass2.value;
var con=document.Cform.contact.value;
var mail=document.Cform.email.value;  
  
if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)))
  {  
  alert("Please enter a valid e-mail address!!");  
  return false;  
  }

  if(!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{6,})/.test(pass1))){  
  alert("Password must be at least 6 characters long, contain at least 1 lowercase, 1 uppercase and 1 numeric character.");  
  return false;  
  }
  
if(pass1!=pass2){  
alert("password must be same!");  
return false;  
}

if(!((/^\+\d+$/).test(con))){  
alert("Enter a valid number for contact starting with + and the following mobile number.");  
  return false;  
  } 

}
	</script>

    
    
</body>
</html>