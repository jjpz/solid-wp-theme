const { src, dest, watch, parallel } = require('gulp');
const prefixCss = require('gulp-autoprefixer');
const concatCss = require('gulp-concat-css');
const cleanCss = require('gulp-clean-css');
const webpack = require('webpack-stream');
const mode = require('gulp-mode')();
const browserSync = require('browser-sync').create();

let isProd = mode.production();
let environment = 'development';

let checkEnv = () => {
	if (isProd) {
		environment = 'production';
	}
}

let admin = () => {
	return src([
		'node_modules/bootstrap/dist/css/bootstrap-grid.min.css',
		'src/css/admin/admin.css',
	])
		.pipe(prefixCss())
		.pipe(concatCss('admin.css'))
		.pipe(mode.production(cleanCss({
			format: {
				level: 2,
				breaks: {afterComment: true}
			}
		})))
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
		.pipe(mode.production(cleanCss({
			format: {
				level: 2,
				breaks: {afterComment: true}
			}
		})))
		.pipe(dest('dist'))
		.pipe(browserSync.stream());
}

let js = () => {
	checkEnv();
	return src('src/js/*.js')
		.pipe(webpack({
			mode: environment,
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

exports.watch = () => {
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
}

exports.build = parallel(admin, css, js);
