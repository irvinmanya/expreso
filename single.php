<?php get_header(); ?>

<?php //Publicidad ?>
<?php get_template_part( 'content/content', 'publong' ); ?>

<?php
if (in_category('editoriales')) {
	get_template_part( 'singlecat/single', 'editoriales' );
}elseif(in_category('polidatos-y-chicotazos')){
	get_template_part( 'singlecat/polidatos', 'polidatos' );
}elseif(in_category('galeria-de-portadas')){
	get_template_part( 'singlecat/polidatos', 'portadas' );
}elseif(in_category('blogueros')){
	get_template_part( 'singlecat/polidatos', 'blogueros' );
} else {
	get_template_part( 'singlecat/single', 'default ' );
}
?>

<?php get_footer(); ?>
</body>
</html>