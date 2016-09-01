<?php //Interior de entrada ?>
<section class="secrow single">
	<div class="container">
		<div class="row">
			<div class="col l8 m12 s12 lineLateralRight" style="position:relative;">

				<?php // ?>

				<?php //Titulo ?>
				<div class="titleBox1">
					<?php if (get_field('postint-ssombrero')) { ?>
						<small>
							<?php the_field('postint-ssombrero'); ?>
						</small>
					<?php } ?>
					<h1>
						<?php the_title() ?>
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
						$output="<span>,</span>";
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

				<?php // Bajada ?>
				<?php if (get_field('postint-stitulo')) { ?>
					<div class="titleBox2">
						<h2>
							<?php the_field('postint-stitulo'); ?>
						</h2>
					</div>
				<?php } ?>

				<?php if (have_rows('destacimg-slider')) { ?>
					<div class="singSlider owlOneItem">
						<?php while( have_rows('destacimg-slider') ): the_row(); ?>
							<div class="singItem">
								<figure>
									<?php $destacimgSlimg=get_sub_field('destacimg-slimg'); ?>
									<img src="<?php echo $destacimgSlimg['url']; ?>" alt="<?php echo $destacimgSlimg['title']; ?>" title="<?php echo $destacimgSlimg['title']; ?>">
								</figure>
							</div>
						<?php endwhile; ?>
					</div>
				<?php }elseif(get_field('destacimg-video')){ ?>
					<div class="singItem">
						<div class="pstVideo">
							<?php the_field('destacimg-video'); ?>
						</div>
					</div>
				<?php }else{ ?>
					<div class="singItem">
						<figure>
							<?php the_post_thumbnail(); ?>
						</figure>
					</div>
				<?php } ?>

				<?php //Contenido ?>
				<div class="campTxt campTxtPub lineBottom">
					<?php the_content(); ?>
					<div class="socialShare socialShareBottom">
						<?php do_action( 'addthis_widget' ); ?>
					</div>
				</div>

				<?php //Publicidad ?>
				<div class="pubSingle">
					<?php get_template_part( 'content/content', 'publong' ); ?>
				</div>
				
				<?php //Articulos relacionados ?>
				<div class="rowSing rowRell lineBottom">
					<div class="titleBox2">
						<h2>
							Noticias relacionadas
						</h2>
					</div>
					<?php $args = array(
						'cat' => get_query_var('cat'),
						'posts_per_page' => '3',
						// 'orderby'        => 'rand'
						'orderby'        => 'title'

					);?>
					<?php $the_query = new WP_Query($args); ?>
						<?php if ($the_query->have_posts()) : ?>
							<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
								<article class="col l4 m12 s12">
									<?php get_template_part( 'content/content', 'notcard' ); ?>
								</article>
							<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				</div>

				<?php //Articulos relacionados ?>
				<div class="rowSing rowRell lineBottom">
					<div class="titleBox2">
						<h2>
							Noticias de una categoría relacionadas
						</h2>
					</div>
					<?php $args = array(
						'posts_per_page' => '3',
						'cat' => get_query_var('cat')
					);?>
					<?php $the_query = new WP_Query($args); ?>
						<?php if ($the_query->have_posts()) : ?>
							<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
								<article class="col l4 m12 s12">
									<?php get_template_part( 'content/content', 'notcard' ); ?>
								</article>
							<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				</div>

			</div>

			<?php //Sidebar ?>
			<div class="col l4 m12 s12">
				<?php //Llamando al sidebar interior ?>
				<?php get_sidebar('interior'); ?>
			</div>
		</div>
	</div>
</section>