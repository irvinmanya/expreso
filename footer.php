<footer>
	<div class="container">
		<div class="row">

			<!-- [ Últimas nocitias ] -->
			<div class="col l4 m12 s12">
				<div class="siteMapBox margBot20">
					<h3>
						<?php the_field('foo-ltitulo',75961); ?>
					</h3>
					<ul class="lastNot">
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
						<?php the_field('foo-lmtitulo',75961); ?>
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
					<?php the_field('foo-info',75961); ?>
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

<?php //Back to top ?>
<a href="#0" class="cd-top">
	<i>
		<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoNext.svg" alt="Top" title="Top">
	</i>
</a>

<!--[ JQuery ]-->
<script src="<?php echo get_template_directory_uri() ?>/js/jquery.js"></script>
<!--[ General ]-->
<script src="<?php echo get_template_directory_uri() ?>/js/jsgeneral.js"></script>
<!--[ MyApp ]-->
<script src="<?php echo get_template_directory_uri() ?>/js/myapp.min.js"></script>
<!--[ Templates ]-->
<script src="<?php echo get_template_directory_uri() ?>/js/jquery.tmpl.js"></script>


<!--[if	lt	IE	8]>
<p	class="browsehappy">
Estás	usando	un	navegador	<strong>desactualizado</strong>.
Por	favor	<a	href="http://browsehappy.com/">actualiza	tu	navegador</a>
Para	mejorar	la	experiencia..
</p>
<![endif]-->
<script type="text/javascript">
	// Capturando la fecha de hoy
	var dias_semana = new Array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
	var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre", "Diciembre");
	var fecha_actual = new Date();
	 
	//alert("Hoy es " + dias_semana[fecha_actual.getDay()] + " dia " + fecha_actual.getDate() + " de " + meses[fecha_actual.getMonth()] + " de " + fecha_actual.getFullYear());
	$('.fDay').find('p').html(dias_semana[fecha_actual.getDay()] + " " + fecha_actual.getDate() + " de " + meses[fecha_actual.getMonth()] + " del " + fecha_actual.getFullYear());


	$(document).ready(function(){

		var $videosURLxd = $('#expTv .iModListFig li');

		for (var i = $videosURLxd.length - 1; i >= 0; i--) {
			$videosURLxd.eq(i).find('iframe').attr('data-yt',$videosURLxd.eq(i).find('iframe').attr('src'));
		}

		$(window).load(function(){
			setTimeout(function(){
				$('.iModList li').on('mouseenter',function(){
					var $thisLi = $(this);
					var indexLi = $thisLi.index();
					$thisLi.closest('.itemModNot').find('.iModListFig').find('li').removeClass('actNot');
					$thisLi.closest('.itemModNot').find('.iModListFig').find('li').eq(indexLi).addClass('actNot');

					$('.actNot').find('iframe').attr('src',$videosURLxd.eq(indexLi).find('iframe').attr('data-yt'));


					$thisLi.closest('.itemModNotTV').find('.iModListFig').find('li').removeClass('actNot');
					$thisLi.closest('.itemModNotTV').find('.iModListFig').find('li').eq(indexLi).addClass('actNot');

				});

				// $('.iModList li').on('mouseleave',function(){
				//   var $thisLi = $(this);
				//   // $thisLi.closest('.itemModNot').find('.iModListFig').find('li').removeClass('actNot');
				// });
			},100);
		});

		//Video Autoplay
		$('#expTv .iModList li').on('click',function(){
			$('.actNot').find('iframe').attr('src',$('.actNot').find('iframe').attr('src')+'?autoplay=1');
		});

		//Agregando clases a la info del footer
		$('.siteMapBoxLast').find('ul').addClass('lastNot');
		$('.siteMapBoxLast').find('li').addClass('col l12 m12 s12');
		
	});
</script>
<?php wp_footer(); ?>
