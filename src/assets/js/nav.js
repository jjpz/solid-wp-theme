if (siteHeader) {
	function checkSiteHeaderWidth() {
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
		let mainNavWidth;
		if (mainNav) {
			mainNavWidth = siteHeader.querySelector('.main-nav').offsetWidth;
		}
		let buttonNav = siteHeader.querySelector('.button-nav');
		let buttonNavWidth;
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

	function checkSiteHeader() {
		if (windowWidth <= siteHeaderWidth) {
			siteHeader.classList.remove('sticky');
			siteHeader.classList.add('mobile', 'fixed');
			siteMain.classList.add('mobile');
			siteNav.classList.add('mobile');
			navToggle.classList.add('show');
		} else {
			siteHeader.classList.remove('mobile', 'fixed');
			siteMain.classList.remove('mobile');
			siteNav.classList.remove('mobile');
			navToggle.classList.remove('show');
		}
	}

	function checkStickyNav() {
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

	navToggle.addEventListener('click', e => {
		e.preventDefault();
		navToggle.classList.toggle('on');
		siteNav.classList.toggle('show');
	});

	function mouseEnterHandler() {
		siteHeader.classList.add('active');
	}
	
	function mouseLeaveHandler() {
		siteHeader.classList.remove('active');
	}
	
	siteHeader.addEventListener('mouseenter', mouseEnterHandler);
	siteHeader.addEventListener('mouseleave', mouseLeaveHandler);

	let uls = siteHeader.querySelectorAll('ul.menu');
	uls.forEach(ul => {
		let lis = ul.querySelectorAll('li.menu-item:not(.lang-item)');
		lis.forEach(li => {
			let a = li.querySelector('a');
			let href = a.href;
			if (href.indexOf('#') != -1) {
				let hash = href.substring(href.indexOf('#'));
				let elem = document.querySelector(hash);
				a.addEventListener('click', e => {
					e.preventDefault();
					elem.scrollIntoView({behavior: 'smooth'});
				})
			}
		});
	});
}