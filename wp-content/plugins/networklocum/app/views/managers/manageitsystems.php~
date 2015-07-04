<?php $url = esc_url( home_url( '/' )); ?>
	<!--middle start here-->
 	<div class="midcol">
		<div class="container">
		<div class="row">
				<div class="col-md-12">  
					<div class="aligncenter">
						<h2 class="text1">Manage It Systems</h2>
					</div>	
 
				<div id="login-overlay" class="modal-dialog logbody">
				  <div class="modal-content boxshadow">
					  
 <?php $this->display_flash(); ?>
							  <div class="modal-body logbody2 ">
						  <div class="row">
							  <div class="col-md-offset-3 col-md-6">
								  <div class="well">

 
<form name="manageitsystems" id="manageitsystems"  method="post" action="<?php echo $url;?>managers/manageitsystems" enctype="multipart/form-data">
 

<div class="form-group">
 <label for="username" class="control-label">Name</label>
<input type="text" class="form-control ff1" id="itname" name="data[itsystem][itname]"  required value="<?php if (isset($edititsystem)) echo $edititsystem->itname;?>" title="Please enter It name" placeholder="Your enter your it name"/>
<span class="errorspan" id="errspan_gmc_number"></span>
 </div>

	<input type="hidden" name="data[itsystem][id]" id="ID" value="<?php if (isset($edititsystem)) echo $edititsystem->id;?>"/>	
	  
<div class="col-md-7">
<input type="submit" name="submit" value="update" />
</div> 
</form>

 

</div>
 
        <div id="no-more-tables">
            <table class="col-md-12 table-bordered table-striped table-condensed cf">
        		<thead class="cf">
        			<tr>
        				<th>S No</th>
        				<th>System Name</th>
        				<th>Edit Records</th>
         			</tr>
        		</thead>
        		 
			<tbody>
				<?php
				$i  =1;
	 foreach($itsystemlist as $itsystem) { ?>

        			<tr>
        				<td data-title="Code"><?php echo $i;?></td>
        				<td data-title="Company"> <?php echo $itsystem->itname;?> </td>
        				
        				<td data-title="Change %" class="numeric">
					<a href="<?php echo $url.'managers/manageitsystems/'.$itsystem->id;?>">Edit </a></td>
   
</tr>
<?php
$i = $i+1;
 } 
?>
        		</tbody>
        	</table>
 					</div>
					
 	
 
								  </div>
								 
							  </div>
						  </div>
					  </div>
				  </div>
			  </div>
			</div>
		</div> 
	<center> <?php echo $this->pagination(); ?> </center>			
				
			</div>
		</div>  
	</div>
	
	<!--middle end here-->
