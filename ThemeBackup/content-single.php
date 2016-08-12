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
		<?php the_title( '<h1>', '</h1>' ); ?>
	</header>

	<div>
		<?php
			the_content();
		?>
		<p><?php esc_html_e( 'Campos personalizados:', 'expreso' ); ?></p>
		<?php the_meta(); ?>
	</div>
</article>
