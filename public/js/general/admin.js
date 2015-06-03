$(function(){
    $('#j_admin_menu li a').live('click',function(){
        if($(this).attr('rel'))
        document.cookie='active_tab='+$(this).attr('rel');
        if($('#admin_content_wrap').length==0){
            $('.ovrclr.tablenew_contentele div.fl:eq(1)').html('<div id="admin_content_wrap"></div>');
        }
        $('#j_admin_menu li a').removeClass('selected');
        $(this).addClass('selected');
        $('.all_headings').text($(this).text())
        switch($(this).attr('rel')){
            case 'user_management':
                load_users_grid();
            break;
            case 'e_currency':
                load_e_currency_grid();
            break;
            case 'payment_methods':
                load_payment_methods_grid();
            break;
            case 'liberty_accounts':
                load_liberty_accounts_grid();
            break;
            case 'buy_lr':
                load_buy_lr_grid();
            break;
            case 'sell_lr':
                load_sell_lr_grid();
            break;
            default:
                return true;
        }
        $('#search').val('');
    });

    if(getCookie('active_tab') && loadGrid){
        $('#j_admin_menu li a[rel='+getCookie('active_tab')+']').trigger('click');
    }else if(loadGrid){
        $('#j_admin_menu li a[rel="user_management"]').addClass('selected');
        load_users_grid();
    }

    $('#search_grid').live('click',function(){
        jQuery("#grid_table").setGridParam({
            postData:{
                'search_term':$('#search').val()
            }
        }).trigger('reloadGrid');
    });

    if($.trim($('#search').val())!=''){
//        $('#search_grid').trigger('click');
    }

    setTimeout(function(){
       $('.info_box,.error_box').fadeTo(1500, .1,function(){
        $('.info_box,.error_box').slideUp('slow');
       });
    },5000);
    
    $('#lrBuyGridFilterTab .tab, #lrSellGridFilterTab .tab').live('click',function(){
        $('.tab').removeClass('active');
        $(this).addClass('active');
        lrStatus=$(this).find('a').attr('rel');
        jQuery("#grid_table").setGridParam({
            postData:{
                'lr_status':lrStatus
            }
        }).trigger('reloadGrid');
    });
    
    $('#userGridFilter input').live('keyup',function(){
        gridFilterPost={};
        $.each($('#userGridFilter input'),function(k,v){
            gridFilterPost['filter['+$(v).attr('name')+']']=$(v).val()
        });
        jQuery("#grid_table").setGridParam({
            postData:gridFilterPost
        }).trigger('reloadGrid');
    });
    
    $('#buyGridFilter input').live('keyup',function(){
        gridFilterPost={};
        $.each($('#buyGridFilter input,  #buyGridFilter select'),function(k,v){
            gridFilterPost['filter['+$(v).attr('name')+']']=$(v).val()
        });
        jQuery("#grid_table").setGridParam({
            postData:gridFilterPost
        }).trigger('reloadGrid');
    });
    
    $('#buyGridFilter select').live('change',function(){
        $('#buyGridFilter input:first').trigger('keyup');
    });
    
    $('#sellGridFilter input').live('keyup',function(){
        gridFilterPost={};
        $.each($('#sellGridFilter input,  #sellGridFilter select'),function(k,v){
            gridFilterPost['filter['+$(v).attr('name')+']']=$(v).val()
        });
        jQuery("#grid_table").setGridParam({
            postData:gridFilterPost
        }).trigger('reloadGrid');
    });
    
    $('#sellGridFilter select').live('change',function(){
        $('#sellGridFilter input:first').trigger('keyup');
    });
    
});


