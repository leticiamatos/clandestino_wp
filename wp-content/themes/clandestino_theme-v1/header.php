<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<!-- <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,700|Ubuntu:400,700' rel='stylesheet' type='text/css'> -->
		<link href='https://fonts.googleapis.com/css?family=Lato:400,700,900,400italic,300' rel='stylesheet' type='text/css'>

		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--meta name="description" content="<?php// bloginfo('description'); ?>"-->

		<?php wp_head(); ?>

	</head>

<?php if ( is_single() && in_category('projetos') ) : ?>
	<body <?php body_class('post-projetos'); ?>>

<?php elseif ( is_single() && in_category('blog') ) : ?>
	<body <?php body_class('post-blog'); ?>>

<?php elseif ( is_tag() || is_search() || is_archive() ) : ?>
	<body <?php body_class('post-blog'); ?>>

<?php elseif ( in_category('projetos') ) : ?>
	<body <?php body_class('page-projetos'); ?>>

<?php else: ?>
	<body <?php body_class(); ?>>

<?php endif; ?>

		
<?php if ( is_home() ) : ?>
		<header class="header_home">
			<span data-scroll-index="1" class="target" id="home"> </span>
		
			<?php
				// Sort a number between 1 - 14 
				$a = array('1' => '1', '2'=> '2', '3'=> '3', '4'=> '4', '5'=> '5', '6'=> '6', '7'=> '7', '8'=> '8', '9'=> '9', '10'=> '10', '11'=> '11', '12'=> '12', '13'=> '13', '14'=> '14');
				//$galleryimages = panelimages(274);
				$galleryimages = panelimages(271);
				//var_dump($galleryimages);
				$random_n = $galleryimages[array_rand($a)]; 
			?>
			<section class="home_panel">
				<img src="<?php echo $random_n; ?>" />
			</section>
			<div class="gap"></div>
			<div class="panel logo">
				<img src="<?php echo get_template_directory_uri(); ?>/img/panel-title.png" />
			</div>
	
			<div class="fixed">
				<section class="block_wpr block_menu">
					<div class="block_cntt">
						<h1 class="logo">
							<a href="<?php echo home_url(); ?>"><img alt="Clandestino" title="Clandestino" src="<?php echo get_template_directory_uri(); ?>/img/logo-clandestino.png" /></a>
						</h1>

						<a class="menu_link"></a>
						<div class="menu_wpr">
							<ul class="menu" role="navigation">
								<?php 
									getMenu();
								?>
								<span class="clear"></span>
							</ul>
						</div>
					</div>
					<div class="block_cntt">
		
						<div class="search_form wpr">
							<?php// get_template_part('searchform'); ?>
						</div>
	
					</div><!-- .block_cntt -->
				</section><!-- .block_menu -->
			</div>
		</header>		

<?php elseif ( in_category('blog') ||  is_page('blog') ) : ?>

		<section class="home_panel">
			<!-- <img src="<?php //echo get_template_directory_uri(); ?>/img/index_blog_0.jpg" /> -->
			<figure></figure>
		</section>
		<header class="header_default">
			<div class="fixed">	
				<section class="block_wpr block_menu">
					<div class="block_cntt">
						<h1 class="logo">
							<a href="<?php echo home_url(); ?>"><img alt="Clandestino" title="Clandestino" src="<?php echo get_template_directory_uri(); ?>/img/logo-clandestino.png" /></a>
						</h1>

						<a class="menu_link"></a>
						<div class="menu">
							<ul class="menu" role="navigation">
								<?php 
									getMenu();
								?>
							</ul>
						</div>
					</div>
				</section><!-- .block_menu -->
			</div>
		</header>

<?php else : ?>

		<header class="header_default">
			<div class="fixed">	
				<section class="block_wpr block_menu">
					<div class="block_cntt">
						<h1 class="logo">
							<a href="<?php echo home_url(); ?>"><img alt="Clandestino" title="Clandestino" src="<?php echo get_template_directory_uri(); ?>/img/logo-clandestino.png" /></a>
						</h1>

						<a class="menu_link"></a>
						<div class="menu">
							<ul class="menu" role="navigation">
								<?php 
									getMenu();
								?>
							</ul>
						</div>
					</div>
					<div class="block_cntt">
		
						<div class="search_form wpr">
							<?php// get_template_part('searchform'); ?>
						</div>
	
					</div><!-- .block_cntt -->
				</section><!-- .block_menu -->
			</div>
		</header>
<?php endif; ?>