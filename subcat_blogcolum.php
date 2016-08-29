<?php get_header(); ?>
<section class="secrow cine">
	<div class="container">
		<div class="row">
			<?php //filtros ?>
			<div class="col l3 m12 s12 rowFiltros lineLateralRight">

				<?php $args = array(
					'posts_per_page' => '1',
					'cat' => get_query_var('cat')
				);?>
				<?php $the_query = new WP_Query($args); ?>
					<?php if ($the_query->have_posts()) : ?>
						<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
							<div class="blogAutor itemShadow lineBottom">
								<?php $categories=get_the_category(); ?>
								<?php foreach ($categories as $category) { ?>
									<?php $caTaxImg = get_field('caTax-img', 'category_'.$category->cat_ID); ?>
									<figure>
										<img src="<?php echo $caTaxImg['url']; ?>" alt="<?php echo $category->cat_name; ?>" title="<?php echo $category->cat_name; ?>">
										<figcaption>
											<h3><?php echo $category->cat_name; ?></h3>
											<!--<h4>Nombre de la columna</h4>-->
											<p><?php echo $category->description; ?></p>
										</figcaption>
									</figure>
								<?php } ?>
							</div>
						<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>

				<div class="titleBox2">
					<h2>
						Encuentra rápido lo que más te interesa leer
					</h2>
				</div>
				<?php if (true) {  ?>
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

				<div class="inpFiltro">
					<input type="date" name="fecEdit" id="fecEdit" class="datepicker picker__input" placeholder="Escoja una fecha">
				</div><br>

				<button type="submit" class="btnGeneral">
					Filtrar
				</button>

				<?php //Publicidad - Small ?>
				<?php get_template_part( 'content/content', 'pubsmall' ); ?>
			</div>

			<?php //Content ?>
			<div class="col l9 m12 s12">
				<?php $args = array(
					'posts_per_page' => '6',
					'cat' => get_query_var('cat')
				);?>
				<?php $the_query = new WP_Query($args); ?>
					<?php if ($the_query->have_posts()) : ?>
						<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
							<article class="col l6 m12 s12">
								<div class="blogerItem itemShadow margBot20">
									<div class="blogerTxt">
										<h3>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php the_title(); ?>
											</a>
										</h3>
										<p>
											<?php the_excerpt(); ?>
										</p>
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