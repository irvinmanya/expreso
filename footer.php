<footer>
	<div class="container">
		<div class="row">

			<!-- [ Últimas nocitias ] -->
			<div class="col l4 m12 s12">
				<div class="siteMapBox margBot20">
					<h3>
						Lee las últimas noticias de:
					</h3>
					<ul class="lastNot">
						<li class="col l6 m12 s12">
							<a href="javascript:void(0)" title="">
								Política
							</a>
						</li>
						<?php
						$menu_name = 'menu-principal';
						$locations = get_nav_menu_locations();
						$menu = wp_get_nav_menu_object($locations[$menu_name]);
						$menuitems = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC'));
						?>

						<?php foreach ($menuitems as $item): ?>
							<?php
							$link = $item->url;
							$title = $item->title;
							$cssClass = $item->classes[0];
							?> 
							<li class="col l6 m12 s12">
								<a href="<?php echo $link; ?>" title="<?php echo $title; ?>" <?php echo!empty($cssClass) ? " class='" . $cssClass . "'" : "" ?>>
									<?php echo $title; ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>

			<!-- [ Último minuto ] -->
			<div class="col l4 m12 s12">
				<div class="siteMapBox margBot20">
					<h3>
						Último minuto
					</h3>
					<ul class="lastNot">
						<?php $args = array(
							'posts_per_page' => '8',
							'cat' => 131,-70
						);?>
						<?php $the_query = new WP_Query($args); ?>
							<?php if ($the_query->have_posts()) : ?>
								<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
									<li class="col l6 m12 s12">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php the_title(); ?>
										</a>
									</li>
								<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					</ul>
				</div>
			</div>

			<!-- [ Información ] -->
			<div class="col l4 m12 s12">
				<div class="siteMapBox siteMapBoxLast margBot20">
					<h3>
						Contáctate con nosotros
					</h3>
					<ul class="lastNot">
						<li class="col l12 m12 s12">
							Contral telefónica <a href="tel:+01 511 612 4000">(511) 612-4000</a>
						</li>
						<li class="col l12 m12 s12">
							Fax <a href="tel:+01 511 612 4000">(511) 612-4000</a>
						</li>
						<li class="col l12 m12 s12">
							Área Legal <a href="tel:+01 511 612 4000">(511) 612-4000</a>/ <br>
							<a href="mailto:legal@expreso.com.pe">legal@expreso.com.pe</a>
						</li>
						<li class="col l12 m12 s12">
							Soporte <a href="tel:+01 511 612 4000">(511) 612-4000</a> anexo 218 <br>
							soporte@expreso.com.pe
						</li>
						<li class="col l12 m12 s12">
							Director <a href="antonio.ramirez@expreso.com.pe" >antonio.ramirez@expreso.com.pe</a>
						</li>
					</ul>
				</div>
			</div>

		</div>
	</div>
	<div class="copyRight linkTxtJs">
		<div class="container">
			<div class="row">
				<ul>
					<li class="col l4 m12 s12 copyManya">
						<a target="blank" href="http://www.manya.pe/" title="Manya.pe">
							<img class="manyaIco" src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoManya.svg" title="Manya.pe" alt="Manya.pe">
						</a>
						<a target="blank" href="http://manya.pe/proyectos.php" title="Manya.pe">
							Manya.pe
						</a>
						|
						<a target="blank" href="http://manya.pe/detalle_blog.php#!/blog/creacion-de-una-pagina-web-persuasiva-para-generar-mas-clientes/28" title="Marketing Digital">
							Marketing Digital
						</a>
					</li>
					<li class="col l4 m12 s12 termBox">
						<a href="javascript:void(0)" target="blank" title="">
							Términos y condiciones
						</a>
					</li>
					<li class="col l4 m12 s12 copyRightTxt">
						Expreso - Copyright 2016
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>

<!--[ JQuery ]-->
<script src="<?php echo get_template_directory_uri() ?>/js/jquery.js"></script>
<!--[ General ]-->
<script src="<?php echo get_template_directory_uri() ?>/js/jsgeneral.js"></script>
<!--[ MyApp ]-->
<script src="<?php echo get_template_directory_uri() ?>/js/myapp.min.js"></script>

<!--[if	lt	IE	8]>
<p	class="browsehappy">
Estás	usando	un	navegador	<strong>desactualizado</strong>.
Por	favor	<a	href="http://browsehappy.com/">actualiza	tu	navegador</a>
Para	mejorar	la	experiencia..
</p>
<![endif]-->
<?php wp_footer(); ?>
