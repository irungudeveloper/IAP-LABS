function validateForm() 
	{
	  
	  var fname = document.forms["create_user"]["fname"].value;
	  var lname = document.forms["create_user"]["lname"].value;
	  var city = document.forms["create_user"]["city"].value;
	  var username = document.forms["create_user"]["u_name"].value;
	  var password = document.forms["create_user"]["password"].value;

	  if (fname == "" || lname == "" || city == "" || username == "" || password == "" ) 
	  {
		    alert("Please Fill All The Fields");
		    return false;
	  }

	  return true;
} 
