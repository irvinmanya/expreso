<?php
/**
 * Template Name: Publicidad
 */
?>
<?php get_header(); ?>

<?php //Publicidad - Long ?>
<?php include('../content/publong.php'); ?>

<?php if( have_rows('pub-cont') ): ?>
	<?php while ( have_rows('pub-cont') ) : the_row(); ?>

		<?php // -- [ Formulario ] -- // ?>
		<?php if( get_row_layout() == 'formulario' ): ?>

			<section class="secrow pubform">
				<div class="container">
					<div class="row">
						<div class="titleBox1">
							<h1>
								<?php the_sub_field('pform-titulo'); ?>
							</h1>
						</div>
						<?php // [ Formulario ] <------// ?>
						<div class="formBox">
							<?php echo do_shortcode( '[contact-form-7 id="75901" title="Formulario de Publicidad"]' ); ?>
						</div>
					</div>
				</div>
			</section>

		<?php // -- [ Informacion ] -- // ?>
		<?php elseif( get_row_layout() == 'informacion' ): ?>

			<section class="secrow pubinf lineTop">
				<div class="container">
					<div class="row">
						<div class="titleBox2">
							<?php the_sub_field('pinf-titulo'); ?>
						</div>
						<div class="col l4 m12 s12">
							<ul class="pinfList">
								<?php if( have_rows('pinf-list') ): ?>
									<?php while( have_rows('pinf-list') ): the_row(); ?>
										<li>
											<i>
												<?php $pinfLico = get_sub_field('pinf-lico');  ?>
												<img src="<?php echo $pinfLico['url']; ?>" alt="<?php echo $pinfLico['title']; ?>" title="<?php echo $pinfLico['title']; ?>">
											</i>
											<div class="pinfTxt">
												<?php the_sub_field('pinf-ltxt'); ?>
											</div>
										</li>
									<?php endwhile; ?>
								<?php endif; ?>

							</ul>
						</div>
						<div class="col l8 m12 s12">
							<div class="gmap" id="gmap">
								
							</div>
						</div>
						<div class="col l12 m12 s12">
							<ul class="pinfTell">
								<li class="col l3 m6 s12 lineLateralRight">
									<div class="pinfTellTitulo margBot20">
										<h3>
											<?php the_sub_field('pinf-ttitulo',false,false); ?>
										</h3>
									</div>
								</li>
								<?php if( have_rows('pinf-tlist') ): ?>
									<?php while( have_rows('pinf-tlist') ): the_row(); ?>
										<li class="col l3 m6 s12 lineLateralRight margBot20">
											<h4>
												<?php the_sub_field('pinf-tldist'); ?>
											</h4>
											<p>
												<?php the_sub_field('pinf-tltxt'); ?>
											</p>
										</li>
									<?php endwhile; ?>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</section>

		<?php // -- [ Equipo de trabajo ] -- // ?>
		<?php elseif( get_row_layout() == 'equipodetrabajo' ): ?>

			<section class="secrow pubemp lineBottom">
				<div class="container">
					<div class="row">
						<div class="titleBox2">
							<?php the_sub_field('pteam-titulo'); ?>
						</div>
						<ul class="teamList">
							<?php if( have_rows('pteam-list') ): ?>
								<?php while( have_rows('pteam-list') ): the_row(); ?>
									<li class="col l4 m12 s12 lineLateralRight">
										<div class="teamItem">
											<?php the_sub_field('pteam-ltxt'); ?>
										</div>
									</li>
								<?php endwhile; ?>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</section>

		<?php endif; ?>

	<?php endwhile; ?>
<?php endif; ?>

<?php
	if (false) {
		if( have_rows('pub-cont') ):
		// loop through the rows of data
			while ( have_rows('pub-cont') ) : the_row();
				if( get_row_layout() == 'informacion' ):
					echo 'aqui va el modulo informacion';
				elseif( get_row_layout() == 'formulario' ):
					echo 'aqui va el modulo formulrio';
				elseif( get_row_layout() == 'equipodetrabajo' ):
					echo 'aqui va el modulo equipodetrabajo';
				endif;
			endwhile;
		else :
			echo "sin contenido";
		endif;
	}
