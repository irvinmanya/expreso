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
										'cat' => -131,-1379,-39,-48,-35,-18,-19,-70,-20, //Menos portada cat=70
										'meta_query'	=> array(
											'relation'		=> 'AND',
											array(
												'key'	 	=> 'sliderprev-opt',
												'value'	  	=> 'sliderhome',
												'compare' 	=> 'LIKE',
											)
										)
									);?>

									<?php $ids = array(); ?>

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
												<?php array_push( $ids, get_the_ID() ); ?>
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
										'cat' => -131,-1379,-39,-48,-35,-18,-19,-70,-20, //Menos portada cat=70
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
						<div class="col l4 m12 s12">
							<?php if( have_rows('inicioflexsub-cont') ): ?>
								<?php while ( have_rows('inicioflexsub-cont') ) : the_row(); ?>

									<?php //Portada del dia ?>
									<?php if( get_row_layout() == 'indexlat-portday' ): ?>
										<?php $args = array(
											'posts_per_page' => '1',
											'cat' => 20
										);?>
										<?php $the_query = new WP_Query($args); ?>
											<?php if ($the_query->have_posts()) : ?>
												<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
													<div class="itemLast itemShadow">
														<figure>
															<figcaption class="pDayTitle">
																<h3>
																	<?php the_sub_field('indexlat-pdtitulo'); ?>
																</h3>
															</figcaption>
															<a href="<?php echo site_url(); ?>/<?php echo $menu_item->url ?>/seccion/galeria-de-portadas/" class="pDay" title="<?php the_title(); ?>">
																<?php the_post_thumbnail(); ?>
															</a>
														</figure>
													</div>
												<?php endwhile; ?>
											<?php wp_reset_postdata(); ?>
										<?php endif; ?>

									<?php //Destacado del dia ?>
									<?php elseif( get_row_layout() == 'indexlat-destacado' ): ?>

										<?php $latTax = get_sub_field('indexlat-dcat'); ?>
										<?php $latTax_name = $latTax->name; ?>
										<?php $latTax_id = $latTax->term_id; ?>

										<?php $args = array(
											'posts_per_page' => '1',
											'meta_query'	=> array(
												'relation'		=> 'AND',
												array(
													'key'	 	=> 'destprev-opt',
													'value'	  	=> 'destacadodeldia',
													'compare' 	=> 'LIKE',
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
																	<?php the_sub_field('indexlat-dtitulo'); ?>
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

									<?php //Expreso TV ?>
									<?php elseif( get_row_layout() == 'indexlat-tv' ): ?>

										<?php $latTatv = get_sub_field('indexlat-tvcat'); ?>
										<?php $latTatv_name = $latTatv->name; ?>
										<?php $latTatv_id = $latTatv->term_id; ?>

										<article id="expTv" class="itemModNotTV itemShadow margBot20">
											<h3>
												<a href="<?php echo get_term_link( $latTatv ); ?>" title="<?php the_sub_field('indexlat-tvtitulo'); ?>">
													<?php the_sub_field('indexlat-tvtitulo'); ?>
													<a href="<?php echo get_term_link( $latTatv ); ?>" class="icoResp" title="<?php echo $latTatv_name; ?>">
														<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="<?php echo $latTatv_name; ?>" title="<?php echo $latTatv_name; ?>">
													</a>
												</a>
											</h3>
											<?php $tvNpost = get_sub_field('indexlat-tvnpost'); ?>

											<?php if( get_sub_field('indexlat-tvord') == 'aleatorio' ) { ?>
												<?php $args = array(
													'posts_per_page' => $tvNpost,
													'cat' => 1380,
													'orderby' => 'rand'
												); ?>
											<?php }else{ ?>
												<?php $args = array(
													'posts_per_page' => $tvNpost,
													'cat' => 1380
												); ?>
											<?php } ?>

											<?php $the_query = new WP_Query($args); ?>
												<ul class="iModListFig">
												<?php if ($the_query->have_posts()) : ?>
													<?php $conModul = 0; ?>
													<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
														<?php if ($conModul > 0) { ?>
															<li class="desactNot">
																<figure class="vidACF">
																	<?php the_field('destacimg-video'); ?>
																</figure>
															</li>
														<?php }else{ ?>
															<li class="desactNot actNot">
																<figure class="vidACF">
																	<?php the_field('destacimg-video'); ?>
																</figure>
															</li>
														<?php } ?>
														<?php $conModul++; ?>
													<?php endwhile; ?>
												<?php wp_reset_postdata(); ?>
												<?php if (false) { ?>
													<div class="epTvPlay">
														<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoPlay.svg" alt="Play" title="Play">
													</div>
												<?php } ?>
												</ul>
											<?php endif; ?>
											<ul class="iModList iModListVid">
												<?php if( get_sub_field('indexlat-tvord') == 'aleatorio' ) { ?>
													<?php $args = array(
														'posts_per_page' => $tvNpost,
														'cat' => 1380,
														'orderby' => 'rand'
													); ?>
												<?php }else{ ?>
													<?php $args = array(
														'posts_per_page' => $tvNpost,
														'cat' => 1380
													); ?>
												<?php } ?>

												<?php $the_query = new WP_Query($args); ?>
													<?php if ($the_query->have_posts()) : ?>
														<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
															<li>
																<a href="javascript:void(0)" title="<?php the_title(); ?>">
																	<?php the_title(); ?>
																</a>
															</li>
														<?php endwhile; ?>
													<?php wp_reset_postdata(); ?>
												<?php endif; ?>
											</ul>
											<a class="vmETV" href="<?php echo get_term_link( $latTatv ); ?>" title="<?php the_sub_field('indexlat-tvtitulo'); ?>">
												Ver más videos
											</a>
										</article>

									<?php //Ultimo minuto ?>
									<?php elseif( get_row_layout() == 'indexlat-um' ): ?>
										<article class="itemLastMin itemShadow margBot20 ">

											<h3>
												<?php the_sub_field('indexlat-umtitulo'); ?>
											</h3>
											<ul>
												<?php $catNpost = get_sub_field('indexlat-umnpost'); ?>

												<?php if( get_sub_field('indexlat-umcat') == 'descendente' ) { ?>

													<?php $args = array(
														'posts_per_page' => $catNpost,
														'cat' => -19,
														'order' => 'DESC'
													);?>

												<?php }elseif( get_sub_field('indexlat-umcat') == 'aleatorio' ){ ?>

													<?php $args = array(
														'posts_per_page' => $catNpost,
														'cat' => -19,
														'orderby' => 'rand'
													);?>

												<?php } ?>

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

									<?php //Suplementos ?>
									<?php elseif( get_row_layout() == 'indexlat-supl' ): ?>
										<?php $latTax = get_sub_field('indexlat-supcat'); ?>
										<?php $latTax_name = $latTax->name; ?>
										<?php $latTax_id = $latTax->term_id; ?>

										<?php $args = array(
											'posts_per_page' => '1',
											'cat' => $latTax
										); ?>
										<?php $the_query = new WP_Query($args); ?>
											<?php if ($the_query->have_posts()) : ?>
												<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
													<article class="itemLast itemShadow margBot20">
														<figure>
															<figcaption>
																<h3>
																	<a href="<?php echo get_term_link( $latTax ); ?>" title="<?php the_sub_field('indexlat-suptitulo'); ?>">
																		<?php the_sub_field('indexlat-suptitulo'); ?>
																		<a href="<?php echo get_term_link( $latTax ); ?>" class="icoResp" title="<?php echo $latTatv_name; ?>">
																			<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="<?php the_sub_field('indexlat-suptitulo'); ?>" title="<?php the_sub_field('indexlat-suptitulo'); ?>">
																		</a>
																	</a>
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

									<?php //Blogueros ?>
									<?php elseif( get_row_layout() == 'indexlat-blog' ): ?>

										<?php $latTax = get_sub_field('indexlat-blocat'); ?>
										<?php $latTax_name = $latTax->name; ?>
										<?php $latTax_id = $latTax->term_id; ?>

										<?php $catNpst = get_sub_field('indexlat-blonpost'); ?>
										<div class="blogerList">

											<div class="titleBox2">
												<h2>
													<?php the_sub_field('indexlat-blogtitulo'); ?>
												</h2>
											</div>

											<ul class="owlBlog owlBlogueros">

												<?php
												$news_cat_ID = get_cat_ID( 'blogueros' ); 
												$news_cats   = get_categories( "parent=$news_cat_ID&number=$catNpst&orderby=modified" );
												$news_query  = new WP_Query;
												foreach ( $news_cats as $news_cat ) :
												    $news_query->query( array(
												        'cat'                 => $news_cat->term_id,
												        'posts_per_page'      => 1,
												        'no_found_rows'       => true,
												        'ignore_sticky_posts' => true,
												    ));
												    ?>
												    <?php while ( $news_query->have_posts() ) : $news_query->the_post() ?>

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
																		<div class="catBloger">
																		<?php foreach ($categories as $category) {
																			$output.='<a href="'.get_category_link($category->term_id).'" title="'.$category->cat_name.'" >'.$category->cat_name.'</a>'.$separator; ?>
																		<?php }  ?>
																		</div>
																		Por: <?php echo trim($output, $separator); ?>
																	</h4>
																	<?php the_excerpt(); ?>
																</div>
															</li>
												    <?php endwhile ?>
													<?php wp_reset_postdata(); ?>
												<?php endforeach ?>


											</ul>
										</div>
									
									<?php //Encuesta ?>
									<?php elseif( get_row_layout() == 'indexlat-poll' ): ?>
										<div class="encBox itemShadow margBot20">
											<?php if (function_exists('vote_poll') && !in_pollarchive()): ?>
												<ul>
													<li>
														<?php get_poll();?>
													</li>
												</ul>
											<?php endif; ?>
										</div>

									<?php //Publicidad ?>
									<?php elseif( get_row_layout() == 'indexlat-publ' ): ?>
										<div class="itemLast itemShadow pubLateral margBot20">
											<?php the_sub_field('indexlat-publcod'); ?>
										</div>

									<?php //Publicidad Responsive ?>
									<?php elseif( get_row_layout() == 'indexlat-publresp' ): ?>
										<div class="itemLast itemShadow pubLateralResp margBot20">
											<?php the_sub_field('indexlat-publcodresp'); ?>
										</div>
									<?php endif; ?>

								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>

		<?php //Noticias destacadas - Principal ?>
		<?php elseif( get_row_layout() == 'secdestpri' ): ?>
			<section class="secrow secDestac">
				<div class="container notBox">
					<div class="row">
						<div class="col l8 m12 s12 rowRell rowResp">
							<div class="titleBox2">
								<h2>
									<?php the_sub_field('secdestpri-titulo'); ?>
								</h2>
							</div>

							<?php $setCatHours = get_sub_field('secdestpri-horas') ?>
							<?php $setCatHourString = ' hours ago'; ?>
							<?php $catHours = $setCatHours.$setCatHourString; ?>

							<?php if( get_sub_field('secdestpri-opt') == 'descendente' ){ ?>
								<?php $args = array(
									'posts_per_page' => '3',
									'cat' => -131,-1379,-39,-48,-35,-18,-19,-70,-20, //Menos portada cat=70
									'post__not_in' => $ids,
									'order' => 'DESC',
									'date_query' => array(
										array(
										'after' => $catHours
										)
									),
									'meta_query'	=> array(
										'relation'		=> 'AND',
										array(
											'key'	 	=> 'destprev-opt',
											'value'	  	=> 'destacadoprincipal',
											'compare' 	=> 'LIKE',
										)
									)
								); ?>
							<?php }elseif( get_sub_field('secdestpri-opt') == 'random' ){ ?>
								<?php $args = array(
									'posts_per_page' => '3',
									'cat' => -131,-1379,-39,-48,-35,-18,-19,-70,-20, //Menos portada cat=70
									'post__not_in' => $ids,
									'orderby' => 'rand',
									'date_query' => array(
										array(
										'after' => $catHours
										)
									),
									'meta_query'	=> array(
										'relation'		=> 'AND',
										array(
											'key'	 	=> 'destprev-opt',
											'value'	  	=> 'destacadoprincipal',
											'compare' 	=> 'LIKE',
										)
									)
								); ?>
							<?php } ?>

							<?php $idsDest = array(); ?>

							<?php $the_query = new WP_Query($args); ?>
								<?php if ($the_query->have_posts()) : ?>
									<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
										<article class="col l4 m12 s12">
											<?php get_template_part( 'content/content', 'notcard' ); ?>
										</article>
										<?php array_push( $idsDest, get_the_ID() ); ?>
									<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							<?php endif; ?>

						</div>
						<div class="col l4 m12 s12">
							<?php if( have_rows('inicioflexsub-cont') ): ?>
								<?php while ( have_rows('inicioflexsub-cont') ) : the_row(); ?>

									<?php //Portada del dia ?>
									<?php if( get_row_layout() == 'indexlat-portday' ): ?>
										<?php $args = array(
											'posts_per_page' => '1',
											'cat' => 20
										);?>
										<?php $the_query = new WP_Query($args); ?>
											<?php if ($the_query->have_posts()) : ?>
												<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
													<div class="itemLast itemShadow">
														<figure>
															<figcaption class="pDayTitle">
																<h3>
																	<?php the_sub_field('indexlat-pdtitulo'); ?>
																</h3>
															</figcaption>
															<a href="<?php echo site_url(); ?>/<?php echo $menu_item->url ?>/seccion/galeria-de-portadas/" class="pDay" title="<?php the_title(); ?>">
																<?php the_post_thumbnail(); ?>
															</a>
														</figure>
													</div>
												<?php endwhile; ?>
											<?php wp_reset_postdata(); ?>
										<?php endif; ?>

									<?php //Destacado del dia ?>
									<?php elseif( get_row_layout() == 'indexlat-destacado' ): ?>

										<?php $latTax = get_sub_field('indexlat-dcat'); ?>
										<?php $latTax_name = $latTax->name; ?>
										<?php $latTax_id = $latTax->term_id; ?>

										<?php $args = array(
											'posts_per_page' => '1',
											'meta_query'	=> array(
												'relation'		=> 'AND',
												array(
													'key'	 	=> 'destprev-opt',
													'value'	  	=> 'destacadodeldia',
													'compare' 	=> 'LIKE',
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
																	<?php the_sub_field('indexlat-dtitulo'); ?>
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

									<?php //Expreso TV ?>
									<?php elseif( get_row_layout() == 'indexlat-tv' ): ?>

										<?php $latTatv = get_sub_field('indexlat-tvcat'); ?>
										<?php $latTatv_name = $latTatv->name; ?>
										<?php $latTatv_id = $latTatv->term_id; ?>

										<article id="expTv" class="itemModNotTV itemShadow margBot20">
											<h3>
												<a href="<?php echo get_term_link( $latTatv ); ?>" title="<?php the_sub_field('indexlat-tvtitulo'); ?>">
													<?php the_sub_field('indexlat-tvtitulo'); ?>
													<a href="<?php echo get_term_link( $latTatv ); ?>" class="icoResp" title="<?php echo $latTatv_name; ?>">
														<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="<?php echo $latTatv_name; ?>" title="<?php echo $latTatv_name; ?>">
													</a>
												</a>
											</h3>
											<?php $tvNpost = get_sub_field('indexlat-tvnpost'); ?>

											<?php if( get_sub_field('indexlat-tvord') == 'aleatorio' ) { ?>
												<?php $args = array(
													'posts_per_page' => $tvNpost,
													'cat' => 1380,
													'orderby' => 'rand'
												); ?>
											<?php }else{ ?>
												<?php $args = array(
													'posts_per_page' => $tvNpost,
													'cat' => 1380
												); ?>
											<?php } ?>

											<?php $the_query = new WP_Query($args); ?>
												<ul class="iModListFig">
												<?php if ($the_query->have_posts()) : ?>
													<?php $conModul = 0; ?>
													<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
														<?php if ($conModul > 0) { ?>
															<li class="desactNot">
																<figure class="vidACF">
																	<?php the_field('destacimg-video'); ?>
																</figure>
															</li>
														<?php }else{ ?>
															<li class="desactNot actNot">
																<figure class="vidACF">
																	<?php the_field('destacimg-video'); ?>
																</figure>
															</li>
														<?php } ?>
														<?php $conModul++; ?>
													<?php endwhile; ?>
												<?php wp_reset_postdata(); ?>
												<?php if (false) { ?>
													<div class="epTvPlay">
														<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoPlay.svg" alt="Play" title="Play">
													</div>
												<?php } ?>
												</ul>
											<?php endif; ?>
											<ul class="iModList iModListVid">
												<?php if( get_sub_field('indexlat-tvord') == 'aleatorio' ) { ?>
													<?php $args = array(
														'posts_per_page' => $tvNpost,
														'cat' => 1380,
														'orderby' => 'rand'
													); ?>
												<?php }else{ ?>
													<?php $args = array(
														'posts_per_page' => $tvNpost,
														'cat' => 1380
													); ?>
												<?php } ?>

												<?php $the_query = new WP_Query($args); ?>
													<?php if ($the_query->have_posts()) : ?>
														<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
															<li>
																<a href="javascript:void(0)" title="<?php the_title(); ?>">
																	<?php the_title(); ?>
																</a>
															</li>
														<?php endwhile; ?>
													<?php wp_reset_postdata(); ?>
												<?php endif; ?>
											</ul>
											<a class="vmETV" href="<?php echo get_term_link( $latTatv ); ?>" title="<?php the_sub_field('indexlat-tvtitulo'); ?>">
												Ver más videos
											</a>
										</article>

									<?php //Ultimo minuto ?>
									<?php elseif( get_row_layout() == 'indexlat-um' ): ?>
										<article class="itemLastMin itemShadow margBot20 ">

											<h3>
												<?php the_sub_field('indexlat-umtitulo'); ?>
											</h3>
											<ul>
												<?php $catNpost = get_sub_field('indexlat-umnpost'); ?>

												<?php if( get_sub_field('indexlat-umcat') == 'descendente' ) { ?>

													<?php $args = array(
														'posts_per_page' => $catNpost,
														'cat' => -19,
														'order' => 'DESC'
													);?>

												<?php }elseif( get_sub_field('indexlat-umcat') == 'aleatorio' ){ ?>

													<?php $args = array(
														'posts_per_page' => $catNpost,
														'cat' => -19,
														'orderby' => 'rand'
													);?>

												<?php } ?>

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

									<?php //Suplementos ?>
									<?php elseif( get_row_layout() == 'indexlat-supl' ): ?>
										<?php $latTax = get_sub_field('indexlat-supcat'); ?>
										<?php $latTax_name = $latTax->name; ?>
										<?php $latTax_id = $latTax->term_id; ?>

										<?php $args = array(
											'posts_per_page' => '1',
											'cat' => $latTax
										); ?>
										<?php $the_query = new WP_Query($args); ?>
											<?php if ($the_query->have_posts()) : ?>
												<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
													<article class="itemLast itemShadow margBot20">
														<figure>
															<figcaption>
																<h3>
																	<a href="<?php echo get_term_link( $latTax ); ?>" title="<?php the_sub_field('indexlat-suptitulo'); ?>">
																		<?php the_sub_field('indexlat-suptitulo'); ?>
																		<a href="<?php echo get_term_link( $latTax ); ?>" class="icoResp" title="<?php echo $latTatv_name; ?>">
																			<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="<?php the_sub_field('indexlat-suptitulo'); ?>" title="<?php the_sub_field('indexlat-suptitulo'); ?>">
																		</a>
																	</a>
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

									<?php //Blogueros ?>
									<?php elseif( get_row_layout() == 'indexlat-blog' ): ?>

										<?php $latTax = get_sub_field('indexlat-blocat'); ?>
										<?php $latTax_name = $latTax->name; ?>
										<?php $latTax_id = $latTax->term_id; ?>

										<?php $catNpst = get_sub_field('indexlat-blonpost'); ?>
										<div class="blogerList">

											<div class="titleBox2">
												<h2>
													<?php the_sub_field('indexlat-blogtitulo'); ?>
												</h2>
											</div>

											<ul class="owlBlog owlBlogueros">

												<?php
												$news_cat_ID = get_cat_ID( 'blogueros' ); 
												$news_cats   = get_categories( "parent=$news_cat_ID&number=$catNpst&orderby=modified" );
												$news_query  = new WP_Query;
												foreach ( $news_cats as $news_cat ) :
												    $news_query->query( array(
												        'cat'                 => $news_cat->term_id,
												        'posts_per_page'      => 1,
												        'no_found_rows'       => true,
												        'ignore_sticky_posts' => true,
												    ));
												    ?>
												    <?php while ( $news_query->have_posts() ) : $news_query->the_post() ?>

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
																		<div class="catBloger">
																		<?php foreach ($categories as $category) {
																			$output.='<a href="'.get_category_link($category->term_id).'" title="'.$category->cat_name.'" >'.$category->cat_name.'</a>'.$separator; ?>
																		<?php }  ?>
																		</div>
																		Por: <?php echo trim($output, $separator); ?>
																	</h4>
																	<?php the_excerpt(); ?>
																</div>
															</li>
												    <?php endwhile ?>
													<?php wp_reset_postdata(); ?>
												<?php endforeach ?>


											</ul>
										</div>
									
									<?php //Encuesta ?>
									<?php elseif( get_row_layout() == 'indexlat-poll' ): ?>
										<div class="encBox itemShadow margBot20">
											<?php if (function_exists('vote_poll') && !in_pollarchive()): ?>
												<ul>
													<li>
														<?php get_poll();?>
													</li>
												</ul>
											<?php endif; ?>
										</div>

									<?php //Publicidad ?>
									<?php elseif( get_row_layout() == 'indexlat-publ' ): ?>
										<div class="itemLast itemShadow pubLateral margBot20">
											<?php the_sub_field('indexlat-publcod'); ?>
										</div>

									<?php //Publicidad Responsive ?>
									<?php elseif( get_row_layout() == 'indexlat-publresp' ): ?>
										<div class="itemLast itemShadow pubLateralResp margBot20">
											<?php the_sub_field('indexlat-publcodresp'); ?>
										</div>
									<?php endif; ?>

								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>

		<?php //Noticias destacadas ?>
		<?php elseif( get_row_layout() == 'secdestacada' ): ?>
			<section class="secrow secDestac">
				<div class="container notBox">
					<div class="row">
						<div class="col l8 m12 s12 rowRell rowResp">
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
							<?php $setCatHourString = ' hours ago'; ?>
							<?php $catHours = $setCatHours.$setCatHourString; ?>

							<?php $idsSlDest = array_merge($ids, $idsDest); ?>

							<?php if( get_sub_field('secdest-opt') == 'descendente' ){ ?>
								<?php $args = array(
									'posts_per_page' => '3',
									'cat' => $secTax_id,
									'post__not_in' => $idsSlDest,
									'order' => 'DESC',
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
									'post__not_in' => $idsSlDest,
									'orderby' => 'rand',
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

									<?php //Portada del dia ?>
									<?php if( get_row_layout() == 'indexlat-portday' ): ?>
										<?php $args = array(
											'posts_per_page' => '1',
											'cat' => 20
										);?>
										<?php $the_query = new WP_Query($args); ?>
											<?php if ($the_query->have_posts()) : ?>
												<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
													<div class="itemLast itemShadow">
														<figure>
															<figcaption class="pDayTitle">
																<h3>
																	<?php the_sub_field('indexlat-pdtitulo'); ?>
																</h3>
															</figcaption>
															<a href="<?php echo site_url(); ?>/<?php echo $menu_item->url ?>/seccion/galeria-de-portadas/" class="pDay" title="<?php the_title(); ?>">
																<?php the_post_thumbnail(); ?>
															</a>
														</figure>
													</div>
												<?php endwhile; ?>
											<?php wp_reset_postdata(); ?>
										<?php endif; ?>

									<?php //Destacado del dia ?>
									<?php elseif( get_row_layout() == 'indexlat-destacado' ): ?>

										<?php $latTax = get_sub_field('indexlat-dcat'); ?>
										<?php $latTax_name = $latTax->name; ?>
										<?php $latTax_id = $latTax->term_id; ?>

										<?php $args = array(
											'posts_per_page' => '1',
											'meta_query'	=> array(
												'relation'		=> 'AND',
												array(
													'key'	 	=> 'destprev-opt',
													'value'	  	=> 'destacadodeldia',
													'compare' 	=> 'LIKE',
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
																	<?php the_sub_field('indexlat-dtitulo'); ?>
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

									<?php //Expreso TV ?>
									<?php elseif( get_row_layout() == 'indexlat-tv' ): ?>

										<?php $latTatv = get_sub_field('indexlat-tvcat'); ?>
										<?php $latTatv_name = $latTatv->name; ?>
										<?php $latTatv_id = $latTatv->term_id; ?>

										<article id="expTv" class="itemModNotTV itemShadow margBot20">
											<h3>
												<a href="<?php echo get_term_link( $latTatv ); ?>" title="<?php the_sub_field('indexlat-tvtitulo'); ?>">
													<?php the_sub_field('indexlat-tvtitulo'); ?>
													<a href="<?php echo get_term_link( $latTatv ); ?>" class="icoResp" title="<?php echo $latTatv_name; ?>">
														<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="<?php echo $latTatv_name; ?>" title="<?php echo $latTatv_name; ?>">
													</a>
												</a>
											</h3>
											<?php $tvNpost = get_sub_field('indexlat-tvnpost'); ?>

											<?php if( get_sub_field('indexlat-tvord') == 'aleatorio' ) { ?>
												<?php $args = array(
													'posts_per_page' => $tvNpost,
													'cat' => 1380,
													'orderby' => 'rand'
												); ?>
											<?php }else{ ?>
												<?php $args = array(
													'posts_per_page' => $tvNpost,
													'cat' => 1380
												); ?>
											<?php } ?>

											<?php $the_query = new WP_Query($args); ?>
												<ul class="iModListFig">
												<?php if ($the_query->have_posts()) : ?>
													<?php $conModul = 0; ?>
													<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
														<?php if ($conModul > 0) { ?>
															<li class="desactNot">
																<figure class="vidACF">
																	<?php the_field('destacimg-video'); ?>
																</figure>
															</li>
														<?php }else{ ?>
															<li class="desactNot actNot">
																<figure class="vidACF">
																	<?php the_field('destacimg-video'); ?>
																</figure>
															</li>
														<?php } ?>
														<?php $conModul++; ?>
													<?php endwhile; ?>
												<?php wp_reset_postdata(); ?>
												<?php if (false) { ?>
													<div class="epTvPlay">
														<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoPlay.svg" alt="Play" title="Play">
													</div>
												<?php } ?>
												</ul>
											<?php endif; ?>
											<ul class="iModList iModListVid">
												<?php if( get_sub_field('indexlat-tvord') == 'aleatorio' ) { ?>
													<?php $args = array(
														'posts_per_page' => $tvNpost,
														'cat' => $latTatv,
														'orderby' => 'rand'
													); ?>
												<?php }else{ ?>
													<?php $args = array(
														'posts_per_page' => $tvNpost,
														'cat' => $latTatv
													); ?>
												<?php } ?>

												<?php $the_query = new WP_Query($args); ?>
													<?php if ($the_query->have_posts()) : ?>
														<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
															<li>
																<a href="javascript:void(0)" title="<?php the_title(); ?>">
																	<?php the_title(); ?>
																</a>
															</li>
														<?php endwhile; ?>
													<?php wp_reset_postdata(); ?>
												<?php endif; ?>
											</ul>
											<a class="vmETV" href="<?php echo get_term_link( $latTatv ); ?>" title="<?php the_sub_field('indexlat-tvtitulo'); ?>">
												Ver más videos
											</a>
										</article>

									<?php //Ultimo minuto ?>
									<?php elseif( get_row_layout() == 'indexlat-um' ): ?>
										<article class="itemLastMin itemShadow margBot20 ">

											<h3>
												<?php the_sub_field('indexlat-umtitulo'); ?>
											</h3>
											<ul>
												<?php $catNpost = get_sub_field('indexlat-umnpost'); ?>

												<?php if( get_sub_field('indexlat-umcat') == 'descendente' ) { ?>

													<?php $args = array(
														'posts_per_page' => $catNpost,
														'cat' => -19,
														'order' => 'DESC'
													);?>

												<?php }elseif( get_sub_field('indexlat-umcat') == 'aleatorio' ){ ?>

													<?php $args = array(
														'posts_per_page' => $catNpost,
														'cat' => -19,
														'orderby' => 'rand'
													);?>

												<?php } ?>

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

									<?php //Suplementos ?>
									<?php elseif( get_row_layout() == 'indexlat-supl' ): ?>
										<?php $latTax = get_sub_field('indexlat-supcat'); ?>
										<?php $latTax_name = $latTax->name; ?>
										<?php $latTax_id = $latTax->term_id; ?>

										<?php $args = array(
											'posts_per_page' => '1',
											'cat' => $latTax
										); ?>
										<?php $the_query = new WP_Query($args); ?>
											<?php if ($the_query->have_posts()) : ?>
												<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
													<article class="itemLast itemShadow margBot20">
														<figure>
															<figcaption>
																<h3>
																	<a href="<?php echo get_term_link( $latTax ); ?>" title="<?php the_sub_field('indexlat-suptitulo'); ?>">
																		<?php the_sub_field('indexlat-suptitulo'); ?>
																		<a href="<?php echo get_term_link( $latTax ); ?>" class="icoResp" title="<?php echo $latTatv_name; ?>">
																			<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="<?php the_sub_field('indexlat-suptitulo'); ?>" title="<?php the_sub_field('indexlat-suptitulo'); ?>">
																		</a>
																	</a>
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

									<?php //Blogueros ?>
									<?php elseif( get_row_layout() == 'indexlat-blog' ): ?>

										<?php $latTax = get_sub_field('indexlat-blocat'); ?>
										<?php $latTax_name = $latTax->name; ?>
										<?php $latTax_id = $latTax->term_id; ?>

										<?php $catNpst = get_sub_field('indexlat-blonpost'); ?>
										<div class="blogerList">

											<div class="titleBox2">
												<h2>
													<?php the_sub_field('indexlat-blogtitulo'); ?>
												</h2>
											</div>

											<ul class="owlBlog owlBlogueros">

												<?php
												$news_cat_ID = get_cat_ID( 'blogueros' ); 
												$news_cats   = get_categories( "parent=$news_cat_ID&number=$catNpst&orderby=modified" );
												$news_query  = new WP_Query;
												foreach ( $news_cats as $news_cat ) :
												    $news_query->query( array(
												        'cat'                 => $news_cat->term_id,
												        'posts_per_page'      => 1,
												        'no_found_rows'       => true,
												        'ignore_sticky_posts' => true,
												    ));
												    ?>
												    <?php while ( $news_query->have_posts() ) : $news_query->the_post() ?>

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
																		<div class="catBloger">
																		<?php foreach ($categories as $category) {
																			$output.='<a href="'.get_category_link($category->term_id).'" title="'.$category->cat_name.'" >'.$category->cat_name.'</a>'.$separator; ?>
																		<?php }  ?>
																		</div>
																		Por: <?php echo trim($output, $separator); ?>
																	</h4>
																	<?php the_excerpt(); ?>
																</div>
															</li>
												    <?php endwhile ?>
													<?php wp_reset_postdata(); ?>
												<?php endforeach ?>


											</ul>
										</div>
									
									<?php //Encuesta ?>
									<?php elseif( get_row_layout() == 'indexlat-poll' ): ?>
										<div class="encBox itemShadow margBot20">
											<?php if (function_exists('vote_poll') && !in_pollarchive()): ?>
												<ul>
													<li>
														<?php get_poll();?>
													</li>
												</ul>
											<?php endif; ?>
										</div>

									<?php //Publicidad ?>
									<?php elseif( get_row_layout() == 'indexlat-publ' ): ?>
										<div class="itemLast itemShadow pubLateral margBot20">
											<?php the_sub_field('indexlat-publcod'); ?>
										</div>

									<?php //Publicidad Responsive ?>
									<?php elseif( get_row_layout() == 'indexlat-publresp' ): ?>
										<div class="itemLast itemShadow pubLateralResp margBot20">
											<?php the_sub_field('indexlat-publcodresp'); ?>
										</div>
									<?php endif; ?>

								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>

		<?php //Columnista del dia ?>
		<?php elseif( get_row_layout() == 'seccolimnista' ): ?>

			<?php //Categorias ?>
			<?php $latTaxc = get_sub_field('seccol-cat'); ?>
			<?php $latTax_namec = $latTaxc->name; ?>
			<?php $latTax_idc = $latTaxc->term_id; ?>

			<?php // Horas ?>
			<?php $setCatHoursc = get_sub_field('seccol-hora') ?>
			<?php $setCatHourStringc = ' hours ago'; ?>
			<?php $catHoursc = $setCatHoursc.$setCatHourStringc; ?>

			<?php $catNpostc = get_sub_field('seccol-npost'); ?>

			<?php if( get_sub_field('seccol-ord') == 'descendente' ){ ?>
				<?php $args = array(
					'posts_per_page' => $catNpostc,
					'cat' => $latTax_idc,
					'order' => 'DESC',
					'date_query' => array(
						array(
						'after' => $catHoursc
						)
					)
				);?>
			<?php }elseif( get_sub_field('seccol-ord') == 'aleatorio' ){ ?>
				<?php $args = array(
					'posts_per_page' => $catNpostc,
					'cat' => $latTax_idc,
					'orderby' => 'rand',
					'date_query' => array(
						array(
						'after' => $catHoursc
						)
					)
				);?>
			<?php } ?>

			<?php $the_query = new WP_Query($args); ?>
				<?php if ($the_query->have_posts()) : ?>
					<section class="secrow secDestac">
						<div class="container notBox">
							<div class="row">
								<div class="col l12 m12 s12 rowRell">
									<div class="titleBox2">
										<h2>
											<?php the_sub_field('seccol-titulo'); ?>
										</h2>
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
						<?php //Modulos Flex ?>
						<div class="col l8 s12 m12">
							<?php if( have_rows('inicioflexmod-cont') ): ?>
								<?php while ( have_rows('inicioflexmod-cont') ) : the_row(); ?>

									<?php //Modulos ?>
									<?php if( get_row_layout() == 'secmodcat' ): ?>

										<?php //Categorias ?>
										<?php $latTaxm = get_sub_field('secmodcat-cat'); ?>
										<?php $latTax_namem = $latTaxm->name; ?>
										<?php $latTax_idm = $latTaxm->term_id; ?>

										<?php // Horas ?>
										<?php $setCatHoursm = get_sub_field('secmodcat-hora') ?>
										<?php $setCatHourStringm = ' hours ago'; ?>
										<?php $catHoursm = $setCatHoursm.$setCatHourStringm; ?>

										<?php // Numero de post's ?>
										<?php $catNpostm = get_sub_field('secmodcat-npost'); ?>

										<article class="col l6 m12 s12">
											<div class="itemModNot itemShadow margBot20">
												<h3>
													<a href="<?php echo get_term_link( $latTaxm ); ?>" title="<?php echo $latTax_namem; ?>">
														<?php the_sub_field('secmodcat-titulo'); ?>
														<i>
															<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="title" title="title">
														</i>
													</a>
												</h3>
												<?php if( get_sub_field('secmodcat-ord') == 'aleatorio' ){ ?>
													<?php $args = array(
														'posts_per_page' => $catNpostm,
														'cat' => $latTax_idm,
														'orderby' => 'rand',
														'date_query' => array(
															array(
															'after' => $catNpostm
															)
														)
													);?>
												<?php }else{ ?>
													<?php $args = array(
														'posts_per_page' => $catNpostm,
														'cat' => $latTax_idm,
														'date_query' => array(
															array(
															'after' => $catNpostm
															)
														)
													);?>
												<?php } ?>

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
													<?php if( get_sub_field('secmodcat-ord') == 'aleatorio' ){ ?>
														<?php $args = array(
															'posts_per_page' => $catNpostm,
															'cat' => $latTax_idm,
															'orderby' => 'rand',
															'date_query' => array(
																array(
																'after' => $catNpostm
																)
															)
														);?>
													<?php }else{ ?>
														<?php $args = array(
															'posts_per_page' => $catNpostm,
															'cat' => $latTax_idm,
															'date_query' => array(
																array(
																'after' => $catNpostm
																)
															)
														);?>
													<?php } ?>
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
									<?php endif; ?>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>

						<div class="col l4 m12 s12">
							<?php if( have_rows('inicioflexsub-cont') ): ?>
								<?php while ( have_rows('inicioflexsub-cont') ) : the_row(); ?>

									<?php //Portada del dia ?>
									<?php if( get_row_layout() == 'indexlat-portday' ): ?>
										<?php $args = array(
											'posts_per_page' => '1',
											'cat' => 20
										);?>
										<?php $the_query = new WP_Query($args); ?>
											<?php if ($the_query->have_posts()) : ?>
												<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
													<div class="itemLast itemShadow">
														<figure>
															<figcaption class="pDayTitle">
																<h3>
																	<?php the_sub_field('indexlat-pdtitulo'); ?>
																</h3>
															</figcaption>
															<a href="<?php echo site_url(); ?>/<?php echo $menu_item->url ?>/seccion/galeria-de-portadas/" class="pDay" title="<?php the_title(); ?>">
																<?php the_post_thumbnail(); ?>
															</a>
														</figure>
													</div>
												<?php endwhile; ?>
											<?php wp_reset_postdata(); ?>
										<?php endif; ?>

									<?php //Destacado del dia ?>
									<?php elseif( get_row_layout() == 'indexlat-destacado' ): ?>

										<?php $latTax = get_sub_field('indexlat-dcat'); ?>
										<?php $latTax_name = $latTax->name; ?>
										<?php $latTax_id = $latTax->term_id; ?>

										<?php $args = array(
											'posts_per_page' => '1',
											'meta_query'	=> array(
												'relation'		=> 'AND',
												array(
													'key'	 	=> 'destprev-opt',
													'value'	  	=> 'destacadodeldia',
													'compare' 	=> 'LIKE',
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
																	<?php the_sub_field('indexlat-dtitulo'); ?>
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

									<?php //Expreso TV ?>
									<?php elseif( get_row_layout() == 'indexlat-tv' ): ?>

										<?php $latTatv = get_sub_field('indexlat-tvcat'); ?>
										<?php $latTatv_name = $latTatv->name; ?>
										<?php $latTatv_id = $latTatv->term_id; ?>

										<article id="expTv" class="itemModNotTV itemShadow margBot20">
											<h3>
												<a href="<?php echo get_term_link( $latTatv ); ?>" title="<?php the_sub_field('indexlat-tvtitulo'); ?>">
													<?php the_sub_field('indexlat-tvtitulo'); ?>
													<a href="<?php echo get_term_link( $latTatv ); ?>" class="icoResp" title="<?php echo $latTatv_name; ?>">
														<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="<?php echo $latTatv_name; ?>" title="<?php echo $latTatv_name; ?>">
													</a>
												</a>
											</h3>
											<?php $tvNpost = get_sub_field('indexlat-tvnpost'); ?>

											<?php if( get_sub_field('indexlat-tvord') == 'aleatorio' ) { ?>
												<?php $args = array(
													'posts_per_page' => $tvNpost,
													'cat' => 1380,
													'orderby' => 'rand'
												); ?>
											<?php }else{ ?>
												<?php $args = array(
													'posts_per_page' => $tvNpost,
													'cat' => 1380
												); ?>
											<?php } ?>

											<?php $the_query = new WP_Query($args); ?>
												<ul class="iModListFig">
												<?php if ($the_query->have_posts()) : ?>
													<?php $conModul = 0; ?>
													<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
														<?php if ($conModul > 0) { ?>
															<li class="desactNot">
																<figure class="vidACF">
																	<?php the_field('destacimg-video'); ?>
																</figure>
															</li>
														<?php }else{ ?>
															<li class="desactNot actNot">
																<figure class="vidACF">
																	<?php the_field('destacimg-video'); ?>
																</figure>
															</li>
														<?php } ?>
														<?php $conModul++; ?>
													<?php endwhile; ?>
												<?php wp_reset_postdata(); ?>
												<?php if (false) { ?>
													<div class="epTvPlay">
														<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoPlay.svg" alt="Play" title="Play">
													</div>
												<?php } ?>
												</ul>
											<?php endif; ?>
											<ul class="iModList iModListVid">
												<?php if( get_sub_field('indexlat-tvord') == 'aleatorio' ) { ?>
													<?php $args = array(
														'posts_per_page' => $tvNpost,
														'cat' => 1380,
														'orderby' => 'rand'
													); ?>
												<?php }else{ ?>
													<?php $args = array(
														'posts_per_page' => $tvNpost,
														'cat' => 1380
													); ?>
												<?php } ?>

												<?php $the_query = new WP_Query($args); ?>
													<?php if ($the_query->have_posts()) : ?>
														<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
															<li>
																<a href="javascript:void(0)" title="<?php the_title(); ?>">
																	<?php the_title(); ?>
																</a>
															</li>
														<?php endwhile; ?>
													<?php wp_reset_postdata(); ?>
												<?php endif; ?>
											</ul>
											<a class="vmETV" href="<?php echo get_term_link( $latTatv ); ?>" title="<?php the_sub_field('indexlat-tvtitulo'); ?>">
												Ver más videos
											</a>
										</article>

									<?php //Ultimo minuto ?>
									<?php elseif( get_row_layout() == 'indexlat-um' ): ?>
										<article class="itemLastMin itemShadow margBot20 ">

											<h3>
												<?php the_sub_field('indexlat-umtitulo'); ?>
											</h3>
											<ul>
												<?php $catNpost = get_sub_field('indexlat-umnpost'); ?>

												<?php if( get_sub_field('indexlat-umcat') == 'descendente' ) { ?>

													<?php $args = array(
														'posts_per_page' => $catNpost,
														'cat' => -19,
														'order' => 'DESC'
													);?>

												<?php }elseif( get_sub_field('indexlat-umcat') == 'aleatorio' ){ ?>

													<?php $args = array(
														'posts_per_page' => $catNpost,
														'cat' => -19,
														'orderby' => 'rand'
													);?>

												<?php } ?>

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

									<?php //Suplementos ?>
									<?php elseif( get_row_layout() == 'indexlat-supl' ): ?>
										<?php $latTax = get_sub_field('indexlat-supcat'); ?>
										<?php $latTax_name = $latTax->name; ?>
										<?php $latTax_id = $latTax->term_id; ?>

										<?php $args = array(
											'posts_per_page' => '1',
											'cat' => $latTax
										); ?>
										<?php $the_query = new WP_Query($args); ?>
											<?php if ($the_query->have_posts()) : ?>
												<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
													<article class="itemLast itemShadow margBot20">
														<figure>
															<figcaption>
																<h3>
																	<a href="<?php echo get_term_link( $latTax ); ?>" title="<?php the_sub_field('indexlat-suptitulo'); ?>">
																		<?php the_sub_field('indexlat-suptitulo'); ?>
																		<a href="<?php echo get_term_link( $latTax ); ?>" class="icoResp" title="<?php echo $latTatv_name; ?>">
																			<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="<?php the_sub_field('indexlat-suptitulo'); ?>" title="<?php the_sub_field('indexlat-suptitulo'); ?>">
																		</a>
																	</a>
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

									<?php //Blogueros ?>
									<?php elseif( get_row_layout() == 'indexlat-blog' ): ?>

										<?php $latTax = get_sub_field('indexlat-blocat'); ?>
										<?php $latTax_name = $latTax->name; ?>
										<?php $latTax_id = $latTax->term_id; ?>

										<?php $catNpst = get_sub_field('indexlat-blonpost'); ?>
										<div class="blogerList">

											<div class="titleBox2">
												<h2>
													<?php the_sub_field('indexlat-blogtitulo'); ?>
												</h2>
											</div>

											<ul class="owlBlog owlBlogueros">

												<?php
												$news_cat_ID = get_cat_ID( 'blogueros' ); 
												$news_cats   = get_categories( "parent=$news_cat_ID&number=$catNpst&orderby=modified" );
												$news_query  = new WP_Query;
												foreach ( $news_cats as $news_cat ) :
												    $news_query->query( array(
												        'cat'                 => $news_cat->term_id,
												        'posts_per_page'      => 1,
												        'no_found_rows'       => true,
												        'ignore_sticky_posts' => true,
												    ));
												    ?>
												    <?php while ( $news_query->have_posts() ) : $news_query->the_post() ?>

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
																		<div class="catBloger">
																		<?php foreach ($categories as $category) {
																			$output.='<a href="'.get_category_link($category->term_id).'" title="'.$category->cat_name.'" >'.$category->cat_name.'</a>'.$separator; ?>
																		<?php }  ?>
																		</div>
																		Por: <?php echo trim($output, $separator); ?>
																	</h4>
																	<?php the_excerpt(); ?>
																</div>
															</li>
												    <?php endwhile ?>
													<?php wp_reset_postdata(); ?>
												<?php endforeach ?>


											</ul>
										</div>
									
									<?php //Encuesta ?>
									<?php elseif( get_row_layout() == 'indexlat-poll' ): ?>
										<div class="encBox itemShadow margBot20">
											<?php if (function_exists('vote_poll') && !in_pollarchive()): ?>
												<ul>
													<li>
														<?php get_poll();?>
													</li>
												</ul>
											<?php endif; ?>
										</div>

									<?php //Publicidad ?>
									<?php elseif( get_row_layout() == 'indexlat-publ' ): ?>
										<div class="itemLast itemShadow pubLateral margBot20">
											<?php the_sub_field('indexlat-publcod'); ?>
										</div>

									<?php //Publicidad Responsive ?>
									<?php elseif( get_row_layout() == 'indexlat-publresp' ): ?>
										<div class="itemLast itemShadow pubLateralResp margBot20">
											<?php the_sub_field('indexlat-publcodresp'); ?>
										</div>
									<?php endif; ?>

								<?php endwhile; ?>
							<?php endif; ?>
						</div>

					</div>
				</div>
			</section>

		<?php endif; ?>

	<?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>



</body>
</html>