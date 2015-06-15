<?php
 $templtpath= get_template_directory_uri(); 
?>
<?php
$url = esc_url( home_url( '/' )); 
$templtpath= get_template_directory_uri(); 
?>
<script>
$(document).ready(function() {
    $('#selecctall').click(function(event) {  //on click
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }
    });
   
});
</script>
<!--middle start here-->
 	<div class="midcol">
		<div class="container">
			<div class="row">
	<h1> Search your locums by zipcode radius search </h1>

	<form   action="<?php echo $url;?>jobs/invitelocums"  method="POST"> 
	<p>
 	<label> ZIP Code :
		<input  name="zipcode" style="font-size:12px;" id="zipcode"  type="text" value="<?php echo $_POST['zipcode'];?>" /></label>

	<label>Within:</label>
	<select name="distance" id="distance">
	<option value="5"  <?php if($_POST['distance'] == 5 ) echo 'selected'?>>5</option>
	<option value="10"  <?php if($_POST['distance'] == 10 ) echo 'selected'?>>10</option>
	<option value="25"  <?php if($_POST['distance'] == 25 ) echo 'selected'?>>25</option>
	<option value="50"  <?php if($_POST['distance'] == 50) echo 'selected'?>>50</option>
	<option value="100"  <?php if($_POST['distance'] == 100 ) echo 'selected'?> >100</option>
	</select> Miles 
	</p>

	<p>
	<input type="hidden" name="job_id" value="<?php echo $job_id;?>"/>
	<input type="submit" name="submit" value="submit"/>
	</p>

	<p> Please select your Locum </p>
	<ul class="chk-container">
	 <li><input type="checkbox" id="selecctall"/> Selecct All</li>
	<?php
	if (isset($listlocums)){
	// print_r($listlocums); 
		foreach($listlocums as $locum){
	?> 
			<li><input class="checkbox1" type="checkbox" name="locumcheck[]" value="<?php echo $locum->user_id;?>"><?php echo $locum->firstname.' '.$locum->lastname;?></li>

	<?php
		} }
	?>  
	</ul>

	<input type="submit" value="Send invitation" name="submit"/>
	</form>
   			</div>
		</div>
	</div>
<!--middle end	 here-->
