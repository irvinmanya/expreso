<?php //Polidatos ?>
<section class="rowsec singlePolidatos">
	<div class="container">
		<div class="row">
			<div class="col l8 m12 s12 lineLateralRight" style="position:relative;">
				<div class="editCont">

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

					<div class="campTxt">
						<?php the_content(); ?>
					</div>

					<a href="javascript:void(0)" title="" class="linkPlus">
						Lee los editoriales de días anteriores
						<i>
							<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="" title="">
						</i>
					</a>

					<?php //Publicidad - Small ?>
					<?php get_template_part( 'content/content', 'publong' ); ?>
					
				</div>
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

				<?php //Publicidad - Small ?>
				<?php get_template_part( 'content/content', 'pubsmall' ); ?>
			</div>
		</div>
	</div>
</section>