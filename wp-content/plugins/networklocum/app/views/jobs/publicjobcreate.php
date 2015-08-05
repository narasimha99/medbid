<?php
$templtpath = get_template_directory_uri(); 
$url = esc_url( home_url( '/' )); 
?>
<script>
jQuery(document).ready(function() {

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
<script type="text/javascript" src="<?php echo $templtpath;?>/js/prettify.js"></script>
<script type="text/javascript" src="<?php echo $templtpath;?>/js/lang-css.js"></script>
<script type="text/javascript" src="<?php echo $templtpath;?>/timepicker/jquery.timepicker.js"></script>
<script type="text/javascript" src="<?php echo $templtpath;?>/timepicker/jquery.datepair.js"></script>
<script type="text/javascript" src="<?php echo $templtpath;?>/timepicker/datepair.js"></script>
<script type="text/javascript" src="<?php echo $templtpath;?>/timepicker/lib/site.js"></script>
<!-- loads some utilities (not needed for your developments) -->
<link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/css/mdp.css">
<link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/css/prettify.css">
<link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/timepicker/jquery.timepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/timepicker/lib/bootstrap-datepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/timepicker/lib/site.css" />
 	 
<!--middle start here-->
	
	<div class="midcol">
	<div class="container">
	<div class="bitbox1">	

	<h2> Create a Job </h2>

<?php 

if( $practicerDetails[0]->verifiedpracticer != 1 ) { ?>					
		<div class="row">		
		<div style="padding:15px; border:1px solid #cdcdcd; background-color:#FA8056;">Your profile is not yet approved by our team, before apply to any job it should be valid. <a href="<?php echo  $url.'practices/editprofile/'; ?>">more...</a></div>
		</div>
		<?php } else {  ?>
		

 			
			<form    id="calendarform" action="<?php echo $url;?>jobs/publicjobcreate"  onsubmit="javascript:return validatepublicjobcreate();"  method="POST">
							 <?php $this->display_flash(); ?>

 
		<div class="row">	 
		<div class="col-md-12">
		<!-- <div   align="right"> <input type='button' name="add" style="align:right"  value="Join more days" onclick="addmoredays();"/> </div> -->

 

		<!-- its my code end here -->

		<div id="settimerates">	 </div>
	 	<!-- its my code end here -->	
		<?php 
	 		include('settimerates.php');
	 	?> 
	 		
 	  
			 <div class="form-group">
						  <label for="password" class="control-label">Number of Patients?</label>
	
			 <input type="text" name="number_of_patients" id="number_of_patients"  value="<?php echo $_POST['number_of_patients'];?>"/>
						 
						    <span id="errspan_number_of_patients" class="errorspan"></span>
			</div>

			 
			 <div class="form-group">
			 <label for="password" class="control-label">Number of Telephone consultations?</label>
	
			 <input type="text" name="number_of_telephoneconsultations" id="number_of_telephoneconsultations"  value="<?php echo $_POST['number_of_telephoneconsultations'];?>"/>
						 
						    <span id="errspan_number_of_patients" class="errorspan"></span>
			</div>
			 <div class="form-group">
				 <label for="password" class="control-label">Paperwork </label>
<input type="radio" name="paperwork" id="paperwork"  value="0"  <?php if ($_POST['paperwork'] == 0)  echo "checked='checked'" ?> /> No
<input type="radio" name="paperwork" id="paperwork"  value="1"   <?php if ($_POST['paperwork'] == 1)  echo "checked='checked'" ?>  /> Yes
	 					 
						    <span id="errspan_number_of_patients" class="errorspan"></span>
			</div> 
			 <div class="form-group">
						  <label for="password" class="control-label">Referrals</label>
	
	<input type="radio" name="referrals" id="referrals"  value="0"  <?php if ($_POST['referrals'] == 0)  echo "checked='checked'" ?> /> No
	<input type="radio" name="referrals" id="referrals"  value="1"  <?php if ($_POST['referrals'] == 1)  echo "checked='checked'" ?>  /> Yes
					 
						    <span id="errspan_number_of_patients" class="errorspan"></span>
			</div>
			 <div class="form-group">
						  <label for="password" class="control-label">Home Visits</label>
	 
<input type="radio" name="home_visits" id="home_visits"  value="0" <?php if ($_POST['home_visits'] == 0)  echo "checked='checked'" ?>  /> No
<input type="radio" name="home_visits" id="home_visits"  value="1"  <?php if ($_POST['home_visits'] == 1)  echo "checked='checked'" ?>  /> Yes

			 
						    <span id="errspan_number_of_patients" class="errorspan"></span>
			</div>
			 <div class="form-group">
						  <label for="password" class="control-label">Bloods</label>
	
 <input type="radio" name="bloods" id="bloods"  value="0"  <?php if ($_POST['bloods'] == 0)  echo "checked='checked'" ?>  /> No
 <input type="radio" name="bloods" id="bloods"  value="1" <?php if ($_POST['bloods'] == 1)  echo "checked='checked'" ?>  /> Yes

				<span id="errspan_number_of_patients" class="errorspan"></span>
			</div>
			 <div class="form-group">
						  <label for="password" class="control-label">Pension Included?</label>
	
<input type="radio" name="pension_included" id="pension_included"  value="0"  <?php if ($_POST['pension_included'] == 0)  echo "checked='checked'" ?>   /> No
 <input type="radio" name="pension_included" id="pension_included"  value="1"  <?php if ($_POST['pension_included'] == 1)  echo "checked='checked'" ?> /> Yes
						 
						    <span id="errspan_number_of_patients" class="errorspan"></span>
			</div>
			 

					  <div class="form-group">
						  <label for="password" class="control-label">Required IT systems</label>
						  <select id="required_it_systems" name="required_it_systems" class="form-control ff1">
							<option value=""> Select</option>
							<?php
								foreach($itsystemlist as $itsys){
							?>
						 	  <option value="<?php echo $itsys->id;?>"  <?php if($_POST['required_it_systems'] == $itsys->id) echo 'selected'?>><?php echo $itsys->itname;?></option>
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
						 	  <option value="<?php echo $mt;?>"  <?php if($_POST['parking_facilities'] == $mt) echo 'selected'?>><?php echo $parking_array[$mt];?></option>
							<?php
							}	
							?>
						 
  						</select>
						  <span id="errspan_parking_facilities" class="errorspan"></span>
 
					  </div>
					  <div class="form-group">
						  <label for="username" class="control-label">Job description</label>
						  <textarea class="form-control ff1" id="session_description" name="session_description" rows="5" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a"><?php echo $_POST['session_description'];?></textarea>
						  <span id="errspan_session_description" class="errorspan"></span>
					  </div>
					 


			 	 
					 <input type="hidden" id="savejob" name="savejob" value=""/>
					 <div align="center">
						
							<button class="btn btn-info sbtn" id="submit5" >Post Job</button>
					</div>
					
			
 				</div> 
					</div>
						
 	</form>	
<?php } ?>
</div>
</div>
</div>
	<!--middle end here-->
