document.querySelector(".navbar-toggler").onclick=function(){document.querySelector(".animated-icon2").classList.toggle("open"),document.documentMode&&document.getElementById("navbarNav").classList.toggle("show")},document.getElementById("logoutBtn")&&(document.getElementById("logoutBtn").onclick=function(){document.getElementById("logoutForm").submit()});var myNav=document.querySelector(".navbar");window.onscroll=function(){"use strict";document.body.scrollTop>=200||document.documentElement.scrollTop>=200?(myNav.classList.add("bg-color"),myNav.classList.remove("bg-transparent")):(myNav.classList.add("bg-transparent"),myNav.classList.remove("bg-color"))};
