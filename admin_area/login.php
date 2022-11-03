<?php
if ( (isset($_COOKIE['idadmin'])) ){
		header("location:index.php");
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
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
   
   <div class="container">
       <form action="" class="form-login" method="post">
           <h2 class="form-login-heading"> Admin Login </h2>
           
           <input type="text" class="form-control" placeholder="Email Address" name="admin_email" required>
           
           <input type="password" class="form-control" placeholder="Your Password" name="admin_pass" required>
           
           <button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login">
               
               Login
               
           </button>
       </form>
   </div>
    
</body>
</html>


<?php 
include("includes/db.php");
$link=connect();
    if(isset($_POST['admin_login'])){
			$admin_email=$_POST["admin_email"];
			$admin_pass=$_POST["admin_pass"];
        
       if ( (isset($admin_email)) || (isset($admin_pass)) ){
     
        $sql = "select * from admin where a_email='$admin_email' AND a_pass='$admin_pass';";
        $res = mysqli_query($link,$sql);
		
		if(!$res){
			echo "error sql in select id admin".mysqli_error();
		}
		elseif(mysqli_num_rows($res)>0){
				$u=mysqli_fetch_assoc($res);
				$id=$u['id_admin'];
				$temps_expire = time() + 365*24*3600;
				setcookie('idadmin',$id, $temps_expire,"/"); 
				header("location:index.php?dashboard");
			}	
		}
	}
?>