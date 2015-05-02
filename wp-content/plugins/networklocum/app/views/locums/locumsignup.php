<?php $url = esc_url( home_url( '/' )); ?>
<script>
jQuery( document ).ready(function() {
//console.log( "ready!" );
jQuery("#submit").click(function () {
$("#locumsignup").submit();
});
 
});
</script>


	<!--middle start here-->
 	<div class="midcol">
		<div class="container">
		<div class="row">
				<div class="col-md-12">  
					<div class="aligncenter">
						<h2 class="text1">Get started with a free account</h2>
						<p>Sign up in 30 seconds to see our jobs</p>
					</div>	
				<div>

				<div id="login-overlay" class="modal-dialog logbody">
				  <div class="modal-content boxshadow">
					  
 <?php $this->display_flash(); ?>
					  <div class="modal-body logbody2 ">
						  <div class="row">
							  <div class="col-md-offset-3 col-md-6">
								  <div class="well">

<form name="locumsignup" id="locumsignup"  autocomplete="off" method="post" action="<?php echo $url;?>locums/locumsignup"    onsubmit="javascript:return validatelocumsignup();" enctype="multipart/form-data">
								  
						
 
<div class="form-group">
											  <label for="username" class="control-label">Email</label>
											  <input type="text" class="form-control ff1" id="email" name="data[Locum][email]" value="<?php echo $_POST['data']['Locum']['email'];?>"  title="Please enter you username" 	  placeholder="Your Email Address" />
<span class="errorspan" id="errspan_email"></span>
										  </div>
										  <div class="form-group">
											  <label for="username" class="control-label">First name</label>
											  <input type="text" class="form-control ff1" id="firstname" name="data[Locum][firstname]" value="<?php echo $_POST['data']['Locum']['firstname'];?>"   title="Please enter"   placeholder="Your First name"/>
<span class="errorspan" id="errspan_firstname"></span>
										  </div>
										  <div class="form-group">
											  <label for="username" class="control-label">Last name</label>
											  <input type="text" class="form-control ff1" id="lastname" name="data[Locum][lastname]"   value="<?php echo $_POST['data']['Locum']['lastname'];?>"   title="Please enter"   placeholder="Your Last name"/>
<span class="errorspan" id="errspan_lastname"></span>
										  </div>
										  		   
				<button type="submit" id="submit" class="btn btn-info btn-block sbtn">Sign Up for Free</button>
													 
 
									
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
