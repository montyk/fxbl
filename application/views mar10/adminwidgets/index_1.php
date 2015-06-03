<?php $this->load->view('common/admin/widget_header'); ?>

        <script type="text/javascript" src="<?php echo base_url(); ?>misc/widgets/js/widgets.js"></script>
</head>


<body class="app">

    <?php $this->load->view('common/leftnav'); ?>

    <div class="right_content">

        <?php $this->load->view('common/admin/menu_header'); ?>


        <section id="secondary_bar" class="section">

            <div class="breadcrumbs_container">
                <article class="breadcrumbs article">
                    <img src="<?php echo base_url(); ?>misc/css/images/fav.png" class="fl bread_logo" />
                    <div class="breadcrumb_divider"></div>
                    <a class="current">Widgets</a>
                </article>
            </div>
        </section><!-- end of secondary bar -->

        <section id="main" class="column">
            <div class="form_prp mar0 widgets_area row-fluidXXX">
                
                <?php $this->load->view('common/notifications'); ?>
                
                <h2 class="t_a_c">Widgets Generator</h2>
                <div class="tabbable tabs-left">
                    <ul class="nav nav-tabs" id="widget_menu">
                        <?php if(!empty($widgets_types)) foreach($widgets_types AS $k=>$v){ ?>
                        <li class=""><a href="#left_tab<?php echo $k; ?>" data-toggle="tab"><?php echo $v->name; ?></a></li>
                        <?php } ?>
                        <li class=""><a href="#left_tab1" data-toggle="tab">Tabs</a></li>
                        <li><a href="#left_tab2" data-toggle="tab">Slider</a></li>
                        <li><a href="#left_tab3" data-toggle="tab">Accordion</a></li>
                    </ul>
                    <div class="tab-content well">

                        
                        <?php 
                            if(!empty($widgets_types)) foreach($widgets_types AS $k=>$v){ 
                                $this->load->view($v->view_file); 
                            } 
                        ?>
                        <?php $this->load->view('adminwidgets/widgets/tabs'); ?>

                        <?php $this->load->view('adminwidgets/widgets/sliders'); ?>

                        <?php $this->load->view('adminwidgets/widgets/accordions'); ?>

                    </div>
                </div>
            </div>
        </section>

        <!--Start@@code for the Modal Window-->

        <div id="addpayment" class="m_w">

        </div>


        <!--End@@code for the Modal Window-->

        <!-- End of RTE Files -->

    </div>
    <script>
        $(function(){
            $('#widget_menu a:first').tab('show');
        });
    </script>	
    <style type="text/css">
        select.input-xlarge {
            width: 285px;
        }
    </style>
    <?php $this->load->view('common/admin/admin_footer'); ?>
</body>

</html>