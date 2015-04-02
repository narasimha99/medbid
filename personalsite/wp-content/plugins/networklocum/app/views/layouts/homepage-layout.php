<?php


//echo "<pre>";
//print_r($_SERVER);
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<?php include("header.php"); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper"><?php include('userinfo.php'); ?>

    <div id="colophon"></div>
<div id="maincontent">
<div class="page venues-show">
<?php $this->display_flash(); ?>
<?php $this->render_main_view(); ?>
</div>
</div>
 <div id="footerpnl">&nbsp;</div>
</div>

<?php get_footer(); ?>