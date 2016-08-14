<?php
/**
 * Template Name: Historia

 * @link 
 * @package WordPress
 * @subpackage Expreso
 * @since 
 */
?>
<?php get_header(); ?>
<section class="secrow rowPub">
	<div class="container">
		<div class="row">
			<figure class="publong">
				<?php $pubPublong = get_field('his-pubimg1'); ?>
				<img src="<?php echo $pubPublong['url']; ?>" alt="<?php echo $pubPublong['title']; ?>" title="<?php echo $pubPublong['title']; ?>">
			</figure>
		</div>
	</div>
</section>

<section class="secrow historia">
	<div class="container">
		<div class="row">
			<ul class="histSlider owlHistoria">
				<?php if( have_rows('his-sliderlist') ): ?>
					<?php while ( have_rows('his-sliderlist') ) : the_row(); ?>
						<li>
							<figure>
								<?php $hisSliderlist = get_sub_field('his-sliderlimg'); ?>
								<img src="<?php echo $hisSliderlist['url']; ?>" alt="<?php echo $hisSliderlist['title']; ?>" title="<?php echo $hisSliderlist['title']; ?>">
							</figure>
						</li>
					<?php endwhile; ?>
				<?php endif; ?>
			</ul>
			<div class="campTxt">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
</body>
</html>