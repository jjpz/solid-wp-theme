const { src, dest, watch } = require('gulp');
const prefixCss = require('gulp-autoprefixer');
const concatCss = require('gulp-concat-css');
const cleanCss = require('gulp-clean-css');
const webpack = require('webpack-stream');
const browserSync = require('browser-sync').create();

let admin = () => {
	return src([
		'node_modules/bootstrap/dist/css/bootstrap-grid.min.css',
		'src/css/admin/admin.css',
	])
		.pipe(prefixCss())
		.pipe(concatCss('admin.css'))
		.pipe(cleanCss({
			format: {
				level: 2,
				breaks: {afterComment: true}
			}
		}))
		.pipe(dest('dist/assets/admin'))
		.pipe(browserSync.stream());
}

let css = () => {
	return src([
		'src/css/header.css',
		'src/css/vars.css',
		'node_modules/bootstrap/dist/css/bootstrap-grid.min.css',
		'src/css/index.css'
	])
		.pipe(prefixCss())
		.pipe(concatCss('style.css'))
		.pipe(cleanCss({
			format: {
				level: 2,
				breaks: {afterComment: true}
			}
		}))
		.pipe(dest('dist'))
		.pipe(browserSync.stream());
}

let js = () => {
	return src('src/js/*.js')
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
		.pipe(dest('dist'))
		.pipe(browserSync.stream());
}

exports.solid = () => {
	browserSync.init({
		proxy: 'http://localhost/solid',
		port: 3000,
		open: false,
	});
	watch([
		'dist/*.php',
		'dist/inc/**/*.php',
		'dist/templates/**/*.php',
	]).on('change', browserSync.reload);
	watch('src/css/admin/admin.css', admin);
	watch('src/css/*.css', css);
	watch('src/js/*.js', js);
};
