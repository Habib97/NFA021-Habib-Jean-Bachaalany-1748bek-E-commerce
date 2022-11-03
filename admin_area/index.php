<?php
if ( !(isset($_COOKIE['idadmin'])) ){
		header("location:login.php");
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SUPERTECH Store Admin Area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="wrapper">
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper">
            <div class="container-fluid">
                
                <?php
                
                  if(isset($_GET['insert_product'])){
                        
                        include("insert_product.php");
                        
                }   elseif(isset($_GET['view_products'])){
                        
                        include("view_products.php");
                        
                }   elseif(isset($_GET['delete_product'])){
                        
                        include("delete_product.php");
                        
                }   elseif(isset($_GET['edit_product'])){
                        
                        include("edit_product.php");
                        
                }   elseif(isset($_GET['insert_p_cat'])){
                        
                        include("insert_p_cat.php");
                        
                }   elseif(isset($_GET['view_p_cats'])){
                        
                        include("view_p_cats.php");
                        
                }   elseif(isset($_GET['delete_p_cat'])){
                        
                        include("delete_p_cat.php");
                        
                }   elseif(isset($_GET['edit_p_cat'])){
                        
                        include("edit_p_cat.php");
                        
                }    elseif(isset($_GET['view_customers'])){
                        
                        include("view_customers.php");
                        
                }   elseif(isset($_GET['view_orders'])){
                        
                        include("view_orders.php");
                        
                }   elseif(isset($_GET['ord_details'])){
                        
                        include("ord_details.php");
                        
                }   elseif(isset($_GET['view_users'])){
                        
                        include("view_users.php");
                        
                }   elseif(isset($_GET['insert_user'])){
                        
                        include("insert_user.php");
                        
                } 
				elseif(isset($_GET['view_payments'])){
                        
                        include("view_payments.php");
                        
                }
				elseif(isset($_GET['date'])){
                        
                        include("view_orders.php");
                        
                }
				else{
                        
                        include("dashboard.php");
                        
                }
        
                ?>
                
            </div>
        </div>
    </div>

<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>       
</body>
</html>

