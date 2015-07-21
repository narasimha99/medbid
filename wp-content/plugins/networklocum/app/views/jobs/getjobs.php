<?php
$url = esc_url( home_url( '/' )); 
$templtpath= get_template_directory_uri(); 

$onejobormultiplesessions_array = array(
	'1'=>'Day Rate',
	'2'=>'Half Day Rate',
	'3'=>'Hourly Rate',
	'4'=>'Duty Doctor',
	'5'=>'Salaried'
	);	


?>
<?php
if(count($joblists)>0){
?>
<table class="col-md-12 table-bordered table-striped table-condensed cf">
<thead class="cf">
<tr>
<th>Zipcode</th>														
<th>Location</th>
<th>Dates needed</th>
<th class="numeric">No of sessions</th>
<th class="numeric"><span id="trafic_rate">Hourlyrate</span></th>
<th class="numeric"></th>
<th class="numeric"></th>
</tr>
</thead>
<tbody>
													 
<?php 
foreach($joblists as $job){
//echo "<pre>"; print_r($job); echo "</pre>";
//$jobsessions  = count($job->jobsessions);
?>
<tr>
<td data-title="Code"> <?php echo $job->postcode;?></td>								
<td data-title="Code"><?php echo $job->location; echo $job->city_id;echo $job->state_id;?></td>
<td data-title="Company"><?php 
//foreach ($job->jobsessions as $jobsession){
echo "<br>";
echo date('D j M Y, H:m', strtotime($job->session_starttime)).' - '.date('H:m', strtotime($job->session_endtime));
//}
?> </td>
<td data-title="Price" class="nndumeric"><?php echo $job->no_of_sessions;?> sessions</td>
<td data-title="Change" class="numeric">£ <?php echo $job->hourlyrate;?> </td>
<td data-title="Change %" class="numeric">
<a href="<?php echo $url.'jobs/viewjob/'.$job->id;?>" class="btn btn-primary aplbtn" title="view job">View job</a></td>
<td data-title="Change %" class="numeric"><a href="<?php echo $url.'locums/applyjob/'.$job->id;?>" class="btn btn-primary aplbtn" title="Apply for job">Apply</a>
</tr>
<?php 
}
?>	
</tbody>
</table>
<?php
 } 
else
 {
 	echo "<div style=\" padding:15px; font-weight:bold; border:1px solid #cdcdcd; background-color:#fafafa;\">Sorry!.... No more Jobs found on your search options..</div>";
}
?>


