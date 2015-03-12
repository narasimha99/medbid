<?php
$url = esc_url( home_url( '/' )); 
$templtpath= get_template_directory_uri(); 
?>
 		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 		<!-- loads jquery and jquery ui -->
		<!-- -->
		<script type="text/javascript" src="<?php echo $templtpath;?>/js/jquery-1.11.1.js"></script>
		<script type="text/javascript" src="<?php echo $templtpath;?>/js/jquery-ui-1.11.1.js"></script>
	 	
		<!-- loads mdp -->
		<script type="text/javascript" src="<?php echo $templtpath;?>/jquery-ui.multidatespicker.js"></script>
		
		<!-- mdp demo code -->
		<script type="text/javascript">
	
		
		<!--
			var latestMDPver = $.ui.multiDatesPicker.version;
			var lastMDPupdate = '2014-09-19';
			
			$(function() {
				// Version //
				//$('title').append(' v' + latestMDPver);
				$('.mdp-version').text('v' + latestMDPver);
				$('#mdp-title').attr('title', 'last update: ' + lastMDPupdate);
				
				// Documentation //
				$('i:contains(type)').attr('title', '[Optional] accepted values are: "allowed" [default]; "disabled".');
				$('i:contains(format)').attr('title', '[Optional] accepted values are: "string" [default]; "object".');
				$('#how-to h4').each(function () {
					var a = $(this).closest('li').attr('id');
					$(this).wrap('<'+'a href="#'+a+'"></'+'a>');
				});
				$('#demos .demo').each(function () {
					var id = $(this).find('.box').attr('id') + '-demo';
					$(this).attr('id', id)
						.find('h3').wrapInner('<'+'a href="#'+id+'"></'+'a>');
				});
				
				// Run Demos
				$('.demo .code').each(function() {
					eval($(this).attr('title','NEW: edit this code and test it!').text());
					this.contentEditable = true;
				}).focus(function() {
					if(!$(this).next().hasClass('test'))
						$(this)
							.after('<button class="test">test</button>')
							.next('.test').click(function() {
								$(this).closest('.demo').find('.hasDatepicker').multiDatesPicker('destroy');
								eval($(this).prev().text());
								$(this).remove();
							});
				});
			});
		// -->
		</script>
		
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
		
 
			
			 
<?php $url = esc_url( home_url( '/' )); ?>

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



		
 		<script type="text/javascript">
		 
		$( document ).ready(function() {
		//console.log( "ready!" );
		});



		function deletedate(p){
			jQuery('#DIVsessionday'+p).remove();			
		}
 		
		function deltimesession(element){
	  		 $(element).closest('tr').remove();
	 	}

 		function addsession(p){

			var rcount = jQuery('#TABLEsessionday'+p+' tr').length;
			 // alert(rcount);
				//$("#yourTableId tr").length

 			   //	 rcount = rcount + 1;	
  			var k = " <tr class='sessiontime' id='times"+rcount+"'> <td> Session "+rcount+" Enter session times using 24 hour notation (eg. 10:00, 18:00).  <br/> <span> Time</span> <input type='text' name='session_starttime[]' placeholder='eg: 09:00'/> <span>till</span> <input type='text' name='session_endtime[]'  placeholder='eg: 17:00' /> <span>Hourly rate £</span> <input type='text' name='hourlyrate[]'  placeholder='eg: 80.00'/> <input type='button' class='deltimesession' id='"+rcount+"' onclick='deltimesession(this)'  name='delete' value='delete'/> </td> </tr>"; 
			//alert(k);
			jQuery("#TABLEsessionday"+p).append(k);
		}
		
		function calculatelocumrate(){

		 var start_actual_time  =  "01/17/2012 11:20";
    		 var end_actual_time    =  "01/18/2012 12:25";

		    start_actual_time = new Date(start_actual_time);
		    end_actual_time = new Date(end_actual_time);

		    var diff = end_actual_time - start_actual_time;
		    var diffSeconds = diff/1000;
    		   var HH = Math.floor(diffSeconds/3600);
		    var MM = Math.floor(diffSeconds%3600)/60;

		    var formatted = ((HH < 10)?("0" + HH):HH) + ":" + ((MM < 10)?("0" + MM):MM);
		    alert(formatted);
		}
 			//calculatelocumrate();

		</script>
		
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

<script>
$( document ).ready(function() {
 
});
function generatesessionmaster(){
		alert('hi genaratemasters');
		var dateranges = jQuery("#session_date_range").val();
		
		
//			alert(dateranges);
	var purl = "<?php echo $url.'jobs/settimerates/';?>";

// alert(purl);		
 

	$.get(purl,  {
        name: dateranges,
        city: "Duckburg"
    },function( data ) {
			$("#settimerates").html( data );
	});
		
  return true;
}

function showData(){
 return true;
}
</script>
