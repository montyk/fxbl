<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $this->config->item('project_name') ?> - Upload Additional Documents</title>
        <?php $this->load->view('common/userpages/head_links_file_uplaoder_new'); ?>
        
        <script type="text/javascript">
            /*jslint unparam: true */
            /*global window, $ */
            $(function () {
                'use strict';
                // Change this to the location of your server-side upload handler:
                var url= "<?php echo site_url('userpages/upload_documents_handler'); ?>";
                $('#fileupload').fileupload({
                    url: url,
                    dataType: 'json',
                    done: function (e, data) {
                        $.each(data.result.files, function (index, file) {
                            if(console) console.log(file);
                            if(file.error){
                                $('<div class="alert_error"/>').text(file.error).appendTo('#files');
                                setTimeout(function(){ $('.alert_error').slideUp('fast'); }, 10000);
                            }else{
                                $('<p/>').text(file.name).appendTo('#files');
                                $('<input type="hidden" name="additional_documents[]" />').val(file.name).appendTo('#files');
                                $('<input type="hidden" name="additional_documents_full_path[]" />').val(file.url).appendTo('#files');
                            }
                            
                        });
                        $('#progress').hide();
                        $('#progress .bar').css(
                            'width','0px'
                        );
                    },
                    progressall: function (e, data) {
                        var progress = parseInt(data.loaded / data.total * 100, 10);
                        $('#progress').show();
                        $('#progress .bar').css(
                            'width',
                            progress + '%'
                        );
                    }
                }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
                
                
                
                $('.j_upload_docs').on('click',function(){
                    if($.trim($('#request_id').val())==''){
                        $('#request_id').next('.error').remove();
                        $('<div class="error"/>').text($('#request_id').attr('title')).insertAfter('#request_id');
                    }else if($('[name="additional_documents[]"]').length==0){
                        $('#request_id').next('.error').remove();
                        $('<div class="alert_error"/>').text('Please upload a document.').appendTo('#files');
                    }else{
                        $('#request_id').next('.error').remove();
                        $(this).parents('form').submit();
                    }
                    setTimeout(function(){ $('.alert_error').slideUp('fast'); }, 10000);
                });
                
                
            });
        </script>
        
    </head>
    <body class="app">
           
        <div id="wrap">
            
            <?php $this->load->view('common/userpages/header_new'); ?>
            
            <div class="contentarea p_r">
                <div class="leftNav p_f tf_animation animation_setting fadeInLeft">
                    <?php $this->load->view('common/userpages/leftnav_new'); ?>
                </div>
                <div class="rightNav">
                    <div class="rightNav_head">Upload Additional Documents</div>
                    <div class="rightNav_cnt">
                        
                        <?php $this->load->view('common/userpages/notifications'); ?>
                        
                        <p  class="help_text"><?php echo $this->config->item('project_name') ?> is legally required to hold on record (to file) the necessary documentation in support of your application. Trading access and/or withdrawals will not be permitted until your documents have been received and verified.</p>
                        <p  class="help_text m_t_20">Please scan and upload the documentation specified below.</p>
                        <p  class="help_text">Accepted file formats: .GIF, .JPG, .PNG, .PDF</p>
                        
                        <form method="post" action="<?php echo site_url('userpages/additional_documents'); ?>" class="additional_documents_form" >
                        
                        <div class="hdr2 f_b m_b_10 m_t_10">Request ID:</div>

                        <div class="o_h sum_box r_f m_t_20">
                            <input type="text" class="ip r_f m_t_20 required" placeholder="Request ID" name="request_id" id="request_id" title="Please enter a request ID." />
                            <br/>
                            
                            <span class="fileinput-button button green m_t_20">
                                <span><span class="plus ">+</span> Select files...</span>
                                <!-- The file input field used as target for the file upload widget -->
                                <input id="fileupload" type="file" name="files[]" multiple>
                            </span>
                            <br/><br/>
                            <!-- The global progress bar -->
                            <div id="progress" class="progress progress-success progress-striped hide">
                                <div class="bar"></div>
                            </div>
                             <!-- The container for the uploaded files -->
                            <div id="files" class="files reset_alert col_blk"></div>
                            
                            <a class="button yellow m_t_20 cur_def j_upload_docs">Upload your documents</a>
                            
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div> 
            
            <?php $this->load->view('common/userpages/footer_new'); ?>
                  
        </div>    
        
    </body>
</html>