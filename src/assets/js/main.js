import {checkMobileDevice, siteLoaderFadeOut, removeHomeUrlHash} from './general';
import {checkSiteHeaderWidth, checkSiteHeader, checkStickyNav} from './nav';
import {checkImages} from './images';

window.addEventListener('load', () => {
	checkMobileDevice();
	siteLoaderFadeOut();
	checkSiteHeaderWidth();
	checkSiteHeader();
	checkStickyNav();
	removeHomeUrlHash();
});

window.addEventListener('scroll', () => {
	checkStickyNav();
});

window.addEventListener('resize', () => {
	checkMobileDevice();
	checkImages();
	checkSiteHeader();
	checkStickyNav();
});
