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

// Slide Toggle

let slideUp = (target, duration) => {
	target.style.transitionProperty = 'height';
	target.style.transitionDuration = duration + 'ms';
	target.style.height = 0;
	target.addEventListener(
		'transitionend',
		() => {
			target.style.display = 'none';
			target.style.removeProperty('display');
			target.style.removeProperty('height');
			target.style.removeProperty('overflow');
			target.style.removeProperty('transition-property');
			target.style.removeProperty('transition-duration');
			target.classList.remove('open');
		},
		{
			once: true,
		}
	);
};

let slideDown = (target, duration) => {
	target.style.removeProperty('display');
	let display = window.getComputedStyle(target).display;
	if (display === 'none') {
		display = 'block';
	}
	target.style.display = display;
	target.style.height = 'auto';
	let height = target.scrollHeight;
	target.style.height = 0;
	target.style.overflow = 'hidden';
	target.style.transitionProperty = 'height';
	target.style.transitionDuration = duration + 'ms';
	target.classList.add('open');

	window.setTimeout(() => {
		target.style.height = height + 'px';
	}, 25);
};

let slideToggle = (target, duration) => {
	if (window.getComputedStyle(target).display === 'none') {
		return slideDown(target, duration);
	} else {
		return slideUp(target, duration);
	}
};

document.querySelectorAll('.toggle-trigger').forEach(trigger => {
	trigger.addEventListener('click', function (e) {
		e.preventDefault();
		trigger.classList.toggle('toggled');
		slideToggle(document.getElementById(this.dataset.toggle), 250);
	});
});
