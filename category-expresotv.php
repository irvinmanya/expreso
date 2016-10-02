<?php get_header(); ?>

<section class="secrow cine">
	<div class="container">
		<div class="row">

			<?php //Content ?>
			<div class="col l12 m12 s12">
				<?php $args = array(
					'posts_per_page' => '6',
					'cat' => 1380
				);?>
				<?php $the_query = new WP_Query($args); ?>
					<?php if ($the_query->have_posts()) : ?>
						<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
							<article class="col l4 m12 s12">
								<div class="notItemHome itemCine itemShadow margBot20">
									<figure>
										<figure class="vidACF">
											<?php the_field('destacimg-video'); ?>
										</figure>
										<figcaption>
											<h3>
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
													<?php the_title(); ?>
												</a>
											</h3>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="linkPlus">
												Míralo ahora en detalle
												<i>
													<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
												</i>
											</a>
										</figcaption>
									</figure>
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