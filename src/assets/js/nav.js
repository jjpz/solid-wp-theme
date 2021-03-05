import {checkWindowWidth} from './general';

const page = document.querySelector('#page');
const siteHeader = document.querySelector('.site-header');
const siteHeaderContainer = document.querySelector('.site-header-container');
const siteBranding = document.querySelector('.site-branding');
const siteNav = document.querySelector('.site-nav');
const mainNav = document.querySelector('.main-nav');
const buttonNav = document.querySelector('.button-nav');
const navToggle = document.querySelector('.nav-toggle');
const navClose = document.querySelector('.nav-close');
const siteContent = document.querySelector('.site-content');
const siteFooter = document.querySelector('.site-footer');
const siteURL = php_vars.site_url;

// let siteHeaderWidth;
let offsetHeightElem = document.querySelector('.offset-height');

export function checkSiteHeaderWidth() {
	// if (!siteHeader) {
	// 	return;
	// }

	let siteHeaderPaddingLeft = parseInt(
		window
			.getComputedStyle(siteHeader)
			.getPropertyValue('padding-left')
	);
	let siteHeaderPaddingRight = parseInt(
		window
			.getComputedStyle(siteHeader)
			.getPropertyValue('padding-right')
	);
	let siteHeaderPadding = siteHeaderPaddingLeft + siteHeaderPaddingRight;
	let siteBrandingWidth = siteBranding ? siteBranding.offsetWidth : 0;

	// let mainNavWidth = mainNav ? mainNav.offsetWidth : 0;
	// let buttonNavWidth = buttonNav ? buttonNav.offsetWidth : 0;

	let mainItemsWidth = [];
	let mainItems = document.querySelectorAll('nav.main-nav > ul > li');
	mainItems.forEach((mainItem, index, array) => {
		let mainItemWIdth = mainItem.querySelector('span').offsetWidth;
		let mainItemMargin = (index === array.length - 1) ? 45 : 30;
		let mainItemFullWidth = mainItemWIdth + mainItemMargin;
		// console.log(mainItemFullWidth);
		mainItemsWidth.push(mainItemFullWidth);
		return mainItemsWidth;
	});
	let mainNavWidth = mainItemsWidth.reduce((a, b) => {
		return a + b;
	}, 0);
	// console.log(mainItemsWidth);
	// console.log(mainNavWidth);

	let langItemsWidth = [];
	let langItems = document.querySelectorAll('li.lang-item');
	langItems.forEach(langItem => {
		let langItemWidth = langItem.offsetWidth;
		let langItemMarginLeft = parseInt(window.getComputedStyle(langItem).getPropertyValue('margin-left'));
		let langItemMarginRight = parseInt(window.getComputedStyle(langItem).getPropertyValue('margin-right'));
		let langItemMargin = langItemMarginLeft + langItemMarginRight;
		let langItemFullWidth = langItemWidth + langItemMargin;
		// console.log(langItemFullWidth);
		langItemsWidth.push(langItemFullWidth);
	});
	let langNavWidth = langItemsWidth.reduce((a, b) => {
		return a + b;
	}, 0);
	// console.log(langItemsWidth);
	// console.log(langNavWidth);

	let buttonItemsWidth = [];
	let buttonItems = document.querySelectorAll('nav.button-nav li:not(.lang-item)');
	buttonItems.forEach(buttonItem => {
		let buttonItemWIdth = buttonItem.querySelector('span').offsetWidth;
		let buttonItemMargin = 30;
		let buttonItemLink = buttonItem.querySelector('a');
		let buttonItemPaddingLeft = parseInt(window.getComputedStyle(buttonItemLink).getPropertyValue('padding-left')) + 1;
		let buttonItemPaddingRight = parseInt(window.getComputedStyle(buttonItemLink).getPropertyValue('padding-right')) + 1;
		let buttonItemPadding = buttonItemPaddingLeft + buttonItemPaddingRight;
		let buttonItemFullWidth = buttonItemWIdth + buttonItemMargin + buttonItemPadding;
		// console.log(buttonItemFullWidth);
		buttonItemsWidth.push(buttonItemFullWidth);
	});
	let buttonNavWidth = buttonItemsWidth.reduce((a, b) => {
		return a + b;
	}, 0);
	// console.log(buttonItemsWidth);
	// console.log(buttonNavWidth);

	buttonNavWidth = buttonNavWidth + langNavWidth;

	let width =
		siteBrandingWidth +
		mainNavWidth +
		buttonNavWidth +
		siteHeaderPadding;

	return width;
}

function checkMobileNavScroll() {
	let siteNavHeight = siteNav.offsetHeight;
	let siteNavPaddingTop = parseInt(window.getComputedStyle(siteNav).getPropertyValue('padding-top'));
	let mainNavHeight = mainNav.offsetHeight;
	let mainNavMarginBottom = parseInt(window.getComputedStyle(mainNav).getPropertyValue('margin-bottom'));
	let mainNavFullHeight = mainNavHeight + mainNavMarginBottom;
	let buttonNavHeight = buttonNav.offsetHeight;
	let buttonNavMarginBottom = parseInt(window.getComputedStyle(buttonNav).getPropertyValue('margin-bottom'));
	let buttonNavFullHeight = buttonNavHeight + buttonNavMarginBottom;
	let siteNavContentHeight = siteNavPaddingTop + mainNavFullHeight + buttonNavFullHeight;
	// console.log(siteNavHeight);
	// console.log(siteNavContentHeight);

	if (siteNavHeight < siteNavContentHeight) {
		siteNav.classList.add('scrollable');
	} else {
		siteNav.classList.remove('scrollable');
	}
}

export function checkSiteHeader() {
	checkSiteHeaderRes();
	checkSiteHeaderPos();
	//checkSiteHeaderActive();
	checkSiteHeaderSticky();
}

export function checkSiteHeaderRes() {

	let windowWidth = checkWindowWidth();
	// console.log('window = ' + windowWidth);
	
	let siteHeaderWidth = checkSiteHeaderWidth();
	// console.log('header = ' + siteHeaderWidth);

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
	if (offsetHeightElem) {
		siteHeader.classList.add('absolute');
	} else {
		siteHeader.classList.add('fixed');
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

navClose.addEventListener('click', e => {
	e.preventDefault();
	siteNav.classList.remove('show');
	siteFooter.classList.remove('site-nav-open');
});

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