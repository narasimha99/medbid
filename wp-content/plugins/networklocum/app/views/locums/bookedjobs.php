<?php
$url = esc_url( home_url( '/' )); 
$templtpath= get_template_directory_uri(); 
?>

<?php
if(count($appliedjoblists)>0){
?>	
			<table class="col-md-12 table-bordered table-striped table-condensed cf">
        		<thead class="cf">
        			<tr>
					<th>Application #</th>
					<th>Job Code #</th>
        				<th>Practicer details</th>
        				<th>Applied Session details</th>
        			 	<th>Hourly rate</th>
					<th>Job Status</th>
        			</tr>
        		</thead>
        		<tbody>
        			 
<?php 

foreach($appliedjoblists as $jobsession){
//echo "<pre>"; print_r($jobsession);
$jobsessions  = count($job->jobsessions);
?>
<tr>
<td data-title="Code"><a target="_blank" href="<?php echo $url.'locums/applyedjobdetails/'.$jobsession->AppliedjobID;?>"> <?php echo $jobsession->AppliedjobID;?> </a> </td>
<td data-title="Code"><a target="_blank" href="<?php echo $url.'jobs/viewjob/'.$jobsession->job_id;?>"><?php echo $jobsession->job_id;?> </a> </td>
<td data-title="Code"><a target="_blank" href="<?php echo $url.'practices/viewpracticer/'.$jobsession->practicer_id;?>">
			<?php echo $jobsession->practice_code.','.$jobsession->practicename;?>
			</a>
</td>
<td data-title="Company"><?php 
echo date('D j M Y, H:ma', strtotime($jobsession->session_starttime)).' - '.date('H:ma', strtotime($jobsession->session_endtime));
?> </td>

<td data-title="Change" class="numeric">£ <?php echo $jobsession->hourlyrate;?> </td>
<td data-title="Change" class="numeric"><?php 
if( $jobsession->practicer_accepted == 1  && $jobsession->locum_accepted == 1)
	 echo "Awarded";
?> 
</td>
</tr>
<?php 
  }
?>	
        		</tbody>
        	</table>
			<center> <?php echo $this->pagination(); ?> </center>	
<?php
 } 
else
 {
 	echo "You have no applied jobs";
}
?>
	
