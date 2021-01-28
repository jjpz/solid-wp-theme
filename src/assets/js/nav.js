import {checkWindowWidth} from './general';

const siteHeader = document.querySelector('.site-header');
const siteNav = document.querySelector('.site-nav');
const navToggle = document.querySelector('.nav-toggle');
const siteMain = document.querySelector('.site-main');
const homeIntroBanner = document.querySelector('.home-intro-banner');
const siteURL = php_vars.site_url;

let siteHeaderWidth;

export function checkSiteHeaderWidth() {
	if (!siteHeader) {
		return;
	}

	let siteHeaderPaddingLeft = parseInt(
		window.getComputedStyle(siteHeader).getPropertyValue('padding-left')
	);
	let siteHeaderPaddingRight = parseInt(
		window
			.getComputedStyle(siteHeader)
			.getPropertyValue('padding-right')
	);
	let siteHeaderPadding = siteHeaderPaddingLeft + siteHeaderPaddingRight;
	let siteBrandingWidth = siteHeader.querySelector('.site-branding')
		.offsetWidth;
	let mainNav = siteHeader.querySelector('.main-nav');
	let mainNavWidth = 0;
	if (mainNav) {
		mainNavWidth = siteHeader.querySelector('.main-nav').offsetWidth;
	}
	let buttonNav = siteHeader.querySelector('.button-nav');
	let buttonNavWidth = 0;
	if (buttonNav) {
		buttonNavWidth = siteHeader.querySelector('.button-nav')
		.offsetWidth;
	}
	siteHeaderWidth =
		siteBrandingWidth +
		mainNavWidth +
		buttonNavWidth +
		siteHeaderPadding;
	return siteHeaderWidth;
}

export function checkSiteHeader() {
	if (!siteHeader) {
		return;
	}

	let windowWidth = checkWindowWidth();
	if (windowWidth <= siteHeaderWidth) {
		siteHeader.classList.remove('sticky');
		siteHeader.classList.add('mobile', 'fixed');
		siteMain.classList.add('mobile');
		siteNav.classList.add('mobile');
		navToggle.classList.add('show');
		if (homeIntroBanner) {
			homeIntroBanner.classList.add('mobile');
		}
	} else {
		siteHeader.classList.remove('mobile', 'fixed');
		siteMain.classList.remove('mobile');
		siteNav.classList.remove('mobile');
		navToggle.classList.remove('show');
		if (homeIntroBanner) {
			homeIntroBanner.classList.remove('mobile');
		}
	}
}

export function checkStickyNav() {
	if (!siteHeader) {
		return;
	}
	
	let windowScroll = window.scrollY;
	let offsetHeightElem = document.querySelector('.offset-height');
	let offsetHeight = offsetHeightElem
		? offsetHeightElem.offsetHeight
		: '';
	if (offsetHeight != '' && !siteHeader.classList.contains('mobile')) {
		if (windowScroll >= offsetHeight) {
			siteHeader.classList.add('sticky');
		} else {
			siteHeader.classList.remove('sticky');
		}
	} else {
		siteHeader.classList.add('fixed');
		siteMain.classList.add('fixed');
	}
}

let toggleNav = e => {
	e.preventDefault();
	navToggle.classList.toggle('on');
	siteNav.classList.toggle('show');
}

let mouseEnterHandler = () => siteHeader.classList.add('active');
let mouseLeaveHandler = () => siteHeader.classList.remove('active');

if (siteHeader) {
	navToggle.addEventListener('click', toggleNav);
	siteHeader.addEventListener('mouseenter', mouseEnterHandler);
	siteHeader.addEventListener('mouseleave', mouseLeaveHandler);

	let menus = siteHeader.querySelectorAll('ul.menu');
	menus.forEach(menu => {
		let items = menu.querySelectorAll('li.menu-item:not(.lang-item)');
		items.forEach(item => {
			let a = item.querySelector('a');
			let href = a.href;
			if (href.indexOf('#') != -1) {
				let hash = href.substring(href.indexOf('#'));
				let elem = document.querySelector(hash);
				a.addEventListener('click', e => {
					e.preventDefault();
					if (document.body.classList.contains('home')) {
						if (navToggle.classList.contains('on')) {
							navToggle.classList.remove('on');
						}
						if (siteNav.classList.contains('show')) {
							siteNav.classList.remove('show');
						}
						elem.scrollIntoView({behavior: 'smooth'});
					} else {
						window.location = siteURL + hash;
					}
				})
			}
		});
	});
}
