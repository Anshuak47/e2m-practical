<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Practical
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'practical' ); ?></a>
	
	<header id="masthead" class="site-header">
		<nav id="site-navigation" class="main-navigation">
			
			<div class="left-menu">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'left-menu',
						'menu_id'        => 'primary-menu',
					)
				);
			?>
			</div><!-- Left Menu -->
			
			
			<div class="site-branding">
				<?php

// retrieve logo settings and sanitize
		$logo = get_field( 'logo', 'option' );
		if ( ! is_array( $logo ) ) {
		    $logo = array();
		}

		// output custom logo if available
		if ( function_exists( 'the_custom_logo' ) ) {
		    the_custom_logo();
		}

		// prepare logo text if provided
		$logo_text = '';
		if ( isset( $logo['logo_text'] ) ) {
		    $logo_text = sanitize_text_field( $logo['logo_text'] );
		}

		if ( is_front_page() && is_home() ) :
			?>
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php 
					if ( $logo_text ) {
						echo $logo_text;
					} else {
						bloginfo( 'name' );
					}
					?>
				</a>
			</h1>
			<?php
		else :
			if ( $logo_text ) :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( $logo_text ); ?></a></p>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
				endif;
				?>
			</div><!-- .site-branding -->

			
			<div class="right-menu">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'right-menu',
						'menu_id'        => 'right-menu',
					)
				);
			?>
			</div><!-- Right Menu -->
		</nav>
		<!-- #site-navigation -->
		

		
	</header><!-- #masthead -->
