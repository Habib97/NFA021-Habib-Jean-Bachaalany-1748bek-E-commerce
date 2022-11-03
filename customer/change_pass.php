   
              <div class="box-header"><!-- box-header Begin -->
                       
                       <center><!-- center Begin -->

                             <?php
						   if(isset($_SESSION["chg"]))echo"<h1>".$_SESSION["chg"]."</h1>";
						   else echo "<h1>Change Password</h1>";
						   ?>
						   
                       </center><!-- center Finish -->
                       
                       <form name="Cform" action="validationServer/changePass.php" method="post" onsubmit="return ChgPass()"><!-- form Begin -->
                           
                            <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Password</label>
                               
                               <input type="password" class="form-control" name="pass1"  required>
                               
                           </div><!-- form-group Finish -->
						   
						   <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Confirm Password</label>
                               
                               <input type="password" class="form-control" name="pass2"  required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="text-center"><!-- text-center Begin -->
                               
                               <input type="submit" name="submit_form" value="Change Password">
                               
                               
                           </div><!-- text-center Finish -->
                           
                       </form><!-- form Finish -->
                       
                   </div><!-- box-header Finish -->
				   	
<script>
function ChgPass(){  
	
var pass1=document.Cform.pass1.value;    
var pass2=document.Cform.pass2.value;
  if(!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{6,})/.test(pass1))){  
  alert("Password must be at least 6 characters long, contain at least 1 lowercase, 1 uppercase and 1 numeric character.");  
  return false;  
  }
if(pass1!=pass2){  
alert("Password must be same!");  
return false;  
}
}
	</script>