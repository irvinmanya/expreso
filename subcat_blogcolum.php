<?php get_header(); ?>
<section class="secrow cine">
	<div class="container">
		<div class="row">
			<?php //filtros ?>
			<div class="col l3 m12 s12 rowFiltros lineLateralRight">

				<div class="blogAutor itemShadow lineBottom">
					<figure>
						<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
						<figcaption>
							<h3><?php the_title(); ?></h3>
							<h4>Nombre de la columna</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores eveniet optio inventore quos voluptat</p>
						</figcaption>
					</figure>
				</div>
				<div class="titleBox2">
					<h2>
						Encuentra rápido lo que más te interesa leer
					</h2>
				</div>
				<?php if (false) {  ?>
					<div class="inputItem">
						<span class="input input--kohana">
							<input type="text" id="seachcine" name="seachcine" class="input__field input__field--kohana">
							<label class="input__label input__label--kohana" for="pnombre">
								<i class="icon--kohana icoNom"></i>
								<span class="input__label-content input__label-content--kohana">
									Encontrar
								</span>
							</label>
						</span>
					</div>
				<?php } ?>

				<?php //Publicidad - Small ?>
				<?php get_template_part( 'content/content', 'pubsmall' ); ?>
			</div>

			<?php //Content ?>
			<div class="col l9 m12 s12">
				<article class="col l6 m12 s12">
					<div class="blogerItem itemShadow margBot20">
						<figure>
							<a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo $category->name; ?>" >
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/bloguero.png" alt="<?php echo $category->name; ?>" title="<?php echo $category->name; ?>">
							</a>
						</figure>
						<div class="blogerTxt">
							<h3>
								<a href="" title="" >
									Titulo
								</a>
							</h3>
							<?php if (false) { ?>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
								</p>
							<?php } ?>
							<a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo $category->name; ?>"  class="linkPlus">
								Míralo ahora
								<i>
									<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="" title="">
								</i>
							</a>
						</div>
					</div>
				</article>
			</div>

		</div>
	</div>
</section>

<?php get_footer(); ?>
</body>
</html>