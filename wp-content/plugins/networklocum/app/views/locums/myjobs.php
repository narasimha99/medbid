<?php
 $templtpath= get_template_directory_uri(); 
 $url = esc_url( home_url( '/' ) );
?>
 
<script>
jQuery( document ).ready(function() {

//console.log( "ready!" );
jQuery("#home-tab").click(function () {

var purl = SITE_ROOT_JS+'locums/myinvitejobs';
$.ajax({
	 url:purl,
	dataType: 'text',
	data:{}
}).done(function( data ) {

$("#myinvitejobs").html( data );

});



});
 

});
</script>



<!--middle start here-->
	
	<div class="midcol">
		<div class="container">
		<div class="row">
		   <div class="col-md-8">
		     <h3>My Jobs</h3>
		     <p>Details of jobs you've been invited to book, pending applications, booked and completed jobs are all found here. It's the one-stop shop to manage your jobs and keep track of what's happening, when.</p>
		   </div>
		   <div class="col-md-4">
		                 <div class="progress-radial progress-40" style="height:50px;">
				                <div class="overlay">40%</div>
			             </div>
		  </div>
		</div>
		<div class="row">
		  	<div class="bs-docs-section" style="margin-top:20px;">
		  <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			<ul id="myTab" class="nav nav-tabs" role="tablist">
			  <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">My Invites</a></li>
			  <li role="presentation"><a href="#application" role="tab" id="application-tab" data-toggle="tab" aria-controls="application">Applications</a></li>
			  <li role="presentation"><a href="#booked" role="tab" id="booked-tab" data-toggle="tab" aria-controls="booked">Booked Jobs</a></li>
			  <li role="presentation"><a href="#completed" role="tab" id="completed-tab" data-toggle="tab" aria-controls="completed">Completed Jobs</a></li>
			</ul>
			<div id="myTabContent" class="tab-content">
 <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
				
		<div id="myinvitejobs"> </div>

			
</div>
			  <div role="tabpanel" class="tab-pane fade" id="application" aria-labelledby="application-tab">
				<table class="col-md-12 table-bordered table-striped table-condensed cf">
        		<thead class="cf">
        			<tr>
					<th>Job</th>
        				<th>Practicer details</th>
        				<th>Applied Session details</th>
        			 	<th>Hourly rate</th>
        			</tr>
        		</thead>
        		<tbody>
        			 
<?php 

foreach($appliedjoblists as $jobsession){
 
//$jobsessions  = count($job->jobsessions);
?>
					<tr>
        				<td data-title="Code"><?php echo $jobsession->job_id;?></td>
	       				<td data-title="Code"><?php echo $jobsession->practice->firstname.','.$jobsession->practice->lastname;?></td>
        				<td data-title="Company"><?php 
 
 
echo date('D j M Y, H:ma', strtotime($jobsession->session_starttime)).' - '.date('H:ma', strtotime($jobsession->session_endtime));
 
?> </td>

<td data-title="Change" class="numeric">£ <?php echo $jobsession->hourlyrate;?> </td>
        		 
        			</tr>
<?php 
	

	}
?>	
        		</tbody>
        	</table>
			<center> <?php echo $this->pagination(); ?> </center>	
			  </div>
			  <div role="tabpanel" class="tab-pane fade" id="booked" aria-labelledby="booked-tab">
				<p>You have no booked jobs.</p>
			  </div>
			  <div role="tabpanel" class="tab-pane fade" id="completed" aria-labelledby="completed-tab">
				<p>You have no completed Jobs.</p>			  </div>
			</div>
  </div><!-- /example --></div>


            <div id="push"></div>
				
				
		</div>  
	</div>
	</div>
	
	<!--middle end here-->
