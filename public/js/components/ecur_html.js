$.extend({
        eCurhtml : function(ecurrencies){
        var html = '<div class="jecur_sec"><div class="d_fds">\
            <div class="left_fld">\
                <label for="ecurrencies_id"> <span class="validcol vs_hd">*</span> E-Currency Account Type:</label>\
            </div>\
            <div class="right_fld">\
               <select name="mul_ecur_new[ecurrencies_id][]" class="sl_bx valid" >\
                          <option value="0">Select Currency Type</option>';
                          $.each(ecurrencies,function(i,val){
                              html += '<option value="'+val.id+'">'+val.name+'</option>';
                          });
        html += '</select>\
            </div>\
            <div class="cb"></div>\
        </div>\
        <div class="d_fds">\
            <div class="left_fld">\
                <label for="account_number"> <span class="validcol vs_hd">*</span> E-Currency Account Number:</label>\
            </div>\
            <div class="right_fld">\
                <input type="text" name="mul_ecur_new[account_number][]" value="" class=" ip"/>\
            </div>\
            <div class="cb"></div>\
        </div>\
        <div class="d_fds">\
            <div class="left_fld">\
                <label for="account_name"> <span class="validcol vs_hd">*</span> E-Currency Account Name:</label>\
            </div>\
            <div class="right_fld">\
                <input type="text" name="mul_ecur_new[account_name][]" value="" class=" ip" />\
            </div>\
            <div class="cb"></div>\
        </div>\
        <div class="d_fds"><input type="button" class="remecur" value="Remove"></div>\
        </div>';
        return html;
    }
});