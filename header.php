<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
	<nav id="mobilenav">
		<div class="mobilenav__inner">
			<div class="content-menu">
				<div class="logo_mb">
					<a class="d-block" id="logo" href="<?php echo esc_url(home_url('/')); ?>">
						<?php
						if (has_custom_logo()) {
							the_custom_logo();
						} else {
							?>
							<img alt="Logo"
								src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/uploads/2022/07/logo.svg">
						<?php } ?>
					</a>
				</div>
				<div class="menu-block">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'primary-menu',
						'container_class' => 'menu-primary-menu-container',
						'menu_class' => 'mobile-menu',
						'menu_id' => 'menu-main',
					));
					?>
				</div>
			</div>
		</div>
	</nav>
	<div class="btn-close">
		<div class="menu-title"><i class="fas fa-times-circle"></i> Close</div>
	</div>
	<div class="panel-overlay"></div>

	<div id="page" class="site">

		<header id="masthead" class="site-header header-logo" role="banner" itemscope="itemscope"
			itemtype="http://schema.org/WPHeader">

			<div class="header-main">
				<div class="container">
					<div class="site-branding">
						<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
								rel="home"><?php bloginfo('name'); ?></a></h1>
						<p class="site-description"><?php bloginfo('description'); ?></p>
					</div><!-- .site-branding -->

					<div class="header-content">
						<div class="row align-items-center">
							<div class="col-sm-3 col-7">
								<div class="logo">
									<a class="d-block" id="logo" href="<?php echo esc_url(home_url('/')); ?>">
										<?php
										if (has_custom_logo()) {
											the_custom_logo();
										} else {
											?>
											<img alt="Logo"
												src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/uploads/2022/07/logo.svg">
										<?php } ?>
									</a>
								</div>
							</div>
							<div class="col-sm-6 d-sm-block d-none">
								<h2 id="callbacks" class="title">QP GREEN PACK</h2>
							</div>
							<div class="col-sm-3 col-5">
								<div class="menu-box" id="showmenu">
									<div class="menu-toggle">
										<div class="showmenu-hamburger"><span></span><span></span><span></span></div>
										<div class="showmenu-cross"><span></span><span></span></div>
									</div>
									<div class="menu-title">Menu</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</header><!-- #masthead -->

		<div id="content" class="site-content">
			<main id="main" class="site-main" role="main">