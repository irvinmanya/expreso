<?php get_header(); ?>

<?php //Publicidad - Long ?>
<?php include('content/publong.php'); ?>

<section class="secrow editoriales">
	<div class="container">
		<div class="row">
			<?php //filtros ?>
			<div class="col l3 m12 s12 rowFiltros">
				<div class="titleBox2">
					<h2>
						Encuentra rápido lo que más te interesa leer
					</h2>
				</div>
				<div class="inpFiltro>
					<input type="date" class="datepicker">
				</div>
			</div>

			<?php //Content ?>
			<div class="col l6 m12 s12">
				<ul class="collapsible acordImg" data-collapsible="accordion">
					<li class="active">
						<div class="collapsible-header active">
							First #1
						</div>
						<div class="collapsible-body" style="display:block;">
							<figure>
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
							</figure>
							<div class="campTxt">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos earum dolor minima autem, sit voluptatibus, praesentium.
							</div>
						</div>
					</li>
					<li>
						<div class="collapsible-header">
							First #2
						</div>
						<div class="collapsible-body">
							<figure>
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
							</figure>
							<div class="campTxt">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos earum dolor minima autem, sit voluptatibus, praesentium.
							</div>
						</div>
					</li>
					<li>
						<div class="collapsible-header">
							First #3
						</div>
						<div class="collapsible-body">
							<figure>
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
							</figure>
							<div class="campTxt">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos earum dolor minima autem, sit voluptatibus, praesentium.
							</div>
						</div>
					</li>
					<li>
						<div class="collapsible-header">
							First #4
						</div>
						<div class="collapsible-body">
							<figure>
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
							</figure>
							<div class="campTxt">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos earum dolor minima autem, sit voluptatibus, praesentium.
							</div>
						</div>
					</li>
					<li>
						<div class="collapsible-header">
							First #5
						</div>
						<div class="collapsible-body">
							<figure>
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/noticia.jpg" alt="title" title="title">
							</figure>
							<div class="campTxt">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos earum dolor minima autem, sit voluptatibus, praesentium.
							</div>
						</div>
					</li>
				</ul>
			</div>

			<?php //SideBar ?>
			<div class="col l3 m12 s12">

				<?php //Publicidad - Small ?>
				<?php include('content/pubsmall.php'); ?>

				<?php //Entrevissta ?>
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
								<a href="javascript:void(0)" title="">
									El actor visto en "Attack The Block" o en el Episodio VII de 'La guerra de...
								</a>
							</p>
						</figcaption>
					</figure>
				</article>

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