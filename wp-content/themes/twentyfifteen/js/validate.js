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

  jQuery("#errspan_email").text("");
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


if(jQuery("#pct").val() == ""){ 
         jQuery("#errspan_pct").text("Please select pct");
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

//alert(jQuery("#it_systems").val());
 
 if(jQuery("#it_systems").val() == ""){
         jQuery("#errspan_it_systems").text("Please select IT Systems");
        errstat = 1;       
  }



 if(jQuery("#mobile_number").val() == ""){
         jQuery("#errspan_mobile_number").text("Please enter mobile number");
        errstat = 1;       
  }

 if(jQuery("#NHS_Pension").val() == ""){
         jQuery("#errspan_NHS_Pension").text("Please select NHS Pension");
        errstat = 1;       
  }



  if (  errstat == 1 )
	return false;
else
	return true;
 	
}



		function addmoredays(){
			
		

			var nb = $('div.table-responsive').length;
		//alert(nb);


			var purl = SITE_ROOT_JS+'jobs/settimerates';
			//alert(purl);
			//alert(SITE_ROOT_VAR)
			var dateranges = jQuery("#session_date_range").val();
			//var dateranges = myStringdate.replace("<?php echo $_POST['#session_date_range'];?>", "");

			jQuery.when($.ajax(
			{ url:purl,
			dataType: 'text',
			data:{dateranges:dateranges,tablcnt:nb}
			})).done(function( data ) {

			$("#settimerates").html( data );

			});

		}

		function deletedate(p){
			jQuery('#DIVsessionday'+p).remove();			
		}
 		
		function deltimesession(element){
	  		 $(element).closest('tr').remove();
	 	}

 		function addsession(p){

			var rcount = jQuery('#TABLEsessionday'+p+' tr').length;
			 // alert(rcount);
			//$("#yourTableId tr").length

 				 rcount = rcount - 1;	
  			var k = " <tr id='sessiontime'> <td> <input type='text' class='time start'  id='session_starttime_"+p+"_"+rcount+"' value='0' name='session_starttime["+p+"]["+rcount+"]' placeholder='eg: 09:00' /> </td> <td> <input type='text' class='time end'   name='session_endtime["+p+"]["+rcount+"]' id='session_endtime_"+p+"_"+rcount+"'  placeholder='eg: 17:00'  /> </td> <td> <input     type='text' name='hourlyrate["+p+"]["+rcount+"]' onblur='gethourlyrate("+p+","+rcount+")'  myid='_"+p+"_"+rcount+"'   class='hourlyrate' id='hourlyrate_"+p+"_"+rcount+"'  placeholder='eg: 80.00' />   </td>  <td> <input type='text' readonly name='paytolocum["+p+"]["+rcount+"]' id='paytolocum_"+p+"_"+rcount+"' value='0' /> <input type='hidden' readonly name='medbidfee["+p+"]["+rcount+"]' id='medbidfee_"+p+"_"+rcount+"' value='0' /> </td> <td> <input type='button' class='deltimesession' id='"+rcount+"' onclick='deltimesession(this)'  name='delete' value='delete' /> </td> <td>&nbsp;</td> <td>&nbsp;</td> </tr>"; 
			//alert(k);
			jQuery("#TABLEsessionday"+p).append(k);
		
			 $('#sessiontime .time').timepicker({
		                    'showDuration': true,
                		    'timeFormat': 'H:ia'
                	});

			$('#sessiontime').datepair();
 


  		}
  

	function dateAdd(date, interval, units) {
	  var ret = new Date(date); //don't change original date
 	  switch(interval.toLowerCase()) {
	    case 'year'   :  ret.setFullYear(ret.getFullYear() + units);  break;
	    case 'quarter':  ret.setMonth(ret.getMonth() + 3*units);  break;
	    case 'month'  :  ret.setMonth(ret.getMonth() + units);  break;
	    case 'week'   :  ret.setDate(ret.getDate() + 7*units);  break;
	    case 'day'    :  ret.setDate(ret.getDate() + units);  break;
	    case 'hour'   :  ret.setTime(ret.getTime() + units*3600000);  break;
	    case 'minute' :  ret.setTime(ret.getTime() + units*60000);  break;
	    case 'second' :  ret.setTime(ret.getTime() + units*1000);  break;
	    default       :  ret = undefined;  break;
	  }
	  return ret;
	}

		
		function calculatelocumrate(session_starttime,session_endtime,hourlyrate)
		{
		//	alert("calculatelocumrate");
		   var start_actual_time  = session_starttime;
    		   var end_actual_time    =  session_endtime;
 
		    start_actual_time = new Date(start_actual_time);
		    end_actual_time = new Date(end_actual_time);

		    var diff = end_actual_time - start_actual_time;
		    var diffSeconds = diff/1000;
    		    var HH = Math.floor(diffSeconds/3600);
		    var MM = Math.floor(diffSeconds%3600)/60;

		    var formatted = ((HH < 10)?("0" + HH):HH) + ":" + ((MM < 10)?("0" + MM):MM);
		 //   alert(formatted);
		//	alert(hourlyrate);
			var locumrate=0;
			//CALculate rate 
			if(!isNaN(hourlyrate)){
			 
			  if (!isNaN(HH) && HH>0 )
			   	 locumrate = hourlyrate * HH;
		
			  if (!isNaN(MM) && MM>0 ){
 				if ( MM<=25){
	 				 locumrate = locumrate + ( (hourlyrate/4) * MM);
				 } else if (MM<=50){
 					 locumrate = locumrate + ( (hourlyrate/2) * MM);
				 }
			 }

			}		
			 
		    return locumrate;

		}
 		
 

