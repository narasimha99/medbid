<?php
$url = esc_url( home_url( '/' )); 
$templtpath= get_template_directory_uri(); 
?>
<table class="col-md-12 table-bordered table-striped table-condensed cf">
        		<thead class="cf">
        			<tr>
					<th> S.No</th> 
					<th> Post code </th>
        				<th>Location</th>
        				<th>Dates needed</th>
        				<th class="numeric">No of sessions</th>
        				<th class="numeric">Hourly rate</th>
        				<th class="numeric"></th>
        			</tr>
        		</thead>
        		<tbody>
        			 
<?php 
$k=1;
foreach($joblists as $job){
//echo "<pre>"; print_r($job); echo "</pre>";
//$jobsessions  = count($job->jobsessions);
?>
					<tr>
<td> <?php echo $k; ?>
<td data-title="Code"><?php echo $job->postcode;?></td>
        				<td data-title="Code"><?php echo $job->location; echo $job->city_id;echo $job->state_id;?></td>
        				<td data-title="Company"><?php 
foreach ($job->jobsessions as $jobsession){
echo "<br>";
echo date('D j M Y, H:m', strtotime($jobsession->session_starttime)).' - '.date('H:m', strtotime($jobsession->session_endtime));
}
?> </td>
        				<td data-title="Price" class="nndumeric"><?php echo $job->no_of_sessions;?> sessions</td>
        				<td data-title="Change" class="numeric">£ <?php echo $jobsession->hourlyrate;?> </td>
        				<td data-title="Change %" class="numeric"><a href="<?php echo $url.'locums/applyjob/'.$job->id;?>" class="btn btn-primary aplbtn" title="Apply for job">Apply</a></td>
        			</tr>
<?php 
$k = $k + 1;	
}
?>	
        		</tbody>
        	</table>

