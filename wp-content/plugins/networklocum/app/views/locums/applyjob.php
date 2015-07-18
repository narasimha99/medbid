<script>
jQuery( document ).ready(function() {

	
        $('input[type="checkbox"]').click(function(){

            if($(this).prop("checked") == true){
 		   
		var id = $(this).attr('id');
		$("#hourlyrate_"+id).prop('disabled', false);

             }
 	  else if($(this).prop("checked") == false){

               var id = $(this).attr('id');
		$("#hourlyrate_"+id).prop('disabled', true);


            }

        });

	$(".hourlyrate").blur(function(){
		 var data_id =  $(this).attr("data_id");
	 	//alert(data_id);

		var hourlyrate = $("#hourlyrate_"+data_id).val();
		var paytolocum = $("#paytolocum_"+data_id).val();
		var timediff  =  $("#timediff_"+data_id).val();
		var res = timediff.split(":");
		paytolocum = hourlyrate * res[0];
		 $("#paytolocum_"+data_id).val(paytolocum);
			//alert("This input field has lost its focus.");
	});

	//console.log( "ready!" );
	jQuery("#submit1").click(function () {
		$("#calendarform").submit();
 	});

	jQuery("#submit5").click(function () {
		$("#savejob").val('savejob');
	});
 
});
</script>

<?php
 $templtpath= get_template_directory_uri(); 
?>
<?php
$url = esc_url( home_url( '/' )); 
$templtpath= get_template_directory_uri(); 
//echo "<pre>"; print_r($practicerdetails); echo "</pre>";
?>
 
<!--middle start here-->
	
<div class="midcol">
<div class="bitbox1">	
<div class="container">
	
			
<form    id="calendarform" action="<?php echo $url.'locums/applyjob/'.$job_id;?>"  onsubmit="javascript:return validateapplyjob();" method="POST">
		<h2> Apply for the job </h2>						
		 <?php $this->display_flash(); ?>

 
		<div class="row">	 
		<div class="col-md-12">
 		<!-- its my code end here -->

		 <table id="<?php echo 'TABLEsessionday'.$i;?>" class="table" >

<tr>
<td>&nbsp;</td>
<td> Practicer details : <input type="hidden" name="practicer_id" value="<?php echo $practicerdetails->user_id;?>"/> <?php echo $practicerdetails->practice_code.','.$practicerdetails->practicename; ?> </td>
<td>&nbsp; </td>
<td> No of sessions : <?php echo $jobdetails->no_of_sessions; ?> </td>
</tr>
 
<tr>
<td colspan="4"> Please choose any one from  bellow sessions to apply the job </td>
</tr>

<tr>
<th>&nbsp;</th>
<th>Sart Time</th>
<th>End Time</th>
<th>Hourly rate £</th>
<th>Hours</th>
<th>Pay to locum </th>
 

</tr>
 

 
 
<?php
//echo count($_POST['session_starttime']) ;
//echo "<pre>"; print_r($jobsessions);

$i=1;
$j=1;
	foreach($jobsessions as $jobsession) 
	{
 	
?>
<tr  id="sessiontime">
<td>
<input type="radio" checked name="jobsessions[<?php echo $jobsession->id;?>]" id="<?php echo $jobsession->id;?>"  value="<?php echo $jobsession->id;?>" /> 
 </td>
<td>
<?php 
echo date('D j M Y, H:ma', strtotime($jobsession->session_starttime));
?>
</td>
 
<td> <?php echo date('H:ma', strtotime($jobsession->session_endtime)); ?> 

 <input type="hidden" data_id="<?php echo $jobsession->id;?>"   id="session_starttime_<?php echo $jobsession->id;?>" name="session_starttime[<?php echo $jobsession->id;?>]" value="<?php echo $jobsession->session_starttime;?>"   /> 

 <input type="hidden" data_id="<?php echo $jobsession->id;?>"    id="session_endtime_<?php echo $jobsession->id;?>" name="session_endtime[<?php echo $jobsession->id;?>]" value="<?php echo $jobsession->session_endtime;?>"   /> 
 </td>
<td> 
 <input type="text" data_id="<?php echo $jobsession->id;?>" class="hourlyrate"  id="hourlyrate_<?php echo $jobsession->id;?>" name="hourlyrate[<?php echo $jobsession->id;?>]" value="<?php echo $jobsession->hourlyrate;?>"   />   </td>
<td>
<input type="hidden" data_id="<?php echo $jobsession->id;?>"  id="timediff_<?php echo $jobsession->id;?>" name="timediff[<?php echo $jobsession->id;?>]" value="<?php echo $jobsession->timediff;?>"   /> <?php echo $jobsession->timediff;?>  </td>
 
<td>  <input type="text" data_id="<?php echo $jobsession->id;?>"   id="paytolocum_<?php echo $jobsession->id;?>"  name="paytolocum[<?php echo $jobsession->id;?>]" value="<?php echo $jobsession->paytolocum;?>" readonly    />   </td>	
 
<?php 
if (!isset($jobsession->id))
	$jobsession->id = 0;
?>
 
</tr>

<?php
$j = $j + 1;
}
?> 
 </tbody>
</table>


 		</div>
	 		
		 	  <div class="form-group">
				  <label for="password" class="control-label">Tariff: </label>
				<?php 

				$onejobormultiplesessions_array = array(
				'1'=>'Hourly Rate',
				'2'=>'Salaried Position'
				);
				?>
				<?php  echo $onejobormultiplesessions_array[$jobdetails->onejobormultiplesessions];?>
			   </div>
					  


			 <div class="form-group">
			  <label for="password" class="control-label">Number of Patients  : </label>
				<input type="text" name="number_of_patients"  value="<?php echo $jobdetails->number_of_patients;?>"/>	 		
		 		</div>

			 
			 <div class="form-group">
			 <label for="password" class="control-label">Number of Telephone consultations : </label>
	 			<input type="text" name="number_of_telephoneconsultations"  value="<?php echo $jobdetails->number_of_telephoneconsultations;?>"/>	
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
						  <label for="password" class="control-label">Required IT systems : </label>
						   <?php
								foreach($itsystemlist as $itsys){
							  if($jobdetails->required_it_systems == $itsys->id) echo $itsys->itname; 
							 
							}	
							?>  
  					  </div>
					  <div class="form-group">
						  <label for="username" class="control-label">Parking facilities : </label>
<?php
$parking_array = array(
'1'=>'Free and near',
'2'=>'Free and onsite',
'3'=>'Pay and Display nearby',
'4'=>'Parking is difficult',
'5'=>'Free and onsite'
);

?>
						 
						<?php
								 
						 echo 	 $parking_array[$jobdetails->parking_facilities];
 
						?>
						 
  					 
					  </div>
					  <div class="form-group">
						  <label for="username" class="control-label">Job description  : </label>
						 <?php echo $jobdetails->session_description;?>
 					  </div>
					 


			<div class="row">
				 
					 <input type="hidden" id="savejob" name="savejob" value="savejob"/>
					 <input type="hidden" id="savejob" name="job_id" value="<?php echo $job_id;?>"/>
					 <div align="center">
						
							<button class="btn btn-info sbtn" id="submit5" >Apply this Job</button>
					 </div>
			  </div> 
					 
					</div>
					</div>
 	</form>	
</div>
</div>
</div>
	<!--middle end here-->
