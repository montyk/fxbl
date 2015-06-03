<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ForexRay - Open Positions</title>
        <?php $this->load->view('common/userpages/head_links_new'); ?>
    </head>
    <body class="app">
           
        <div id="wrap">
            
            <?php $this->load->view('common/userpages/header_new'); ?>
            
            <div class="contentarea p_r">
                <div class="leftNav p_f tf_animation animation_setting fadeInLeft">
                    <?php $this->load->view('common/userpages/leftnav_new'); ?>
                </div>
                <div class="rightNav">
                    <div class="rightNav_head">Open Positions</div>
                    <div class="rightNav_cnt">
                       
                        <div class="hdr1 f_b m_b_10">Open Positions</div>
                        
                        <table class="data m_t_40 datagrid ">
                            <thead>
                               <tr role="row">
                                    <th rowspan="2" style="width: 70px;" colspan="1">Order</th>
                                    <th rowspan="2" style="width: 110px;" colspan="1">Time</th>
                                    <th rowspan="2" style="width: 70px;" colspan="1">Type</th>
                                    <th rowspan="2" style="width: 70px;" colspan="1">Lots</th>
                                    <th rowspan="2" colspan="1" style="width: 70px;">Symbol</th>
                                    <th rowspan="2" colspan="1" style="width: 70px;">Price</th>
                                    <th rowspan="2" style="width: 70px;" colspan="1">S/L</th>
                                    <th rowspan="2" style="width: 70px;" colspan="1">T/P</th>
                                    <th rowspan="2" style="width: 70px;" colspan="1">Price</th>
                                    <th rowspan="2" style="width: 70px;" colspan="1">Commisions</th>
                                    <th rowspan="2" style="width: 70px;" colspan="1">Swaps</th>
                                    <th rowspan="2" style="width: 70px;" colspan="1">Profit</th>
                               </tr>
                                
                            </thead>
                            <tbody>
                                
                            <?php
                                // echo '<pre>'; print_r($info); echo '</pre>';
                                $size = sizeof($info);
                                $beginIndex = 3;

                                if(isset($info[$beginIndex]))
                                    $balance = $this->mql_model->MQ_GetParam($info[$beginIndex]);
                                if (isset($info[$beginIndex + 1]))
                                    $equity = $this->mql_model->MQ_GetParam($info[$beginIndex + 1]);
                                if (isset($info[$beginIndex + 2]))
                                    $margin = $this->mql_model->MQ_GetParam($info[$beginIndex + 2]);
                                if (isset($info[$beginIndex + 3]))
                                    $free_margin = $this->mql_model->MQ_GetParam($info[$beginIndex + 3]);
                                
                                $margin_level = $margin != 0 ? number_format(100 * ($equity / $margin), 2, '.', '') . '%' : '0%';

                                $cnt = 0;
                                if(!empty($info[$beginIndex]) && ($beginIndex + 4)<$size){
                                    for ($i = $beginIndex + 4; $i < $size; $i++) {
                                        if ($info[$i] === '0')
                                        break;
                                        $row = explode("\t", $info[$i]);
                                    ?>
                                    <tr align="right" bgcolor="<?= ($cnt % 2 ? '#e0e0e0' : '#ffffff') ?>">
                                        <td align="left"><?php if(!empty($row[0])) echo $row[0] ?></td>
                                        <td><?php if(!empty($row[1])) echo date('M j,Y g:i A',strtotime(str_replace('.','-',$row[1]))); ?></td>
                                        <td><?php if(!empty($row[2])) echo ucfirst($row[2]) ?></td>
                                        <td><nobr><?php if(!empty($row[3])) echo $row[3] ?></nobr></td>
                                        <td><?php if(!empty($row[4])) echo strtolower($row[4]) ?></td>
                                        <td><nobr><?php if(!empty($row[5])) echo $row[5] ?><nobr></td>
                                        <td><nobr><?php if(!empty($row[6])) echo $row[6] ?><nobr></td>
                                        <td><nobr><?php if(!empty($row[7])) echo $row[7] ?><nobr></td>
                                        <td><nobr><?php if(!empty($row[8])) echo $row[8] ?><nobr></td>
                                        <td><nobr><?php if(!empty($row[9])) echo $row[9] ?><nobr></td>
                                        <td><nobr><?php if(!empty($row[10])) echo $row[10] ?><nobr></td>
                                        <td><nobr><?php if(!empty($row[11])) echo $row[11] ?><nobr></td>
                                    </tr>
                                    <?php
                                        ++$cnt;
                                    }
                                    if(isset($info[$i + 3]) && isset($info[$i + 1]) && $info[$i + 2])
                                    $profit = $this->mql_model->MQ_GetParam($info[$i + 3]) + $this->mql_model->MQ_GetParam($info[$i + 1]) + $this->mql_model->MQ_GetParam($info[$i + 2]);
                                }else{
                                
                            ?>
                                
                                <tr>
                                   <td valign="top" colspan="13" class="dataTables_empty"><div class="grid-msg">No Results</div></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        
                        <div class="o_h sum_box r_f m_t_10">
                            <div class="f_l box">
                                <div class="lft_fld">Balance:</div>
                                <div class="rgt_fld"><?=$balance ?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Equity:</div>
                                <div class="rgt_fld"><?=$equity ?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Margin:</div>
                                <div class="rgt_fld"><?=$margin ?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Free margin:</div>
                                <div class="rgt_fld"><?=$free_margin ?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Margin level:</div>
                                <div class="rgt_fld"><?=$margin_level ?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Floating PL:</div>
                                <div class="rgt_fld"><?=$profit ?></div>
                            </div>
                        </div>
                        
                        <!--
                        <table class="data m_t_40 datagrid ">
                            <thead>
                               <tr role="row">
                                    <th rowspan="2" style="width: 56px;" colspan="1">Order</th>
                                    <th rowspan="2" style="width: 48px;" colspan="1">Type</th>
                                    <th rowspan="2" colspan="1" style="width: 70px;">Symbol</th>
                                    <th rowspan="2" style="width: 45px;" colspan="1">Lots</th>
                                    <th colspan="2" rowspan="1">Opening</th>
                                    <th rowspan="2" style="width: 30px;" colspan="1">TP</th>
                                    <th rowspan="2" style="width: 30px;" colspan="1">SL</th>
                                    <th colspan="2" rowspan="1">Closing</th>
                                    <th rowspan="2" style="width: 115px;" colspan="1">Commisions</th>
                                    <th rowspan="2" style="width: 66px;" colspan="1">Swaps</th>
                                    <th rowspan="2" style="width: 35px;" colspan="1">P/L</th>
                               </tr>
                                <tr role="row">
                                    <th style="width: 49px;" colspan="1">Time</th>
                                    <th style="width: 52px;" rowspan="1" colspan="1">Price</th>
                                    <th style="width: 49px;" rowspan="1" colspan="1">Time</th>
                                    <th style="width: 52px;" rowspan="1" colspan="1">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                   <td valign="top" colspan="13" class="dataTables_empty"><div class="grid-msg">No Results</div></td>
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
                width: 170px;
            }
        </style>
    </body>
</html>