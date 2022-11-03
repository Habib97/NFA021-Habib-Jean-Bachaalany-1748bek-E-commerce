<?php
if ( !(isset($_COOKIE['idadmin'])) ){
		header("location:login.php");
		}
		include("includes/db.php");
		$link=connect();
?>  
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert User
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <strong>Insert User</strong>
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" action="" name="Cform" class="form-horizontal" enctype="multipart/form-data" onsubmit="return validateform()"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> First name </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="fname" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
				   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Last name </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="lname" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
				   
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> E-mail </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="email" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Password </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="pass1" type="password" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
				    
					<div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label">Confirm Password </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="pass2" type="password" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Country </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="country" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
				   
				   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> City </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="city" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
				   
				   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Address </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="address" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Contact </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="contact" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="submit" value="Insert User" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->

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
<?php

if(isset($_POST['submit'])){
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$email=$_POST["email"];
	$pass1=$_POST["pass1"];
	$country=$_POST["country"];
	$city=$_POST["city"];
	$address=$_POST["address"];
	$contact=$_POST["contact"];
	$sql="SELECT * FROM user where email='$email';";
	$res = mysqli_query($link, $sql);	
		if(!$res){
			echo "error sql in select user".mysqli_error();
		}
		elseif(mysqli_num_rows($res)>0){	
				echo "<script>alert('User already exist, choose another email!');window.history.back();</script>";
		}
		else{
			$sql="insert into user values(null,'$fname','$lname','$email','$pass1','$country','$city','$address','$contact');";
			$res = mysqli_query($link,$sql);
			echo "<script>alert('User have been register successfully.');window.open('index.php?dashboard','_self');</script>";
			
		}
}
mysqli_close($link);
?>
