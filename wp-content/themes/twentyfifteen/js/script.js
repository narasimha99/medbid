jQuery(document).ready(createUploader);
	jQuery(document).ready(function(){
		var thumb = jQuery(".thumbnails");
		       
		jQuery('#thumbnail').imgAreaSelect({ aspectRatio: '1:1', onSelectChange: preview});
		
		jQuery('#save_thumb').click(function() {
			var x1 = jQuery('#x1').val();
			var y1 = jQuery('#y1').val();
			var x2 = jQuery('#x2').val();
			var y2 = jQuery('#y2').val();
			var w = jQuery('#w').val();
			var h = jQuery('#h').val();
			if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
				alert("You must make a selection first");
				return false;
			}
			else{
				jQuery.ajax({
					type : 'POST',
					url: "crop_script.php",
					data: "filename="+jQuery('#filename').val()+"&x1="+x1+"&x2="+x2+"&y1="+y1+"&y2="+y2+"&w="+w+"&h="+h,
					success: function(data){
						thumb.attr('src', 'documpropic/thumb_'+jQuery('#filename').val());
						thumb.addClass('thumbnail');
						jQuery('#thumbnail').imgAreaSelect({ hide: true, x1: 0, y1: 0, x2: 0, y2: 0 });
						// let's clear the modal
						jQuery('#thumbnail').attr('src', '');
						jQuery('#crop-section').hide();
						jQuery('#uploader-section').show();
						jQuery('#thumb_preview').attr('src', '');
						jQuery('#filename').attr('value', '');
						jQuery("#customSuccessDIV").html(data);
						//alert(data);
					}
				});
				
				return true;
			}
		});
	});
	
    function createUploader(){ 
    	var button = jQuery('#upload');           
        var uploader = new qq.FileUploaderBasic({
            button: document.getElementById('file-uploader'),
            action: 'upload.php',
            allowedExtensions: ['jpg', 'gif', 'png', 'jpeg'],
            onSubmit: function(id, fileName) {
				// change button text, when user selects file			
				button.text('Uploading');
				// Uploding -> Uploading. -> Uploading...
				interval = window.setInterval(function(){
					var text = button.text();
					if (text.length < 13){
						button.text(text + '.');					
					} else {
						button.text('Uploading');				
					}
				}, 200);
			},
            onComplete: function(id, fileName, responseJSON){
            	button.text('Change profile picture');
				window.clearInterval(interval);
				
            	if(responseJSON['success'])
            	{
            		load_original(responseJSON['filename']);
					}},
                debug: true
            });           
    }
        
    function load_original(filename){
    	jQuery('#thumbnail').attr('src', "documpropic/"+filename);
		jQuery('#thumb_preview').attr('src', "documpropic/"+filename);
		jQuery('#filename').attr('value', filename);
		if ( jQuery.browser.msie ) {
			jQuery('#thumb_preview_holder').remove();
		}
		jQuery('#crop-section').show();
		jQuery('#uploader-section').hide();
	}

	function preview(img, selection) { 
		var mythumb = jQuery('#thumbnail');
		var scaleX = 156/selection.width; 
		var scaleY = 156/selection.height; 
		
		jQuery('#thumbnail + div > img').css({ 
			width: Math.round(scaleX * mythumb.outerWidth() ) + 'px', 
			height: Math.round(scaleY * mythumb.outerHeight()) + 'px',
			marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
			marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
		});
		jQuery('#x1').val(selection.x1);
		jQuery('#y1').val(selection.y1);
		jQuery('#x2').val(selection.x2);
		jQuery('#y2').val(selection.y2);
		jQuery('#w').val(selection.width);
		jQuery('#h').val(selection.height);
	}
