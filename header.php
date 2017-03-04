<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package sparkling
 */
?><!doctype html>
	<!--[if !IE]>
	<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 7 ]>
	<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 8 ]>
	<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 9 ]>
	<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
	<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo bloginfo('template_url'); ?>/img/favicon.ico" type="image/x-icon"/>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="row">
				<div class="site-navigation-inner col-sm-12">
					<div class="navbar-header col-sm-12">
						

						<div id="logo">
							<a class="logo-site" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo("template_url"); ?>/img/img-logo-nong-san.png"  height="120" width="120" alt="<?php bloginfo( 'name' ); ?>"/></a>
							<div class="tag-line">
								<h1><?php bloginfo('description'); ?></h1>
							</div>
						</div><!-- end of #logo -->

					</div>
					
				</div>
			</div>
		</div>
		<div class="top-menu">
			<div class="container">
				<div class="col-sm-12">
					<div class="btn-top">
						<button type="button" class="btn navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					<!-- /.btn-top --></div>
					<?php sparkling_header_menu(); // main navigation ?>
				<!-- /.col-sm-9 --></div>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">

		<div class="top-slider container">
			<?php if(is_front_page() || is_home()) { ?>
				<?php //sparkling_featured_slider(); ?>
			<?php } ?>
			<?php sparkling_call_for_action(); ?>
		</div>

		<div class="container main-content-area">
			<div class="row">
