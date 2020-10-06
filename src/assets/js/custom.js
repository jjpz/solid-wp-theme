window.addEventListener('load', () => {
	checkMobile();
	loading();
	if (siteHeader) {
		checkSiteHeaderWidth();
		checkSiteHeader();
		checkStickyNav();
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
