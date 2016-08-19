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
	<header>
		<div class="container">
			<div class="menuBox contShadow">
				<div class="infoHeader">
					<?php if (false) { ?>
						<ul class="MapHeader">
							<li>
								<a href="http://expreso.dhdinc.info/seccion/editoriales/" title="Editoriales">
									Editoriales
								</a>
							</li>
							<li>
								<a href="http://expreso.dhdinc.info/historia/" title="Historia">
									Historia
								</a>
							</li>
							<li>
								<a href="http://expreso.dhdinc.info/publicidad/" title="Publicidad">
									Publicidad
								</a>
							</li>
						</ul>
					<?php } ?>
					<?php $args=array(
						'theme_location'=>'menu-sitetop',
						'menu_class' =>'MapHeader'
					);?>
					<?php wp_nav_menu($args); ?>


					<ul class="rsListHead">
						<span>Síguenos en:</span>
						<li>
							<a href="javascript:void(0)">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoFb.svg" alt="Expreso" title="Expreso">
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoTwitter.svg" alt="Expreso" title="Expreso">
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoPinteres.svg" alt="Expreso" title="Expreso">
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoGoogle.svg" alt="Expreso" title="Expreso">
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoYoutube.svg" alt="Expreso" title="Expreso">
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoLinkedin.svg" alt="Expreso" title="Expreso">
							</a>
						</li>
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
						<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/logo.png" alt="Expreso" title="Expreso">
					</a>
				</figure>
				<ul class="headerBtn">
					<li class="headerBtnLine">
						<a href="http://expreso.dhdinc.info/seccion/editoriales/" class="btnGeneral" title="Editoriales">
							Editoriales
						</a>
					</li>
					<li>
						<a href="javascript:void(0)" class="btnGeneral" title="">
							Polidato del día
						</a>
					</li>
					<li>
						<input type="text" class="inpsearch" name="searchDesk" id="searchDesk" placeholder="Encuentra">
						<button type="submit" class="btnGeneral" style="padding-top:5px;padding-bottom:5px;">
							>
						</button>
					</li>
				</ul>
				<div class="searchIco" id="searchBox">
					<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/searchWhite.svg" alt="" title="">
				</div>
			</div>
			<nav class="mainMenu" id="mainMenu">
				<?php $args=array(
					'theme_location'=>'menu-principal',
					'menu_class' =>'mfBox'
				);?>
				<?php wp_nav_menu($args); ?>
			</nav>
			<div class="searchFixed">
				<input type="text" name="hsearch" id="hsearch" class="inputField" placeholder="¿Que buscas?">
			</div>
		</div>
	</header>