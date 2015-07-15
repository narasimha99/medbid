<?php
$url = esc_url( home_url( '/' )); 
$templtpath= get_template_directory_uri(); 
?>	 
<!--middle start here-->
<div class="midcol">
<div class="container">
<div class="row">	 
<div class="col-md-12">
 
<h2> View Job Details </h2>						
<?php  $this->display_flash(); ?>

 
<table class="col-md-12 table-bordered table-striped table-condensed cf" style="margin-bottom:10px;margin-top:10px">
 
<tbody>		
 
<tr>
 <td> Practicers details </td>
 <td colspan="3"> <?php echo $jobdetails[0]->practice_code.', '.$jobdetails[0]->practicename ;?>  &nbsp; <a href="<?php echo $url.'practices/viewpracticer/'.$jobdetails[0]->user_id;?>" target="_blank" title= "Click here to  view more practicers details on newtab"> view more...</a> </td>
</tr>

 
 
<tr>
 <td>  Job Posted Date: </td> <td colspan="3"><?php echo date('D j M Y, H:m', strtotime($jobdetails[0]->createddate));?> </td> 
</tr>

 
<tr>
<th>Start Time</th>
<th>End Time</th>
<th>Hourly rate £</th>
<th>Pay to locum </th>
</tr>
 

<?php
//echo count($_POST['session_starttime']) ;
//echo "<pre>"; print_r($practicerdetails);

	$i=1;
	$j=1;
	foreach($jobdetails as $jobsession) 
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
  
</tr>

<?php
$j = $j + 1;
}
?> 

<tr>	 		

<td>
 <label for="password" class="control-label">One job or multiple sessions</label>
</td>

<td colspan="3">
<?php 
$onejobormultiplesessions_array = array(
'1'=>'Post as one job',
'2'=>'Post as individual sessions'
);
   echo $onejobormultiplesessions_array[$jobdetails[0]->onejobormultiplesessions];
?>
</td> 
</tr>

<tr>
<td>
<label for="password" class="control-label">Tariff: </label>
</td>
<td colspan="3" >
<?php 
$onejobormultiplesessions_array = array(
'1'=>'Hourly Rate',
'2'=>'Salaried Position'
);
?>
<?php  echo $onejobormultiplesessions_array[$jobdetails[0]->onejobormultiplesessions];?>
</td>
</tr>

<tr>
<td>
<label for="password" class="control-label">Number of Patients  : </label>
</td>
<td colspan="3">
 <?php echo $jobdetails[0]->number_of_patients;?> 		
</td>
</tr>

<td>
<label for="password" class="control-label">Number of Telephone consultations : </label>
</td>
<td colspan="3">
 <?php echo $jobdetails[0]->number_of_telephoneconsultations;?>
</td>
</tr>

<?php 
$yesnoarray = array('0'=>'No','1'=>'Yes');
?>
<td>
	<label for="password" class="control-label">Paperwork </label>
</td>
<td colspan="3">
	<?php echo  $yesnoarray[$jobdetails[0]->paperwork]; ?> 
</td>
</tr>
 

<tr>

<td>
<label for="password" class="control-label">Referrals</label>
</td>
<td colspan="3">
<?php echo  $yesnoarray[$jobdetails[0]->referrals]; ?>  
</td>
</tr>

<tr>
<td>
	<label for="password" class="control-label">Home Visits</label>
</td>
<td colspan="3">
<?php echo  $yesnoarray[$jobdetails[0]->home_visits]; ?> 
</td>
</tr>

<tr>
<td>
<label for="password" class="control-label">Bloods</label>
</td>
<td colspan="3">
<?php echo  $yesnoarray[$jobdetails[0]->bloods]; ?> 
</tdd>
</tr>

<tr>
<td>
<label for="password" class="control-label">Pension Included?</label>
</td>
<td colspan="3">
<?php echo  $yesnoarray[$jobdetails[0]->pension_included]; ?> 
</td>
</tr>

<tr>				  
<td>
<label for="password" class="control-label">Required IT systems</label>
</td>
<td colspan="3">
<?php
foreach($itsystemlist as $itsys){
if($jobdetails[0]->required_it_systems == $itsys->id) echo $itsys->itname; 

}	
?>  
</td>
</tr>

<tr>
<td>
 <label for="username" class="control-label">Parking facilities</label>
</td>
<td colspan="3">
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
								 
 echo 	 $parking_array[$jobdetails[0]->parking_facilities];
 ?>
 </td>  					 
</tr>

<tr>
<td> 
<label for="username" class="control-label">Job description</label>
</td>
<td colspan="3"> <?php echo $jobdetails[0]->session_description;?> </td>
</tr>
 		 
</tbody>
</table>

<br>
<div style="text-align:center">
<a href="<?php echo $url.'locums/applyjob/'.$jobdetails[0]->id;?>" class="btn btn-primary aplbtn" title="Apply for job">Apply for this job</a>
</div>


</div> 
</div>
</div>
</div>
<!--middle end here-->
