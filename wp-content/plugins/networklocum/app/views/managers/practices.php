<?php
$url = esc_url( home_url( '/' ));
$templtpath= get_template_directory_uri(); 
?>
<!--middle start here-->
	<div class="midcol">
		<div class="container">
		<div class="row">
		
				<div class="aligncenter">
					<h2 class="text1">Manage practices</h2>
					
				</div>
				
				<div class="col-md-12">
					
					<div>
						<div class="container">
    <div class="row">
        <div id="no-more-tables">
            <table class="col-md-12 table-bordered table-striped table-condensed cf">
        		<thead class="cf">
        			<tr>
        				<th>Firstname</th>
        				<th>Lastname</th>	
					<th>Email</th>
					<th>Contact number</th>
         				<th>practice code</th>
					<th>Practice name</th>
         				<th class="numeric"></th>
        			</tr>
        		</thead>
        		<tbody>
			<?php foreach($practiceslist as $practice) { ?>
        			<tr>
					<td data-title="Code"><?php echo $practice->firstname;?></td>
					<td data-title="Code"><?php echo $practice->lastname;?></td>
					<td data-title="Code"><?php echo $practice->email;?></td>
					<td data-title="Code"><?php echo $practice->phone_number;?></td>
					<td data-title="Code"><?php echo $practice->practice_code;?></td>
					<td data-title="Code"><?php echo $practice->practicename;?></td>
          				<td data-title="Change %" class="numeric"><a href="<?php echo $url.'practices/viewpracticer/'.$practice->id; ?>" class="btn btn-primary aplbtn" title="Verify practicer">Verify</a></td>
        			</tr>
			<?php } ?>
        			 
        		</tbody>
        	</table>
        </div>
    </div>

</div>
					</div>
					
					
					
			</div>
		</div>  
	</div>
	</div>
	
	<!--middle end here-->
	
