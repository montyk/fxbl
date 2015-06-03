<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ForexRay - Trading History</title>
        <?php $this->load->view('common/userpages/head_links_new'); ?>
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/jquery-ui-1.10.3.custom/css/pepper-grinder/jquery-ui-1.10.3.custom.min.css" />

        <script type="text/javascript" src="<?php echo base_url(); ?>public/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript">
            $(function(){
                $('input.from_dp').datepicker({
                    beforeShow: function(input) {	
                        return {maxDate: ($(input).hasClass('from_dp') ? $(input).parents('.form_box:first').find('.to_dp').datepicker("getDate") : null),minDate:null};	
                    },
                    dateFormat:'yy-mm-dd'
                });
                $('input.to_dp').datepicker({
                    beforeShow: function(input) {
                        return {minDate: ($(input).hasClass('to_dp') ? $(input).parents('.form_box:first').find('.from_dp').datepicker("getDate") : null)};
                    },
                    dateFormat:'yy-mm-dd'
                });
            })
        </script>
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
                    <div class="rightNav_head">Trading History</div>
                    <div class="rightNav_cnt">
                       
                        <div class="hdr1 f_b m_b_10">Trading History</div>

                        <form action="<?php echo site_url('userpages/deposits_withdrawls'); ?>" method="post" class="j_general_validate">
                        <div class="o_h sum_box fund_date r_f m_t_20 form_box">
                            <ul>
                                <li><div class="lbl">Date from:</div></li>
                                <li><input type="text" class="ip r_f from_dp required" name="from" value="<?php echo $this->input->post('from'); ?>" title="Please select a from date." /></li>
                                <li><div class="lbl">To:</div></li>
                                <li><input type="text" class="ip r_f to_dp required" name="to" value="<?php echo $this->input->post('to'); ?>" title="Please select a to date" /></li>
                                <li class="butadj"><a class="button yellow cur_def j_general_submit">Generate Report</a></li>
                            </ul>
                        </div>
                        </form>
                        
                        <table id="table-to-grid" class="data m_t_10" cellspacing="1" cellpadding="3" border="0" width="100%" style="font-size:12px; font-family:Tahoma, Arial, Helvetica, sans-serif;">
                            <thead>
                            <tr align="right" style="background-color: #a0a0a0;">
                                <th align="left"><b>Order</b></th>
                                <th><b>Time</b></th>
                                <th><b>Type</b></th>
                                <th><b>Transfer Mode</b></th>
                                <th><b>Amount</b></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $beginIndex = 3;
                                $size = sizeof($info);
                                $cnt = 0;
                                $recordsExists=FALSE;
                                $totalAmount=0;
                                for ($i = $beginIndex; $i < $size; $i++) {
                                    if ($info[$i] === '0'){
                                        break;
                                    }
                                    
                                    $row = explode("\t", $info[$i]);
                                    if (strpos($row[2], 'balance') !== false) { 
                                        $recordsExists=TRUE;
                                        $totalAmount+=$row[12];
                                        ?>
                                        <tr align="right" bgcolor="<?= ($cnt % 2 ? '#e0e0e0' : '#ffffff') ?>">
                                            <td align="left"><?= $row[0] ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td><?= $row[2] ?></td>
                                            <td align="left"><nobr><?= $row[13] ?><nobr></td>
                                            <td><nobr><?= $row[12] ?><nobr></td>
                                        </tr>
                                        <?php
                                    }
                                    ++$cnt;
                                }
                                $profit_loss = $this->mql_model->MQ_GetParam($info[$i + 6]);
                                $deposit = $this->mql_model->MQ_GetParam($info[$i + 1]);
                                $credit = $this->mql_model->MQ_GetParam($info[$i + 3]);
                                $withdrawal = $this->mql_model->MQ_GetParam($info[$i + 2]);
                                $profit = $deposit + $profit_loss;
                                ?>
                                
                                <?php if (!$recordsExists){ ?>
                                <tr>
                                    <td valign="top" colspan="12" class="dataTables_empty"><div class="grid-msg">No Results</div></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php // echo '<pre>'; print_r($info); echo '</pre>'; ?>
                        <div class="o_h sum_box r_f m_t_10 hide">
                            <div class="f_l box">
                                <div class="lft_fld">Total Amount:</div>
                                <div class="rgt_fld"><?=$totalAmount ?></div>
                            </div>
                        </div>
                        
                        <div class="o_h sum_box r_f m_t_10 hide">
                            <div class="f_l box">
                                <div class="lft_fld">Profit/Loss:</div>
                                <div class="rgt_fld"><?=$profit_loss ?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Credit:</div>
                                <div class="rgt_fld"><?=$credit ?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Deposit:</div>
                                <div class="rgt_fld"><?=$deposit ?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Withdrawal:</div>
                                <div class="rgt_fld"><?=$withdrawal ?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Profit:</div>
                                <div class="rgt_fld"><?=$profit ?></div>
                            </div>
                        </div>
                        
                        
                        <!--
                        <div class="hdr1 f_b m_b_10 m_t_40">Pending Orders</div>


                        <table class="data m_t_10">
                            <thead>
                                <tr>
                                    <th>Order#</th>
                                    <th>Time</th>
                                    <th>Type</th>
                                    <th>Symbol</th>
                                    <th>Lots</th>
                                    <th>Price</th>
                                    <th>SL</th>
                                    <th>TP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                   <td valign="top" colspan="8" class="dataTables_empty"><div class="grid-msg">No Results</div></td>
                                </tr>
                            </tbody>
                        </table>
                        -->

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