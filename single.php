<?php get_header(); ?>

<?php //Publicidad ?>
<?php get_template_part( 'content/content', 'publong' ); ?>

<?php
if (in_category('editoriales')) {
	get_template_part( 'singlecat/single', 'editoriales' );
}elseif(in_category('polidatos-y-chicotazos')){
	get_template_part( 'singlecat/single', 'polidatos' );
}elseif(in_category('galeria-de-portadas')){
	get_template_part( 'singlecat/single', 'portadas' );
}elseif(in_category('blogueros')){
	$subcategories = get_categories('child_of=2,hide_empty=1'); 
	foreach ($subcategories as $subcategory) {
		get_template_part( 'singlecat/single', 'blogueros' );
	}
}elseif(in_category('opinion')){
	$subcategories = get_categories('child_of=2,hide_empty=1'); 
	foreach ($subcategories as $subcategory) {
		get_template_part( 'singlecat/single', 'blogueros' );
	}
}else{
	get_template_part( 'singlecat/single', 'default' );
}
?>

<?php get_footer(); ?>
</body>
</html>