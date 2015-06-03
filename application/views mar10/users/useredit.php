<form name="addusers" id="adduser">
    <div class="m_h ed_img">
        <div class="h_t fl j_ae_ecur_txt">Add Payment</div>
        <div class="j_u_m icon ed_img fr c_i c_i_h"></div>
        <div class="cb"></div>
    </div>
    <div class="m_c">
        <div class="d_fds">
            <div class="left_fld">
                <label for="name">Name:</label>
            </div>
            <div class="right_fld">
                <input type='text' name='name' id='name' value='<?php echo $userdata->user_name;?>' class="required ip"/>
            </div>
            <div class="cb"></div>
        </div>

        <div class="d_fds">
            <div class="left_fld">
                <label for="logo">Logo:</label>
            </div>
            <div class="right_fld">
                <input style="display:block" type='file' name='logo' id='logo' value='' class="required ip"/>
            </div>
            <div class="cb"></div>
        </div>

        <div class="d_fds">
            <div class="left_fld">
                <label for="languages_id"> Mode:</label>
            </div>
            <div class="right_fld">
                <select name="mode" id="mode" style="" class=" required sl_bx valid">
                    <option value="">Select Language</option>
                    <option value="1" selected="">English</option>
                    <option value="2">French</option>
                </select>
            </div>
            <div class="cb"></div>
        </div>
        <div class="d_fds">
            <div class="left_fld">
                <label for="status_id"> Status:</label>
            </div>
            <div class="right_fld">
                <select name="status_id" id="status_id" style="" class=" required sl_bx valid">
                    <option value="">Select Language</option>
                    <option value="1" selected="">English</option>
                    <option value="2">French</option>
                </select>
            </div>
            <div class="cb"></div>
        </div>

        <div class="d_fds">
            <div class="left_fld">
                <label for="flat_fees">Flat fees:</label>
            </div>
            <div class="right_fld">
                <input type='text' name='flat_fees' id='flat_fees' value='' class="required ip"/>
            </div>
            <div class="cb"></div>
        </div>

    </div>
    <div class="m_f ed_img">
        <a class="prybtn fl jsave_cust">
            <span class="inner-btn">
                <span class="label">Save</span>
            </span>
        </a>
        <a class="secbtn fl j_u_m">
            <span class="inner-btn">
                <span class="label">Cancel</span>
            </span>
        </a>
    </div>
</form>
<script>
$(document).ready(function(){
    $("#adduser").validate({
        rules: {
            name:"required",
            logo:"required",
            flat_fees:"required"
        },
        messages: {
            name: "Please enter name",
            logo:"Please upload Logo",
            flat_fees:"Please Enter Flat Fees"
        },
        errorPlacement: function(error, element) {
            console.log(error);
            console.log(element);
            if (element.attr("name") == "accept_tc" || element.attr("name") == "accept_policy" )
                error.insertAfter("#accept_errors");
            else
                error.insertAfter(element);
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});
</script>