$(function(){
		  var CKconfig = {
	toolbar:
	[
		['Bold','Italic','Underline','Strike'],
		['NumberedList','BulletedList','-','Outdent','Indent'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['Cut','Copy','Paste','PasteText','PasteFromWord','-','SpellChecker'],
		['Undo','Redo'],['TextColor','BGColor','-','Format']
	],
	 removePlugins : 'elementspath',
	 resize_enabled : false,
	 forcePasteAsPlainText : true
};
$('.jquery_ckeditor').ckeditor(); 
		   
        newTabHTML=$('.tab_wrap').clone();
	$("#preview_widget").live("click", function(){
            $.validatetabdata();
            if($('#tab_form').valid()){
                $.updatePreview();
            };
	});
	
	$(".nav.nav-tabs li a").live('click', function(){
		$("#widget_menu").addClass('top').animate({
                    top: "-100%"
                }, 500);
	});
	$(".back_widgets").live("click", function(){
            $("#widget_menu").removeClass('top');
            $("#widget_menu li,.tab-content .tab-pane").removeClass("active");
	});
	
	$('.tabs_save').live('click',function(){
            CKEDITOR.instances.content.updateElement();
            $("#tab_form").submit();
	});
	
	$("#tabs_add").live("click", function(){
            // $("#add_new_tab").append($(".tab_wrap .tab_view").clone());				  
            $("#add_new_tab").append(newTabHTML);
	});
	
});
$.extend( {
   updatePreview : function() {
	    var name = $("#Tab_Name").val();
		$("select").change($.selectValue(name));
   },
   selectValue: function(name) {
      var singleValues = $("#select_type").val();
			
 	  if(singleValues=="1"){
		  $('#preview').html($.tabs("top",name));
	  }	
	  else if(singleValues=="2"){
		   $('#preview').html($.tabs("below",name));
	  }
	  else if(singleValues=="3"){
			$('#preview').html($.tabs("left",name));	  
	  }
	  else{
		   $('#preview').html($.tabs("right",name));
	  }
    },
	tabs: function(type,name){
	  var h = [];
	  h.push(' <p class="lead">Preview HTML below:</p>');
	  h.push('<div class="tabbable tabs-'+type+'">');
	  
	  h.push('<ul class="nav nav-tabs">');
	  h.push('<li class="active"><a href="#tab1" data-toggle="tab">'+name+'</a></li>');
	  h.push('</ul>');
	  
	  h.push('<div class="tab-content"><div class="tab-pane active" id="tab1">');
	  h.push(CKEDITOR.instances['content'].getData());
	  h.push('</div>');
	  h.push('<div class="tab-pane" id="tab2">');
          h.push(CKEDITOR.instances['content'].getData());
	  h.push('</div>');
	  h.push('</div>');
	  
	  h.push('</div>');
	  
	  return h.join("");	
	},
	
	validatetabdata: function(){
		$("#tab_form").validate({
                    rules: {
                        wname: {
                            required: true
                        },
                        tname: {
                            required: true
                        },
                        select_type:{
                            required: true
                        },
                        select_color:{
                            required: true
                        }
                    },
                    messages: {
                        tname: {
                            required:'Tab Name is required'
                        }
                    },
                    errorPlacement: function(error, element) {
                        error.insertAfter(element);
                    }
                });
	} 

    
});
