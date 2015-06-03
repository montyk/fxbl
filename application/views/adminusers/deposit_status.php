 	 <?php $this->load->view('common/admin/main_header'); ?>
	 
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/ckeditor/adapters/jquery.js"></script>

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/js/jquery-ui-1.8.21/css/smoothness/jquery-ui-1.8.21.custom.css" />
    <script src="<?php echo base_url();?>public/js/jquery-ui-1.8.21/js/jquery-ui-1.8.21.custom.min.js"></script>
    
 
    <script type="text/javascript">

        $(document).ready(function() {

            //When page loads...
            $(".tab_content").hide(); //Hide all content
            $("ul.tabs li:first").addClass("active").show(); //Activate first tab
            $(".tab_content:first").show(); //Show first tab content

            //On Click Event
            $("ul.tabs li").click(function() {

                $("ul.tabs li").removeClass("active"); //Remove any "active" class
                $(this).addClass("active"); //Add "active" class to selected tab
                $(".tab_content").hide(); //Hide all tab content

                var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
                $(activeTab).fadeIn(); //Fade in the active ID content
                return false;
            });
        });
    </script>
    <script type="text/javascript">
        $(function(){
            //$('.column').equalHeight();
             
           $('#registration_form').validate({
               
               messages:{
                   amount:{
                       required:'Please enter the amount'
                   }
               }
           });
            
            
        });
    </script>


</head>


<body class="app add_wallet_update">
      
    <?php $this->load->view('common/leftnav'); ?>
             
    <div class="right_content">
        
        <?php $this->load->view('common/admin/menu_header'); ?>
             
        <section id="secondary_bar" class="section">
            
            <div class="breadcrumbs_container">
                <article class="breadcrumbs article">
                    <img src="<?php echo base_url(); ?>misc/css/images/fav.png" class="fl bread_logo" />
                    <div class="breadcrumb_divider"></div>
                    <a class="current">Update Deposit Status</a>
                </article>
                    
            </div>
        </section><!-- end of secondary bar -->
       
            
        <section id="main" class="column section">
            <div class="form_prp">
                
                <form name="registerform" id="registration_form" action="<?php echo site_url('adminusers/save_depositstatus'); ?>" method="post" enctype="multipart/form-data" >
                    <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                    
           
                    <div class="h_2">User Details:</div>
                    <?php if($msg!=''){?>
                    <div class="d_fds">
                        <label class="error">
                        <?php echo $msg;?>
                        </label>
                    </div>
                    <?php }?>
                
                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="name"> <span class="validcol"></span> Investor Name:</label>
                        </div>
                        <div class="right_fld">
                       <?php echo ucfirst($firstname).' '.ucfirst($lastname);?> 
                        </div>
                         <div class="cb"></div>
                    </div> 
                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="login"> <span class="validcol"></span> Investor Login:</label>
                        </div>
                        <div class="right_fld">
                           
                           <?php echo $login;?>
                        </div>
                         <div class="cb"></div>
                    </div>
                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="email"> <span class="validcol"></span> Investor Email:</label>
                        </div>
                        <div class="right_fld">
                           
                           <?php echo $email;?> 
                        </div>
                         <div class="cb"></div>
                    </div>
                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="amount"> <span class="validcol">*</span> Deposit Status:</label>
                        </div>
                        <div class="right_fld">
                           
                            <select name="deposit_status" id="deposit_status" value="" class="required ip">
                                <option value="">Select</option>
                                <option value="N" <?php if($deposit_status=='N') echo "selected='selected'";?>>No</option>
                                <option value="Y" <?php if($deposit_status=='Y') echo "selected='selected'";?>>Yes</option>
                            </select>
                        </div>
                         <div class="cb"></div>
                    </div>
                   

                    <div class="d_fds">
                        <input type='submit' name='add' value='   Update Status  ' class="alt_btn" />
                    </div>
                    <?php echo formtoken::getField(); ?>
                </form>
                
                
                
                
                
                
                
                
                
                
                
                
            </div>
        </section>
            
        <script>
            $(function(){
                var CKconfig = {
                    toolbar:
                        [
                        ['Bold','Italic','Underline','Strike'],
                        ['NumberedList','BulletedList','-','Outdent','Indent'],
                        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                        ['Cut','Copy','Paste','PasteText','PasteFromWord','-','SpellChecker'],
                        ['Undo','Redo'],['TextColor','BGColor','-','Format']
                    ],
                    removePlugins : 'elementspath',
                    resize_enabled : false,
                    forcePasteAsPlainText : true
                };
                $('.jquery_ckeditor').ckeditor(CKconfig);
            });
        </script>		
    </div>
</body>

</html>