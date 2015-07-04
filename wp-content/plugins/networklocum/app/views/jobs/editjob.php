<?php
 $templtpath= get_template_directory_uri(); 
?>
<?php
$url = esc_url( home_url( '/' )); 
$templtpath= get_template_directory_uri(); 
?>
<script>
jQuery( document ).ready(function() {

	//console.log( "ready!" );
	jQuery("#submit1").click(function () {
		$("#calendarform").submit();
 	});

	jQuery("#submit5").click(function () {
		$("#savejob").val('savejob');
	});
 
});
</script>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 		<script type="text/javascript" src="<?php echo $templtpath;?>/js/jquery-1.11.1.js"></script>
		<script type="text/javascript" src="<?php echo $templtpath;?>/js/jquery-ui-1.11.1.js"></script>
 		<!-- loads mdp -->
		<script type="text/javascript" src="<?php echo $templtpath;?>/jquery-ui.multidatespicker.js"></script>
 		<!-- loads some utilities (not needed for your developments) -->
		<link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/css/mdp.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/css/prettify.css">
 		<script type="text/javascript" src="<?php echo $templtpath;?>/js/prettify.js"></script>
		<script type="text/javascript" src="<?php echo $templtpath;?>/js/lang-css.js"></script>

  <script type="text/javascript" src="<?php echo $templtpath;?>/timepicker/jquery.timepicker.js"></script>
  <script type="text/javascript" src="<?php echo $templtpath;?>/timepicker/jquery.datepair.js"></script>
  <script type="text/javascript" src="<?php echo $templtpath;?>/timepicker/datepair.js"></script>
  <script type="text/javascript" src="<?php echo $templtpath;?>/timepicker/lib/site.js"></script>


  <link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/timepicker/jquery.timepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/timepicker/lib/bootstrap-datepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/timepicker/lib/site.css" />
	
   

	 
<!--middle start here-->
	
	<div class="midcol">
	<div class="bitbox1">	
		<div class="container">
 		
			
			<form    id="calendarform" action="<?php echo $url.'jobs/editjob/'.$job_id;?>"  onsubmit="javascript:return validatepublicjobcreate();"  method="POST">
							 <?php $this->display_flash(); ?>

 
		<div class="row">	 
		<div class="col-md-12">
 		<!-- its my code end here -->

		<div id="settimerates">	 </div>
		 
		<!-- its my code end here -->	
		<?php 
	 		include('editsettimerates.php');
	 	?> 
		 
			
 		 
	 		
			  <div class="form-group">
						  <label for="password" class="control-label">Tariff</label>
<?php 

$onejobormultiplesessions_array = array(
'1'=>'Hourly Rate',
'2'=>'Salaried Position'
);
?>
					<select id="onejobormultiplesessions" name="onejobormultiplesessions" class="form-control ff1">
							<option value="">Select</option>
 							<?php
								for($mt=1;$mt<=count($onejobormultiplesessions_array);$mt++){
							?>
						 	  <option value="<?php echo $mt;?>"  <?php if($jobdetails->onejobormultiplesessions == $mt) echo 'selected'?>><?php echo $onejobormultiplesessions_array[$mt];?></option>
							<?php
							}	
							?>
						 
 				     </select>
 
						 
					  </div>
 
	


			 <div class="form-group">
						  <label for="password" class="control-label">Number of Patients?</label>
	
			 <input type="text" name="number_of_patients" id="number_of_patients"  value="<?php echo $jobdetails->number_of_patients;?>"/>
						 
						    <span id="errspan_number_of_patients" class="errorspan"></span>
			</div>

			 
			 <div class="form-group">
			 <label for="password" class="control-label">Number of Telephone consultations?</label>
	
 <input type="text" name="number_of_telephoneconsultations" id="number_of_telephoneconsultations"  value="<?php echo $jobdetails->number_of_telephoneconsultations;?>"/>
						 
						    <span id="errspan_number_of_patients" class="errorspan"></span>
			</div>

			 <div class="form-group">
				 <label for="password" class="control-label">Paperwork </label>
