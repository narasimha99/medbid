<?php
$url = esc_url( home_url( '/' ));
$templtpath= get_template_directory_uri(); 
?>
<!--middle start here-->
	<div class="midcol">
		<div class="container">
		<div class="row">
		
				<div class="aligncenter">
					<h2 class="text1">Manage locums</h2>
					
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
         				<th>Gc number</th>
         				<th class="numeric"></th>
        			</tr>
        		</thead>
        		<tbody>
			<?php foreach($locumlist as $locum) {?>
        			<tr>
					<td data-title="Code"><?php echo $locum->firstname;?></td>
					<td data-title="Code"><?php echo $locum->lastname;?></td>
					<td data-title="Code"><?php echo $locum->email;?></td>
					<td data-title="Code"><?php echo $locum->phone_number;?></td>
					<td data-title="Code"><?php echo $locum->gmc_number;?></td>
          				<td data-title="Change %" class="numeric">

					<?php
					if( $locum->verifiedlocum == 0) { ?>
<a href="<?php echo $url.'/managers/verifylocums/'.$locum->id;?>" class="btn btn-primary aplbtn" title="verify locums">verify locum</a>
					<?php }
						 if ( $locum->verifiedlocum == 1) 
						 	echo "Varified";
						 if ( $locum->verifiedlocum == 2) 
							echo "Rejected";
					 ?>
			
			 
				</td>
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
	
