<?php
    $data['active_link'] = "active";
    $data['active'] = "7";
    
    $url_1 = $this->uri->segment(1);
    $url_2 = $this->uri->segment(2);
    $url_3 = $this->uri->segment(3); 
?>

<?php $this->load->view('common/header', $data);?>

<div class="app coutside">
<!--	PAGE content -->
            <div class="contents pg_width">
                <div class="overlay_bg rel">
                    <div class="fore_ca">
                        <div class="fore_content">
                            <div class="content_wrap fl">
                                <h1 class="h_1"><?php if(isset($news[0]->title)) echo $news[0]->title;?></h1>
							
                                <div class="pg_data">
                                    <ul class="bread_crum" id="breadcrumbs-one">
                                        <li><a href="<?php echo site_url('/'); ?>"><?php echo $this->config->item('project_name') ?> </a></li>
                                        <li><a class="current"><?php echo $pagetype;?></a></li>
                                    </ul>
                                    <div class="pg_data_view">
                                        <?php
                                        if (!empty($news)) {
                                            foreach ($news as $n_key => $n_val) {
                                                ?>
                                                <div class="h_1 fl"><?php echo $n_val->heading; ?></div>
                                                <div class="full_story fr">
                                                    <?php echo $n_val->date_added; ?>
                                                </div>
                                                <div style="clear: both"></div>
                                                <div class="post  p10 newsbox bd mb5" style="">
                                                    <div class="story">
                                                        <?php
                                                        if ($n_val->attachment != '') {
                                                            echo '<img alt="'.$n_val->heading.'" width="640" height="243" src="' . base_url() . $n_val->attachment . '" style="max-width:640px"/>';
                                                        }
                                                        ?>
                                                        <br/>
                                                        <p>
                                                            <?php echo html_entity_decode($n_val->description); ?>
                                                        </p>
                                                        <div style="clear: both"></div>
                                                    </div>
                                                </div>
                                                <?php
                                            } echo $this->pagination->create_links();
                                        } else {
                                            ?>
                                            <div class="post pad10 newsbox" style="">
                                                <div class="story">
                                                    <p>
                                                        No News Available
                                                    </p>
                                                    <div style="clear: both"></div>
                                                </div>
                                            </div>
                                        <?php } ?>			
                                    </div>
                                    <div>&nbsp;</div>
                                </div>
                            </div>
							
                            <?php $this->load->view('common/right_content'); ?>
                            <div class="cl"></div>
                        </div>
                    </div>
                </div>
            </div>
<!--	PAGE content -->
</div>
<?php $this->load->view('common/footer');?>




