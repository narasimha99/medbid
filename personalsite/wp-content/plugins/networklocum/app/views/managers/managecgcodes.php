<?php $url = esc_url( home_url( '/' )); ?>
<!--middle start here-->
 	<div class="midcol">
		<div class="container">
		<div class="row">
				<div class="col-md-12">  
					<div class="aligncenter">
						<h2 class="text1">Manage CGCodes</h2>
					</div>	
 
				<div id="login-overlay" class="modal-dialog logbody">
				  <div class="modal-content boxshadow">
					  
 <?php $this->display_flash(); ?>
							  <div class="modal-body logbody2 ">
						  <div class="row">
							  <div class="col-md-offset-3 col-md-6">
								  <div class="well">

 
<form name="managecgcodes" id="managecgcodes"  method="post" action="<?php echo $url;?>managers/managecgcodes" enctype="multipart/form-data">
 

<div class="form-group">
 <label for="username" class="control-label">Name</label>
<input type="text" class="form-control ff1" id="itname" name="data[cgcode][ccg_name]" required value="<?php if (isset($editccgcode)) echo $editccgcode->ccg_name;?>" title="Please enter cg code name" placeholder="Your enter your cgcode name"/>
<span class="errorspan" id="errspan_gmc_number"></span>
 </div>

	<input type="hidden" name="data[cgcode][id]" id="ID" value="<?php if (isset($editccgcode)) echo $editccgcode->id;?>"/>	
	  
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
        				<th>CGCode Name</th>
        				<th>Edit Records</th>
         			</tr>
        		</thead>
        		<tbody>
				<?php
				$i  =1;
				 foreach($ccgcodelist as $ccgcode) { 
 				?>

        			<tr>
        				<td data-title="Code"><?php echo $i;?></td>
        				<td data-title="Company"> <?php echo $ccgcode->ccg_name;?> </td>
        				
        				<td data-title="Change %" class="numeric">
					<a href="<?php echo $url.'managers/managecgcodes/'.$ccgcode->id;?>">Edit </a></td>
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
