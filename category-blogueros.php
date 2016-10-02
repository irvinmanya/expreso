<?php get_header(); ?>

<section class="secrow cine">
	<div class="container">
		<div class="row">
			<?php //filtros ?>
			<div class="col l3 m12 s12 rowFiltros lineLateralRight">

				<?php if( have_rows('colizqflex-cont',77127) ): ?>
					<?php while ( have_rows('colizqflex-cont',77127) ) : the_row(); ?>

						<?php //Intro ?>
						<?php if( get_row_layout() == 'sec-slider' ): ?>

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

									<?php //Filtro ?>
									<?php elseif( get_row_layout() == 'indexlat-filtro' ): ?>
										<div class="titleBox2">
											<h2>
												<?php the_sub_field('indexlat-filtitulo'); ?>
											</h2>
										</div>
			
										<div class="inputItem selectAutComp">
											<select name="blogueroList" id="blogueroList" data-placeholder="Buscar bloguero" style="width:100%;"  class="chosen-select" tabindex="6">
												<option value=""><?php the_sub_field('indexlat-filplace'); ?></option>
												<?php
												$news_cat_ID = get_cat_ID( 'opinion' ); 
												$news_cats   = get_categories( "parent=$news_cat_ID" );
												$news_query  = new WP_Query;

												foreach ( $news_cats as $news_cat ) :
												    $news_query->query( array(
												        'cat'                 => $news_cat->term_id,
												        'posts_per_page'      => 1,
												        'no_found_rows'       => true,
												        'ignore_sticky_posts' => true,
												    ));

												    ?>

												    <option value="<?php echo get_category_link($news_cat->term_id); ?>"><?php echo esc_html( $news_cat->name ) ?></option>

												<?php endforeach ?>

											</select>
										</div>

										<br>
										<button type="submit" class="btnGeneral" id="btnFiltro">
											<?php the_sub_field('indexlat-filbtnnom'); ?>
										</button>
										<br>


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
													'cat' => $latTatv_id,
													'orderby' => 'rand'
												); ?>
											<?php }else{ ?>
												<?php $args = array(
													'posts_per_page' => $tvNpost,
													'cat' => $latTatv_id
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
														'cat' => $latTatv_id,
														'orderby' => 'rand'
													); ?>
												<?php }else{ ?>
													<?php $args = array(
														'posts_per_page' => $tvNpost,
														'cat' => $latTatv_id
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

						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>

			</div>

			<?php //Content ?>
			<div class="col l9 m12 s12">


				<?php
				$news_cat_ID = get_cat_ID( 'blogueros' ); 
				$news_cats   = get_categories( "parent=$news_cat_ID&number=6&orderby=modified" );
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


							<article class="col l6 m12 s12">
								<div class="blogerItem itemShadow margBot20">
									<figure>
										<?php $caTaxImg = get_field('caTax-img', 'category_'.$news_cat->cat_ID); ?>
										<a href="<?php echo get_category_link($news_cat->term_id); ?>" title="<?php echo $news_cat->cat_name; ?>" >
											<img src="<?php echo $caTaxImg['url']; ?>" alt="<?php echo $news_cat->cat_name; ?>" title="<?php echo $news_cat->cat_name; ?>">
										</a>
									</figure>
									<div class="blogerTxt">
										<h3>
											<a href="<?php echo get_category_link($news_cat->term_id); ?>" title="<?php echo $news_cat->name; ?>" >
												<?php echo $news_cat->name; ?>
											</a>
										</h3>
										<div class="auTxt">
											<p>
												<?php echo category_description(); ?>
												<?php echo $news_cat->description; ?>
											</p>
										</div>
										<a href="<?php echo get_category_link($news_cat->term_id); ?>" title="<?php echo $news_cat->name; ?>"  class="linkPlus">
											Míralo ahora
											<i>
												<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="" title="">
											</i>
										</a>
									</div>
								</div>
							</article>

				    <?php endwhile ?>
					<?php wp_reset_postdata(); ?>
				<?php endforeach ?>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>

<style>
	.chosen-container{
		width: 100% !important;
	}
	.auTxt{
		width: 100%;
		height: auto;
		display: inline-block;
		vertical-align: top;
		border-top: 1px solid rgba(0,0,0,.15);
		border-bottom: 1px solid rgba(0,0,0,.15);
		padding: 10px 0px 10px 0px;
	}
</style>

<script type="text/javascript">
	//Chosen select
	var config = {
		'.chosen-select'           : {},
		'.chosen-select-deselect'  : {allow_single_deselect:true},
		'.chosen-select-no-single' : {disable_search_threshold:10},
		'.chosen-select-no-results': {no_results_text:'¡Ups! el distrito no existe.'},
		'.chosen-select-width'     : {width:"95%"}
	}
	for (var selector in config) {
		$(selector).chosen(config[selector]);
	};
	$(document).on('click',function(){
		//------------------- [ Blogueros y opinion ] --------------------//
		$('#btnFiltro').on('click',function(){
			if($('#blogueroList').val() != ''){  
				window.location.href = $('#blogueroList').val();
			}else{
				alert('Seleccione un bloguero');
		  	}
		});
		//------------------- [ Fin - Blogueros y opinion ] --------------------//
	});
</script>

</body>
</html>