?>
<?php get_footer(); ?>

<script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places" type="text/javascript"></script>
<script type="text/javascript">
function mapaG(id, coordenada1, coordenada2, title, direc, fono, email, detalle ){
      
        var mapOptions = {
            center: new google.maps.LatLng(coordenada1, coordenada2),
            zoom: 16,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
            },
            disableDoubleClickZoom: false,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
            },
            scaleControl: true,
            scrollwheel: false,
            panControl: true,
            streetViewControl: true,
            draggable: true,
            disableDefaultUI: true,
            overviewMapControl: true,
            overviewMapControlOptions: {
                opened: false,
            },
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [
				{
					"featureType": "administrative",
					"elementType": "labels",
					"stylers": [
						{
							"visibility": "off"
						}
					]
				},
				{
					"featureType": "administrative",
					"elementType": "labels.text.fill",
					"stylers": [
						{
							"color": "#444444"
						}
					]
				},
				{
					"featureType": "administrative.neighborhood",
					"elementType": "labels",
					"stylers": [
						{
							"visibility": "on"
						},
						{
							"hue": "#ff9700"
						},
						{
							"saturation": "-6"
						}
					]
				},
				{
					"featureType": "landscape",
					"elementType": "all",
					"stylers": [
					{
						"color": "#f2f2f2"
					}
					]
				},
				{
				    "featureType": "landscape",
				    "elementType": "labels",
				    "stylers": [
				        {
				         	"visibility": "off"
				        }
				    ]
				},
				{
					"featureType": "landscape.man_made",
					"elementType": "geometry.fill",
					"stylers": [
						{
						    "color": "#cce7ef"
						}
					]
				},
				{
				    "featureType": "landscape.man_made",
				    "elementType": "labels.text",
				    "stylers": [
				        {
				            "visibility": "off"
				        }
				    ]
				},
				{
				    "featureType": "landscape.man_made",
				    "elementType": "labels.text.fill",
				    "stylers": [
				        {
				            "visibility": "off"
				        }
				    ]
				},
				{
				    "featureType": "landscape.natural",
				    "elementType": "labels",
				    "stylers": [
				        {
				            "visibility": "off"
				        }
				    ]
				},
				{
				    "featureType": "landscape.natural",
				    "elementType": "labels.text",
				    "stylers": [
				        {
				            "visibility": "off"
				        }
				    ]
				},
				{
				    "featureType": "poi",
				    "elementType": "all",
				    "stylers": [
				        {
				            "visibility": "off"
				        }
				    ]
				},
				{
				    "featureType": "poi",
				    "elementType": "geometry",
				    "stylers": [
				        {
				            "visibility": "off"
				        }
				    ]
				},
				{
				    "featureType": "poi",
				    "elementType": "labels",
				    "stylers": [
				        {
				            "visibility": "off"
				        }
				    ]
				},
				{
				    "featureType": "poi",
				    "elementType": "labels.text",
				    "stylers": [
				        {
				            "visibility": "off"
				        }
				    ]
				},
				{
				    "featureType": "poi.park",
				    "elementType": "geometry.fill",
				    "stylers": [
				        {
				            "visibility": "on"
				        },
				        {
				            "color": "#e3ffcc"
				        }
				    ]
				},
				{
				    "featureType": "road",
				    "elementType": "all",
				    "stylers": [
				        {
				            "saturation": -100
				        },
				        {
				            "lightness": 45
				        }
				    ]
				},
				{
				    "featureType": "road",
				    "elementType": "labels",
				    "stylers": [
				        {
				            "visibility": "off"
				        }
				    ]
				},
				{
				    "featureType": "road.highway",
				    "elementType": "all",
				    "stylers": [
				        {
				            "visibility": "simplified"
				        }
				    ]
				},
				{
				    "featureType": "road.highway",
				    "elementType": "geometry.fill",
				    "stylers": [
				        {
				            "color": "#f9c6c1"
				        },
				        {
				            "visibility": "off"
				        }
				    ]
				},
				{
				    "featureType": "road.arterial",
				    "elementType": "labels.icon",
				    "stylers": [
				        {
				            "visibility": "off"
				        }
				    ]
				},
				{
				    "featureType": "transit",
				    "elementType": "all",
				    "stylers": [
				        {
				            "visibility": "off"
				        }
				    ]
				},
				{
				    "featureType": "water",
				    "elementType": "all",
				    "stylers": [
				        {
				            "color": "#4FA5E0"
				        },
				        {
				            "visibility": "on"
				        }
				    ]
				},
				{
				    "featureType": "water",
				    "elementType": "geometry.fill",
				    "stylers": [
				        {
				            "visibility": "on"
				        },
				        {
				            "color": "#deeeff"
				        }
				    ]
				},
				{
				    "featureType": "water",
				    "elementType": "labels.text",
				    "stylers": [
				        {
				            "color": "#deeeff"
				        }
				    ]
				}
          ]
        }
        var mapElement =  document.getElementById(id);
        var map = new google.maps.Map(mapElement, mapOptions);
        var titulo = title;
        var direccion = direc;
        var telefono = fono;
        var latitud = coordenada1;
        var longitud = coordenada2;
        var icono = "<?php echo get_template_directory_uri() ?>/img/plantilla/ico-map.svg";
        if (direccion == 'undefined') {
            direccion = '';
        }
        if (telefono == 'undefined') {
            telefono = '';
        }
        if (email == 'undefined') {
                email = '';
            }
        if (detalle == 'undefined') {
            detalle = '';
        }
        if (icono == 'undefined') {
            icono = '';
        }
        marker = new google.maps.Marker({
            icon: icono,
            position: new google.maps.LatLng(latitud, longitud),
            map: map,
            title: titulo,
            desc: direccion,
            tel: telefono,
            animation: google.maps.Animation.DROP
        });
        bindInfoWindow(marker, map, titulo, direccion, telefono, latitud, longitud, email, detalle);

        function bindInfoWindow(marker, map, titulo, direccion, telefono, latitud, longitud, email, detalle) {
            var infoWindowVisible = (function () {
                var currentlyVisible = false;
                return function (visible) {
                    if (visible !== undefined) {
                        currentlyVisible = visible;
                    }
                    return currentlyVisible;
                };
            }());
            iw = new google.maps.InfoWindow();
			// var html2 = "<div class='mapInfo'><h4>"
			// + titulo + "</h4><p>" + 
			// direccion + "</p><p><a href='tel:"+telefono+"'> +" + 
			// telefono + "</a></p><p><a href='mailto:"+email+"'>" + 
			// email + "</a></p>"+detalle+"</div>";
			// iw2 = new google.maps.InfoWindow({
			//     content: html2
			// });
            // iw2.open(map, marker);
            // infoWindowVisible(true);
            google.maps.event.addListener(marker, 'click', function () {
                if (infoWindowVisible()) {
                    iw.close();
                    // iw2.close();
                    infoWindowVisible(false);
                } else {
                    var html = "<div class='mapInfo'><h4>"
                    + titulo + "</h4><p>" + 
                    direccion + "</p><p><a href='tel:"+telefono+"'> +" + 
                    telefono + "</a></p><p><a href='mailto:"+email+"'>" + 
            email + "</a></p>"+detalle+"</div>";
                    iw = new google.maps.InfoWindow({
                        content: html
                    });
                    iw.open(map, marker);
                    infoWindowVisible(true);
                }
            });

            google.maps.event.addListener(iw, 'closeclick', function () {
                infoWindowVisible(false);
            });
    }
}
<?php if( have_rows('pub-cont') ): ?>
	<?php while ( have_rows('pub-cont') ) : the_row(); ?>

		<?php // -- [ Formulario ] -- // ?>
		<?php if( get_row_layout() == 'formulario' ): ?>
			//mapaG("gmap",Latitud,Longitud,"Hola mundo Titulo","soy la direccion","soy el numero","Soy el correo","xddd");
			mapaG("gmap",<?php the_sub_field('pinf-long'); ?>,<?php the_sub_field('pinf-mlat'); ?>,"<?php the_sub_field('pinf-mtitulo'); ?>","<?php the_sub_field('pinf-mdesc'); ?>","","","");
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>
</script>

</body>
</html>