<script>
jQuery( document ).ready(function() {
 
	//console.log( "ready!" );
	jQuery("#submit1").click(function () {
		$("#acceptjob").val('acceptjob');
		$("#acceptjobform").submit();
  	});

	jQuery("#submit2").click(function () {
		$("#acceptjob").val('rejectjob');
		$("#acceptjobform").submit();
	});
 
});
</script>
<?php
 $templtpath= get_template_directory_uri(); 
?>
<?php
$url = esc_url( home_url( '/' )); 
$templtpath= get_template_directory_uri(); 
//echo "<pre>"; print_r($jobdetails); echo "</pre>";
?>
<!--middle start here-->
<div class="midcol">
<div class="bitbox1">	
<div class="container">
	 
		<h2> Applied Job Details</h2>
						
		 <?php $this->display_flash(); ?>

 
		<div class="row">	 
		<div class="col-md-12">
 		<!-- its my code end here -->
		<form    id="acceptjobform" action="<?php echo $url.'locums/acceptyourjob/'.$appliedjobId;?>"  method="POST">

		 <table id="<?php echo 'TABLEsessionday'.$i;?>" class="table" >

<tr>
<td> Practicer details :   <?php echo $jobdetails->practice_code.','.$jobdetails->practicename; ?>   &nbsp; 
<a href="<?php echo $url.'practices/viewpracticer/'.$jobdetails->practicer_id;?>" target="_blank" title="Click here to  view more practicers details on newtab"> view more...</a> 
</td>
<td> No of sessions :  <?php echo $jobdetails->no_of_sessions; ?> </td>
</tr>
  
<tr>
 <th>Sart Time</th>
<th>End Time</th>
<th>Hourly rate £</th>
<th>Hours</th>
<th>Pay to locum </th>
 

</tr>
 

 
 
<?php
//echo count($_POST['session_starttime']) ;
//echo "<pre>"; print_r($jobsessions);
$jobdetails->onejobormultiplesessions =1;
$i=1;
$j=1;
   	
?>
<tr  id="sessiontime">
 <td>
<?php 
echo date('D j M Y, H:ma', strtotime($jobdetails->session_starttime));
?>
</td>
 
<td> <?php echo date('H:ma', strtotime($jobdetails->session_endtime)); ?> 
<td> <?php echo $jobdetails->hourlyrate;?>    </td>
<td> <?php  echo $jobsession->timediff;?>  </td>
<td> <?php echo $jobdetails->paytolocum;?> </td>	
</tr> 
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
				 <?php echo $jobdetails->number_of_patients;?>	 		
		 		</div>

			 
			 <div class="form-group">
			 <label for="password" class="control-label">Number of Telephone consultations : </label>
	 			 <?php echo $jobdetails->number_of_telephoneconsultations;?>
  			</div>

			 <div class="form-group">
				 <label for="password" class="control-label">Paperwork : </label>
		<?php 
			$yesnoarray = array('0'=>'Yes','1'=>'No');
		?>
  <?php echo $yesnoarray[$jobdetails->paperwork]; ?>
 	 					 
			</div> 
			 <div class="form-group">
				<label for="password" class="control-label">Referrals</label>
				<?php echo $yesnoarray[$jobdetails->referrals];?>
  			</div>
			 <div class="form-group">
						  <label for="password" class="control-label">Home Visits</label>
					 <?php echo $yesnoarray[$jobdetails->home_visits];?> 
			
			</div>
			 <div class="form-group">
						  <label for="password" class="control-label">Bloods</label>
						 <?php echo $yesnoarray[$jobdetails->bloods];?> 
  			</div>
			 <div class="form-group">
						  <label for="password" class="control-label">Pension Included?</label>
						 <?php echo $yesnoarray[$jobdetails->pension_included];?>  
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
				 
					 <input type="hidden" id="acceptjob" name="acceptjob" value="acceptjob"/>
					 <input type="hidden"  name="appliedjobId" value="<?php echo $jobdetails->id;?>"/>
					 <div align="center">
		  		<?php
				if( $jobdetails->practicer_accepted == 1 && $jobdetails->locum_rejected == 0 && $jobdetails->locum_rejected!=1 &&  $jobdetails->locum_accepted==0 ) {
				?>
					<button class="btn btn-info sbtn" id="submit1">Accept this job</button>
					<button class="btn btn-info sbtn" id="submit2">Reject this job</button>
		 		<?php } ?>
					 </div>
			  </div> 
					 
					</div>
					</div>
 	</form>	
</div>
</div>
</div>
<!--middle end here-->