<input type="radio" name="paperwork" id="paperwork"  value="0"  <?php if ($jobdetails->paperwork == 0)  echo "checked='checked'" ?> /> No
<input type="radio" name="paperwork" id="paperwork"  value="1"   <?php if ($jobdetails->paperwork == 1)  echo "checked='checked'" ?>  /> Yes
	 					 
						    <span id="errspan_number_of_patients" class="errorspan"></span>
			</div> 
			 <div class="form-group">
						  <label for="password" class="control-label">Referrals</label>
	
	<input type="radio" name="referrals" id="referrals"  value="0"  <?php if ($jobdetails->referrals == 0)  echo "checked='checked'" ?> /> No
	<input type="radio" name="referrals" id="referrals"  value="1"  <?php if ($jobdetails->referrals == 1)  echo "checked='checked'" ?>  /> Yes
					 
						    <span id="errspan_number_of_patients" class="errorspan"></span>
			</div>
			 <div class="form-group">
						  <label for="password" class="control-label">Home Visits</label>
	 
<input type="radio" name="home_visits" id="home_visits"  value="0" <?php if ($jobdetails->home_visits == 0)  echo "checked='checked'" ?>  /> No
<input type="radio" name="home_visits" id="home_visits"  value="1"  <?php if ($jobdetails->home_visits == 1)  echo "checked='checked'" ?>  /> Yes

			 
						    <span id="errspan_number_of_patients" class="errorspan"></span>
			</div>
			 <div class="form-group">
						  <label for="password" class="control-label">Bloods</label>
	
 <input type="radio" name="bloods" id="bloods"  value="0"  <?php if ($jobdetails->bloods == 0)  echo "checked='checked'" ?>  /> No
 <input type="radio" name="bloods" id="bloods"  value="1" <?php if ($jobdetails->bloods == 1)  echo "checked='checked'" ?>  /> Yes

				<span id="errspan_number_of_patients" class="errorspan"></span>
			</div>
			 <div class="form-group">
						  <label for="password" class="control-label">Pension Included?</label>
	
<input type="radio" name="pension_included" id="pension_included"  value="0"  <?php if ($jobdetails->pension_included == 0)  echo "checked='checked'" ?>   /> No
 <input type="radio" name="pension_included" id="pension_included"  value="1"  <?php if ($jobdetails->pension_included == 1)  echo "checked='checked'" ?> /> Yes
						 
						    <span id="errspan_number_of_patients" class="errorspan"></span>
			</div>

					
				 
						 
						
					 
					  
					  <div class="form-group">
						  <label for="password" class="control-label">Required IT systems</label>
						  <select id="required_it_systems" name="required_it_systems" class="form-control ff1">
							<option value=""> Select</option>
							<?php
								foreach($itsystemlist as $itsys){
							?>
						 	  <option value="<?php echo $itsys->id;?>"  <?php if($jobdetails->required_it_systems == $itsys->id) echo 'selected'?>><?php echo $itsys->itname;?></option>
							<?php
							}	
							?>  
 						 </select>
						 
						    <span id="errspan_required_it_systems" class="errorspan"></span>
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
						  <select id="parking_facilities" name="parking_facilities" class="form-control ff1">
  							<option value="">Choose parking conditions</option>
<?php
								for($mt=1;$mt<count($parking_array);$mt++){
							?>
						 	  <option value="<?php echo $mt;?>"  <?php if($jobdetails->parking_facilities == $mt) echo 'selected'?>><?php echo $parking_array[$mt];?></option>
							<?php
							}	
							?>
						 
  						</select>
						  <span id="errspan_parking_facilities" class="errorspan"></span>
 
					  </div>
					  <div class="form-group">
						  <label for="username" class="control-label">Job description</label>
						  <textarea class="form-control ff1" id="session_description" name="session_description" rows="5" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a"><?php echo $jobdetails->session_description;?></textarea>
						  <span id="errspan_session_description" class="errorspan"></span>
					  </div>
					 


 				 
					 <input type="hidden" id="savejob" name="savejob" value=""/>
					 <input type="hidden" id="savejob" name="job_id" value="<?php echo $job_id;?>"/>
					 <div align="center">
						
							<button class="btn btn-info sbtn" id="submit5" >Post Job</button>
					  </div>
					
			</div>
			</div>		
				</div>

 	</form>	 
		</div>
	</div>

	<!--middle end here-->
