<?php
session_start(); 
$templtpath= get_template_directory_uri(); 
$url = esc_url( home_url( '/' ) );
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo $templtpath;?>/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $templtpath;?>/js/bootstrap.min.js"></script>

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
<?php 
$user_id = get_current_user_id();
if ( $user_id == 0 ) {
	include("sitemenu.php"); 
}
else 
{   
  global $current_user;
 /// echo "<pre>";		print_r($current_user); echo "</pre>";

	if ( $current_user->roles[0] == 'administrator')
		include("adminmenu.php");
	elseif ( $current_user->roles[0] == 'locum')
		include("locummenu.php");
	elseif ( $current_user->roles[0] == 'practicer')
 		include("practicemenu.php");
}
 
 ?>
