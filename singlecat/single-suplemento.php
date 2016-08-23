<?php //Interior de suplementos ?>
<section class="secrow single">
	<div class="container">
		<div class="row">
			<div class="col l8 m12 s12 lineLateralRight" style="position:relative;">

				<?php //Titulo ?>
				<div class="titleBox1">
					<h1>
						<?php the_title() ?>
					</h1>
				</div>

				<?php if (false) { ?>
					<div class="singSlider owlOneItem">
						<div class="singItem">
							<figure>
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
							</figure>
						</div>
						<div class="singItem">
							<figure>
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
							</figure>
						</div>
						<div class="singItem">
							<figure>
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
							</figure>
						</div>
					</div>
				<?php } ?>

				<div class="singItem">
					<figure>
						<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
					</figure>
				</div>

				<?php //Contenido ?>
				<div class="campTxt lineBottom">
					<?php the_content(); ?>
				</div>

				
				<?php //Articulos relacionados ?>
				<div class="rowSing rowRell lineBottom">
					<div class="titleBox2">
						<h2>
							Suplementos relacionadas
						</h2>
					</div>
					<article class="col l4 m12 s12">
						<div class="suplItem itemShadow margBot20">
							<figure>
								<a href="" title="">
									<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/bloguero.png" alt="" title="">
								</a>
							</figure>
							<div class="suplTxt">
								<h3>
									<a href="" title="" >
										Titulo del suplemento
									</a>
								</h3>
							</div>
						</div>
					</article>
					<article class="col l4 m12 s12">
						<div class="suplItem itemShadow margBot20">
							<figure>
								<a href="" title="">
									<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/bloguero.png" alt="" title="">
								</a>
							</figure>
							<div class="suplTxt">
								<h3>
									<a href="" title="" >
										Titulo del suplemento
									</a>
								</h3>
							</div>
						</div>
					</article>
					<article class="col l4 m12 s12">
						<div class="suplItem itemShadow margBot20">
							<figure>
								<a href="" title="">
									<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/bloguero.png" alt="" title="">
								</a>
							</figure>
							<div class="suplTxt">
								<h3>
									<a href="" title="" >
										Titulo del suplemento
									</a>
								</h3>
							</div>
						</div>
					</article>
				</div>

			</div>

			<?php //Sidebar ?>
			<div class="col l4 m12 s12">

				<?php //Publicidad ?>				
				<?php get_template_part( 'content/content', 'pubsmall' ); ?>
				
				<?php //Entrvista ?>
				<?php $args = array(
					'posts_per_page' => '1',
					'cat' => 30
				);?>
				<?php $the_query = new WP_Query($args); ?>
					<?php if ($the_query->have_posts()) : ?>
						<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
							<article class="itemLast itemShadow margBot20">
								<figure>
									<figcaption>
										<h3>
											Entrevista
										</h3>
									</figcaption>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
									<figcaption>
										<p>
											<?php the_excerpt(); ?>
										</p>
									</figcaption>
								</figure>
							</article>
						<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>

				<?php //Entrevista ?>
				<article class="itemLast itemShadow margBot20">
					<figure>
						<figcaption>
							<h3>
								Entrevista
							</h3>
						</figcaption>
						<a href="javascript:void(0)" title="">
							<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
						</a>
						<figcaption>
							<p>
								El actor visto en "Attack The Block" o en el Episodio VII de 'La guerra de...
							</p>
						</figcaption>
					</figure>
				</article>

				<?php //Destacada del día  ?>
				<article class="itemLast itemShadow margBot20">
					<figure>
						<figcaption>
							<h3>
								Destacada del día
							</h3>
						</figcaption>
						<a href="javascript:void(0)" title="">
							<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
						</a>
						<figcaption>
							<h4>
								<a href="javascript:void(0)" title="">
									Jhon Boyega en el reparto de "Pacific Rim 2"
								</a>
							</h4>
							<p>
								El actor visto en "Attack The Block" o en el Episodio VII de 'La guerra de...
							</p>
						</figcaption>
					</figure>
				</article>

				<?php //Encuesta ?>
				<div class="encBox itemShadow margBot20">
					<p>
						¿Considera exagerado el tiempo que se está tomando la ONPE para dar los resultados electorales al 100%?
					</p>
					<div class="encInpCont">
						<div class="col l6 m6 s6">
							<p>
								<input id="rdoSi" name="group1" type="radio" />
								<label for="rdoSi">Si</label>
							</p>
						</div>
						<div class="col l6 m6 s6">
							<p>
								<input id="rdoNo" name="group1" type="radio"/>
								<label for="rdoNo">No</label>
							</p>
						</div>
					</div>
				</div>

				<?php //Publicidad ?>
				<?php get_template_part( 'content/content', 'pubsmall' ); ?>

				<?php //Suplementos del día ?>
				<article class="itemLast itemShadow margBot20">
					<figure>
						<figcaption>
							<h3>
								Suplementos del dia
							</h3>
						</figcaption>
						<a href="javascript:void(0)" title="">
							<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
						</a>
						<figcaption>
							<p>
								<a href="javascript:void(0)" title="">
									El actor visto en "Attack The Block" o en el Episodio VII de 'La guerra de...
								</a>
							</p>
						</figcaption>
					</figure>
				</article>

			</div>
		</div>
	</div>
</section>