<?php
 $templtpath= get_template_directory_uri(); 
?>
 
  <link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/timepicker/jquery.timepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/timepicker/lib/bootstrap-datepicker.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $templtpath;?>/timepicker/lib/site.css" />
	
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo $templtpath;?>/timepicker/jquery.timepicker.js"></script>
  <script type="text/javascript" src="<?php echo $templtpath;?>/timepicker/lib/bootstrap-datepicker.js"></script>


 <script type="text/javascript" src="<?php echo $templtpath;?>/timepicker/jquery.datepair.js"></script>
 <script type="text/javascript" src="<?php echo $templtpath;?>/timepicker/datepair.js"></script>

  <script src="http://jonthornton.github.io/Datepair.js/dist/jquery.datepair.js"></script>
  <script src="http://jonthornton.github.io/Datepair.js/dist/datepair.js"></script>

  <script type="text/javascript" src="<?php echo $templtpath;?>/timepicker/lib/site.js"></script>

<br/>
<br/>
<br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
     <p id="datepairExample">
		    <input type="text" class="time start" /> to
                    <input type="text" class="time end" />
                    
     </p>
          

            <script>
                $('#datepairExample .time').timepicker({
                    'showDuration': true,
                    'timeFormat': 'g:ia'
                });

 
                $('#datepairExample').datepair();
            </script> 
<?php 
						$user_id = get_current_user_id();
						if ($user_id == 'nousecode') {
					
					?>

					<div class="bitbox1">
						<div class="aligncenter">
							<h2><i class="fa fa-list seticon"></i>Tell us about your practice</h2>
							<h3><b>Save up to 50%</b> with Medbid.</h3>
						</div>
					 
					  <div class="form-group">
						  <label for="password" class="control-label">Practice code</label><br>
						  <input type="text" class="form-control ff1" id="practice_code" name="practice_code" value="<?php echo $_POST['practice_code'];?>"   title="" placeholder="Practice code">
					
						  <span id="errspan_practice_code" class="errorspan"></span>
					  </div>
					  <div class="form-group">
						  <label for="password" class="control-label">Practice name</label><br>
						  <input type="text" class="form-control ff1" id="practicename" name="practicename" value="<?php echo $_POST['practicename'];?>"  title="" placeholder="Practice name">
						   <span id="errspan_practicename" class="errorspan"></span>
					  </div>
					  <div class="form-group">
						  <label for="password" class="control-label">First name</label><br>
						  <input type="text" class="form-control ff1" id="firstname" name="firstname"  value="<?php echo $_POST['firstname'];?>" title="" placeholder="First name">
						   <span id="errspan_firstname" class="errorspan"></span>
					  </div>
					  <div class="form-group">
						  <label for="password" class="control-label">Last name</label><br>
						  <input type="text" class="form-control ff1" id="lastname" name="lastname" value="<?php echo $_POST['lastname'];?>"  title="" placeholder="Last name">
						  <span id="errspan_lastname" class="errorspan"></span>
					  </div>
					  <div class="form-group">
						  <label for="password" class="control-label">Email</label><br>
						  <input type="text" class="form-control ff1" id="email" name="email" value="<?php echo $_POST['email'];?>" placeholder="me@example.com"/>
						  <span id="errspan_email" class="errorspan"></span>
					  </div>
					  <div class="form-group">
						  <label for="password" class="control-label">Phone number</label><br>
						  <input type="text" class="form-control ff1" id="phone_number" name="phone_number" value="<?php echo $_POST['phone_number'];?>"   title="" placeholder="XXXXXXXXXXX">
						   <span id="errspan_phone_number" class="errorspan"></span>
					  </div>
					 
					</div>
					<?php } ?>
					<p style="text-align:center;">I agree with the <a href="#" target="_blank">Terms and Conditions</a>  and <a href="#" target="_blank">Privacy Policy</a>  of Medbid</a></p>
					
					<br>
					  <input type="hidden" id="savejob" name="savejob" value=""/>
					 <div align="center">
						
							<button class="btn btn-info sbtn" id="submit5" >Post Job</button>
						</div>
					
					
			</div>
		</div>  

