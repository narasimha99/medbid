<?php
 $templtpath= get_template_directory_uri(); 
 $url = esc_url( home_url( '/' ) );
?>
 	<!--top main navbar start here-->
		<nav class="navbar navbar-default navbar-fixed-top novborder">
	  <div class="topbar">
		<div class="container">
        <div class="navbar-header"> 
          <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
  <a href="#" class="navbar-brand mblogo"><img alt="MEDBID Logo" class="img-responsive" src="<?php echo $templtpath; ?>/images/medbidlogo.png" ></a>

        </div>
        <div class="navbar-collapse collapse" id="navbar">
          <ul class="nav navbar-nav navbar-right ulmargin">
			<li class="tnav tnav2"><a class="" href="<?php echo $url.'jobs/myjobs';?>">My Sessions</a></li>
			<li class="tnav tnav2"><a class="" href="<?php echo $url.'practices/billing';?>">Billing</a></li>
			<li class="tnav tnav2"><a class="" href="#<?php //echo $url.'doctors';?>"">My Midbid Bank</a></li>
			<li class="tnav tnav2"><a class="" href="<?php echo $url.'jobs/publicjobcreate';?>">Create a Job</a></li>
			<li class="tnav tnav2"><a class="" href="#<?php //echo $url.'doctors';?>">Messages</a></li>
			<li class="tnav tnav2"><a class="" href="<?php echo $url.'practices/youraccount';?>">Your Account</a></li>
 			<li class="tnav tnav2"> <a class="" href="<?php echo wp_logout_url(); ?>">Log out</a></li>
 	
 
          </ul>
        </div><!--/.nav-collapse -->
      </div>
	  </div>

    </nav>





          	 

