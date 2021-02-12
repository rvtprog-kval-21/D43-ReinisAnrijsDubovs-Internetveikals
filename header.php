<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
include('login.php');

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet"> 
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">
		<div class="laguage-bar">
			
		</div>
		<div class="top-header">
			<div class="container"> 
				<div class="row-align-item-center">
					<!-- <div class="col-lg-5 col-md-6"> -->
					<div class="Logo">
						<a href="/">
							<img src="<?php echo get_template_directory_uri();?>/img/Logo.jpg" alt="Logo">
						</a>
						
					</div>
					<!-- </div> -->
					<div class="col-lg-7 col-md-6"> 
						<div class="top-header-contact">
							<a href="tel:371 67562222" class="top-header-contact-phone"><i class="fa fa-phone"></i>+371 67562222 (Šmerļa iela 3)</a>
							<a href="mailto:info@vejstikli.lv" class="top-header-contact-email"><i class="fa fa-envelope-o"></i>info@vejstikli.lv</a>
						</div>
					</div> 
				</div>
			</div> 
			<div class="search-container">
				<div class="search-input-holder">
					<input type="search" name="q" placeholder="" pattern="[^'\x22]+" title="Invalid input">
				</div>
				<div class="search-button">
					<i class="fa fa-search" aria-hidden="true" style="font-size:30px"></i>
				</div>

			</div>
			<div class="Login-button">
				<button class="button" id="loginbtn" type="button" onclick="document.getElementById('id01').style.display='block'">
					Ielogoties
				</button>
			</div>
			
		</div>

		<nav id="main-nav" class="navbar navbar-expand-xl navbar-dark" aria-labelledby="main-nav-label">
			
			<div class="container">

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>

				<div class="mobile-menu-dropdown">
					<button class="navbar-toggler" type="button"  data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
						<span>Menu</span><i class="fa fa-bars"></i>
					</button> 
				</div>
				<div class="search-container">
					<div class="search-input-holder">
						<input type="text" placeholder="" pattern="[^'\x22]+" title="Invalid input">
					</div>
					<div class="search-button">
						<i class="fa fa-search" aria-hidden="true" style="font-size:30px"></i>	
					</div>

				</div>
				<div class="Login-button">
					<button class="button" type="button" onclick="document.getElementById('id01').style.display='block'">
						Ielogoties
					</button>
				</div>

			</div><!-- .container -->

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
