<?php //Publicidad ?>
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