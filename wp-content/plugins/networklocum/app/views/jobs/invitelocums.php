<!--middle start here-->
 	<div class="midcol">
		<div class="container">
			<div class="row">
			<p> Please select your Locum </p>
			<?php // print_r($listlocums); 
				foreach($listlocums as $locum){
			?> 
			<input type="checkbox" value="<?php echo $locum->id;?>"/><?php echo $locum->firstname.' '.$locum->lastname;?> <br>
				<?php
				}	
			?>  
					 
			</div>
		</div>
	</div>
<!--middle end	 here-->
