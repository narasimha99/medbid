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
 

	 
<!--middle start here-->
	
	<div class="midcol">
	<div class="bitbox1">	
		<div class="container">
 		
			
			<form    id="calendarform" action="<?php echo $url.'jobs/editjob/'.$job_id;?>"  onsubmit="javascript:return validatepublicjobcreate();"  method="POST">
		<h2> View Job Details </h2>						
		 <?php  $this->display_flash(); ?>

 
		<div class="row">	 
		<div class="col-md-12">
 		<!-- its my code end here -->

		 <table id="<?php echo 'TABLEsessionday'.$i;?>" class="table" >

<tr>
 <td> Practicers details </td>
</tr>
<tr>
 <td> Dates required </td>
</tr>

 <h3> Dates required </h3>
<tr>
 
<th>Sart Time</th>
<th>End Time</th>
<th>Hourly rate £</th>
<th>Pay to locum </th>
<th>Medbid Locum fees</th>

</tr>
 

<tbody>		
 
<?php
//echo count($_POST['session_starttime']) ;
echo "<pre>"; print_r($practicerdetails);

	$i=1;
	$j=1;
	foreach($jobsessions as $jobsession) 
	{
 	
?>
<tr  id="sessiontime">
<td>
<?php 
echo date('D j M Y, H:ma', strtotime($jobsession->session_starttime));
?>
 	 </td>
 
<td>

<?php echo date('H:ma', strtotime($jobsession->session_endtime)); ?>
 </td>


<td>
 <?php echo $jobsession->hourlyrate;?>
</td>


<td> <?php echo $jobsession->paytolocum;?>   </td>


<td>  <?php echo $jobsession->medbidfee;?> </td>



<td> 
 </td> 
<?php 
if (!isset($jobsession->id))
	$jobsession->id = 0;
?>
<input type="hidden" name="jobsession_id[]" value="<?php echo $jobsession->id;?>"/>



</tr>

<?php
$j = $j + 1;
}
?> 
 </tbody>
</table>


 		</div>
	 		
			 
 	
					
				 
						 
						
					  <div class="form-group">
						  <label for="password" class="control-label">One job or multiple sessions</label>
<?php 
 
$onejobormultiplesessions_array = array(
'1'=>'Post as one job',
'2'=>'Post as individual sessions'
);

   echo $onejobormultiplesessions_array[$jobdetails->onejobormultiplesessions];
?>
					
							 
						 
 				    
						 
					  </div>
					  
					  <div class="form-group">
						  <label for="password" class="control-label">Required IT systems</label>
						   <?php
								foreach($itsystemlist as $itsys){
							  if($jobdetails->required_it_systems == $itsys->id) echo $itsys->itname; 
							 
							}	
							?>  
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
						 
<?php
								 
						 echo 	 $parking_array[$jobdetails->parking_facilities];
 
	 ?>
						 
  					 
					  </div>
					  <div class="form-group">
						  <label for="username" class="control-label">Job description</label>
						 <?php echo $jobdetails->session_description;?>
 					  </div>
					 


			<div class="row">
				 
					 <input type="hidden" id="savejob" name="savejob" value=""/>
					 <input type="hidden" id="savejob" name="job_id" value="<?php echo $job_id;?>"/>
					 <div align="center">
						
							<button class="btn btn-info sbtn" id="submit5" >Post Job</button>
						</div>
					
			
 				</div> 
					</div>
						</div>
 	</form>	
	<!--middle end here-->
