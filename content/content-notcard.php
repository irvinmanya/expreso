<div class="notItemHome itemShadow margBot20">
	<figure>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_post_thumbnail(); ?>
		</a>
		<figcaption>
			<h3>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_title() ?>
				</a>
			</h3>
			<p>
				<?php the_excerpt(); ?>
			</p>
		</figcaption>
	</figure>
</div>