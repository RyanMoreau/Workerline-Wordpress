jQuery(document).ready(function($) {
    $('.js-menu').click(function() {
        $(this).toggleClass('menu-open');
        $('.header-navigation-list').slideToggle('fast');
    });
});