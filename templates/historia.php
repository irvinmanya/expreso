<?php
/**
 * Template Name: Historia
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
			<div class="col l12 m12 s12">
				<ul class="histSlider owlOneItem">
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
	</div>
</section>

<div class="publong">
	<?php $pubPublong2 = get_field('his-pubimg2'); ?>
	<img src="<?php echo $pubPublong2['url']; ?>" alt="<?php echo $pubPublong2['title']; ?>" title="<?php echo $pubPublong2['title']; ?>">
</div>

<?php get_footer(); ?>
</body>
</html>