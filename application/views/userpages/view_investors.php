<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>ForexRay - Trading History</title>
        <?php $this->load->view('common/userpages/head_links_new'); ?>
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/jquery-ui-1.10.3.custom/css/pepper-grinder/jquery-ui-1.10.3.custom.min.css" />

        <script type="text/javascript" src="<?php echo base_url(); ?>public/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
        
        <script type="text/javascript" src="<?= base_url() ?>misc/js/charts/highcharts.js"></script>
        <!--<script type="text/javascript" src="<?= base_url() ?>misc/js/charts/exporting.js"></script>-->
 </head>
    <body class="app">
           
        <div id="wrap">
            
            <?php $this->load->view('common/userpages/header_new'); ?>
            
            <div class="contentarea p_r">
                <div class="leftNav p_f tf_animation animation_setting fadeInLeft">
                    <?php $this->load->view('common/userpages/leftnav_new'); ?>
                </div>
                <div class="rightNav">
                    <div class="rightNav_head">View PAMM Investors</div>
                    <div class="rightNav_cnt">
                        
                        
                        <?php
                        $totalamount=0;
                        $others_amount=0;
                        $investorshare='';
                        for($i=0;$i<sizeof($my_investors);$i++)
                        {
                            $totalamount+=$my_investors[$i]->amount;
                            $amount[$i]=$my_investors[$i]->amount;
                            $firstname[$i]=$my_investors[$i]->firstname;
                            //echo sizeof($my_investors);
                            if($i<=4)
                            {
                                $data[$i]="['".$firstname[$i]."',".$amount[$i]."]";
                                $investorshare.=$data[$i].',';
                            }
                            if(sizeof($my_investors)>5 && $i>4)
                            {
                                $others_amount+=$my_investors[$i]->amount;


                            }

                        }
                        if(sizeof($my_investors)>5)
                        {
                        $investorshare.="['Others',".$others_amount."]";
                        }
                        ?>
                        <div id="container" style="width: 1302px; height: 400px; margin: 0 auto"></div><br/><br/>
                        <script>
                        $(function () {

                                // Radialize the colors
                                Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function(color) {
                                    return {
                                        radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
                                        stops: [
                                            [0, color],
                                            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                                        ]
                                    };
                                });

                                // Build the chart
                                $('#container').highcharts({
                                    chart: {
                                        plotBackgroundColor: null,
                                        plotBorderWidth: null,
                                        plotShadow: false            },
                                    title: {
                                        text: 'PAMM Investors Shares'
                                    },
                                    tooltip: {
                                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                    },
                                    plotOptions: {
                                        pie: {
                                            allowPointSelect: true,
                                            cursor: 'pointer',
                                            dataLabels: {
                                                enabled: true,
                                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                                style: {
                                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                                },
                                                connectorColor: 'silver'
                                            }
                                        }
                                    },
                                    series: [{
                                        type: 'pie',
                                        name: 'Investor share',
                                        data: [
                                            <?php echo $investorshare;?>
                                            //['Others',   0.7]
                                        ]
                                       
                                    }]
                                });
                            });

                         </script>

                        <div class="hdr1 f_b m_b_10">View PAMM Investors</div>

                        
                        <table id="table-to-grid" class="data m_t_10" cellspacing="1" cellpadding="3" border="0" width="100%" style="font-size:12px; font-family:Tahoma, Arial, Helvetica, sans-serif;">
                            <thead>
                            <tr align="right" style="background-color: #a0a0a0;">
                                <th align="left"><b>Id</b></th>
                                <th><b>Investor Name</b></th>
                                <th><b>Login</b></th>
                                <th><b>Deposit Amount</b></th>
                                <th><b>Date Added</b></th>
				<th><b>View History</b></th>
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
				<td><nobr><a href="<?php echo site_url('userpages/investor_history/'.base64_encode($row->uId));?>">View History</a><nobr></td>
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