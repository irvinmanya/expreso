<?php
/**
 * Template Name: Inicio
 */
?>
<?php get_header(); ?>

<?php //Publicidad - Long ?>
<?php get_template_part( 'content/content', 'publong' ); ?>


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
							<div class="titleBox2">
								<h2>Noticias destacadas</h2>
								<a href="http://expreso.dhdinc.info/seccion/destacado/" class="icoResp" title="Noticias destacadas">
									<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="Noticias destacadas" title="Noticias destacadas">
								</a>
							</div>
							<?php $args = array(
								'posts_per_page' => '3',
								'cat' => 227,
								'meta_query'	=> array(
									'relation'		=> 'AND',
									array(
										'key'		=> 'destprev-opt',
										'value'		=> 'destacadoprincipal',
										'compare' 	=> 'LIKE'
									)
								)
							);?>
							<?php $the_query = new WP_Query($args); ?>
								<?php if ($the_query->have_posts()) : ?>
									<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
										<article class="col l4 m12 s12">
											<?php get_template_part( 'content/content', 'notcard' ); ?>
										</article>
									<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							<?php endif; ?>

							<?php if (fasle) { ?>
								<a href="http://expreso.dhdinc.info/seccion/destacado/" class="btnPlusAbs" title="Ver más">
									<i>
										<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoPlus.svg" alt="Ver más" title="Ver más">
									</i>
									Ver más
								</a>
							<?php } ?>
						</div>
						<div class="col l4 m12 s12">
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
						</div>
					</div>
				</div>
			</section>

		<?php //Política ?>
		<?php elseif( get_row_layout() == 'secpolitica' ): ?>
			<section class="secrow secDestac">
				<div class="container notBox">
					<div class="row">
						<div class="col l8 m12 s12 rowRell">
							<div class="titleBox2">
								<h2>Política</h2>
								<a href="http://expreso.dhdinc.info/seccion/politica/" class="icoResp" title="Política">
									<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="Política" title="Política">
								</a>
							</div>
							<?php $args = array(
								'posts_per_page' => '3',
								'cat' => 5,
								'meta_query'	=> array(
									'relation'		=> 'AND',
									array(
										'key'		=> 'destprev-opt',
										'value'		=> 'destacadoprincipal',
										'compare' 	=> 'LIKE'
									)
								)
							);?>
							<?php $the_query = new WP_Query($args); ?>
								<?php if ($the_query->have_posts()) : ?>
									<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
										<article class="col l4 m12 s12">
											<?php get_template_part( 'content/content', 'notcard' ); ?>
										</article>
									<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							<?php endif; ?>
							<?php if (false) { ?>
								<a href="http://expreso.dhdinc.info/seccion/politica/" class="btnPlusAbs" title="Ver más">
									<i>
										<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoPlus.svg" alt="Ver más" title="Ver más">
									</i>
									Ver más
								</a>
							<?php } ?>
						</div>
						<div class="col l4 m12 s12">
							<?php //Publicidad . small ?>
							<?php get_template_part( 'content/content', 'pubsmall' ); ?>
						</div>
					</div>
				</div>
			</section>

		<?php //Economia ?>
		<?php elseif( get_row_layout() == 'sececonomia' ): ?>
			<section class="secrow secDestac">
				<div class="container notBox">
					<div class="row">
						<div class="col l8 m12 s12 rowRell">
							<div class="titleBox2">
								<h2>Economía</h2>
								<a href="http://expreso.dhdinc.info/seccion/economia/" class="icoResp" title="Economía">
									<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="Economía" title="Economía">
								</a>
							</div>
							<?php $args = array(
								'posts_per_page' => '3',
								'cat' => 6,
								'meta_query'	=> array(
									'relation'		=> 'AND',
									array(
										'key'		=> 'destprev-opt',
										'value'		=> 'destacadoprincipal',
										'compare' 	=> 'LIKE'
									)
								)
							);?>
							<?php $the_query = new WP_Query($args); ?>
								<?php if ($the_query->have_posts()) : ?>
									<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
										<article class="col l4 m12 s12">
											<?php get_template_part( 'content/content', 'notcard' ); ?>
										</article>
									<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							<?php endif; ?>
							<?php if (fasle) { ?>
								<a href="http://expreso.dhdinc.info/seccion/economia/" class="btnPlusAbs" title="Ver más">
									<i>
										<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoPlus.svg" alt="Ver más" title="Ver más">
									</i>
									Ver más
								</a>
							<?php } ?>
						</div>
						<div class="col l4 m12 s12">
							<article class="itemLastMin itemShadow margBot20 ">
								<h3>
									Último minuto
								</h3>
								<ul>
									<?php $args = array(
										'posts_per_page' => '6',
										'cat' => 6
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
								</figure>
							</article>
						</div>
					</div>
				</div>
			</section>

		<?php //Actualidad ?>
		<?php elseif( get_row_layout() == 'secactualidad' ): ?>
			<section class="secrow secDestac">
				<div class="container notBox">
					<div class="row">
						<div class="col l8 m12 s12 rowRell">
							<div class="titleBox2">
								<h2>Actualidad</h2>
								<a href="http://expreso.dhdinc.info/seccion/actualidad/" class="icoResp" title="Actualidad">
									<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="Actualidad" title="Actualidad">
								</a>
							</div>
							<?php $args = array(
								'posts_per_page' => '3',
								'cat' => 29,
								'meta_query'	=> array(
									'relation'		=> 'AND',
									array(
										'key'		=> 'destprev-opt',
										'value'		=> 'destacadoprincipal',
										'compare' 	=> 'LIKE'
									)
								)
							);?>
							<?php $the_query = new WP_Query($args); ?>
								<?php if ($the_query->have_posts()) : ?>
									<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
										<article class="col l4 m12 s12">
											<?php get_template_part( 'content/content', 'notcard' ); ?>
										</article>
									<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							<?php endif; ?>

							<?php if (false) { ?>
								<a href="http://expreso.dhdinc.info/seccion/actualidad/" class="btnPlusAbs" title="Ver más">
									<i>
										<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoPlus.svg" alt="Ver más" title="Ver más">
									</i>
									Ver más
								</a>
							<?php } ?>
						</div>
						<div class="col l4 m12 s12">
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
						</div>
					</div>
				</div>
			</section>
		
		<?php //Mundo ?>
		<?php elseif( get_row_layout() == 'secmundo' ): ?>
			<section class="secrow secDestac">
				<div class="container notBox">
					<div class="row">
						<div class="col l8 m12 s12 rowRell">
							<div class="titleBox2">
								<h2>Mundo</h2>
								<a href="http://expreso.dhdinc.info/seccion/mundo/" class="icoResp" title="Mundo">
									<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="Mundo" title="Mundo">
								</a>
							</div>
							<?php $args = array(
								'posts_per_page' => '3',
								'cat' => 9,
								'meta_query'	=> array(
									'relation'		=> 'AND',
									array(
										'key'		=> 'destprev-opt',
										'value'		=> 'destacadoprincipal',
										'compare' 	=> 'LIKE'
									)
								)
							);?>
							<?php $the_query = new WP_Query($args); ?>
								<?php if ($the_query->have_posts()) : ?>
									<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
										<article class="col l4 m12 s12">
											<?php get_template_part( 'content/content', 'notcard' ); ?>
										</article>
									<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							<?php endif; ?>
							<?php if (false) { ?>
								<a href="http://expreso.dhdinc.info/seccion/mundo/" class="btnPlusAbs" title="Ver más">
									<i>
										<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoPlus.svg" alt="Ver más" title="Ver más">
									</i>
									Ver más
								</a>
							<?php } ?>
						</div>
						<div class="col l4 m12 s12">
							<?php //Publicidad - Small ?>
							<?php get_template_part( 'content/content', 'pubsmall' ); ?>
						</div>
					</div>
				</div>
			</section>

		<?php //Columnista del dia ?>
		<?php elseif( get_row_layout() == 'seccolimnista' ): ?>
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
										'posts_per_page' => '1',
										'cat' => 1364
									);?>
									<?php $the_query = new WP_Query($args); ?>
										<ul class="iModListFig">
										<?php if ($the_query->have_posts()) : ?>
											<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
												<li>
													<figure>
														<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
															<?php the_post_thumbnail(); ?>
														</a>
													</figure>
												</li>
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
										'posts_per_page' => '1',
										'cat' => 11
									);?>
									<?php $the_query = new WP_Query($args); ?>
										<ul class="iModListFig">
										<?php if ($the_query->have_posts()) : ?>
											<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
												<li>
													<figure>
														<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
															<?php the_post_thumbnail(); ?>
														</a>
													</figure>
												</li>
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
										'posts_per_page' => '1',
										'cat' => 12
									);?>
									<?php $the_query = new WP_Query($args); ?>
										<ul class="iModListFig">
										<?php if ($the_query->have_posts()) : ?>
											<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
												<li>
													<figure>
														<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
															<?php the_post_thumbnail(); ?>
														</a>
													</figure>
												</li>
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
										'posts_per_page' => '1',
										'cat' => 10
									);?>
									<?php $the_query = new WP_Query($args); ?>
										<ul class="iModListFig">
										<?php if ($the_query->have_posts()) : ?>
											<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
												<li>
													<figure>
														<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
															<?php the_post_thumbnail(); ?>
														</a>
													</figure>
												</li>
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
										'posts_per_page' => '1',
										'cat' => 13
									);?>
									<?php $the_query = new WP_Query($args); ?>
										<ul class="iModListFig">
										<?php if ($the_query->have_posts()) : ?>
											<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
												<li>
													<figure>
														<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
															<?php the_post_thumbnail(); ?>
														</a>
													</figure>
												</li>
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
										'posts_per_page' => '1',
										'cat' => 49
									);?>
									<?php $the_query = new WP_Query($args); ?>
										<ul class="iModListFig">
										<?php if ($the_query->have_posts()) : ?>
											<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
												<li>
													<figure>
														<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
															<?php the_post_thumbnail(); ?>
														</a>
													</figure>
												</li>
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
										'posts_per_page' => '1',
										'cat' => 17
									);?>
									<?php $the_query = new WP_Query($args); ?>
										<ul class="iModListFig">
										<?php if ($the_query->have_posts()) : ?>
											<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
												<li>
													<figure>
														<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
															<?php the_post_thumbnail(); ?>
														</a>
													</figure>
												</li>
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
										'posts_per_page' => '1',
										'cat' => 8
									);?>
									<?php $the_query = new WP_Query($args); ?>
										<ul class="iModListFig">
										<?php if ($the_query->have_posts()) : ?>
											<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
												<li>
													<figure>
														<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
															<?php the_post_thumbnail(); ?>
														</a>
													</figure>
												</li>
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

							<!-- [ Youtube ] -->
							<div class="col l12 m12 s12 colsinpad">
								<div class="titleBox2">
									<h2>
										Expreso TV
									</h2>
								</div>
								<div class="ytSlider ">
									<div class="ytBox itemShadow">
										<i></i>
										<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
									</div>
									<ul class="ytList owlYt">
										<li>
											<figure>
												<i></i>
												<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
											</figure>
										</li>
										<li>
											<figure>
												<i></i>
												<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
											</figure>
										</li>
										<li>
											<figure>
												<i></i>
												<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
											</figure>
										</li>
										<li>
											<figure>
												<i></i>
												<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
											</figure>
										</li>
										<li>
											<figure>
												<i></i>
												<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
											</figure>
										</li>
										<li>
											<figure>
												<i></i>
												<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
											</figure>
										</li>
									</ul>
								</div>
							</div>
						</div>
						
						<div class="col l4 s12 m12">

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

							<!-- [ Blogueros ] -->
							<div class="blogerList">
								<div class="titleBox2">
									<h2>
										Nuestros blogueros
									</h2>
								</div>
								<ul class="owlBlog owlBlogueros">
									<?php $args = array(
										'posts_per_page' => '4',
										'cat' => 131
									);?>
									<?php $the_query = new WP_Query($args); ?>
										<?php if ($the_query->have_posts()) : ?>
											<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
												<li class="itemShadow">
													<?php
														$categories=get_the_category();
														$separator=", ";
														$output="";
														if($categories){ ?>
														<figure>
															<?php foreach ($categories as $category) {
																$caTaxImg = get_field('caTax-img', 'category_'.$category->cat_ID); ?>
																<a href="<?php echo get_category_link($category->term_id); ?>" title="<?php echo $category->cat_name; ?>" >
																	<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/bloguero.png" alt="title" title="title">
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

							<?php //Publicidad - Small ?>
							<?php get_template_part( 'content/content', 'pubsmall' ); ?>
							
							<!-- [ Suplementos del dia ] -->
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

							<?php //Publicidad - Small ?>
							<?php get_template_part( 'content/content', 'pubsmall' ); ?>

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