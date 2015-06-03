
<ul id="carousel">
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner1.png" alt=""/>
        <div class="tooltip"><u>Image title</u><br/><br alt=""/>Tooltips support <i>HTML</i> text.</div>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner1.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner2.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner2.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner3.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner3.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner4.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner4.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner5.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner5.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner6.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner6.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner7.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner7.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner8.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner8.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner9.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner9.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner10.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner10.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner11.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner11.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner12.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner12.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner13.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner13.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner14.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner14.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner15.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner15.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner16.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner16.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner17.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner17.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner18.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner19.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner19.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner19.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner20.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner20.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner21.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner21.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner22.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner22.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner23.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner23.png</div>
    </li>
    <li>
        <img src="<?php echo base_url(); ?>public/images/logos/partner24.png" alt=""/>
        <div class="bigImage"><?php echo base_url(); ?>public/images/logos/partner24.png</div>
    </li>
</ul>

</div>

<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>public/js/jquery-1.7.1.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.mousewheel.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/carousel.css" media="screen" alt=""/>
<script type="text/javascript">
    $(function($) {
        
        $('#carousel').carousel({
            width: 900,
            height: 300,
            itemWidth:120,
            horizontalRadius:270,
            verticalRadius:85,
            resize:false,
            mouseScroll:false,
            mouseDrag:true,
            scaleRatio:0.4,
            scrollbar:true,
            tooltip:false,
            mouseWheel:true,
            mouseWheelReverse:true
        });

        // when the large image is closed, enable the mouse scrolling
        // $(document).bind('afterClose.facebox', function() { carousel.startMouseScroll(); })

    });
</script>