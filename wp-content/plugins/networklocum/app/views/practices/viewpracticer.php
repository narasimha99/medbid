<?php
$url = esc_url( home_url( '/' ));
$templtpath= get_template_directory_uri(); 
?>
<!--middle start here-->
<div class="midcol">
<div class="container">
<div class="row">
<div class="col-md-12">
 
<div class="aligncenter">
<h2 class="text1"> View practicer profile </h2>
</div>
<?php
/*
$profile_image = $practicerobject->profile_image;
if (strlen(trim($profile_image)) == 0 )
*/
$profile_image = 'demouser.png';

?>
<div>
<img class="img-circle img-user-config" src="<?php echo  $url.'/upload_pic/'.$profile_image; ?>"/>
<span style="float:right"> <h1><?php echo $practicerobject->firstname.' '.$practicerobject->lastname;?></h1> </span>
</div>		
 
<table class="col-md-12 table-bordered table-striped table-condensed cf" style="margin-bottom:10px;">

<tr>
<td><label for="password" class="control-label">practice name</label> </td>
<td>  <?php echo $practicerobject->practicename;?> </td>
</tr>


<tr>
 <td>
 <label for="password" class="control-label">practice code</label>
</td>
<td> 
<?php echo $practicerobject->practice_code;?>
</td>
</tr> 				  



<tr>
<td><label for="username" class="control-label">Pct Code</label> </td>
<td> <?php
foreach($Pctcodelist as $pctcode) {
if( $pctcode->id ==  $practicerobject->pct)
echo $pctcode->pct_name;
}
?> </td>
</tr>



<tr>
<td> <label for="password" class="control-label">Ccg Code </label> </td>
<td>
<?php
foreach($cgcodelist as $ccgCode) {
if( $ccgCode->id ==  $practicerobject->ccg_id)
echo $ccgCode->ccg_name;
}
?> 
</td>
</tr> 

<tr>
<td> <label for="username" class="control-label">IT Systems (Clinical Systems) </label> </td>
<td>
<?php
$old_itsystems = $practicerobject->it_systems;
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
 <label for="username" class="control-label">Parking facilities</label>
</td>
<td>
<?php
$parking_array = array(
'1'=>'Free and near',
'2'=>'Free and onsite',
'3'=>'Pay and Display nearby',
'4'=>'Parking is difficult',
'5'=>'Free and onsite'
);
?>

<?php
for($mt=1;$mt<count($parking_array);$mt++){
  if( $practicerobject->parking  == $mt)
	echo $parking_array[$mt];
 }	
?>
</td>
</tr>
  
<tr>
<td> <label for="password" class="control-label">Travel information</label> </td>
<td> 
<?php
echo $practicerobject->travel_info;
?>
</td>
</tr>

 			 
<tr>
<td> Postal Address </td>
<td> <?php echo $practicerobject->address;?> </td>
</tr>
 
 

			 
<tr>
<td> Country</td>
<td> <?php echo $practicerobject->country;?> </td>
</tr>


			 
<tr>
<td> State </td>
<td> <?php echo $practicerobject->state;?> </td>
</tr>
 
 
 
<tr>
<td> City </td>
<td> <?php echo $practicerobject->city;?> </td>
</tr>
  

<tr>
<td> Postcode </td>
<td> <?php echo $practicerobject->postcode;?> </td>
</tr>
  
<tr>
<td> <label for="password" class="control-label">About us and our patients</label> </td>
<td> <?php echo $practicerobject->aboutusandourpatients;?> </td>
</tr>
 
  
  
<tr>
<td>Phone Number </td>
<td> <?php echo $practicerobject->phone_number;?> </td>
</tr>

<tr>
<td>Last name </td>
<td><?php echo $practicerobject->lastname; ?> </td>
</tr>

<tr>
<td>First name </td>
<td><?php echo $practicerobject->firstname;?> </td>
</tr>


<tr>
<td>Email </td>
<td><?php echo $practicerobject->email;?> </td>
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

 echo $nhs_pension_array[$practicerobject->NHS_Pension];
?> 
</td>
</tr>



</table>
  
</div>
</div>
</div>	
</div>
 <!--middle end here-->
