var CKconfig = {
    toolbar:
            [
                ['Bold', 'Italic', 'Underline', 'Strike'],
                ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'],
                ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
                ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'SpellChecker'],
                ['Undo', 'Redo'], ['TextColor', 'BGColor', '-', 'Format']
            ],
    removePlugins: 'elementspath',
    resize_enabled: false,
    forcePasteAsPlainText: true
};

$(function() {
    newTabHTML = $('.tab_wrap').clone().html();
    newAccordionHTML = $('.accordion_wrap').clone().html();


    $('.jquery_ckeditor').ckeditor();

    $(".back_widgets").live("click", function() {
        $("#widget_menu").removeClass('top');
        $("#widget_menu li,.tab-content .tab-pane").removeClass("active");
    });

//    $(".nav.nav-tabs li a").live('click', function(){
//            $("#widget_menu").addClass('top').animate({
//                top: "-100%"
//            }, 500);
//    });

/*
 * START - Tab Interactions
 */

    $("#preview_widget").live("click", function() {
        $.updateAllCKEditors();
        
        $.validateTabData();
        if ($('#tab_form').valid()) {
            // $.updatePreview();
            $.previewTabForm();
        }
    });

    $('.tabs_save').live('click', function() {
        $.updateAllCKEditors();
        $.validateTabData();
//        if ($('#tab_form').valid()) {
//            $.previewTabForm();
//        }
    });

    $("#tabs_add").live("click", function() {
        // $("#add_new_tab").append($(".tab_wrap .tab_view").clone());				  
        $.updateAllCKEditors();
        
        $.validateTabData();
        if ($('#tab_form').valid()) {
            $("#add_new_tab").append(newTabHTML);
            editorNum=$('#tab_form .jquery_ckeditor').length-1;
            $('#tab_form [name="tname[]"]:last').val('');
            $('#tab_form .textarea:last').html('<textarea class="jquery_ckeditor" name="content['+editorNum+']" id="content_' + editorNum + '" cols="10" rows="2"></textarea>');
            $('#tab_form .jquery_ckeditor:last').ckeditor();
            $('#tab_form .j_remove_section:last').removeClass('hide');
        }
    });

/*
 * END - Tab Interactions
 */

/*
 * START - Accordion Interactions
 */

    $("#preview_accordian_widget").live("click", function() {
        $.updateAllCKEditors();
        
        $.validateAccordionData();
        if ($('#accordion_form').valid()) {
            // $.updatePreview();
            $.previewAccordionForm();
        }
    });

    $('.accordion_save').live('click', function() {
        $.updateAllCKEditors();
        $.validateAccordionData();
//        if ($('#accordion_form').valid()) {
//            $.previewAccordionForm();
//        }
    });

    $("#accordion_add").live("click", function() {
        // $("#add_new_tab").append($(".tab_wrap .tab_view").clone());				  
        $.updateAllCKEditors();
        
        $.validateAccordionData();
        if ($('#accordion_form').valid()) {
            $("#add_new_accordian").append(newAccordionHTML);
            editorNum=$('#accordion_form .jquery_ckeditor').length-1;
            $('#accordion_form [name="tname[]"]:last').val('');
            $('#accordion_form .textarea:last').html('<textarea class="jquery_ckeditor" name="accordion_content['+editorNum+']" id="accordion_content_' + editorNum + '" cols="10" rows="2"></textarea>');
            $('#accordion_form .jquery_ckeditor:last').ckeditor();
            $('#accordion_form .j_remove_section:last').removeClass('hide');
        }
    });

/*
 * END - Accordion Interactions
 */


/*
 * START - Pop-Up Window Interactions
 */

    $("#preview_popup_window_widget").live("click", function() {
        $.updateAllCKEditors();
        
        $.validatePopUpWindowData();
        if ($('#popup_window_form').valid()) {
            // $.updatePreview();
            $.previewPopUpWindowForm();
        }
    });

    $('.popup_window_save').live('click', function() {
        $.updateAllCKEditors();
        $.validatePopUpWindowData();
    });

    $('.modal_close').live('click',function(){
        $(this).parents('div.modal:first').modal('hide');
    });

/*
 * END - Pop-Up Window Interactions
 */

/*
 * START - Pop-Over Interactions
 */

    $("#preview_popover_widget").live("click", function() {
        $.updateAllCKEditors();
        
        $.validatePopoverData();
        if ($('#popover_form').valid()) {
            // $.updatePreview();
            $.previewPopoverForm();
        }
    });

    $('.popover_save').live('click', function() {
        $.updateAllCKEditors();
        $.validatePopoverData();
    });


/*
 * END - Pop-Over Interactions
 */



/*
 * START - Tooltip Interactions
 */

    $("#preview_tooltip_widget").live("click", function() {
        $.updateAllCKEditors();
        
        $.validateTooltipData();
        if ($('#tooltip_form').valid()) {
            // $.updatePreview();
            $.previewTooltipForm();
        }
    });

    $('.tooltip_save').live('click', function() {
        $.updateAllCKEditors();
        $.validateTooltipData();
    });


/*
 * END - Tooltip Interactions
 */


/*
 * START - Alert Interactions
 */

    $("#preview_alert_widget").live("click", function() {
        $.updateAllCKEditors();
        
        $.validateAlertData();
        if ($('#alert_form').valid()) {
            // $.updatePreview();
            $.previewAlertForm();
        }
    });

    $('.alert_save').live('click', function() {
        $.updateAllCKEditors();
        $.validateAlertData();
    });


/*
 * END - Alert Interactions
 */


/*
 * START - Autosuggest Interactions
 */

    $("#preview_autosuggests_widget").live("click", function() {
        // $.updateAllCKEditors();
        
        $.validateAutosuggestData();
        if ($('#autosuggests_form').valid()) {
            // $.updatePreview();
            $.previewAutosuggestForm();
        }
    });

    $('.autosuggests_save').live('click', function() {
        // $.updateAllCKEditors();
        $.validateAutosuggestData();
    });
    
    autosuggestValuesInput=$("<div />").append($('.autosuggest_values:first').clone().val('')).html();
    $('#autosuggest_add').live('click',function(){
        $('.autosuggest_values:last').after('<br/>'+autosuggestValuesInput);
        $('.autosuggest_values:last').focus();
    });


/*
 * END - Autosuggest Interactions
 */



    $('.j_remove_section').live('click',function(){
        $(this).parents('.accordion_view:first, .tab_view:first').next('hr').remove();
        $(this).parents('.accordion_view:first, .tab_view:first').remove();
    });



    /* events for accordian */
    $('.jquery_ckeditor_acc').ckeditor();

});
$.extend({
    updatePreview: function() {
        var name = $("#Tab_Name").val();
        $("select").change($.selectValue(name));
    },
    selectValue: function(name) {
        var singleValues = $("#select_type").val();

        if (singleValues == "1") {
            $('#preview').html($.tabs("top", name));
        }
        else if (singleValues == "2") {
            $('#preview').html($.tabs("below", name));
        }
        else if (singleValues == "3") {
            $('#preview').html($.tabs("left", name));
        }
        else {
            $('#preview').html($.tabs("right", name));
        }
    },
    tabs: function(type, name) {
        var h = [];
        h.push(' <p class="lead">Preview HTML below:</p>');
        h.push('<div class="tabbable tabs-' + type + '">');

        h.push('<ul class="nav nav-tabs">');
        h.push('<li class="active"><a href="#tab1" data-toggle="tab">' + name + '</a></li>');
        h.push('</ul>');

        h.push('<div class="tab-content"><div class="tab-pane active" id="tab1">');
        h.push(CKEDITOR.instances['content'].getData());
        h.push('</div>');

        h.push('</div>');

        h.push('</div>');

        return h.join("");
    },
    validateTabData: function() {
        $("#tab_form").validate({
            rules: {
                name: {
                    required: true
                },
                'tname[]': {
                    required: true
                },
                'content[]': {
                    required: true
                },
                select_type: {
                    required: true
                },
                select_color: {
                    required: true
                }
            },
            messages: {
                'tname[]': {
                    required: 'Tab Name is required'
                },
                'content[]': {
                    required: 'Tab Content is required'
                }
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            }
        });
    },
    validateAccordionData: function() {
        $("#accordion_form").validate({
            rules: {
                name: {
                    required: true
                },
                'name[]': {
                    required: true
                },
                'content[]': {
                    required: true
                },
                select_type: {
                    required: true
                },
                select_color: {
                    required: true
                }
            },
            messages: {
                'name[]': {
                    required: 'Accordion Name is required'
                },
                'accordion_content[]': {
                    required: 'Accordion Content is required'
                }
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            }
        });
   },
    accordian: function() {
        var acc = new Array();

        acc.push('<div class="accordion" id="accordion2">');
        acc.push('<div class="accordion-group">');
        acc.push('<div class="accordion-heading">');
        acc.push('<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">');
        acc.push('Collapsible Group Item #1');
        acc.push('</a>');
        acc.push('</div>');
        acc.push('<div id="collapseOne" class="accordion-body collapse in">');
        acc.push('<div class="accordion-inner">');
        acc.push('Anim pariatur cliche...');
        acc.push('</div>');
        acc.push('</div>');
        acc.push('</div>');
        acc.push('<div class="accordion-group">');
        acc.push('<div class="accordion-heading">');
        acc.push('<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">');
        acc.push('Collapsible Group Item #2');
        acc.push('</a>');
        acc.push('</div>');
        acc.push('<div id="collapseTwo" class="accordion-body collapse">');
        acc.push('<div class="accordion-inner">');
        acc.push('Anim pariatur cliche...');
        acc.push('</div>');
        acc.push('</div>');
        acc.push('</div>');
        acc.push('</div>');

        return acc.join("");
    },
    previewTabForm:function(){
        dataP=$('#tab_form').serialize()+'&preview=TRUE';
        $.post(site_url+'adminwidgets/generate_widget/tabs',dataP,function(dataR){
            $('#tab_preview').html(dataR).show();
        });
    },
    updateAllCKEditors:function(){
        $.each(CKEDITOR.instances,function(k,v){
            CKEDITOR.instances[k].updateElement();
        });
    },
    previewAccordionForm:function(){
        dataP=$('#accordion_form').serialize()+'&preview=TRUE';
        $.post(site_url+'adminwidgets/generate_widget/accordions',dataP,function(dataR){
            $('#accordian_preview').html(dataR).show();
        });
    },
    validatePopUpWindowData: function() {
        $("#popup_window_form").validate({
            rules: {
                name: {
                    required: true
                },
                content: {
                    required: true
                },
                select_type: {
                    required: true
                },
                select_color: {
                    required: true
                }
            },
            messages: {
                
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            }
        });
   },
    previewPopUpWindowForm:function(){
        dataP=$('#popup_window_form').serialize()+'&preview=TRUE';
        $.post(site_url+'adminwidgets/generate_widget/popup_windows',dataP,function(dataR){
            $('#popup_window_preview').html(dataR).show();
        });
    },
    validatePopoverData: function() {
        $("#popover_form").validate({
            rules: {
                name: {
                    required: true
                },
                content: {
                    required: true
                },
                select_type: {
                    required: true
                },
                select_color: {
                    required: true
                }
            },
            messages: {
                
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            }
        });
   },
    previewPopoverForm:function(){
        dataP=$('#popover_form').serialize()+'&preview=TRUE';
        $.post(site_url+'adminwidgets/generate_widget/pop_overs',dataP,function(dataR){
            $('#popover_preview').html(dataR).show();
        });
    },
    validateTooltipData: function() {
        $("#tooltip_form").validate({
            rules: {
                name: {
                    required: true
                },
                content: {
                    required: true
                },
                select_type: {
                    required: true
                },
                select_color: {
                    required: true
                }
            },
            messages: {
                
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            }
        });
   },
    previewTooltipForm:function(){
        dataP=$('#tooltip_form').serialize()+'&preview=TRUE';
        $.post(site_url+'adminwidgets/generate_widget/tooltips',dataP,function(dataR){
            $('#tooltip_preview').html(dataR).show();
        });
    },
    validateAlertData: function() {
        $("#alert_form").validate({
            rules: {
                name: {
                    required: true
                },
                content: {
                    required: true
                },
                select_type: {
                    required: true
                },
                select_color: {
                    required: true
                }
            },
            messages: {
                
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            }
        });
   },
    previewAlertForm:function(){
        dataP=$('#alert_form').serialize()+'&preview=TRUE';
        $.post(site_url+'adminwidgets/generate_widget/alerts',dataP,function(dataR){
            $('#alert_preview').html(dataR).show();
        });
    },
    validateAutosuggestData: function() {
        $("#autosuggest_form").validate({
            rules: {
                name: {
                    required: true
                },
                content: {
                    required: true
                },
                select_type: {
                    required: true
                },
                select_color: {
                    required: true
                }
            },
            messages: {
                
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            }
        });
   },
    previewAutosuggestForm:function(){
        dataP=$('#autosuggests_form').serialize()+'&preview=TRUE';
        $.post(site_url+'adminwidgets/generate_widget/autosuggests',dataP,function(dataR){
            $('#autosuggests_preview').html(dataR).show();
        });
    }


});
