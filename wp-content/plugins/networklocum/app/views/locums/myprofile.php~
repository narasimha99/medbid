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
		<div class="dashbg" style="margin-top: -48px;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="dashmid">
							<div class="dashmidh">
								<h2>My Profile</h2>
							</div>
							
							
							
							<div class="dtextpad">
							
							<ol class="breadcrumb">
							  <li><a href="#"="<?php echo $url.'locums/youraccount';?>">Your Account</a></li>
							  <li class="active">Your Profile</li>

								  <?php //echo "in view "; echo "<pre>";print_r($practiceobject); echo "</pre>"; ?>
								  <div class="row">
									<div class="col-md-8 col-md-offset-2 ">
										<div class="bitbox1">
						
<form name="practicesignup" id="practicesignup"   autocomplete="off"  method="post" action="<?php echo $url;?>practices/editprofile" onsubmit="javascript:return validatepracticesignup();" enctype="multipart/form-data">
 <?php $this->display_flash(); ?>
 
 

<table>
<tr>

<td>

<a href="/account/upload-photo/">
<img class="img-circle img-user-config" src="<?php echo $url.'demouser.png'?>">
</a> 


<div id="photoresult"></div> 
<input type="hidden" name="action" value="update" />
<input type="hidden" name="user_id" id="user_id" value="102" />
<p> <a href="<?php echo $url.'upload_crop.php';?>">Update Picture</a> </p>
</div>
<?php
  $_SESSION['myuser_id'] = 102;
  $_SESSION['mysitemyurl'] = $url.'/locum/myprofile';
?>

</td>

<td> 
<table align="center">
<tr> <td> Your profile </td> </tr>
<tr> <td> <a  href="<?php echo $url.'locums/dashboard';?>">Dashboard</a> </td> </tr>
<tr> <td> <a  href="<?php echo $url.'locums/editprofile';?>">Edit profile</a> </td> </tr>
<tr> <td> <a  href="<?php echo $url.'locums/accountdetails';?>">Edit accountdetails</a> </td> </tr>
<tr> <td> <a  href="<?php echo $url.'locums/uploaddocuments';?>">Upload documents</a> </td> </tr>
<tr> <td> <a  href="<?php echo $url.'locums/changepassword';?>">Change Password</a>  </td> </tr>
 

</table>
	
</td>


</tr>		

</table>	
					  

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


