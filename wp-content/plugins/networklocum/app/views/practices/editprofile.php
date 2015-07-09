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
$("#locumsignupnext").submit();
});
 
jQuery(function () {	
 	jQuery("#location").geocomplete({
	  details: ".bitbox1",
	  detailsAttribute: "data-geo"
	});
});


});
</script>
<?php
$url = esc_url( home_url( '/' ));
$templtpath= get_template_directory_uri(); 
?>
<!--middle start here-->
 	<div class="midcol">
		<div class="dashbg" style="margin-top: -48px;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="dashmid">
							<div class="dashmidh">
								<h2>Edit practices details</h2>
							</div>
							
							
							
							<div class="dtextpad">
							
							<ol class="breadcrumb">
							  <li><a href="#"="<?php echo $url.'locums/youraccount';?>">Your Account</a></li>
							  <li class="active">Edit practices</li>

								  <?php //echo "in view "; echo "<pre>";print_r($practiceobject); echo "</pre>"; ?>
								  <div class="row">
									<div class="col-md-8 col-md-offset-2 ">
										<div class="bitbox1">
						
<form name="practicesignup" id="practicesignup"   autocomplete="off"  method="post" action="<?php echo $url;?>practices/editprofile" onsubmit="javascript:return validatepracticesignup();" enctype="multipart/form-data">
 <?php $this->display_flash(); ?>
 
				<input type="hidden" name="data[Practice][id]" id="id" value="<?php echo $practiceobject->id;?>"/>
						<div class="form-group">
						  <label for="password" class="control-label">Practice Name</label><br>
						  <input type="text" class="form-control ff1" id="practicename" name="data[Practice][practicename]"    title="" placeholder="Prastise Name"  value="<?php echo $practiceobject->practicename;?>" />
						   <span class="errorspan" id="errspan_practicename"></span>
					  </div>
					  
					  <div class="form-group">
						  <label for="password" class="control-label">Practice code</label><br>
						  <input type="text" class="form-control ff1" id="practice_code" name="data[Practice][practice_code]" value="<?php echo $practiceobject->practice_code;?>"   title="" placeholder="practice code"/>
						 <span class="errorspan" id="errspan_practice_code"></span>
					  </div>
					  
					  <div class="form-group">
						  <label for="password" class="control-label">PCT</label>
						  <select id="pct" name="data[Practice][pct]" class="form-control ff1">
						 <option value="">Select</option>
						<?php
						foreach($pctcodelist as $pct){
						if ($practiceobject->pct == $pct->id) {
 						?>
						<option selected value="<?php echo $pct->id;?>"><?php echo $pct->pct_name;?></option>
						<?php } else { ?>
						<option value="<?php echo $pct->id;?>"><?php echo $pct->pct_name;?></option>
						<?php
						}
						}
						?>  
 
						 </select>
						 <span class="errorspan" id="errspan_pct"></span>
					  </div>
					  <div class="form-group">
						  <label for="username" class="control-label">CCG</label>
						  <select id="ccg_id" name="data[Practice][ccg_id]" class="form-control ff1">
						 <option value="">Select</option>
 						<?php
						foreach($cgcodelist as $ccg){
 						if ($practiceobject->ccg_id == $ccg->id) {
 						?>
						<option selected value="<?php echo $ccg->id;?>"><?php echo $ccg->ccg_name;?></option>
						<?php } else { ?>
						<option value="<?php echo $ccg->id;?>"><?php echo $ccg->ccg_name;?></option>
						<?php
						}}	
						?>  
						 </select>
						  <span class="errorspan" id="errspan_ccg_id"></span>
					  </div>
					  
