//  Andy Langton's show/hide/mini-accordion @ http://andylangton.co.uk/jquery-show-hide

// this tells jquery to run the function below once the DOM is ready
$(document).ready(function() {

    // choose text for the show/hide link - can contain HTML (e.g. an image)
    var showText='Show';
    var hideText='Hide';

    // initialise the visibility check
    var is_visible = false;

    // append show/hide links to the element directly preceding the element with a class of "toggle"
    $('.toggle').prev().append(' <span href="#" class="toggleLink">'+hideText+'</span>').addClass('open');

    // hide all of the elements with a class of 'toggle'
    $('.toggle').show();

    // capture clicks on the toggle links
    $('span.toggleLink').live('click',function() {

        // switch visibility
        is_visible = !is_visible;

        // change the link text depending on whether the element is shown or hidden
        if ($(this).text()==showText) {
            $(this).text(hideText);
            $(this).parent().next('.toggle').slideDown('slow');
            $(this).parent().find('a:first span:first').toggleClass('up');
            $(this).parents('.toggle_hdr:first').toggleClass('open');
        }
        else {
            $(this).text(showText);
            $(this).parent().next('.toggle').slideUp('slow');
            $(this).parent().find('a:first span:first').toggleClass('up');
            $(this).parents('.toggle_hdr:first').toggleClass('open');
        }

        // return false so any link destination is not followed
        return false;

    });
    
    $('.toggle_hdr a span').live('click',function() {

        // switch visibility
        is_visible = !is_visible;

        // change the link text depending on whether the element is shown or hidden
        if (!$(this).parents('.toggle_hdr:first').hasClass('open')) {
            console.log($(this).parents('.toggle_hdr:first').find('.toggleLink'));
            console.log(1);
            $(this).parents('.toggle_hdr:first').find('.toggleLink').text(hideText);
            $(this).parents('.toggle_hdr:first').next('.toggle').slideDown('slow');
            $(this).toggleClass('up');
            $(this).parents('.toggle_hdr:first').toggleClass('open');
        } else {
            console.log(2);
            $(this).parents('.toggle_hdr:first').find('.toggleLink').text(showText);
            $(this).parents('.toggle_hdr:first').next('.toggle').slideUp('slow');
            $(this).toggleClass('up');
            $(this).parents('.toggle_hdr:first').toggleClass('open');
        }

        // return false so any link destination is not followed
        return false;

    });
});