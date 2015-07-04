<?php
$url = esc_url( home_url( '/' ));
$templtpath= get_template_directory_uri(); 
?>
<!--middle start here-->
	<div class="midcol">
		<div class="container">
		<div class="row">
		 
		<center> <h2 class="text1">Verify Uploaded documents</h2> </center>


<form name="locumsignup" id="locumsignup"  autocomplete="off" method="post" action="<?php echo $url;?>managers/verifydocuments"    onsubmit="javascript:return validatevarifydocuments();" enctype="multipart/form-data">

  	<div id="no-more-tables">


            			<table class="table table-hover table-striped">
			 <tbody>
				 <tr>
					<td><strong>Document Name</strong> </td>
					<td> <strong> View document </strong> </td>
					<td>  <strong>Document status</strong></td>
				 </tr>
			
				 <tr>
					<td colspan="3">&nbsp;</td>
				 </tr>
				<?php
				foreach($masterDocuments as $document) {
				?>
				<tr>
					<td><?php echo $document->document_title;?>  </td>
 					<td>
						<a href="#"> view documents</a>
  					</td>
					<td>
 						<input type="radio" name="group<?php echo $document->id;?>" value="accept"/> Accept 
 						<input type="radio" name="group<?php echo $document->id;?>" value="reject"/> Reject 
    					</td>
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

