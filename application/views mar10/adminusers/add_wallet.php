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
                    <a class="current">Add Wallet</a>
                </article>
                    
            </div>
        </section><!-- end of secondary bar -->
            
            
        <section id="main" class="column section">
            <div class="form_prp">
                
                <form name="registerform" id="registration_form" action="<?php echo site_url('adminusers/savewallet'); ?>" method="post" enctype="multipart/form-data" >
                    <input type="hidden" name="id" value="<?php echo $userid; ?>">
                    <input type="hidden" name="balance" id="balance" value="<?php echo $wallet;?>">
                
                
                  
            
            <div class="h_2">Wallet Balance: <?php echo $wallet;?></div>
                    <div class="h_2">User Details:</div>
			        <div class="d_fds">
                        <div class="left_fld">
                            <label for="amount"> <span class="validcol"></span> Name:</label>
                        </div>
                        <div class="right_fld">
                            <?php echo $name;?>
                        </div>
                         <div class="cb"></div>
                    </div>
			        <div class="d_fds">
                        <div class="left_fld">
                            <label for="amount"> <span class="validcol"></span> Login:</label>
                        </div>
                        <div class="right_fld">
                            <?php echo $login;?>
                        </div>
                         <div class="cb"></div>
                    </div>

                    <div class="h_2">Wallet Details:</div>
                    <?php if($msg!=''){?>
                    <div class="d_fds">
                        <label class="error">
                        <?php echo $msg;?>
                        </label>
                    </div>
                    <?php }?>
                
                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="amount"> <span class="validcol">*</span> Amount:</label>
                        </div>
                        <div class="right_fld">
                            <input type='text' name='amount' id='amount' value="" class=" required ip number" />
                            <select name="type" id="type" value="" class="required ip">
                                <option value="1">+</option>
                                <option value="0">-</option>
                            </select>
                        </div>
                         <div class="cb"></div>
                    </div>
                
                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="amount"> <span class="validcol">*</span>Log Message:</label>
                        </div>
                        <div class="right_fld">
                            <input type='text' name='message' id='message' value="" class=" required ip" />
                        </div>
                         <div class="cb"></div>
                    </div>
                <!--
                    <div class="d_fds">
                        <label><input style="width: 18px;" type="checkbox" name="balance_status" value="1"/>
                        Add balance to MT4</label>
                    </div>
                -->

                    <div class="d_fds">
                        <input type='submit' name='add' value='   Update Wallet  ' class="alt_btn" />
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