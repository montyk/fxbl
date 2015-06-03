$(function(){
	$.crossBrowser();
});
$.extend({
	crossBrowser: function(){

					/****CROSS PLATFORM****/
			if(navigator.platform.toLowerCase().indexOf("mac")>=0){
				$(".app").addClass("mac");
				$("html").addClass("mac");
			}else if(navigator.platform.toLowerCase().indexOf("win")>=0){
				$(".app").addClass("win");
			}
			
			/****NAVIGATOR****/
			var nav = navigator.userAgent.toLowerCase();
			if(nav.indexOf("msie")>=0){
				$(".app").addClass("ie");
				if($.browser.version<8){
					$(".app").addClass("old");
				}
			}
			if(nav.indexOf("firefox")>=0) $(".app").addClass("ff");
			if(nav.indexOf("safari")>=0){
				$(".app").addClass("wk");
				if(nav.indexOf("chrome")>=0){
					$(".app").addClass("ch");
				}else{
					$(".app").addClass("sf");
				}
			}
			if(nav.indexOf("ipad")>=0) {
				$(".app").addClass("ios");
			}
			if(nav.indexOf("iphone")>=0) $(".app").addClass("sf");
			
	}
});	