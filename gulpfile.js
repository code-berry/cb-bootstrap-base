const gulp = require( 'gulp' ),
	fancylog = require( 'fancy-log' ),
	browserSync = require( 'browser-sync' ),
	server = browserSync.create(),
	dev_url = 'http://localhost/beartiling';


/**
 * Define all source paths
 */

var paths = {
	styles: {
		main: './assets/main.scss',
		src: './assets/scss/**/*.scss',
		dest: './assets/css'
	},
	scripts: {
		src: './assets/*.js',
		dest: './assets/js'
	}
};


/**
 * Webpack compilation: http://webpack.js.org, https://github.com/shama/webpack-stream#usage-with-gulp-watch
 * 
 * build_js()
 */

function build_js() {
	const compiler = require( 'webpack' ),
		webpackStream = require( 'webpack-stream' );

	return gulp.src( paths.scripts.src )
		.pipe(
			webpackStream( {
				config: require( './webpack.config.js' )
			},
				compiler
			)
		)
		.pipe(
			gulp.dest( paths.scripts.dest )
		)
		.pipe(
			server.stream() // Browser Reload
		);
}


/**
 * SASS-CSS compilation: https://www.npmjs.com/package/gulp-sass
 * 
 * build_css()
 */

function build_css() {
	const sass = require( 'gulp-sass' )( require( 'sass' ) ),
		postcss = require( 'gulp-postcss' ),
		sourcemaps = require( 'gulp-sourcemaps' ),
		autoprefixer = require( 'autoprefixer' ),
		cssnano = require( 'cssnano' );

	const plugins = [
		autoprefixer(),
		cssnano(),
	];

	return gulp.src( paths.styles.main )
		.pipe(
			sourcemaps.init()
		)
		.pipe(
			sass()
				.on( 'error', sass.logError )
		)
		.pipe(
			postcss( plugins )
		)
		.pipe(
			sourcemaps.write( './' )
		)
		.pipe(
			gulp.dest( paths.styles.dest )
		)
		.pipe(
			server.stream() // Browser Reload
		);
}

/**
 * Watch task: Webpack + SASS
 * 
 * $ gulp watch
 */

gulp.task( 'watch',
	function () {
		server.init({
			proxy: dev_url,
		});

		gulp.watch( paths.scripts.src, build_js );
		gulp.watch( paths.styles.src, build_css );
	}
);