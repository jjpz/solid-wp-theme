/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/js/general.js":
/*!***************************!*\
  !*** ./src/js/general.js ***!
  \***************************/
/*! exports provided: checkWindowWidth, checkMobileDevice, siteLoaderFadeOut, removeHomeUrlHash */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"checkWindowWidth\", function() { return checkWindowWidth; });\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"checkMobileDevice\", function() { return checkMobileDevice; });\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"siteLoaderFadeOut\", function() { return siteLoaderFadeOut; });\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"removeHomeUrlHash\", function() { return removeHomeUrlHash; });\nvar body = document.body;\n\nfunction checkWindowWidth() {\n  return document.documentElement.clientWidth;\n}\n\nfunction checkMobileDevice() {\n  if (window.navigator.userAgent.includes('Mobi')) {\n    body.classList.remove('desktop');\n    body.classList.add('mobile');\n  } else {\n    body.classList.remove('mobile');\n    body.classList.add('desktop');\n  }\n}\n\nfunction siteLoaderFadeOut() {\n  setTimeout(function () {\n    document.getElementById('loader').classList.add('loaded');\n  }, 250);\n  setTimeout(function () {\n    document.getElementById('overlay').classList.add('loaded');\n  }, 500);\n  setTimeout(function () {\n    document.getElementById('overlay').style.display = 'none';\n  }, 1500);\n}\n\nfunction removeHomeUrlHash() {\n  if (document.body.classList.contains('home')) {\n    if (window.location.hash != '') {\n      var url = window.location.toString();\n      url = url.substring(0, url.indexOf('#'));\n      setTimeout(function () {\n        window.history.replaceState({}, document.title, url);\n      }, 500);\n    }\n  }\n} // Slide Toggle\n\n\nvar slideUp = function slideUp(target, duration) {\n  target.style.transitionProperty = 'height';\n  target.style.transitionDuration = duration + 'ms';\n  target.style.height = 0;\n  target.addEventListener('transitionend', function () {\n    target.style.display = 'none';\n    target.style.removeProperty('display');\n    target.style.removeProperty('height');\n    target.style.removeProperty('overflow');\n    target.style.removeProperty('transition-property');\n    target.style.removeProperty('transition-duration');\n    target.classList.remove('open');\n  }, {\n    once: true\n  });\n};\n\nvar slideDown = function slideDown(target, duration) {\n  target.style.removeProperty('display');\n  var display = window.getComputedStyle(target).display;\n\n  if (display === 'none') {\n    display = 'block';\n  }\n\n  target.style.display = display;\n  target.style.height = 'auto';\n  var height = target.scrollHeight;\n  target.style.height = 0;\n  target.style.overflow = 'hidden';\n  target.style.transitionProperty = 'height';\n  target.style.transitionDuration = duration + 'ms';\n  target.classList.add('open');\n  window.setTimeout(function () {\n    // if (body.classList.contains('mobile')) {\n    target.style.height = height + 30 + 'px'; // } else {\n    // \ttarget.style.height = height + 'px';\n    // }\n  }, 25);\n};\n\nvar slideToggle = function slideToggle(target, duration) {\n  if (window.getComputedStyle(target).display === 'none') {\n    return slideDown(target, duration);\n  } else {\n    return slideUp(target, duration);\n  }\n};\n\ndocument.querySelectorAll('.toggle-trigger').forEach(function (trigger) {\n  trigger.addEventListener('click', function (e) {\n    e.preventDefault();\n    trigger.classList.toggle('toggled');\n    slideToggle(document.getElementById(this.dataset.toggle), 250);\n  });\n});\n\n\n//# sourceURL=webpack:///./src/js/general.js?");

/***/ }),

/***/ "./src/js/images.js":
/*!**************************!*\
  !*** ./src/js/images.js ***!
  \**************************/
