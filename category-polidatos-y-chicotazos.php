<?php get_header(); ?>

<?php //Publicidad - Long ?>
<?php get_template_part( 'content/content', 'publong' ); ?>

<section class="secrow polidatos">
	<div class="container">
		<div class="row">
			<?php //filtros ?>
			<div class="col l3 m12 s12 rowFiltros lineLateralRight">
				<div class="titleBox2">
					<h2>
						Encuentra rápido lo que más te interesa leer
					</h2>
				</div>
				<div class="inpFiltro">
					<input type="date" name="fecEdit" id="fecEdit" class="datepicker picker__input" placeholder="Escoja una fecha">
				</div><br>

				
				<button type="submit" class="btnGeneral">
					Filtrar
				</button>
			</div>

			<?php //Content ?>
			<div class="col l6 m12 s12">
				<ul class="collapsible acordImg" data-collapsible="accordion">
					<?php $args = array(
						'posts_per_page' => '9',
						'cat' => 19
					);?>
					<?php $the_query = new WP_Query($args); ?>
						<?php if ($the_query->have_posts()) : ?>
							<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
								<li class="active">
									<div class="collapsible-header active">
										<?php the_time('l, F jS, Y') ?>
									</div>
									<div class="collapsible-body" style="display:block;">
										<figure>
											<?php the_post_thumbnail(); ?>
										</figure>
										<div class="campTxt">
											<p>
												<?php the_excerpt(); ?>
											</p>
										</div>
									</div>
								</li>
							<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				</ul>
			</div>

			<?php //SideBar ?>
			<div class="col l3 m12 s12">

				<?php //Publicidad - Small ?>
				<?php get_template_part( 'content/content', 'pubsmall' ); ?>

				<?php //Entrevissta ?>
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
								<a href="javascript:void(0)" title="">
									El actor visto en "Attack The Block" o en el Episodio VII de 'La guerra de...
								</a>
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

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
</body>
</html>