$(".hourlyrate").blur(function(){
	//alert('inside');

gethourlyrate();

});

function gethourlyrate(i,j){

		var onejobormultiplesessions = $("#onejobormultiplesessions").val();
		
 	 
		// if($(element).attr('myid'))
  		  var myid = "_"+i+"_"+j;
		//alert(myid);
		 
		   //  var myid = ($(this).attr('myid'));

		
	
	     // var k = myid.replace("_"+1", "");
 	      var session_date =  $("#session_date_"+i).val();    

		//alert(session_date); 	
		//	alert('myid'+myid);
		
		var hourlyrate = $("#hourlyrate"+myid).val();
 
		//alert(hourlyrate);


		//remove am , pm from time..
	   
		var starttime = $('#session_starttime'+myid).val().replace("am", "");
		var starttime = $('#session_starttime'+myid).val().replace("pm", ""); 

		var endtime = $('#session_endtime'+myid).val().replace("am", "");
		var endtime = $('#session_endtime'+myid).val().replace("pm", "");

		var session_date = $("#session_date_"+i).val().split("-");

		var starttime = starttime.split(":");
			

		starttime[0] = (isNaN(starttime[0])) ? 0 : starttime[0];
		starttime[1] = (isNaN(starttime[1])) ? 0 : starttime[1];
		 
		var session_starttime = new Date(session_date[0], session_date[1]-1,  session_date[2], starttime[0], starttime[1]); 
	 	//var d = new Date(year, month, day, hours, minutes, seconds, milliseconds); 
		 
		//alert('sessin statrt time'+session_starttime);
		var endtime = endtime.split(":");
		//	alert(endtime);
		endtime[0] = (isNaN(endtime[0])) ? 0 : endtime[0];
		endtime[1] = (isNaN(endtime[1])) ? 0 : endtime[1];

		var session_endtime =  new Date(session_date[0], session_date[1]-1,  session_date[2], endtime[0], endtime[1]); 
		//alert('sessin end time'+session_endtime);

		
		var paytolocum = calculatelocumrate(session_starttime,session_endtime,hourlyrate);
		//alert(paytolocum);

		 $('#paytolocum'+myid).val(paytolocum);
		//Total_paytolocum = $('#paytolocum'+myid).val();
		//alert('previous paytolocum'+Total_paytolocum);
		//Total_paytolocum =  parseFloat(Total_paytolocum)  +   parseFloat(paytolocum);
		var medbidfee = (paytolocum * 15)/100;
 
 		$('#paytolocum'+myid).val(paytolocum);
		$('#medbidfee'+myid).val(medbidfee);



		// bottom totals Cost breakdown
 		var z=1;
		var grandtotallocumpay = 0;
 		$(".paytolocum").each(function() {
 	  		//alert('#paytolocum_'+z);	
	 		grandtotallocumpay  = grandtotallocumpay + parseFloat($('#paytolocum_'+z).val());
		//	alert(grandtotallocumpay);
 			$("#grandtotallocumpayspan").text(grandtotallocumpay);
			$("#grandtotallocumpay").val(grandtotallocumpay);
			z = z + 1;
 		});
		

		var grandmedbidfee	=  (grandtotallocumpay * 15)/100;
		var estimatedsavingvat  =  (grandtotallocumpay * 15)/100;
		var vatonmedbidfee	=  (grandtotallocumpay * 15)/100;

		$("#grandmedbidfee").val(grandmedbidfee);
		$("#estimatedsavingvat").val(estimatedsavingvat);
		$("#vatonmedbidfee").val(vatonmedbidfee);

		$("#grandmedbidfeespan").text(grandmedbidfee);
		$("#estimatedsavingvatspan").text(estimatedsavingvat);
		$("#vatonmedbidfeespan").text(vatonmedbidfee);
		

		var pmtotalcost = grandmedbidfee + estimatedsavingvat +  vatonmedbidfee;
		pmtotalcost = parseFloat(pmtotalcost).toFixed(2);

		$("#pmtotalcost").val(pmtotalcost);
		$("#pmtotalcostspan").text(pmtotalcost);

     }	


	function validatepublicjobcreate(){
		
 		 
		//jQuerty("#errspan_session_date_range").text("");
		jQuery("#errspan_parking_facilities").text("");
		jQuery("#errspan_required_it_systems").text("");
		jQuery("#errspan_session_description").text("");

		
		jQuery("#errspan_session_date_range").text("");
		jQuery("#errspan_session_date_1").text("");
		jQuery("#errspan_email").text("");
 		jQuery("#errspan_firstname").text("");
		jQuery("#errspan_lastname").text("");
 		jQuery("#errspan_practicename").text("");
		jQuery("#errspan_practice_code").text("");
 		jQuery("#errspan_phone_number").text("");
	 

		var errstat=0;
	
		if( jQuery("#savejob").val() == 'savejob' )
		{

 
		
			if(jQuery("#session_date_1").val() == ""){
 				jQuery("#errspan_session_date_range").text("Please choose your session date from calendar");
				errstat = 1;      
			}

			//if(jQuery("#session_date_range").val() == ""){
			//	jQuery("#errspan_session_date_range").text("Please choose your session dates from calendar");
			//	errstat = 1;      
			//}

			if(jQuery("#parking_facilities").val() == ""){
			jQuery("#errspan_parking_facilities").text("Please choose your parking facilities");
			errstat = 1;      
			}


			if(jQuery("#required_it_systems").val() == ""){
			jQuery("#errspan_required_it_systems").text("Please select It systems reqired ");
			errstat = 1;      
			}



			if(jQuery("#session_description").val() == ""){
			jQuery("#errspan_session_description").text("Please enter job descrption");
			errstat = 1;      
			}

	
			if(jQuery("#email").val() == ""){
			jQuery("#errspan_email").text("Please enter email");
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
			 
	 		if(jQuery("#practicename").val() == ""){ 

			jQuery("#errspan_practicename").text("Please enter practice name");
			errstat = 1;       
			}

			if(jQuery("#practice_code").val() == ""){ 

			jQuery("#errspan_practice_code").text("Please enter practice code");
			errstat = 1;       
			}
			 
			if(jQuery("#phone_number").val() == ""){
			jQuery("#errspan_phone_number").text("Please enter phone number");
			errstat = 1;       
			}
	
			 if (  errstat == 1 )
				return false;
			else
				return true;
		}
	}




function validatechangepassword(){

  jQuery("#errspan_old_password").text("");
  jQuery("#errspan_new_password1").text("");
  jQuery("#errspan_new_password2").text("");
    
    var errstat=0;

    if (jQuery("#old_password").val() == "") {
 	  jQuery("#errspan_old_password").text("Please enter old password");
        	errstat = 1;      
     }
	
   if(jQuery("#new_password1").val() == ""){
        jQuery("#errspan_new_password1").text("Please enter new password");
       errstat = 1;       
    }
	

 if(jQuery("#new_password2").val() == ""){
        jQuery("#errspan_new_password2").text("Please enter verify password");
        errstat = 1;       
    }
	
   if ( jQuery("#new_password1").val() != jQuery("#new_password2").val() ){
	jQuery("#errspan_new_password2").text("Please compare new password and verify password once");
        errstat = 1;    
   }
 
  if (  errstat == 1 )
	return false;
else
	return true;
 	
}

function validatelocumeditprofile(){
 
var     errstat=0;

if(jQuery("#location").val() == ""){

        jQuery("#errspan_location").text("Please enter your location name along with city name we are varifying from Google...");
        errstat = 1;       
    }
	

if(jQuery("#postcode").val() == ""){
        jQuery("#errspan_postcode").text("Please enter your postalcode");
        errstat = 1;       
    }


if(jQuery("#firstname").val() == ""){
        jQuery("#errspan_firstname").text("Please enter your firstname");
        errstat = 1;       
    }

if(jQuery("#lastname").val() == ""){
        jQuery("#errspan_lastname").text("Please enter your lastname");
        errstat = 1;       
    }
	


  if (  errstat == 1 )
	return false;
else
 	return true;

}

function findajaxcall(){
		var purl = SITE_ROOT_JS+'jobs/getjobs/';
		jQuery("#loadingdiv").show();
		var phourlyrate = $("#hourlyrate" ).val();	
	 	var dateranges = jQuery("#session_date_range").val();
		var  distance = jQuery("#distance").val();
		var  zipcode = jQuery("#zipcode").val();
		var  zipcode = jQuery("#zipcode").val();
		var tariff  = $("#onejobormultiplesessions").val();
	  
		//alert(purl);
		//alert(SITE_ROOT_VAR)
		jQuery("#loadingdiv").show();
 		$.ajax({ url:purl,
			  method: "POST",	
			  dataType: 'text',
			  data:{dateranges:dateranges,zipcode:zipcode,distance:distance,hourlyrate:phourlyrate,tariff:tariff}
	 	}).done(function( data ) {

				  $("#getjobsdiv").html( data );
				jQuery("#loadingdiv").hide();
		});
		
		
}
 