/*! exports provided: checkImages */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"checkImages\", function() { return checkImages; });\n/* harmony import */ var _general__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./general */ \"./src/js/general.js\");\n\nvar mobileBreakpoint = 769;\nvar images = document.querySelectorAll('.image');\n\nfunction getSrc(image, targetSrc, targetSrcset) {\n  var source;\n\n  if (Array.isArray(targetSrcset)) {\n    var srcset = [];\n    targetSrcset.forEach(function (src) {\n      var object = {};\n      var array = src.split(' ');\n      array[1] = array[1].slice(0, -1);\n      object.src = array[0];\n      object.width = array[1];\n      srcset.push(object);\n    });\n    srcset.sort(function (a, b) {\n      return a.width - b.width;\n    });\n\n    for (var i = 0, l = srcset.length; i < l; i++) {\n      if (srcset[i].width >= image.offsetWidth) {\n        source = srcset[i].src;\n        break;\n      } else {\n        source = srcset[l - 1].src;\n      }\n    }\n  } else {\n    source = targetSrc;\n  }\n\n  return source;\n}\n\nfunction checkImages() {\n  var windowWidth = Object(_general__WEBPACK_IMPORTED_MODULE_0__[\"checkWindowWidth\"])(); // if (document.body.classList.contains('home')) {\n\n  if (images) {\n    images.forEach(function (image) {\n      var img = image.getElementsByTagName('img')[0];\n\n      if (img) {\n        var source;\n        var mainSrc = img.dataset.src;\n        var mobileSrc = img.dataset.mobileSrc;\n        var mainSrcset = img.dataset.srcset;\n\n        if (img.dataset.type !== 'svg') {\n          mainSrcset = mainSrcset.split(', ');\n        }\n\n        if (mobileSrc) {\n          var mobileSrcset = img.dataset.mobileSrcset;\n\n          if (img.dataset.mobileType !== 'svg') {\n            mobileSrcset = mobileSrcset.split(', ');\n          }\n\n          if (windowWidth < mobileBreakpoint) {\n            source = getSrc(image, mobileSrc, mobileSrcset);\n            img.alt = img.dataset.mobileAlt;\n          } else {\n            source = getSrc(image, mainSrc, mainSrcset);\n            img.alt = img.dataset.alt;\n          }\n        } else {\n          source = getSrc(image, mainSrc, mainSrcset);\n          img.alt = img.dataset.alt;\n        }\n\n        if (img.classList.contains('lazy')) {\n          img.srcset = source;\n        } else {\n          img.src = source;\n          img.srcset = source;\n        }\n      }\n    });\n  } // }\n\n}\n\n//# sourceURL=webpack:///./src/js/images.js?");

/***/ }),

/***/ "./src/js/lazy.js":
/*!************************!*\
  !*** ./src/js/lazy.js ***!
  \************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _images__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./images */ \"./src/js/images.js\");\n\ndocument.addEventListener('DOMContentLoaded', intersectionObserver);\n\nfunction intersectionObserver() {\n  Object(_images__WEBPACK_IMPORTED_MODULE_0__[\"checkImages\"])();\n  var lazyImages = document.querySelectorAll('img.lazy');\n  var active = false;\n\n  if ('IntersectionObserver' in window) {\n    var lazyImageObserver = new IntersectionObserver(function (entries, imgObserver) {\n      entries.forEach(function (entry) {\n        if (entry.isIntersecting) {\n          var lazyImage = entry.target;\n          lazyImage.src = lazyImage.srcset;\n          lazyImage.classList.remove('lazy');\n          lazyImage.nextElementSibling.classList.remove('on');\n          imgObserver.unobserve(lazyImage);\n        }\n      });\n    }, {\n      rootMargin: '250px 0px'\n    });\n    lazyImages.forEach(function (lazyImage) {\n      lazyImageObserver.observe(lazyImage);\n    });\n  } else {\n    // Fallback\n    var lazyLoad = function lazyLoad() {\n      if (active === false) {\n        active = true;\n        lazyImages.forEach(function (lazyImage) {\n          if (lazyImage.getBoundingClientRect().top <= window.innerHeight && lazyImage.getBoundingClientRect().bottom >= 0 && getComputedStyle(lazyImage).display !== 'none') {\n            var srcset = lazyImage.srcset;\n            lazyImage.src = srcset;\n            lazyImage.currentSrc = srcset;\n            lazyImage.classList.remove('lazy');\n            lazyImage.nextElementSibling.classList.remove('on');\n            lazyImages = lazyImages.filter(function (image) {\n              return image !== lazyImage;\n            });\n\n            if (lazyImages.length === 0) {\n              document.removeEventListener('scroll', lazyLoad);\n              window.removeEventListener('resize', lazyLoad);\n              window.removeEventListener('orientationchange', lazyLoad);\n            }\n          }\n        });\n        active = false;\n      }\n    };\n\n    window.addEventListener('scroll', lazyLoad);\n    window.addEventListener('resize', lazyLoad);\n    window.addEventListener('orientationchange', lazyLoad);\n  }\n}\n\n//# sourceURL=webpack:///./src/js/lazy.js?");

