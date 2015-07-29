<?php
$url = esc_url( home_url( '/' ));
$templtpath= get_template_directory_uri(); 
?>
<!--middle start here-->
<div class="midcol">
<div class="container">
<div class="row">
<div class="col-md-12">

 
	<title>User profile image upload and crop - docum.com</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">	 zxllgj12345
 	

	<link href="<?php echo $templtpath;?>/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo $templtpath;?>/css/custom.css" rel="stylesheet">
	<script src="<?php echo $templtpath;?>/js/jquery-pack.js" type="text/javascript"></script>
	<script src="<?php echo $templtpath;?>/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo $templtpath;?>/js/bootstrap.js" type="text/javascript"></script>
	<!-- required plugin for ajax file upload -->
	<script src="<?php echo $templtpath;?>/js/fileuploader.js" type="text/javascript"></script>
	<!-- resizing image -->
		<script src="<?php echo $templtpath;?>/js/jquery.imgareaselect.min.js" type="text/javascript"></script>	
	<script src="<?php echo $templtpath;?>/js/script.js" type="text/javascript"></script>
   
    <div class="container">

             <div class="jumbotron">
	  <h2>User profile image upload and crop</h2>
	  <div class="row">
        <div class="col-lg-6" id="crop-section" style="display:none">
          <img src="" id="thumbnail" alt="Create Thumbnail" />
			<div id="thumb_preview_holder">					
						<img src=""  alt="Thumbnail Preview" id="thumb_preview" />
			</div>
			<div>
						<input type="hidden" name="filename" value="" id="filename" />
						<input type="hidden" name="x1" value="" id="x1" />
						<input type="hidden" name="y1" value="" id="y1" />
						<input type="hidden" name="x2" value="" id="x2" />
						<input type="hidden" name="y2" value="" id="y2" />
						<input type="hidden" name="w" value="" id="w" />
						<input type="hidden" name="h" value="" id="h" /><br>
						
						<input type="submit" class="btn btn-primary button" name="upload_thumbnail" value="Save Thumbnail" id="save_thumb" />
				</div>

        </div>


        <div class="col-lg-6" id="uploader-section">
          <div class="product_image">	
					<img src="" class="thumbnails" />
				</div>
				<div id="file-uploader">
				<button id="upload" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp;<span class="upload">Change profile picture</span></button>


				<noscript>			
						<p>Please enable JavaScript to use file uploader.</p>
						<!-- or put I could put an upload form here -->
				</noscript> 
			</div>
		<div id="customSuccessDIV"> &nbsp; </div>

        </div>
      </div>
    </div>
  
</div>
</div>
</div>	
</div>
