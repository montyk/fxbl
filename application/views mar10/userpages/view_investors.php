<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ForexRay - Trading History</title>
        <?php $this->load->view('common/userpages/head_links_new'); ?>
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/jquery-ui-1.10.3.custom/css/pepper-grinder/jquery-ui-1.10.3.custom.min.css" />

        <script type="text/javascript" src="<?php echo base_url(); ?>public/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
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
                    <div class="rightNav_head">View PAMM Investors</div>
                    <div class="rightNav_cnt">
                       
                        <div class="hdr1 f_b m_b_10">View PAMM Investors</div>

                        
                        <table id="table-to-grid" class="data m_t_10" cellspacing="1" cellpadding="3" border="0" width="100%" style="font-size:12px; font-family:Tahoma, Arial, Helvetica, sans-serif;">
                            <thead>
                            <tr align="right" style="background-color: #a0a0a0;">
                                <th align="left"><b>Id</b></th>
                                <th><b>Investor Name</b></th>
                                <th><b>Login</b></th>
                                <th><b>Deposit Amount</b></th>
                                <th><b>Date Added</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach($result as $k=>$row)
                                {
                             ?>
                                <tr>
                                <td><nobr><?= $row->prId ?><nobr></td>
                                <td><nobr><?= $row->firstname ?><nobr></td>
                                <td><nobr><?= $row->login ?><nobr></td>
                                <td><nobr><?= $row->amount ?><nobr></td>
                                <td><nobr><?= $row->date_added ?><nobr></td>
                                </tr>
                            <?php
                                }
                                if (count($result) == 0){ ?>
                                <tr>
                                    <td valign="top" colspan="5" class="dataTables_empty"><div class="grid-msg">No Results</div></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    

                    </div>
                </div>
            </div> 
            
            <?php $this->load->view('common/userpages/footer_new'); ?>
              
        </div>    
        <style type="text/css" rel="stylesheet">
            .app .sum_box .box {
                width: 200px;
            }
        </style>
    </body>
</html>