/***/ }),

/***/ "./src/js/main.js":
/*!************************!*\
  !*** ./src/js/main.js ***!
  \************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _general__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./general */ \"./src/js/general.js\");\n/* harmony import */ var _nav__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./nav */ \"./src/js/nav.js\");\n/* harmony import */ var _images__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./images */ \"./src/js/images.js\");\n\n\n\nwindow.addEventListener('load', function () {\n  Object(_general__WEBPACK_IMPORTED_MODULE_0__[\"checkMobileDevice\"])();\n  Object(_general__WEBPACK_IMPORTED_MODULE_0__[\"siteLoaderFadeOut\"])(); // checkSiteHeaderWidth();\n\n  Object(_nav__WEBPACK_IMPORTED_MODULE_1__[\"checkSiteHeader\"])();\n  Object(_general__WEBPACK_IMPORTED_MODULE_0__[\"removeHomeUrlHash\"])();\n});\nwindow.addEventListener('scroll', function () {\n  Object(_nav__WEBPACK_IMPORTED_MODULE_1__[\"checkSiteHeaderSticky\"])();\n});\nwindow.addEventListener('resize', function () {\n  Object(_general__WEBPACK_IMPORTED_MODULE_0__[\"checkMobileDevice\"])();\n  Object(_nav__WEBPACK_IMPORTED_MODULE_1__[\"checkSiteHeader\"])();\n  Object(_images__WEBPACK_IMPORTED_MODULE_2__[\"checkImages\"])();\n});\n\n//# sourceURL=webpack:///./src/js/main.js?");

/***/ }),

/***/ "./src/js/nav.js":
/*!***********************!*\
  !*** ./src/js/nav.js ***!
  \***********************/
