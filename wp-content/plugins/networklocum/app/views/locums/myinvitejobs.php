<?php
$url = esc_url( home_url( '/' )); 
$templtpath= get_template_directory_uri(); 
?>
<?php if(count($invitedJobDetails)==0) { ?>
<p>You have no invitations outstanding.</p>
<?php 
}
else
 {
?>
<table class="col-md-12 table-bordered table-striped table-condensed cf">
        		<thead class="cf">
        			<tr>
					<th>Job</th>
        				<th>Practicer details</th>
        				<th>Applied Session details</th>
        			 	<th>Hourly rate</th>
					<th>&nbsp; </th>
        			</tr>
        		</thead>
        		<tbody>
        			 
<?php 

foreach($invitedJobDetails as $jobsession){
 
//$jobsessions  = count($job->jobsessions);
?>
					<tr>
        				<td data-title="Code"><?php echo $jobsession->job_id;?></td>
	       				<td data-title="Code"><?php echo $jobsession->firstname.','.$jobsession->lastname;?></td>
        				<td data-title="Company"><?php 
 
 
 echo date('D j M Y, H:ma', strtotime($jobsession->session_starttime)).' - '.date('H:ma', strtotime($jobsession->session_endtime));
 
?> </td>

<td data-title="Change" class="numeric">£ <?php echo $jobsession->hourlyrate;?> </td>
<td data-title="Change %" class="numeric"><a href="<?php echo $url.'locums/applyjob/'.$jobsession->job_id;?>" class="btn btn-primary aplbtn" title="Apply for job">Apply</a></td>
        		 
        			</tr>
<?php 
	

	}
?>	
        		</tbody>
        	</table>
			<center> <?php echo $this->pagination(); ?> </center>	

<?php } ?>
