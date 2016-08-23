<?php get_header(); ?>

<?php //Publicidad - Long ?>
<?php get_template_part( 'content/content', 'publong' ); ?>

<?php // Intro ?>
<section class="secCont intro">
	<div class="container">
		<div class="row">
			<article class="col l8 m12 s12">
				<div class="sliderIntro itemShadow">
					<ul class="sliderFeat" id="sliderFeat">
						<?php $args = array(
							'posts_per_page' => '3',
							'cat' => get_query_var('cat'), //Menos portada cat=70
							'meta_query'	=> array(
								'relation'		=> 'AND',
								array(
									'key'	 	=> 'sliderprev-opt',
									'value'	  	=> 'sliderprincipal',
									'compare' 	=> 'LIKE'
								)
							)
						);?>
						<?php $the_query = new WP_Query($args); ?>
							<?php if ($the_query->have_posts()) : ?>
								<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
									<li>
										<figure>
											<figcaption>
												<h2>
													<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
														<?php if (get_field('sliderprev-titulo')) { ?>
															<?php the_field('sliderprev-titulo'); ?>
														<?php }else{ ?>
															<?php the_title(); ?>
														<?php } ?>
													</a>
												</h2>
											</figcaption>
											<?php the_post_thumbnail(); ?>
										</figure>
									</li>
								<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					</ul>
					<div class="sliderNav">
						<div class="sliderPrev">
							<
						</div>
						<div class="sliderNext">
							>
						</div>
					</div>
					<ul class="sliderList" id="sliderList">
						<?php $args = array(
							'posts_per_page' => '3',
							'cat' => -70, //Menos portada cat=70
							'meta_query'	=> array(
								'relation'		=> 'AND',
								array(
									'key'	 	=> 'sliderprev-opt',
									'value'	  	=> 'sliderprincipal',
									'compare' 	=> 'LIKE'
								)
							)
						);?>
						<?php $the_query = new WP_Query($args); ?>
							<?php if ($the_query->have_posts()) : ?>
								<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
									<li>
										<figure>
											<?php the_post_thumbnail(); ?>
										</figure>
										<div class="sliderTxt">
											<h3>
												<?php if (get_field('sliderprev-titulo')) { ?>
													<?php the_field('sliderprev-titulo'); ?>
												<?php }else{ ?>
													<?php the_title(); ?>
												<?php } ?>
											</h3>
										</div>
									</li>
								<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					</ul>
				</div>
			</article>
			<article class="col l4 m12 s12">
				<div class="itemLastMin itemShadow margBot20">
					<h3>
						Último minuto
					</h3>
					<ul>
						<li>
							<a href="javascript:void(0)">
								El presidente del congreso, Luis iberico
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								Tumbes: Miembros de mesa estaban requisitoriados
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								Tumbes: Miembros de mesa estaban requisitoriados
							</a>
						</li>
					</ul>
					</figure>
				</div>
			</article>
		</div>
	</div>
</section>

<?php // Section #1 ?>
<section class="secrow secDestac">
	<div class="container notBox">
		<div class="row">
			<div class="col l8 m12 s12 rowRell">
				<article class="col l6 m12 s12">
					<div class="notItemHome notItemArt itemShadow margBot20">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
							</a>
							<figcaption>
								<h3>
									<a href="javascript:void(0)" title="">
										John Boyega en el reparto de "Pacific Rim 2"
									</a>
								</h3>
								<p>
									El actor visto en "Attack The Block" o en el Episodio VII de 'La guerra de...
								</p>
							</figcaption>
						</figure>
					</div>
				</article>
				<article class="col l6 m12 s12">
					<div class="notItemHome notItemArt itemShadow margBot20">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
							</a>
							<figcaption>
								<h3>
									<a href="javascript:void(0)" title="">
										John Boyega en el reparto de "Pacific Rim 2"
									</a>
								</h3>
								<p>
									El actor visto en "Attack The Block" o en el Episodio VII de 'La guerra de...
								</p>
							</figcaption>
						</figure>
					</div>
				</article>
			</div>
			<div class="col l4 m12 s12">
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
			</div>
		</div>
	</div>
</section>