<div class="form-group">
<label for="username" class="control-label">IT Systems</label>
<select id="it_systems" name="data[Practice][it_systems][]" required="true"  class="form-control ff1" multiple="multiple">	
<option value="">Select</option>
<?php
$old_itsystems = $practiceobject->it_systems;
$old_itsystems_array=explode(",",$old_itsystems);
$sm = count($old_itsystems_array);
$old_itsystems_array[$sm] = $old_itsystems_array[0];
unset($old_itsystems_array[0]);
//echo "<pre>"; print_r($old_itsystems_array); echo"</pre>";
foreach($itsystemlist as $itsys){
$key = array_search($itsys->id, $old_itsystems_array);
if ($key>0){
?>
<option selected value="<?php echo $itsys->id;?>"><?php echo $itsys->itname;?></option>
<?php } else { ?>
<option value="<?php echo $itsys->id;?>"><?php echo $itsys->itname;?></option>
<?php
}}	
?>  
</select>
<span class="errorspan" id="errspan_it_systems"></span>
</div>
	




				  
					  <div class="form-group">
						  <label for="username" class="control-label">Parking facilities</label>
						 
							<?php
							$parking_array = array(
							'1'=>'Free and near',
							'2'=>'Free and onsite',
							'3'=>'Pay and Display nearby',
							'4'=>'Parking is difficult',
							'5'=>'Free and onsite'
							);
							?>
							<select id="parking" name="data[Practice][parking]" class="form-control ff1">
							<option value="">Choose parking conditions</option>
							<?php
							for($mt=1;$mt<count($parking_array);$mt++){
							?>
							<option value="<?php echo $mt;?>"  <?php if($_POST['parking'] == $mt) echo 'selected'?>><?php echo $parking_array[$mt];?></option>	
							<?php
							}	
							?>
							</select>
						<span class="errorspan" id="errspan_parking"></span>
					  </div>

<div class="form-group">
<label for="password" class="control-label">Location:</label><br>
<input type="text" class="form-control ff1" id="location" name="data[Practice][geo_location]" value="<?php echo $practiceobject->geo_location;?>"    title="" placeholder="Start with your location name we are verifying all locations from Google" />
<span class="errorspan" id="errspan_location"></span>
</div>

					  
					  <div class="form-group">
						  <label for="password" class="control-label">Address</label><br>
						  <input type="text" class="form-control ff1" id="address" name="data[Practice][address]" value="<?php echo $practiceobject->address;?>"  data-geo="formatted_address"  placeholder="Address"/>
						   
						 <span class="errorspan" id="errspan_address"></span>
					  </div>
					  
					  
	
  <div class="form-group">
						  <label for="password" class="control-label">City</label><br>
						  <input type="text" class="form-control ff1" id="city" name="data[Practice][city]" value="<?php echo $practiceobject->city;?>"  data-geo="administrative_area_level_2"    placeholder="TYPE CITY NAME"/>
						 <span class="errorspan" id="errspan_city"></span>
					  </div>


 <div class="form-group">
						  <label for="password" class="control-label">Country</label><br>
						  <input type="text" class="form-control ff1"  data-geo="country" id="country" name="data[Practice][country]" value="<?php echo $practiceobject->country;?>"    title="" placeholder="country"/>
						   
						 <span class="errorspan" id="errspan_country"></span>
					  </div>
				  


<div class="form-group">
<label for="password" class="control-label">State</label><br>
<input type="text" class="form-control ff1"   data-geo="administrative_area_level_1"  id="state" name="data[Practice][state]" value="<?php echo $practiceobject->state;?>"  placeholder="state"/>
<span class="errorspan" id="errspan_state"></span>

<input type="hidden" class="form-control ff1"   data-geo="lat"  id="latitude" name="data[Practice][latitude]" value="<?php echo $practiceobject->latitude;?>"  placeholder="latitude"/>

<input type="hidden" data-geo="lng" class="form-control ff1"  value="<?php echo $practiceobject->longitude;?>"  id="longitude" name="data[Practice][longitude]" placeholder="longitude">

