/* Dependencias */
var gulp = require('gulp'),
	jshint = require('gulp-jshint'),
	concat = require('gulp-concat'),
	stylus = require('gulp-stylus'),
	rupture = require('rupture'),
	sass= require('gulp-sass'),
	nib = require('nib'),
	watch = require('gulp-watch'),
	uglify = require('gulp-uglify'),
	minifyCSS = require('gulp-minify-css'),
	imagemin    = require('gulp-imagemin'),
	pngquant = require('imagemin-pngquant'),
	jpegoptim = require('imagemin-jpegoptim'),
	rename    = require('gulp-rename'),
	Filter = require('gulp-filter'),
	newer = require('gulp-newer'),
	connect = require('gulp-connect-php'),
	browserSync = require('browser-sync'),
	reload=browserSync.reload;

/* Configuración global */
var path={
	inputStylusComponent:'./desarrollo/css/stylus/mycomponents/*.styl',
	inputStylusMain:'./desarrollo/css/stylus/*.styl',
	outputStylus:'./desarrollo/css/general/',

	inputCssGeneral:'./desarrollo/css/general/*.css',
	nameCssGeneral:'style.min.css',
	outputCssGeneral:'css/',

	inputSass:'./desarrollo/css/sass/**/*.scss',
	nameSass:'materialize.min.css',
	ouputSass:'./desarrollo/css/general/',

	inputJsMaterial:'./desarrollo/js/jsMaterial/*.js',
	outputJsMaterial:'./desarrollo/js/general/',
	nameJsMaterial:'materialize.js',

	inputJsGeneral:'./desarrollo/js/general/*.js',
	nameJsGeneral:'jsgeneral.js',
	outputJsGeneral:'js/',

	inputMyapp:'./desarrollo/js/myapp/*.js',
	nameMyapp:'myapp.min.js',
	outputMyapp:'js/',

	inputInclude:'./include/**/*'
};
var myFiles=[path.outputCssGeneral,path.ouputSass,path.outputJsGeneral,path.outputMyapp];

/* server php with browser sync */
gulp.task('cbs',function() {
	connect.server({}, function() {
		browserSync({
			proxy: 'http://localhost/expreso/'
		});
	});
	/* watch para stylusMain */
	gulp.watch(path.inputStylusMain, ['cssGeneral','bsReload']);
	/* watch para stylusComponents */
	gulp.watch(path.inputStylusComponent, ['cssGeneral','bsReload']);
	/* watch para css general */
	gulp.watch(path.inputCssGeneral, ['cssGeneral','bsReload']);
	/* watch para js */
	gulp.watch(path.inputJsGeneral, ['jsGeneral','bsReload']);
	/* watch para jsMyapp */
	gulp.watch(path.inputMyapp, ['jsMyapp','jsGeneral','bsReload']);
	/* watch para jsMaterial */
	gulp.watch(path.inputJsMaterial, ['jsMaterial','jsGeneral','bsReload']);
	/* watch para sass */
	gulp.watch(path.inputSass, ['sass','cssGeneral','bsReload']);

	/**** Tareas dependientes del proyecto ****/
	gulp.watch('**/*.php').on('change', function() {
		browserSync.reload();
	});
});
/* broser sync */
gulp.task('browser', function() {
	browserSync.init({
		server: {
			baseDir: "./",
			index: "1index.html"
		}
	});
});
/* Reload task */
gulp.task('bsReload', function () {
	browserSync.reload();
});
/* compilando stylus - No necesario, ya que lo implementamos en el task css */
gulp.task('nib', function(){
	gulp.src(path.inputStylusMain)
		.pipe(stylus({ use: [nib(),rupture()], compress: true }))
		.pipe(gulp.dest(path.outputStylus))
		.pipe(reload({stream:true}));
});
/* compilando stylus, concatenando y minificando todos los css */
gulp.task('cssGeneral', function () {
	var filter=Filter('**/*.styl', {restore: true});
	gulp.src([path.inputStylusMain,path.inputCssGeneral])
		.pipe(newer(path.outputCssGeneral))
		.pipe(filter)
		.pipe(stylus({ use: [nib(),rupture()], compress: true }))
		.pipe(filter.restore)
		.pipe(concat(path.nameCssGeneral))
		.pipe(minifyCSS({compatibility:'-units.ch,' +
		'-units.in,' +
		'-units.pc,' +
		'-units.pt,' +
		'-units.rem,' +
		'-units.vh,' +
		'-units.vm,' +
		'-units.vmax,' +
		'-units.vmin'}))
		.pipe(gulp.dest(path.outputCssGeneral))
		.pipe(reload({stream:true}));
});
/* compilar sass */
gulp.task('sass', function () {
	gulp.src(path.inputSass)
		.pipe(sass())
		.pipe(minifyCSS({compatibility:'-units.ch,' +
		'-units.in,' +
		'-units.pc,' +
		'-units.pt,' +
		'-units.rem,' +
		'-units.vh,' +
		'-units.vm,' +
		'-units.vmax,' +
		'-units.vmin'}))
		//.pipe(compressor())
		.pipe(rename(path.nameSass))
		.pipe(gulp.dest(path.ouputSass))
		/* Reload the browser CSS after every change */
		.pipe(reload({stream:true}));
});
/* Configuración de la tarea 'jsGeneral' */
gulp.task('jsGeneral', function () {
	gulp.src(path.inputJsGeneral)
		//.pipe(jshint())
		.pipe(concat(path.nameJsGeneral))
		.pipe(uglify())
		.pipe(gulp.dest(path.outputJsGeneral))
		//.on('error', gutil.log)
});
/* Configuración de la tarea 'jsMaterial' */
gulp.task('jsMaterial', function () {
	gulp.src(path.inputJsMaterial)
		//.pipe(jshint())
		.pipe(concat(path.nameJsMaterial))
		.pipe(gulp.dest(path.outputJsMaterial))
		//.on('error', gutil.log)
});
/* Comprimir myApp */
gulp.task('jsMyapp', function () {
	gulp.src(path.inputMyapp)
		//.pipe(jshint())
		.pipe(concat(path.nameMyapp))
		.pipe(uglify())
		.pipe(gulp.dest(path.outputMyapp))
		//.on('error', gutil.log)
});


/****************************************************
		Tareas dependientes del proyecto
*****************************************************/
/* Configuración de la tarea 'jsBgCanvas' */


gulp.task('ver', function () {
	/* watch para stylusMain */
	gulp.watch(path.inputStylusMain, ['cssGeneral']);
	/* watch para stylusComponents */
	gulp.watch(path.inputStylusComponent, ['cssGeneral']);
	/* watch para css general */
	gulp.watch(path.inputCssGeneral, ['cssGeneral']);
	/* watch para jsGeneral */
	gulp.watch(path.inputJsGeneral, ['jsGeneral']);
	/* watch para jsMyapp */
	gulp.watch(path.inputMyapp, ['jsMyapp','jsGeneral']);
	/* watch para jsMaterial */
	gulp.watch(path.inputJsMaterial, ['jsMaterial','jsGeneral']);
	/* watch para sass */
	gulp.watch(path.inputSass, ['sass','cssGeneral']);

	/**** Tareas dependientes del proyecto ****/
	/* watch para js jsBgCanvas */

});
gulp.task('runAll',['sass','cssGeneral','jsGeneral','jsMyapp']);