<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="no-js ie6" lang="es">   <![endif]-->
<!--[if IE 7]>     <html class="no-js ie7" lang="es">   <![endif]-->
<!--[if IE 8]>     <html class="no-js ie8" lang="es">   <![endif]-->
<!--[if IE 9 ]>    <html class="no-js ie9" lang="es">   <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="es" class="" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<base href="<?php bloginfo( 'url' ); ?>/" />
<meta charset="<?php bloginfo( 'charset' ); ?>">
<!-- RESPONSIVE! ADAPTACIÓN DEL VIEWPORT & más -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<title><?php wp_title( '' ); ?><?php if (wp_title( '', false )) { echo ' |'; } ?> <?php bloginfo( 'name' ); ?></title>
<meta name="author" content="">

<meta name="keywords" content="">
<meta name="robots" content="all, index, follow">
<meta name="googlebot" content="all, index, follow">
<meta name="google-site-verification" content="" />
<meta name=apple-mobile-web-app-capable content=yes>

<!--[if lt IE 9]>
	<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/produccion/js/lib/utilitario/respond.min.js"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/produccion/js/lib/utilitario/html5shiv.min.js"></script>
<![endif]-->
<!--[if (gte IE 6)&(lte IE 8)]>
<![endif]-->

<?php wp_head(); ?>
<!-- CSS General -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/style.min.css">

</head>
<?php if ( have_posts() ) { while ( have_posts() ) {the_post(); }}?>
<body>

	<?php $headLogo = get_field('head-logo',75961); ?>

	<!-- [ Preloader ] -->
	<div id="preloader" >
		<div id="status">
			<div class="preloadXP">
				<img src="<?php echo $headLogo['url']; ?>" alt="<?php wp_title( '' ); ?>" title="<?php wp_title( '' ); ?>">
			</div>
		</div>
	</div>
	<!-- [ Fin - Preloader ] -->

	<header>
		<div class="container">
			<div class="menuBox contShadow">
				<div class="infoHeader">
					<?php $args=array(
						'theme_location'=>'menu-sitetop',
						'menu_class' =>'MapHeader'
					);?>
					<?php wp_nav_menu($args); ?>

					<?php //Fecha del dia ?>
					<div class="fDay">
						<p>
							
						</p>
					</div>

					<ul class="rsListHead">
						<span>Síguenos en:</span>

						<?php if(have_rows('head-rs',75961)): ?>
							<?php while(have_rows('head-rs',75961)): the_row(); ?>
								<li>
									<?php $headRsico = get_sub_field('head-rsico'); ?>
									<a href="<?php the_sub_field('head-rslink'); ?>" title="<?php the_sub_field('head-rstitulo'); ?>">
										<img src="<?php echo $headRsico['url']; ?>" alt="<?php the_sub_field('head-rstitulo'); ?>" title="<?php the_sub_field('head-rstitulo'); ?>">
									</a>
								</li>
							<?php endwhile; ?>
						<?php endif; ?>

					</ul>
				</div>
				<div class="hamBurger" id="hamBurger">
					<div class="menu-icon menu-icon-arrow">
						<span></span>
						<svg x="0" y="0" width="100%" height="55px" viewbox="0 0 54 54">
							<!-- <circle cx="27" cy="27" r="26"></circle> -->
						</svg>
					</div>
				</div>
				<figure class="logoBox">
					<a href="<?php echo site_url(); ?>/<?php echo $menu_item->url ?>" title="<?php echo $hLogo['title']; ?>">
						<img src="<?php echo $headLogo['url']; ?>" alt="<?php wp_title( '' ); ?>" title="<?php wp_title( '' ); ?>">
					</a>
				</figure>
				<ul class="headerBtn">
					<li class="headerBtnLine">
						<a href="<?php the_field('hbtnedit-link',75961); ?>" class="btnGeneral" title="<?php the_field('hbtnedit-nom',75961); ?>">
							<?php the_field('hbtnedit-nom',75961); ?>
						</a>
					</li>
					<li class="headerBtnLine">
						<a href="<?php the_field('hbtnpol-link',75961); ?>" class="btnGeneral" title="<?php the_field('hbtnedit-nom',75961); ?>">
							<?php the_field('hbtnpol-nom',75961); ?>
						</a>
					</li>
					<li>
						<input type="text" class="inpsearch" name="searchDesk" id="searchDesk" placeholder="Encuentra">
						<button type="submit" class="btnGeneral" style="padding-top:5px;padding-bottom:5px;">
							>
						</button>
					</li>
				</ul>
			</div>
			<nav class="mainMenu" id="mainMenu">
				<?php $args=array(
					'theme_location'=>'menu-principal',
					'menu_class' =>'mfBox'
				);?>
				<?php wp_nav_menu($args); ?>
			</nav>
			<?php if (false) { ?>
				<div class="searchFixed">
					<input type="text" name="hsearch" id="hsearch" class="inputField" placeholder="¿Que buscas?">
				</div>
			<?php } ?>
		</div>
	</header>

	<section class="secrow rowPub">
		<div class="container">
			<div class="row">
				<div class="rowContPub">
					<div class="col l12 m12 s12">
						<div class="pubextra">
							<?php $headpubImg = get_field('headpub-img',75961); ?>
							<a href="<?php the_field('headpub-imglink'); ?>" title="<?php echo $headpubImg['title']; ?>">
								<img src="<?php echo $headpubImg['url']; ?>" alt="<?php echo $headpubImg['title']; ?>" title="<?php echo $headpubImg['title']; ?>">
							</a>
						</div>
						<div class="publong" style="font-size:0px;">
							<?php the_field('headpub-head',75961); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php if (false) { ?>
		<div class="fix-pubizq">
			<?php the_field('headpub-latizq',75961); ?>
		</div>
		<div class="fix-pubder">
			<?php the_field('headpub-latder',75961); ?>
		</div>
	<?php } ?>