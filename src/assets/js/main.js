import {checkMobileDevice, siteLoaderFadeOut, removeHomeUrlHash} from './general';
import {checkSiteHeaderWidth, checkSiteHeader, checkSiteHeaderSticky} from './nav';
import {checkImages} from './images';

window.addEventListener('load', () => {
	checkMobileDevice();
	siteLoaderFadeOut();
	// checkSiteHeaderWidth();
	checkSiteHeader();
	removeHomeUrlHash();
});

window.addEventListener('scroll', () => {
	checkSiteHeaderSticky();
});

window.addEventListener('resize', () => {
	checkMobileDevice();
	checkSiteHeader();
	checkImages();
});
