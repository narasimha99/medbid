<script>
jQuery( document ).ready(function() {
//console.log( "ready!" );
jQuery("#submit").click(function () {
$("#changepassword").submit();
});
});
</script>
<?php
$url = esc_url( home_url( '/' ));
$templtpath= get_template_directory_uri(); 
?>
<!--middle start here-->
	<div class="midcol">
		<div class="dashbg" style="margin-top: -48px;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="dashmid">
							<div class="dashmidh">
								<h2>Change Password</h2>
							</div>
							
							
							
							<div class="dtextpad">
							
							<ol class="breadcrumb">
							  <li><a href="<?php echo $url.'locums/myprofile';?>">Your Account</a></li>
							  <li class="active">Change Password</li>
							</ol>
							
							<p><?php $this->display_flash(); ?> </p>

<p>Please enter your old password, for security's sake, and then enter your new password twice so we can verify you typed it in correctly.</p><br>
								  
								  <div class="row">
									<div class="col-md-8 col-md-offset-2 ">
										<div class="bitbox1">
						
						<form name="practicesignup" id="changepassword"   autocomplete="off"  method="post" action="<?php echo $url;?>practices/changepassword" onsubmit="javascript:return validatechangepassword();" enctype="multipart/form-data">
						
						<div class="form-group">
						  <label for="password" class="control-label">Old password</label><br>
						  <input id="old_password" name="old_password" type="password" class="form-control ff1" value="<?php echo $_POST['old_password'];?>"/>
						  <span class="errorspan" id="errspan_old_password"></span>
					  </div>
					  
					  <div class="form-group">
						  <label for="password" class="control-label">New password</label><br>
						  <input id="new_password1" name="new_password1" type="password" class="form-control ff1" value="<?php echo $_POST['new_password1'];?>"/>
						  <span class="errorspan" id="errspan_new_password1"></span>
					  </div>
					  
					  <div class="form-group">
						  <label for="password" class="control-label">Re-enter new password</label>
						  <input id="new_password2" name="new_password2" type="password" class="form-control ff1" value="<?php echo $_POST['new_password2'];?>" />
						    <span class="errorspan" id="errspan_new_password2"></span>
					  </div>
					  

					  <div align="center">
							<button class="btn btn-info sbtn" id="submit">Change my password</button>
						</div>
					  
				  </form>
					</div>
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
