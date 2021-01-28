import {checkImages} from './images';

document.addEventListener('DOMContentLoaded', intersectionObserver);
function intersectionObserver() {
	checkImages();
	let lazyImages = document.querySelectorAll('img.lazy');
	let active = false;

	if ('IntersectionObserver' in window) {
		let lazyImageObserver = new IntersectionObserver(
			(entries, imgObserver) => {
				entries.forEach(entry => {
					if (entry.isIntersecting) {
						let lazyImage = entry.target;
						//let srcset = lazyImage.dataset.srcset;
						let srcset = lazyImage.srcset;
						if (srcset) {
							lazyImage.src = srcset;
							//lazyImage.srcset = srcset;
						}
						lazyImage.classList.remove('lazy');
						if (lazyImage.src != '') {
							lazyImage.nextElementSibling.classList.remove('on');
						}
						imgObserver.unobserve(lazyImage);
					}
				});
			},
			{ rootMargin: '250px 0px' }
		);

		lazyImages.forEach(lazyImage => {
			lazyImageObserver.observe(lazyImage);
		});
	} else {
		// Fallback
		const lazyLoad = function () {
			if (active === false) {
				active = true;

				lazyImages.forEach(function (lazyImage) {
					if (
						lazyImage.getBoundingClientRect().top <=
							window.innerHeight &&
						lazyImage.getBoundingClientRect().bottom >= 0 &&
						getComputedStyle(lazyImage).display !== 'none'
					) {
						let srcset = lazyImage.dataset.srcset;
						lazyImage.src = srcset;
						lazyImage.srcset = srcset;
						lazyImage.currentSrc = srcset;
						lazyImage.classList.remove('lazy');

						if (lazyImage.srcset != '') {
							lazyImage.nextElementSibling.classList.remove('on');
						}

						lazyImages = lazyImages.filter(function (image) {
							return image !== lazyImage;
						});

						if (lazyImages.length === 0) {
							document.removeEventListener('scroll', lazyLoad);
							window.removeEventListener('resize', lazyLoad);
							window.removeEventListener(
								'orientationchange',
								lazyLoad
							);
						}
					}
				});

				active = false;
			}
		};
		window.addEventListener('scroll', lazyLoad);
		window.addEventListener('resize', lazyLoad);
		window.addEventListener('orientationchange', lazyLoad);
	}
}