/********************************** DOCUMENT READY END ****************************************/
function load_e_currency_grid(){

    $('#admin_content_wrap').html('<div style="clear:both;"></div>\
                                     <div class="pad8">\
                                        <span class="fr"> <a href="'+base_url+'admin/edit_ecurrency/0"><input type="button" value="Add eCurrency"/></a> </span>\
                                        <div style="clear:both;"></div>\
                                    </div>\
                                    <div class="jqgrid_wrap">\
                                        <table id="grid_table"></table>\
                                        <div id="grid_pager"></div>\
                                    </div>\
                                    <div style="clear:both;"></div>\
                                ');

    jQuery("#grid_table").jqGrid({
            url:site_url+'/admin/e_currency',
            datatype: "json",
            width:920,
            height:'auto',
            mtype: 'POST',
            recordtext: "Viewing {0} - {1} of {2} eCurrencys",
            pgtext : "Page {0} of {1}",
            colNames:['eCurrency Name','Logo', 'Currency mode','Edit'],
            colModel:[
                    {name:'name',index:'name', width:150},
                    {name:'link',index:'link', width:150, sortable:false},
                    {name:'mode',index:'mode', width:150},
                    {name:'edit_link',index:'edit_link', width:150, sortable:false}
            ],
            rowNum:10,
            //rowList:[10,20],
            pager: '#grid_pager',
            sortname: 'name',
            viewrecords: false,
            sortorder: "desc",
            caption:"eCurrencys",
            loadtext:'Loading..'
    });
}


function load_users_grid(){

    $('#admin_content_wrap').html('<div style="clear:both;"></div>\
                                    <form id="userGridFilter">\
                                    <div id="lrUserGridFilterTab" class="jqgrid_wrap filter_wrapper border bshadow brad8">\
                                        <h1><a href="javascript:void(0);" style="float: left;padding: 9px;">Filter: </a></h1><div style="clear:both;"></div>\
                                        <div class="filter_fields fl">\
                                            <div class=""><input style="width:145px;" type="text" name="user_name" placeholder="Username" value=""/></div>\
                                        </div>\
                                        <div class="filter_fields fl">\
                                            <div class=""><input style="width:145px;" type="text" name="user_email" placeholder="Email" value=""/></div>\
                                        </div>\
                                        <div class="filter_fields fl">\
                                            <div class=""><input style="width:145px;" type="text" name="user_phone" placeholder="Phone" value=""/></div>\
                                        </div>\
                                        <div class="filter_fields fl">\
                                            <div class=""><input style="width:145px;" type="text" name="user_address" placeholder="Addr" value=""/></div>\
                                        </div>\
                                        <div class="filter_fields fl">\
                                            <div class=""><input style="width:97px;" type="text" name="country_name" placeholder="Country" value=""/></div>\
                                        </div>\
                                        <div class="filter_fields fl">\
                                            <div class=""><input style="width:100px;" type="text" name="user_state" placeholder="State" value=""/></div>\
                                        </div>\
                                        <div style="clear:both;"></div>\
                                    </div></form>\
                                    <div class="jqgrid_wrap">\
                                        <table id="grid_table"></table>\
                                        <div id="grid_pager"></div>\
                                    </div>\
                                    <div style="clear:both;"></div>\
                                ');

    jQuery("#grid_table").jqGrid({
            url:site_url+'/admin/users_list',
            datatype: "json",
            width:920,
            height:'auto',
            mtype: 'POST',
            recordtext: "Viewing {0} - {1} of {2} Users",
            pgtext : "Page {0} of {1}",
            colNames:['UserName','Email', 'Phone','Addr','Country','State','Edit'],
            colModel:[
                    {name:'user_name',index:'user_name', width:150},
                    {name:'user_email',index:'user_email', width:150},
                    {name:'user_phone',index:'user_phone', width:150},
                    {name:'user_address',index:'user_address', width:150},
                    {name:'user_country',index:'user_country', width:100},
                    {name:'user_state',index:'user_state', width:100},
                    {name:'edit_link',index:'edit_link', width:150, sortable:false}
            ],
            rowNum:50,
            rowList:[50,100,150,300,500],
            pager: '#grid_pager',
            sortname: 'user_name',
            viewrecords: true,
            sortorder: "desc",
            caption:"Users",
            loadtext:'Loading..'
    });
}



