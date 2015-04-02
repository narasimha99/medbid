<?php
$templtpath= get_template_directory_uri(); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Medbid</title>

    <!-- Bootstrap -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
	
	<link href="<?php echo bloginfo( 'template_url' ).'/css/medi.css'?>" rel="stylesheet">
	<link href="<?php echo bloginfo( 'template_url' ).'/css/font-awesome.min.css'?>" rel="stylesheet">
	 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
<!-- facebox -->
 <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/facebox.js"></script>
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $templtpath;?>/js/bootstrap.min.js"></script>

 <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/facebox.css" />
<!-- facebox -->
 <script type="text/javascript">
var myJSONObject = {"JSINFO": [
        {"SITE_ROOT_VAR": "<?php echo esc_url( home_url( '/' ) ); ?>", "SERVER_ROOT_VAR": ""}
    ]
}; 
 
//  jQuery(function() {
 //  jQuery( "#tabs" ).tabs();
//	jQuery( "#subtabs" ).tabs();
//  });
</script>
<!-- validate.js -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/validate.js"></script>
<!-- validate.js -->

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php $url = esc_url( home_url( '/' ) ); ?>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such

	 * as styles, scripts, and meta tags.
	 */
//wp_head();
$templtpath= get_template_directory_uri(); 
?>
</head>

  <body>


  
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
