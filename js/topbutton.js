jQuery(document).ready(function($) {
    var offset = 100;
    var speed = 250;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() < offset) {
            jQuery('.topbutton').fadeOut(duration);
        } else {
            jQuery('.topbutton').fadeIn(duration);
        }
    });
    jQuery('.topbutton').on('click', function() {
        jQuery('html, body').animate({ scrollTop: 0 }, speed);
        return false;
    });
});