<div class="notItemHome itemShadow margBot20">
	<figure>
		<a href="<?php the_permalink(); ?>" class="notItemImg" title="<?php the_title(); ?>">

			<img src="<?php the_post_thumbnail_url( 'medium' ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
		</a>
		<figcaption>
			<h3>
				<?php if (get_field('postint-stitulocor')) { ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_field('postint-stitulocor'); ?>
					</a>
				<?php }else{ ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_title() ?>
					</a>
				<?php } ?>
			</h3>
			<p>
				<?php the_excerpt(); ?>
			</p>
		</figcaption>
	</figure>
</div>