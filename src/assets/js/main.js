const html = document.documentElement;
const body = document.body;
if (
	typeof document.querySelector('.site-header') !== 'undefined' &&
	document.querySelector('.site-header') !== null
) {
	const siteHeader = document.querySelector('.site-header');
	const siteNav = siteHeader.querySelector('.site-nav');
	const navToggle = siteHeader.querySelector('.nav-toggle');
}
const siteMain = document.querySelector('.site-main');
const siteFooter = document.querySelector('.site-footer');
const images = document.querySelectorAll('.image');
const popups = document.querySelectorAll('[data-toggle="popup"]');
const prev = document.querySelectorAll('a.team-prev');
const next = document.querySelectorAll('a.team-next');

const mobileBreakpoint = 769;

let windowWidth;
let siteHeaderWidth;

function checkWindowWidth() {
	windowWidth = html.clientWidth;
	//console.log('Window Width: ' + width);
	return windowWidth;
}

function checkMobile() {
	if (window.navigator.userAgent.includes('Mobi')) {
		body.classList.remove('desktop');
		body.classList.add('mobile');
	} else {
		body.classList.remove('mobile');
		body.classList.add('desktop');
	}
}

function loading() {
	setTimeout(function () {
		document.getElementById('loader').classList.add('loaded');
	}, 250);
	setTimeout(function () {
		document.getElementById('overlay').classList.add('loaded');
	}, 500);
	setTimeout(function () {
		document.getElementById('overlay').style.display = 'none';
	}, 1500);
}
