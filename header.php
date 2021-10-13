<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@700&display=swap" rel="stylesheet">

	<!-- FAVICONS -->
	<link rel="apple-touch-icon" sizes="180x180" href="/fav/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/fav/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/fav/favicon-16x16.png">
	<link rel="manifest" href="/fav/site.webmanifest">
	<link rel="shortcut icon" href="/fav/favicon.ico">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-config" content="/fav/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">

	<!-- FACEBOOK AND TWITTER SOCIAL SHARE IMAGES -->
	<meta property="og:image" content="http://https://d0c9ae9029.nxcli.net/favicons/social_share_image.jpg">
	<meta name="twitter:image" content="http://https://d0c9ae9029.nxcli.net/favicons/social_share_image.jpg">
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>

	<div id="wrapper-navbar">
		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<div class="container">
			<div class="navbar-header">
				<a id = "logoLink" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
				<?php $logo = get_field('logo', 'options'); ?>
				<img id = "headerLogo" class = "img-fluid" src="<?php echo $logo['url']; ?>" alt="<?php echo get_bloginfo( 'name'); ?>"></a>
			</div><!-- .navbar-header -->
		</div><!-- .container -->
	</div><!-- #wrapper-navbar end -->
	<h1 class = "h2 site-tagline"><?php the_field('site_tagline', 'option'); ?></h1>	