<?php //Seccion #2 ?>
<section class="secrow secDestac">
	<div class="container notBox">
		<div class="row">
			<div class="col l8 m12 s12 rowRell">
				<article class="col l6 m12 s12">
					<div class="notItemHome notItemArt notItemArt itemShadow margBot20">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
							</a>
							<figcaption>
								<h3>
									<a href="javascript:void(0)" title="">
										John Boyega en el reparto de "Pacific Rim 2"
									</a>
								</h3>
								<p>
									El actor visto en "Attack The Block" o en el Episodio VII de 'La guerra de...
								</p>
							</figcaption>
						</figure>
					</div>
				</article>
				<article class="col l6 m12 s12">
					<div class="notItemHome notItemArt itemShadow margBot20">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
							</a>
							<figcaption>
								<h3>
									<a href="javascript:void(0)" title="">
										John Boyega en el reparto de "Pacific Rim 2"
									</a>
								</h3>
								<p>
									El actor visto en "Attack The Block" o en el Episodio VII de 'La guerra de...
								</p>
							</figcaption>
						</figure>
					</div>
				</article>
			</div>
			<div class="col l4 m12 s12">
				<?php //Publicidad - Small ?>
				<?php get_template_part( 'content/content', 'pubsmall' ); ?>
			</div>
		</div>
	</div>
</section>

<?php //Seccion #3 ?>
<section class="secrow secDestac">
	<div class="container notBox">
		<div class="row">
			<div class="col l8 m12 s12 rowRell">
				<article class="col l4 m12 s12">
					<div class="notItemHome notItemArt itemShadow margBot20">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
							</a>
							<figcaption>
								<h3>
									<a href="javascript:void(0)" title="">
										John Boyega en el reparto de "Pacific Rim 2"
									</a>
								</h3>
								<p>
									El actor visto en "Attack The Block" o en el Episodio VII de 'La guerra de...
								</p>
							</figcaption>
						</figure>
					</div>
				</article>
				<article class="col l4 m12 s12">
					<div class="notItemHome notItemArt itemShadow margBot20">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
							</a>
							<figcaption>
								<h3>
									<a href="javascript:void(0)" title="">
										John Boyega en el reparto de "Pacific Rim 2"
									</a>
								</h3>
								<p>
									El actor visto en "Attack The Block" o en el Episodio VII de 'La guerra de...
								</p>
							</figcaption>
						</figure>
					</div>
				</article>
				<article class="col l4 m12 s12">
					<div class="notItemHome notItemArt itemShadow margBot20">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
							</a>
							<figcaption>
								<h3>
									<a href="javascript:void(0)" title="">
										John Boyega en el reparto de "Pacific Rim 2"
									</a>
								</h3>
								<p>
									El actor visto en "Attack The Block" o en el Episodio VII de 'La guerra de...
								</p>
							</figcaption>
						</figure>
					</div>
				</article>
			</div>
			<div class="col l4 m12 s12">
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

<?php //Seccion #4 ?>
<section class="secrow secDestac">
	<div class="container notBox">
		<div class="row">
			<div class="col l8 m12 s12 rowRell">
				<article class="col l4 m12 s12">
					<div class="notItemHome notItemArt itemShadow margBot20">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
							</a>
							<figcaption>
								<h3>
									<a href="javascript:void(0)" title="">
										John Boyega en el reparto de "Pacific Rim 2"
									</a>
								</h3>
								<p>
									El actor visto en "Attack The Block" o en el Episodio VII de 'La guerra de...
								</p>
							</figcaption>
						</figure>
					</div>
				</article>
				<article class="col l4 m12 s12">
					<div class="notItemHome notItemArt itemShadow margBot20">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
							</a>
							<figcaption>
								<h3>
									<a href="javascript:void(0)" title="">
										John Boyega en el reparto de "Pacific Rim 2"
									</a>
								</h3>
								<p>
									El actor visto en "Attack The Block" o en el Episodio VII de 'La guerra de...
								</p>
							</figcaption>
						</figure>
					</div>
				</article>
				<article class="col l4 m12 s12">
					<div class="notItemHome notItemArt itemShadow margBot20">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
							</a>
							<figcaption>
								<h3>
									<a href="javascript:void(0)" title="">
										John Boyega en el reparto de "Pacific Rim 2"
									</a>
								</h3>
								<p>
									El actor visto en "Attack The Block" o en el Episodio VII de 'La guerra de...
								</p>
							</figcaption>
						</figure>
					</div>
				</article>
			</div>
			<div class="col l4 m12 s12">
				<?php //Publicidad - Small ?>
				<?php get_template_part( 'content/content', 'pubsmall' ); ?>
			</div>
		</div>
	</div>