function load_payment_methods_grid(){

    $('#admin_content_wrap').html('<div style="clear:both;"></div>\
                                     <div class="pad8">\
                                        <span class="fr"> <a href="'+base_url+'admin/edit_payment_methods/0"><input type="button" value="Add Payment Method"/></a> </span>\
                                        <div style="clear:both;"></div>\
                                    </div>\
                                    <div class="jqgrid_wrap">\
                                        <table id="grid_table"></table>\
                                        <div id="grid_pager"></div>\
                                    </div>\
                                    <div style="clear:both;"></div>\
                                ');

    jQuery("#grid_table").jqGrid({
            url:site_url+'/admin/payment_methods',
            datatype: "json",
            width:920,
            height:'auto',
            mtype: 'POST',
            recordtext: "Viewing {0} - {1} of {2} Payment Methods",
            pgtext : "Page {0} of {1}",
            colNames:['Bank Name','Bank Logo', 'Account Name','Edit'],
            colModel:[
                    {name:'bank_name',index:'bank_name', width:150},
                    {name:'link',index:'link', width:150, sortable:false},
                    {name:'account_name',index:'account_name', width:150},
                    {name:'edit_link',index:'edit_link', width:150, sortable:false}
            ],
            rowNum:10,
            //rowList:[10,20],
            pager: '#grid_pager',
            sortname: 'bank_name',
            viewrecords: false,
            sortorder: "desc",
            caption:"Payment Methods",
            loadtext:'Loading..'
    });
}


function load_liberty_accounts_grid(){

    $('#admin_content_wrap').html('<div style="clear:both;"></div>\
                                     <div class="pad8">\
                                        <span class="fr"> <a href="'+base_url+'admin/edit_liberty_accounts/0"><input type="button" value="Add Liberty Account"/></a> </span>\
                                        <div style="clear:both;"></div>\
                                    </div>\
                                    <div class="jqgrid_wrap">\
                                        <table id="grid_table"></table>\
                                        <div id="grid_pager"></div>\
                                    </div>\
                                    <div style="clear:both;"></div>\
                                ');

    jQuery("#grid_table").jqGrid({
            url:site_url+'/admin/liberty_accounts',
            datatype: "json",
            width:920,
            height:'auto',
            mtype: 'POST',
            recordtext: "Viewing {0} - {1} of {2} Liberty Accounts",
            pgtext : "Page {0} of {1}",
            colNames:['Liberty Account Name','Account Number','Edit'],
            colModel:[
                    {name:'account_name',index:'account_name', width:200},
                    {name:'account_number',index:'account_number', width:200},
                    {name:'edit_link',index:'edit_link', width:100, sortable:false}
            ],
            rowNum:10,
            //rowList:[10,20],
            pager: '#grid_pager',
            sortname: 'account_name',
            viewrecords: false,
            sortorder: "desc",
            caption:"Liberty Accounts",
            loadtext:'Loading..'
    });
}


