<?php $current = "Sell History"; include 'header.php'; ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/js/jquery-ui-1.8.21/css/smoothness/jquery-ui-1.8.21.custom.css" />
<link href="<?php echo base_url(); ?>public/js/jqGrid-4.3.1/src/css/ui.jqgrid.css" rel="stylesheet"  />

<!--<script src="<?php echo base_url(); ?>public/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/jquery-ui-1.8.2.custom.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/jquery.jqGrid.min.js" type="text/javascript"></script>-->


<script src="<?php echo base_url(); ?>public/js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/jquery-ui-1.8.21/js/jquery-ui-1.8.21.custom.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/jqGrid-4.3.1/js/i18n/grid.locale-en.js" type="text/javascript" language="javascript"></script>
<script src="<?php echo base_url(); ?>public/js/jqGrid-4.3.1/src/grid.base.js" type="text/javascript" language="javascript"></script>


<section id="main" class="column section">

    <div class="form_prp">
        <div class="h_2">Sell History</div>
        <div>
            <div class="flip" title="Click to Open and Apply Filters">Filters</div>
            <div class="panel flt_panel">
                
                <div class="d_fds">
                    <div class="fl m_r_10">
                        <div class="left_fld">
                            <label for="f_sd">Start Date:</label>
                        </div>
                        <div class="right_fld">
                            <input type="text" name="from" id="from" value="" class="ip filterDatePicker">
                        </div>
                        <div class="cb"></div>
                    </div>
                    <div class="fl">
                        <div class="left_fld">
                            <label for="f_ed">End Date:</label>
                        </div>
                        <div class="right_fld">
                            <input type="text" name="to" id="to" value="" class="ip filterDatePicker">
                        </div>
                        <div class="cb"></div>
                    </div>
                    <a class="nblu_btn japply_filter">
                        <span class="inner-btn">
                            <span class="label">Apply Filter</span>
                        </span>
                    </a>
                    <div class="cb"></div>
                </div>

            </div>
        </div>
        <div>
            <table id="datagrid"></table>
        </div>
        <div id="datagrid_pager"></div>
        <table id="datagrid"></table>
        <div id="navGrid"></div>
        <script language="javascript" type="text/javascript">
//            $("#datagrid").jqGrid({
//                url:'',
//                datatype: "local",
//                colNames:['Transaction Number','Date', 'Status'],
//                colModel:[
//                    {name:'id',index:'id', width:75},
//                    {name:'invdate',index:'invdate', width:90},
//                    {name:'name',index:'name', width:100, align:"center", sortable:false},
//                ],
//                rowNum: 10,
//                autowidth: true,
//                rowList:[10,20,30],
//                pager: '#navGrid',
//                sortname: 'id',
//                sortorder: "desc",
//                altRows: true,
//                height: 366,
//                viewrecords: true
//            });
            
            jQuery("#datagrid").jqGrid431({
                    url:'<?php echo site_url('staff/selloffers');  ?>',
                    datatype: "json",
                    mtype:'POST',
                    height: $('#sidebar').height(),
                    width: $('#main .form_prp').width()-5,
                    colNames:['Transaction Number', 'Payment Method', 'e Currency Type','Total Number','Status','More','Messages'],
                    colModel:[
                            {name:'mask_id',index:'mask_id'},
                            {name:'payment_method',index:'payment_method'},
                            {name:'ecurrency',index:'ecurrency'},
                            {name:'total',index:'total'},
                            {name:'order_status',index:'order_status'},
                            {name:'more',index:'more',sortable:false},
                            {name:'more',index:'more',sortable:false}
                    ],
                    rowNum:10,
                    //rowList:[10,20,30],
                    pager: '#datagrid_pager',
                    sortname: 'id',
                    viewrecords: true,
                    sortorder: "desc",
                    multiselect: false,
                    childGrid: true,
                    childGridIndex: "rows",
                    loadtext:'<img src="<?php echo base_url();  ?>public/images/36.gif"/>'
            });
            
            var mydata = [
                {id:"EDS-B-416",invdate:"Sep 14 2012 12:53:12 PM",name:"Not Confirmed"},
                {id:"EDS-B-416",invdate:"Sep 14 2012 12:53:12 PM",name:"Not Confirmed"},
                {id:"EDS-B-416",invdate:"Sep 14 2012 12:53:12 PM",name:"Not Confirmed"},
                {id:"EDS-B-416",invdate:"Sep 14 2012 12:53:12 PM",name:"Not Confirmed"},
                {id:"EDS-B-416",invdate:"Sep 14 2012 12:53:12 PM",name:"Not Confirmed"},
                {id:"EDS-B-416",invdate:"Sep 14 2012 12:53:12 PM",name:"Not Confirmed"},
                {id:"EDS-B-416",invdate:"Sep 14 2012 12:53:12 PM",name:"Not Confirmed"},
                {id:"EDS-B-416",invdate:"Sep 14 2012 12:53:12 PM",name:"Not Confirmed"},
                {id:"EDS-B-416",invdate:"Sep 14 2012 12:53:12 PM",name:"Not Confirmed"},
                {id:"EDS-B-416",invdate:"Sep 14 2012 12:53:12 PM",name:"Not Confirmed"},
                {id:"EDS-B-416",invdate:"Sep 14 2012 12:53:12 PM",name:"Not Confirmed"},
                {id:"EDS-B-416",invdate:"Sep 14 2012 12:53:12 PM",name:"Not Confirmed"},
                {id:"EDS-B-416",invdate:"Sep 14 2012 12:53:12 PM",name:"Not Confirmed"},
                {id:"EDS-B-416",invdate:"Sep 14 2012 12:53:12 PM",name:"Not Confirmed"},
                {id:"EDS-B-416",invdate:"Sep 14 2012 12:53:12 PM",name:"Not Confirmed"},
                {id:"EDS-B-416",invdate:"Sep 14 2012 12:53:12 PM",name:"Not Confirmed"},
                {id:"EDS-B-416",invdate:"Sep 14 2012 12:53:12 PM",name:"Not Confirmed"},
                {id:"EDS-B-416",invdate:"Sep 14 2012 12:53:12 PM",name:"Not Confirmed"},
                {id:"EDS-B-416",invdate:"Sep 14 2012 12:53:12 PM",name:"Not Confirmed"},
			
            ];
            
//            for(var i=0;i<=mydata.length;i++)
//                jQuery("#datagrid").jqGrid('addRowData',i+1,mydata[i]);

            $(".flip").click(function(){
                $(".panel").slideToggle("slow");
                $(this).toggleClass("dwn");
            });
            $( "#f_sd" ).datepicker();
            $( "#f_ed" ).datepicker();

            $(".japply_filter").live('click',function(){
                postData={};
                var filterFieldNames=['mask_id','fname','from','to','orders_flags_id','orders_status_id','payment_methods_id'];
                for(i in filterFieldNames){
                    postData[filterFieldNames[i]]=$('[name="'+filterFieldNames[i]+'"]').val();
                }
                $("#datagrid").setGridParam({
                    postData: postData
                }).trigger("reloadGrid");
            });

            $('.filterDatePicker').datepicker({dateFormat:'yy-mm-dd', changeMonth: true, changeYear: true});
        </script>			
    </div>

</section>

</body>
</html>











