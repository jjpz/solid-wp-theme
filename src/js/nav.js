import {checkWindowWidth} from './general';

const page = document.querySelector('#page');
const siteHeader = document.querySelector('.site-header');
const siteHeaderContainer = document.querySelector('.site-header-container');
const siteBranding = document.querySelector('.site-branding');
const siteLogo = document.querySelector('.site-logo');
const siteTitle = document.querySelector('.site-title');
const siteNav = document.querySelector('.site-nav');
const mainNav = document.querySelector('.main-nav');
const langNav = document.querySelector('.lang-nav');
const buttonNav = document.querySelector('.button-nav');
const navToggle = document.querySelector('.nav-toggle');
const navClose = document.querySelector('.nav-close');
const siteContent = document.querySelector('.site-content');
const siteFooter = document.querySelector('.site-footer');
const siteURL = php_vars.site_url;
let offsetHeightElem = document.querySelector('.offset-height');

export function checkSiteHeaderWidth() {
	if (!siteHeader) {
		return;
	}

	// Get site header container padding
	let siteHeaderPaddingLeft = parseInt(window.getComputedStyle(siteHeaderContainer).getPropertyValue('padding-left'));
	let siteHeaderPaddingRight = parseInt(window.getComputedStyle(siteHeaderContainer).getPropertyValue('padding-right'));
	let siteHeaderPadding = siteHeaderPaddingLeft + siteHeaderPaddingRight;

	// Get site branding width
	let siteBrandingWidth = 0;
	let siteBrandingPadding = 0;

	if (siteBranding) {

		if (!siteLogo && !siteTitle) {

			siteBranding.classList.add('empty');

		} else {

			// Get site logo width
			let siteLogoWidth = siteLogo ? siteLogo.offsetWidth : 0;

			// Get site title width
			let siteTitleWidth = siteTitle ? siteTitle.offsetWidth : 0;

			// Get site branding padding
			siteBrandingPadding = 15;

			siteBrandingWidth = siteLogoWidth + siteTitleWidth + siteBrandingPadding;

		}

	}

	// Get main nav width
	let mainNavWidth = 0;
	if (mainNav) {
		let mainItemsArr = [];
		let mainItems = document.querySelectorAll('nav.main-nav > ul > li');

		mainItems.forEach(item => {
			mainItemsArr.push(item.querySelector('span').offsetWidth);
		});

		let mainNavPadding = 30;
		let mainNavGutters = (mainItems.length - 1) * 30;
		mainNavWidth = mainNavPadding + mainNavGutters + mainItemsArr.reduce((a, b) => {
			return a + b;
		}, 0);
	}

	// Get lang nav width
	let langNavWidth = 0;
	if (langNav) {
		let langItemsArr = [];
		let langItems = document.querySelectorAll('nav.lang-nav li.lang-item');

		langItems.forEach(item => {
			let span = item.querySelector('span').offsetWidth;
			let paddingLeft = parseInt(window.getComputedStyle(item).getPropertyValue('padding-left'));
			let paddingRight = parseInt(window.getComputedStyle(item).getPropertyValue('padding-right'));
			let borderLeft = parseInt(window.getComputedStyle(item).getPropertyValue('border-left'));
			let borderRight = parseInt(window.getComputedStyle(item).getPropertyValue('border-right'));
			let padding = paddingLeft + paddingRight;
			let border = borderLeft + borderRight;
			let width = span + padding + border;
			langItemsArr.push(width);
		});

		let langNavPadding = 60;
		langNavWidth = langNavPadding + langItemsArr.reduce((a, b) => {
			return a + b;
		}, 0);
	}

	// Get button nav width
	let buttonNavWidth = 0;
	if (buttonNav) {
		let buttonItemsArr = [];
		let buttonItems = document.querySelectorAll('nav.button-nav li');

		buttonItems.forEach(item => {
			let span = item.querySelector('span').offsetWidth;
			let button = item.querySelector('a');
			let paddingLeft = parseInt(window.getComputedStyle(button).getPropertyValue('padding-left'));
			let paddingRight = parseInt(window.getComputedStyle(button).getPropertyValue('padding-right'));
			let padding = paddingLeft + paddingRight;
			let borderLeft = parseInt(window.getComputedStyle(button).getPropertyValue('border-left-width'));
			let borderRight = parseInt(window.getComputedStyle(button).getPropertyValue('border-right-width'));
			let border = borderLeft + borderRight;
			let width = span + padding + border;
			buttonItemsArr.push(width);
		});

		let buttonNavPadding = 30;
		let buttonNavGutters = (buttonItems.length - 1) * 15;
		buttonNavWidth = buttonNavPadding + buttonNavGutters + buttonItemsArr.reduce((a, b) => {
			return a + b;
		}, 0);
	}

	// Get site header width
	let width = siteBrandingWidth + mainNavWidth + langNavWidth + buttonNavWidth + siteHeaderPadding;

	return width;
}

function checkMobileNavScroll() {
	if (!siteNav) {
		return;
	}

	let siteNavHeight = siteNav.offsetHeight;
	let siteNavPaddingTop = parseInt(window.getComputedStyle(siteNav).getPropertyValue('padding-top'));

	let mainNavHeight = 0;
	if (mainNav) {
		mainNavHeight = mainNav.offsetHeight;
	}

	let langNavHeight = 0;
	if (langNav) {
		langNavHeight = langNav.offsetHeight;
	}

	let buttonNavHeight = 0;
	if (buttonNav) {
		buttonNavHeight = buttonNav.offsetHeight;
	}

	let siteNavContentHeight = siteNavPaddingTop + mainNavHeight + langNavHeight + buttonNavHeight;

	if (siteNavHeight < siteNavContentHeight) {
		siteNav.classList.add('scrollable');
	} else {
		siteNav.classList.remove('scrollable');
	}
}

