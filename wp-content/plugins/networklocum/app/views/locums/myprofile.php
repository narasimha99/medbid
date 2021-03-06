<?php
$url = esc_url( home_url( '/' ));
$templtpath= get_template_directory_uri(); 
session_start(); //Do not remove this
$_SESSION["mysitemyurl"] = $url.'/locums/myprofile';
$_SESSION['myuser_id'] = $user_id;
?>
<script>
jQuery(document).ready(function() {
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
		<?php /*?><div class="row">
		   <div class="col-md-12" style="border:1px solid #cdcdcd; background-color:#fafafa;margin-top:5px;">
			 <?php $this->display_flash(); ?>
		     <h3 style="padding:10px;">My Profile</h3>
		     <p style="padding:10px;">My Profile is the place to describe yourself, so it's clear why practice managers should invite you to work. Make sure to include all your skills, interests and IT systems. This is also where you should upload all your documentation proving you're fully up-to-date with qualifications and training.</p>
		   </div>
		</div><?php */?>
		    <div class="row">
			   <!--- Left hand side Panel Showing the buttons etc -->
			   <div class="col-md-8" >
			    <div class="container">
				 <div class="row">
				   <div class="col-md-8" style="margin-bottom:50px;">
				     <h1> Dr. <?php echo $locumdetails->firstname.' '.$locumdetails->lastname;?></h1>
				   </div>
				 </div>
				 <div class="row">
				   <div class="col-md-3">
<?php
		$profile_image = $locumdetails->profile_image;
		if (strlen(trim($profile_image)) == 0 )
			$profile_image = 'demouser.png';

 		$this->set('profile_image',$profile_image);


?>				      <div><img class="img-circle img-user-config" src="<?php echo  $url.'/documpropic/'.$profile_image; ?>">
</div>
				   </div>
				   <div class="col-md-5">
						  <ul style="list-style:none; line-height:25px;">
						    <li><a href="<?php echo $url.'locums/uploadprofileimage';?>">Change Photo</a></li>
							<li><a href="<?php echo $url.'locums/';?>">Upload Documents</a></li>
							<li><a href="<?php echo $url.'locums/editprofile';?>">Edit Profile</a></li>
							<li><a href="<?php echo $url.'locums/changepassword';?>">Change Password</a></li>
							<li><a href="<?php echo $url.'locums/accountdetails';?>">Edit Personal Settings</a></li>
							
						  </ul>
						 
				   </div>
				 </div>			   
			   </div>
			   <div style="margin:10px;">
			     <h3>About Yourself </h3>
				<?php if (strlen($locumdetails->aboutme)>0) { ?>

				<p style="padding:10px;"> <?php echo $locumdetails->aboutme;?> </p>
				<?php } else { ?>
				  <p style="padding:10px;">You haven't written anything about yourself. Writing a brief description of yourself helps practice managers to be more sure of who they're choosing when you apply for jobs.</p>
				<?php } ?>
			   </div>
			   <div style="margin:10px;">
			     <h3>Verification documents</h3>
				  <p style="padding:5px;">If you haven't uploaded any documents yet. We need your CV, MDU, GMC, certification of completion of training, passport and CRB. Other documents are not essential, but are useful to help practices verify you. For more help on becoming approved, <a href="#">please see our blog post</a> or <a href="<?php echo  $url.'locums/uploadmutipledocuments/'; ?>">Upload more documents to verfify. </a>
</p>
			   </div>
			   </div>
			   <!-- Left Hand side Panel Ends Here --->
			   <div class="col-md-4">
			     <div>
				 <h4 style="margin-bottom:5px;"><strong>Personal Details</strong></h4>
				 <table class="col-md-12 table-bordered table-striped table-condensed cf" >
				    <tr>
					  <td>GMC Number</td>
					  <td><?php echo $locumdetails->gmc_number;?></td>
					</tr>
				    <tr>
					  <td>Smartcard </td>
					  <td><?php echo $locumdetails->smartcard;?></td>
					</tr>
					<tr>
					<td>Company Status</td>
					<td> <?php echo $companyStatus[$locumdetails->companystatus];?> </td>
					</tr>			
					<tr>
					  <td>Company Name</td>
					  <td><?php echo $locumdetails->companyname;?></td>
					</tr>
					
					<tr>
					  <td>National Insurance Number</td>
					  <td><?php echo $locumdetails->insuranceno;?></td>
					</tr>
					<tr>
					  <td>Gender</td>
					  <td><?php 
$arraygender = array('0'=>'Male','1'=>'Female');
echo $arraygender[$locumdetails->gender];?></td>
					</tr>
				 </table>
				 </div>
				 <div>
				   <h4 style="margin-bottom:10px;"><strong>My Qualifications</strong></h4>
				  <table class="col-md-12 table-bordered table-striped table-condensed cf" style="margin-bottom:10px;">
	 	  
					<?php
	  				for($p=0;$p<count($qualificationsarray);$p++) {
					?>
					 <tr>		
					  <td><?php echo $qualificationsarray[$p]->quaname;?></td>
					 </tr>
					<?php } ?>
				
			 	</table>
				 </div>
				 <div>
				   <h4 style="margin-bottom:10px;"><strong>Spoken Languages</strong></h4>
				  <table class="col-md-12 table-bordered table-striped table-condensed cf" style="margin-bottom:10px;">
					  
					<?php
	  				for($p=0;$p<count($spokenLanguagesarray);$p++) {
					?>
					 <tr>		
					  <td><?php echo $spokenLanguagesarray[$p]->langname;?></td>
					 </tr>
					<?php } ?>
		
				 </table>
				 </div>
				  <div>
				   <h4 style="margin-bottom:10px;"><strong>IT Systems</strong></h4>
				  <table class="col-md-12 table-bordered table-striped table-condensed cf">
				   

				  
				<?php
  				for($p=0;$p<count($itsystemlist);$p++) {
				?>
				 <tr>		
				  <td><?php echo $itsystemlist[$p]->itname;?></td>
				 </tr>
				<?php } ?>
		
 				 </table>
				 </div>
			   </div>
			</div>
	</div>
	</div>	
	

<!--middle end here-->


