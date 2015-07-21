<?php
$url = esc_url( home_url( '/' ));
$templtpath= get_template_directory_uri(); 
?>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<script type="text/javascript" src="<?php echo $templtpath;?>/js/jquery.geocomplete.min.js"></script>
<script>
jQuery( document ).ready(function() {
//console.log( "ready!" );
jQuery("#submit").click(function () {
   jQuery("#locumsignupnext").submit();
});
 
jQuery(function () {	
 	jQuery("#location").geocomplete({
	  details: ".bitbox1",
	  detailsAttribute: "data-geo"
	});
});
});
</script>
<!--middle start here-->
<div class="midcol">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="bitbox1">

   		        <h3><a href="<?php echo $url.'locums/myprofile';?>">My Profile</a> / Edit Profile</h3>
				
				<form name="locumeditprofile" id="locumeditprofile"   autocomplete="off"  method="post" action="<?php echo $url;?>locums/editprofile" onsubmit="javascript:return validatelocumeditprofile();" enctype="multipart/form-data">
 <?php $this->display_flash(); ?>
 
				<input type="hidden" name="data[Locum][id]" id="id" value="<?php echo $Locumobject->id;?>" />
				<input type="hidden" id="verifiedlocum" name="data[Locum][verifiedlocum]" value="<?php echo $Locumobject->verifiedlocum;?>" />
		

			<div class="form-group">
			<label for="password" class="control-label">company name</label><br>
			<input type="text" class="form-control ff1" id="companyname" name="data[Locum][companyname]" value="<?php echo $Locumobject->companyname;?>" title="" placeholder="Enter your company name" />
			<span class="errorspan" id="errspan_companyname"></span>
			</div>

	<div class="form-group">
			<label for="password" class="control-label">company status</label><br>
			<input type="radio"   id="companystatus" name="data[Locum][companystatus]" value="0"  <?php if($Locumobject->companystatus == 0) echo 'checked'; ?> title="" placeholder="select your company status"/>I operate as a limited company

			<input type="radio"  id="companystatus" name="data[Locum][companystatus]" value="1" <?php if($Locumobject->companystatus==1) echo 'checked'; ?> title="" placeholder="select your company status"/>I do not operate as a limited company


			<span class="errorspan" id="errspan_companystatus"></span>
			</div>


	<div class="form-group">
			<label for="password" class="control-label">Gender</label><br>
			<input type="radio"    id="gender" name="data[Locum][gender]" value="0"  <?php if($Locumobject->gender == 0) echo 'checked'; ?> title="" placeholder="select your Gender" />Male

			<input type="radio"  id="gener" name="data[Locum][gender]" value="1" <?php if($Locumobject->gender==1) echo 'checked'; ?> title="" placeholder="select your gender" />Female
	

			<span class="errorspan" id="errspan_gener"></span>
			</div>


  
 
  

<div class="form-group">
<label for="password" class="control-label">Location:</label><br>
<input type="text" class="form-control ff1" id="location" name="data[Locum][geo_location]" value="<?php echo $Locumobject->geo_location;?>"    title="" placeholder="Start with your location name we are verifying all locations from Google" />
<span class="errorspan" id="errspan_location"></span>
</div>



    				  <div class="form-group">
						  <label for="password" class="control-label">Postal Address</label><br>
						  <input type="text" class="form-control ff1"   data-geo="formatted_address"	 id="address" name="data[Locum][address]" value="<?php echo $Locumobject->address;?>"    title="" placeholder="Address"/>
						   
						 <span class="errorspan" id="errspan_address"></span>
					  </div>
					  
	

    			 
 


    				  <div class="form-group">
						  <label for="password" class="control-label">Country</label><br>
						  <input type="text" class="form-control ff1"  data-geo="country" id="country" name="data[Locum][country]" value="<?php echo $Locumobject->address;?>"    title="" placeholder="country"/>
						   
						 <span class="errorspan" id="errspan_country"></span>
					  </div>
				  

<div class="form-group">
<label for="password" class="control-label">State</label><br>
<input type="text" class="form-control ff1"   data-geo="administrative_area_level_1"  id="state" name="data[Locum][state]" value="<?php echo $Locumobject->state;?>"  placeholder="state"/>
<span class="errorspan" id="errspan_state"></span>

