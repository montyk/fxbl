<div class="updates ml10 mt12 mb20">
    <div class="tabs_latest">
        <ul class="navlist">
            <li class="bdr_none first"><a href="#first"><span class="news">News</span></a></li>
            <li class="last"><a href="#second"><span class="events">Promotions</span></a></li>
        </ul>
        <div class="news_list">
            <div id="first" class="first">
                <?php if (!empty($sidebar_news)) foreach ($sidebar_news as $k => $v) { ?>
                    <div class="c_555 mt10 tdu news_content"><a href="<?php echo site_url('news/full_story/' . $v->id); ?>"><?php echo substr(strip_tags(filterStringDecode($v->description)), 0, 100); ?>...</a></div>
                    <span class="pl10"><b><?php echo $v->last_modified; ?></b></span>
                <?php } else { ?>
                To be announced......
                <?php } ?>
                <div><a href="<?php echo site_url('news'); ?>">View All</a></div>
            </div>
            <div id="second" class="second">
                <?php if (!empty($sidebar_promotions)) foreach ($sidebar_promotions as $k => $v) { ?>
                    <div class="c_555 mt10 tdu news_content"><a href="<?php echo site_url('news/full_story/' . $v->id); ?>"><?php echo substr(strip_tags(filterStringDecode($v->description)), 0, 100); ?>...</a></div>
                    <span class="pl10"><b><?php echo $v->last_modified; ?></b></span>
                <?php } else { ?>
                To be announced......
                <?php } ?>
                <div><a href="<?php echo site_url('news'); ?>">View All</a></div>
            </div>
        </div>	
    </div>
</div>