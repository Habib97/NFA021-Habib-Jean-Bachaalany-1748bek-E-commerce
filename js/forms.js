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
  
if(pass1.length<6){  
  alert("Password must be at least 6 characters long.");  
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