(function ($) {

    /* Carruseles horizontales */
    let scrollAmount = 680;

    $('.bd-carousel-next').on('click', function () {
        let $track = $(this).siblings('.bd-carousel-track');
        $track.animate({ scrollLeft: $track.scrollLeft() + scrollAmount }, 350);
    });

    $('.bd-carousel-prev').on('click', function () {
        let $track = $(this).siblings('.bd-carousel-track');
        $track.animate({ scrollLeft: $track.scrollLeft() - scrollAmount }, 350);
    });

    /* Single: play toggle con el autoplay */
    $('#bd-play-btn').on('click', function () {
        $('#bd-single-hero').addClass('d-none');
        $('#bd-single-video').removeClass('d-none');
        let $iframe = $('#video-container').find('iframe');
        if ($iframe.length){
            let src = $iframe.attr('src');
            if(src.indexOf('autoplay=1')===-1){
                let separator = src.indexOf('?') !== -1 ? '&' : '?';
                let newSrc = src + separator + 'autoplay=1';
                $iframe.attr('src',newSrc);
            }
        }
    });

})(jQuery);