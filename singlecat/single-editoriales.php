<?php //SinglePage ?>
<section class="rowsec singleEditoriales">
	<div class="container">
		<div class="row">
			<div class="col l8 m12 s12 lineLateralRight" style="position:relative;">
				<div class="editCont">

					<div class="titleBox1">
						<h1>
							<?php the_title(); ?>
						</h1>
					</div>

					<div class="campTxt">
						<?php the_content(); ?>
					</div>

					<a href="http://expreso.dhdinc.info/seccion/editoriales/" title="Lee los editoriales de días anteriores" class="linkPlus">
						Lee los editoriales de días anteriores
						<i>
							<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="Lee los editoriales de días anteriores" title="Lee los editoriales de días anteriores">
						</i>
					</a>

					<?php //Publicidad - Small ?>
					<?php get_template_part( 'content/content', 'publong' ); ?>
					
				</div>
			</div>
			<div class="col l4 m12 s12">
				<article class="itemLast itemShadow margBot20">
					<figure>
						<figcaption>
							<h3>
								Entrevista
							</h3>
						</figcaption>
						<a href="javascript:void(0)" title="">
							<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
						</a>
						<figcaption>
							<p>
								El actor visto en "Attack The Block" o en el Episodio VII de 'La guerra de...
							</p>
						</figcaption>
					</figure>
				</article>

				<?php //Publicidad - Small ?>
				<?php get_template_part( 'content/content', 'pubsmall' ); ?>
			</div>
		</div>
	</div>
</section>