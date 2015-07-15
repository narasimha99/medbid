<script>
jQuery( document ).ready(function() {
//console.log( "ready!" );
jQuery("#submit").click(function () {
$("#locumsignupnext").submit();
});
// Event setup using a convenience method
});
</script>
<?php $url = esc_url( home_url( '/' )); ?>
<?php
$templtpath= get_template_directory_uri(); 
?>


	<!--middle start here-->
	
	<div class="midcol">
	
		
		
		<div class="container">
		<div class="row">
				<div class="col-md-12">  
					<div class="aligncenter">
						<h2 class="text1 text4">Create a profile today</h2>
						<p style="margin-bottom: 40px;">Don't have time to fill in the form? Give us a call on 0203 603 9242 and we'll set you up in a jiffy!</p>
					</div>
					
			<div>

				
				  <div class="col-md-5">

<form name="practicesignup" id="practicesignup"   autocomplete="off"  method="post" action="<?php echo $url;?>practices/practicesignup" onsubmit="javascript:return validatepracticesignup();" enctype="multipart/form-data">
 <?php $this->display_flash(); ?>
					  <div class="form-group">
						  <label for="username" class="control-label">Email Address</label>
						  <input type="text" class="form-control ff1" id="email" name="data[Practice][email]" value="<?php echo $_POST[data][Practice][email];?>"  title="Please enter you email"  placeholder="Please enter you email" />
						  <span class="errorspan" id="errspan_email"></span>
					  </div>
					  <div class="form-group">
						  <label for="password" class="control-label">Password</label>
						  <input type="password" class="form-control ff1" id="password" name="data[Practice][password]" value="<?php echo $_POST[data][Practice][password];?>" title="Please enter password"  placeholder="Please enter you password" />
						    <span class="errorspan" id="errspan_password"></span>	
					  </div>
					  <div class="form-group">
						  <label for="password" class="control-label">Repeat Password</label>
						  <input type="password" class="form-control ff1" id="password1" name="data[Practice][password1]" value="<?php echo $_POST[data][Practice][password1];?>" title="Please enter repeat password"  placeholder="Please enter your repeat password"/>
						    <span class="errorspan" id="errspan_password1"></span>
					  </div>
					  <div class="form-group">
						  <label for="username" class="control-label">First name</label>
						  <input type="text" class="form-control ff1" id="firstname" name="data[Practice][firstname]" value="<?php echo $_POST[data][Practice][firstname];?>"  title="Please enter your firstname"    placeholder="Please enter your firstname"/>
						   	<span class="errorspan" id="errspan_firstname"></span>	
					  </div>
					  <div class="form-group">
						  <label for="username" class="control-label">Last name</label>
						  <input type="text" class="form-control ff1" id="lastname" name="data[Practice][lastname]" value="<?php echo $_POST[data][Practice][lastname];?>"  title="Please enter your lastname" placeholder="Please enter your lastname"   />
			<span class="errorspan" id="errspan_lastname"></span>	
					  </div>
					  <div class="form-group">
						  <label for="username" class="control-label">Practice name</label>
						  <input type="text" class="form-control ff1" id="practicename" name="data[Practice][practicename]" value="<?php echo $_POST[data][Practice][practicename];?>"  title="Please enter your practice name"  placeholder="Please enter your practice name" />
						<span class="errorspan" id="errspan_practicename"></span>
					  </div>
					  <div class="form-group">
						  <label for="username" class="control-label">Practice code</label>
						  <input type="text" class="form-control ff1" id="practice_code" name="data[Practice][practice_code]" value="<?php echo $_POST[data][Practice][practice_code];?>"  title="Please enter your practice code"  placeholder="Please enter your practice code" />
	<span class="errorspan" id="errspan_practice_code"></span>
					  </div>
					  <div class="form-group">
						  <label for="username" class="control-label">CCG</label>
						  <select id="ccg_id" name="data[Practice][ccg_id]" class="form-control ff1">
					 <option value=""> Select</option>
							
<?php
		foreach($cgcodelist as $ccg){
	?>
 	  <option value="<?php echo $ccg->id;?>" <?php if($_POST[data][Practice][ccg_id] == $ccg->id) echo 'selected'?>   ><?php echo $ccg->ccg_name;?></option>
	<?php
	}	
	?>  
		</select>
 
						  <span class="help-block"></span> <span class="errorspan" id="errspan_ccg_id"></span>	
					  </div>
					  <div class="form-group">
						  <label for="username" class="control-label">Practice postcode</label>
						  <input type="text" class="form-control ff1" id="postcode" name="data[Practice][postcode]" value="<?php echo $_POST[data][Practice][postcode];?>"  title="Please enter your postcode" placeholder="Please enter your postcode" />
						 <span class="errorspan" id="errspan_postcode"></span>
					  </div>
					  <div class="form-group">
						  <label for="username" class="control-label">Direct Line</label>
						  <input type="text" class="form-control ff1" id="phone_number" name="data[Practice][phone_number]" value="<?php echo $_POST[data][Practice][phone_number];?>"  title="Please enter your phonenumber" placeholder="Please enter your phonenumber"/>
 <span class="errorspan" id="errspan_phone_number"></span>
					  </div>
					  <div class="form-group">
						  <label for="username" class="control-label">IT systems</label>
					 <select multiple="multiple" id="it_systems" name="data[Practice][it_systems]" class="form-control ff1"">	
<option value=""> Select</option>
<?php
		foreach($itsystemlist as $itsys){
	?>
 	  <option value="<?php echo $itsys->id;?>" <?php if($_POST[data][Practice][it_systems] == $itsys->id) echo 'selected'?>  ><?php echo $itsys->itname;?></option>
	<?php
	}	
	?>  
		</select>
							 
						  <span class="errorspan" id="errspan_it_systems"></span>
					  </div>
					  <div class="form-group">
						  <label for="username" class="control-label">How did you hear about us?</label>
						  <select id="howdidyouhear" name="data[Practice][howdidyouhear]" class="form-control ff1">
							<option value=""> Select</option>
							<?php
		foreach($howdidyouhearlist as $hearlst){
	?>
 	  <option value="<?php echo $hearlst->id;?>"  <?php if($_POST[data][Practice][howdidyouhear] == $hearlst->id) echo 'selected'?> ><?php echo $hearlst->hearname;?></option>
	<?php
	}	
	?>  
		</select>
						   <span class="errorspan" id="errspan_howdidyouhear"></span>	
					  </div>
					  
					  <div class=""><input id="id_accept_terms" name="accept_terms" type="checkbox"> I agree with the <a href="#" target="_blank" data-original-title="">Terms and Conditions <i class="icon-external-link icon-small"></i></a> and <a href="#" target="_blank" data-original-title="">Privacy Policy <i class="icon-external-link icon-small"></i></a> of Network Locum</div> <br>
					  
					  <button type="submit" class="btn btn-info btn-block sbtn">Sign Up</button>
					  
					  
				  </form>
				  </div>
				  
					<div class="col-md-7">
						<div >
							<img alt="" style="float:right;" class="img-responsive" src="<?php echo $templtpath;?>/images/aboutapp.png">
						</div>
					</div>
			 
			</div>
		</div> 
				
				
			</div>
		</div>  
	</div>
	
	<!--middle end here-->
