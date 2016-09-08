<?php

$scriptPath = dirname(__FILE__);

$path = realpath($scriptPath . '/./');
$filepath = explode("wp-content",$path);

define('WP_USE_THEMES', false);

require(''.$filepath[0].'/wp-blog-header.php');
require_once dirname( __FILE__ ) . '/lib/endpoints/class-wp-rest-controller.php';

$fecEdit = $_POST['fecEdit']; // --- Get_date


$args = array(
	'posts_per_page' => '-1',
	'cat' => 48,
    'year' => 2016,
    'monthnum' => 07,
    'day' => 11
);

$keyOpen = '[';
$keyClose = ']';
$corchOpen = '{';
$corchClose = '}';
$comaFinal =',';

$the_query = new WP_Query($args);
if ($the_query->have_posts()) :

	echo '[';
	while ($the_query->have_posts()) : $the_query->the_post();
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

	$thumb_id = get_post_thumbnail_id();
	$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);

	$partID ='"idPage":'.get_the_ID();
	$partURL = '"urlPage":"'.get_the_permalink().'"';
	$partTitle = '"titlePage":"'.get_the_title().'"';
	$partTxt = '"txtPage":"'.get_the_content().'"';
	$partImgURl = '"urlImg":"'.$thumb_url[0].'"';


	$partCatLista = '"listaCatPage":';

	$jsonTMP[] = $corchOpen.$partID.$comaFinal.$partURL.$comaFinal.$partTitle.$comaFinal.$partImgURl.$corchClose;
	endwhile;
	echo implode(',', $jsonTMP);
	echo ']';
	
	wp_reset_postdata();

endif;

?>