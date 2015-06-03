$(window).load(function() {
        try{
            $('#slider').nivoSlider({
                effect:"random",
                slices:15,
                boxCols:8,
                boxRows:4,
                animSpeed:500,
                pauseTime:3000,
                startSlide:0
            });
        } catch(e){
            
        }
});
$(function(){
	$.tabsnav();
	$.tabsnav_latest();
        
        $('#chat_footer_link,.j_trigger_chat').live('click',function(){
            $('#liveadmin_status_image_liveadmin').trigger('click');
        });
});
$.extend({
	tabsnav: function(){
		var list = $("div.tabs .tabs_content > div");
		var listnav = $("div.tabs .navlist li");
		var lista = $("div.tabs .navlist a");
		list.hide().filter(":first").show();
		
		lista.click(function(){
			list.hide();
			list.filter(this.hash).show();
			listnav.removeClass("selected");
			$(this).parent().addClass("selected");
			return false;
		}).filter(":eq(0)").click();
	},
	
	tabsnav_latest: function(){
		var list = $("div.tabs_latest .news_list > div");
		var listnav = $("div.tabs_latest .navlist li");
		var lista = $("div.tabs_latest .navlist a");
		list.hide().filter(":first").show();
		
		lista.click(function(){
			list.hide();
			list.filter(this.hash).show();
			listnav.removeClass("selected");
			$(this).parent().addClass("selected");
			return false;
		}).filter(":eq(0)").click();
	}
});	