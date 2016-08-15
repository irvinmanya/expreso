<?php get_header(); ?>

<?php //Publicidad - Long ?>
<?php get_template_part( 'content/content', 'publong' ); ?>

<section class="secrow portadas">
	<div class="container">
		<div class="row">
			<?php //filtros ?>
			<div class="col l3 m12 s12 rowFiltros lineLateralRight">
				<div class="titleBox2">
					<h2>
						Encuentra rápido lo que más te interesa leer
					</h2>
				</div>
				<div class="inpFiltro">
					<input type="date" name="fecEdit" id="fecEdit" class="datepicker picker__input" placeholder="Escoja una fecha">
				</div><br>

				
				<button type="submit" class="btnGeneral">
					Filtrar
				</button>
			</div>

			<?php //Content ?>
			<div class="col l6 m12 s12">
				<div class="titleBox1">
					<h1>
						La portada del día
					</h1>
				</div>
				<div class="portCont itemShadow margBot20">
					<figure>
						<a href="javascript:void(0)" title="">
							<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
						</a>
					</figure>
				</div>
			</div>

			<?php //SideBar ?>
			<div class="col l3 m12 s12">

				<?php //Portada del dia ?>
				<article class="itemLast itemShadow margBot20">
					<figure>
						<figcaption>
							<h3>
								Portada del dia
							</h3>
						</figcaption>
						<a href="javascript:void(0)" title="">
							<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
						</a>
						<figcaption>
							<p>
								<a href="javascript:void(0)" title="">
									Mira aquí la versíon impresa "Preessreader"
								</a>
							</p>
						</figcaption>
					</figure>
				</article>

				<?php //Publicidad - Small ?>
				<?php get_template_part( 'content/content', 'pubsmall' ); ?>

				<?php //Encuesta ?>
				<div class="encBox itemShadow margBot20">
					<p>
						¿Considera exagerado el tiempo que se está tomando la ONPE para dar los resultados electorales al 100%?
					</p>
					<div class="encInpCont">
						<div class="col l6 m6 s6">
							<p>
								<input id="rdoSi" name="group1" type="radio" />
								<label for="rdoSi">Si</label>
							</p>
						</div>
						<div class="col l6 m6 s6">
							<p>
								<input id="rdoNo" name="group1" type="radio"/>
								<label for="rdoNo">No</label>
							</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
</body>
</html>