<!--middle start here-->
 	<div class="midcol">
		<div class="container">
		<div class="row">
		
				<div class="aligncenter">
					<h2 class="text1">My Posted Job Sessions</h2>
					<div> <?php $this->display_flash(); ?> </div>

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
        				<th>Dates needed - hourly rates</th> 
					<th class="numeric">No of sessions</th>
        				<th> Job posted on </th>
         				<th class="numeric"></th>
        			</tr>
        		</thead>
        		<tbody>
        			 
<?php 
 $url = esc_url( home_url('/'));
foreach($joblists as $job){
?>
					<tr>
        				<td data-title="Code"><?php echo $job->location;?></td>
        				<td data-title="Company"><?php 
echo date('D j M Y, H:m', strtotime($job->session_starttime)).' - '.date('H:m', strtotime($job->session_endtime));
echo ' - £'.$job->hourlyrate;

?> </td>
        				<td data-title="Price" class="nndumeric"><?php echo $job->no_of_sessions;?> sessions</td>
					<td data-title="Price" class="nndumeric"><?php echo date('D j M Y, H:m', strtotime($job->createddate));?></td>
        				
        				<td data-title="Change %" class="numeric"><a href="# <?php //echo $url.'jobs/editjob/'.$job->id;?>" class="btn btn-primary aplbtn" title="Edit job">Edit job</a></td>

	<td  data-title="Change %" class="numeric"><a href="# <?php  //echo $url.'jobs/invitelocums/'.$job->id;?>" class="btn btn-primary aplbtn" title="Invite job">Invite your locums</a></td>

        				<td data-title="Change %" class="numeric"><a href="<?php echo $url.'jobs/deletejob/'.$job->id;?>" class="btn btn-primary aplbtn" title="Delete job" onclick="return confirmDelete();">Delete job</a></td>

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
	
<script>
function confirmDelete()
{

return confirm("Are you sure you want to delete this Job");
  
 }
</script>
