
<?php
    $data['active_link'] = "active";
    $data['active'] = "7";
    
    $url_1 = $this->uri->segment(1);
    $url_2 = $this->uri->segment(2);
    $url_3 = $this->uri->segment(3); 
?>

<?php $this->load->view('common/header', $data);?>

<div class="outside form_modify">
<!--	PAGE content -->
            <div class="contents pg_width">
                <div class="overlay_bg rel">
                    <div class="fore_ca">
                        <div class="fore_content">
                            <div class="content_wrap fl">
                                <h1 class="h_1">PAMM Managers</h1>
							
                                <?php $this->load->view('common/notifications'); ?>
                                
                                <div class="pg_data">
                                    <ul class="bread_crum" id="breadcrumbs-one">
                                        <li><a href="<?php echo site_url('/'); ?>">Forexray </a></li>
                                        <li><a class="current">View PAMM Managers</a></li>
                                    </ul>
                                    <div class="pg_data_view">
                                        
                                            <div class="post  pad10 newsbox" style="">
                                                <div class="story bootstrap-scope">
                                                    
                                                    <div class="registration_wrapper tab_wrapper tabbable tabs-top" style="color:#333333;background-color:#ffffff;">
                                                        <?php 
                                                            $formToken=formtoken::getField();
                                                            $form_data=array(); 
                                                            if ($this->session->flashdata('reg_form_data')){
                                                                $form_data=$this->session->flashdata('reg_form_data');
                                                            }
                                                        ?>
                                                        <div class="">
                                                            <div class="tab-pane active box_c new_mng_offer" id="Real_Acc_Tab">
                                                                <div class="box_c_heading"><?php echo $trading_name;?></div>
                                                                <div style="">
                                                                    <div class="box_c_content clearfix">
                                                                        <div class="fl first">
                                                                            <img src="<?php echo site_url('/misc/css/images/user.png'); ?>" />

                                                                            <div class="dyn_but">
                                                                                   <a class="button yellow" href="http://162.243.98.129/frx/userpages/join_pamm/<?php echo $pammId;?>">Invest Under <span><?php echo $trading_name;?></span></a>
                                                                                    
                                                                                </div>
                                                                        </div>
                                                                        <div class="fl last">
                                                                            <form id="registration_form" class="form-horizontal" method="post" action="<?php echo site_url('registration'); ?>">
                                                                                <input type='hidden' name='id' id='id' value=''/> 
                                                                            
                                                                                <div class="control-group">
                                                                                    <label class="control-label" for="firstname"><b>Account Name:</b></label>
                                                                                    <div class="controls"><label class="control-label" for="firstname">
                                                                                       <?php echo $trading_name;?></label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="control-group">
                                                                                    <label class="control-label" for="firstname"><b>Success Fee:</b></label>
                                                                                    <div class="controls"><label class="control-label" for="firstname">
                                                                                       <?php echo $success_fee;?>%</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="control-group">
                                                                                    <label class="control-label" for="firstname"><b>Account Currency:</b></label>
                                                                                    <div class="controls"><label class="control-label" for="firstname">
                                                                                       USD</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="control-group">
                                                                                    <label class="control-label" for="firstname"><b>Min.Amount Deposit:</b></label>
                                                                                    <div class="controls"><label class="control-label" for="firstname">
                                                                                       <?php echo $minimum_deposit;?></label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="control-group">
                                                                                    <label class="control-label" for="firstname"><b>Trading Period:</b></label>
                                                                                    <div class="controls"><label class="control-label" for="firstname">
                                                                                       <?php echo $trading_period;?></label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="control-group">
                                                                                    <label class="control-label" for="firstname"><b>Penalty Fee:</b></label>
                                                                                    <div class="controls"><label class="control-label" for="firstname">
                                                                                       <?php echo $penalty_fee;?>%</label>
                                                                                    </div>
                                                                                </div>
                                                                                


                                                                                <div><?php echo $formToken; ?></div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                            
                                                            
                                                            
                                                            
                        <div class="pamm_mng_table box_c">                                   
                            <div class="box_c_heading">PAMM Manager Trading History</div>      
                              <table id="table-to-grid" class="table_box" border="0" width="100%">
                                <thead>
                                    <th><b>Order</b></th>
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
                                    $beginIndex = 3;
                                    $size = sizeof($info);
                                    $cnt = 0;
                                    for ($i = $beginIndex; $i < $size; $i++) {
                                        if ($info[$i] === '0'){
                                            break;
                                        }
                                            
                                        $row = explode("\t", $info[$i]);
                                        if (strpos($row[2], 'balance') !== false) {
                                            ?>
                                            <tr align="right" bgcolor="<?= ($cnt % 2 ? '#e0e0e0' : '#ffffff') ?>">
                                                <td align="left"><?= $row[0] ?></td>
                                                <td><?= $row[1] ?></td>
                                                <td><?= $row[2] ?></td>
                                                <td align="left" colspan="8"><nobr><?= $row[13] ?><nobr></td>
                                                <td><nobr><?= $row[12] ?><nobr></td>
                                            </tr>
                                            <?php
                                        } else {
                                                ?>
                                                <tr align="right" bgcolor="<?= ($cnt % 2 ? '#e0e0e0' : '#ffffff') ?>">
                                                    <td align="left"><?= $row[0] ?></td>
                                                    <td><?= $row[1] ?></td>
                                                    <td><?= $row[2] ?></td>
                                                    <td><nobr><?= $row[3] ?></nobr></td>
                                                    <td><?= strtolower($row[4]) ?></td>
                                                    <td><nobr><?= $row[5] ?><nobr></td>
                                                    <td><nobr><?= $row[6] ?><nobr></td>
                                                    <td><nobr><?= $row[7] ?><nobr></td>
                                                    <td><nobr><?= $row[8] ?><nobr></td>
                                                    <td><nobr><?= $row[9] ?><nobr></td>
                                                <?php
                                                if (strpos($row[2], 'limit') !== false) {
                                                    ?>
                                                    <td colspan="2" align="right"><?= $row[13] ?></td>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <td><nobr><?= $row[11] ?><nobr></td>
                                                    <td><nobr><?= $row[12] ?><nobr></td>
                                                    <?php
                                                }
                                                ?>
                                                </tr>
                                            <?php
                                        }
                                        ++$cnt;
                                    }
                                    $profit_loss = $this->mql_model->MQ_GetParam($info[$i + 6]);
                                    $deposit = $this->mql_model->MQ_GetParam($info[$i + 1]);
                                    $balance = $this->mql_model->MQ_GetParam($info[$i]);
                                    $credit = $this->mql_model->MQ_GetParam($info[$i + 3]);
                                    $withdrawal = $this->mql_model->MQ_GetParam($info[$i + 2]);
                                    $profit = $deposit + $profit_loss;
                                    ?>
                                    
                                    <?php if ($info[$beginIndex] === '0'){ ?>
                                    <tr>
                                        <td valign="top" colspan="12" class="dataTables_empty"><div class="grid-msg">No Results</div></td>
                                    </tr>
                                    <?php } ?>
                                     <?php 
                                $size = sizeof($info2);
                                $beginIndex = 3;
                                
                                if (isset($info2[$beginIndex]))
                                    $balance = $this->mql_model->MQ_GetParam($info2[$beginIndex]);
                                else
                                    $balance=0;
                                if (isset($info2[$beginIndex + 1]))
                                    $equity = $this->mql_model->MQ_GetParam($info2[$beginIndex + 1]);
                                else
                                    $equity=0;
                                
                                if (isset($info2[$beginIndex + 3]))
                                    $free_margin = $this->mql_model->MQ_GetParam($info2[$beginIndex + 3]);
                                else
                                    $free_margin=0;
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <?php // echo '<pre>'; print_r($info); echo '</pre>'; ?>
                        <div class="adv_catg box_c">
                            <div class="box_c_heading">General Info</div>
                            <div class="box_c_content">
                                <div class="box">
                                    <div class="lft_fld">Profit/Loss:</div>
                                    <div class="rgt_fld"><?=$profit_loss ?></div>
                                </div>
                                <div class="box">
                                    <div class="lft_fld">Balance:</div>
                                    <div class="rgt_fld">  <?php echo $balance;?></div>
                                </div>
                                <div class=" box">
                                    <div class="lft_fld">Equity:</div>
                                    <div class="rgt_fld">  <?php echo $equity;?></div>
                                </div>
                                <div class=" box">
                                    <div class="lft_fld">Free Margin:</div>
                                    <div class="rgt_fld">  <?php echo $free_margin;?></div>
                                </div>

                                <div class=" box">
                                    <div class="lft_fld">Credit:</div>
                                    <div class="rgt_fld"><?=$credit ?></div>
                                </div>
                                <div class=" box">
                                    <div class="lft_fld">Deposit:</div>
                                    <div class="rgt_fld"><?=$deposit ?></div>
                                </div>
                                <div class=" box">
                                    <div class="lft_fld">Withdrawal:</div>
                                    <div class="rgt_fld"><?=$withdrawal ?></div>
                                </div>
                                <div class=" box">
                                    <div class="lft_fld">Profit:</div>
                                    <div class="rgt_fld"><?=$profit ?></div>
                                </div>
                            </div>
                        </div>
                                                       
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                        </div>
                        
                        
                                                        <script>
                                                            $(function() {
                                                                $('#tabs_Ads a').click(function (e) {
                                                                    e.preventDefault();
                                                                    window.location.hash=$(this).attr('href');
                                                                    $(this).tab('show');
                                                                })
                                                                
                                                                if(window.location.hash!='')
                                                                    $('#tabs_Ads').find('a[href="'+window.location.hash+'"]').tab('show');
                                                                else
                                                                    $('#tabs_Ads a:first').tab('show');
                                                            })
                                                        </script>
                                                    </div>
                                                    
                                                    
                                                    <div style="clear: both"></div>
                                                </div>
                                            </div>
										
                                    </div>
                                    <div>&nbsp;</div>
                                </div>
                            </div>
							
                            <div class="right_ca fl">
                                
                                <?php $this->load->view('common/sidebar_1'); ?>
                                
                                <?php $this->load->view('common/sidebar_terminal'); ?>
                                
                                <?php // $this->load->view('common/sidebar_news');?>
    
                            </div>
                            <div class="cl"></div>
                        </div>
                    </div>
                </div>
            </div>
<!--	PAGE content -->
</div>
<style type="text/css">
    .req{
        color:#D83B39;
    }
    .app .registration_wrapper .nav li a {
        color:#4C5463;
    }
    .bootstrap-scope .registration_wrapper .nav li.active > a{
        color: #555555;
    }
    .error-label{
        color: #ff0000;
    }
</style>

<link rel="stylesheet" href="<?php echo base_url(); ?>public/js/jquery-ui-1.8.21/css/smoothness/jquery-ui-1.8.21.custom.css" />
<script src="<?php echo base_url();?>public/js/jquery-ui-1.8.21/js/jquery-ui-1.8.21.custom.min.js"></script>
<?php if(isset($form_data['account_for']) && $form_data['account_for']=='3'){?>
<script type="text/javascript">
     
            $('#group_accountfor').hide();
           
</script>
<?php }?>

<?php $this->load->view('common/footer');?>




