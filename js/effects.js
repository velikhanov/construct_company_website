var myCarousel=document.querySelector("#carouselExampleFade"),carousel=new bootstrap.Carousel(myCarousel,{interval:10000,pause:!1});
//
!function(e){"use strict";function a(e){return new RegExp("(^|\\s+)"+e+"(\\s+|$)")}var t,s,n;function i(e,a){(t(e,a)?n:s)(e,a)}"classList"in document.documentElement?(t=function(e,a){return e.classList.contains(a)},s=function(e,a){e.classList.add(a)},n=function(e,a){e.classList.remove(a)}):(t=function(e,t){return a(t).test(e.className)},s=function(e,a){t(e,a)||(e.className=e.className+" "+a)},n=function(e,t){e.className=e.className.replace(a(t)," ")});var c={hasClass:t,addClass:s,removeClass:n,toggleClass:i,has:t,add:s,remove:n,toggle:i};"function"==typeof define&&define.amd?define(c):e.classie=c}(window);var $=function(e){return document.querySelector(e)},accordion=$(".accordion");accordion.addEventListener("click",function(e){if(e.stopPropagation(),e.preventDefault(),e.target&&"A"==e.target.nodeName){var a=e.target.className.split(" ");if(a)for(var t=0;t<a.length;t++)if("accordionTitle"==a[t]){var s=e.target,n=e.target.parentNode.nextElementSibling;classie.toggle(s,"accordionTitleActive"),classie.has(n,"accordionItemCollapsed")?(classie.has(n,"animateOut")&&classie.remove(n,"animateOut"),classie.add(n,"animateIn")):(classie.remove(n,"animateIn"),classie.add(n,"animateOut")),classie.toggle(n,"accordionItemCollapsed")}}});
//
