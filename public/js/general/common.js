var dropMenuTimer,dropMenuTimer2;
var tempUP;
$(function(){
        /*$('.menu_nav ul:first li').live('mouseover',function(){
            if($(this).find('.sub_menu').length>0){
                $(this).find('.sub_menu').slideDown();
                clearTimeout(dropMenuTimer2);
		dropMenuTimer2=setTimeout("$('.sub_menu').slideUp();",7000);
            }
        });
        */

       $('#course,#course_id').live('change',function(){
           $('#branch, #branch_id').val('');
           if($(this).val()=='1')
           $.each($('#branch option, #branch_id option'),function(k,v){
               if($.inArray(parseInt($(v).attr('value')),postGradIDs)>=0){
                   $(v).hide();
               }else{
                   $(v).show();
               }
           });
           if($(this).val()=='2')
           $.each($('#branch option, #branch_id option'),function(k,v){
               if($.inArray(parseInt($(v).attr('value')),postGradIDs)>=0){
                   $(v).show();
               }else{
                   $(v).hide();
               }
           });
       });

       if(navigator.appVersion.indexOf('MSIE 7')>=0){
           $('.logo h1 a:first, #drop_click span:first').addClass('fl');
       }
       $('.menu_nav ul:first li').click(function(){
            if($(this).find('.sub_menu').length>0){
                $(this).find('.sub_menu').slideToggle(400);
                clearTimeout(dropMenuTimer2);
		dropMenuTimer2=setTimeout("$('.sub_menu').slideUp();",7000);
            }
        });
        
        $('.sub_menu').live('hover',function(){
                clearTimeout(dropMenuTimer2);
		dropMenuTimer2=setTimeout("$('.sub_menu').slideUp();",7000);
        });

        /*User details / logout Drop*/
	$('#drop_click').click(function(){
		$('#account_drop_list').slideToggle();
		$('#account_drop').toggleClass('active');
		clearTimeout(dropMenuTimer);
		dropMenuTimer=setTimeout("$('#account_drop_list').slideUp();$('#account_drop').removeClass('active');",7000)
	});

        $('input.text').live('keypress',function(event){
            if(event.charCode==13){
                event.preventDefault();
                $(this).parents('form').find('.j_gen_form_submit').trigger('click');
            }
            
        })

        $('.j_gen_form_submit').live('click',function(){
            if(form_rel=$(this).parents('form').find('[name=rel]').val()){
                if(eval("validate_form_"+form_rel+"()")){
                    if($(this).parents('form').length>0){
                        dataP=$(this).parents('form').serialize();
                        thisObj=$(this)
                        //console
                        gen_form_submit(dataP,thisObj);
                    }else{
                        // Error..!!
                    }
                }
            }else{
                 if($(this).parents('form').length>0){
                    dataP=$(this).parents('form').serialize();
                    thisObj=$(this)
                    gen_form_submit(dataP,thisObj);
                }else{
                    // Error..!!
                }
            }
        });

        if($('.file_upload').length>0){
            $('.file_upload').uploadify({
                    'uploader'  : base_url+'/uploadify/uploadify.swf',
                    'script'    : base_url+'/uploadify/uploadify.php',
                    'cancelImg' : base_url+'/uploadify/cancel.png',
                    'folder'    : '/uploads',
                    'auto'      : true,
                    'multi'     : false,
                    'fileExt'   : '*.jpg;*.gif;*.png',
                    'fileDesc'    : 'Image Files',
                    'sizeLimit'   : 1024000,
                    'removeCompleted' : false,
                    'onComplete'  : function(event, ID, fileObj, response, data) {
                      $('.myfile').val(response);
                      //console.info(fileObj);
                      //console.info(response);
                      //console.info(data);
                      //console.info(ID);
                    }
            });
        }
        if($('#id_card_upload, #image_upload').length>0){
            $('#id_card_upload, #image_upload').uploadify({
                    'uploader'  : base_url+'/uploadify/uploadify.swf',
                    'script'    : base_url+'/uploadify/uploadify.php',
                    'cancelImg' : base_url+'/uploadify/cancel.png',
                    'folder'    : '/uploads',
                    'auto'      : true,
                    'multi'     : false,
                    'fileExt'   : '*.jpg',
                    'fileDesc'    : 'Image Files',
                    'sizeLimit'   : 5120000,
                    'removeCompleted' : false,
                    'onComplete'  : function(event, ID, fileObj, response, data) {
                      $('#id_card_upload, #image_link').val(response);
                      $('#uploaded_image, #image_display').html('<img width="100" height="120" src="'+base_url+'uploads/'+response+'" alt="Uploaded Image" title="Uploaded Image"/>');
                    }
            });
        }

        if($('#resume_upload, #doc_upload').length>0){
            $('#resume_upload, #doc_upload').uploadify({
                    'uploader'  : base_url+'/uploadify/uploadify.swf',
                    'script'    : base_url+'/uploadify/uploadify.php',
                    'cancelImg' : base_url+'/uploadify/cancel.png',
                    'folder'    : '/uploads',
                    'auto'      : true,
                    'multi'     : false,
                    'fileExt'   : '*.txt;*.doc;*.docx;*.pdf',
                    'fileDesc'    : 'Word/pdf Files',
                    'sizeLimit'   : 1024000,
                    'removeCompleted' : false,
                    'onComplete'  : function(event, ID, fileObj, response, data) {
                      $('#photo_val, #doc_link').val(response);
                      $('#photo_val, #doc_link').parent().find('div.error').remove();
                    }
            });
        }

        if($('.apply_datepicker').length>0){
            $('.apply_datepicker').datepicker({dateFormat:'yy-mm-dd', changeMonth: true, changeYear: true});
        }

        if($('.apply_dob_datepicker').length>0){
            $('.apply_dob_datepicker').datepicker({dateFormat:'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: '1910:2012'});
        }

        if($('.study_certi_from').length>0){
            $('.study_certi_from').datepicker({beforeShow: customRange2_Year,dateFormat:'yy-mm-dd', changeMonth: true, changeYear: true,minDate:doj});
        }

        if($('.study_certi_to').length>0){
            $('.study_certi_to').datepicker({beforeShow: customRange_Year,dateFormat:'yy-mm-dd', changeMonth: true, changeYear: true});
        }

        $('.clear').live('click',function(){
            $(this).parents('form')[0].reset();
        });
        
        
        /***Staff -> Send message***/
        $('#staff_send_msg [name=choice]').live('click',function(){
           if($(this).val()){
               $('#choice2_li').slideDown();
           }else{
               $('#choice2_li').hide();
           }
        });
        
        $('#staff_send_msg [name=choice2]').live('click',function(){
           if($(this).val()==1){
               $('#choice3_li').slideDown('fast');
               $('#student_number_li').slideUp('fast');
           }else if($(this).val()==2){
               $('#choice3_li').slideUp('fast');
               $('#student_number_li').slideDown('fast');
           }
           $('#message_li, #submit_button').slideDown();
        });
        
        
        /**** Admin Account ****/
        $('#admin_account_sel [name=choice]').live('click',function(){
           if($(this).val()==1){
               $('#choice1_li').slideDown('fast');
               $('#choice2_li').slideUp('fast');
               $('#choice3_li').slideUp('fast');
           }else if($(this).val()==2){
               $('#choice1_li').slideUp('fast');
               $('#choice3_li').slideUp('fast');
               $('#choice2_li').slideDown('fast');
           }else if($(this).val()==3){
               $('#choice1_li').slideUp('fast');
               $('#choice2_li').slideUp('fast');
               $('#choice3_li').slideDown('fast');
           }
        });


});


function gen_form_submit(dataP,thisObj){
    if(act=$(thisObj).parents('form').attr('action')){
        Aurl=site_url+act;
    }else{
        Aurl=site_url+'/gen_submit';
    }
    $.ajax({
        url:Aurl,
        data:dataP,
        type:'POST',
        dataType:'html',
        beforeSend:function(){

        },
        success:function(dataR){
            if(dataR && dataR==0){
                if(msg=$(thisObj).parents('form').attr('err_msg'))
                    $(thisObj).parents('form').html('<p>'+msg+'</p>');
                else
                    $(thisObj).parents('form').html('Problem Submiting form. Please try again.');
            }else if(dataR && dataR!=1){
                // $(thisObj).parents('form').html(dataR);
                $(thisObj).parents('form').replaceWith(dataR);
            }else if(msg=$(thisObj).parents('form').attr('suc_msg')){
                $(thisObj).parents('form').html('<p>'+msg+'</p>');
            }
            if($('#user_instructions,.user_instructions').length>0){$('#user_instructions,.user_instructions').hide();}
        }
    })
}

function ajax_gen_form(formObj){
    dataP=$(formObj).serialize();
    thisObj=$(formObj).find('.j_gen_form_submit');
    gen_form_submit(dataP,thisObj)
}

function change_password(){
    $.showModal({
        message:$.change_psw_form(),
        width:350,
        height:240,
        buttons:
            [{
                text: "Cancel",
                click: function() {$(this).dialog("close");}
            },
            {
                text: "Change Password",
                click: function() {validate_password_form();}
            }]
    });
}

function validate_password_form(){
    $('#password_form').validate({
        rules:{
            psw:{
                required:true
            },
            password:{
                required:true
            },
            password2:{
                required:true,
                equalTo: "#password"
            }
        },
        messages:{
            psw:{
                required:'Enter Old Password'
            },
            password:{
                required:'Enter New Password'
            },
            password2:{
                required:'Enter New Password',
                equalTo: 'New Password do not match'
            }
        },
        submitHandler:function(form){
            // $('#modal_message').dialog('close');
            ajax_psw_form()
        }
    });
    $('#password_form').submit();
}

function ajax_psw_form(){
    dataP=$('#password_form').serialize();
    $.ajax({
        url:site_url+'/login/change_password',
        data:dataP,
        type:'POST',
        dataType:'',
        beforeSend:function(){
            
        },
        success:function(dataR){
            if(dataR=='0'){
                alert('Please enter the correct password');
                $('#psw').focus();
            }else{
                alert('Password changed successfully');
                $('#modal_message').dialog('close');
            }
        }
    })
}

function customRange_Year(input) {
    if($.trim($("#from").val())!=''){
            from_date=$("#from").datepicker("getDate");
            from_date.setMonth(from_date.getMonth() + 12);

            return {
                    maxDate: (input.id == "to" ? from_date : null),
                    minDate: (input.id == "to" ? $("#from").datepicker("getDate") : null)
            };
    }else{
            return {
                    minDate: (input.id == "to" ? $("#from").datepicker("getDate") : null)
            };
    }
}

function customRange2_Year(input) {
    if($.trim($("#to").val())!=''){
            to_date=$("#to").datepicker("getDate");
            to_date.setMonth(to_date.getMonth() - 12);
 
            return {
                    maxDate: (input.id == "from" ? $("#to").datepicker("getDate") : null),
                    minDate: (input.id == "from" ? to_date : null)
            };
    }else{
            return {
                    maxDate: (input.id == "from" ? $("#to").datepicker("getDate") : null)
            };
    }
}