/*! exports provided: checkSiteHeaderWidth, checkSiteHeader, checkSiteHeaderRes, checkSiteHeaderPos, checkSiteHeaderActive, checkSiteHeaderSticky */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"checkSiteHeaderWidth\", function() { return checkSiteHeaderWidth; });\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"checkSiteHeader\", function() { return checkSiteHeader; });\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"checkSiteHeaderRes\", function() { return checkSiteHeaderRes; });\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"checkSiteHeaderPos\", function() { return checkSiteHeaderPos; });\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"checkSiteHeaderActive\", function() { return checkSiteHeaderActive; });\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"checkSiteHeaderSticky\", function() { return checkSiteHeaderSticky; });\n/* harmony import */ var _general__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./general */ \"./src/js/general.js\");\n\nvar page = document.querySelector('#page');\nvar siteHeader = document.querySelector('.site-header');\nvar siteHeaderContainer = document.querySelector('.site-header-container');\nvar siteBranding = document.querySelector('.site-branding');\nvar siteLogo = document.querySelector('.site-logo');\nvar siteTitle = document.querySelector('.site-title');\nvar siteNav = document.querySelector('.site-nav');\nvar mainNav = document.querySelector('.main-nav');\nvar langNav = document.querySelector('.lang-nav');\nvar buttonNav = document.querySelector('.button-nav');\nvar navToggle = document.querySelector('.nav-toggle');\nvar navClose = document.querySelector('.nav-close');\nvar siteContent = document.querySelector('.site-content');\nvar siteFooter = document.querySelector('.site-footer');\nvar siteURL = php_vars.site_url;\nvar offsetHeightElem = document.querySelector('.offset-height');\nfunction checkSiteHeaderWidth() {\n  if (!siteHeader) {\n    return;\n  } // Get site header container padding\n\n\n  var siteHeaderPaddingLeft = parseInt(window.getComputedStyle(siteHeaderContainer).getPropertyValue('padding-left'));\n  var siteHeaderPaddingRight = parseInt(window.getComputedStyle(siteHeaderContainer).getPropertyValue('padding-right'));\n  var siteHeaderPadding = siteHeaderPaddingLeft + siteHeaderPaddingRight; // Get site branding width\n\n  var siteBrandingWidth = 0;\n  var siteBrandingPadding = 0;\n\n  if (siteBranding) {\n    if (!siteLogo && !siteTitle) {\n      siteBranding.classList.add('empty');\n    } else {\n      // Get site logo width\n      var siteLogoWidth = siteLogo ? siteLogo.offsetWidth : 0; // Get site title width\n\n      var siteTitleWidth = siteTitle ? siteTitle.offsetWidth : 0; // Get site branding padding\n\n      siteBrandingPadding = 15;\n      siteBrandingWidth = siteLogoWidth + siteTitleWidth + siteBrandingPadding;\n    }\n  } // Get main nav width\n\n\n  var mainNavWidth = 0;\n\n  if (mainNav) {\n    var mainItemsArr = [];\n    var mainItems = document.querySelectorAll('nav.main-nav > ul > li');\n    mainItems.forEach(function (item) {\n      mainItemsArr.push(item.querySelector('span').offsetWidth);\n    });\n    var mainNavPadding = 30;\n    var mainNavGutters = (mainItems.length - 1) * 30;\n    mainNavWidth = mainNavPadding + mainNavGutters + mainItemsArr.reduce(function (a, b) {\n      return a + b;\n    }, 0);\n  } // Get lang nav width\n\n\n  var langNavWidth = 0;\n\n  if (langNav) {\n    var langItemsArr = [];\n    var langItems = document.querySelectorAll('nav.lang-nav li.lang-item');\n    langItems.forEach(function (item) {\n      var span = item.querySelector('span').offsetWidth;\n      var paddingLeft = parseInt(window.getComputedStyle(item).getPropertyValue('padding-left'));\n      var paddingRight = parseInt(window.getComputedStyle(item).getPropertyValue('padding-right'));\n      var borderLeft = parseInt(window.getComputedStyle(item).getPropertyValue('border-left'));\n      var borderRight = parseInt(window.getComputedStyle(item).getPropertyValue('border-right'));\n      var padding = paddingLeft + paddingRight;\n      var border = borderLeft + borderRight;\n      var width = span + padding + border;\n      langItemsArr.push(width);\n    });\n    var langNavPadding = 60;\n    langNavWidth = langNavPadding + langItemsArr.reduce(function (a, b) {\n      return a + b;\n    }, 0);\n  } // Get button nav width\n\n\n  var buttonNavWidth = 0;\n\n  if (buttonNav) {\n    var buttonItemsArr = [];\n    var buttonItems = document.querySelectorAll('nav.button-nav li');\n    buttonItems.forEach(function (item) {\n      var span = item.querySelector('span').offsetWidth;\n      var button = item.querySelector('a');\n      var paddingLeft = parseInt(window.getComputedStyle(button).getPropertyValue('padding-left'));\n      var paddingRight = parseInt(window.getComputedStyle(button).getPropertyValue('padding-right'));\n      var padding = paddingLeft + paddingRight;\n      var borderLeft = parseInt(window.getComputedStyle(button).getPropertyValue('border-left-width'));\n      var borderRight = parseInt(window.getComputedStyle(button).getPropertyValue('border-right-width'));\n      var border = borderLeft + borderRight;\n      var width = span + padding + border;\n      buttonItemsArr.push(width);\n    });\n    var buttonNavPadding = 30;\n    var buttonNavGutters = (buttonItems.length - 1) * 15;\n    buttonNavWidth = buttonNavPadding + buttonNavGutters + buttonItemsArr.reduce(function (a, b) {\n      return a + b;\n    }, 0);\n  } // Get site header width\n\n\n  var width = siteBrandingWidth + mainNavWidth + langNavWidth + buttonNavWidth + siteHeaderPadding;\n  return width;\n}\n\nfunction checkMobileNavScroll() {\n  if (!siteNav) {\n    return;\n  }\n\n  var siteNavHeight = siteNav.offsetHeight;\n  var siteNavPaddingTop = parseInt(window.getComputedStyle(siteNav).getPropertyValue('padding-top'));\n  var mainNavHeight = 0;\n\n  if (mainNav) {\n    mainNavHeight = mainNav.offsetHeight;\n  }\n\n  var langNavHeight = 0;\n\n  if (langNav) {\n    langNavHeight = langNav.offsetHeight;\n  }\n\n  var buttonNavHeight = 0;\n\n  if (buttonNav) {\n    buttonNavHeight = buttonNav.offsetHeight;\n  }\n\n  var siteNavContentHeight = siteNavPaddingTop + mainNavHeight + langNavHeight + buttonNavHeight;\n\n  if (siteNavHeight < siteNavContentHeight) {\n    siteNav.classList.add('scrollable');\n  } else {\n    siteNav.classList.remove('scrollable');\n  }\n}\n\nfunction checkSiteNav() {\n  if (!siteNav) {\n    return;\n  }\n}\n\nfunction checkSiteHeader() {\n  checkSiteHeaderRes();\n  checkSiteHeaderPos(); //checkSiteHeaderActive();\n\n  checkSiteHeaderSticky();\n  checkSiteNav();\n}\nfunction checkSiteHeaderRes() {\n  if (!siteHeader) {\n    return;\n  }\n\n  var windowWidth = Object(_general__WEBPACK_IMPORTED_MODULE_0__[\"checkWindowWidth\"])();\n  var siteHeaderWidth = checkSiteHeaderWidth();\n\n  if (windowWidth <= siteHeaderWidth) {\n    siteHeader.classList.remove('desktop');\n    siteHeader.classList.add('mobile');\n    siteNav.classList.remove('desktop');\n    siteNav.classList.add('mobile');\n    siteContent.classList.add('mobile');\n    navToggle.classList.add('show');\n    navClose.classList.add('show');\n    page.insertBefore(siteNav, siteContent);\n    checkMobileNavScroll();\n  } else {\n    siteHeader.classList.add('desktop');\n    siteHeader.classList.remove('mobile');\n    siteNav.classList.add('desktop');\n    siteNav.classList.remove('mobile');\n    siteContent.classList.remove('mobile');\n    navToggle.classList.remove('show');\n    navClose.classList.remove('show');\n    siteHeaderContainer.insertBefore(siteNav, navToggle);\n  }\n}\nfunction checkSiteHeaderPos() {\n  if (!siteHeader) {\n    return;\n  }\n\n  if (!document.querySelector('.site-nav-left') && !document.body.classList.contains('home')) {\n    siteHeader.classList.add('relative');\n  } else {\n    if (offsetHeightElem) {\n      siteHeader.classList.add('absolute');\n    } else {\n      siteHeader.classList.add('fixed');\n    }\n  }\n}\nfunction checkSiteHeaderActive() {\n  if (document.body.classList.contains('desktop') && siteHeader.classList.contains('desktop') && siteHeader.classList.contains('absolute')) {\n    siteHeader.addEventListener('mouseenter', mouseEnterHandler);\n    siteHeader.addEventListener('mouseleave', mouseLeaveHandler);\n  } else {\n    siteHeader.removeEventListener('mouseenter', mouseEnterHandler);\n    siteHeader.removeEventListener('mouseleave', mouseLeaveHandler);\n  }\n}\nfunction checkSiteHeaderSticky() {\n  if (!siteHeader) {\n    return;\n  }\n\n  var windowScroll = window.scrollY;\n  var offsetHeight = offsetHeightElem ? offsetHeightElem.offsetHeight : 0;\n\n  if (offsetHeight && !siteHeader.classList.contains('fixed')) {\n    if (windowScroll >= offsetHeight) {\n      siteHeader.classList.remove('absolute');\n      siteHeader.classList.add('sticky');\n    } else {\n      siteHeader.classList.add('absolute');\n      siteHeader.classList.remove('sticky');\n    }\n  }\n}\n\nvar toggleNav = function toggleNav(e) {\n  e.preventDefault(); // navToggle.classList.toggle('on');\n\n  siteNav.classList.toggle('show');\n  siteFooter.classList.toggle('site-nav-open');\n};\n\nvar mouseEnterHandler = function mouseEnterHandler() {\n  return siteHeader.classList.add('active');\n};\n\nvar mouseLeaveHandler = function mouseLeaveHandler() {\n  return siteHeader.classList.remove('active');\n};\n\nif (siteHeader) {\n  navToggle.addEventListener('click', toggleNav); // siteHeader.addEventListener('mouseenter', mouseEnterHandler);\n  // siteHeader.addEventListener('mouseleave', mouseLeaveHandler);\n\n  var menus = siteHeader.querySelectorAll('ul.menu');\n  menus.forEach(function (menu) {\n    var items = menu.querySelectorAll('li.menu-item:not(.lang-item)');\n    items.forEach(function (item) {\n      var a = item.querySelector('a');\n      var href = a.href;\n\n      if (href.indexOf('#') != -1) {\n        var hash = href.substring(href.indexOf('#'));\n        var elem = document.querySelector(hash);\n        a.addEventListener('click', function (e) {\n          e.preventDefault();\n\n          if (document.body.classList.contains('home')) {\n            // if (navToggle.classList.contains('on')) {\n            // \tnavToggle.classList.remove('on');\n            // }\n            if (siteNav.classList.contains('show')) {\n              siteNav.classList.remove('show');\n              siteFooter.classList.toggle('site-nav-open');\n            }\n\n            elem.scrollIntoView({\n              behavior: 'smooth'\n            });\n          } else {\n            window.location = siteURL + hash;\n          }\n        });\n      }\n    });\n  });\n}\n\nif (navClose) {\n  navClose.addEventListener('click', function (e) {\n    e.preventDefault();\n    siteNav.classList.remove('show');\n    siteFooter.classList.remove('site-nav-open');\n  });\n}\n\nvar subToggles = document.querySelectorAll('.submenu-toggle');\nsubToggles.forEach(function (subToggle) {\n  subToggle.addEventListener('click', function (e) {\n    e.preventDefault();\n    var submenu = subToggle.nextElementSibling;\n\n    if (!submenu.classList.contains('open')) {\n      submenu.style.height = 'auto';\n      var height = submenu.scrollHeight;\n      submenu.style.height = 0;\n      submenu.style.transitionProperty = 'height';\n      submenu.style.transitionDuration = '0.25s';\n      submenu.classList.add('open');\n      window.setTimeout(function () {\n        submenu.style.height = height + 'px';\n      }, 25);\n    } else {\n      submenu.style.height = 0;\n      submenu.addEventListener('transitionend', function () {\n        // target.style.display = 'none';\n        // target.style.removeProperty('display');\n        submenu.style.removeProperty('height'); // target.style.removeProperty('overflow');\n\n        submenu.style.removeProperty('transition-property');\n        submenu.style.removeProperty('transition-duration');\n        submenu.classList.remove('open');\n      }, {\n        once: true\n      });\n    }\n  });\n});\ndocument.addEventListener('click', function (e) {\n  if (e.target === siteFooter && siteNav.classList.contains('show')) {\n    siteNav.classList.remove('show');\n    siteFooter.classList.remove('site-nav-open');\n  }\n});\n\n//# sourceURL=webpack:///./src/js/nav.js?");