function checkSiteNav() {
	if (!siteNav) {
		return;
	}
}

export function checkSiteHeader() {
	checkSiteHeaderRes();
	checkSiteHeaderPos();
	//checkSiteHeaderActive();
	checkSiteHeaderSticky();
	checkSiteNav();
}

export function checkSiteHeaderRes() {
	if (!siteHeader) {
		return;
	}

	let windowWidth = checkWindowWidth();
	let siteHeaderWidth = checkSiteHeaderWidth();

	if (windowWidth <= siteHeaderWidth) {

		siteHeader.classList.remove('desktop');
		siteHeader.classList.add('mobile');
		siteNav.classList.remove('desktop');
		siteNav.classList.add('mobile');
		siteContent.classList.add('mobile');
		navToggle.classList.add('show');
		navClose.classList.add('show');

		page.insertBefore(siteNav, siteContent);

		checkMobileNavScroll();

	} else {

		siteHeader.classList.add('desktop');
		siteHeader.classList.remove('mobile');
		siteNav.classList.add('desktop');
		siteNav.classList.remove('mobile');
		siteContent.classList.remove('mobile');
		navToggle.classList.remove('show');
		navClose.classList.remove('show');

		siteHeaderContainer.insertBefore(siteNav, navToggle);

	}

}

export function checkSiteHeaderPos() {
	if (!siteHeader) {
		return;
	}

	if (!document.querySelector('.site-nav-left') && !document.body.classList.contains('home')) {
		siteHeader.classList.add('relative');
	} else {
		if (offsetHeightElem) {
			siteHeader.classList.add('absolute');
		} else {
			siteHeader.classList.add('fixed');
		}
	}
}

export function checkSiteHeaderActive() {
	if (
		document.body.classList.contains('desktop') 
		&& siteHeader.classList.contains('desktop') 
		&& siteHeader.classList.contains('absolute')
	) {
		siteHeader.addEventListener('mouseenter', mouseEnterHandler);
		siteHeader.addEventListener('mouseleave', mouseLeaveHandler);
	} else {
		siteHeader.removeEventListener('mouseenter', mouseEnterHandler);
		siteHeader.removeEventListener('mouseleave', mouseLeaveHandler);
	}
}

export function checkSiteHeaderSticky() {
	if (!siteHeader) {
		return;
	}

	let windowScroll = window.scrollY;
	let offsetHeight = offsetHeightElem
		? offsetHeightElem.offsetHeight
		: 0;

	if (offsetHeight && !siteHeader.classList.contains('fixed')) {
		if (windowScroll >= offsetHeight) {
			siteHeader.classList.remove('absolute');
			siteHeader.classList.add('sticky');
		} else {
			siteHeader.classList.add('absolute');
			siteHeader.classList.remove('sticky');
		}
	}
}

let toggleNav = e => {
	e.preventDefault();
	// navToggle.classList.toggle('on');
	siteNav.classList.toggle('show');
	siteFooter.classList.toggle('site-nav-open');
}

let mouseEnterHandler = () => siteHeader.classList.add('active');
let mouseLeaveHandler = () => siteHeader.classList.remove('active');

if (siteHeader) {
	navToggle.addEventListener('click', toggleNav);
	// siteHeader.addEventListener('mouseenter', mouseEnterHandler);
	// siteHeader.addEventListener('mouseleave', mouseLeaveHandler);

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
						// if (navToggle.classList.contains('on')) {
						// 	navToggle.classList.remove('on');
						// }
						if (siteNav.classList.contains('show')) {
							siteNav.classList.remove('show');
							siteFooter.classList.toggle('site-nav-open');
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

if (navClose) {
	navClose.addEventListener('click', e => {
		e.preventDefault();
		siteNav.classList.remove('show');
		siteFooter.classList.remove('site-nav-open');
	});
}

let subToggles = document.querySelectorAll('.submenu-toggle');
subToggles.forEach(subToggle => {
	subToggle.addEventListener('click', e => {
		e.preventDefault();
		let submenu = subToggle.nextElementSibling;

		if (!submenu.classList.contains('open')) {
			submenu.style.height = 'auto';
			let height = submenu.scrollHeight;
			submenu.style.height = 0;
			submenu.style.transitionProperty = 'height';
			submenu.style.transitionDuration = '0.25s';
			submenu.classList.add('open');

			window.setTimeout(() => {
				submenu.style.height = height + 'px';
			}, 25);
		} else {
			submenu.style.height = 0;
			submenu.addEventListener(
				'transitionend',
				() => {
					// target.style.display = 'none';
					// target.style.removeProperty('display');
					submenu.style.removeProperty('height');
					// target.style.removeProperty('overflow');
					submenu.style.removeProperty('transition-property');
					submenu.style.removeProperty('transition-duration');
					submenu.classList.remove('open');
				},
				{
					once: true,
				}
			);
		}
	});
});

document.addEventListener('click', e => {
	if (
		e.target === siteFooter && 
		siteNav.classList.contains('show')
	) {
		siteNav.classList.remove('show');
		siteFooter.classList.remove('site-nav-open');
	}
})