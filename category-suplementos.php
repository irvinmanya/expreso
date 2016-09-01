<?php get_header(); ?>

<section class="secrow cine">
	<div class="container">
		<div class="row">
			<?php //filtros ?>
			<div class="col l3 m12 s12 rowFiltros lineLateralRight">
				<div class="titleBox2">
					<h2>
						Encuentra rápido lo que más te interesa leer
					</h2>
				</div>
				<?php if (true) { ?>
					<div class="inputItem">
						<span class="input input--kohana">
							<input type="text" id="seachcine" name="seachcine" class="input__field input__field--kohana">
							<label class="input__label input__label--kohana" for="pnombre">
								<i class="icon--kohana icoNom"></i>
								<span class="input__label-content input__label-content--kohana">
									Encontrar
								</span>
							</label>
						</span>
					</div>
				<?php } ?>

				<?php if (false) { ?>
					<div class="titleBox3">
						<h3>
							Filtra por tema
						</h3>
					</div>
					<div class="filtroBox lineBottom">
						<p>
							<input type="checkbox" id="tema1" name="tema1"/>
							<label for="tema1">Tema #1</label>
						</p>
						<p>
							<input type="checkbox" id="tema2" name="tema2"/>
							<label for="tema2">Tema #2</label>
						</p>
						<p>
							<input type="checkbox" id="tema3" name="tema3"/>
							<label for="tema3">Tema #3</label>
						</p>
						<p>
							<input type="checkbox" id="tema4" name="tema4"/>
							<label for="tema4">Tema #4</label>
						</p>
						<div class="inpFiltro">
							<input type="date" name="fecEdit" id="fecEdit" class="datepicker picker__input" placeholder="Escoja una fecha">
						</div>
					</div>
				<?php } ?>

				<?php //Publicidad - Small ?>
				<?php get_template_part( 'content/content', 'pubsmall' ); ?>
			</div>

			<?php //Content ?>
			<div class="col l9 m12 s12">
				<?php $args = array(
					'posts_per_page' => '-1',
					'cat' => 227,
					'meta_query'	=> array(
						'relation'		=> 'AND',
						array(
							'key'		=> 'destprev-opt',
							'value'		=> 'destacadodeldia',
							'compare' 	=> 'LIKE'
						)
					)
				);?>
				<?php $the_query = new WP_Query($args); ?>
					<?php if ($the_query->have_posts()) : ?>
						<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
							<article class="col l4 m12 s12">
								<div class="suplItem itemShadow margBot20">
									<figure>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php the_post_thumbnail(); ?>
										</a>
									</figure>
									<div class="suplTxt">
										<h3>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php the_title(); ?>
											</a>
										</h3>
									</div>
								</div>
							</article>
						<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>

</body>
</html>