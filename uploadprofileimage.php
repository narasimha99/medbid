<!DOCTYPE html>
<html lang="en">
  <head>
	<title>User profile image upload and crop - docum.com</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">	
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<script src="js/jquery-pack.js" type="text/javascript"></script>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<!-- required plugin for ajax file upload -->
	<script src="js/fileuploader.js" type="text/javascript"></script>
	<!-- resizing image -->
	<script src="js/jquery.imgareaselect.min.js" type="text/javascript"></script>	
	<script src="js/script.js" type="text/javascript"></script>
  </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation" style="background-color:##337ab7 !important">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" >     <img alt="MEDBID Logo" class="img-responsive" src="http://64.37.52.189/~hashtagf/medbid/wp-content/themes/twentyfifteen/images/medbidlogo.png">
</a>
        </div>
       </div>
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
  </body>
</html>
