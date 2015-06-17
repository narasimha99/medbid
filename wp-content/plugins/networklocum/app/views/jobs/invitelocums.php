<?php
$url = esc_url( home_url( '/' )); 
$templtpath= get_template_directory_uri(); 
?>
<script>
$(document).ready(function() {
    $('#selecctall').click(function(event) {  //on click
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }
    });

$("#distance").change(function(event) { 
 
		var purl = SITE_ROOT_JS+'jobs/getlocums/';
		jQuery("#loadingdiv").show();
		var  distance = jQuery("#distance").val();
	 	var  zipcode = jQuery("#zipcode").val();
	  
		//alert(purl);
		//alert(SITE_ROOT_VAR)
		jQuery("#loadingdiv").show();
 		$.ajax({ url:purl,
			  method: "POST",	
			  dataType: 'text',
			  data:{zipcode:zipcode,distance:distance}
	 	}).done(function( data ) {

				  $("#getlocumsdiv").html( data );
				jQuery("#loadingdiv").hide();
	});
 	});
 
});
</script>
<!--middle start here-->
 	<div class="midcol">
		<div class="container">
			<div class="row">

	<?php $this->display_flash(); ?>
	<h1> Search your locums by zipcode radius search </h1>

	<form   action="<?php echo $url;?>jobs/invitelocums"  method="POST"> 
	<p>
 	<label> ZIP Code :
		<input  name="zipcode" style="font-size:12px;" id="zipcode"  type="text" value="<?php echo $_POST['zipcode'];?>" /></label>

	<label>Within:</label>
	<select name="distance" id="distance">
	<option value="5"  <?php if($_POST['distance'] == 5 ) echo 'selected'?>>5</option>
	<option value="10"  <?php if($_POST['distance'] == 10 ) echo 'selected'?>>10</option>
	<option value="25"  <?php if($_POST['distance'] == 25 ) echo 'selected'?>>25</option>
	<option value="50"  <?php if($_POST['distance'] == 50) echo 'selected'?>>50</option>
	<option value="100"  <?php if($_POST['distance'] == 100 ) echo 'selected'?> >100</option>
	</select> Miles 
	</p>

	<p>
	<input type="hidden" name="job_id" value="<?php echo $job_id;?>"/>
 	</p>
 

 <div id="loadingdiv" style="display:none;"><image src="<?php echo $templtpath;?>/images/ajax-loader.gif"/> Updating results... </div>
			      <!----------------ajax loader------------->
							 <div id="getlocumsdiv">
							    please choose postcode and distance to get locums
							</div>
 
	
	</form>
   			</div>
		</div>
	</div>
<!--middle end	 here-->
