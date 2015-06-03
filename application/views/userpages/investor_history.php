<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ForexRay - Investor History</title>
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
           
        <div id="wrap">
            
            <?php $this->load->view('common/userpages/header_new'); ?>
            
            <div class="contentarea p_r">
                <div class="leftNav p_f tf_animation animation_setting fadeInLeft">
                    <?php $this->load->view('common/userpages/leftnav_new'); ?>
                </div>
                <div class="rightNav">
                    <div class="rightNav_head"><?php //echo $name=($firstname!='')?$firstname:'Investor';?> Trading History</div>
                    <div class="rightNav_cnt">
                       
                        <div class="hdr1 f_b m_b_10"><?php echo $name=($firstname!='')?$firstname:'Investor';?> Trading History&nbsp;&nbsp;&nbsp;<a class="button yellow cur_def j_general_submit" href="<?php echo site_url('userpages/view_investors');?>">Back</a></div>
						
                        
                          <?php if(isset($message) && $message!=''){
                                if($msg=='1')
                                $class='up_alert_error alert_success';
                                else
                                $class='up_alert_error alert_error';
                                }
                            else
                            $class='';
                          ?>
                          <?php 
                          $time=mktime(23,59,59,date('n'),date('j'),date('Y'));
                          $time2=$time-2592000;
                          $from=($this->input->post('from')=='')?gmdate("Y-m-d", $time2):$this->input->post('from');
                          $to=($this->input->post('to')=='')?gmdate("Y-m-d", $time):$this->input->post('to');
                          ?>
                        <div class="<?php echo $class;?>"><?php echo $message;?></div>
                        <form action="<?php echo site_url('userpages/investor_history/'.$investorid); ?>" method="post" class="j_general_validate">
                        <div class="o_h sum_box fund_date r_f m_t_20 form_box">
                            <ul>
                                <li><div class="lbl">Date from:</div></li>
                                <li><input type="text" class="ip r_f from_dp required" name="from" value="<?php echo $from; ?>" title="Please select a from date." /></li>
                                <li><div class="lbl">To:</div></li>
                                <li><input type="text" class="ip r_f to_dp required" name="to" value="<?php echo $to; ?>" title="Please select a to date" /></li>
                                <li class="butadj"><a class="button yellow cur_def j_general_submit">Generate Report</a></li>
                            </ul>
                        </div>
                        </form>
                        <?php 
                            if($size>30)
                            {
                                $sizeoff=$size/25;
                            }
                            else if($size>30 && $size<60)
                            {
                                $sizeoff=2;
                            }
                            else
                                $sizeoff=1;
                            $xcat='';
                            for($i=0;$i<$size;$i+=round($sizeoff))
                            {
                                if($xcat!='')
                                {
                                    $xcat=$xcat.',';
                                }
                                $xcat.=$i;
                            }
                            //echo $xcat;

                            //print_r($bal);
                            $ycat='';
                            $balsize=sizeof($bal);
                            for($i=0;$i<=$balsize;$i+=round($sizeoff))
                            {
                                if($ycat!='')
                                {
                                    $ycat=$ycat.',';
                                }
                                $ycat.=$bal[$balsize-$i];
                            }

                        ?>
                        
                    <script type="text/javascript" src="<?= base_url() ?>misc/js/charts/highcharts.js"></script>
                    <!--<script type="text/javascript" src="<?= base_url() ?>misc/js/charts/exporting.js"></script>-->
                    <div class="hdr1 f_b m_b_10"></div><div class="hdr1 f_b m_b_10"></div>
                    <div id="container" style="width: 1302px; height: 400px;"></div>
                    <!--<div id="container" style="width: 700px; height: 400px; margin: 0 auto"></div>-->
                    <script>
                    $(function () {
                            $('#container').highcharts({
                                title: {
                                    text: '',
                                    //text: 'Monthly Average Temperature',
                                    x: -20 //center
                                },
                                subtitle: {
                                    text: '',
                                    //text: 'Source: WorldClimate.com',
                                    x: -20
                                },
                                xAxis: {
                                    categories: [<?php echo $xcat;?>]
                                },
                                yAxis: {
                                    title: {
                                        text: 'Balance'
                                    },
                                    plotLines: [{
                                        value: 0,
                                        width: 1,
                                        color: '#808080'
                                    }]
                                },
                                tooltip: {
                                    valueSuffix: ''
                                    //valueSuffix: '°C'
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'middle',
                                    borderWidth: 0
                                },
                                series: [{
                                    name: '',
                                    //data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                                    data: [<?php echo $ycat;?>]

                                }]
                            });
                        });
                        </script>


                        <table id="table-to-grid" class="data m_t_10" cellspacing="1" cellpadding="3" border="0" width="100%" style="font-size:12px; font-family:Tahoma, Arial, Helvetica, sans-serif;">
                            <thead>
                            <tr align="right" style="background-color: #a0a0a0;">
                                <th align="left"><b>Order</b></th>
                                <th><b>Time</b></th>
                                <th><b>Type</b></th>
                                <th><b>Lots</b></th>
                                <th><b>Symbol</b></th>
                                <th><b>Price</b></th>
                                <th><b>S/L</b></th>
                                <th><b>T/P</b></th>
                                <th><b>Time</b></th>
                                <th><b>Price</b></th>
                                <th><b>Swap</b></th>
                                <th><b>Profit</b></th>
                            </tr>
                            </thead>
                            <tbody>
                                    <?php 
                                    $size = sizeof($answerData2['csv']);
                                      for($i = 0; $i < $size; $i++)
                                        {
                                            //echo $answerData2['csv'][$i];echo '<br/>';
                                            $values = explode(";", $answerData2['csv'][$i]);
                                            if($values[12]=='6')
                                              $type='Balance';
                                            else if($values[12]=='0')
                                                $type='Buy';
                                            else if($values[12]=='1')
                                                $type='Sell';

                                            //print_r($values);
                                        if($values[12]=='6')
                                        {
                                         
                                    ?>
                                            <tr align="right" bgcolor="<?= ($cnt % 2 ? '#e0e0e0' : '#ffffff') ?>">
                                                <td align="left"><?= $values[1] ?></td>
                                                <td><?= date('M j,Y g:i A',$values[7]) ?></td>
                                                <td><?=$type ?></td>
                                                <td align="left" colspan="8"><nobr><?= $values[9] ?><nobr></td>
                                                <td><nobr><?= $values[5] ?><nobr></td>
                                            </tr>
                                            <?php
                                        } else {
                                                ?>
                                                <tr align="right" bgcolor="<?= ($cnt % 2 ? '#e0e0e0' : '#ffffff') ?>">
                                                    <td align="left"><?= $values[1] ?></td>
                                                    <td><?= date('M j,Y g:i A',$values[7]) ?></td>
                                                    <td><?= $type ?></td>
                                                    <td><nobr><?= ($values[6]*0.01) ?></nobr></td>
                                                    <td><?= strtolower($values[2]) ?></td>
                                                    <td><nobr><?= $values[3] ?><nobr></td>
                                                    <td><nobr><?= $values[13] ?><nobr></td>
                                                    <td><nobr><?= $values[14] ?><nobr></td>
                                                    <td><nobr><?= date('M j,Y g:i A',$values[8]) ?><nobr></td>
                                                    <td><nobr><?= $values[4] ?><nobr></td>
                                                    <td><nobr><?= $values[15] ?><nobr></td>
                                                    <td><nobr><?= $values[5] ?><nobr></td>
                                                </tr>
                                            <?php
                                        }
                                        ++$cnt;
                                    }
                                  
                                    ?>
                                    
                                    <?php if ($size == '0'){ ?>
                                    <tr>
                                        <td valign="top" colspan="12" class="dataTables_empty"><div class="grid-msg">No Results</div></td>
                                    </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
                                       <?php 
         
                $size = sizeof($answerData2['csv']);
                $profit_loss=0;
                $deposit=0;
                $credit=0;
                $withdrawal=0;
                
                for($i = 0; $i < $size; $i++)
                {
                    //echo $answerData2['csv'][$i];echo '<br/>';
                    $values = explode(";", $answerData2['csv'][$i]);
                    $credit+=$values[10];
                    $withdrawal+=$values[11];
                    if($values[12]=='6' && $values[5]<0)
                    {
                        $withdrawal+=$values[5];
                    }
                    if($values[12]=='6' && $values[5]>0)
                    {
                        $deposit=$deposit+$values[5];
                    }
                    //print_r($values);
                    if($values[12]=='1' || $values[12]=='0')
                    {
                            $profit_loss=$profit_loss+($values[5])+($values[15]);//echo '<br/>';
                    }}
                $profit_loss=$profit_loss;
                $profit = $deposit + $profit_loss + $withdrawal;

                ?>
			<div class="hdr1 f_b m_b_10"></div><div class="hdr1 f_b m_b_10">Trading History from <?php echo date('F j,Y',strtotime(str_replace('.','-',$from)));?> to <?php echo date('F j,Y',strtotime(str_replace('.','-',$to)));?></div>
                        <div class="o_h sum_box r_f m_t_10">
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