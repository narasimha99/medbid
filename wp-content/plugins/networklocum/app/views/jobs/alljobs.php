<!--middle start here-->
	
	<div class="midcol">
		<div class="container">
		<div class="row">
		
				<div class="aligncenter">
					<h2 class="text1">Week commencing Monday 23 February 2015</h2>
					
				</div>
				
				<div class="col-md-12">
					
					<div>
						<div class="container">
    <div class="row">
        <div id="no-more-tables">
            <table class="col-md-12 table-bordered table-striped table-condensed cf">
        		<thead class="cf">
        			<tr>
        				<th>Location</th>
        				<th>Dates needed</th>
        				<th class="numeric">No of sessions</th>
        				<th class="numeric">Hourly rate</th>
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
        				<td data-title="Code"><?php echo $job->location;?></td>
        				<td data-title="Company"><?php 
foreach ($job->jobsessions as $jobsession){
echo "<br>";
echo date('D j M Y, H:m', strtotime($jobsession->session_starttime)).' - '.date('H:m', strtotime($jobsession->session_endtime));
}
?> </td>
        				<td data-title="Price" class="nndumeric"><?php echo $job->no_of_sessions;?> sessions</td>
        				<td data-title="Change" class="numeric">£ <?php echo $jobsession->Hourlyrate;?> </td>
        				<td data-title="Change %" class="numeric"><a href="#" class="btn btn-primary aplbtn" title="Apply for job">Apply</a></td>
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
	
