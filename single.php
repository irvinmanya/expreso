<?php get_header(); ?>

<?php //Publicidad ?>
<section class="secrow rowPub">
	<div class="container">
		<div class="row">
			<figure class="publong">
				<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/publong.jpg" alt="title" title="title">
			</figure>
		</div>
	</div>
</section>

<?php //Interior de entrada ?>
<section class="secrow single">
	<div class="container">
		<div class="row">
			<div class="col l8 m12 s12">

				<?php //Titulo ?>
				<div class="titleBox1">
					<h1>
						<?php the_title() ?>
					</h1>
				</div>
				
				<?php //Detalles ?>
				<ul class="singDet">
					<li>
						<i>
							<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoUser.svg" alt="Autor" title="Autor">
						</i>
						Autor name |
					</li>
					<li>
						<i>
							<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoClock.svg" alt="Fecha" title="Fecha">
						</i>
						Publicado hace 5
					</li>
					<li class="catList">
						<i>
							<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoTag.svg" alt="Tag" title="Tag">
						</i>
						<ul>
							<li>
								<a href="javascript:void(0)" title="categoria">
									Categoria 1 /
								</a>
							</li>
							<li>
								<a href="javascript:void(0)" title="categoria">
									Categoria 2 /
								</a>
							</li>
							<li>
								<a href="javascript:void(0)" title="categoria">
									Categoria 3
								</a>
							</li>
						</ul>
					</li>
				</ul>

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

				<?php //Contenido ?>
				<div class="campTxt lineBottom">
					<?php the_content(); ?>
				</div>

				
				<?php //Articulos relacionados ?>
				<div class="rowSing rowRell lineBottom">
					<div class="titleBox2">
						<h2>
							Noticias relacionadas
						</h2>
					</div>
					<article class="col l4 m12 s12">
						<div class="notItemHome itemShadow margBot20">
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
						<div class="notItemHome itemShadow margBot20">
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
						<div class="notItemHome itemShadow margBot20">
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

				<?php //Articulos relacionados ?>
				<div class="rowSing rowRell lineBottom">
					<div class="titleBox2">
						<h2>
							Noticias de una categoría relacionadas
						</h2>
					</div>
					<article class="col l4 m12 s12">
						<div class="notItemHome itemShadow margBot20">
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
						<div class="notItemHome itemShadow margBot20">
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
						<div class="notItemHome itemShadow margBot20">
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

			</div>

			<?php //Sidebar ?>
			<div class="col l4 m12 s12">

				<?php //Publicidad ?>
				<div class="itemLast itemShadow margBot20">
					<figure>
						<a href="javascript:void(0)" title="">
							<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
						</a>
					</figure>
				</div>
				
				<?php //Entrvista ?>
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
				<div class="itemLast itemShadow margBot20">
					<figure>
						<a href="javascript:void(0)" title="">
							<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
						</a>
					</figure>
				</div>

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

<?php get_footer(); ?>

</body>
</html>