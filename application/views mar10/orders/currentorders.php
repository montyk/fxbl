        <?php $this->load->view('common/admin/main_header'); ?>
	 
	<?php $this->load->view('common/includes.php');?>
        <script type="text/javascript">
		$(document).ready(function(){
                        
                        if(window.location.hash==''){
                            window.location.hash='#buy';
                        }
                        postData={
                            orders_type:(window.location.hash.replace('#',''))
                        }
                        
                        $('.tab_anc').removeClass('act_nvg').live('click',function(){
                            $('.tab_anc').removeClass('act_nvg');
                            $(this).addClass('act_nvg');
                            setTimeout(function(){
                                jQuery("#sub_grid_tbl").setGridParam({
                                    postData:{
                                        orders_type:(window.location.hash.replace('#',''))
                                    }
                                }).trigger('reloadGrid');
                            },200);
                        });
                        if(window.location.hash=='#buy'){
                            $('.tab_anc_buy').addClass('act_nvg');
                        }else if(window.location.hash=='#sell'){
                            $('.tab_anc_sell').addClass('act_nvg');
                        }
                    
			jQuery("#sub_grid_tbl").jqGrid431({
				url:'<?php echo site_url('orders/currentorders');  ?>',
				datatype: "json",
                                mtype:'POST',
				height: $('#sidebar').height(),
				width: $('#main').width()-10,
				colNames:['Flag', 'Transaction Number', 'Payment Method', 'e Currency Type','Total Number','Status', 'User Name','More','Messages'],
				colModel:[
					{name:'order_flag',index:'order_flag'},
					{name:'mask_id',index:'mask_id'},
					{name:'payment_method',index:'payment_method'},
					{name:'ecurrency',index:'ecurrency'},
					{name:'total',index:'total'},
					{name:'order_status',index:'order_status'},
					{name:'date',index:'date'},
					{name:'more',index:'more',sortable:false},
					{name:'more',index:'more',sortable:false}
				],
				rowNum:10,
				//rowList:[10,20,30],
				pager: '#sub_grid_pager',
				sortname: 'id',
				viewrecords: true,
				sortorder: "desc",
				multiselect: false,
				childGrid: true,
				childGridIndex: "rows",
                                postData:postData,
                                loadtext:'<img src="<?php echo base_url();  ?>public/images/36.gif"/>'
			});
			
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
                             $("#sub_grid_tbl").setGridParam({
                                 postData: postData
                             }).trigger("reloadGrid");
                         });
                         
                         $('.filterDatePicker').datepicker({dateFormat:'yy-mm-dd', changeMonth: true, changeYear: true});
		});
	</script>
	<script type="text/javascript">

	$(document).ready(function() {
		
		//When page loads...
		$(".tab_content").hide(); //Hide all content
		$("ul.tabs li:first").addClass("active").show(); //Activate first tab
		$(".tab_content:first").show(); //Show first tab content
		
	});
    </script>
    <script type="text/javascript">
		$(function(){
			//$('.column').equalHeight();
		});
	</script>
  

</head>

<body class="app">


	 <?php $this->load->view('common/leftnav'); ?>

	 <div class="right_content">

	 <?php $this->load->view('common/admin/menu_header');  ?>
	
	
	<section id="secondary_bar" class="section">

		<div class="breadcrumbs_container">
			<article class="breadcrumbs article">
                <a href="#">FOREXRAY Admin</a> 
                <div class="breadcrumb_divider"></div>
                <a class="current">Current orders</a>
             </article>
            <!-- <input type="button" value="Add Liberty Account" class="add_ecur fr" />-->
		</div>
	</section><!-- end of secondary bar -->
	
	
	<section id="main" class="column tab_grid section">
    	
        <ul class="tab_navgts ul_reset">
        	<li>
                <a class="tab_anc tab_anc_buy act_nvg" href="#buy">
                    <span class="inner-btn">
                    	<span class="label"> Buy LR</span>
                    </span>
                </a>
            </li>
            <li>
                <a class="tab_anc tab_anc_sell" href="#sell">
                    <span class="inner-btn">
                    	<span class="label"> Sell LR</span>
                    </span>
                </a>
            </li>
        </ul>
        
        <div class="flip">Filters</div>
        <div class="panel flt_panel">
        	<div class="d_fds">
            	<div class="fl m_r_10">
                    <div class="left_fld">
                        <label for="f_tn">Transaction number:</label>
                    </div>
                    <div class="right_fld">
                          <input type="text" name="mask_id" id="mask_id" value="" class="ip">
                    </div>
                    <div class="cb"></div>
                </div>
                <div class="fl">
                    <div class="left_fld">
                        <label for="f_un">User Name:</label> 
                    </div>
                    <div class="right_fld">
                          <input type="text" name="fname" id="fname" value="" class="ip">
                    </div>
                    <div class="cb"></div>
                </div>
                <div class="cb"></div>
            </div>
            
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
                <div class="cb"></div>
            </div>
            <div>
                <select id="orders_flags_id" class="sl_bx required" name="orders_flags_id" title="Please choose a Order Flag">
                    <?php echo selectBox('Select Flag','orders_flags','id,name',' status=1 ','','');  ?>
                </select>
                <select id="orders_status_id" class="sl_bx required" name="orders_status_id" title="Please choose a Order Status">
                    <?php echo selectBox('Select Status','orders_status','id,name',' status=1 ','','');  ?>
                </select>
                <select id="payment_methods_id" class="sl_bx required" name="payment_methods_id" title="Please choose a Payment Method">
                    <?php echo selectBox('Select Payment Method','payment_methods','id,name',' status=1 ','','');  ?>
                </select>
                <a class="nblu_btn japply_filter">
                    <span class="inner-btn">
                        <span class="label">Apply Filter</span>
                    </span>
                </a>
            </div>
            
        </div>

        
        <div id="tabs-1" class="grd_pn b_t_0">
            <table id="sub_grid_tbl" class="cs_gd"></table>
            <div id="sub_grid_pager"></div>
        </div>
            
		
	</section>
    </div>
</body>

</html>