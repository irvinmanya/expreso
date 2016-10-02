<?php //Interior de suplementos ?>
<section class="secrow single">
	<div class="container">
		<div class="row">
			<div class="col l8 m12 s12 lineLateralRight" style="position:relative;">

				<?php //Titulo ?>
				<div class="titleBox1">
					<?php if (get_field('postint-ssombrero')) { ?>
						<small>
							<?php the_field('postint-ssombrero'); ?>
						</small>
					<?php } ?>
					<h1>
						<?php the_title(); ?>
					</h1>
				</div>
				<?php if (get_field('postint-stitulo')) { ?>
					<div class="titleBox2">
						<h2>
							<?php the_field('postint-stitulo'); ?>
						</h2>
					</div>
				<?php } ?>

				<?php if (have_rows('destacimg-slider')) { ?>
					<div class="singSlider owlOneItem">
						<?php while( have_rows('destacimg-slider') ): the_row(); ?>
							<div class="singItem">
								<figure>
									<?php $destacimgSlimg=get_sub_field('destacimg-slimg'); ?>
									<img src="<?php echo $destacimgSlimg['url']; ?>" alt="<?php echo $destacimgSlimg['title']; ?>" title="<?php echo $destacimgSlimg['title']; ?>">
								</figure>
							</div>
						<?php endwhile; ?>
					</div>
				<?php }elseif(get_field('destacimg-video')){ ?>
					<div class="singItem">
						<div class="pstVideo">
							<?php the_field('destacimg-video'); ?>
						</div>
					</div>
				<?php }else{ ?>
					<div class="singItem">
						<figure>
							<?php the_post_thumbnail(); ?>
						</figure>
					</div>
				<?php } ?>

				<?php //Contenido ?>
				<div class="campTxt lineBottom">
					<?php the_content(); ?>
					<div class="socialShare socialShareBottom">
						<?php do_action( 'addthis_widget' ); ?>
					</div>
				</div>
				
				<?php //Articulos relacionados ?>
				<div class="rowSing rowRell lineBottom">
					<div class="titleBox2">
						<h2>
							Suplementos relacionadas
						</h2>
					</div>
					<?php $args = array(
						'posts_per_page' => '1',
						'cat' => 1377
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

			<?php //Sidebar ?>
			<div class="col l4 m12 s12">

				<?php //Llamando al sidebar interior ?>
				<?php get_sidebar('interior'); ?>

			</div>
		</div>
	</div>
</section>