<input type="hidden" class="form-control ff1"   data-geo="lat"  id="latitude" name="data[Locum][latitude]" value="<?php echo $Locumobject->latitude;?>"  placeholder="latitude"/>

<input type="hidden" data-geo="lng" class="form-control ff1"  value="<?php echo $Locumobject->longitude;?>"  id="longitude" name="data[Locum][longitude]" placeholder="longitude">

</div>
 
	
<div class="form-group">
<label for="password" class="control-label">City</label><br>
<input type="text" class="form-control ff1"  data-geo="administrative_area_level_2" 	id="city" name="data[Locum][city]" value="<?php echo $Locumobject->city;?>"    title="" placeholder="TYPE CITY NAME"/>
<span class="errorspan" id="errspan_city"></span>
</div>


<div class="form-group">
<label for="username" class="control-label">Postcode</label>
<input type="text" class="form-control ff1"  data-geo="postal_code" id="postcode" name="data[Locum][postcode]" value="<?php echo $Locumobject->postcode;?>"  title="Please enter your postcode" 	  placeholder="enter your postcode"/>
<span class="errorspan" id="errspan_postcode"></span>
</div>



<div class="form-group">
<label for="password" class="control-label">Head line</label><br>
<input type="text" class="form-control ff1" id="headline" name="data[Locum][headline]"  value="<?php echo $Locumobject->headline;?>"   title="" placeholder="Enter your headline">
<span class="errorspan" id="errspan_headline"></span>
</div>


<div class="form-group">
<label for="password" class="control-label">About me </label><br>
<textarea class="form-control ff1" id="aboutme" name="data[Locum][aboutme]" rows="5" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a"><?php echo $Locumobject->aboutme;?></textarea>
<span class="errorspan" id="errspan_aboutme"></span>
</div>


   

  <div class="form-group">
						  <label for="password" class="control-label">Smartcard</label><br>
						  <input type="text" class="form-control ff1" id="smartcard" name="data[Locum][smartcard]" value="<?php echo $Locumobject->smartcard;?>"   title="" placeholder="Smart card "/>
						  <span class="errorspan" id="errspan_smartcard"></span>
					  </div>				  
					  

 

					<div class="form-group">
					  <label for="username" class="control-label">IT Systems (Clinical Systems) </label>
				   	<?php
						$old_itsystems = $Locumobject->it_systems;
						$old_itsystems_array=explode(",",$old_itsystems);
 
 					foreach($itsystemlist as $itsys) {
  						if (in_array($itsys->id, $old_itsystems_array)){
					?>
			<input type='checkbox' name="data[Locum][it_systems][]" id='it_systems' value="<?php echo $itsys->id;?>" checked /><?php echo $itsys->itname;?> 
						<?php } else { ?>
			<input type='checkbox' name="data[Locum][it_systems][]" id='it_systems' value="<?php echo $itsys->id;?>" /><?php echo $itsys->itname;?> 
					 <br/> <?php
					}}	
					?>  
 					<span class="errorspan" id="errspan_it_systems"></span>
				  </div>


	

	<div class="form-group">
					  <label for="username" class="control-label">Qualifications</label>
				  		 
  
					<?php
 					
						$old_qualifications = $Locumobject->qualifications;
						$old_qualifications_array=explode(",",$old_qualifications);
				 
 					foreach($qualificationsarray as $qualify) {

						 
					 	if (in_array($qualify->id, $old_qualifications_array)){
					?>
	<input type='checkbox' name="data[Locum][qualifications][]" id='qualifications' value="<?php echo $qualify->id;?>" checked /><?php echo $qualify->quaname;?> 
						<?php } else { ?>
	<input type='checkbox' name="data[Locum][qualifications][]" id='qualifications' value="<?php echo $qualify->id;?>" /><?php echo $qualify->quaname;?> 
					 <br/> <?php
					}}	
					?>  
 					<span class="errorspan" id="errspan_qualifications"></span>
				  </div>
			
	<div class="form-group">
		  <label for="username" class="control-label">Languages known</label>
 
					<?php
	
 						$old_languages_known = $Locumobject->languages_known;
						$old_languages_known_array=explode(",",$old_languages_known);
 
 					foreach($spokenLanguagesarray as $language) {
 						if (in_array($language->id, $old_languages_known_array)){				
					?>
	<input type='checkbox' name="data[Locum][languages_known][]"  id='languages_known' value="<?php echo $language->id;?>" checked /><?php echo $language->langname;?> 
						<?php } else { ?>
	<input type='checkbox' id='languages_known' name="data[Locum][languages_known][]" value="<?php echo $language->id;?>" /><?php echo $language->langname;?> 
					 <br/> <?php
					}}	
					?>  
 					<span class="errorspan" id="errspan_languages_known"></span>
				  </div>


 
  
  
				  <div class="form-group">
						  <label for="username" class="control-label">NHS Pension</label>

