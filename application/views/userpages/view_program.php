<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $this->config->item('project_name') ?> - PAMM Manager Account</title>
        <?php $this->load->view('common/userpages/head_links_new'); ?>
    </head>
    <body class="app pamm_man_update">
           
        <div id="wrap">
            
            <?php $this->load->view('common/userpages/header_new'); ?>
            
            <div class="contentarea p_r">
                <div class="leftNav p_f tf_animation animation_setting fadeInLeft">
                    <?php $this->load->view('common/userpages/leftnav_new'); ?>
                </div>
                <div class="rightNav">	
                    <div class="rightNav_head">My Wallet: <?php echo ($wallet!='')?$wallet:'0';?></div>
                    <div class="rightNav_cnt">
                       
                        <?php $this->load->view('common/userpages/notifications'); ?>
                        
                        <div class="hdr1 f_b m_b_10">View PAMM Programs</div>

                    
                        <div class="o_h sum_box r_f m_t_20">
                           
							
                                <div class="log_bankdet col_blk ">
                              
                                </div>
                                
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="trading_name">Trading Name</label></div>
                                    <div class="rgt_stflbl"><?php if(isset($trading_name) && $trading_name!=''){ echo $trading_name; } ?></div>
                                </div>
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="firstname">PAMM Manager Name</label></div>
                                    <div class="rgt_stflbl"><?php if(isset($firstname) && $firstname!=''){   echo ucfirst($firstname).' '.ucfirst($lastname);} ?></div>
                                </div>
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="acc_no">Acc. NO</label></div>
                                    <div class="rgt_stflbl"><?php if(isset($login) && $login!=''){ echo $login; } ?></div>
                                </div>
                               <!-- <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="email">Email Id</label></div>
                                    <div class="rgt_stflbl"><?php if(isset($email) && $email!=''){ echo $email; } ?></div>
                                </div>-->
                                <div class="m_t_10 clearfix">
                                    <div class="lft_stflbl"><label for="minimum_deposit">Minimum Deposit </label></div>
                                    <div class="rgt_stflbl"><?php echo $minimum_deposit;?> USD 
                                    </div>
                                </div>

                                <div class="m_t_10 clearfix">
                                        <div class="lft_stflbl"><label for="success_fee">Success Fee</label></div>
                                        <div class="rgt_stflbl">
                                        <?php echo $success_fee;?>%
                                        </div>
                                </div>

                                <div class="m_t_10 clearfix">
                                        <div class="lft_stflbl"><label for="penalty_fee">Penalty Fee </label></div>
                                        <div class="rgt_stflbl">
                                        <?php echo $penalty_fee; ?>%of Deposited Capital
                                        </div>
                                </div>

                                <div class="m_t_10 clearfix">
                                        <div class="lft_stflbl"><label for="trading_period">Trading Period</label></div>
                                        <div class="rgt_stflbl">
                                        <?php echo $trading_period;?>
                                        </div>
                                </div>
                                <?php echo formtoken::getField(); ?>
                            
                                          </div>
                        
                         <div class="hdr1 f_b m_b_10">General Info</div>
                        
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
                    if($values[12]=='1' || $values[12]=='0')
                    {
                         $profit_loss+=($values[5])+($values[15]);
                    }
                    if($values[12]=='6' && $values[5]>0)
                    {
                        $deposit=$deposit+$values[5];
                    }//print_r($values);
                }
                $profit_loss=$profit_loss;
                $profit = $deposit + $profit_loss + $withdrawal;

                ?>
                                
                           <div class="o_h sum_box r_f m_t_10">
                            <div class="f_l box">
                                <div class="lft_fld">Profit/Loss:</div>
                                <div class="rgt_fld"><?=$profit_loss ?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Balance:</div>
                                <div class="rgt_fld">  <?php echo $balance;?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Equity:</div>
                                <div class="rgt_fld">  <?php echo $equity;?></div>
                            </div>
                            <div class="f_l box">
                                <div class="lft_fld">Free Margin:</div>
                                <div class="rgt_fld">  <?php echo $free_margin;?></div>
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
           
                        
                       
                        
                        <div class="hdr1 f_b m_b_10">PAMM Manager Trading History</div>
                        
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
                    <div id="container" style="width: 1302px; height: 400px;"></div>
                    <!--<div id="container" style="width: 700px; height: 400px; margin: 0 auto"></div>-->
                    <script>
                    $(function () {
					
					 $('#tc').click(function(){
					 $('#tctc').toggle('slow');
					 })
					 $('#join_pamm').click(function(){
						 if($('#terms:checked').length==0)
						 {
							 alert('Please Agree Terms and Conditions ');
							 return false;
						 }
					 })
					
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
                                    //valueSuffix: '�C'
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
                                                <td> <?php if(!empty($values[7])) {  echo date('M j,Y g:i A',$values[7]);} ?></td>
                                                <td><?=$type ?></td>
                                                <td align="left" colspan="8"><nobr><?= $values[9] ?><nobr></td>
                                                <td><nobr><?= $values[5] ?><nobr></td>
                                            </tr>
                                            <?php
                                        } else {
                                                ?>
                                                <tr align="right" bgcolor="<?= ($cnt % 2 ? '#e0e0e0' : '#ffffff') ?>">
                                                    <td align="left"><?= $values[1] ?></td>
                                                    <td><?php if(!empty($values[7])) { echo date('M j,Y g:i A',$values[7]); } ?></td>
                                                    <td><?= $type ?></td>
                                                    <td><nobr><?php if(!empty($values[6])){ echo($values[6]*0.01);} ?></nobr></td>
                                                    <td><?= strtolower($values[2]) ?></td>
                                                    <td><nobr><?= $values[3] ?><nobr></td>
                                                    <td><nobr><?= $values[13] ?><nobr></td>
                                                    <td><nobr><?= $values[14] ?><nobr></td>
                                                    <td><nobr><?php if(!empty($values[7])) { echo date('M j,Y g:i A',$values[8]); }?><nobr></td>
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
                        <?php // echo '<pre>'; print_r($info); echo '</pre>'; ?>
             <?php if($is_relation<=0){?>
			                   <p style='padding-top: 15px;'> <input type="checkbox" name='terms' id='terms' value='1'> I agree to the <?php echo $this->config->item('project_name') ?> PAMM Program 
							    <a id='tc' class='m_t_20'>Terms and Conditions</a>
								</p>
								<div id='tctc' style='padding: 5px; border: 1px solid white; margin-top: 17px; display: none;'>
								<p><b>NOTICE OF RISK</b></p>

								<p>
								<?php echo $this->config->item('project_name') ?> does not guarantee profit to any of its Managed account investors and warns them that no positive record of trading strategy implementation ensures the repeat of trading success in future.
                                </p>  

								<p><?php echo $this->config->item('project_name') ?> is not responsible for Manager's and Investors' actions providing "Managed account" service. Any positive or negative consequences of Management have a direct effect solely upon Manager and Investor and are a result of Manager's activity.


Manager conducts trading activity solely on his own behalf and at his own responsibility.
</p>
<p>
<?php echo $this->config->item('project_name') ?> does not assess Manager's competence, his business or ethical merits and bears no responsibility for the possible loss or missed profit caused by those before Investor at any stage of manager�s activity.
</p>								</div>
                                <a class="button yellow m_t_20 cur_def j_general_submit" id='join_pamm' href="<?php echo site_url('userpages/join_pamm/'.$id);?>" >Join Under PAMM Program</a>
                                <?php }?>

                        
                    </div>
                </div>
            </div> 
            
            <?php $this->load->view('common/userpages/footer_new'); ?>
              
        </div>    
        
    </body>
</html>