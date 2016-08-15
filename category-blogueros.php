<?php get_header(); ?>

<?php //Publicidad - Long ?>
<?php get_template_part( 'content/content', 'publong' ); ?>

<section class="secrow cine">
	<div class="container">
		<div class="row">
			<?php //filtros ?>
			<div class="col l3 m12 s12 rowFiltros lineLateralRight">
				<div class="titleBox2">
					<h2>
						Encuentra rápido lo que más te interesa leer
					</h2>
				</div>
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

				<div class="titleBox3">
					<h3>
						Filtra por tema
					</h3>
				</div>
				<div class="filtroBox lineBottom">
					<p>
						<input type="checkbox" id="tema1" name="tema1"/>
						<label for="tema1">Tema #1</label>
					</p>
					<p>
						<input type="checkbox" id="tema2" name="tema2"/>
						<label for="tema2">Tema #2</label>
					</p>
					<p>
						<input type="checkbox" id="tema3" name="tema3"/>
						<label for="tema3">Tema #3</label>
					</p>
					<p>
						<input type="checkbox" id="tema4" name="tema4"/>
						<label for="tema4">Tema #4</label>
					</p>
					<div class="inpFiltro">
						<input type="date" name="fecEdit" id="fecEdit" class="datepicker picker__input" placeholder="Escoja una fecha">
					</div>
				</div>


				<?php //Publicidad - Small ?>
				<?php get_template_part( 'content/content', 'pubsmall' ); ?>
			</div>

			<?php //Content ?>
			<div class="col l9 m12 s12">
				<article class="col l6 m12 s12">
					<div class="blogerItem itemShadow margBot20">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
							</a>
						</figure>
						<div class="blogerTxt">
							<h3>
								<a href="javascript:void(0)" title="">
									Jhon Boyega en el raparto de...
								</a>
							</h3>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore 
							</p>
							<a href="javascript:void(0)" title="" class="linkPlus">
								Míralo ahora
								<i>
									<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="" title="">
								</i>
							</a>
						</div>
					</div>
				</article>
				<article class="col l6 m12 s12">
					<div class="blogerItem itemShadow margBot20">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
							</a>
						</figure>
						<div class="blogerTxt">
							<h3>
								<a href="javascript:void(0)" title="">
									Jhon Boyega en el raparto de...
								</a>
							</h3>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore 
							</p>
							<a href="javascript:void(0)" title="" class="linkPlus">
								Míralo ahora
								<i>
									<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="" title="">
								</i>
							</a>
						</div>
					</div>
				</article>
				<article class="col l6 m12 s12">
					<div class="blogerItem itemShadow margBot20">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
							</a>
						</figure>
						<div class="blogerTxt">
							<h3>
								<a href="javascript:void(0)" title="">
									Jhon Boyega en el raparto de...
								</a>
							</h3>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore 
							</p>
							<a href="javascript:void(0)" title="" class="linkPlus">
								Míralo ahora
								<i>
									<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/arrowLeftMod.svg" alt="" title="">
								</i>
							</a>
						</div>
					</div>
				</article>
				<article class="col l6 m12 s12">
					<div class="blogerItem itemShadow margBot20">
						<figure>
							<a href="javascript:void(0)" title="">
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="">
							</a>
						</figure>
						<div class="blogerTxt">
							<h3>
								<a href="javascript:void(0)" title="">
									Jhon Boyega en el raparto de...
								</a>
							</h3>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore 
							</p>
							<a href="javascript:void(0)" title="" class="linkPlus">
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