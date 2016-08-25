<section class="secrow cine">
	<div class="container">
		<div class="row">
			<?php //filtros ?>
			<div class="col l3 m12 s12 rowFiltros lineLateralRight">

				<div class="blogAutor itemShadow lineBottom">
					<?php $categories=get_the_category(); ?>
					<?php foreach ($categories as $category) { ?>
						<?php $caTaxImg = get_field('caTax-img', 'category_'.$category->cat_ID); ?>
						<figure>
							<img src="<?php echo $caTaxImg['url']; ?>" alt="<?php echo $category->cat_name; ?>" title="<?php echo $category->cat_name; ?>">
							<figcaption>
								<h3><?php echo $category->cat_name; ?></h3>
								<!--<h4>Nombre de la columna</h4>-->
								<p><?php echo $category->description; ?></p>
							</figcaption>
						</figure>
					<?php } ?>
				</div>

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

				<div class="inpFiltro">
					<input type="date" name="fecEdit" id="fecEdit" class="datepicker picker__input" placeholder="Escoja una fecha">
				</div>
				<?php if (false) { ?>
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
				<?php } ?>

				<?php //Publicidad - Small ?>
				<?php get_template_part( 'content/content', 'pubsmall' ); ?>
			</div>

			<?php //Content ?>
			<div class="col l9 m12 s12">
				<div class="blogCont">
					<div class="titleBox1">
						<h1>
							<?php the_title(); ?>
						</h1>
					</div>

					<?php //Detalles ?>
					<ul class="singDet lineBottom">
						<li>
							<i>
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoUser.svg" alt="Autor" title="Autor">
							</i>
							<?php $author = get_the_author(); ?>
							<?php echo $author; ?> |
						</li>
						<li>
							<i>
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoClock.svg" alt="Fecha" title="Fecha">
							</i>
							<?php the_time('l, F jS, Y') ?>
						</li>
						<li class="catList">
							<i>
								<img src="<?php echo get_template_directory_uri() ?>/img/plantilla/icoTag.svg" alt="Tag" title="Tag">
							</i>
							<?php
							$categories=get_the_category();
							$separator="";
							$output="/";
							if($categories){ ?>
							<ul>
							<?php
								foreach ($categories as $category) {
									$output.='<li><a href="'.get_category_link($category->term_id).'" title="'.$category->cat_name.'">'.$category->cat_name.'</li></a>'.$separator;
								}
								echo trim($output, $separator);
							} ?>
							</ul>
						</li>
					</ul>

					<div class="socialShare socialShareTop">
						<?php do_action( 'addthis_widget' ); ?>
					</div>

					<div class="campTxt lineBottom">
						<?php the_content(); ?>
					</div>

					<div class="rellBlog">

						<div class="titleBox2">
							<h3>
								Aquí tienes más artículos que te pueden interesar
							</h3>
						</div>
						<div class="col l5 m12 s12">
							<?php //Publicidad . small ?>
							<?php get_template_part( 'content/content', 'pubsmall' ); ?>
						</div>
						<div class="col l7 m12 s12">
							<?php $args = array(
								'posts_per_page' => '2',
								'cat' => get_the_category()
							);?>
							<?php $the_query = new WP_Query($args); ?>
								<?php if ($the_query->have_posts()) : ?>
									<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
										<div class="blogerItem itemShadow margBot20">
											<figure>
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
													<?php the_post_thumbnail(); ?>
												</a>
											</figure>
											<div class="blogerTxt">
												<h3>
													<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
														<?php the_title() ?>
													</a>
												</h3>
												<p>
													<?php the_excerpt(); ?>
												</p>
											</div>
										</div>
									<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							<?php endif; ?>
						</div>

					</div>
				</div>

			</div>

		</div>
	</div>
</section>