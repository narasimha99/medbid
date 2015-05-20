<?php
$url = esc_url( home_url( '/' )); 
$templtpath= get_template_directory_uri(); 
?>

 		<script type="text/javascript" src="<?php echo $templtpath;?>/js/jquery-1.11.1.js"></script>
		<script type="text/javascript" src="<?php echo $templtpath;?>/js/jquery-ui-1.11.1.js"></script>
 		<!-- loads mdp -->
		<script type="text/javascript" src="<?php echo $templtpath;?>/jquery-ui.multidatespicker.js"></script>
 		<!-- loads some utilities (not needed for your developments) -->
		<link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/css/mdp.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/css/prettify.css">
 		<script type="text/javascript" src="<?php echo $templtpath;?>/js/prettify.js"></script>
		<script type="text/javascript" src="<?php echo $templtpath;?>/js/lang-css.js"></script>

  <script type="text/javascript" src="<?php echo $templtpath;?>/timepicker/jquery.timepicker.js"></script>
  <script type="text/javascript" src="<?php echo $templtpath;?>/timepicker/jquery.datepair.js"></script>
   <script type="text/javascript" src="<?php echo $templtpath;?>/timepicker/datepair.js"></script>
  <script type="text/javascript" src="<?php echo $templtpath;?>/timepicker/lib/site.js"></script>


  <link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/timepicker/jquery.timepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/timepicker/lib/bootstrap-datepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/timepicker/lib/site.css" />
	

<!--middle start here-->
	
	<div class="midcol">
	    <div class="bitbox1">	
		    <div class="container">
			<?php ////////////////////// Left Side div for search filters /////////////////////?>
               <div style="float:left; margin-right:10px;">
			      <form action="http://localhost/medbid/jobs/findjob" method="post">
						<label> ZIP Code:
						<input maxlength="5" name="zipcode" style="font-size:12px; width:80px;" id="zipcode"  type="text" value="<?php echo $_POST['zipcode'];?>" /></label>
						<br/>
						<label>Within:</label>
						<select name="distance" id="distance">
						 <option value="5"  <?php if($_POST['distance'] == 5 ) echo 'selected'?> >5</option>
						<option value="10"  <?php if($_POST['distance'] == 10 ) echo 'selected'?> >10</option>
						<option value="25"  <?php if($_POST['distance'] == 25 ) echo 'selected'?> >25</option>
						<option value="50"  <?php if($_POST['distance'] == 50) echo 'selected'?> >50</option>
						<option value="100"  <?php if($_POST['distance'] == 100 ) echo 'selected'?> >100</option>
						</select> Miles
 

						<div id="datecalenderdiv" >	
													 
							<input type="text" id="session_date_range" name="session_date_range" value="<?php if(isset($_POST['session_date_range'])) { echo $_POST['session_date_range']; } ?>" />
								 <span id="errspan_session_date_range" class="errorspan"></span>	
												 
									<?php 
									//	echo "<pre>";		print_r($_POST);
								if(isset($_POST['session_date_range'])){
										$session_date_range =  $_POST['session_date_range'];	
									
						//  session_date_range
										$session_data_range_array = explode(',',$session_date_range);
										//print_r($session_data_range_array);
										for($t=0;$t<count($session_data_range_array);$t++){		
												$session_date =trim($session_data_range_array[$t]);
												$vt = $vt.",'".$session_date."'";
											
											 }
											 
											$selectdates = trim(substr ($vt, 1),' ');
						 
										
										} 
										 ?>
												<script>
												 
											 
						 
												$('#session_date_range').multiDatesPicker({
													dateFormat: "yy-m-d",
													altField: '#session_date_range',
													numberOfMonths: 3
												<?php 
												if(isset($_POST['session_date_range']) && strlen($_POST['session_date_range'])>0 ) {
												?>							
												  , addDates: [<?php echo $selectdates;?>]
												<?php } ?>
												  });
												 </script>
											  
												<!-- its my code end here -->
												 
						 
												<div align="center" style="margin-top:10px;">
													<button class="btn btn-info sbtn" id="submit1">Save and Continue</button>
												</div>
											</div>
		
	
 
 
					<?php
					
						 if(!preg_match('/^[0-9]{5}$/', $_POST['zipcode'])) {
							  echo "<strong>You did not enter a properly formatted ZIP Code.</strong> Please try again.\n";
						 }
						 elseif(!preg_match('/^[0-9]{1,3}$/', $_POST['distance'])) {
							  echo "<strong>You did not enter a properly formatted distance.</strong> Please try again.\n";
						 }
					 
					 ?>         
               </form>
			   
			   </div>
			   <?php ////////////////////// Right Side div for Results/////////////////////?>
			   <div style="float:left;">
			      <!----------------ajax loader------------->
			      <div id="loadingdiv" style="display:none;"><image src="<?php echo $templtpath;?>/images/ajax-loader.gif"/> Updating results... </div>
			      <!----------------ajax loader------------->
							 <div id="getjobsdiv">
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
									}
								?>	
												</tbody>
											</table>
								
								 </div>
			   </div>
			   <div style="clear:both;"></div>
   
            </div>
        </div>
   </div>
