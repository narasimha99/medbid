<?php
$url = esc_url( home_url( '/' ));
$templtpath= get_template_directory_uri(); 
?>
<!--middle start here-->
	<div class="midcol">
		<div class="dashbg">
			<div class="container">
				<?php 
				if ( $locumObject[0]->verifiedlocum == 0  || $locumObject[0]->verifiedlocum == 2 ) {
				?>
				<div class="row">
				<div style="padding:15px; border:1px solid #cdcdcd; background-color:#fafafa;">Your profile is not yet approved by our team, before apply to any job it should be valid.. <a href="<?php echo  $url.'locums/editprofile/'; ?>">more...</a></div>
 				</div>	
				<?php } ?>

				<div class="row">
					<div class="col-md-6">
						<div class="dtextpad">
						 <h2> Welcome to Docum </h2>
						 <hr/>
						 <p>Before you can apply for jobs you must upload the following documents to prove your locum status. You only have to do this once, and doing so opens a world of new job opportunities. Once uploaded we aim to verify these within 12 hours.</p>
						 <hr/>
						  <div class="row">
						     <div class="col-md-6">
							   <div class="disdate_up">
								<h3> <?php $this->checkdocument(3,$masterDocuments,0);  ?> </h3>
								</div>
							 </div>
							 <div class="col-md-6">
							   <div class="disdate_up">
									<h3> <?php $this->checkdocument(1,$masterDocuments,0); ?> </h3>
								</div>
							 </div>
						  </div>
						  <div class="row">
						     <div class="col-md-6">
							   <div class="disdate_up">
								<h3> <?php $this->checkdocument(2,$masterDocuments,0); ?> </h3>
							</div>
							 </div>
						     <div class="col-md-6">
							   <div class="disdate_up">
									<h3> <?php $this->checkdocument(5,$masterDocuments,0); ?> </h3>
								</div>
							 </div>
						  </div>
						 <div class="row">
						  <div class="col-md-6">
							   <div class="disdate_up">
								<h3> <?php $this->checkdocument(4,$masterDocuments,0); ?> </h3>
								</div>
							 </div>
							  <div class="col-md-6">
							   <div class="disdate_up">
							<h3><a href="<?php echo  $url.'uploadprofileimage.php'; ?>">Profile Photo </a> </h3>
								</div>	
							 </div>
						 </div>
						</div>	
					</div>
					<div class="col-md-6">
						  <div style="text-align:left; margin-top:20px;">
			 			    <h4>You Still have to</h4>
						 
							
					<p style="padding:5px;"><a href="<?php echo  $url.'locums/uploadmutipledocuments/'; ?>">Upload more documents</a></p>
 							<p style="padding:5px;"><a href="<?php echo  $url.'uploadprofileimage.php'; ?>">Upload Photo</a></p>
							<p style="padding:5px;"><a href="<?php echo  $url.'locums/editprofile/'; ?>">Complete your profile</a></p>
							<p style="padding:5px;"><a href="<?php echo  $url.'locums/upgradeyourmembership/'; ?>">Upgrade your membership</a></p>
							
						  </div>
					</div>
				</div>
			</div>
		</div>
 		
	</div>
	
	<!--middle end here-->
