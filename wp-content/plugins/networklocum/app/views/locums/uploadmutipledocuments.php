<?php
$url = esc_url( home_url( '/' ));
$templtpath= get_template_directory_uri(); 
?>
<!--middle start here-->
<div class="midcol">
<div class="container">
<div class="row">
<div class="container mainWrapper mainWrapperMobile">
<div class="panel panel-default">
<div class="panel-heading">
 <?php $this->display_flash(); ?>
<span class="panel-title">
<ol class="breadcrumb">
 <li><a href="/account/welcome/">Welcome to medbid </a></li>
<li class="active">Clinical Documents</li>
</ol>
</span>
</div>
<div class="panel-body">
<div class="row">
<div class="xs-responsive-table">
		
<h4><strong>Documents you can upload in a single shot we will care for you.</strong></h4>
			
			 
<div class="xs-full-width-button action-buttons">
<p align="right"> <a class="btn btn-xs btn-default" style="text-align:right" href="<?php echo $url;?>locums/uploaddocuments/1/"><i class="icon-cloud-upload"></i>Upload</a>&nbsp;&nbsp;&nbsp;&nbsp; </p>
 </div>
<br>

 <hr></hr>
<p>
<center> <h4> <strong> OR </strong> </h4></center>
</p>	
<br>
<hr> </hr>
		<h4><strong>Documents you need to get approved</strong></h4>
			
		
			<p>Awaiting documents</p> <br>
			
			<table class="table table-hover table-striped">
			 <tbody>
				 
				<?php
				foreach($masterDocuments as $document) {
				?>
				<tr>
					<td data-label="Type"><?php echo $document->document_title;?>  </td>
					<td>&nbsp;</td>
					<td class="xs-full-width-button action-buttons">
						<?php $this->checkdocument( $document->id,$masterDocuments,1); ?>
 					</td>
				</tr>

				<?php if ($document->id == 5 ) { ?>
					<tr> <td colspan="3"> <h4><strong>Documents you need to become Gold Standard</strong></h4></td> </tr>
				<?php } ?>



				<?php if ($document->id == 18 ) { ?>
					<tr> <td colspan="3"> <h4><strong>Further documents</strong></h4></td> </tr>
				<?php } ?>


 				<?php } ?>
 			 			
			</tbody></table>
		</div>
	</div>
</div>

			</div>
			
		</div>

</div>
</div>
</div>
