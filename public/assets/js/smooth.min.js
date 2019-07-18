/*
=======================================================
					Smooth.js
=======================================================
*/
!function(a){"use strict";a.fn.smooth=function(b){var c={dataSpeed:2,animationCarv:"ease",animationDuration:0,animationStyle:"all",parallaxContainer:"parallax-container",top:0},d=a.extend({},c,b),e=a(this);0!=d.animationDuration?d.animationStyle+" "+d.animationDuration+"ms "+d.animationCarv:" ";e.find('a[href^="#"]').on("click",function(b){var c=a(this),e=c.attr("href"),f=a(e).offset().top;e.length&&(b.preventDefault(),a("html, body").stop().animate({scrollTop:f-d.top},1e3))})}}(jQuery);