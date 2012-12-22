(function(a){a.fn.Accordion=function(b){var c={},l=a(this).children("li"),d=l.children("a"),e=l.children("div");return this.each(function(){b&&a.extend(c,b);d.on("click",function(d){d.preventDefault();d=a(this);var c=d.parent("li").children("div");d.parent("li").hasClass("active")?(c.slideUp(),a(this).parent("li").removeClass("active")):(e.slideUp(),l.removeClass("active"),c.slideDown(),a(this).parent("li").addClass("active"))})})};a(function(){a('[data-role="accordion"]').each(function(){a(this).Accordion()})})})(window.jQuery);(function(a){a.fn.ButtonSet=function(b){var c={},l=a(this).find("button");return this.each(function(){b&&a.extend(c,b);l.on("click",function(d){d.preventDefault();if(a(this).hasClass("active"))return!1;l.removeClass("active");a(this).addClass("active")})})};a(function(){a('[data-role="button-set"]').each(function(){a(this).ButtonSet()})})})(window.jQuery);(function(a){a.Carousel=function(b,c){var l={auto:!0,period:6E3,duration:1E3,effect:"slide",direction:"left",markers:"on",arrows:"on",stop:"on"},d=this;d.settings={};var e=a(b),k,j,f,h,m,p,s,g,n=!1;d.init=function(){d.settings=a.extend({},l,c);k=e.find(".slides:first-child > .slide");if(!(1>=k.length)){j=0;m=e.innerWidth();e.innerHeight();var b;"left"===d.settings.direction?b={left:m}:"right"===d.settings.direction&&(b={left:-m});f=b;var r;"left"===d.settings.direction?r={left:-m}:"right"===d.settings.direction&&
(r={left:m});h=r;k.each(function(d,c){$slide=a(c);"absolute"!==$slide.css("position")&&$slide.css("position","absolute");0!==d&&$slide.hide()});"on"===d.settings.arrows?(e.find("span.control.left").on("click",function(){u("left");t()}),e.find("span.control.right").on("click",function(){u("right");t()})):e.find("span.control").hide();if("on"===d.settings.markers){var v,q;b=a('<div class="markers"></div>');r=a("<ul></ul>").appendTo(b);for(q=0;q<k.length;q++)v=a('<li><a href="javascript:void(0)" data-num="'+
q+'"></a></li>'),0===q&&v.addClass("active"),v.appendTo(r);g=r.find("li");r.find("li a").on("click",function(){var d;d=a(this).data("num");d!==j&&(u(void 0,"switch",d),t())});b.appendTo(e)}!0===d.settings.auto&&(t(),"on"===d.settings.stop&&(e.on("mouseenter",function(){n=!0}),e.on("mouseleave",function(){n=!1;t()})))}};var t=function(){clearInterval(s);s=setInterval(function(){n||u()},d.settings.period)},u=function(c,b,e){var q,n=q=1;b=b||d.settings.effect;if(("slide"===b||"slowdown"===b)&&"undefined"!==
typeof c&&c!==d.settings.direction)n=-1;"left"===c&&(q=-1);c=a(k[j]);q="undefined"!==typeof e?e:j+q;q>=k.length&&(q=0);0>q&&(q=k.length-1);e=a(k[q]);if(!0!==p){"switch"!==b&&(p=!0,setTimeout(function(){p=!1},d.settings.duration));switch(b){case "switch":e.show().css({left:0});c.hide();break;case "slide":b=d.settings.duration;-1!==n?(e.css(f),e.show(),c.animate(h,b)):(e.css(h),e.show(),c.animate(f,b));e.animate({left:0},b);break;case "fade":e.fadeIn(d.settings.duration);c.fadeOut(d.settings.duration);
break;case "slowdown":b={duration:d.settings.duration,easing:"doubleSqrt"},-1!==n?(e.css(f),e.show(),c.animate(h,b)):(e.css(h),e.show(),c.animate(f,b)),e.animate({left:0},b)}j=q;"on"===d.settings.markers&&(g.removeClass("active"),a(g.get(j)).addClass("active"))}};d.init()};a.fn.Carousel=function(b){return this.each(function(){if(void 0==a(this).data("Carousel")){var c=new a.Carousel(this,b);a(this).data("Carousel",c)}})};a.easing.doubleSqrt=function(a){return Math.sqrt(Math.sqrt(a))}})(jQuery);
$(window).ready(function(){$("[data-role=carousel], .carousel").each(function(a,b){var c={};$carousel=$(b);c.auto=$carousel.data("paramAuto");c.period=$carousel.data("paramPeriod");c.duration=$carousel.data("paramDuration");c.effect=$carousel.data("paramEffect");c.direction=$carousel.data("paramDirection");c.markers=$carousel.data("paramMarkers");c.arrows=$carousel.data("paramArrows");c.stop=$carousel.data("paramStop");$carousel.Carousel(c)})});(function(a){a.fn.Dropdown=function(b){var c={},l=a(this),d=function(){a(".dropdown-menu").each(function(){"static"!=a(this).css("position")&&(a(this).slideUp("fast",function(){}),a(this).parent().removeClass("active"))})};return this.each(function(){b&&a.extend(c,b);l.on("click",function(c){c.stopPropagation();d();a(this).parents("ul").css("overflow","visible");c=a(this).children(".dropdown-menu, .sidebar-dropdown-menu");"block"==c.css("display")?(c.slideUp("fast"),a(this).removeClass("active")):
(c.slideDown("fast"),a(this).addClass("active"))}).on("mouseleave",function(){});a("html").on("click",function(){d()})})};a(function(){a('[data-role="dropdown"]').each(function(){a(this).Dropdown()})})})(window.jQuery);(function(a){a.fn.PullDown=function(b){var c={},l=a(this);return this.each(function(){b&&a.extend(c,b);l.on("click",function(a){a.preventDefault();a=l.parent().children("ul");"block"==a.css("display")?a.slideUp("fast"):a.slideDown("fast")})})};a(function(){a(".menu-pull").each(function(){a(this).PullDown()})})})(window.jQuery);(function(a){a.Input=function(b,c){var l={},d=this;d.settings={};var e=a(b);d.init=function(){d.settings=a.extend({},l,c);if(e.hasClass("text")){var b,j;if(b=e.children(".helper").get(0))b=a(b),b.on("click",function(){j=e.children("input");j.attr("value","");j.focus()}).on("click",function(a){a.preventDefault();return!1})}else if(e.hasClass("password")){var f,h;if(b=e.children(".helper").get(0))h=a('<input type="text" />'),f=e.children("input"),b=a(b),b.on("mousedown",function(){f.hide();h.insertAfter(f);
h.attr("value",f.attr("value"))}).on("click",function(a){a.preventDefault();return!1}),b.on("mouseup, mouseout",function(){h.detach();f.show();f.focus()}).on("click",function(a){a.preventDefault();return!1})}};d.init()};a.fn.Input=function(b){return this.each(function(){if(void 0==a(this).data("Input")){var c=new a.Input(this,b);a(this).data("Input",c)}})}})(jQuery);$(function(){$(".input-control").each(function(a,b){$input=$(b);$input.Input({})})});(function(a){a.fn.PageControl=function(b){var c={},l=a(this),d=l.children("ul"),e=d.find("li a");d.find(".active a");var k=l.find(".frames .frame");k.children(".frame.active");return this.each(function(){b&&a.extend(c,b);e.on("click",function(b){b.preventDefault();b=a(this);b.parent("li").hasClass("active")||(k.hide(),d.find("li").removeClass("active"),a(b.attr("href")).show(),a(this).parent("li").addClass("active"));a(this).parent("li").parent("ul").parent(".page-control").find(".menu-pull-bar").is(":visible")&&
a(this).parent("li").parent("ul").slideUp("fast",function(){a(this).css("overflow","").css("display","")})});a(".page-control .menu-pull-bar").text(a(".page-control ul li.active a").text());a(".page-control ul li a").click(function(b){b.preventDefault();a(this).parent("li").parent("ul").parent(".page-control").find(".menu-pull-bar").text(a(this).text())})})};a(function(){a('[data-role="page-control"]').each(function(){a(this).PageControl()});a(window).resize(function(){768<=a(window).width()&&a(".page-control ul").css({display:"block",
overflow:"visible"});768>a(window).width()&&"block"==a(".page-control ul").css("display")&&a(".page-control ul").hide()})})})(window.jQuery);(function(a){a.Rating=function(b,c){var l={stars:5,rating:0,vote:"on"},d=this;d.settings={};var e=a(b),k=[],j,f,h;d.init=function(){d.settings=a.extend({},l,c);h=d.settings.rating;"on"===d.settings.vote?p():m()};d.setRating=function(a){g(a);return a};d.setRatingPercents=function(a){g(a/100*d.settings.stars);return a};d.getRating=function(){return h};d.getRatingPercents=function(){return 100*(h/d.settings.stars)};d.voteOn=function(){d.settings.vote="on";p()};d.voteOff=function(){d.settings.vote="off";
m()};var m=function(){var b;b=d.settings;e.empty();e.addClass("static-rating");b=(e.hasClass("small")?14:27)*b.stars;e.css("width",b);f=a('<div class="rating-value"></div>');f.appendTo(e);g(h)},p=function(){var b=d.settings,c,f;e.empty();e.removeClass("static-rating");for(f=1;f<=b.stars;f++)c=k[f]=a('<a href="javascript:void(0)"></a>'),c.data("starIndex",f),c.appendTo(e);j=e.find("a");j.on("mouseenter",function(){var b=a(this).data("starIndex");s(0,!0);s(b);e.trigger("hovered",[b])});j.on("mouseleave",
function(){s(0);s(h,!0)});j.on("click",function(){var b=a(this).data("starIndex");h=b;e.trigger("rated",[b])});g(h)},s=function(a,b){var c=b?"rated":"hover";a=Math.round(a);j.removeClass(c);j.filter(":lt("+a+")").addClass(c)},g=function(a){var b=d.settings;h=a;"on"===b.vote?s(a,!0):(a=100*(a/b.stars),f.css("width",a+"%"))};d.init()};a.fn.Rating=function(b){return this.each(function(){if(void 0==a(this).data("Rating")){var c=new a.Rating(this,b);a(this).data("Rating",c)}})};a.fn.RatingValue=function(b){var c=
a(this.get(0)).data("Rating");if("undefined"!==typeof c)return"undefined"!==typeof b?c.setRating(b):c.getRating()};a.fn.RatingPercents=function(b){var c=a(this.get(0)).data("Rating");if("undefined"!==typeof c)return"undefined"!==typeof b?c.setRatingPercents(b):c.getRatingPercents()};a.fn.RatingVote=function(b){var c=a(this.get(0)).data("Rating");"undefined"!==typeof c&&(!0===b||"on"===b?c.voteOn():(!1===b||"off"===b)&&c.voteOff())}})(jQuery);
$(function(){$("[data-role=rating], .rating").each(function(a,b){var c={};$rating=$(b);c.stars=$rating.data("paramStars");c.rating=$rating.data("paramRating");c.vote=$rating.data("paramVote");$rating.Rating(c)})});(function(a){a.slider=function(b,c){var l={initValue:0,accuracy:1},d=this;d.settings={};var e=a(b),k,j,f,h,m,p,s,g,n,t=!1;d.init=function(){d.settings=a.extend({},l,c);k=a('<div class="complete"></div>');j=a('<div class="marker"></div>');k.appendTo(e);j.appendTo(e);t=e.hasClass("vertical");r();f=u(d.settings.initValue);w(f);j.on("mousedown",function(b){b.preventDefault();a(document).on("mousemove.sliderMarker",function(a){v(a)});a(document).on("mouseup.sliderMarker",function(){a(document).off("mousemove.sliderMarker");
a(document).off("mouseup.sliderMarker");e.data("value",f);e.trigger("changed",[f])});r()});e.on("click",function(a){r();v(a);e.trigger("changed",[f])})};var u=function(a){var b=d.settings.accuracy;if(0===b)return a;if(100===a)return 100;a=Math.floor(a/b)*b+Math.round(a%b/b)*b;return 100<a?100:a},w=function(a){var b;t?(a=(0===g?0:a/g)+n,b=h-a,j.css("top",b),k.css("height",a)):(a=0===g?0:a/g,j.css("left",a),k.css("width",a))},r=function(){t?(h=e.height(),m=e.offset().top,n=j.height()):(h=e.width(),
m=e.offset().left,n=j.width());g=100/(h-n);p=n/2;s=h-n/2},v=function(a){a=t?a.pageY-m:a.pageX-m;a<p?a=p:a>s&&(a=s);a=u((t?h-a-n/2:a-n/2)*g);w(a);f=a;e.trigger("change",[f])};d.init()};a.fn.slider=function(b){return this.each(function(){if(void 0==a(this).data("slider")){var c=new a.slider(this,b);a(this).data("slider",c)}})}})(jQuery);
$(window).ready(function(){$("[data-role=slider], .slider").each(function(a,b){var c={};$slider=$(b);c.initValue=$slider.data("paramInitValue");c.accuracy=$slider.data("paramAccuracy");$slider.slider(c)})});(function(a){a.TileDrag=function(b,c){var l={group:null},d=this;d.settings={};var e=a(b),k,j,f,h,m,p,s,g,n,t,u,w,r,v=0,q,x;d.init=function(){j=d.settings=a.extend({},l,c);k=j.group?a("[data-role=tile-drag], .tile-drag").filter("[data-param-group="+j.group+"]"):e;k.css({position:"relative"});f=k.children(".tile");f.on("mousedown",z)};var z=function(b){var c,d,e,f;b.preventDefault();h=c=a(this);m=c.parents(".tile-drag");p=c.outerWidth();s=c.outerHeight();g=a("<div></div>");g.css({background:"none"});
g.addClass("tile");c.hasClass("double")?g.addClass("double"):c.hasClass("triple")?g.addClass("triple"):c.hasClass("quadro")?g.addClass("quadro"):c.hasClass("double-vertical")?g.addClass("double-vertical"):c.hasClass("triple-vertical")?g.addClass("triple-vertical"):c.hasClass("quadro-vertical")&&g.addClass("quadro-vertical");d=c.position();e=d.left;d=d.top;f=m.offset();u=f.left;w=f.top;n=b.pageX-u-e;t=b.pageY-w-d;g.insertAfter(c);c.css({position:"absolute",left:e,top:d,"z-index":1E5});c.data("dragging",
!0);y();a(document).on("mousemove.tiledrag",A);a(document).on("mouseup.tiledrag",B);k.trigger("drag",[h,m])},A=function(b){b.preventDefault();h.css({left:b.pageX-u-n,top:b.pageY-w-t});if(b=C(b)){b=a(f[b]);var c;c=g;g=c.clone();"before"===x?g.insertBefore(b):g.insertAfter(b);c.remove();y();b=m.offset();u=b.left;w=b.top}},B=function(b){b.preventDefault();a(document).off("mousemove.tiledrag");a(document).off("mouseup.tiledrag");h.detach();h.insertAfter(g);b=g.parents(".tile-drag");g.remove();h.css({position:"",
left:"",top:"","z-index":""});h.data("dragging",!1);k.trigger("drop",[h,b])},y=function(){r={};f.each(function(b,c){var d,e;d=a(c);d.data("dragging")||(e=d.offset(),r[b]={x1:e.left+n-p/2,y1:e.top+t-s/2,x2:e.left+d.outerWidth()+n-p/2,y2:e.top+d.outerHeight()+t-s/2})})},C=function(b){var c,d,e=!1,g;if(10>v)return v++,!1;v=0;for(c in r){if(!r.hasOwnProperty(c))return;d=r[c];if(d.x1<b.pageX&&b.pageX<d.x2&&d.y1<b.pageY&&b.pageY<d.y2){e=c;break}}e&&(g=b.pageX<d.x1+a(f[e]).outerWidth()/2?"before":"after");
if(g===x&&e===q)return!1;x=g;return q=e};d.getGroups=function(){return k};d.init()};a.fn.TileDrag=function(b){return this.each(function(){if(void 0==a(this).data("TileDrag")){var c=new a.TileDrag(this,b);c.getGroups().data("TileDrag",c)}})}})(jQuery);$(function(){$("[data-role=tile-drag], .tile-drag").each(function(a,b){var c={};$tileGroup=$(b);c.group=$tileGroup.data("paramGroup");$tileGroup.TileDrag(c)})});$.easing.doubleSqrt=function(a){return Math.sqrt(Math.sqrt(a))};
(function(a){a.tileBlockSlider=function(b,c){var l={period:2E3,duration:1E3,direction:"up"},d=this;d.settings={};var e=a(b),k,j,f,h,m,p;d.init=function(){d.settings=a.extend({},l,c);k=e.children(".tile-content");if(!(1>=k.length)){j=0;m=e.innerWidth();p=e.innerHeight();var b;"left"===d.settings.direction?b={left:m,top:0}:"right"===d.settings.direction?b={left:-m,top:0}:"up"===d.settings.direction?b={left:0,top:p}:"down"===d.settings.direction&&(b={left:0,top:-p});f=b;var g;"left"===d.settings.direction?
g={left:-m,top:0}:"right"===d.settings.direction?g={left:m,top:0}:"up"===d.settings.direction?g={left:0,top:-p}:"down"===d.settings.direction&&(g={left:0,top:p});h=g;k.each(function(b,c){c=a(c);"absolute"!==c.css("position")&&c.css("position","absolute");0!==b&&c.css("left",m)});setInterval(function(){var b,c,e;b=a(k[j]);j++;j>=k.length&&(j=0);c=a(k[j]);c.css(f);e={duration:d.settings.duration,easing:"doubleSqrt"};b.animate(h,e);c.animate({left:0,top:0},e)},d.settings.period)}};d.getParams=function(){};
d.init()};a.fn.tileBlockSlider=function(b){return this.each(function(){if(void 0==a(this).data("tileBlockSlider")){var c=new a.tileBlockSlider(this,b);a(this).data("tileBlockSlider",c)}})}})(jQuery);$(window).ready(function(){$("[data-role=tile-slider], .block-slider, .tile-slider").each(function(a,b){var c={};b=$(b);c.direction=b.data("paramDirection");c.duration=b.data("paramDuration");c.period=b.data("paramPeriod");b.tileBlockSlider(c)})});