function load_buy_lr_grid(){
    
    $('#admin_content_wrap').html('<div style="clear:both;"></div>\
                                     <div id="lrBuyGridFilterTab" class="jqgrid_wrap filter_wrapper border bshadow brad8">\
                                        <h1><a href="javascript:void(0);" style="float: left;padding: 9px;">Status: </a></h1>\
                                        <div class="filter_tabs">\
                                            <div class="tab active"><a href="javascript:void(0);" rel="" class="">All</a></div>\
                                        </div>\
                                       <div style="clear:both;"></div>\
                                    </div>\
                                    <div class="jqgrid_wrap">\
                                        <table id="grid_table"></table>\
                                        <div id="grid_pager"></div>\
                                    </div>\
                                    <div style="clear:both;"></div>\
                                ');

    jQuery("#grid_table").jqGrid({
            url:site_url+'/admin/buy_lr',
            datatype: "json",
            width:920,
            height:'auto',
            mtype: 'POST',
            viewrecords :true,
            recordtext: "Viewing {0} - {1} of {2} Buy Lr Transactions",
            pgtext : "Page {0} of {1}",
            colNames:['Flag','Transaction Number','User Name','Payment Method','LR Number','Elapsed Time','Date','Total amount','Status','More'],
            colModel:[
                    {name:'flag_id',index:'flag_id', width:150,title:false},
                    {name:'buy_mask_id',index:'buy_mask_id', width:200},
                    {name:'user_name',index:'user_name', width:200},
                    {name:'bank_name',index:'bank_name', width:200},
                    {name:'buy_lr_account',index:'buy_lr_account', width:200},
                    {name:'elapsed_time',index:'elapsed_time', width:100},
                    {name:'buy_date_added',index:'buy_date_added', width:200},
                    {name:'buy_total',index:'buy_total', width:200},
                    {name:'status_id',index:'status_id', width:280, title:false},
                    {name:'more_link',index:'more_link', width:100, sortable:false}
            ],
            rowNum:50,
            rowList:[50,100,150,300,500],
            pager: '#grid_pager',
            sortname: 'buy_date_added',
            sortorder: "desc",
            caption:"Buy Lr Transactions",
            loadtext:'Loading..',
            loadComplete:function(dataR){
                // console.log(dataR);
                if(!$('#lrBuyGridFilterTab').hasClass('loaded')){
                    statusTabs='<h1><a href="javascript:void(0);" style="float: left;padding: 9px;">Status: </a></h1>\
                                <div class="filter_tabs">\
                                    <div class="tab active"><a href="javascript:void(0);" rel="" class="">All</a></div>\
                                </div>';
                    $.each(dataR.lr_status,function(k,v){
                        statusTabs+='<div class="filter_tabs">\
                                        <div class="tab"><a href="javascript:void(0);" rel="'+v.status_id+'" class="">'+v.status_name+'</a></div>\
                                    </div>';
                    });
                    statusTabs+='<div style="clear:both;"></div>';
                    {
                        filterFlagOptions='<option value="0" title="">Select</option>';
                        $.each(dataR.lr_flags,function(key,value){
                            filterFlagOptions+='<option value="'+value.id+'" title="'+base_url+'public/css/images/flags/'+value.id+'.png">'+(value.name)+'</option>';
                        });
                        filterFlag='<div style="">\
                                        <select class="flag_select imgDrop" name="flag_id" style="width:80px;" onchange="">\
                                            '+filterFlagOptions+'\
                                        </select>\
                                    </div>';
                    }
                    statusTabs+='<form id="buyGridFilter">\
                                    <!--<h1><a href="javascript:void(0);" style="float: left;padding: 9px;">Filter: </a></h1>--><div style="clear:both;"></div>\
                                    <div class=" fl">\
                                        <div class="">'+filterFlag+'</div>\
                                    </div>\
                                    <div class="filter_fields fl">\
                                        <div class=""><input style="width:97px;" type="text" name="buy_mask_id" placeholder="Transaction Number" value=""/></div>\
                                    </div>\
                                    <div class="filter_fields fl">\
                                        <div class=""><input style="width:100px;" type="text" name="user_name" placeholder="User Name" value=""/></div>\
                                    </div>\
                                    <div class="filter_fields fl">\
                                        <div class=""><input style="width:100px;" type="text" name="bank_name" placeholder="Payment Method" value=""/></div>\
                                    </div>\
                                    <div class="filter_fields fl">\
                                        <div class=""><input style="width:100px;" type="text" name="buy_lr_account" placeholder="LR Number" value=""/></div>\
                                    </div>\
                                    <div class="filter_fields fl">\
                                        <div class=""><input style="width:50px;" type="text" name="elapsed_time" placeholder="Elapsed Time" value=""/></div>\
                                    </div>\
                                    <div class="filter_fields fl">\
                                        <div class=""><input style="width:105px;" type="text" class="apply_datepicker" name="buy_date_added" placeholder="Date" value=""/></div>\
                                    </div>\
                                    <div class="filter_fields fl">\
                                        <div class=""><input style="width:97px;" type="text" name="buy_total" placeholder="Total amount" value=""/></div>\
                                    </div>\
                                    <div class="filter_fields fl">\
                                        <div class="">'+dataR.buy_sell_status_select+'</div>\
                                    </div>\
                                    <div style="clear:both;"></div>\
                                  </form>\
                                    ';
                    $('#lrBuyGridFilterTab').html(statusTabs).addClass('loaded');
                    $('#buyGridFilter .imgDrop').msDropDown();
                    $('.apply_datepicker').datepicker({dateFormat:'yy-mm-dd', changeMonth: true, changeYear: true,onSelect: function(dateText, inst) { $(this).trigger('keyup').blur(); }});
                }
                $('.jqgrid_wrap .imgDrop').msDropDown();
            }
    });
}


