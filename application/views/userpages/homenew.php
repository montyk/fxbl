<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ForexRay Home</title>
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
                    <div class="rightNav_head">Home</div>
                    <div class="rightNav_cnt">
                         <?php $this->load->view('common/userpages/notifications'); ?>
                         <div class="hdr1 f_b m_b_10">Account Verification</div>
                         <?php $fx_user_details = unserialize($this->session->userdata['fx_user_details']); ?>
                         <?php // echo '<pre>'; print_r($fx_user_details); echo '</pre>'; ?>
                         <div class="m_b_10 reset_alert">
                            <?php if(isset($fx_user_details->account_verification) && $fx_user_details->account_verification=='1'){ ?>
                            <div class="alert_success">Your Account is validated</div>
                            <?php }else if(!empty($fx_user_details->pi_attachments_id) || !empty($fx_user_details->pr_attachments_id)){ ?>
                            <div class="alert_info">Your documents are being validated by admin.</div>
                            <?php } else { ?>
                            <div class="alert_error">Your Account is not validated, Please <a href="<?php echo base_url(); ?>userpages/validation_documents">Click Here</a> to upload your documents.</div>
                            <?php } ?>
                         </div>
                        
                         <div class="hdr1 f_b m_b_10">Account Summary (USD)</div>
                         <div class="o_h sum_box r_f">
                            <div class="f_l box">
                                <div class="lft_fld">Account Balance</div>
                                <div class="rgt_fld"><?php if(!empty($balance)) echo $balance; else echo '0.00'; ?></div>
                            </div>
                           <!-- <div class="f_l box">
                                <div class="lft_fld">Margin</div>
                                <div class="rgt_fld"><?php if(!empty($margin)) echo $margin; else echo '0.00';  ?></div>
                            </div>-->
                           <div class="f_l box">
                                <div class="lft_fld">Profit/Loss</div>
                                <div class="rgt_fld"><?php if(!empty($profit_loss)) echo $profit_loss; else echo '0.00';  ?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Equity</div>
                                <div class="rgt_fld"><?php if(!empty($equity)) echo $equity; else echo '0.00';  ?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Free Margin</div>
                                <div class="rgt_fld"><?php if(!empty($free_margin)) echo $free_margin; else echo '0.00';  ?></div>
                            </div>
                           <!--<div class="f_l box">
                                <div class="lft_fld">Profit</div>
                                <div class="rgt_fld"><?php //if(!empty($profit)) echo $profit; else echo '0.00';  ?></div>
                            </div>-->

                         </div>
                        <div class="hdr1 f_b m_b_10"></div><div class="hdr1 f_b m_b_10"></div>
                        <div class="hdr1 f_b m_b_10">Trading Summary</div>
                        <?php 
                            if($xaxissize>30)
                            {
                                $sizeoff=$xaxissize/25;
                            }
                            else if($xaxissize>30 && $xaxissize<60)
                            {
                                $sizeoff=2;
                            }
                            else
                                $sizeoff=1;
                            $xcat='';
                            for($i=0;$i<$xaxissize;$i+=round($sizeoff))
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
                    <div id="container" style="width: 1320px; height: 400px;"></div>
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
                         
                         
                         <!--
                         
                         <div class="hdr2 f_b m_t_40 m_b_10">OPEN POSITIONS</div>

                         <table class="data">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Symbol</th>
                                    <th>Lots</th>
                                    <th>Open Price</th>
                                    <th>SL</th>
                                    <th>TP</th>
                                    <th>P/L</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Type</td>
                                    <td>Symbol</td>
                                    <td>Lots</td>
                                    <td>Open Price</td>
                                    <td>SL</td>
                                    <td>TP</td>
                                    <td>P/L</td>
                                </tr>
                               
                            </tbody>
                        </table>

                        <div class="hdr2 f_b m_b_10 m_t_40">PENDING ORDERS</div>

                        <table class="data">
                            <thead>
                                <tr>
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
                                   <td valign="top" colspan="7" class="dataTables_empty"><div class="grid-msg">No Pending Orders</div></td>
                                </tr>
                            </tbody>
                        </table>
                        
                        
                        -->
                    </div>
                </div>
            </div> 
            
            
            <?php $this->load->view('common/userpages/footer_new'); ?>
            
        </div>    
        
    </body>
</html>