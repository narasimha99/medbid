<script>
jQuery( document ).ready(function() {
 
	var purl = SITE_ROOT_JS+'jobs/getjobs/';

  	//console.log( "ready!" );
	jQuery("#distance").change(function () {
 			findajaxcall();
	});



	 $(function() {
            $( "#slider-3" ).slider({
               range:true,
               min: 0,
               max: 500,
               values: [ 35, 200 ],
               slide: function( event, ui ) {
                  $( "#hourlyrate" ).val( "£" + ui.values[ 0 ] + " - £" + ui.values[ 1 ] );
		 // loading content
	 	 findajaxcall();

               }
		 
           });
         $( "#hourlyrate" ).val( "£" + $( "#slider-3" ).slider( "values", 0 ) +
            " - £" + $( "#slider-3" ).slider( "values", 1 ) );
		//alert('hi');
	  });
   

	var onejobormultiplesessions_array = {
		'1':'Day Rate',
		'2':'Half Day Rate',
		'3':'Hourly Rate',
		'4':'Duty Doctor',
		'5':'Salaried Position'
	};	

	$("#onejobormultiplesessions").change(function() {
	 
		// var optionSelected = $("option:selected", this);
		 var valueSelected = this.value;
		//alert("Handler for .change() called."+onejobormultiplesessions_array[valueSelected]);
		$("#trafic_rate").text(onejobormultiplesessions_array[valueSelected]);
		findajaxcall();
	});

	
///////////		
});
</script>
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
			<h1> Search Jobs </h1>
			<?php ////////////////////// Left Side div for search filters /////////////////////?>
               <div style="float:left; margin-right:10px;">
			      <form action="http://localhost/medbid/jobs/findjob" method="post">
 

 
    
 
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 
 
 
						<label> ZIP Code:
						<input maxlength="10" name="zipcode" style="font-size:12px; width:80px;" id="zipcode"  type="text" value="<?php echo $_POST['zipcode'];?>" /></label>
						 
						<label>Within:</label>
						<select name="distance" id="distance">
						<option value="5"  <?php if($_POST['distance'] == 5 ) echo 'selected'?>>5</option>
						<option value="10"  <?php if($_POST['distance'] == 10 ) echo 'selected'?>>10</option>
						<option value="25"  <?php if($_POST['distance'] == 25 ) echo 'selected'?>>25</option>
						<option value="50"  <?php if($_POST['distance'] == 50) echo 'selected'?>>50</option>
						<option value="100"  <?php if($_POST['distance'] == 100 ) echo 'selected'?> >100</option>
						</select> Miles
 <br>
						
						<div id="datecalenderdiv">	
							<label> Date range</label>						 
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
 											</div>
		
	
 
 
					<?php
					/*
						 if(!preg_match('/^[0-9]{5}$/', $_POST['zipcode'])) {
							  echo "<strong>You did not enter a properly formatted ZIP Code.</strong> Please try again.\n";
						 }
						 elseif(!preg_match('/^[0-9]{1,3}$/', $_POST['distance'])) {
							  echo "<strong>You did not enter a properly formatted distance.</strong> Please try again.\n";
						 }
					 */
					 ?>   
   
      <p>
         <label for="hourlyrate">Hourly rate range:</label>
         <input type="text" id="hourlyrate" 
            style="border:0; color:#b9cd6d; font-weight:bold;">
      </p>
      <div id="slider-3"></div>
	<p>
	<?php 
	$onejobormultiplesessions_array = array(
	'1'=>'Day Rate',
	'2'=>'Half Day Rate',
	'3'=>'Hourly Rate',
	'4'=>'Duty Doctor',
	'5'=>'Salaried Position'
	);	
	$defaultTariff = 3;
	if(!isset($_POST['onejobormultiplesessions'])){
		$_POST['onejobormultiplesessions'] = $defaultTariff;
	}
 
 	?>
	<label for="password" class="control-label">Tariff</label>
 	<select id="onejobormultiplesessions" name="onejobormultiplesessions" class="form-control ff1" >
	<option value=""> Select</option>
	<?php
	for($mt=1;$mt<=count($onejobormultiplesessions_array);$mt++){
	?>
	<option value="<?php echo $mt;?>"  <?php if($_POST['onejobormultiplesessions'] == $mt) echo 'selected'?>><?php echo $onejobormultiplesessions_array[$mt];?></option>
	<?php
	}	
	?>

	</select>

	</p>
 			  
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
								<center> <?php echo $this->pagination(); ?> </center>
								 </div>
			   </div>
 		   <div style="clear:both;"></div>
			  
 
            </div>
        </div>
   </div>
