/*  File: v2/basic_extended.js          */
/*  Date: 2012-05-09                */

/********************************
  the following routines require
    jquery.js
*********************************/

$(function() {
	var CalloutBoxes = {
		currentlyOpen: null,
		currentlyAnimating: false,
		allBoxes: $('#callout_out_container .callout_box'),
		//boxHeaders : $('.header', this.allBoxes),
		init: function(){
			this.bindEvents();
			return this;
		},
		bindEvents: function(){
			this.allBoxes.bind('click', function(e){
				//e.preventDefault();
				//e.stopPropagation();
				CalloutBoxes.toggle.call(CalloutBoxes, $(this));
			});

			this.allBoxes.bind('mouseenter', function(e){
				$(this).css('cursor', 'pointer');

			});

			$('html').bind('click', function(e){
					CalloutBoxes.closeAll();
			});

			return this;
		},
		unbindEvents: function(){
			this.allBoxes.unbind('click');

			return this;
		},
		toggle: function(el){
			var item = el,
				idx = item.data('box');
			//if were currently in the middle of animation dont do anything
			if (this.currentlyAnimating) { return };

			//currently clicked box is open
			if (idx === this.currentlyOpen) {
				this.closeBox(idx);
			}else{
				//no boxes open
				if (null === this.currentlyOpen) {
					this.openBox(idx);
				}else{
					//a box other than currently clicked is open, close it first
					this.closeBox(this.currentlyOpen, function(){
						this.openBox(idx);
					});
				}
			}

			return this;

		},
		closeAll: function(){
			var el,
				that = this;
			if (this.currentlyAnimating || null === this.currentlyOpen){
				return;
			}
		 	
		 	this.closeBox(this.currentlyOpen);

		 	
		},
		openBox: function(idx, callback){
			//console.log('open', idx);
			if (idx === this.currentlyOpen) {return this;}
			var box = $(this.allBoxes[idx-1]),
				normal = $('.content .normal', box),
				expand = $('.content .expanded', box),
				arrow  = $('.arrow', box);

			this.currentlyAnimating = true;

			//reset z-index
			this.allBoxes.css('z-index', '1');

			box.css("height", "auto")
				.css("z-index", "2")
				.addClass('expanded');
	
			expand.css({'display':'none'});
			arrow.addClass('expanded');
			normal.fadeOut(300, function(){
				box.animate(
					{
						width: '460px'
					}, 
					{
						duration: 200,
						complete: function(){
							expand.slideDown(200, function(){
										CalloutBoxes.currentlyAnimating = false;
										CalloutBoxes.currentlyOpen = idx;
										$('.callout_box.data_centers .expanded .button_link_invisible').bind(
											'mouseenter', 
											CalloutBoxes.showCalloutPlusBox
										);
										$.isFunction(callback) && callback.call(CalloutBoxes);
									}).fadeIn(200);	
						}
					}
				);
			});

			return this;
		},
		closeBox: function(idx, callback){
			//console.log('close', idx);
			if (idx !== this.currentlyOpen) {return this;}

			var box = $(this.allBoxes[idx-1]),
				normal = $('.content .normal', box),
				expand = $('.content .expanded', box),
				arrow  = $('.arrow', box);

			this.currentlyAnimating = true;

			box.removeClass('expanded');

			expand.slideUp(300, function(){
					box.animate({width:'288px'}, 500, function(){
						arrow.removeClass('expanded');
						normal.fadeIn(200, function(){
							CalloutBoxes.currentlyAnimating = false;
							CalloutBoxes.currentlyOpen = null;
							$('.callout_box.data_centers .expanded .button_link_invisible').unbind(
										'mouseenter mouseleave'
							);
							$.isFunction(callback) && callback.call(CalloutBoxes);
						});
					});
			}).fadeOut();
			
			return this;
		},
		showCalloutPlusBox: function(e){
			$('.callout_box.data_centers .expanded .button_link_invisible').unbind('mouseenter');

			$(this).parent().parent().find('.plus').animate({width:'250px'}, 250, function() {
				$(this).parent().parent().find('.plus .label').fadeIn(250);

				$('.callout_box.data_centers .expanded .button_link_invisible').bind('mouseleave', CalloutBoxes.hideCalloutPlusBox);
			});
		},
		hideCalloutPlusBox: function(){
			var plus_button = $(this);
			$('.callout_box.data_centers .expanded .button_link_invisible').unbind('mouseleave');

			$(this).parent().parent().find('.plus .label').fadeOut(250, function() {
				plus_button.parent().parent().find('.plus').animate({width:'17px'});
				
				$('.callout_box.data_centers .expanded .button_link_invisible').bind('mouseenter', CalloutBoxes.showCalloutPlusBox);
			});
		}
	}.init();




	// --------------------------------------------------------------------------------------------------------
	// Random Slides Setup
	// --------------------------------------------------------------------------------------------------------
  
  $.get("Slot2Slides", function(data) { 
  	randomizeSlides(data);
  });

  $.get("Slot3Slides", function(data) {   
	randomizeSlides(data);
  });

  $.get("Slot4Slides", function(data) {   
	randomizeSlides(data);
  });


});


function randomizeSlides(slides)
{
	var slides = $(slides);
	var items = slides.find('.item');	
	var random_number = 1 + Math.floor(Math.random() * items.length);
	var random_slide = $(items[random_number-1]);
	var logowall_vid = $('.logowall_video', random_slide);
	var image = "url('img/placeholders/home/" + random_slide.data('image') + "')";
	$("#home_bg_img_" + slides.data('pane-index')).css("background-image", image);

	if (logowall_vid.length) {
		$('#logowall_vid_container').append(logowall_vid);
	}

	$("#" + slides.data('title') + " .pane_adjust").html(random_slide.html());

	//initOverlays();

}