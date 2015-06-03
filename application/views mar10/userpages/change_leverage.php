<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ForexRay - Change Leverage</title>
        <?php $this->load->view('common/userpages/head_links_new'); ?>
    </head>
    <body class="app">
         <?php $this->load->view('common/analyticstracking');?>  
        <div id="wrap">
            
            <?php $this->load->view('common/userpages/header_new'); ?>
            
            <div class="contentarea p_r">
                <div class="leftNav p_f tf_animation animation_setting fadeInLeft">
                    <?php $this->load->view('common/userpages/leftnav_new'); ?>
                </div>
                <div class="rightNav">
                    <div class="rightNav_head">Change Leverage</div>
                    <div class="rightNav_cnt">
                       
                        <div class="hdr1 f_b m_b_10">Change Leverage</div>


                        <div class="o_h sum_box r_f m_t_20">
                            <?php $fx_user_details = unserialize($this->session->userdata['fx_user_details']); ?>
                            <div class="m_t_10">
                                <select name="department_id" class="sl_bx r_f required" title="Please select a Department">
                                    <?php if(!empty($fx_user_details->leverage_id)){ $leverage_id= $fx_user_details->leverage_id; }else{ $leverage_id=0;  } ?>
                                    <?php echo selectBox('Select Leverage', 'leverage', 'id,name', ' status=1 ', $leverage_id, ''); ?>
                                </select>
                            </div>

                            <a class="button yellow m_t_20 cur_def">Submit</a>

                        </div>


                    </div>
                </div>
            </div> 
            
            <?php $this->load->view('common/userpages/footer_new'); ?>
              
        </div>    
        
    </body>
</html>