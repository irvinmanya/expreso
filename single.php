<?php get_header(); ?>

<?php //Publicidad ?>
<?php get_template_part( 'content/content', 'publong' ); ?>


<?php
if (in_category('editoriales')) {
	get_template_part( 'singlecat/single', 'editoriales' );
}elseif(in_category('polidatos-y-chicotazos')){
	get_template_part( 'singlecat/polidatos', 'editoriales' );
} else {
	get_template_part( 'singlecat/single', 'default ' );
}
?>

<?php get_footer(); ?>
</body>
</html>