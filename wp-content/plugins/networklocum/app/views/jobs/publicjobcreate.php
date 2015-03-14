<?php
$url = esc_url( home_url( '/' )); 
$templtpath= get_template_directory_uri(); 
?>
 		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 		<script type="text/javascript" src="<?php echo $templtpath;?>/js/jquery-1.11.1.js"></script>
		<script type="text/javascript" src="<?php echo $templtpath;?>/js/jquery-ui-1.11.1.js"></script>
 		<!-- loads mdp -->
		<script type="text/javascript" src="<?php echo $templtpath;?>/jquery-ui.multidatespicker.js"></script>
 		<!-- loads some utilities (not needed for your developments) -->
		<link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/css/mdp.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/css/prettify.css">
 		<script type="text/javascript" src="<?php echo $templtpath;?>/js/prettify.js"></script>
		<script type="text/javascript" src="<?php echo $templtpath;?>/js/lang-css.js"></script>
		<script type="text/javascript">
		$(function() {
			prettyPrint();
		});
		</script>

	<!--middle start here-->
 	<div class="midcol">
		<div class="container">
		<div class="row">
				<div class="col-md-12">  
					<div class="aligncenter">
						<h2 class="text1">Find locums in 3 simple steps</h2>
						<p>Completely free to post! Takes just 3 minutes! Collect applications just as fast!</p>
					</div>	
					<DIV> Looking to fill a job longer than 5 days? Give us a call on 0203 603 9242 </DIV>
			<div>


 
		<div id="datecalenderdiv">		
		 <input type="text" id="session_date_range"  size="200"/>
		<div  id="datepickerdiv" class="demo"> 
		<script> $('#datepickerdiv').multiDatesPicker({dateFormat: "yy-m-d",altField: '#session_date_range'}); </script>
 	 	</div>
		</div>

		<div style="clear:both;"></div>
		
 		<div>
Set times and rates
We are not an agency - set your own rates!

Select dates you need cover for above

		
		<div id="settimerates">
		</div>

		</div>		
	 
								  </div>
								  <p style="text-align:center;">By clicking 'Sign Up for Free' you are agreeing with our <a href="#" target="_blank">Terms</i></a> and <a href="#" target="_blank">Privacy Policy</a></p>
							  </div>
						  </div>
					  </div>
				  </div>
			  </div>
			</div>
		</div> 
				
				
			</div>
		</div>  
	</div>
	
	<!--middle end here-->

 
