"use strict";var siteHeader,siteNav,navToggle,html=document.documentElement,body=document.body;void 0!==document.querySelector(".site-header")&&null!==document.querySelector(".site-header")&&(siteHeader=document.querySelector(".site-header"),siteNav=siteHeader.querySelector(".site-nav"),navToggle=siteHeader.querySelector(".nav-toggle"));var windowWidth,siteHeaderWidth,siteMain=document.querySelector(".site-main"),siteFooter=document.querySelector(".site-footer"),images=document.querySelectorAll(".image"),popups=document.querySelectorAll('[data-toggle="popup"]'),prev=document.querySelectorAll("a.team-prev"),next=document.querySelectorAll("a.team-next"),mobileBreakpoint=769;function checkWindowWidth(){return windowWidth=html.clientWidth}function checkMobile(){window.navigator.userAgent.includes("Mobi")?(body.classList.remove("desktop"),body.classList.add("mobile")):(body.classList.remove("mobile"),body.classList.add("desktop"))}function loading(){setTimeout(function(){document.getElementById("loader").classList.add("loaded")},250),setTimeout(function(){document.getElementById("overlay").classList.add("loaded")},500),setTimeout(function(){document.getElementById("overlay").style.display="none"},1500)}var checkSiteHeaderWidth,checkSiteHeader,checkStickyNav,mouseEnterHandler,mouseLeaveHandler,uls,slideUp=function(e,t){e.style.transitionProperty="height",e.style.transitionDuration=t+"ms",e.style.height=0,e.addEventListener("transitionend",function(){e.style.display="none",e.style.removeProperty("display"),e.style.removeProperty("height"),e.style.removeProperty("overflow"),e.style.removeProperty("transition-property"),e.style.removeProperty("transition-duration"),e.classList.remove("open")},{once:!0})},slideDown=function(e,t){e.style.removeProperty("display");var i=window.getComputedStyle(e).display;"none"===i&&(i="block"),e.style.display=i,e.style.height="auto";var n=e.scrollHeight;e.style.height=0,e.style.overflow="hidden",e.style.transitionProperty="height",e.style.transitionDuration=t+"ms",e.classList.add("open"),window.setTimeout(function(){e.style.height=n+"px"},25)},slideToggle=function(e,t){return("none"===window.getComputedStyle(e).display?slideDown:slideUp)(e,t)};function intersectionObserver(){checkImages();var t,e,n=document.querySelectorAll("img.lazy"),o=!1;"IntersectionObserver"in window?(t=new IntersectionObserver(function(e,n){e.forEach(function(e){var t,i;e.isIntersecting&&((i=(t=e.target).srcset)&&(t.src=i),t.classList.remove("lazy"),""!=t.src&&t.nextElementSibling.classList.remove("on"),n.unobserve(t))})},{rootMargin:"250px 0px"}),n.forEach(function(e){t.observe(e)})):(e=function i(){!1===o&&(o=!0,n.forEach(function(t){var e;t.getBoundingClientRect().top<=window.innerHeight&&0<=t.getBoundingClientRect().bottom&&"none"!==getComputedStyle(t).display&&(e=t.dataset.srcset,t.src=e,t.srcset=e,t.currentSrc=e,t.classList.remove("lazy"),""!=t.srcset&&t.nextElementSibling.classList.remove("on"),0===(n=n.filter(function(e){return e!==t})).length&&(document.removeEventListener("scroll",i),window.removeEventListener("resize",i),window.removeEventListener("orientationchange",i)))}),o=!1)},window.addEventListener("scroll",e),window.addEventListener("resize",e),window.addEventListener("orientationchange",e))}function checkImages(){checkWindowWidth(),body.classList.contains("home")&&images.forEach(function(e){var t=e.getElementsByTagName("img")[0];if(t){var i=t.dataset.mobile,n=t.dataset.desktop,o=t.dataset.srcset,s=[],r=[],a=[];if(!i&&!n&&!o)return;i||n||!o?(s=i.split(", "),r=n.split(", ")):a=o.split(", ");var c,l=[],d=[],u=t.dataset.mobileAlt,m=t.dataset.mobileTitle,v=t.dataset.desktopAlt,g=t.dataset.desktopTitle;0<s.length&&0<r.length?windowWidth<mobileBreakpoint?(l=s,t.title=m,t.alt=u):(l=r,t.title=g,t.alt=v):""!=s?l=s:""!=r?l=r:""!=a&&(l=a),l.forEach(function(e){var t={},i=e.split(" ");i[1]=i[1].slice(0,-1),t.width=i[1],t.src=i[0],d.push(t)}),d.sort(function(e,t){return e.width-t.width});for(var y=0,h=d.length;y<h;y++){if(d[y].width>=e.offsetWidth){c=d[y].src;break}c=d[h-1].src}t.classList.contains("lazy")?t.srcset=c:(t.srcset=c,t.src=c)}})}function getPopup(e){var t=e.dataset.target,i=document.getElementById(t),n=i.querySelector(".popup-content"),o=i.querySelector(".popup-close");return{popup:i,content:n,close:o}}document.querySelectorAll(".toggle-trigger").forEach(function(t){t.addEventListener("click",function(e){e.preventDefault(),t.classList.toggle("toggled"),slideToggle(document.getElementById(this.dataset.toggle),250)})}),document.addEventListener("DOMContentLoaded",intersectionObserver),siteHeader&&(checkSiteHeaderWidth=function(){var e,t,i=parseInt(window.getComputedStyle(siteHeader).getPropertyValue("padding-left"))+parseInt(window.getComputedStyle(siteHeader).getPropertyValue("padding-right")),n=siteHeader.querySelector(".site-branding").offsetWidth;return siteHeader.querySelector(".main-nav")&&(e=siteHeader.querySelector(".main-nav").offsetWidth),siteHeader.querySelector(".button-nav")&&(t=siteHeader.querySelector(".button-nav").offsetWidth),siteHeaderWidth=n+e+t+i},checkSiteHeader=function(){windowWidth<=siteHeaderWidth?(siteHeader.classList.remove("sticky"),siteHeader.classList.add("mobile","fixed"),siteMain.classList.add("mobile"),siteNav.classList.add("mobile"),navToggle.classList.add("show")):(siteHeader.classList.remove("mobile","fixed"),siteMain.classList.remove("mobile"),siteNav.classList.remove("mobile"),navToggle.classList.remove("show"))},checkStickyNav=function(){var e=window.scrollY,t=document.querySelector(".offset-height"),i=t?t.offsetHeight:"";""==i||siteHeader.classList.contains("mobile")?(siteHeader.classList.add("fixed"),siteMain.classList.add("fixed")):i<=e?siteHeader.classList.add("sticky"):siteHeader.classList.remove("sticky")},mouseEnterHandler=function(){siteHeader.classList.add("active")},mouseLeaveHandler=function(){siteHeader.classList.remove("active")},navToggle.addEventListener("click",function(e){e.preventDefault(),navToggle.classList.toggle("on"),siteNav.classList.toggle("show")}),siteHeader.addEventListener("mouseenter",mouseEnterHandler),siteHeader.addEventListener("mouseleave",mouseLeaveHandler),(uls=siteHeader.querySelectorAll("ul.menu")).forEach(function(e){e.querySelectorAll("li.menu-item:not(.lang-item)").forEach(function(e){var t,i,n=e.querySelector("a"),o=n.href;-1!=o.indexOf("#")&&(t=o.substring(o.indexOf("#")),i=document.querySelector(t),n.addEventListener("click",function(e){e.preventDefault(),i.scrollIntoView({behavior:"smooth"})}))})})),popups.forEach(function(e){e.addEventListener("click",function(e){e.preventDefault();var t=this.dataset.target,i=this.dataset.classes,n=document.getElementById(t);n.querySelector(".popup-content").scroll(0,0),document.body.classList.toggle("no-scroll"),n.classList.toggle(i)})}),prev.forEach(function(n){n.addEventListener("click",function(e){e.preventDefault();var t=getPopup(n),i=t.popup.parentElement.previousElementSibling.querySelector("a.member-card");t.content.scroll(0,0),t.close.click(),i.click()})}),next.forEach(function(n){n.addEventListener("click",function(e){e.preventDefault();var t=getPopup(n),i=t.popup.parentElement.nextElementSibling.querySelector("a.member-card");t.content.scroll(0,0),t.close.click(),i.click()})}),window.addEventListener("load",function(){checkMobile(),loading(),siteHeader&&(checkSiteHeaderWidth(),checkSiteHeader(),checkStickyNav())}),window.addEventListener("scroll",function(){siteHeader&&checkStickyNav()}),window.addEventListener("resize",function(){checkMobile(),checkImages(),siteHeader&&(checkSiteHeader(),checkStickyNav())});