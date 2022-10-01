<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package materialwp
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/splide.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Waiting+for+the+Sunrise&display=swap" rel="stylesheet">
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<?php wp_head(); ?>
<style>
	@font-face {
		font-family: 'Corporative Cnd', sans-serif;
		src: url('<?php echo get_template_directory_uri(); ?>/fonts/corporatecondensed.ttf');
	}
	@font-face {
		font-family: 'Arquitecta', sans-serif;
		src: url('<?php echo get_template_directory_uri(); ?>/fonts/ArquitectaBlack.otf');
	}
</style>
</head>

<body <?php body_class(); ?>>
<?php if(!is_front_page()){?>


<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v13.0" nonce="p0jTVXw0"></script>
<?php } ?>

<div id="page" class="feed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'materialwp' ); ?></a>
	
	<nav class="navbar navbar-expand-lg">
  <div class="container mx-auto">
	<a class="navbar-brand custom-brand logo-none" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
								$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				
							if ( has_custom_logo() ) {
								echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '" width="136">';
							} else {
								echo '<h1>' . get_bloginfo('name') . '</h1>';
							}?>	
		</a>
  <button class="hamburger hamburger--squeeze navbar-toggler" id="collapse_button" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
  
  <span class="hamburger-box">
    <span class="hamburger-inner"></span>
  </span>

  </button>

  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <span class="close-button"></span>
    <div class="navbar-nav">
		
	<?php
						wp_nav_menu( array(
							'theme_location'    => 'primary',
							'depth'             => 2,
							'container'         => false,
							'menu_class'        => 'menu-list-container menu-list-container-main',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker())
						);
						wp_nav_menu( array(
							'theme_location'    => 'secondary',
							'depth'             => 2,
							'container'         => false,
							'menu_class'        => 'menu-list-container menu-list-container-secondary',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker())
						);
					?>
     
    </div>
  </div>
  </div>
</nav>



	<div id="content" class="site-content">
