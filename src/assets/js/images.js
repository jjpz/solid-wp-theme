import {checkWindowWidth} from './general';

const mobileBreakpoint = 769;
const images = document.querySelectorAll('.image');

function getSrc(width, targetSrc, targetSrcset) {
	let source;

	if (Array.isArray(targetSrcset)) {

		let srcset = [];

		targetSrcset.forEach(src => {
			let object = {};
			let array = src.split(' ');
			array[1] = array[1].slice(0, -1);
			object.src = array[0];
			object.width = array[1];
			srcset.push(object);
		});

		srcset.sort(function (a, b) {
			return a.width - b.width;
		});

		for (let i = 0, l = srcset.length; i < l; i++) {
			if (srcset[i].width >= width) {
				source = srcset[i].src;
				break;
			} else {
				source = srcset[l - 1].src;
			}
		}

	} else {
		source = targetSrc;
	}

	return source;

}

export function checkImages() {
	let windowWidth = checkWindowWidth();
	if (document.body.classList.contains('home')) {
		images.forEach(image => {
			let imageWidth = image.offsetWidth;
			let img = image.getElementsByTagName('img')[0];

			if (img) {

				let source;
				let mainSrc = img.dataset.src;
				let mobileSrc = img.dataset.mobileSrc;

				let mainSrcset = img.dataset.srcset;

				if (img.dataset.type !== 'svg') {
					mainSrcset = mainSrcset.split(', ');
				}

				if (mobileSrc) {

					let mobileSrcset = img.dataset.mobileSrcset;

					if (img.dataset.mobileType !== 'svg') {
						mobileSrcset = mobileSrcset.split(', ');
					}

					if (windowWidth < mobileBreakpoint) {
						source = getSrc(imageWidth, mobileSrc, mobileSrcset);
						img.alt = img.dataset.mobileAlt;
					} else {
						source = getSrc(imageWidth, mainSrc, mainSrcset);
						img.alt = img.dataset.alt;
					}

				} else {

					source = getSrc(imageWidth, mainSrc, mainSrcset);

				}

				if (img.classList.contains('lazy')) {
					img.srcset = source;
				} else {
					img.src = source;
					img.srcset = source;
				}

			}

		});
	}
}
