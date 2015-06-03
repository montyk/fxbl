<html>
<head>
<title>jQGrid example</title>
<!-- Load CSS--><br />
<link rel="stylesheet" href="http://localhost/jqgrid/jqgrid/themes/ui.jqgrid.css" type="text/css" media="all" />
<!-- For this theme, download your own from link above, and place it at css folder -->
<link rel="stylesheet" href="http://localhost/jqgrid/jqgrid/themes/redmond/jquery-ui-1.8.1.custom.css" type="text/css" media="all" />
<!-- Load Javascript -->
<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.8.21/js/jquery-ui-1.8.21.custom.min.js" type="text/javascript"></script>
<script src="js/jqGrid-4.3.1/js/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="js/jqGrid-4.3.1/js/jquery.jqGrid.min.js" type="text/javascript"></script>
</head>

<body>
<table id="list"></table>
<div id="pager2"></div>
<p><script language="javascript">
var mydata = [
		{id:"1",invdate:"2007-10-01",name:"test",note:"note",amount:"200.00",tax:"10.00",total:"210.00"},
		{id:"2",invdate:"2007-10-02",name:"test2",note:"note2",amount:"300.00",tax:"20.00",total:"320.00"},
		{id:"3",invdate:"2007-09-01",name:"test3",note:"note3",amount:"400.00",tax:"30.00",total:"430.00"},
		{id:"4",invdate:"2007-10-04",name:"test",note:"note",amount:"200.00",tax:"10.00",total:"210.00"},
		{id:"5",invdate:"2007-10-05",name:"test2",note:"note2",amount:"300.00",tax:"20.00",total:"320.00"},
		{id:"6",invdate:"2007-09-06",name:"test3",note:"note3",amount:"400.00",tax:"30.00",total:"430.00"},
		{id:"7",invdate:"2007-10-04",name:"test",note:"note",amount:"200.00",tax:"10.00",total:"210.00"},
		{id:"8",invdate:"2007-10-03",name:"test2",note:"note2",amount:"300.00",tax:"20.00",total:"320.00"},
		{id:"9",invdate:"2007-09-01",name:"test3",note:"note3",amount:"400.00",tax:"30.00",total:"430.00"}
		];
		
var gridimgpath = 'css/smoothness/images';
var grid = jQuery('#list');
var searchColumn;
 
grid.jqGrid({
	url:'data.php',
	datatype: 'json',
	mtype: 'POST',
	colNames: ['Name','Data','Date'],
	colModel :[ 
	  {name:'name', index:'name', width:140}, 
	  {name:'data', index:'data', width:200},
	  {name:'date', index:'date', width:200},
	],
	sortname: 'date',
	sortorder: 'asc',
	caption:'Search: <input type="search" id="gridsearch" placeholder="Search" results="0" class="gridsearch" />',
	viewrecords: true,
	loadonce: true,
	width: 750,
	forceFit: true,
	height:130,
	gridComplete: function() {
		searchColumn = grid.jqGrid('getCol','name',true) //needed for live filtering search
	}
  });		
/*		
jQuery("#list2").jqGrid({
   	url:'example.php',
	datatype: "json",
    datastr: mydata,
   	colNames:['Inv No','Date', 'Client', 'Amount','Tax','Total','Notes'],
   	colModel:[
   		{name:'id',index:'id', width:55},
   		{name:'invdate',index:'invdate', width:90},
   		{name:'name',index:'name asc, invdate', width:100},
   		{name:'amount',index:'amount', width:80, align:"right"},
   		{name:'tax',index:'tax', width:80, align:"right"},		
   		{name:'total',index:'total', width:80,align:"right"},		
   		{name:'note',index:'note', width:150, sortable:false}		
   	],
   	rowNum:10,
   	rowList:[10,20,30],
   	pager: '#pager2',
   	sortname: 'id',
    viewrecords: true,
    sortorder: "desc",
    caption:"JSON Example"
});
jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false});
*/
</script>
</body>
</html>