function load_sell_lr_grid(){

    $('#admin_content_wrap').html('<div style="clear:both;"></div>\
                                    <div id="lrSellGridFilterTab" class="jqgrid_wrap filter_wrapper border bshadow brad8">\
                                        <h1><a href="javascript:void(0);" style="float: left;padding: 9px;">Status: </a></h1>\
                                        <div class="filter_tabs">\
                                            <div class="tab active"><a href="javascript:void(0);" rel="" class="">All</a></div>\
                                        </div>\
                                       <div style="clear:both;"></div>\
                                    </div>\
                                    <div class="jqgrid_wrap">\
                                        <table id="grid_table"></table>\
                                        <div id="grid_pager"></div>\
                                    </div>\
                                    <div style="clear:both;"></div>\
                                ');

    jQuery("#grid_table").jqGrid({
            url:site_url+'/admin/sell_lr',
            datatype: "json",
            width:920,
            height:'auto',
            mtype: 'POST',
            viewrecords :true,
            recordtext: "Viewing {0} - {1} of {2} Sell Lr Transactions",
            pgtext : "Page {0} of {1}",
            colNames:['Flag','Transaction Number','User Name','Payment Method','LR Number','Elapsed Time','Date','Total amount','Status','More'],
            colModel:[
                    {name:'flag_id',index:'flag_id', width:150,title:false},
                    {name:'sell_mask_id',index:'sell_mask_id', width:200},
                    {name:'user_name',index:'user_name', width:200},
                    {name:'bank_name',index:'bank_name', width:200},
                    {name:'sell_lr_account',index:'sell_lr_account', width:200},
                    {name:'elapsed_time',index:'elapsed_time', width:100},
                    {name:'sell_date_added',index:'sell_date_added', width:200},
                    {name:'sell_total',index:'sell_total', width:200},
                    {name:'status_id',index:'status_id', width:280, title:false},
                    {name:'more_link',index:'more_link', width:100, sortable:false}
            ],
            rowNum:50,
            rowList:[50,100,150,300,500],
            pager: '#grid_pager',
            sortname: 'sell_date_added',
            sortorder: "desc",
            caption:"Sell Lr Transactions",
            loadtext:'Loading..',
            loadComplete:function(dataR){
                // console.log(dataR);
                if(!$('#lrSellGridFilterTab').hasClass('loaded')){
                    statusTabs='<h1><a href="javascript:void(0);" style="float: left;padding: 9px;">Status: </a></h1><div class="filter_tabs">\
                                    <div class="tab active"><a href="javascript:void(0);" rel="" class="">All</a></div>\
                                </div>';
                    $.each(dataR.lr_status,function(k,v){
                        statusTabs+='<div class="filter_tabs">\
                                        <div class="tab"><a href="javascript:void(0);" rel="'+v.status_id+'" class="">'+v.status_name+'</a></div>\
                                    </div>';
                    });
                    statusTabs+='<div style="clear:both;"></div>';
                    
                    {
                        filterFlagOptions='<option value="0" title="">Select</option>';
                        $.each(dataR.lr_flags,function(key,value){
                            filterFlagOptions+='<option value="'+value.id+'" title="'+base_url+'public/css/images/flags/'+value.id+'.png">'+(value.name)+'</option>';
                        });
                        filterFlag='<div style="">\
                                <select class="flag_select imgDrop" name="flag_id" style="width:80px;" onchange="">\
                                    '+filterFlagOptions+'\
                                </select>\
                            </div>';
                    }
                    statusTabs+='<form id="sellGridFilter">\
                                    <!--<h1><a href="javascript:void(0);" style="float: left;padding: 9px;">Filter: </a></h1>--><div style="clear:both;"></div>\
                                    <div class=" fl">\
                                        <div class="">'+filterFlag+'</div>\
                                    </div>\
                                    <div class="filter_fields fl">\
                                        <div class=""><input style="width:97px;" type="text" name="sell_mask_id" placeholder="Transaction Number" value=""/></div>\
                                    </div>\
                                    <div class="filter_fields fl">\
                                        <div class=""><input style="width:100px;" type="text" name="user_name" placeholder="User Name" value=""/></div>\
                                    </div>\
                                    <div class="filter_fields fl">\
                                        <div class=""><input style="width:100px;" type="text" name="bank_name" placeholder="Payment Method" value=""/></div>\
                                    </div>\
                                    <div class="filter_fields fl">\
                                        <div class=""><input style="width:100px;" type="text" name="sell_lr_account" placeholder="LR Number" value=""/></div>\
                                    </div>\
                                    <div class="filter_fields fl">\
                                        <div class=""><input style="width:50px;" type="text" name="elapsed_time" placeholder="Elapsed Time" value=""/></div>\
                                    </div>\
                                    <div class="filter_fields fl">\
                                        <div class=""><input style="width:105px;" type="text" class="apply_datepicker" name="sell_date_added" placeholder="Date" value=""/></div>\
                                    </div>\
                                    <div class="filter_fields fl">\
                                        <div class=""><input style="width:97px;" type="text" name="sell_total" placeholder="Total amount" value=""/></div>\
                                    </div>\
                                    <div class="filter_fields fl">\
                                        <div class="">'+dataR.buy_sell_status_select+'</div>\
                                    </div>\
                                    <div style="clear:both;"></div>\
                                  </form>\
                                    ';
                    
                    $('#lrSellGridFilterTab').html(statusTabs).addClass('loaded');
                    $('#sellGridFilter .imgDrop').msDropDown();
                    $('.apply_datepicker').datepicker({dateFormat:'yy-mm-dd', changeMonth: true, changeYear: true,onSelect: function(dateText, inst) { $(this).trigger('keyup').blur(); }});
                }
                $('.jqgrid_wrap .imgDrop').msDropDown();
            }
    });
}



function changeBuyStatus(status,buy_id){
    dataP='flag_id='+status+'&id='+buy_id;
    
    $.ajax({
        url:site_url+'admin/change_buy_flag',
        data:dataP,
        type:'POST',
        dataType:'',
        beforeSend:function(){
            
        },
        success:function(dataR){
            if(dataR){
                
            }
        }
    })
}

function changeSellStatus(status,sell_id){
    dataP='flag_id='+status+'&id='+sell_id;
    
    $.ajax({
        url:site_url+'admin/change_sell_flag',
        data:dataP,
        type:'POST',
        dataType:'',
        beforeSend:function(){
            
        },
        success:function(dataR){
            if(dataR){
                
            }
        }
    })
}


















function getCookie(c_name){
    var i,x,y,ARRcookies=document.cookie.split(";");
    for (i=0;i<ARRcookies.length;i++)
    {
        x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
        y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
        x=x.replace(/^\s+|\s+$/g,"");
        if (x==c_name)
        {
            return unescape(y);
        }
    }
}