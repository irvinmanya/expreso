<?php
/**
 * Template Name: Inicio
 */
?>
<?php get_header(); ?>

<?php if( have_rows('inicioflex-cont') ): ?>
	<?php while ( have_rows('inicioflex-cont') ) : the_row(); ?>

		<?php //Intro ?>
		<?php if( get_row_layout() == 'sec-slider' ): ?>
			<section class="secCont intro">
				<div class="container">
					<div class="row">
						<article class="col l8 m12 s12">
							<div class="sliderIntro itemShadow">
								<ul class="sliderFeat" id="sliderFeat">
									<?php $args = array(
										'posts_per_page' => '4',
										'cat' => -70, //Menos portada cat=70
										'meta_query'	=> array(
											'relation'		=> 'AND',
											array(
												'key'	 	=> 'sliderprev-opt',
												'value'	  	=> 'sliderhome',
												'compare' 	=> 'LIKE',
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
										'posts_per_page' => '4',
										'cat' => -70, //Menos portada cat=70
										'meta_query'	=> array(
											'relation'		=> 'AND',
											array(
												'key'	 	=> 'sliderprev-opt',
												'value'	  	=> 'sliderhome',
												'compare' 	=> 'LIKE',
											)
										)
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
							<?php $args = array(
								'posts_per_page' => '1',
								'cat' => 70
							);?>
							<?php $the_query = new WP_Query($args); ?>
								<?php if ($the_query->have_posts()) : ?>
									<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
										<div class="itemLast itemShadow">
											<figure>
												<figcaption class="pDayTitle">
													<h3>
														Portada del día
													</h3>
												</figcaption>
												<a href="<?php the_permalink(); ?>" class="pDay" title="<?php the_title(); ?>">
													<?php the_post_thumbnail(); ?>
												</a>
											</figure>
										</div>
									<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							<?php endif; ?>
						</article>
					</div>
				</div>
			</section>

		<?php //Noticias destacadas ?>
		<?php elseif( get_row_layout() == 'secdestacada' ): ?>
			<section class="secrow secDestac">
				<div class="container notBox">
					<div class="row">
						<div class="col l8 m12 s12 rowRell">
							<?php $secTax = get_sub_field('secdest-linkcat'); ?>
							<?php $secTax_name = $secTax->name; ?>
							<?php $secTax_id = $secTax->term_id; ?>
							<div class="titleBox2">
								<h2>
									<?php the_sub_field('secdest-titulo'); ?>
									<a href="<?php echo get_term_link( $secTax ); ?>" class="icoResp" title="<?php echo $secTax_name; ?>">
										<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="<?php echo $secTax_name; ?>" title="<?php echo $secTax_name; ?>">
									</a>
								</h2>
							</div>
							<?php $setCatHours = get_sub_field('secdest-horas') ?>
							<?php $setCatHourString = ' hours ago';
							<?php $catHours = $setCatHours.$setCatHourString; ?>

							<?php if( get_sub_field('secdest-opt') == 'descendente' ){ ?>
								<?php $args = array(
									'posts_per_page' => '3',
									'cat' => $secTax_id,
									'order' => 'DESC',
									'meta_query'	=> array(
										'relation'		=> 'AND',
										array(
											'key'		=> 'destprev-opt',
											'value'		=> 'destacadoprincipal',
											'compare' 	=> 'LIKE'
										)
									),
									'date_query' => array(
										array(
										'after' => $catHours
										)
									)
								); ?>
							<?php }elseif( get_sub_field('secdest-opt') == 'random' ){ ?>
								<?php $args = array(
									'posts_per_page' => '3',
									'cat' => $secTax_id,
									'orderby' => 'rand',
									'meta_query'	=> array(
										'relation'		=> 'AND',
										array(
											'key'		=> 'destprev-opt',
											'value'		=> 'destacadoprincipal',
											'compare' 	=> 'LIKE'
										)
									),
									'date_query' => array(
										array(
										'after' => $catHours
										)
									)
								); ?>
							<?php } ?>

							<?php $the_query = new WP_Query($args); ?>
								<?php if ($the_query->have_posts()) : ?>
									<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
										<article class="col l4 m12 s12">
											<?php get_template_part( 'content/content', 'notcard' ); ?>
										</article>
									<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							<?php endif; ?>
						</div>
						<div class="col l4 m12 s12">
							<?php if( have_rows('inicioflexsub-cont') ): ?>
								<?php while ( have_rows('inicioflexsub-cont') ) : the_row(); ?>

									<?php //Destacado del dia  ?>
									<?php if( get_row_layout() == 'indexlat-destacado' ): ?>
										<?php $args = array(
											'posts_per_page' => '1',
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
									<?php endif; ?>

								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>



		<?php //Columnista del dia ?>
		<?php elseif( get_row_layout() == 'seccolimnista' ): ?>

			<?php $args = array(
				'posts_per_page' => '6',
				'cat' => 18,
				'date_query' => array(
					array(
					'after' => '24 hours ago'
					)
				)
			);?>
			<?php $the_query = new WP_Query($args); ?>
				<?php if ($the_query->have_posts()) : ?>
					<section class="secrow secDestac">
						<div class="container notBox">
							<div class="row">
								<div class="col l12 m12 s12 rowRell">
									<div class="titleBox2">
										<h2>Columnistas del día</h2>
									</div>
									<ul class="owlColum owlColumnista">
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
														<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
															<?php the_title(); ?>
														</a>
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
									</ul>
								</div>
							</div>
						</div>
					</section>
				<?php wp_reset_postdata(); ?>
			<?php else: ?>
			<?php endif; ?>

		<?php //Modulos de noticias ?>
		<?php elseif( get_row_layout() == 'secmodulos' ): ?>
			<section class="secrow secDestac">
				<div class="container notBox">
					<div class="row">
						<div class="col l8 s12 m12">

							<?php //Tecnología ?>
							<article class="col l6 m12 s12">
								<div class="itemModNot itemShadow margBot20">
									<h3>
										<a href="http://expreso.dhdinc.info/seccion/tecnologia/" title="Tecnología">
											Tecnología
											<i>
												<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="title" title="title">
											</i>
										</a>
									</h3>
									<?php $args = array(
										'posts_per_page' => '4',
										'cat' => 1364
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
											'cat' => 1364
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

							<?php //Espectaculos ?>
							<article class="col l6 m12 s12">
								<div class="itemModNot itemShadow margBot20">
									<h3>
										<a href="http://expreso.dhdinc.info/seccion/espectaculos/" title="Espectaculos">
											Espectaculos
											<i>
												<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="title" title="title">
											</i>
										</a>
									</h3>
									<?php $args = array(
										'posts_per_page' => '4',
										'cat' => 11
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
											'cat' => 11
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

							<?php //Judicial ?>
							<article class="col l6 m12 s12">
								<div class="itemModNot itemShadow margBot20">
									<h3>
										<a href="http://expreso.dhdinc.info/seccion/judicial/" title="Judicial">
											Judicial
											<i>
												<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="title" title="title">
											</i>
										</a>
									</h3>
									<?php $args = array(
										'posts_per_page' => '4',
										'cat' => 12
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
											'cat' => 12
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

							<?php //Deportes ?>
							<article class="col l6 m12 s12">
								<div class="itemModNot itemShadow margBot20">
									<h3>
										<a href="http://expreso.dhdinc.info/seccion/judicial/" title="Deportes">
											Deportes
											<i>
												<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="title" title="title">
											</i>
										</a>
									</h3>
									<?php $args = array(
										'posts_per_page' => '4',
										'cat' => 10
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
											'cat' => 10
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

							<?php //Cultural ?>
							<article class="col l6 m12 s12">
								<div class="itemModNot itemShadow margBot20">
									<h3>
										<a href="http://expreso.dhdinc.info/seccion/cultural/" title="Cultural">
											Cultural
											<i>
												<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="title" title="title">
											</i>
										</a>
									</h3>
									<?php $args = array(
										'posts_per_page' => '4',
										'cat' => 13
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
											'cat' => 13
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

							<?php //Especiales ?>
							<article class="col l6 m12 s12">
								<div class="itemModNot itemShadow margBot20">
									<h3>
										<a href="http://expreso.dhdinc.info/seccion/especiales/" title="Especiales">
											Especiales
											<i>
												<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="title" title="title">
											</i>
										</a>
									</h3>
									<?php $args = array(
										'posts_per_page' => '4',
										'cat' => 49
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
											'cat' => 49
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

							<?php //cine ?>
							<article class="col l6 m12 s12">
								<div class="itemModNot itemShadow margBot20">
									<h3>
										<a href="http://expreso.dhdinc.info/seccion/cine/" title="Cine">
											Cine
											<i>
												<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="title" title="title">
											</i>
										</a>
									</h3>
									<?php $args = array(
										'posts_per_page' => '4',
										'cat' => 17
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
											'cat' => 17
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

							<!-- [ Nacional ] -->
							<article class="col l6 m12 s12">
								<div class="itemModNot itemShadow margBot20">
									<h3>
										<a href="http://expreso.dhdinc.info/seccion/nacional/" title="Nacional">
											Nacional
											<i>
												<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="title" title="title">
											</i>
										</a>
									</h3>
									<?php $args = array(
										'posts_per_page' => '4',
										'cat' => 8
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
											'cat' => 8
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

							<?php //Expreso TV ?>
							<?php if (false) { ?>
								<div class="col l12 m12 s12 colsinpad">
									<div class="titleBox2">
										<h2>
											Expreso TV
										</h2>
									</div>
									<div class="ytSlider ">
										<?php $args = array(
											'posts_per_page' => '1',
											'cat' => 17
										);?>
										<?php $the_query = new WP_Query($args); ?>
											<?php if ($the_query->have_posts()) : ?>
												<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
													<div class="ytBox itemShadow">
														<i></i>
														<?php the_post_thumbnail(); ?>
													</div>
												<?php endwhile; ?>
											<?php wp_reset_postdata(); ?>
										<?php endif; ?>
										<ul class="ytList owlYt">
											<?php $args = array(
												'posts_per_page' => '9',
												'cat' => 17
											);?>
											<?php $the_query = new WP_Query($args); ?>
												<?php if ($the_query->have_posts()) : ?>
													<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
														<li>
															<figure>
																<i></i>
																<?php the_post_thumbnail(); ?>
															</figure>
														</li>
													<?php endwhile; ?>
												<?php wp_reset_postdata(); ?>
											<?php endif; ?>
										</ul>
									</div>
								</div>
							<?php } ?>
						</div>
						
						<div class="col l4 s12 m12">
							
							<?php //Suplementos del dia ?>
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

		<?php endif; ?>

	<?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>

<script>
	$("#zoom_03").elevateZoom({
		gallery:'gallery_01',
		cursor: 'pointer',
		galleryActiveClass:
		'active',
		imageCrossfade: true,
		loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'
	}); 


	$("#zoom_03").bind("click", function(e) {  
		var ez = $('#zoom_03').data('elevateZoom');	
			$.fancybox(ez.getGalleryList());
		return false;
	});
</script>

</body>
</html>