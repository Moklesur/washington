jQuery(function(){
    /***************************************
     * Menu DropDown *
     ***************************************/
    var $ = jQuery;

    window.prettyPrint && prettyPrint();
    $(document).on('click', '.primary-menu .xs-dropdown-menu', function(e) {
        e.stopPropagation();
    });
    $('.primary-menu .xs-dropdown-menu').parent().hover(function() {
        var menu = $(this).find("ul");
        var menupos = $(menu).offset();
        if (menupos.left + menu.width() > $(window).width()) {
            var newpos = -$(menu).width();
            menu.css({ left: newpos });
        }
    });
    $(document).on('click', '.primary-menu .xs-angle-down', function(e) {
        e.preventDefault();
        $(this).parents('.xs-dropdown').find('.xs-dropdown-menu').toggleClass('active');
    });

});