<?php get_header(); ?>

<?php //Publicidad - Long ?>
<?php get_sidebar('publong'); ?>

<?php //SinglePage ?>
<section class="rowsec">
	<div class="container">
		<div class="row">
			<div class="col l8 m12 s12">
				
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
				<?php get_sidebar('pubsmall'); ?>
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>
</body>
</html>