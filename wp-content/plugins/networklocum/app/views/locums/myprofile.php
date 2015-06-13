<?php
$url = esc_url( home_url( '/' ));
$templtpath= get_template_directory_uri(); 
?>
<script>
jQuery( document ).ready(function() {
//console.log( "ready!" );
jQuery("#submit").click(function () {
$("#locumsignupnext").submit();
});

 
 
});
</script>
<style>
.button-primary {
    background: none repeat scroll 0 0 #9ebaa0;
    border-color: #80a583;
    box-shadow: 0 1px 0 #cbdacc inset, 0 1px 0 rgba(0, 0, 0, 0.15);
    color: #fff;
}
</style>


<!--middle start here-->
 
	<div class="midcol">
		<div class="container">
		<div class="row">
		   <div class="col-md-8">
		     <h3 style="padding:10px;">My Profile</h3>
		     <p style="padding:10px;">My Profile is the place to describe yourself, so it's clear why practice managers should invite you to work. Make sure to include all your skills, interests and IT systems. This is also where you should upload all your documentation proving you're fully up-to-date with qualifications and training.</p>
		   </div>
		   <div class="col-md-4">
		                 <div class="progress-radial progress-40" style="height:50px;">
				                <div class="overlay">40%</div>
			             </div>
		  </div>
		</div>
		<div class="container">
		    <div class="row">
			   <!--- Left hand side Panel Showing the buttons etc -->
			   <div class="col-md-8">
			    <div class="container">
				<h1 style="padding:10px;">Dr. Fayaz Hasham</h1>
				 <div class="row" style="padding:10px;">
				   <div class="col-md-2">
				      <div><img class="img-circle img-user-config" src="<?php echo  $url.'/upload_pic/'.$profile_image; ?>"></div>
				   </div>
				   <div class="col-md-6">
						 <div>
							 <span><a href="">Upload Photo</a></span>
							 <span><a href="">Upload Document</a></span>
							 <span><a href="">Email Preferences</a></span>
							 <span><a href="">Edit Profile</a></span>
						 </div>
						 <div>
						   <p style="padding:10px;">You haven't written anything about yourself. Writing a brief description of yourself helps practice managers to be more sure of who they're choosing when you apply for jobs.</p>
						 </div>
				   </div>
				 </div>			   
			   </div>
			   <div style="margin:10px;">
			     <h3>Verification documents</h3>
				  <p style="padding:5px;">You haven't uploaded any documents yet. We need your CV, MDU, GMC, certification of completion of training, passport and CRB. Other documents are not essential, but are useful to help practices verify you. For more help on becoming approved, please see our blog post.</p>
			   </div>
			   </div>
			   <!-- Left Hand side Panel Ends Here --->
			   <div class="col-md-4">
			     <div>
				 <h4>Personal Details</h4>
				 <table>
				    <tr>
					  <td>GMC Number</td>
					  <td>7006783</td>
					</tr>
				    <tr>
					  <td>Smartcard Company Status</td>
					  <td>I operate as a ltd. company</td>
					</tr>
					<tr>
					  <td>Company Name</td>
					  <td>None</td>
					</tr>
					<tr>
					  <td>National Insurance Number</td>
					  <td>None</td>
					</tr>
					<tr>
					  <td>Gender</td>
					  <td>Male</td>
					</tr>
				 </table>
				 </div>
				 <div>
				   <h4>My Qualifications</h4>
				   <p>MRCGP</p>
				 </div>
				 
			   </div>
			</div>
		</div>  
	</div>
	</div>	
	

<!--middle end here-->