/***/ }),

/***/ "./src/js/popups.js":
/*!**************************!*\
  !*** ./src/js/popups.js ***!
  \**************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("var popups = document.querySelectorAll('[data-toggle=\"popup\"]');\nvar prev = document.querySelectorAll('a.popup-prev');\nvar next = document.querySelectorAll('a.popup-next'); // Team member popups\n\npopups.forEach(function (popup) {\n  popup.addEventListener('click', function (e) {\n    e.preventDefault();\n    var target = this.dataset.target;\n    var classes = this.dataset.classes;\n    var pop = document.getElementById(target);\n    var container = pop.querySelector('.popup-container');\n    container.scroll(0, 0);\n    document.body.classList.toggle('no-scroll');\n    pop.classList.toggle(classes);\n  });\n}); // Team member popup navigation\n\nfunction getPopup(button) {\n  var target = button.dataset.target;\n  var popup = document.getElementById(target);\n  var container = popup.querySelector('.popup-container');\n  var close = popup.querySelector('.popup-close');\n  return {\n    popup: popup,\n    container: container,\n    close: close\n  };\n} // Team member popup navigation previous button\n\n\nprev.forEach(function (button) {\n  button.addEventListener('click', function (e) {\n    e.preventDefault();\n    var pop = getPopup(button);\n    var prev = pop.popup.parentElement.previousElementSibling.querySelector('a');\n    pop.container.scroll(0, 0);\n    pop.close.click();\n    prev.click();\n  });\n}); // Team member popup navigation next button\n\nnext.forEach(function (button) {\n  button.addEventListener('click', function (e) {\n    e.preventDefault();\n    var pop = getPopup(button);\n    var next = pop.popup.parentElement.nextElementSibling.querySelector('a');\n    pop.container.scroll(0, 0);\n    pop.close.click();\n    next.click();\n  });\n});\n\n//# sourceURL=webpack:///./src/js/popups.js?");

/***/ }),

