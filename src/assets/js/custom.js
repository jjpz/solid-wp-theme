window.addEventListener('load', () => {
	checkMobile();
	loading();
	checkSiteHeaderWidth();
	checkSiteHeader();
	checkStickyNav();
});

window.addEventListener('scroll', () => {
	checkStickyNav();
});

window.addEventListener('resize', () => {
	checkMobile();
	checkImages();
	checkSiteHeader();
	checkStickyNav();
});
