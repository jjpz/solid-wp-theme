function checkImages() {
	checkWindowWidth();
	if (body.classList.contains('home')) {
		images.forEach(image => {
			//console.log(image);
			let img = image.getElementsByTagName('img')[0];
			if (img) {
				let mobile = img.dataset.mobile;
				let desktop = img.dataset.desktop;
				let srcset = img.dataset.srcset;

				let mobileSrcset = [];
				let desktopSrcset = [];
				let mainSrcset = [];

				if (!mobile && !desktop && !srcset) {
					return;
				}

				if (!mobile && !desktop && srcset) {
					mainSrcset = srcset.split(', ');
				} else {
					mobileSrcset = mobile.split(', ');
					desktopSrcset = desktop.split(', ');
				}

				let targetSrcset = [];
				let srcArray = [];
				let mobileAlt = img.dataset.mobileAlt;
				let mobileTitle = img.dataset.mobileTitle;
				let desktopAlt = img.dataset.desktopAlt;
				let desktopTitle = img.dataset.desktopTitle;
				let src;

				if (mobileSrcset.length > 0 && desktopSrcset.length > 0) {
					if (windowWidth < mobileBreakpoint) {
						targetSrcset = mobileSrcset;
						img.title = mobileTitle;
						img.alt = mobileAlt;
					} else {
						targetSrcset = desktopSrcset;
						img.title = desktopTitle;
						img.alt = desktopAlt;
					}
				} else {
					//targetSrcset = mobileSrcset != '' ? mobileSrcset : desktopSrcset;
					if (mobileSrcset != '') {
						targetSrcset = mobileSrcset;
					} else if (desktopSrcset != '') {
						targetSrcset = desktopSrcset;
					} else if (mainSrcset != '') {
						targetSrcset = mainSrcset;
					}
				}
				//console.log(targetSrcset);

				targetSrcset.forEach(src => {
					let obj = {};
					let srcset = src.split(' ');
					//console.log(srcset);
					srcset[1] = srcset[1].slice(0, -1);
					obj.width = srcset[1];
					obj.src = srcset[0];
					//console.log(obj);
					srcArray.push(obj);
				});

				srcArray.sort(function (a, b) {
					return a.width - b.width;
				});
				//console.log(srcArray);

				for (let i = 0, l = srcArray.length; i < l; i++) {
					if (srcArray[i].width >= image.offsetWidth) {
						src = srcArray[i].src;
						break;
					} else {
						src = srcArray[l - 1].src;
					}
				}

				if (img.classList.contains('lazy')) {
					//img.dataset.srcset = src;
					img.srcset = src;
				} else {
					//img.dataset.srcset = src;
					img.srcset = src;
					img.src = src;
				}
			}
		});
	}
}
