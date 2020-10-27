window.addEventListener('load', () => {
	checkMobile();
	loading();
	if (siteHeader) {
		checkSiteHeaderWidth();
		checkSiteHeader();
		checkStickyNav();
	}
	if (body.classList.contains('home')) {
		if (window.location.hash != '') {
			let url = window.location.toString();
			url = url.substring(0, url.indexOf('#'));
			setTimeout(function(){
				window.history.replaceState({}, document.title, url);
			}, 500)
		}
	}
});

window.addEventListener('scroll', () => {
	if (siteHeader) {
		checkStickyNav();
	}
});

window.addEventListener('resize', () => {
	checkMobile();
	checkImages();
	if (siteHeader) {
		checkSiteHeader();
		checkStickyNav();
	}
});
