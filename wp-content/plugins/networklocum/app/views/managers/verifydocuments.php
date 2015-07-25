<?php
$url = esc_url( home_url( '/' ));
$templtpath= get_template_directory_uri(); 
?>
<!--middle start here-->
	<div class="midcol">
		<div class="container">
		<div class="row">
		 
		<center> <h2 class="text1">Verify Uploaded documents</h2> </center>


<form name="locumsignup" id="locumsignup"  autocomplete="off" method="post"
 action="<?php echo $url.'managers/verifydocuments/'.$locum_id;?>"    onsubmit="javascript:return validatevarifydocuments();" enctype="multipart/form-data">

  	<div id="no-more-tables">


            			<table class="table table-hover table-striped">
			 <tbody>
				 <tr>
					<td><strong>Document Name</strong> </td>
					<td> <strong> View documents </strong> </td>
					<td> <strong>Document status</strong></td>
				 </tr>
			
				 <tr>
					<td colspan="3">&nbsp;</td>
				 </tr>
				<?php
				foreach($masterDocuments as $document) {
				?>
				<tr>
					<td><?php echo $document->document_title;?>  </td>
 					
					<?php
						$docFilename =  $document->document_filename;
						$docUrl = $locumFiles->$docFilename;
					$downloadUrl = $url."verification_counter/".$locum_id."/".$docUrl;
	
					// $locumDocuments[0]->$docFilename;
			
					if( $locumDocuments[0]->$docFilename == 0 ) {
					 ?>
					<td>
						Not uploaded Yet.
					</td>
					<td>&nbsp;
						
					</td>
					<?php 
					}
					?>
					<?php

					if( $locumDocuments[0]->$docFilename == 1 ) { ?>
					<td>
						<a href="<?php echo $downloadUrl;?>"  target="_blank"> view document</a>
					</td>
					<td>
						<input type="radio" name="documentstatus[<?php echo $document->id;?>]" value="2"/> Accept 
						<input type="radio" name="documentstatus[<?php echo $document->id;?>]" value="3"/> Reject 
					</td>
					<?php 
					}
					?>
				 
					<?php if( $locumDocuments[0]->$docFilename == 2 ) { ?>
					<td>
						<a href="<?php echo $downloadUrl;?>"  target="_blank"> view document</a>
					</td>
					<td>
						 Accepted
  					</td>
					<?php 
					}
					?>


	 
					<?php if( $locumDocuments[0]->$docFilename == 3 ) { ?>
					<td>
						<a href="<?php echo $downloadUrl;?>"  target="_blank"> view document</a>
					</td>
					<td>
						 Rejected
  					</td>
					<?php 
					}
					?>
 				</tr>
  
 				<?php } ?>
  			</tbody></table>

	<br>
		<center> <input type="submit" name="submit" value="submit"/> </center>
	<br>
	
	</div>
		</form>
</div>
</div>
</div>

