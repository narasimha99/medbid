<?php
 $templtpath= get_template_directory_uri(); 
?>

<script>

function deletesession(k){
		 
		var purl = SITE_ROOT_JS+'jobs/deletejobsession/'+k;
		$.post( purl, function( data ) {
 				//window.location.reload();
			window.location.href=window.location.href;
		});
	 }	
jQuery( document ).ready(function() {
 $(".session_date").datepicker(
	{
	dateFormat: 'yy-mm-dd',
	minDate: 0,
	numberOfMonths: 2,
	showOn: "button",
	buttonImage: "<?php echo $templtpath; ?>/images/calendar.png",
	buttonImageOnly: true,
	buttonText: "Select date"
 }
);
   
});
</script>
 
  <link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/timepicker/jquery.timepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/timepicker/lib/bootstrap-datepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/timepicker/lib/site.css" />

 <script type="text/javascript" src="<?php echo $templtpath;?>/timepicker/jquery.timepicker.js"></script>	
 <script type="text/javascript" src="<?php echo $templtpath;?>/timepicker/jquery.datepair.js"></script>

 <div id="settimerates" class="table-responsive">
<?php
//echo "<pre>"; print_r($_POST); echo "</pre>";
 
 
if( isset($tablcnt))
$i=$tablcnt;
else
$i=1;

 $sessiondate  = $jobdetails->session_date_range;
?>

<div id="<?php echo 'DIVsessionday'.$i;?>" class="table-responsive" style="border-style: solid; border-color:#00CED1;">

<table id="<?php echo 'TABLEsessionday'.$i;?>" class="table" >

<tr>
<td colspan="2"><input type="text"  class="session_date" id="<?php echo 'session_date_'.$i;?>" name="session_date[<?php echo $i;?>]" value="<?php echo $sessiondate;?>" placeholder='pick your date'/>  <span id="errspan_session_date_range" class="errorspan"></span> </td>
<td colspan="2"><input type='button' name="add" id="<?php echo 'add'.$i;?>" value="add more sessions" onclick="addsession(<?php echo $i;?>);"/> </td>
</tr>

 
<tr>
<th>Sart Time</th>
<th>End Time</th>
<th>Hourly rate £</th>
<th>Pay to locum </th>
<th>Medbid Locum fees</th>
<th>&nbsp;</th>
</tr>
 

<tbody>		
 
<?php
//echo count($_POST['session_starttime']) ;
//echo "<pre>"; print_r($jobsessions);

$i=1;
$j=1;
	foreach($jobsessions as $jobsession) 
	{
 	
?>
<tr  id="sessiontime">
<td>
<input type="text"  class="time start" name="session_starttime[<?php echo $i;?>][<?php echo $j;?>]" id="<?php echo 'session_starttime_'.$i.'_'.$j;?>" value="<?php echo date('H:ma', strtotime($jobsession->session_starttime));?>"  placeholder='eg: 09:00'/>	 </td>
 
<td>
<input type="text" class="time end" name="session_endtime[<?php echo $i;?>][<?php echo $j;?>]" id="<?php echo 'session_endtime_'.$i.'_'.$j;?>"  value="<?php echo date('H:ma', strtotime($jobsession->session_endtime)); ?>" placeholder='eg: 17:00'  />  </td>


<td>
<input type="text" name="hourlyrate[<?php echo $i;?>][<?php echo $j;?>]" id="<?php echo 'hourlyrate_'.$i.'_'.$j;?>" myid="<?php echo '_'.$i.'_'.$j;?>" value="<?php echo $jobsession->hourlyrate;?>"   onblur="gethourlyrate(<?php echo $i;?>,<?php echo $j;?>)"  placeholder='eg: 80.00' />
</td>


<td> <input type="text" readonly name="paytolocum[<?php echo $i;?>][<?php echo $j;?>]" id="<?php echo 'paytolocum_'.$i.'_1';?>" value="<?php echo $jobsession->paytolocum;?>"  /> </td>


<td> <input type="text" readonly name="medbidfee[<?php echo $i;?>][<?php echo $j;?>]" id="<?php echo 'medbidfee_'.$i.'_1';?>"
 value="<?php echo $jobsession->medbidfee;?>"  /> </td>



<td> 
<input type='button' class='deltimesession' name='delete'  class='deltimesession' id="1" value='delete' onclick="deletesession(<?php echo $jobsession->id;?>);"  /> 
</td> 
<?php 
if (!isset($jobsession->id))
	$jobsession->id = 0;
?>
<input type="hidden" name="jobsession_id[]" value="<?php echo $jobsession->id;?>"/>



</tr>

<?php
$j = $j + 1;
}
?> 
 </tbody>
</table>




</div>
	
<?php
$i= $i + 1;
// } 
//}
?>
</div>

            <script>
         	$('#sessiontime .time').timepicker({
                    'showDuration': true,
                    'timeFormat': 'H:ia'
                });

		$('#sessiontime').datepair();
	

            </script>
