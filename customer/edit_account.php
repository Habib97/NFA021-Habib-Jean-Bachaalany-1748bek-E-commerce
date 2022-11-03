   
              <div class="box-header"><!-- box-header Begin -->
                       
                       <center><!-- center Begin -->
                         
						 <?php
						   if(isset($_SESSION["edit"]))echo"<h1>".$_SESSION["edit"]."</h1>";
						   else echo "<h1>Edit Account</h1>";
						   ?>
                           
                       </center><!-- center Finish -->
                       <!-- Taking info of the user to fill the form of edit -->
					   <?php
					   
					   $link=connect();
					   $idu=$_COOKIE['idu'];
					   $sql="SELECT * FROM user where id_user='$idu';";
					   $res = mysqli_query($link, $sql);	
						if(!$res){
						echo "error sql in select user".mysqli_error();
						}
						$u=mysqli_fetch_assoc($res);
					   ?>
					   
                       <form name="Cform" action="validationServer/editAcc.php" method="post" onsubmit="return editform()"><!-- form Begin -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>First Name</label>
                               
                               <input type="text" class="form-control" name="fname" value="<?php 
							   echo $u['f_name'];
							   ?>" required>
                               
                           </div><!-- form-group Finish -->
						   
						   <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Last Name</label>
                               
                               <input type="text" class="form-control" name="lname" value="<?php 
							   echo $u['l_name'];
							   ?>" required>
                               
                           </div><!-- form-group Finish --> 
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Country</label>
                               
                               <input type="text" class="form-control" name="country"  value="<?php 
							   echo $u['country'];
							   ?>"required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>City</label>
                               
                               <input type="text" class="form-control" name="city" value="<?php 
							   echo $u['city'];
							   ?>" required>
                               
                           </div><!-- form-group Finish -->
 
							<div class="form-group"><!-- form-group Begin -->
                               
                               <label>Address</label>
                               
                               <input type="text" class="form-control" name="address" value="<?php 
							   echo $u['adress'];
							   ?>" required>
                               
                           </div><!-- form-group Finish -->
                            
                           <div class="form-group"><!-- form-group Begin -->
                               
                           
						   <label>Contact</label>
                               
                               <input type="text" class="form-control" name="contact" value="<?php 
							   echo $u['contact'];
							   ?>" required>
                               
                           </div><!-- form-group Finish -->
                           
                           
                           
                           <div class="text-center"><!-- text-center Begin -->
                               
                               <input type="submit" name="submit_form" value="Edit">
                               
                               
                           </div><!-- text-center Finish -->
                           
                       </form><!-- form Finish -->
                       
                   </div><!-- box-header Finish -->
				<script>

	function editform(){  
var con=document.Cform.contact.value;
if(!((/^\+\d+$/).test(con))){  
alert("Enter a valid number for contact starting with + and the following mobile number.");  
  return false;  
  } 

}
	</script>   