 function checkRequired()
	{
		
		
		if(document.getElementById("sub_cat_name").value == "")
		 {
		   document.getElementById("sub_cat_name").focus();		
		   alert("Sub Category name is required field ");	 
		   return false;
		 }
		
		
		return true;
	}