const path = require('path');
const { src, dest, watch } = require('gulp');
const babel = require('gulp-babel');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const autoprefix = require('gulp-autoprefixer');
const concatCSS = require('gulp-concat-css');
const cleanCSS = require('gulp-clean-css');
const browserSync = require('browser-sync').create();
const webpack = require('webpack-stream');

function adminCSS() {
	return src([
		'node_modules/bootstrap/dist/css/bootstrap-grid.min.css',
		'src/assets/css/admin.css',
	])
		.pipe(autoprefix())
		.pipe(concatCSS('admin.css'))
		.pipe(cleanCSS({ format: { breaks: { afterComment: true } } }))
		.pipe(dest('public/assets/css/'))
		.pipe(browserSync.stream());
}

function css() {
	return src([
		'src/assets/css/style.css',
		'node_modules/bootstrap/dist/css/bootstrap-grid.min.css',
		'src/assets/css/vars.css',
		'src/assets/css/typography.css',
		'src/assets/css/loader.css',
		'src/assets/css/nav.css',
		'src/assets/css/forms.css',
		'src/assets/css/custom.css',
		'src/assets/css/footer.css',
	])
		.pipe(autoprefix())
		.pipe(concatCSS('style.css'))
		.pipe(cleanCSS({ format: { breaks: { afterComment: true } } }))
		.pipe(dest('public/'))
		.pipe(browserSync.stream());
}

function js() {
	//return src(['src/assets/js/main.js', 'src/assets/js/lazy.js', 'src/assets/js/images.js', 'src/assets/js/nav.js', 'src/assets/js/popups.js', 'src/assets/js/custom.js'])
	return src('src/assets/js/*.js')
		//.pipe(babel({ presets: ['@babel/env'] }))
		//.pipe(concat('script.js'))
		//.pipe(uglify())
		.pipe(webpack({
			mode: 'production',
			output: {
				filename: 'script.js'
			},
			module: {
				rules: [
					{
						test: /\.js$/,
						exclude: /node_modules/,
						use: {
							loader: 'babel-loader',
							options: {
								presets: ['@babel/preset-env']
							}
						}
					}
				]
			},
		}))
		.pipe(dest('public/assets/js/'))
		.pipe(browserSync.stream());
}

exports.default = () => {
	browserSync.init({
		proxy: 'http://localhost/solid',
		port: 3000,
		open: false,
	});
	watch([
		'public/*.php',
		'public/includes/*.php',
		'public/templates/*.php',
	]).on('change', browserSync.reload);
	watch('src/assets/css/admin.css', adminCSS);
	watch(['src/assets/css/*.css', '!src/assets/css/admin.css'], css);
	watch('src/assets/js/*.js', js);
};
