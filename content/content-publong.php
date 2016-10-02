<?php //Publicidad ?>
<div class="secrow rowPub">
	<div class="container">
		<div class="row">
			<div class="publong publongSingle">
				<?php if (get_field('post-pub',76921)) { ?>
					<?php the_field('post-pub',76921); ?>
				<?php }else{ ?>
					<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/publong.jpg" alt="title" title="title">
				<?php } ?>
			</div>
			<div class="publongResp">
				<?php if (get_field('post-pubresp',76921)) { ?>
					<?php the_field('post-pubresp',76921); ?>
				<?php }else{ ?>
					<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/publong.jpg" alt="title" title="title">
				<?php } ?>
			</div>
		</div>
	</div>
</div>