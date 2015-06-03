
<?php
    $data['active_link'] = "active";
    $data['active'] = "7";
    
    $url_1 = $this->uri->segment(1);
    $url_2 = $this->uri->segment(2);
    $url_3 = $this->uri->segment(3); 
?>

<?php $this->load->view('common/header', $data);?>

<div class="app outside">
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
                                                            <div class="tab-pane active" id="Real_Acc_Tab">
                                                                <div style="">
                                                                    
                                                                    <form id="registration_form" class="form-horizontal" method="post" action="<?php echo site_url('registration'); ?>">
                                                                        <input type='hidden' name='id' id='id' value=''/> 
                                                                        <div class="control-group panel">
                                                                            <h5>View PAMM Managers</h5>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="firstname"><b>Account Name</b></label>
                                                                            <div class="controls"><label class="control-label" for="firstname">
                                                                               <?php echo $trading_name;?></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="firstname"><b>Success Fee</b></label>
                                                                            <div class="controls"><label class="control-label" for="firstname">
                                                                               <?php echo $success_fee;?>%</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="firstname"><b>Account Currency</b></label>
                                                                            <div class="controls"><label class="control-label" for="firstname">
                                                                               USD</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="firstname"><b>Min.Amount Deposit</b></label>
                                                                            <div class="controls"><label class="control-label" for="firstname">
                                                                               <?php echo $minimum_deposit;?></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="firstname"><b>Trading Period</b></label>
                                                                            <div class="controls"><label class="control-label" for="firstname">
                                                                               <?php echo $trading_period;?></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="firstname"><b>Penalty Fee</b></label>
                                                                            <div class="controls"><label class="control-label" for="firstname">
                                                                               <?php echo $penalty_fee;?>%</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="control-group">
                                                                            <label class="control-label" for="firstname"><b></b></label>
                                                                            <div class="controls"><label class="control-label" for="firstname">
                                                                               <a class="btn yellow f_l m_l_10" href="<?php echo site_url('/userpages/join_pamm/'.$pammId);?>">Invest Under  <?php echo $trading_name;?></a></label>
                                                                            </div>
                                                                        </div>
                                                                        


                                                                        <div><?php echo $formToken; ?></div>
                                                                    </form>
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




