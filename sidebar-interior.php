<?php //Publicidad ?>				
<?php get_template_part( 'content/content', 'pubsmall' ); ?>

<?php //Entrvista ?>
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

<?php //Destacada del día  ?>
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

<?php //Publicidad ?>
<?php get_template_part( 'content/content', 'pubsmall' ); ?>

<?php //Suplementos del día ?>
<?php $args = array(
	'posts_per_page' => '1',
	'cat' => 1377,
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
							Suplementos del día
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