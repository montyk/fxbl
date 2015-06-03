<html>
    <head>
        <style>
            label
            {
                display:block;
                width: 80px;
                float:left;
            }
        </style>
        <script type="text/javascript">
            base_url = '<?=base_url();?>';
            site_url='<?=site_url();?>';
            base_img_url = "<?=base_url();?>public/";
            base_spinner = '<?=base_url();?>public/styles/images/spinner.gif';
            gridimgpath = '<?=base_url();?>public/js/themes/basic/images';
        </script>

    </head>
    <body>
        <div class="grid_wrapper">
            <table id="grid_table"></table>
            <div class="pager_wrap">
                <div id="pager_div"></div>
            </div>
        </div>
        
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>public/js/themes/basic/grid.css" title="basic" media="screen" />
        
        <script language="javascript" src="<?=base_url();?>public/js/library.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?=base_url();?>public/js/jquery-ui-1.8.custom.min.js"></script>

        
        <script type="text/javascript" src="<?=base_url();?>public/js/jqgrid_new/src/i18n/grid.locale-en.js"></script>
        <script type="text/javascript" src="<?=base_url();?>public/js/jqgrid_new/js/jquery.jqGrid.js"></script>
        <script type="text/javascript">
            $(function(){
                
                /*
                 * Apllying Grid
                 */
                jQuery('#grid_table').jqGrid({
                    url:site_url+"login/display",
                    recordtext: "Showing {0} - {1} of {2} Record(s)",
                    datatype: "json",
                    mtype: 'POST',
                    height: 800,
                    width: 900,
                    postData:{
                        options:1
                    },
                    colNames:['S.No.','Name','Email','Company','Info','Edit'],
                    colModel:[ 
                        {name:"id",index:"id", width:100,  align:"right"},
                        {name:"name",index:"name", width:100 },
                        {name:"email",index:"email", width:100},
                        {name:"company",index:"company", width:100},
                        {name:"info",index:"info", width:100},
                        {name:"edit",index:"edit", width:100,sortable:false}
                    ],
                    rowNum:10,
                    rowList:[10,20,30,50],
                    pager: jQuery('#pager_div'),
                    imgpath: gridimgpath,
                    sortname: 'id',
                    viewrecords: true,
                    sortorder: "desc",
                    gridComplete: function(){
                        /*
                         * Call Back After Grid Loaded
                         */
                    }
                });
            })
        </script>
        
    </body>
</html>