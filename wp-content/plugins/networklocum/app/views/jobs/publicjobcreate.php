﻿<?php
$url = esc_url( home_url( '/' )); 
$templtpath= get_template_directory_uri(); 
?>
<script>
jQuery( document ).ready(function() {

	//console.log( "ready!" );
	jQuery("#submit1").click(function () {
		$("#calendarform").submit();
 		
	});
	jQuery("#submit5").click(function () {
		$("#savejob").val('savejob');
	});

 });
</script>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 		<script type="text/javascript" src="<?php echo $templtpath;?>/js/jquery-1.11.1.js"></script>
		<script type="text/javascript" src="<?php echo $templtpath;?>/js/jquery-ui-1.11.1.js"></script>
 		<!-- loads mdp -->
		<script type="text/javascript" src="<?php echo $templtpath;?>/jquery-ui.multidatespicker.js"></script>
 		<!-- loads some utilities (not needed for your developments) -->
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
		<div class="container">
		<div class="row">
		
				<div class="aligncenter">
					<h2 class="text1">Find locums in 3 simple steps</h2>
					<p>Completely <b>free</b> to post! Takes just <b>3 minutes!</b> Collect applications just as fast!</p>
					<br>
				</div>
<form    id="calendarform" action="<?php echo $url;?>jobs/publicjobcreate"  onsubmit="javascript:return validatepublicjobcreate();"  method="POST">
				 <?php $this->display_flash(); ?>				
				<div class="col-md-8 col-md-offset-2 ">
 					<div class="bitbox1">
						<div class="aligncenter">
							<h2><i class="fa fa-calendar seticon"></i>Select dates</h2>
							<h3>It only takes 3 minutes to post a job.</h3>
							<p>Select dates by clicking on the calendar.</p>
						</div>
				
				 		<div class="panel panel-default calendar">
 						<!-- its my code -->
						<div id="datecalenderdiv">	
							 
  	<input type="hidden" id="session_date_range" name="session_date_range" value="<?php if(isset($_POST['session_date_range'])) { echo $_POST['session_date_range']; } ?>" />
		 <span id="errspan_session_date_range" class="errorspan"></span>


						<div  id="datepickerdiv" class="demo">
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
							altField: '#session_date_range'
						<?php 
						if(isset($_POST['session_date_range']) && strlen($_POST['session_date_range'])>0 ) {
						?>							
						  , addDates: [<?php echo $selectdates;?>]
						<?php } ?>
 						  });
						 </script>
				 	 	</div>
 						</div>
					
						<!-- its my code end here -->
						</div>
 
						<div align="center">
							<button class="btn btn-info sbtn" id="submit1">Save and Continue</button>
						</div>
					</div>
 
					<div class="bitbox1">
					 
						<div class="aligncenter">
							<h2><i class="fa fa-clock-o seticon"></i>Set times and rates</h2>
							<h3>We are not an agency - <b>set your own rates!</b></h3>
							<p>Select dates you need cover for above</p>
						</div>
						
						<!-- its my code end here -->
						<div id="settimerates">	</div>
						
						<?php 
						if(isset($_POST['session_date_range'])){
 							include('settimerates.php');
						 }
						?>
						<!-- its my code end here -->					

					</div>

<div class="bitbox1">
		<div class="col-md-12 col-sm-12">
			<div class="nl-payment-sys" style="display: block;">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="nl-payment-sys-explnd col-md-12">
							<h5 class="nl-payment-explnd-title">How does Networklocum help you save time and money?</h5>
							<p>At Networklocum, we believe into fair pay and transparency!</p>
							<p>This is how we save you money:</p>
							<ul>
								<li>50% cheaper than locum agencies</li>
								<li>You set your own rates</li>
								<li>Huge VAT savings</li>
								<li><a href="/costs/">Find our more about the benefits of working with Networklocum.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<div class="total-cost-summary col-md-12">
							<div class="row">
								<div class="col-md-12">
									<h5 class="total-cost-summary-title">Cost breakdown</h5>
								</div>
	 						</div>

				<?php
					$grandtotallocumpay = (isset($_POST['grandtotallocumpay']))?$_POST['grandtotallocumpay']:0;
					$grandmedbidfee = (isset($_POST['grandmedbidfee']))?$_POST['grandmedbidfee']:0;
					$estimatedsavingvat = (isset($_POST['estimatedsavingvat']))?$_POST['estimatedsavingvat']:0;
					$vatonmedbidfee = (isset($_POST['vatonmedbidfee']))?$_POST['vatonmedbidfee']:0;
					$pmtotalcost = (isset($_POST['pmtotalcost']))?$_POST['pmtotalcost']:0;
				?>
	 						<div class="row">
								<div class="col-md-12"><hr></div>
							</div>
							<div class="row">
								<div class="col-md-8 col-sm-8">
									<p class="form-pay-locum">Pay to locum</p>
								</div>
								<div class="col-md-4 col-sm-4">
									<p>£ <span class="locum-total-pay" name="grandtotallocumpay" id="grandtotallocumpayspan"><?php echo $grandtotallocumpay;?></span>
	<input type="hidden" name="grandtotallocumpay" id="grandtotallocumpay" value="<?php echo $grandtotallocumpay;?>"/> 
