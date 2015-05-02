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

	<!--middle start here-->
 	<div class="midcol">
		<div class="container">
		<div class="row">
				<div class="col-md-12">  
					<div class="aligncenter">
						<h2 class="text1">Welcome <?php echo $_SESSION['firstname'];?></h2>
						<p> There are jobs waiting for you! Signup in 30 seconds to see them</p>
					</div>	
			<div>

				<div id="login-overlay" class="modal-dialog logbody">
				  <div class="modal-content boxshadow">
					  
 <?php $this->display_flash(); ?>
					  <div class="modal-body logbody2 ">
						  <div class="row">
							  <div class="col-md-offset-3 col-md-6">
								  <div class="well">
							 
<?php $url = esc_url( home_url( '/' )); ?>
<form name="locumsignupnext" id="locumsignupnext"  autocomplete="off"  method="post" action="<?php echo $url.'locums/locumsignupnext'; ?>"  onsubmit="javascript:return validatelocumsignupnext();" enctype="multipart/form-data">
 
<input type="hidden" name="data[Locum][id]" id="ID" value="<?php if (isset($locumid)) echo $locumid; ?>"/>

 

<div class="form-group">
 <label for="username" class="control-label">GMC number</label>
<input type="text" class="form-control ff1" id="gmc_number" name="data[Locum][gmc_number]" value="<?php echo $_POST['data']['Locum']['gmc_number'];?>"  title="Please enter your gmc number" placeholder="Your enter your  gmc number"/>
<span class="errorspan" id="errspan_gmc_number"></span>
 </div>
 
<div class="form-group">
 <label for="username" class="control-label">Postcode</label>
<input type="text" class="form-control ff1" id="postcode" name="data[Locum][postcode]" value="<?php echo $_POST['data']['Locum']['postcode'];?>"  title="Please enter your postcode" 	  placeholder="enter your postcode"/>
<span class="errorspan" id="errspan_postcode"></span>
 </div>

<div class="form-group">
 <label for="username" class="control-label">Phone number</label>
<input type="text" class="form-control ff1" id="phone_number" name="data[Locum][phone_number]" value="<?php echo $_POST['data']['Locum']['phone_number'];?>"  title="Please enter your phone number" 	  placeholder="Your phone number"/>
<span class="errorspan" id="errspan_phone_number"></span>
</div>


<div class="form-group">
 <label for="username" class="control-label">Limited Company</label>
<input type="radio" class="form-control ff1" id="limited_company" name="data[Locum][limited_company]" value="1"  <?php if ($_POST['data']['Locum']['limited_company'] == 1) echo "checked='checked'"; ?>   /> Yes
<input type="radio" class="form-control ff1" id="limited_company" name="data[Locum][limited_company]" value="0" <?php if ($_POST['data']['Locum']['limited_company'] == 0) echo "checked='checked'"; ?>    /> No
<span class="errorspan" id="errspan_limited_company"></span>
</div>

<div class="form-group">
 <label for="username" class="control-label">How did you hear about us?</label>
<select  class="form-control ff1" name="data[Locum][howdidyouhear]" id="howdidyouhear" style="width: 200px;">
	<?php
		foreach($howdidyouhearlist as $hearlst){
	?>
 	  <option value="<?php echo $hearlst->id;?>"   <?php if($_POST['data']['Locum']['howdidyouhear'] == $hearlst->id) echo 'selected'?>  ><?php echo $hearlst->hearname;?></option>
	<?php
	}	
	?>  
</select>
<span class="errorspan" id="errspan_howdidyouhear"></span>
</div>
 
 
 	<button type="submit" id="submit" class="btn btn-info btn-block sbtn">Submit here to finish</button>

  
</form>
 
  </div>
								  <p style="text-align:center;">By clicking 'Sign Up for Free' you are agreeing with our <a href="#" target="_blank">Terms</i></a> and <a href="#" target="_blank">Privacy Policy</a></p>
							  </div>
						  </div>
					  </div>
				  </div>
			  </div>
			</div>
		</div> 
				
				
			</div>
		</div>  
	</div>
	
	<!--middle end here-->
