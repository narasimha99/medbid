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
<div>

	<p> Please select your Locum </p>
	<ul class="chk-container">
	<li><input type="checkbox" id="selecctall"/> Selecct All</li>
	<?php
	if (isset($listlocums)){
	// print_r($listlocums); 
	foreach($listlocums as $locum){
	?> 
	<li><input class="checkbox1" type="checkbox" name="locumcheck[]" value="<?php echo $locum->id;?>"><?php echo $locum->firstname.' '.$locum->lastname;?></li>

	<?php
	}}
	?>  
	</ul>

	<input type="submit" value="Send invitation" name="submit"/>
</div>
