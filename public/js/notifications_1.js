var notificationTimer_cur;
                 var CUR = [];
                  var CUR_Table2 =[];
                  var dataP = '';
jQuery(function(){
   // alert(1);
      refreshNot();
    setTimeout(refreshNot,2500);
});

function refreshNot(){
    
    jQuery.ajax({
                    url: site_url+'register/currency_json',
                        data: dataP,
                        type: 'POST',
                        dataType: 'json',
                        beforeSend: function () {
                        },
                        success: function (dataR) {
                            CUR_Table2=[];
                            CUR = [];
                            var curren_key = dataR.post;
                            jQuery.each(curren_key, function (index, value) {
                            jQuery.each(value, function (index1, value1) {
                            CUR.push(index1 + ' - ' + value1);
                           CUR_Table2.push('<tr><td><img width="16" height="11" src="'+site_url+'public/images/logos/'+index1 +'.png" alt="symbol">'+index1 + '</td><td>' + value1+'</td></tr>');
                                });
                            });
                            jQuery('#currency_scroller').html(CUR);
                            jQuery('.table').html('<thead><tr><th>Symbol</th><th>Bid</th</tr></thead>'+CUR_Table2);
                        },
        complete:function(){
            clearTimeout(notificationTimer_cur);
            notificationTimer_cur=setTimeout(refreshNot,5000);
        }
    });
    
}

