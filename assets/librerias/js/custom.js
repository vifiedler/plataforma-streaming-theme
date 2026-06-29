(function ($) {

    /* ===== Carruseles horizontales ===== */
    let scrollAmount = 680;

    $('.bd-carousel-next').on('click', function () {
        let $track = $(this).siblings('.bd-carousel-track');
        $track.animate({ scrollLeft: $track.scrollLeft() + scrollAmount }, 350);
    });

    $('.bd-carousel-prev').on('click', function () {
        let $track = $(this).siblings('.bd-carousel-track');
        $track.animate({ scrollLeft: $track.scrollLeft() - scrollAmount }, 350);
    });

    /* ===== Single: play toggle ===== */
    $('#bd-play-btn').on('click', function () {
        $('#bd-single-hero').addClass('d-none');
        $('#bd-single-video').removeClass('d-none');
    });

})(jQuery);