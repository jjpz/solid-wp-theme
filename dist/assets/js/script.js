!function(e){var t={};function n(o){if(t[o])return t[o].exports;var i=t[o]={i:o,l:!1,exports:{}};return e[o].call(i.exports,i,i.exports,n),i.l=!0,i.exports}n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var i in e)n.d(o,i,function(t){return e[t]}.bind(null,i));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=3)}([function(e,t,n){"use strict";n.r(t),n.d(t,"checkWindowWidth",(function(){return i})),n.d(t,"checkMobileDevice",(function(){return r})),n.d(t,"siteLoaderFadeOut",(function(){return c})),n.d(t,"removeHomeUrlHash",(function(){return s}));var o=document.body;function i(){return document.documentElement.clientWidth}function r(){window.navigator.userAgent.includes("Mobi")?(o.classList.remove("desktop"),o.classList.add("mobile")):(o.classList.remove("mobile"),o.classList.add("desktop"))}function c(){setTimeout((function(){document.getElementById("loader").classList.add("loaded")}),250),setTimeout((function(){document.getElementById("overlay").classList.add("loaded")}),500),setTimeout((function(){document.getElementById("overlay").style.display="none"}),1500)}function s(){if(document.body.classList.contains("home")&&""!=window.location.hash){var e=window.location.toString();e=e.substring(0,e.indexOf("#")),setTimeout((function(){window.history.replaceState({},document.title,e)}),500)}}var a=function(e,t){return"none"===window.getComputedStyle(e).display?function(e,t){e.style.removeProperty("display");var n=window.getComputedStyle(e).display;"none"===n&&(n="block"),e.style.display=n,e.style.height="auto";var i=e.scrollHeight;e.style.height=0,e.style.overflow="hidden",e.style.transitionProperty="height",e.style.transitionDuration=t+"ms",e.classList.add("open"),window.setTimeout((function(){o.classList.contains("mobile")?e.style.height=i+30+"px":e.style.height=i+"px"}),25)}(e,t):function(e,t){e.style.transitionProperty="height",e.style.transitionDuration=t+"ms",e.style.height=0,e.addEventListener("transitionend",(function(){e.style.display="none",e.style.removeProperty("display"),e.style.removeProperty("height"),e.style.removeProperty("overflow"),e.style.removeProperty("transition-property"),e.style.removeProperty("transition-duration"),e.classList.remove("open")}),{once:!0})}(e,t)};document.querySelectorAll(".toggle-trigger").forEach((function(e){e.addEventListener("click",(function(t){t.preventDefault(),e.classList.toggle("toggled"),a(document.getElementById(this.dataset.toggle),250)}))}))},function(e,t,n){"use strict";n.r(t),n.d(t,"checkSiteHeaderWidth",(function(){return u})),n.d(t,"checkSiteHeader",(function(){return f})),n.d(t,"checkStickyNav",(function(){return m}));var o,i=n(0),r=document.querySelector(".site-header"),c=document.querySelector(".site-nav"),s=document.querySelector(".nav-toggle"),a=document.querySelector(".site-main"),l=document.querySelector(".home-intro-banner"),d=php_vars.site_url;function u(){if(r){var e=parseInt(window.getComputedStyle(r).getPropertyValue("padding-left"))+parseInt(window.getComputedStyle(r).getPropertyValue("padding-right")),t=r.querySelector(".site-branding").offsetWidth,n=0;r.querySelector(".main-nav")&&(n=r.querySelector(".main-nav").offsetWidth);var i=0;return r.querySelector(".button-nav")&&(i=r.querySelector(".button-nav").offsetWidth),o=t+n+i+e}}function f(){r&&(Object(i.checkWindowWidth)()<=o?(r.classList.remove("sticky"),r.classList.add("mobile","fixed"),a.classList.add("mobile"),c.classList.add("mobile"),s.classList.add("show"),l&&l.classList.add("mobile")):(r.classList.remove("mobile","fixed"),a.classList.remove("mobile"),c.classList.remove("mobile"),s.classList.remove("show"),l&&l.classList.remove("mobile")))}function m(){if(r){var e=window.scrollY,t=document.querySelector(".offset-height"),n=t?t.offsetHeight:"";""==n||r.classList.contains("mobile")?(r.classList.add("fixed"),a.classList.add("fixed")):e>=n?r.classList.add("sticky"):r.classList.remove("sticky")}}r&&(s.addEventListener("click",(function(e){e.preventDefault(),s.classList.toggle("on"),c.classList.toggle("show")})),r.addEventListener("mouseenter",(function(){return r.classList.add("active")})),r.addEventListener("mouseleave",(function(){return r.classList.remove("active")})),r.querySelectorAll("ul.menu").forEach((function(e){e.querySelectorAll("li.menu-item:not(.lang-item)").forEach((function(e){var t=e.querySelector("a"),n=t.href;if(-1!=n.indexOf("#")){var o=n.substring(n.indexOf("#")),i=document.querySelector(o);t.addEventListener("click",(function(e){e.preventDefault(),document.body.classList.contains("home")?(s.classList.contains("on")&&s.classList.remove("on"),c.classList.contains("show")&&c.classList.remove("show"),i.scrollIntoView({behavior:"smooth"})):window.location=d+o}))}}))})))},function(e,t,n){"use strict";n.r(t),n.d(t,"checkImages",(function(){return c}));var o=n(0),i=document.querySelectorAll(".image");function r(e,t,n){var o;if(Array.isArray(n)){var i=[];n.forEach((function(e){var t={},n=e.split(" ");n[1]=n[1].slice(0,-1),t.src=n[0],t.width=n[1],i.push(t)})),i.sort((function(e,t){return e.width-t.width}));for(var r=0,c=i.length;r<c;r++){if(i[r].width>=e.offsetWidth){o=i[r].src;break}o=i[c-1].src}}else o=t;return o}function c(){var e=Object(o.checkWindowWidth)();document.body.classList.contains("home")&&i.forEach((function(t){var n=t.getElementsByTagName("img")[0];if(n){var o,i=n.dataset.src,c=n.dataset.mobileSrc,s=n.dataset.srcset;if("svg"!==n.dataset.type&&(s=s.split(", ")),c){var a=n.dataset.mobileSrcset;"svg"!==n.dataset.mobileType&&(a=a.split(", ")),e<769?(o=r(t,c,a),n.alt=n.dataset.mobileAlt):(o=r(t,i,s),n.alt=n.dataset.alt)}else o=r(t,i,s),n.alt=n.dataset.alt;n.classList.contains("lazy")||(n.src=o),n.srcset=o}}))}},function(e,t,n){n(0),n(2),n(4),n(5),n(1),e.exports=n(6)},function(e,t,n){"use strict";n.r(t);var o=n(2);document.addEventListener("DOMContentLoaded",(function(){Object(o.checkImages)();var e=document.querySelectorAll("img.lazy"),t=!1;if("IntersectionObserver"in window){var n=new IntersectionObserver((function(e,t){e.forEach((function(e){if(e.isIntersecting){var n=e.target;n.src=n.srcset,n.classList.remove("lazy"),n.nextElementSibling.classList.remove("on"),t.unobserve(n)}}))}),{rootMargin:"250px 0px"});e.forEach((function(e){n.observe(e)}))}else{var i=function n(){!1===t&&(t=!0,e.forEach((function(t){if(t.getBoundingClientRect().top<=window.innerHeight&&t.getBoundingClientRect().bottom>=0&&"none"!==getComputedStyle(t).display){var o=t.srcset;t.src=o,t.currentSrc=o,t.classList.remove("lazy"),t.nextElementSibling.classList.remove("on"),0===(e=e.filter((function(e){return e!==t}))).length&&(document.removeEventListener("scroll",n),window.removeEventListener("resize",n),window.removeEventListener("orientationchange",n))}})),t=!1)};window.addEventListener("scroll",i),window.addEventListener("resize",i),window.addEventListener("orientationchange",i)}}))},function(e,t,n){"use strict";n.r(t);var o=n(0),i=n(1),r=n(2);window.addEventListener("load",(function(){Object(o.checkMobileDevice)(),Object(o.siteLoaderFadeOut)(),Object(i.checkSiteHeaderWidth)(),Object(i.checkSiteHeader)(),Object(i.checkStickyNav)(),Object(o.removeHomeUrlHash)()})),window.addEventListener("scroll",(function(){Object(i.checkStickyNav)()})),window.addEventListener("resize",(function(){Object(o.checkMobileDevice)(),Object(r.checkImages)(),Object(i.checkSiteHeader)(),Object(i.checkStickyNav)()}))},function(e,t){var n=document.querySelectorAll('[data-toggle="popup"]'),o=document.querySelectorAll("a.team-prev"),i=document.querySelectorAll("a.team-next");function r(e){var t=e.dataset.target,n=document.getElementById(t),o=n.querySelector(".popup-content"),i=n.querySelector(".popup-close");return{popup:n,content:o,close:i}}n.forEach((function(e){e.addEventListener("click",(function(e){e.preventDefault();var t=this.dataset.target,n=this.dataset.classes,o=document.getElementById(t);o.querySelector(".popup-content").scroll(0,0),document.body.classList.toggle("no-scroll"),o.classList.toggle(n)}))})),o.forEach((function(e){e.addEventListener("click",(function(t){t.preventDefault();var n=r(e),o=n.popup.parentElement.previousElementSibling.querySelector("a.member-card");n.content.scroll(0,0),n.close.click(),o.click()}))})),i.forEach((function(e){e.addEventListener("click",(function(t){t.preventDefault();var n=r(e),o=n.popup.parentElement.nextElementSibling.querySelector("a.member-card");n.content.scroll(0,0),n.close.click(),o.click()}))}))}]);