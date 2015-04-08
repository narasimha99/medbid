<?php
 $templtpath= get_template_directory_uri(); 
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
          <a href="#" class="navbar-brand mblogo"><img alt="MEDBID Logo" class="img-responsive" src="<?php echo $templtpath; ?>/images/medbidlogo.png"></a>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
          <ul class="nav navbar-nav navbar-right ulmargin">
			<li class="tnav"><a class="" href="<?php echo $url.'doctors';?>">Doctors</a></li>
			<li class="tnav"><a class="" href="<?php echo $url;?>">Blog</a></li>
			<li class="tnav"><a class="" href="<?php echo $url.'practices';?>">Practices</a></li>

<?php  
global $wpdb;
if ( is_user_logged_in() ) {
    global $current_user;
//echo "<pre>";		print_r($user_info); echo "</pre>";
      $first_name = $current_user->user_firstname;
      $last_name = $current_user->last_name;

     // your code for logged in user 

?>
	<li class="tnav"> <a class="" href="<?php echo wp_logout_url(); ?>">(<?php echo $first_name.' '.$last_name;?>)Log out</a></li>
<?
  }
 else
 {
?>
			<li class="tnav"><a class="" href="<?php echo $url.'wp-login.php';?>">Login</a></li>
<?php
    // your code for logged out user 
  }
?>


            <!--<li class="dropdown">
              <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">Our Products <span class="caret"></span></a>
              <ul role="menu" class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
              </ul>
            </li>-->
            <li>
				<div class="text-center center-block sicons">
					<a href="#"><i id="social" class="fa fa-facebook"></i></a>
					<a href="#"><i id="social" class="fa fa-twitter"></i></a>
					<a href="#"><i id="social" class="fa fa-linkedin"></i></a>
					<a href="#"><i id="social" class="fa fa-youtube-play"></i></a>
				</div>
			</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
	  </div>

    </nav>
