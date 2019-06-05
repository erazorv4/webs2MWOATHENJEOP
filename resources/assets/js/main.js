/**
 * Created by Gebruiker on 9-3-2017.
 */
$(function() {
    // DOM Loaded
    initAffix();
});

function initAffix() {
    if ($(window).width() > 767) {
        $('nav.nav').affix({
            offset: {
                top: 150,
                bottom: function () {
                    return (this.bottom = $('footer').outerHeight(true));
                }
            }
        });

        $('nav.nav').on('affix.bs.affix', function () {
            $('body').addClass('affix-nav');
        });

        $('nav.nav').on('affixed.bs.affix', function () {
            $(this).hide();
            $(this).slideToggle();
        });

        $('nav.nav').on('affixed-top.bs.affix', function () {
            $('body').removeClass('affix-nav');
        });
        $(window).scroll(function () {
            $("#main-menu").removeClass("in");
        });
    }
}