/***/ 0:
/*!*************************************************************************************************************************!*\
  !*** multi ./src/js/general.js ./src/js/images.js ./src/js/lazy.js ./src/js/main.js ./src/js/nav.js ./src/js/popups.js ***!
  \*************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("__webpack_require__(/*! C:\\xampp\\htdocs\\solid\\wp-content\\themes\\solid\\src\\js\\general.js */\"./src/js/general.js\");\n__webpack_require__(/*! C:\\xampp\\htdocs\\solid\\wp-content\\themes\\solid\\src\\js\\images.js */\"./src/js/images.js\");\n__webpack_require__(/*! C:\\xampp\\htdocs\\solid\\wp-content\\themes\\solid\\src\\js\\lazy.js */\"./src/js/lazy.js\");\n__webpack_require__(/*! C:\\xampp\\htdocs\\solid\\wp-content\\themes\\solid\\src\\js\\main.js */\"./src/js/main.js\");\n__webpack_require__(/*! C:\\xampp\\htdocs\\solid\\wp-content\\themes\\solid\\src\\js\\nav.js */\"./src/js/nav.js\");\nmodule.exports = __webpack_require__(/*! C:\\xampp\\htdocs\\solid\\wp-content\\themes\\solid\\src\\js\\popups.js */\"./src/js/popups.js\");\n\n\n//# sourceURL=webpack:///multi_./src/js/general.js_./src/js/images.js_./src/js/lazy.js_./src/js/main.js_./src/js/nav.js_./src/js/popups.js?");

/***/ })

/******/ });