<?php
$url = esc_url( home_url( '/' ));
$templtpath= get_template_directory_uri(); 
?>
<script>
jQuery(document).ready(function() {

	//console.log( "ready!" );
	jQuery("#submit1").click(function () {
		$("#calendarform").submit();
 	});

	jQuery("#submit2").click(function () {
		$("#savejob").val('savejob');
	});
 });
</script>

<!--middle start here-->
<div class="midcol">
<div class="container">
<div class="row">
<div class="col-md-12">
 
<div class="aligncenter">
<h2 class="text1"> Verfiy Locum Profile </h2>
</div>
  
<?php
$profile_image = $Locumobject->profile_image;
if (strlen(trim($profile_image)) == 0 )
$profile_image = 'demouser.png';

?>

<div>
<img class="img-circle img-user-config" src="<?php echo  $url.'/upload_pic/'.$profile_image; ?>"/>
<span style="float:right"> <h1> Dr. <?php echo $Locumobject->firstname.' '.$Locumobject->lastname;?></h1> </span>
</div>		
		
  
<table class="col-md-12 table-bordered table-striped table-condensed cf" style="margin-bottom:10px;">

<tr>
<td><label for="password" class="control-label">Company name</label> </td>
<td>  <?php echo $Locumobject->companyname;?> </td>
</tr>

<?php 
$companyarray = array('I operate as a limited company','I do not operate as a limited company');
?>

<tr> 
<td> 	<label for="password" class="control-label">company status</label> </td>
<td>  <?php echo $companyarray[$Locumobject->companystatus]; ?> </td>
</tr>

  



<tr>
<td>Location: </td>
<td> <?php echo $Locumobject->geo_location;?>"  </td>
</tr>





<tr>
<td> <label for="password" class="control-label">Gender</label> </td>
<td> 
<?php
 $arrGender = array('Male','Female');
echo  $arrGender[$Locumobject->gender];
?>
</td>
</tr>



 
  
 
	

    			 
<tr>
<td> Postal Address </td>
<td> <?php echo $Locumobject->address;?> </td>
</tr>
 
 

			 
<tr>
<td> Country</td>
<td> <?php echo $Locumobject->country;?> </td>
</tr>


			 
<tr>
<td> State </td>
<td> <?php echo $Locumobject->state;?> </td>
</tr>
 
 
 
<tr>
<td> City </td>
<td> <?php echo $Locumobject->city;?> </td>
</tr>
  

<tr>
<td> Postcode </td>
<td> <?php echo $Locumobject->postcode;?> </td>
</tr>
  
<tr>
<td> <label for="password" class="control-label">Head line</label> </td>
<td> <?php echo $Locumobject->headline;?> </td>
</tr>
 
 

<tr>
<td> <label for="password" class="control-label">  About me </label> </td>
<td> <?php echo $Locumobject->aboutme;?> </td>
</tr> 

   
<tr>
  <td>
 <label for="password" class="control-label">Smartcard</label>
</td>
<td> 
<?php echo $Locumobject->smartcard;?>
</td>
</tr> 				  

 

<tr>
<td> <label for="username" class="control-label">IT Systems (Clinical Systems) </label> </td>
<td>
<?php
$old_itsystems = $Locumobject->it_systems;
$old_itsystems_array=explode(",",$old_itsystems);

foreach($itsystemlist as $itsys) {
if (in_array($itsys->id, $old_itsystems_array)){
?>
<?php echo $itsys->itname;?> <br>
<?php
}}	
?></td>
</tr> 

	

<tr>
<td>

<label for="username" class="control-label">Qualifications</label>
</td>

<td>
<?php
$old_qualifications = $Locumobject->qualifications;
$old_qualifications_array=explode(",",$old_qualifications);
foreach($qualificationsarray as $qualify) {
 if (in_array($qualify->id, $old_qualifications_array)){
?>
<?php echo $qualify->quaname;?> <br>
<?php
}}	
?>  
</td>
</tr>
<tr>
<td>

<label for="username" class="control-label">Languages known</label>
</td>
<td>
<?php
$old_languages_known = $Locumobject->languages_known;
$old_languages_known_array=explode(",",$old_languages_known);

foreach($spokenLanguagesarray as $language) {
if (in_array($language->id, $old_languages_known_array)){				
?>
<?php echo $language->langname;?>
<br/>
<?php
}}	
?>  
 </td>
</tr>

 

 
 


 
 


<tr>
<td>Phone Number </td>
<td> <?php echo $Locumobject->phone_number;?> </td>
</tr>

<tr>
<td>Last name </td>
<td><?php echo $Locumobject->lastname; ?> </td>
</tr>

<tr>
<td>First name </td>
<td><?php echo $Locumobject->firstname;?> </td>
</tr>


<tr>
<td>Email </td>
<td><?php echo $Locumobject->email;?> </td>
</tr>


<tr>
<td><label for="username" class="control-label">GMC number</label> </td>
<td> <?php echo $Locumobject->gmc_number;?> </td>
</tr>


<tr>
<td> <label for="username" class="control-label">NHS Pension</label> </td>
<td>
<?php
 $nhs_pension_array = array(
	'1'=>'NHS Pension not paid',
	'2'=>'NHS Pension paid at top',
	'3'=>'Rate is inclusive of NHS pension'
  );

 echo $nhs_pension_array[$Locumobject->NHS_Pension];
?> 
</td>
</tr>
 
</table>
 

					 <div align="center">
						<
							<button class="btn btn-info sbtn" id="submit1">verified locum</button>
							<button class="btn btn-info sbtn" id="submit2">Rejected locum</button>
					 </div>

 
</div>
</div>
</div>	
</div>
 <!--middle end here-->
