$(function(){
	$("#preview_widget").live("click", function(){
			$.validatetabdata();
			//if($('#tab').valid()){
				//setTimeout($.updatePreview(), 500)
			//};
			$.updatePreview();
	});
	
});
$.extend( {
   updatePreview : function() {
		$("select").change($.selectValue());
   },
   selectValue: function() {
      var singleValues = $("#select_type").val();
			
 	  if(singleValues=="1"){
		  $('#preview').html($.horizontal());
	  }	
	  else if(singleValues=="2"){
		   $('#preview').html($.horizontal(true));
	  }
	  else if(singleValues=="3"){
			$('#preview').html($.left());	  
	  }
	  else{
		   $('#preview').html($.right());
	  }
    },
	horizontal: function(wrap){
	  var h = [];
	  if(wrap){
	  	h.push('<div class="tabbable tabs-below">');
	  }
	  else{
		  h.push('<div class="tabbable">');
	  }
	  h.push('<ul class="nav nav-tabs"><li class="active"><a href="#tab1" data-toggle="tab">Section 1</a></li><li><a href="#tab2" data-toggle="tab">Section 2</a></li></ul>');
	  h.push('<div class="tab-content"><div class="tab-pane active" id="tab1">');
	  h.push(CKEDITOR.instances['content'].getData());
	  h.push('</div>');
	  h.push('<div class="tab-pane" id="tab2">');
      h.push(CKEDITOR.instances['content'].getData());
	  h.push('</div>');
	  h.push('</div></div>');
	  
	  return h.join("");	
	},
	
	left: function(){
	 var l = new Array();
	 if(wrap){
	  	l.push('<div class="tabbable tabs-below">');
	 }
	 else{
		 l.push('<div class="tabbable tabs-left">');
	  }
		l.push('<div class="tabbable tabs-left">');
		l.push('<ul class="nav nav-tabs">');
		l.push('<li class="active"><a href="#left_tab1" data-toggle="tab">Section 1</a></li>');
		l.push('<li><a href="#left_tab2" data-toggle="tab">Section 2</a></li>');
		l.push('</ul>');
		l.push('<div class="tab-content">');
		l.push('<div class="tab-pane active" id="left_tab1">');
		l.push(CKEDITOR.instances['content'].getData());
		l.push('</div>');
		l.push('<div class="tab-pane" id="left_tab2">');
		l.push(CKEDITOR.instances['content'].getData());
		l.push('</div>');
		l.push('</div>');
		l.push('</div>');;
		return l.join("");
	},
	
	validatetabdata: function(){
		$("#tab").validate({
			rules: {
				tname: {
					required: true,
				},
				select:{
                    required: function(element) {
                        if( $("#select").val() =='-1'){
                            return false;
                        }else{
                            return true;
                        }

                    }
                }
			},
			messages: {
				tname: "Email is required"
			},
			errorPlacement: function(error, element) {
					error.insertAfter(element);
			},
		});
	} 

    
});
