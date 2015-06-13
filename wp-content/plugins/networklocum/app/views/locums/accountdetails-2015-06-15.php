<?php
$url = esc_url( home_url( '/' ));
$templtpath= get_template_directory_uri(); 
?>

<div class="midcol">
		<div class="dashbg" style="margin-top: -48px;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="dashmid">
							<div class="dashmidh">
								<h2>Account details</h2>
							</div>

<form name="locumaccount" id="locumaccount"   autocomplete="off"  method="post" action="<?php echo $url;?>locums/accountdetails"  enctype="multipart/form-data">

 <?php $this->display_flash(); ?>
 

<div class="form-group">
<input type="hidden" name="data[Locum][user_id]" value="<?php echo $locumobj->user_id;?>" />
Email:  <?php echo $locumobj->email; ?>

<br>
Password: We encrypt all passwords before storing them, so there is no way to show you what your password is. 
<br>  <a href="<?php echo $url.'locums/changepassword';?>">Change password</a> 
</div>

<div class="form-group">
 
<span class="help-block">When are you available to work?</span> 

<input type="checkbox" name="data[Locum][available_on_monday]" id="id_available_on_monday"  value="1" 
<?php if($locumobj->available_on_monday == 1 ) echo 'checked=checked';?> />
Mon 
<input type="checkbox" name="data[Locum][available_on_tuesday]"   value="1"  id="id_available_on_tuesday" <?php if($locumobj->available_on_tuesday == 1 ) echo 'checked=checked';?> />
Tue
<input type="checkbox" name="data[Locum][available_on_wednesday]" id="id_available_on_wednesday"   value="1"   <?php if($locumobj->available_on_wednesday == 1 ) echo 'checked=checked';?> />
Wed
<input type="checkbox" name="data[Locum][available_on_thursday" id="id_available_on_thursday"    value="1"   <?php if($locumobj->available_on_thursday == 1 ) echo 'checked=checked';?> />
Thu 
<input type="checkbox" name="data[Locum][available_on_friday]" id="id_available_on_friday"   value="1"  <?php if($locumobj->available_on_friday == 1 ) echo 'checked=checked';?> />
Fri 
<input type="checkbox" name="data[Locum][available_on_saturday]" id="id_available_on_saturday"  value="1"   <?php if($locumobj->available_on_saturday == 1 ) echo 'checked=checked';?> />
Sat 
   
 </div>					
 Minimum rate:
<input type="text" name="data[Locum][minimum_rate]" id="id_minimum_rate"  value="<?php echo $locumobj->minimum_rate;?>" />
 We use this to when we're deciding which jobs to email you about

						 <div align="center">
						<button class="btn btn-info sbtn" id="submit">Save Changes</button>
						</div>
					  
				  </form>

		  
		</div>
				</div>
			</div>
		  
	</div>
	
	<!--middle end here-->