</section>

<?php //Columnista del dia ?>
<section class="secrow secDestac">
	<div class="container notBox">
		<div class="row">
			<div class="col l12 m12 s12 rowRell">
				<div class="titleBox2">
					<h2>Columnistas del día</h2>
				</div>
				<ul class="owlColum owlColumnista">
					<li class="itemShadow">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
							</a>
							<figcaption>
								<h3>
									<a href="https://manya.pe" target="blank" title="">
										Nombre del columnista
									</a>
								</h3>
							</figcaption>
						</figure>
					</li>
					<li class="itemShadow">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
							</a>
							<figcaption>
								<h3>
									<a href="https://manya.pe" target="blank" title="">
										Nombre del columnista
									</a>
								</h3>
							</figcaption>
						</figure>
					</li>
					<li class="itemShadow">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
							</a>
							<figcaption>
								<h3>
									<a href="https://manya.pe" target="blank" title="">
										Nombre del columnista
									</a>
								</h3>
							</figcaption>
						</figure>
					</li>
					<li class="itemShadow">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
							</a>
							<figcaption>
								<h3>
									<a href="https://manya.pe" target="blank" title="">
										Nombre del columnista
									</a>
								</h3>
							</figcaption>
						</figure>
					</li>
					<li class="itemShadow">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
							</a>
							<figcaption>
								<h3>
									<a href="https://manya.pe" target="blank" title="">
										Nombre del columnista
									</a>
								</h3>
							</figcaption>
						</figure>
					</li>
					<li class="itemShadow">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
							</a>
							<figcaption>
								<h3>
									<a href="https://manya.pe" target="blank" title="">
										Nombre del columnista
									</a>
								</h3>
							</figcaption>
						</figure>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<?php //Modulos ?>
<section class="secrow secDestac">
	<div class="container notBox">
		<div class="row">
			<div class="col l8 s12 m12 rowRell">

				<?php //Modulo #1 ?>
				<article class="col l6 m12 s12">
					<div class="itemModNot itemShadow margBot20">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
							</a>
						</figure>
						<ul>
							<li>
								<a href="javascript:void(0)" title="">
									¿Qué profesionales serán más buscados en 10 años?
								</a>
							</li>
							<li>
								<a href="javascript:void(0)" title="">
									¿Qué profesionales serán más buscados en 10 años?
								</a>
							</li>
							<li>
								<a href="javascript:void(0)" title="">
									¿Qué profesionales serán más buscados en 10 años?
								</a>
							</li>
						</ul>
					</div>
				</article>

				<?php //Modulo #2 ?>
				<article class="col l6 m12 s12">
					<div class="itemModNot itemShadow margBot20">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
							</a>
						</figure>
						<ul>
							<li>
								<a href="javascript:void(0)" title="">
									¿Qué profesionales serán más buscados en 10 años?
								</a>
							</li>
							<li>
								<a href="javascript:void(0)" title="">
									¿Qué profesionales serán más buscados en 10 años?
								</a>
							</li>
							<li>
								<a href="javascript:void(0)" title="">
									¿Qué profesionales serán más buscados en 10 años?
								</a>
							</li>
						</ul>
					</div>
				</article>

				<?php //Caricatura ?>
				<article class="col l12 m12 s12">
					<ul class="listCaricatura owlOneItem">
						<li>
							<figure>
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
							</figure>
						</li>
						<li>
							<figure>
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
							</figure>
						</li>
						<li>
							<figure>
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
							</figure>
						</li>
					</ul>
				</article>

			</div>
			
			<div class="col l4 s12 m12">

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

				<?php //Publicidad - small ?>
				<?php get_template_part( 'content/content', 'pubsmall' ); ?>

				<!-- [ Encuesta ] -->
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

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
</body>
</html>