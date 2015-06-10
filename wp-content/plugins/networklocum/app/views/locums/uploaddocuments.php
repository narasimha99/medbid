<?php
$url = esc_url( home_url( '/' ));
$templtpath= get_template_directory_uri(); 
?>

<div class="midcol">
		<div class="dashbg" style="margin-top: -48px;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="dashmid">
							<div class="dashmidh">
								<h2>upload documents</h2>
							</div>

 <?php $this->display_flash(); ?>
 
<div class="row-fluid">
	<div>
		<h1>How to upload documents</h1>
		<ol>
			<li>Click "Choose file" button</li>
			<li>Choose file to upload</li>
			<li>Click "Upload documents" button</li>
		</ol>
	</div>
	<p>
		Please upload as many as you can...don't worry you can come back later.
	</p>
	<div>
	<form class="form-horizontal" enctype="multipart/form-data" style="border:1px sold green" action="<?php echo $url;?>locums/uploaddocuments"  method="post">
		<input type="text" name="sId" value="<?php echo $this->params['id'];?>"/>
  
<input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">

<div class="panel-body">
	<div class="row">
		<div class="xs-responsive-table">
			<h4><strong>Documents you need to get approved</strong></h4>
			
			<p>Awaiting documents</p>
			
			<table class="table table-hover table-striped">
				
<?php
$lable_array = array("","Medical Indemnity","Certificate of Completion of Training","cv","Criminal Records Bureau Check","Passport's photo page or drivers license","Diptheria","Poliomyelitis","Basic Life Support Certificate","Tuberculosis","Safeguarding Children","My References","Safeguarding Adults","Current Performers List","Hepatitis B","Varicella (Chicken Pox)","Rubella (German Measles)","Information about your last appraisal","Immunisation History","Information Governance Certificates","Right to work in UK","RCGP 1/2 in Substance Misuse","MMR (Mumps Measles Rubella)","My Terms and Conditions","GMC Certificate");
$sId =  $this->params['id'];
?>
			<?php if (isset($this->params['id'])) { ?>
 				<tr> 
					<td data-label="Type"><?php echo $lable_array[$sId]; ?></td>
  					<td class="xs-full-width-button action-buttons">
						<div class="hidden-xs">
				 			<input type="file" name="<?php echo $documentList[$sId];?>" id="<?php echo $documentList[$sId];?>" />
						</div>
					 </td>,"
				</tr>
				<?php } ?>
 
  	
				 
				
		  
		 	</table>
		  
		</div>
				</div>
			</div>
		</form>
		  
	</div>
	</div>
	</div>
		  
	</div>
	</div>
		</div>
				</div>
  
	<!--middle end here-->
