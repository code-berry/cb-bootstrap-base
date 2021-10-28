<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700;900&family=Martel:wght@800&display=swap" rel="stylesheet">
	<!-- jquery --> 
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<!-- slick -->
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<?php wp_head(); ?>
</head>

<?php
	$navbar_scheme   = get_theme_mod( 'navbar_scheme', 'navbar-light bg-light' ); // Get custom meta-value.
	$navbar_position = get_theme_mod( 'navbar_position', 'static' ); // Get custom meta-value.

	$search_enabled  = get_theme_mod( 'search_enabled', '1' ); // Get custom meta-value.
?>
 
<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<a href="#page-wrap" class="visually-hidden-focusable"><?php esc_html_e( 'Skip to main content', 'codeberry-base-theme' ); ?></a>

<nav id="header" class="navbar navbar-expand-md <?php echo esc_attr( $navbar_scheme ); if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' fixed-top'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' fixed-bottom'; endif; if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
	<div class="pre-nav-header">
		<div class="container">
			<div class="row">
				<div class="col-12">
					We are carefully monitoring the COVID-19 situation. <a href="">Learn More</a>
				</div>
			</div>
		</div>
	</div>

	<div class="main-nav-header">
		<div class="container">
			<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php $logo = get_field('site_logo', 'options');
				$alt_logo = get_field('site_logo_condensed', 'options');
	
				if($logo) {
					show_acf_img('site_logo', false, 'site-logo-main contain', 'options');
				} ?>
			</a>
	
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'codeberry-base-theme' ); ?>">
				<span class="navbar-toggler-icon"></span>
			</button>
	
			<div id="navbar" class="collapse navbar-collapse">
				<?php
					// Loading WordPress Custom Menu (theme_location).
					wp_nav_menu(
						array(
							'theme_location' => 'main-menu',
							'container'      => '',
							'menu_class'     => 'navbar-nav',
							'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
							'walker'         => new WP_Bootstrap_Navwalker(),
						)
					);
				?>
			</div>
		</div>
	</div>
</nav>

<main id="page-wrap">