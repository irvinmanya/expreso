<?php
/**
 * @link 
 * @package WordPress
 * @subpackage Expreso
 * @since 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header>

	<div>
		<?php
			the_content( sprintf(
				__( 'Continuar leyendo<span> "%s"</span>', 'expreso' ),
				get_the_title()
			) );
		?>
		<p><?php esc_html_e( 'Campos personalizados:', 'expreso' ); ?></p>
		<?php the_meta(); ?>
	</div>
</article>