</div>

 



  <div class="form-group">
						  <label for="password" class="control-label">Post code</label><br>
						  <input type="text" class="form-control ff1" id="postcode" name="data[Practice][postcode]"  value="<?php echo $practiceobject->practice_code;?>"  data-geo="postal_code" placeholder="Enter your postcode">
						  <span class="errorspan" id="errspan_postcode"></span>
					  </div>


  <div class="form-group">
						  <label for="password" class="control-label">About us and our patients</label><br>
						   <textarea class="form-control ff1" id="aboutusandourpatients" name="data[Practice][aboutusandourpatients]" rows="5" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a"><?php echo $practiceobject->aboutusandourpatients;?></textarea>
					  <span class="errorspan" id="errspan_aboutusandourpatients"></span>
					  </div>


  <div class="form-group">
						  <label for="password" class="control-label">Travel Info</label><br>
<textarea class="form-control ff1" id="travel_info" name="data[Practice][travel_info]" rows="5" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a"><?php echo $practiceobject->practice_code;?></textarea>
						 <span class="errorspan" id="errspan_travel_info"></span>
					  </div>



  <div class="form-group">
						  <label for="password" class="control-label">Locum pack</label><br>
						  <input type="file" class="form-control ff1" id="locum_pack" name=locum_pack" value="<?php echo $practiceobject->locum_pack;?>"   title="" placeholder="locum pack"/>
						  <span class="errorspan" id="errspan_locum_pack"></span>
					  </div>				  
					  
					  

  <div class="form-group">
						  <label for="password" class="control-label">Phone Number</label><br>
						  <input type="text" class="form-control ff1" id="phone_number" name="data[Practice][phone_number]" value="<?php echo $practiceobject->phone_number;?>" title="" placeholder="enter your Phone number"/>
						 <span class="errorspan" id="errspan_phone_number"></span>
					  </div>	


 	



  <div class="form-group">
						  <label for="password" class="control-label">Mobile Number</label><br>
						  <input type="text" class="form-control ff1" id="mobile_number" name="data[Practice][mobile_number]" value="<?php echo $practiceobject->mobile_number;?>" title="" placeholder="Enter your mobile number"/>
						 <span class="errorspan" id="errspan_mobile_number"></span>
					  </div>

 <div class="form-group">
						  <label for="password" class="control-label">We make payments by</label><br>
						  <input type="checkbox" class="form-control ff1" id="payment_mode" name="data[Practice][payment_mode]" value="<?php echo $practiceobject->payment_mode;?>"    title="" placeholder="Choose your payment method"/>BACS   
 <input type="checkbox" class="form-control ff1" id="pcode" name="data[Practice][pcode]"  value="<?php echo $practiceobject->payment_mode;?>"  title="" placeholder="choose your payment mode"/> Cheque 
						<span class="errorspan" id="errspan_payment_mode"></span>
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
				<select   id="NHS_Pension" name="data[Practice][NHS_Pension]" class="form-control ff1"">	
				<option value=""> Select</option>
				<?php
				for($mt=1;$mt<count($nhs_pension_array);$mt++){
		 		?>
				<option value="<?php echo $mt;?>"  <?php if($practiceobject->NHS_Pension == $mt) echo 'selected'?>><?php echo $nhs_pension_array[$mt];?></option>
				<?php
				}
				?>
				</select>
							 
						  <span class="errorspan" id="errspan_NHS_Pension"></span>
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
<label for="username" class="control-label">How often do you pay staff invoices?</label>
<select  id="howoftendoyoupaystaffinvoices" name="data[Practice][howoftendoyoupaystaffinvoices]" class="form-control ff1">	
<option  > Select</option>			
<option value=""> Select</option>
<?php
for($mt=1;$mt<count($howoftendoyoupaystaffinvoices_array);$mt++){
?>
<option value="<?php echo $mt;?>"  <?php if($practiceobject->howoftendoyoupaystaffinvoices == $mt) echo 'selected'?>><?php echo $howoftendoyoupaystaffinvoices_array[$mt];?></option>
<?php
}	
?>
</select>


<span class="errorspan" id="errspan_it_systems"></span>
</div>


	

	
					  <div align="center">
						<button class="btn btn-info sbtn" id="submit">Save Changes</button>
						</div>
					  
				  </form>
					</div>
									</div>

								
									
									
									
								  </div>
								  
								 					  
							</div>
							<div class="dashmidh2">
								
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
			
				
		
	</div>
	
	<!--middle end here-->
