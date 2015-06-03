<?php $this->load->view('common/admin/widget_header'); ?>


    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>public/css/autoSuggest.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.autoSuggest_custom.js"></script>
    <link href="<?php echo base_url(); ?>public/css/uploadify.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url();?>uploadify/swfobject.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>uploadify/jquery.uploadify.v2.1.4.js"></script>
    
    
    <link rel="stylesheet" href="public/css/bootstrap-image-gallery.min.css">
    <script src="public/js/load-image.min.js"></script>
    <script src="public/js/bootstrap-image-gallery.min.js"></script>

    <script type="text/javascript">
        var site_url = '<?php echo site_url(); ?>'
        $(document).ready(function(){
            $.ajaxSetup({
                jsonp: null,
                jsonpCallback: null
            });

            $('.j_save_menu').live('click',function(){
                $("#add_menu").submit();
            });

        });
    </script>


</head>


<body class="app">

    <?php $this->load->view('common/leftnav'); ?>

    <div class="right_content">

        <?php $this->load->view('common/admin/menu_header'); ?>


        <section id="secondary_bar" class="section">

            <div class="breadcrumbs_container">
                <article class="breadcrumbs article">
					<img src="<?php echo base_url();  ?>misc/css/images/fav.png" class="fl bread_logo" />
                    <div class="breadcrumb_divider"></div>
                    <a class="current">Gallery</a>
                </article>
            </div>
        </section><!-- end of secondary bar -->



        <section id="main" class="column">
            
            <div class="form_prp ">
                
                <?php $this->load->view('common/notifications'); ?>
                
                <form name="admingallery_form" id="admingallery_form" action="<?php echo site_url('admingallery/save_media_gallery'); ?>" method="post" >
                    <input type='hidden' name='from' id='from' value='<?php echo $this->config->item('from_mail') ?>'/> 	
                    <div class="h_2">Gallery Upload</div>
                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="name">Media Name:<span class="validcol">*</span></label> 
                        </div>
                        <div class="right_fld">
                            <input type='text' name='name' id='name' value='' class="required ip" title="Please enter the name" />
                        </div>
                        <div class="cb"></div>
                    </div>
                    
                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="name">Upload Image:<span class="validcol">*</span></label> 
                        </div>
                        <div class="right_fld">
                            <input name="files" id="myfile" class="myfile required" value="" type="hidden" title="Please upload a Image"/>
                            <input name="MAX_FILE_SIZE" value="10000" type="hidden" />
                            <div>
                                <?php if (isset($url) && $url != '') {
                                    ?>
                                <!--<a href='<?php //echo base_url().'adminnews/fileDownload/'.$att_id; ?>'><span><?php //echo $original_file_name;  ?></span></a>-->
                                    <span><?php echo attachment($db_file_name, $original_file_name); ?></span>
                                <?php }
                                ?>
                            </div>
                            <div id="upload_error">
                            </div>
                        </div>
                        <div class="cb"></div>
                    </div>
                    

<!--                    <div class="d_fds"> (USE THIS FOR IMPLEMENTING A DROP DOWN WHICH DEFINES THE MEDIA TYPE(Ex: IMAGE, VIDEO ETC. WHICH WILL BE HELPFUL AS A FILTER)
                        <div class="left_fld">
                            <label for="title">Media Type:<span class="validcol">*</span></label> 
                        </div>
                        <div class="right_fld">
                            <input type='text' name='subject' id='subject' value='' class="required ip"/>
                        </div>
                        <div class="cb"></div>
                    </div>-->

                    <div class="d_fds">
                        <div class="left_fld">
                            <label for="comments">Comments:</label> 
                        </div>
                        <div class="right_fld">
                            <textarea class=" t_ar jquery_ckeditor  ip" name="comments" id='comments' cols="10" rows="2" title="Please enter the comments"></textarea>
                        </div>
                        <div class="cb"></div>
                    </div>
                    <div class="d_fds">
                        <input type='submit' name='send' value='  Save  ' class="alt_btn jsend_mail" />
                        <span class="jerror_msg"></span>
                        <?php echo $this->formtoken->getField(); ?>
                    </div>
                </form>
                
                <hr/>

                <div id="gallery_wrap">
                    <div id="gallery" data-toggle="modal-gallery" data-target="#modal-gallery">
                        <?php // echo '<pre>'; print_r($images); echo '</pre>'; ?>
                        <?php if(!empty($images)) foreach($images AS $k=>$v){ ?>
                        <a href="<?php echo $v->url; ?>" title="<?php echo $v->name; ?>" data-gallery="gallery">
                            <img src="<?php echo $v->url; ?>" width="80" />
                        </a>
                        <?php } ?>
                    </div>
                </div>
                
                
                <table id="sub_grid_tbl" class="cs_gd"></table>
                <div id="sub_grid_pager"></div>

            </div>
            
        </section>

        <!--Start@@code for the Modal Window-->

        <div id="addpayment" class="m_w">

        </div>


        <!--End@@code for the Modal Window-->

        <!-- End of RTE Files -->

    </div>
    <?php $this->load->view('common/admin/admin_footer'); ?>
    
    
    <script type="text/javascript">
        $('#admingallery_form').validate({
            errorPlacement: function(error, element) {
                if (element.attr("name") == "files" || element.attr("name") == "files" )
                    error.insertAfter("#upload_error");
                else
                    error.insertAfter(element);
            }
        });
        
        var app_name = '<?php echo $this->config->item('app_name') ?>';
        $(function(){
            
            $('.myfile').uploadify({
                'uploader'  : site_url+'uploadify/uploadify.swf',
                'script'    : '<?php echo site_url(); ?>uploadify/uploadify.php',
                //'script'    : '<?php //echo base_url('uploadify');   ?>',
                'cancelImg' : site_url+'uploadify/cancel.png',
                'folder'    : '/'+app_name+'/uploads',
                'auto'      : true,
                'multi'     : false,
                'fileExt'   : '*.jpg;*.gif;*.png',
                'fileDesc'    : 'Image Files',
                'sizeLimit'   : 1024000,
                'removeCompleted' : false,
                'onComplete'  : function(event, ID, fileObj, response, data) {
                    // Any Callback Functionality goes here.
                    $('#myfile').val(response);
                }
            }); 
            
        });
    </script>
    
    
    <!-- modal-gallery is the modal dialog used for the image gallery -->
    <div id="modal-gallery" class="modal modal-gallery hide " tabindex="-1" role="dialog" >
        <div class="modal-header">
            <a  href="#modal-gallery" class="close" data-toggle="modal">x</a>
            <h3 class="modal-title"></h3>
        </div>
        <div class="modal-body"><div class="modal-image"></div></div>
        <div class="modal-footer">
            <a  href="#modal-gallery" class="btn bs" data-toggle="modal">Close</a>
            <a class="btn bs btn-info modal-prev"><i class="icon-arrow-left icon-white"></i> Previous</a>            
            <a class="btn bs btn-primary modal-next">Next <i class="icon-arrow-right icon-white"></i></a>
            <a class="btn bs btn-success modal-play modal-slideshow" data-slideshow="3000"><i class="icon-play icon-white"></i> Slideshow</a>
            <a class="btn bs modal-download" target="_blank"><i class="icon-download"></i> Download</a>
        </div>
    </div>
    
    
</body>

</html>