<?php
 $templtpath= get_template_directory_uri(); 
 $url = esc_url( home_url( '/' ) );
?>
<!--middle start here-->
	
	<div class="midcol">
		<div class="container">
		<div class="row">
		
				<div class="aligncenter">
					<h2 class="text1">Job applications</h2>
					
				</div>
				
				<div class="col-md-12">
					
					<div>
					<div class="container">
					    <div class="row">
						<div id="no-more-tables">
						    <table class="col-md-12 table-bordered table-striped table-condensed cf">
								<thead class="cf">
        			<tr>
					<th>Job</th>
        				<th>Locum details</th>
        				<th>Applied Session details</th>
        			 	<th class="numeric">Hourly rate</th>
 					<th>Paperwork</th>
					<th>referrals</th>
					<th>Home Visits</th>
					<th>Bloods</th>
					<th>Pension Included?</th>
 					<th>&nbsp;</th>
        			</tr>
        		</thead>
        		<tbody>
        			 
<?php 


$yenoarray = array('0'=>'No','1'=>'Yes');
 
foreach($appliedjoblists as $jobsession){
//echo "Narasimha"; echo "<pre>";  print_r($jobsession); echo "</pre>"; 
//$jobsessions  = count($job->jobsessions);
?>
					<tr>
        				<td data-title="Code"><?php echo $jobsession->job_id;?></td>
	       				<td data-title="Code"><?php echo $jobsession->locum->firstname.','. $jobsession->locum->lastname;?></td>
        				<td data-title="Company"><?php 
 
 
echo date('D j M Y, H:ma', strtotime($jobsession->session_starttime)).' - '.date('H:ma', strtotime($jobsession->session_endtime));

 
?> </td>

<td data-title="Change" class="numeric">£ <?php echo $jobsession->hourlyrate; ?> </td>
<td data-title="Change" class="numeric"> <?php  echo $yenoarray[$jobsession->job_id];  ?> </td>
<td data-title="Change" class="numeric"> <?php  echo  $yenoarray[$jobobjects[$jobsession->job_id]->referrals]; ?> </td>
<td data-title="Change" class="numeric"> <?php  echo  $yenoarray[$jobobjects[$jobsession->job_id]->home_visits]; ?> </td>
<td data-title="Change" class="numeric"> <?php  echo  $yenoarray[$jobobjects[$jobsession->job_id]->bloods]; ?> </td>
<td data-title="Change" class="numeric"> <?php  echo  $yenoarray[$jobobjects[$jobsession->job_id]->pension_included]; ?> </td>
<td data-title="Change %" class="numeric"><a href="<?php echo $url.'practices/acceptyourlocum/'.$jobsession->job_id.'/?locum_id='.$jobsession->user_id;?>" class="btn btn-primary aplbtn" title="Accept the locum">Accept</a> <a href="<?php echo $url.'locums/applyjob/'.$job->id;?>" class="btn btn-primary aplbtn" title="Reject">Reject</a> </td>
        		 
        			</tr>
<?php  
	}
?>	
        		</tbody>
        	</table>
        </div>
    </div>

</div>

<center> <?php echo $this->pagination(); ?> </center>	
					</div>
					
					
					
			</div>
		</div>  
	</div>
	</div>
	
	<!--middle end here-->
			
