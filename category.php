<?php get_header(); ?>

<?php // Intro ?>
<section class="secCont intro">
	<div class="container">
		<div class="row">
			<article class="col l8 m12 s12">
				<div class="sliderIntro itemShadow">
					<ul class="sliderFeat" id="sliderFeat">
						<?php $args = array(
							'posts_per_page' => '4',
							'cat' => get_query_var('cat')
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
							'posts_per_page' => '4',
							'cat' => get_query_var('cat')
						);?>
						<?php $the_query = new WP_Query($args); ?>
							<?php if ($the_query->have_posts()) : ?>
								<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
									<li>
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
						<?php $args = array(
							'posts_per_page' => '5',
							'cat' => get_query_var('cat')
						);?>
						<?php $the_query = new WP_Query($args); ?>
							<?php if ($the_query->have_posts()) : ?>
								<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
									<li>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php the_title(); ?>
										</a>
									</li>
								<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					</ul>
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
				<?php $args = array(
					'posts_per_page' => '4',
					'cat' => get_query_var('cat')
				);?>
				<?php $the_query = new WP_Query($args); ?>
					<?php if ($the_query->have_posts()) : ?>
						<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
							<article class="col l6 m12 s12 notcardCol2">
								<?php get_template_part( 'content/content', 'notcard' ); ?>
							</article>
						<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
			<div class="col l4 m12 s12">
				<?php $args = array(
					'posts_per_page' => '1',
					'cat' => get_query_var('cat')
				);?>
				<?php $the_query = new WP_Query($args); ?>
					<?php if ($the_query->have_posts()) : ?>
						<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
							<article class="itemLast itemShadow margBot20">
								<figure>
									<figcaption>
										<h3>
											Destacada del día
										</h3>
									</figcaption>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
									<figcaption>
										<h4>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php the_title(); ?>
											</a>
										</h4>
										<p>
											<?php the_excerpt(); ?>
										</p>
									</figcaption>
								</figure>
							</article>
						<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>

				<?php //Publicidad - Small ?>
				<?php get_template_part( 'content/content', 'pubsmall' ); ?>
			</div>
		</div>
	</div>
</section>

<?php //Seccion #2 ?>
<section class="secrow secDestac">
	<div class="container notBox">
		<div class="row">
			<div class="col l8 m12 s12 rowRell">
				<?php $args = array(
					'cat' => get_query_var('cat'),
					'orderby'        => 'rand',
					'posts_per_page' => '6'
				);?>
				<?php $the_query = new WP_Query($args); ?>
					<?php if ($the_query->have_posts()) : ?>
						<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
							<article class="col l4 m12 s12">
								<div class="notItemHome notItemArt itemShadow margBot20" style="margin-bottom:25px;">
									<figure>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php the_post_thumbnail(); ?>
										</a>
										<figcaption>
											<h3>
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
													<?php the_title(); ?>
												</a>
											</h3>
											<p>
												<?php the_excerpt(); ?>
											</p>
										</figcaption>
									</figure>
								</div>
							</article>
						<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
			<div class="col l4 m12 s12">
				<?php $args = array(
					'post_type' => 'post',
					'posts_per_page' => '1',
					'category__in' => 1377
				);?>
				<?php $the_query = new WP_Query($args); ?>
					<?php if ($the_query->have_posts()) : ?>
						<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
							<article class="itemLast itemShadow margBot20">
								<figure>
									<figcaption>
										<h3>
											Suplementos del dia
										</h3>
									</figcaption>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
									<figcaption>
										<p>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
												<?php the_title(); ?>
											</a>
										</p>
									</figcaption>
								</figure>
							</article>
						<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>

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
					<?php $args = array(
						'posts_per_page' => '6',
						'cat' => 18
					);?>
					<?php $the_query = new WP_Query($args); ?>
						<?php if ($the_query->have_posts()) : ?>
							<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
								<li>
									<?php
										$categories=get_the_category();
										$separator=", ";
										$output="";
										if($categories){ ?>
										<figure>
											<?php foreach ($categories as $category) {
												$caTaxImg = get_field('caTax-img', 'category_'.$category->cat_ID); ?>
												<a href="<?php echo get_category_link($category->term_id); ?>" title="<?php echo $category->cat_name; ?>" >
													<img src="<?php echo $caTaxImg['url']; ?>" alt="<?php echo $category->cat_name; ?>" title="<?php echo $category->cat_name; ?>">
												</a>
											<?php } ?>
										</figure>
									<?php } ?>
									<div class="columTxt">
										<h3>
											<?php the_title(); ?>
										</h3>
										<h4>
											<?php foreach ($categories as $category) {
												$output.='<a href="'.get_category_link($category->term_id).'" title="'.$category->cat_name.'" >'.$category->cat_name.'</a>'.$separator; ?>
											<?php }  ?>
											Por: <?php echo trim($output, $separator); ?>
										</h4>
										<?php the_excerpt(); ?>
									</div>
								</li>
							<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
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
						<?php $args = array(
							'orderby'        => 'rand',
							'posts_per_page' => '4',
							'cat' => get_query_var('cat')
						);?>
						<?php $the_query = new WP_Query($args); ?>
							<ul class="iModListFig">
							<?php if ($the_query->have_posts()) : ?>
								<?php $conModul = 0; ?>
								<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
									<?php if ($conModul > 0) { ?>
										<li class="desactNot">
											<figure>
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
													<?php the_post_thumbnail(); ?>
												</a>
											</figure>
										</li>
									<?php }else{ ?>
										<li class="desactNot actNot">
											<figure>
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
													<?php the_post_thumbnail(); ?>
												</a>
											</figure>
										</li>
									<?php } ?>
									<?php $conModul++; ?>
								<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
							</ul>
						<?php endif; ?>
						<ul class="iModList">
							<?php $args = array(
								'posts_per_page' => '4',
								'cat' => get_query_var('cat')
							);?>
							<?php $the_query = new WP_Query($args); ?>
								<?php if ($the_query->have_posts()) : ?>
									<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
										<li>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php the_title(); ?>
											</a>
										</li>
									<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							<?php endif; ?>
						</ul>
					</div>
				</article>

				<?php //Modulo #2 ?>
				<article class="col l6 m12 s12">
					<div class="itemModNot itemShadow margBot20">
						<?php $args = array(
							'orderby'        => 'rand',
							'posts_per_page' => '4',
							'cat' => get_query_var('cat')
						);?>
						<?php $the_query = new WP_Query($args); ?>
							<ul class="iModListFig">
							<?php if ($the_query->have_posts()) : ?>
								<?php $conModul = 0; ?>
								<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
									<?php if ($conModul > 0) { ?>
										<li class="desactNot">
											<figure>
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
													<?php the_post_thumbnail(); ?>
												</a>
											</figure>
										</li>
									<?php }else{ ?>
										<li class="desactNot actNot">
											<figure>
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
													<?php the_post_thumbnail(); ?>
												</a>
											</figure>
										</li>
									<?php } ?>
									<?php $conModul++; ?>
								<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
							</ul>
						<?php endif; ?>
						<ul class="iModList">
							<?php $args = array(
								'posts_per_page' => '4',
								'cat' => get_query_var('cat')
							);?>
							<?php $the_query = new WP_Query($args); ?>
								<?php if ($the_query->have_posts()) : ?>
									<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
										<li>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php the_title(); ?>
											</a>
										</li>
									<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							<?php endif; ?>
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