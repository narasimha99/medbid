<?php
$url = esc_url(home_url('/'));
$templtpath = get_template_directory_uri(); 
?>
	
       <!--middle Start here-->
	  <div class="midcol">
		<div class="container">
		   <div class="row">
			<div class="col-md-12">
						<div class="dashmid">
							<div class="dashmidh">
								<h2>Account details</h2>
							</div>
						</div>
			</div>

		      <div class="col-md-12">
		        <h3><a href="<?php echo $url.'locums/myprofile';?>">My Profile</a> / Personal Settings</h3>
				 <div class="bitbox1">
				 <form name="locumaccount" id="locumaccount"   autocomplete="off"  method="post" action="<?php echo $url;?>locums/accountdetails"  enctype="multipart/form-data">
				  <?php $this->display_flash(); ?>
				  <input type="hidden" name="data[Locum][id]" value="<?php echo $locumobj->id;?>" />
				   <table class="col-md-12 table-bordered table-striped table-condensed cf">
				     <tr>
					   <td><strong>Email</strong></td>
					   <td><p><?php echo $locumobj->email; ?></p><p>You can <a href="">email</a> us  if you need to change it .</p></td>
					 </tr>
					  <tr>
					   <td><strong>Password</strong></td>
					   <td><p>We encrypt all passwords before storing them, so there is no way to show you what your password is.</p>
					   <p>You can always <a href="<?php echo $url.'locums/changepassword';?>">change your password </a> if you need to.</p></td>
					 </tr>
					 <tr>
					   <td><strong>Availability to Work</strong></td>
					   <td>
			
<input type="checkbox" name="data[Locum][available_on_sunday]" id="id_available_on_sunday"  value="1" <?php if($locumobj->available_on_sunday == 1 ) echo 'checked=checked';?> /> Sun
		  
			  <input type="checkbox" name="data[Locum][available_on_monday]" id="id_available_on_monday"  value="1" <?php if($locumobj->available_on_monday == 1 ) echo 'checked=checked';?> />
Mon 
	<input type="checkbox" name="data[Locum][available_on_tuesday]"   value="1"  id="id_available_on_tuesday" <?php if($locumobj->available_on_tuesday == 1 ) echo 'checked=checked';?> />
Tue

<input type="checkbox" name="data[Locum][available_on_wednesday]" id="id_available_on_wednesday"   value="1"   <?php if($locumobj->available_on_wednesday == 1 ) echo 'checked=checked';?> />
Wed

<input type="checkbox" name="data[Locum][available_on_thursday]" id="id_available_on_thursday"    value="1"   <?php if($locumobj->available_on_thursday == 1 ) echo 'checked=checked';?> />
Thu

<input type="checkbox" name="data[Locum][available_on_friday]" id="id_available_on_friday"   value="1"  <?php if($locumobj->available_on_friday == 1 ) echo 'checked=checked';?> />
Fri 
<input type="checkbox" name="data[Locum][available_on_saturday]" id="id_available_on_saturday"  value="1"   <?php if($locumobj->available_on_saturday == 1 ) echo 'checked=checked';?> />
Sat 
					   </td>
					 </tr>
					 <tr>
					   <td><strong>Minimum Rate</strong></td>
					   <td><p><input type="text" name="data[Locum][minimum_rate]" id="id_minimum_rate"  value="<?php echo $locumobj->minimum_rate;?>" /></p>
					   <p>We use this to when we're deciding which jobs to email you about</p>
					   </td>
					 </tr>
					 
				   </table>
				   <div align="center">
						<button class="btn btn-info sbtn" id="submit">Save Changes</button>
				   </div>
				   </form>
				 </div>
			  </div>
		  </div>
		</div>
	  </div>	
	<!--middle end here-->