</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8 col-sm-8">
									<p class="form-pay-nl">Networklocum fees <span class="details-txt">(15% of locum fees)</span></p>
								</div>
								<div class="col-md-4 col-sm-4">
									<p>£ <span class="nl-total-fee" name="grandmedbidfee" id="grandmedbidfeespan"><?php echo $grandmedbidfee;?></span>
<input type="hidden" name="grandmedbidfee" id="grandmedbidfee" value="<?php echo $grandmedbidfee;?>"/>
</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8 col-sm-8">
									<p class="form-practice-saving" >Estimated saving (inc. VAT)</p>
								</div>
								<div class="col-md-4 col-sm-4">
									<p class="form-practice-saving">£ <span class="pm-total-save" id="estimatedsavingvatspan"><?php echo $estimatedsavingvat;?></span>
<input type="hidden" name="estimatedsavingvat" id="estimatedsavingvat" value="<?php echo $estimatedsavingvat;?>"/> 
</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-8 col-sm-8">
									<p class="form-pay-nl">VAT <span class="details-txt">(only on Network Locum fees)</span></p>
								</div>
								<div class="col-md-4">
									<p>£ <span class="nl-total-vat" id="vatonmedbidfeespan"><?php echo $vatonmedbidfee;?></span>
<input type="hidden" name="vatonmedbidfee" id="vatonmedbidfee"  value="<?php echo $vatonmedbidfee;?>"/>
</p>
								</div>
							</div>
							<div class="row">
 								<div class="col-md-12"><hr></div>
 							</div>
							<div class="row">
								<div class="col-md-8">
									<p class="total-cost" >TOTAL COST</p>
								</div>
								<div class="col-md-4">
									<p class="total-cost">£ <span class="pm-total-pay" id="pmtotalcostspan"><?php echo $pmtotalcost;?></span>
<input type="hidden" name="pmtotalcost" id="pmtotalcost" value="<?php echo $pmtotalcost;?>"/>
</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
				 
					 <div align="center">
							<button class="btn btn-info sbtn" id="submit2">Save and Continue</button>
					</div>
			
 				</div>
			</div>
		</div>
 
</div>
	
					
					<div class="bitbox1">
					 
						<div class="aligncenter">
							<h2><i class="fa fa-list seticon"></i>Tell us about the job</h2>
							<h3>Collect applications <b>in minutes</b></h3>
							<p>Provide detailed job description to increase the number of applications for the job.</p>
						</div>
						
					  <div class="form-group">
						  <label for="password" class="control-label">One job or multiple sessions</label><br>
						  <input type="radio" name="onejobormultiplesessions" value="1" <?php if ($_post['onejobormultiplesessions'] == 1) echo 'checked'; ?> > Post as one job <input style="margin-left:20px;" type="radio" name="onejobormultiplesessions" value="2" <?php if ($_post['onejobormultiplesessions'] == 2) echo 'checked'; ?> > Post as individual sessions
						     <span id="errspan_onejobormultiplesessions" class="errorspan"></span>
					  </div>
					  <div class="bitbox1" style="background:#D9F3FC;">
						<h3>One locum or multiple locums?</h3>
						<ul style="margin-left:20px; margin-top:10px;">
							<li>Post your jobs as individual sessions so that multiple GPs can apply. This will massively increase your chance filling the session.</li>
							<li>If looking for one GP continuity of care, you can post for one locum with an understanding that fewer people will be available.</li>
						</ul>
					  </div>
					  <div class="form-group">
						  <label for="password" class="control-label">Required IT systems</label>
						  <select id="required_it_systems" name="required_it_systems" class="form-control ff1">
							<option value=""> Select</option>
							<?php
								foreach($itsystemlist as $itsys){
							?>
						 	  <option value="<?php echo $itsys->id;?>"  <?php if($_POST['required_it_systems'] == $itsys->id) echo 'selected'?>><?php echo $itsys->itname;?></option>
							<?php
							}	
							?>  
 						 </select>
						 
						    <span id="errspan_required_it_systems" class="errorspan"></span>
					  </div>
					  <div class="form-group">
						  <label for="username" class="control-label">Parking facilities</label>
