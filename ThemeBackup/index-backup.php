<?php
/**
 * @link 
 * @package WordPress
 * @subpackage Expreso
 * @since 
 */

get_header(); ?>


	<div id="primary">
		<main id="main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php

			// Loop de artículos
			while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );
			endwhile;

			// Paginación nativa
			the_posts_pagination( array(
				'prev_text'          => __( 'Anterior', 'expreso' ),
				'next_text'          => __( 'Siguiente', 'expreso' ),
				'before_page_number' => '<span>' . __( 'P&aacute;gina', 'expreso' ) . ' </span>',
			) );

		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
