    <?php $this->load->view('common/userpages/main_header'); ?>

    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/ckeditor/adapters/jquery.js"></script>
    <script type="text/javascript">
        var site_url = '<?php echo site_url(); ?>'
        $(document).ready(function(){
            $.ajaxSetup({
                jsonp: null,
                jsonpCallback: null
            });

        });

    </script>

    <style type="text/css">
        div.panel select {
            width: 180px !important;
        }
    </style>

</head>


<body class="app">
       
    <?php $this->load->view('common/userpages/leftnav'); ?>

    <div class="right_content">

        <?php $this->load->view('common/userpages/menu_header'); ?>


        <section id="secondary_bar" class="section">

            <div class="breadcrumbs_container">
                <article class="breadcrumbs article">
                    <img src="<?php echo base_url(); ?>misc/css/images/fav.png" class="fl bread_logo" />
                    <div class="breadcrumb_divider"></div>
                    <a class="current">Trade</a>
                </article>
                
            </div>
        </section><!-- end of secondary bar -->



        <section id="main" class="column">


            <div class="form_prp mar0">


                <!-- START @@ CONTENT GOES HERE-->

                CONTENT GOES HERE

                <!-- END @@ CONTENT GOES HERE-->


            </div>
        </section>

        <!--Start@@code for the Modal Window-->

        <div id="addpayment" class="m_w">

        </div>


        <!--End@@code for the Modal Window-->

        <!-- End of RTE Files -->

    </div>

</body>

</html>