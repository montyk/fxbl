var notificationTimer;

$(function(){
    refreshNotification();
    setTimeout(refreshNotification,2500);
    $(function(){
        $('.j_e_nofity').live('click',function(){
            $('.j_notify').slideToggle('fast');
            $(this).toggleClass('active');
        });
    });
});

function refreshNotification(){
    
    $.ajax({
        url:site_url+'home/get_unread_messages',
        type: "POST",
        dataType: "html",
        contantType:'text/json',
        beforeSend:function(){
            
        },
        success:function(dataR){
            if(dataR && dataR.length)
                dataR=JSON.parse(dataR);
            else
                dataR=[];
//            console.log(dataR);
//            console.log(dataR.length);
            if(dataR.length){
                $('#j_message_container ul').html(buildNotification(dataR));
                $('.j_notify_count').html(dataR.length).show();
            }else{
                $('#j_message_container ul').html('<li class="no_notify">\
                                                        <div><i>No New Messages..</i></div>\
                                                        <div class="clear">&nbsp;</div>\
                                                    </li>');
                $('.j_notify_count').html('0').hide();
            }
        },
        complete:function(){
            clearTimeout(notificationTimer);
            notificationTimer=setTimeout(refreshNotification,5000);
        }
    });
    
}

function buildNotification(data){
    var html='';
    if(data && data.length){
        for(i in data){
            html+='<li onclick="window.location=\''+data[i].url+'\'">\
                        <img src="'+base_url+'/public/images/default_logo.png" class="fl n_user_img" />\
                        <div class="fl notify_txt">\
                            <div class="n_user"><b>'+data[i].from+'</b></div>\
                            <div class="notify_msg">'+data[i].message+'</div>\
                            <div class="dt">'+data[i].date_added+'</div>\
                        </div>\
                        <div class="clear">&nbsp;</div>\
                    </li>';
        }
    }
    return html;    
}