<?php
$url = esc_url( home_url( '/' ));
$templtpath= get_template_directory_uri(); 
?>
<script type="text/javascript" src="<?php echo $templtpath;?>/js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="<?php echo $templtpath;?>/js/jquery-ui-1.11.1.js"></script>
<!-- loads mdp -->
<script type="text/javascript" src="<?php echo $templtpath;?>/jquery-ui.multidatespicker.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/css/mdp.css">
<link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/css/prettify.css">
<script type="text/javascript" src="<?php echo $templtpath;?>/js/prettify.js"></script>
<script type="text/javascript" src="<?php echo $templtpath;?>/js/lang-css.js"></script>
<script type="text/javascript">
$(function() {
prettyPrint();
});
</script>
 

 		

	<!--middle start here-->
 	<div class="midcol">
 		 
		
		<div class="dashbg">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="dashmid">
							<div class="dashmidh">
								<h2>Hello Sample Practise</h2>
								<button type="button" class="btn btn-default btn-lg pull-right">Job creation guide <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> </button> 
			 <a  style="margin-right:5px;" class="btn btn-default btn-lg pull-right"    href="<?php echo $url.'jobs/publicjobcreate/';?>">Create a Job</a> 
							</div>
								
 
<div class="row"> 
<div class="col-md-12">
<div class="panel panel-default calendar">
<h2 class="text-center"> Summary of your Posted Jobs </h2>
<div class="panel-heading text-center">

<div id="datecalenderdiv">	
				 
  	<input type="hidden" id="session_date_range" name="session_date_range" value="<?php if(isset($_POST['session_date_range'])) { echo $_POST['session_date_range']; } ?>" />
		  
 							<div  id="datepickerdiv">
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
						 
 					 
 
  						$('#datepickerdiv').multiDatesPicker({
							dateFormat: "yy-m-d",
							altField: '#session_date_range',
							disabled: true,
 							numberOfMonths: [1,3]
						<?php 
						if(isset($_POST['session_date_range']) && strlen($_POST['session_date_range'])>0 ) {
						?>							
						  , addDates: [<?php echo $selectdates;?>]
						<?php } ?>
 						  });
						 </script>
				 	 	</div>
 						</div>
					 
								</div>
								  </div>
							 </div>
				</div>
									
									<div class="col-md-12" style="margin:20px 0px;">
										<div class="alert alert-danger" role="alert">
										  We manually review all practices to ensure security. Please call us on 8888 888 8888 or request a callback at a time of your choosing.
										</div>
									</div>
									
								  </div>
								  
								 <div class="row">
								 
									<div class="col-md-6" >
										<h2>ACTIVITY SUMMARY <span style="float: right;margin-right: 9px; font-size:16px;"><a class="" href="#">View all</a></span></h2> 
										<div>
											<div class="pjobs">
												<h2>0</h2>
												<p>Posted Jobs</p>
											</div>
											<div class="pjobs" style="background:#5CB85C;">
												<h2>0</h2>
												<p>Completed Jobs</p>
											</div>
											<div class="pjobs" style="background:#D84444;">
												<h2>0</h2>
												<p>Midbid in bank</p>
											</div>
										</div>
									</div>
									
									<div class="col-md-6" style="text-align:center; line-height:30px;   padding-top: 75px;">
										<h2>UPCOMING MIDBIDS</h2>
										<p>You have no upcoming Midbids</p>
										<div><a href="#">View your Midbids bank</a></div>
									</div>
									
								 </div>						  
							</div>
							<div class="dashmidh2">
								
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
			
				
		
	</div>
	
	<!--middle end here-->
	
	
