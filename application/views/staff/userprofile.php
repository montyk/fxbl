<?php $current="User Profile"; include 'header.php'; ?>

	<section id="main" class="column section">
    
        <div class="form_prp w850">
            <?php $this->load->view('common/notifications');  ?>
            <form name="registerform" id="registerform" action="<?php echo site_url('signup/saveuser');?>" method="post" enctype="multipart/form-data" >
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <div class="h_2">Account Details:</div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="languages_id"> Choose language: <span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <select name="languages_id" id="languages_id" style="" class=" required sl_bx valid">
                            <option value="">Select Language</option>
                            <?php
                                foreach($master_data->languages as $langs) {
                                $selected = '';
                                if(!empty($languages_id) && $languages_id == $langs->id)
                                {
                                    $selected = 'selected=selected';
                                }
                            ?>
                            <option value="<?php echo $langs->id;?>" <?php echo $selected;?>><?php echo $langs->name;?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="cb"></div>
                </div>

                <?php
                /*<div class="d_fds">
                    <div class="left_fld">
                        <label for="username"> <span class="validcol">*</span> User Name:</label>
                    </div>
                    <div class="right_fld">
                          <input type='text' name='username' id='username' value='<?php echo $firstname;?>' class="required ip"/>
                    </div>
                    <div class="cb"></div>
                </div>
                 *
                 */?>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="email">Email:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <?php echo $email;?>
<!--                        <input type='text' name='email' id='email' value="<?php echo $email;?>" class=" required ip" />-->
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="user_email2">Confirm Email:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <?php echo $email;?>
<!--                        <input type='text' name='user_email2' id='user_email2' value="<?php echo $email;?>" class=" required ip"/>-->
                    </div>
                    <div class="cb"></div>
                </div>
                <?php
                if(!isset($myprofile))
                {
                ?>
                <div class="d_fds">
                    <div class="left_fld">
                        <label for="password">Password:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <input type='password' name='password' id='password' value="<?php echo $password;?>" class=" required ip"  />
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="confirm_password">Confirm Password:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <input type='password' name='confirm_password' id='confirm_password' value="<?php echo $password;?>" class=" required ip" />
                    </div>
                    <div class="cb"></div>
                </div>
                <?php
                }
                else
                {
                ?>
                <!--
                    <div class="d_fds">
                        <span id="chpwd" style="font-weight:bold">Change Password</span>
                    </div>
                -->
                <?php
                }
                ?>
                <div class="h_2">Security Details:</div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="">IP Security:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                          <label class="" tip="Selecting yes will provide you more security.">
                              <input style="width: 18px;" type="radio" name="ip_security" value="1" <?php if(!empty($ip_security) && $ip_security=='1'){ echo 'checked="checked"'; }  ?> />Yes</label>
                          <label class="" tip="Selecting yes will provide you less security.">
                              <input style="width: 18px;" type="radio" name="ip_security" value="0" <?php if(isset($ip_security) && $ip_security=='0'){ echo 'checked="checked"'; }  ?> />No</label>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="security_questions_id">Security Question: <span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <select name="security_questions_id" id="security_questions_id" style="" class=" required sl_bx valid">
                            <option value="">Select Question</option>
                            <?php
                                foreach($master_data->security_questions as $sec_q) {
                                $selected = '';
                                if(!empty($security_questions_id) && $security_questions_id == $sec_q->id)
                                {
                                    $selected = 'selected=selected';
                                }
                            ?>
                            <option value="<?php echo $sec_q->id;?>" <?php echo $selected;?>><?php echo $sec_q->name;?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="security_answer"> Security Answer:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <input type='text' name='security_answer' id='security_answer' value="<?php echo $security_answer;?>" class=" required ip"/>
                    </div>
                    <div class="cb"></div>
                </div>


                <div class="h_2">Personal Account Details:</div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="firstname">First Name:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <input type='text' name='firstname' id='firstname' value="<?php echo $firstname;?>" class=" ip"/>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="lastname"> Last Name:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <input type='text' name='lastname' id='lastname' value="<?php echo $lastname;?>"  class=" ip" />
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="dob"> Date Of Birth:<span class="validcol">*</span> </label>
                    </div>
                    <div class="right_fld">
                        <input type='text' name='dob' id='dob' value="<?php echo $dob;?>"  class=" ip apply_dob_datepicker required" />
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="register_types_id"> Register as:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <select name="register_types_id" id="register_types_id" style="" class="required sl_bx valid" >
                            <option value="">Select Registration Type</option>
                            <?php
                                foreach($master_data->register_types as $reg_types) {
                                $selected = '';
                                if(!empty($register_types_id) && $register_types_id == $reg_types->id)
                                {
                                    $selected = 'selected=selected';
                                }
                            ?>
                            <option value="<?php echo $reg_types->id;?>" <?php echo $selected;?>><?php echo $reg_types->name;?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="company"> Company name:<span class="validcol vs_hd">*</span></label>
                    </div>
                    <div class="right_fld">
                        <input type='text' name='company' id='company' value="<?php echo $company;?>" class="ip"/>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="business_types_id"> Business Type:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <select name="business_types_id" id="business_types_id" style="" class="sl_bx valid">
                            <option value="">Select Business Type</option>
                            <?php
                                foreach($master_data->business_types as $bus_types) {
                                $selected = '';
                                if(!empty($business_types_id) && $business_types_id == $bus_types->id)
                                {
                                    $selected = 'selected=selected';
                                }
                            ?>
                            <option value="<?php echo $bus_types->id;?>" <?php echo $selected;?>><?php echo $bus_types->name;?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="countries_id"> Country:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">

                        <select name='countries_id' id='countries_id' style="" class=" sl_bx">
                            <option value="">Select Country</option>
                            <?php
                                foreach($master_data->countries as $cntries) {
                                $selected = '';
                                if(!empty($countries_id) && $countries_id == $cntries->id)
                                {
                                    $selected = 'selected=selected';
                                }
                            ?>
                            <option value="<?php echo $cntries->id;?>" <?php echo $selected;?>><?php echo $cntries->name;?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="address"> Address:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <textarea name='address' id='address' class=" t_ar"><?php echo $address;?></textarea>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="city"> City:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <input type='text' name='city' id='city' value="<?php echo $city;?>" class=" ip"/>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="state"> State/Provence:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                        <input type='text' name='state' id='state' value="<?php echo $state;?>" class=" ip"/>
                    </div>
                    <div class="cb"></div>
                </div>

                 <div class="d_fds">
                    <div class="left_fld">
                        <label for="zip"> Postal Code/Zip Code:<span class="validcol">*</span> </label>
                    </div>
                    <div class="right_fld">
                        <input type='text' name='zip' id='zip' value="<?php echo $zip;?>" class=" ip" />
                    </div>
                    <div class="cb"></div>
                </div>


                <div class="h_2">Contact Info:</div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="home_phone"> Home phone No.:<span class="validcol vs_hd">*</span> </label>
                    </div>
                    <div class="right_fld">
                        <input type='text' name='home_phone' id='home_phone' value="<?php echo $home_phone;?>"  class=" ip" />
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="office_phone"> Business phone No.:<span class="validcol vs_hd">*</span> </label>
                    </div>
                    <div class="right_fld">
                        <input type='text' name='office_phone' id='office_phone' value="<?php echo $office_phone;?>" class=" ip" />
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="mobile_phone">Mobile phone No.:<span class="validcol">*</span> </label>
                    </div>
                    <div class="right_fld">
                        <input type='text' name='mobile_phone' id='mobile_phone' value="<?php echo $mobile_phone;?>"  class=" ip" />
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="fax_no"> Fax No.:<span class="validcol vs_hd">*</span> </label>
                    </div>
                    <div class="right_fld">
                        <input type='text' name='fax_no' id='fax_no' value="<?php echo $fax_no;?>"  class=" ip"/>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="communicate_lang"> Communicative Lang.: <span class="validcol vs_hd">*</span></label>
                    </div>
                    <div class="right_fld">
                        <input type='text' name='communicate_lang' id='communicate_lang' class=" ip" value="<?php if(isset($communicate_lang)) echo $communicate_lang;?>" />
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="time_to_call"> Best Time To Call:<span class="validcol vs_hd">*</span> </label>
                    </div>
                    <div class="right_fld">
                        <input type='text' name='time_to_call' id='time_to_call' value="<?php echo $time_to_call;?>"  class=" ip"/>
                    </div>
                    <div class="cb"></div>
                </div>

                <div class="d_fds">
                    <div class="left_fld">
                        <label for="time_zone"> Time Zone:<span class="validcol vs_hd">*</span> </label>
                    </div>
                    <div class="right_fld">
                        <input type='text' name='time_zone' id='time_zone' class=" ip" value="<?php if(isset($time_zone)) echo $time_zone;?>"/>
                    </div>
                    <div class="cb"></div>
                </div>



                <div class="h_2">E-Currency Account Details:</div>
                <div class="jecur_det">
                    <?php
                    $ecur_det_cnt = 0;
                    $style = 'display:none';
                    if(count($ecur_details) > 1)
                    {
                        $style = '';
                    }
                    if(!empty($ecur_details))
                    {
                        foreach($ecur_details as $values)
                        {
                            $ecur_det_cnt++;
                            /*if($ecur_det_cnt > 1)
                            {
                                $style = '';
                            }*/
                        ?>
                        <div class="jecur_sec">
                            <!--<input type="hidden" name="ecurr_ids[]" value="<?php //echo $values->id;?>">-->
                            <div class="d_fds">
                                <div class="left_fld">
                                    <label for="ecurrencies_id"> E-Currency Account Type:<span class="validcol vs_hd">*</span></label>
                                </div>
                                <div class="right_fld">
                                    <select name="mul_ecur[ecurrencies_id][]" class="sl_bx valid" >
                                        <option value="0">Select Currency Type</option>
                                        <?php
                                            foreach($master_data->ecurrencies as $ecurs) {
                                            $selected = '';
                                            if($values->ecurrencies_id == $ecurs->id)
                                            {
                                                $selected = 'selected=selected';
                                            }
                                        ?>
                                            <option value="<?php echo $ecurs->id;?>" <?php echo $selected;?>><?php echo $ecurs->name;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="cb"></div>
                            </div>

                            <div class="d_fds">
                                <div class="left_fld">
                                    <label for="account_number"> E-Currency Account Number:<span class="validcol vs_hd">*</span> </label>
                                </div>
                                <div class="right_fld">
                                    <input type='text' name='mul_ecur[account_number][]' value="<?php echo $values->account_number;?>" class=" ip"/>
                                </div>
                                <div class="cb"></div>
                            </div>

                            <div class="d_fds">
                                <div class="left_fld">
                                    <label for="account_name"> E-Currency Account Name:<span class="validcol vs_hd">*</span> </label>
                                </div>
                                <div class="right_fld">
                                    <input type='text' name='mul_ecur[account_name][]' value="<?php echo $values->account_name;?>" class=" ip" />
                                </div>
                                <div class="cb"></div>
                            </div>
                            <div class="d_fds"><input type="button" class="remecur" value="Remove" style="<?php echo $style;?>"></div>
                            <input type="hidden" name="mul_ecur[id][]" class="jexist_ecur" value="<?php echo $values->id;?>">
                        </div>
                        <?php
                        }
                    }
                    else
                    {
                    ?>
                        <div class="jecur_sec">
                            <!--<input type="hidden" name="ecurr_ids[]" value="<?php //echo $values->id;?>">-->
                            <div class="d_fds">
                                <div class="left_fld">
                                    <label for="ecurrencies_id"> E-Currency Account Type:<span class="validcol vs_hd">*</span></label>
                                </div>
                                <div class="right_fld">
                                    <select name="mul_ecur_new[ecurrencies_id][]" class="sl_bx valid" >
                                        <option value="">Select Currency Type</option>
                                        <?php
                                            foreach($master_data->ecurrencies as $ecurs) {
                                            $selected = '';

                                        ?>
                                            <option value="<?php echo $ecurs->id;?>" <?php echo $selected;?>><?php echo $ecurs->name;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="cb"></div>
                            </div>

                            <div class="d_fds">
                                <div class="left_fld">
                                    <label for="account_number"> E-Currency Account Number:<span class="validcol vs_hd">*</span> </label>
                                </div>
                                <div class="right_fld">
                                    <input type='text' name='mul_ecur_new[account_number][]' class=" ip"/>
                                </div>
                                <div class="cb"></div>
                            </div>

                            <div class="d_fds">
                                <div class="left_fld">
                                    <label for="account_name"> E-Currency Account Name: <span class="validcol vs_hd">*</span></label>
                                </div>
                                <div class="right_fld">
                                    <input type='text' name='mul_ecur_new[account_name][]' class=" ip" />
                                </div>
                                <div class="cb"></div>
                            </div>
                            <input type="hidden" name="mul_ecur[id][]">
                        </div>
                    <?php
                    }
                ?>
                </div>
                <input type="button" id="addecur" class="addecur" value="Add Ecurrency" />

                <div class="d_fds" id="photo_id_proof">
                   <!-- <div class="left_fld">
                        <label for="upload"> Upload File:</label>
                    </div>
                    <div class="right_fld">
                        <input type="file" name="userfile" id="upload">
                    </div>-->
                   <div class="left_fld">
                       <label for="myfile"> Photo-ID Proof:<span class="validcol">*</span></label>
                   </div>
                   <div class="right_fld">
                        <input name="files" id="myfile" class="myfile" value="" type="hidden"/>
                        <input name="MAX_FILE_SIZE" value="10000" type="hidden" />
                        <?php if(isset($attach_details[0]->url) &&  $attach_details[0]->url != '')
                         { 	?>
                                <!--<a href='<?php //echo base_url().'adminnews/fileDownload/'.$att_id;?>'><span><?php //echo $original_file_name; ?></span></a>-->
                                <span><?php echo attachment($attach_details[0]->db_file_name,$attach_details[0]->original_file_name);?></span>
                        <?php
                         }?>
                    </div>
                    <div class="cb"></div>
                </div>
                <div class="d_fds">
                    <!-- <div class="left_fld">
                            <label for="upload"> Upload File:</label>
                    </div>
                    <div class="right_fld">
                            <input type="file" name="userfile" id="upload">
                    </div>-->
                    <div class="left_fld">
                        <label for="myfile">Address Proof:<span class="validcol">*</span></label>
                    </div>
                    <div class="right_fld">
                            <input name="files" id="myfile1" class="myfile1" value="" type="hidden"/>
                            <input name="MAX_FILE_SIZE" value="10000" type="hidden" />
                            <?php if(isset($attach_details[1]->url) &&  $attach_details[1]->url != '')
                             { 	?>
                                <!--<a href='<?php //echo base_url().'adminnews/fileDownload/'.$att_id;?>'><span><?php //echo $original_file_name; ?></span></a>-->
                                <span><?php echo attachment($attach_details[1]->db_file_name,$attach_details[1]->original_file_name);?></span>
                            <?php
                             }?>
                    </div>
                    <div class="cb"></div>
                </div>
                <div class="d_fds">
                   <!-- <div class="left_fld">
                                <label for="upload"> Upload File:</label>
                        </div>
                        <div class="right_fld">
                                <input type="file" name="userfile" id="upload">
                        </div>-->
                        <div class="left_fld">
                            <label for="myfile">Bank Statement Proof:<span class="validcol">*</span></label>
                        </div>
                        <div class="right_fld">
                            <input name="files" id="myfile2" class="myfile2" value="" type="hidden"/>
                            <input name="MAX_FILE_SIZE" value="10000" type="hidden" />
                            <?php if(isset($attach_details[2]->url) &&  $attach_details[2]->url != '')
                             { 	?>
                                    <!--<a href='<?php //echo base_url().'adminnews/fileDownload/'.$att_id;?>'><span><?php //echo $original_file_name; ?></span></a>-->
                                    <span><?php echo attachment($attach_details[2]->db_file_name,$attach_details[2]->original_file_name);?></span>
                            <?php
                             }?>
                        </div>
                        <div class="cb"></div>
                </div>
				
				

                <hr/>

                <div class="d_fds">
                    <label><input style="width: 18px;" type="checkbox" name="newsletter" value="1" <?php if($newsletter == '1'){echo 'checked=checked';}?>/>
                    I accept to receive newsletters from edealspot</label>
                </div>
<!--                <div class="d_fds">
                    <label><input style="width: 18px;" type="checkbox" name="accept_tc" value="1" class="required"/>
                        I accept Terms and Conditions <span class="errmsg"></span></label>
                </div>
                <div class="d_fds">
                    <label><input style="width: 18px;" type="checkbox" name="accept_policy" value="1" class="required"/>
                    I accept Policy <span class="errmsg"></span></label>
                </div>-->
                 <div class="d_fds">
                    <input type='submit' name='signup' value='Save' class="alt_btn jadd_user" />
                 </div>
                 <?php echo formtoken::getField(); ?>
            </form>
        
        </div>
		
	</section>

<div class="jchpwd m_w" style="display:none">
        <form name="chpwd_form" id="chpwd_form">
            <input type="hidden" name="users_id" value="<?php echo $id;?>">
    	<div class="m_h ed_img">
        	<div class="h_t fl j_ae_ecur_txt">Change Password</div>
            <div class="j_u_m icon ed_img fr c_i c_i_h"></div>
            <div class="cb"></div>
        </div>
        <div class="m_c">
            <div class="d_fds">
                <div class="left_fld">
                    <label for="old_pwd">Old Password:</label>
                </div>
                <div class="right_fld">
                      <input type='password' name='old_pwd' id='old_pwd' value='' class="required ip"/>
                </div>
                <div class="cb"></div>
            </div>

            <div class="d_fds">
                <div class="left_fld">
                    <label for="new_pwd">Password:</label>
                </div>
                <div class="right_fld">
                    <input style="display:block" type='password' name='new_pwd' id='new_pwd' value='' class="required ip"/>
                </div>
                <div class="cb"></div>
            </div>

            <div class="d_fds">
                <div class="left_fld">
                    <label for="cnf_pwd"> Confirm Password:</label>
                </div>
                <div class="right_fld">
                    <input style="display:block" type='password' name='cnf_pwd' id='cnf_pwd' value='' class="required ip"/>
                </div>
                <div class="cb"></div>
            </div>
        </div>
        <div class="m_f ed_img">
        	<a class="prybtn fl jsave_chpwd">
            	<span class="inner-btn">
            		<span class="label">Save</span>
                </span>
            </a>
            <a class="secbtn fl j_u_m">
            	<span class="inner-btn">
            		<span class="label">Cancel</span>
                </span>
            </a>
            <span class="jmsg"></span>
        </div>
        </form>
    </div>
<script type="text/javascript" src="<?php echo base_url();?>uploadify/swfobject.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>uploadify/jquery.uploadify.v2.1.4.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/components/ecur_html.js"></script>
<script type="text/javascript">
  var app_name = '<?php echo $this->config->item('app_name') ?>';
  var site_url='<?php echo site_url()?>';
        $(function(){
            
           $('.myfile').uploadify({
                    'uploader'  : site_url+'uploadify/uploadify.swf',
                    'script'    : '<?php echo base_url();  ?>uploadify/uploadify.php',
					//'script'    : '<?php //echo base_url('uploadify');  ?>',
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
                    }
            });
            $('.myfile1').uploadify({
                    'uploader'  : site_url+'uploadify/uploadify.swf',
                    'script'    : '<?php echo base_url();  ?>uploadify/uploadify.php',
                    //'script'    : '<?php //echo base_url('uploadify');  ?>',
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
                    }
            });
             $('.myfile2').uploadify({
                            'uploader'  : site_url+'uploadify/uploadify.swf',
                            'script'    : '<?php echo base_url();  ?>uploadify/uploadify.php',
                            //'script'    : '<?php //echo base_url('uploadify');  ?>',
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
                            }
            });
            
            $('#addecur').click(function(){
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url();?>staff/getEcurrencies',
                    beforeSend : function(){
                    },
                    success: function(data){
                        $('.jecur_det').append($.eCurhtml(data));
                        $('.remecur').show();
                    },
                    complete: function(){
                    }
               });

            });
            $('.remecur').live('click',function(){
                var ecur_exist_var = $('.jecur_det').find('.jecur_sec:last').find('.jexist_ecur');
                if(ecur_exist_var.length)
                {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url();?>staff/delUserEcurrencies',
                        data: 'ecur_id='+ecur_exist_var.val(),
                        beforeSend : function(){
                        },
                        success: function(){
                        },
                        complete: function(){
                        }
                    });
                }
                $(this).closest('.jecur_sec').remove();
                //$('.jecur_det').find('.jecur_sec:last').remove();
                if($('.jecur_sec').length == 1)
                {
                    $('.remecur').hide();
                }
            });

            $('#chpwd').click(function(){
                $('#old_pwd').val('');
                $('#new_pwd').val('');
                $('#cnf_pwd').val('');
                $('.jmsg').html('');
                $.blockUI({ message: $('.jchpwd') });
            });

            $('.j_u_m').live('click',function(){
                $.unblockUI();
            });
        });
</script>
</div>
</body>
</html>


