<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Digital Wall
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="refresh" content="1800">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/layouts/phidelis.css">
<?php wp_head(); ?>
<script src="<?php echo plugins_url().'\RoyalSlider\lib\royalslider\jquery.royalslider.min.js';?>" type="text/javascript"></script>
<script src="<?php echo plugins_url().'\RoyalSlider\lib\royalslider\jquery.easing-1.3.js';?>" type="text/javascript"></script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<div id="content" class="exibicao">
<?php 


?>