<?php
$nhs_pension_array = array(
'1'=>'NHS Pension not paid',
'2'=>'NHS Pension paid at top',
'3'=>'Rate is inclusive of NHS pension'
);
?>
				<select   id="NHS_Pension" name="data[Locum][NHS_Pension]" class="form-control ff1"">	
				<option value=""> Select</option>
				<?php
				for($mt=1;$mt<count($nhs_pension_array);$mt++){
		 		?>
				<option value="<?php echo $mt;?>"  <?php if($Locumobject->NHS_Pension == $mt) echo 'selected'?>><?php echo $nhs_pension_array[$mt];?></option>
				<?php
				}
				?>
				</select>
							 
						  <span class="errorspan" id="errspan_NHS_Pension"></span>
					  </div>


<div class="form-group">
 <label for="username" class="control-label">GC number</label>
<input type="text" class="form-control ff1" id="gmc_number" name="data[Locum][gmc_number]" value="<?php echo $Locumobject->gmc_number;?>"  title="Please enter your gmc number" placeholder="Your enter your  gmc number" <?php  if ($Locumobject->verifiedlocum == 1 ) echo 'readonly=readonly'; ?> />

<span class="errorspan" id="errspan_gmc_number"></span>
 </div>
  
<?php
$howoftendoyoupaystaffinvoices_array = array(
'1'=>'As soon as they are received',
'2'=>'Weekly',
'3'=>'Fortnightly',
'4'=>'At the end of each month'
);
?>	

				   
	<div class="form-group">
	<label for="username" class="control-label">Email</label>
	<input type="text" class="form-control ff1" id="email" name="data[Locum][email]" value="<?php echo $Locumobject->email;?>"  				title="Please enter you username" 	  placeholder="Your Email Address" />
	<span class="errorspan" id="errspan_email"></span>
	</div>

	<div class="form-group">
	<label for="username" class="control-label">First name</label>
	<input type="text" class="form-control ff1" id="firstname" name="data[Locum][firstname]"
		 value="<?php echo $Locumobject->firstname;?>"   title="Please enter"   placeholder="Your First name"/>
	<span class="errorspan" id="errspan_firstname"></span>
	</div>

	<div class="form-group">
	<label for="username" class="control-label">Last name</label>
	<input type="text" class="form-control ff1" id="lastname" name="data[Locum][lastname]" 
	  value="<?php echo $Locumobject->lastname; ?>"   title="Please enter"   placeholder="Your Last name"/>
	<span class="errorspan" id="errspan_lastname"></span>
	</div>




<div class="form-group">
<label for="password" class="control-label">Phone Number</label><br>
<input type="text" class="form-control ff1" id="phone_number" name="data[Locum][phone_number]" value="<?php echo $Locumobject->phone_number;?>" title="" placeholder="enter your Phone number"/>
<span class="errorspan" id="errspan_phone_number"></span>
</div>

	
 

 
<div class="form-group">
 <label for="username" class="control-label">How did you hear about us?</label>
<select  class="form-control ff1" name="data[Locum][howdidyouhear]" id="howdidyouhear">
	<?php
		foreach($howdidyouhearlist as $hearlst){
	?>
 	  <option value="<?php echo $hearlst->id;?>"   <?php if($Locumobject->howdidyouhear == $hearlst->id) echo 'selected'?>  ><?php echo $hearlst->hearname;?></option>
	<?php
	}	
	?>  
</select>
<span class="errorspan" id="errspan_howdidyouhear"></span>
</div>
 



	
					  <div align="center">
						<button class="btn btn-info sbtn" id="submit">Save Changes</button>
						</div>
					  
				  </form>

</div>
</div>
</div>
</div>	
</div>
 <!--middle end here-->
