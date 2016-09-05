<?php get_header(); ?>

<section class="secrow editoriales">
	<div class="container">
		<div class="row">
			<?php //filtros ?>
			<div class="col l3 m12 s12 rowFiltros lineLateralRight">
				<div class="titleBox2">
					<h2>
						Encuentra rápido lo que más te interesa leer
					</h2>
				</div>
				<form id="frmEditor">
					<div class="inpFiltro">
						<input type="date" name="fecEdit" id="fecEdit" class="datepicker picker__input" placeholder="Escoja una fecha">
					</div><br>

					<button type="submit" id="btnEditorial" class="btnGeneral">
						Filtrar
					</button>
				</form>
			</div>

			<?php //Content ?>
			<div class="col l6 m12 s12">
				<ul class="collapsible acordImg" data-collapsible="accordion" id="listEdit">
					<?php
						$args = array(
						'posts_per_page' => '-1',
						'cat' => 48,
						'date_query' => array(
							array(
								'year'      => 2016,
								'month'     => 08,
								'day'       => 25,
								'compare'   => '='
							)
						));
					?>
					<?php $the_query = new WP_Query($args); ?>
						<?php if ($the_query->have_posts()) : ?>
							<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
								<li class="active">
									<div class="collapsible-header active">
										<?php the_title(); ?>
									</div>
									<div class="collapsible-body" style="display:block;">
										<figure>
											<?php the_post_thumbnail(); ?>
										</figure>
										<div class="campTxt">
											<p>
												<?php the_excerpt(); ?>
											</p>
										</div>
									</div>
								</li>
							<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				</ul>
			</div>

			<?php //SideBar ?>
			<div class="col l3 m12 s12">

				<?php //Publicidad - Small ?>
				<?php get_template_part( 'content/content', 'pubsmall' ); ?>

				<?php //Entrevista ?>
				<?php $args = array(
					'posts_per_page' => '1',
					'cat' => 30
				);?>
				<?php $the_query = new WP_Query($args); ?>
					<?php if ($the_query->have_posts()) : ?>
						<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
							<article class="itemLast itemShadow margBot20">
								<figure>
									<figcaption>
										<h3>
											Entrevista
										</h3>
									</figcaption>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
									<figcaption>
										<p>
											<?php the_excerpt(); ?>
										</p>
									</figcaption>
								</figure>
							</article>
						<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>

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

<script id="plantilla_general" type="text/x-jquery-tmpl">
	<li class="active">
		<div class="collapsible-header active">
			${titlePage}
		</div>
		<div class="collapsible-body" style="display:block;">
			<figure>
				<img src="${urlImg}" alt="${titlePage}" title="${titlePage}">
			</figure>
			<div class="campTxt">
				<p>
					${txtPage}
				</p>
			</div>
		</div>
	</li>
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#frmEditor').submit(function(e){
			e.preventDefault();

			var fecEdit= $('#fecEdit').val();

			$('#listEdit').html('');
			$.ajax({
				url: '<?php echo get_template_directory_uri() ?>/json/rspeditorial.php',
				method: 'post',
				data: {fecEdit: fecEdit},
				dataType: 'json',
				beforeSend: function(){
					$('.eventLoader').addClass('eventLoaderAct');
				},
				success: function(data){
					$("#plantilla_general").tmpl(data).appendTo("#listEdit");
				},
				complete: function(){
					$('.eventLoader').removeClass('eventLoaderAct');
				}
			});
		});

	});
</script>

</body>
</html>