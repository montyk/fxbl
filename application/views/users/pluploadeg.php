<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

<title>Plupload - Custom example</title>

<style type="text/css">
	body {
		font-family:Verdana, Geneva, sans-serif;
		font-size:13px;
		color:#333;
		background:url(bg.jpg);
	}
</style>


<script type="text/javascript" src="<?php echo base_url();?>public/js/plupload/plupload.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plupload/plupload.gears.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plupload/plupload.silverlight.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plupload/plupload.flash.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plupload/plupload.browserplus.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plupload/plupload.html4.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/plupload/plupload.html5.js"></script>

<!-- <script type="text/javascript"  src="http://getfirebug.com/releases/lite/1.2/firebug-lite-compressed.js"></script> -->

</head>
<body>
  
<h1>Custom example</h1>

<p>Shows you how to use the core plupload API.</p>

<div id="container">
    <div id="filelist">No runtime found.</div>
    <br />
    <a id="pickfiles" href="javascript:;">[Select files]</a>
    <a id="uploadfiles" href="javascript:;">[Upload files]</a>
</div>


<script type="text/javascript">
// Custom example logic
function $(id) {
	return document.getElementById(id);
}


var uploader = new plupload.Uploader({
	runtimes : 'gears,html5,flash,silverlight,browserplus',
	browse_button : 'pickfiles',
	container: 'container',
	max_file_size : '10mb',
	url : 'upload.php',
	resize : {width : 320, height : 240, quality : 90},
	flash_swf_url : '<?php echo base_url();?>public/js/plupload/plupload.flash.swf',
	silverlight_xap_url : '<?php echo base_url();?>public/js/plupload/plupload.silverlight.xap',
	filters : [
		{title : "Image files", extensions : "jpg,gif,png"},
		{title : "Zip files", extensions : "zip"}
	]
});

uploader.bind('Init', function(up, params) {
	$('filelist').innerHTML = "<div>Current runtime: " + params.runtime + "</div>";
});

uploader.bind('FilesAdded', function(up, files) {
	for (var i in files) {
		$('filelist').innerHTML += '<div id="' + files[i].id + '">' + files[i].name + ' (' + plupload.formatSize(files[i].size) + ') <b></b></div>';
	}
});

uploader.bind('UploadProgress', function(up, file) {
	$(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
});

$('uploadfiles').onclick = function() {
	uploader.start();
	return false;
};

uploader.init();
</script>
</body>
</html>