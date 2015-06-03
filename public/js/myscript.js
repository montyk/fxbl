	// Returns the version of Windows Internet Explorer or a -1
function getInternetExplorerVersion()
{
    var rv = -1; // Return value assumes failure.
    if (navigator.appName == 'Microsoft Internet Explorer') {
        var ua = navigator.userAgent;
        var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
        if (re.exec(ua) != null)
            rv = parseFloat(RegExp.$1);
    }
    return rv;
}
function ie_check(){
	var ie = [];	
	ie.push("<div class='ie-alert-box-ca-s'>&nbsp;</div><div class='ie-alert-box-ca'><div class='ie-alert-box'><div class='msg'>Older versions of Internet Explorer are not supported.<br/> We suggest using the following browsers...</div><div class='icns'><a href='http://www.google.com/chrome/eula.html' class='icn b-0'>Google Chrome</a><a href='http://www.apple.com/safari/download/' class='icn b-1'>Safari</a><a href='http://www.mozilla.org/en-US/firefox/new/' class='icn b-2'>FireFox</a><a href='http://windows.microsoft.com/en-IN/internet-explorer/products/ie/home' class='icn b-3'>IE7+</a></div></div></div>");
	return ie.join("");
}
$(document).ready(function(){
	 var browserName = navigator.appName;
	 var browserVer = getInternetExplorerVersion();

      if (browserName == 'Microsoft Internet Explorer' &&
         (browserVer == '6')
         ) {

		  	var iedata = ie_check();
			$('body.app').html(iedata);
      }
	  
	  $(".main_menu li").live("click", function(){
			$("this").addClass("active");										 
	  });
});
