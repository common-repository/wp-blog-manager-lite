jQuery(document).ready(function($) {
//var nonce=wpbm_frontend_js_params.ajax_nonce;
    var wpbmScreenWidth = $(window).width();
    $(window).resize(function() {
        wpbmScreenWidth = $(window).width();
    });



    $('body').on('click', '.wpbm-share-outer-wrap', function() {
        $(this).closest('.wpbm-bottom-wrap').find('.wpbm-share-wrap').slideToggle("slow");

    });

    //for slider of logo
    var wpbm_slider = {};
    $('.wpbm-slider-wrapper').each(function() {
        var id = $(this).data('id');
        var controls = $(this).data('controls');
        var auto = $(this).data('auto');
        var speed = $(this).data('speed');
        // var pause = $(this).data('pause');
        var pager = $(this).data('pager');


        items = '1';
        var margin = 0;
        var center_class = 'false';

        var nav_type = [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ];
        wpbm_slider.id = $(this).owlCarousel({
            center: center_class,
            items: 1,
            loop: true,
            nav: controls,
            margin: margin,
            dots: pager,
            dotsEach: pager,
            navText: nav_type,
            autoplay: auto,
            autoplayHoverPause: true,
            autoplayTimeout: speed,
            responsiveClass: true,
            rewindNav: false,
            itemClass: 'wpbm-owl-item',
            responsive: {
                1024: {
                    items: items
                },
                768: {
                    items: items
                },
                0: {
                    items: 1,
                    center: false,
                    nav: false,
                    dots: false

                },
                480: {
                    items: 1,
                    center: false,
                    nav: false,
                    dots: false

                },
                481: {
                    items: 1,
                    center: false,
                    nav: false,
                    dots: false

                },
                740: {
                    items: items,
                    center: false,
                    nav: false,
                    dots: false
                }
            }
        });
    });
});