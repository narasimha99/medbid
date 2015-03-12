/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* local site root variable */
var SITE_ROOT_JS = myJSONObject.JSINFO[0].SITE_ROOT_VAR;
//alert(SITE_ROOT_JS);

// Function that validates email address through a regular expression.
function validateEmail(sEmail) {
var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
if (filter.test(sEmail)) {
return true;
}
else {
return false;
}
}


function validatelocumsignup(){

  jQuery("#errspan__email").text("");
  jQuery("#errspan_firstname").text("");
  jQuery("#errspan_lastname").text("");
    
    var errstat=0;

    if (!validateEmail(jQuery("#email").val())) {
 	  jQuery("#errspan_email").text("Please enter email");
        	errstat = 1;      
     }
	
   if(jQuery("#firstname").val() == ""){
        jQuery("#errspan_firstname").text("Please enter firstname");
       errstat = 1;       
    }
	

 if(jQuery("#lastname").val() == ""){
        jQuery("#errspan_lastname").text("Please enter lastname");
        errstat = 1;       
    }
	
 
  if (  errstat == 1 )
	return false;
else
	return true;
 	
}
  

function validatelocumsignupnext(){

 jQuery("#errspan__gmc_number").text("");
  jQuery("#errspan_postcode").text("");
  jQuery("#errspan_phone_number").text("");
     
    var errstat=0;
 
   if(jQuery("#gmc_number").val() == ""){
         jQuery("#errspan_gmc_number").text("Please enter Gmc number");
        errstat = 1;      
    }
 
   if(jQuery("#postcode").val() == ""){
        jQuery("#errspan_postcode").text("Please enter postcode");
       errstat = 1;       
    } 
	

 if(jQuery("#phone_number").val() == ""){
        jQuery("#errspan_phone_number").text("Please enter phone number");
        errstat = 1;       
    }else{
	  
   }
	
 
  if (  errstat == 1 )
	return false;
else
	return true;
 	
}
  


function validatepracticesignup(){
    
   jQuery("#errspan_email").text("");
  jQuery("#errspan_password").text("");
  jQuery("#errspan_password1").text("");
  jQuery("#errspan_firstname").text("");
  jQuery("#errspan_lastname").text("");
  jQuery("#errspan_postcode").text("");
  jQuery("#errspan_practicename").text("");
  jQuery("#errspan_practice_code").text("");
  jQuery("#errspan_ccg_id").text("");
  jQuery("#errspan_phone_number").text("");
  jQuery("#errspan_it_systems").text("");

   var errstat=0;
    if(jQuery("#email").val() == ""){
         jQuery("#errspan_email").text("Please enter email");
       errstat = 1;      
    }
	
   if(jQuery("#password").val() == ""){
        jQuery("#errspan_password").text("Please enter password");
       errstat = 1;       
    }
	

 if(jQuery("#password1").val() == ""){
        jQuery("#errspan_password1").text("Please enter verify password");
        errstat = 1;       
    }
	
  

 if(jQuery("#firstname").val() == ""){
        jQuery("#errspan_firstname").text("Please enter firstname");
        errstat = 1;       
    }

 if(jQuery("#lastname").val() == ""){
        jQuery("#errspan_lastname").text("Please enter Lastname");
        errstat = 1;       
    }
 if(jQuery("#postcode").val() == ""){
        jQuery("#errspan_postcode").text("Please enter Postcode");
        errstat = 1;       
    }



if(jQuery("#practicename").val() == ""){ 

        jQuery("#errspan_practicename").text("Please enter practice name");
        errstat = 1;       
    }
 
 if(jQuery("#practice_code").val() == ""){ 

        jQuery("#errspan_practice_code").text("Please enter practice code");
        errstat = 1;       
    }
 if(jQuery("#ccg_id").val() == ""){
        jQuery("#errspan_ccg_id").text("Please select ccg");
        errstat = 1;       
    }

 if(jQuery("#phone_number").val() == ""){
        jQuery("#errspan_phone_number").text("Please enter phone number");
        errstat = 1;       
  }
alert(Query("#it_systems").val());
alert('hi');
 
 if(jQuery("#it_systems").val() == ""){
	alert('ho');
        jQuery("#errspan_it_systems").text("Please select IT Systems");
        errstat = 1;       
  }

  if (  errstat == 1 )
	return false;
else
	return true;
 	
}
  
 


