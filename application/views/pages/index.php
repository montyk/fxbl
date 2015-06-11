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
                               <?php /*?> <h1 class="h_1"><?php if(isset($pages[0]->title)) echo $pages[0]->title;?></h1><?php */?>
							
                                <div class="pg_data">
                                    <ul class="bread_crum" id="breadcrumbs-one">
                                        <li><a href="<?php echo site_url('/'); ?>">Forexbull </a></li>
                                        <li><a class="current"><?php if (isset($pages[0]->title)) echo $pages[0]->title; ?></a></li>
                                    </ul>
                                    <div class="pg_data_view">
                                        <?php if (!empty($pages)) {
                                            ?>
                                            <div class="post  pad10 newsbox" style="">
                                                <div class="story">
                                                    <div style="">
                                                        <?php echo html_entity_decode($pages[0]->content); ?>
                                                    </div>
                                                    <div style="clear: both"></div>
                                                </div>
                                            </div>
                                            <?php } else {
                                            ?>
                                            <div class="post pad10 newsbox" style="">
                                                <div class="story">
                                                    <p>
                                                        No Page is Available
                                                    </p>
                                                    <div style="clear: both"></div>
                                                </div>
                                            </div>
                                        <?php } ?>
										
                                    </div>
                                    <div>&nbsp;</div>
                                </div>
                            </div>
							
                            <?php /*?><div class="right_ca fl">
                                <?php if(!empty($page_menu)){  ?>
                                    <div class="side_left_nav pg_data sidebar_right_nav" id="leftCol" style="margin:42px 0 10px 10px;width: 245px;">
                                        <?php foreach($page_menu as $k=>$v){  ?>
                                        <p>
                                            <a href="<?php echo site_url($v->abbr.'/'.$v->url_key);  ?>" class="<?php if($v->url_key==$url_2){ echo 'selected'; } ?>"><?php echo $v->name;  ?></a>
                                        </p>
                                        <?php } ?>
                                    </div>
                                <?php  }  ?>
                                
                                <?php// $this->load->view('common/sidebar_1'); ?>
                               
                                <?php $this->load->view('common/sidebar_terminal'); ?>

                                <?php //  $this->load->view('common/sidebar_news');?>
    
                            </div><?php */?>
                            <div class="cl"></div>
                        </div>
                    </div>
                </div>
            </div>
<!--	PAGE content -->
</div>
<?php $this->load->view('common/footer_new');?>