<?php
$parking_array = array(
'1'=>'Free and near',
'2'=>'Free and onsite',
'3'=>'Pay and Display nearby',
'4'=>'Parking is difficult',
'5'=>'Free and onsite'
);

?>
						  <select id="parking_facilities" name="parking_facilities" class="form-control ff1">
  							<option value="">Choose parking conditions</option>
<?php
								for($mt=1;$mt<count($parking_array);$mt++){
							?>
						 	  <option value="<?php echo $mt;?>"  <?php if($_POST['parking_facilities'] == $mt) echo 'selected'?>><?php echo $parking_array[$mt];?></option>
							<?php
							}	
							?>
						 
  						</select>
						  <span id="errspan_parking_facilities" class="errorspan"></span>
 
					  </div>
					  <div class="form-group">
						  <label for="username" class="control-label">Additional information</label>
						  <textarea class="form-control ff1" id="session_description" name="session_description" rows="5" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a"><?php echo $_POST['session_description'];?></textarea>
						  <span id="errspan_session_description" class="errorspan"></span>
					  </div>
					  <div align="center">
							<button class="btn btn-info sbtn" id="submit3">Save and Continue</button>
						</div>
					  
 
					</div>
					<?php 
						$user_id = get_current_user_id();
						if ($user_id == 0) {
					
					?>

					<div class="bitbox1">
						<div class="aligncenter">
							<h2><i class="fa fa-list seticon"></i>Tell us about your practice</h2>
							<h3><b>Save up to 50%</b> with Medbid.</h3>
						</div>
					 
					  <div class="form-group">
						  <label for="password" class="control-label">Practice code</label><br>
						  <input type="text" class="form-control ff1" id="practice_code" name="practice_code" value="<?php echo $_POST['practice_code'];?>"   title="" placeholder="Practice code">
					
						  <span id="errspan_practice_code" class="errorspan"></span>
					  </div>
					  <div class="form-group">
						  <label for="password" class="control-label">Practice name</label><br>
						  <input type="text" class="form-control ff1" id="practicename" name="practicename" value="<?php echo $_POST['practicename'];?>"  title="" placeholder="Practice name">
						   <span id="errspan_practicename" class="errorspan"></span>
					  </div>
					  <div class="form-group">
						  <label for="password" class="control-label">First name</label><br>
						  <input type="text" class="form-control ff1" id="firstname" name="firstname"  value="<?php echo $_POST['firstname'];?>" title="" placeholder="First name">
						   <span id="errspan_firstname" class="errorspan"></span>
					  </div>
					  <div class="form-group">
						  <label for="password" class="control-label">Last name</label><br>
						  <input type="text" class="form-control ff1" id="lastname" name="lastname" value="<?php echo $_POST['lastname'];?>"  title="" placeholder="Last name">
						  <span id="errspan_lastname" class="errorspan"></span>
					  </div>
					  <div class="form-group">
						  <label for="password" class="control-label">Email</label><br>
						  <input type="text" class="form-control ff1" id="email" name="email" value="<?php echo $_POST['email'];?>" placeholder="me@example.com"/>
						  <span id="errspan_email" class="errorspan"></span>
					  </div>
					  <div class="form-group">
						  <label for="password" class="control-label">Phone number</label><br>
						  <input type="text" class="form-control ff1" id="phone_number" name="phone_number" value="<?php echo $_POST['phone_number'];?>"   title="" placeholder="XXXXXXXXXXX">
						   <span id="errspan_phone_number" class="errorspan"></span>
					  </div>
					
				 
					</div>
					<?php } ?>
					<p style="text-align:center;">I agree with the <a href="#" target="_blank">Terms and Conditions</a>  and <a href="#" target="_blank">Privacy Policy</a>  of Medbid</a></p>
					
					<br>
					  <input type="hidden" id="savejob" name="savejob" value=""/>
					 <div align="center">
						
							<button class="btn btn-info sbtn" id="submit5" >Post Job</button>
						</div>
					
					
			</div>
		</div>  
	</div>
	</div>
	</form>	
	<!--middle end here-->
	
 
