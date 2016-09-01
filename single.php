<?php get_header(); ?>

<?php
if (in_category('editoriales')) {
	get_template_part( 'singlecat/single', 'editoriales' );
// }elseif(in_category('polidatos-y-chicotazos')){
// 	get_template_part( 'singlecat/single', 'polidatos' );
// }elseif(in_category('galeria-de-portadas')){
// 	get_template_part( 'singlecat/single', 'portadas' );
}elseif(in_category('suplementos')){
	get_template_part( 'singlecat/single', 'suplemento' );
}elseif(in_category(131) || post_is_in_descendant_category(131)){
	get_template_part( 'singlecat/single', 'blogueros' );
}elseif(in_category(18) || post_is_in_descendant_category(18)){
	get_template_part( 'singlecat/single', 'blogueros' );
}else{
	get_template_part( 'singlecat/single', 'default' );
}
?>

<?php get_footer(); ?>
</body>
</html>