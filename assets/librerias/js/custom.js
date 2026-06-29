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

    /* ===== Single: control de reproducción con pausa ===== */
    var $playBtn = $('#bd-play-btn');
    var $pauseBtn = $('#bd-pause-btn');
    var $videoContainer = $('#bd-single-video');
    var $overlay = $('#bd-overlay');
    var $iframe = null;
    var isPaused = false;

    // Función para enviar comandos al reproductor de YouTube
    function sendCommand(command) {
        if (!$iframe) return;
        var message = JSON.stringify({
            event: 'command',
            func: command,
            args: ''
        });
        $iframe[0].contentWindow.postMessage(message, '*');
    }

    // Obtener el iframe y configurar enablejsapi=1 + autoplay
    function getIframe() {
        if (!$iframe) {
            $iframe = $('#video-container').find('iframe');
            if ($iframe.length) {
                var src = $iframe.attr('src');
                if (src.indexOf('enablejsapi=1') === -1) {
                    var separator = src.indexOf('?') !== -1 ? '&' : '?';
                    var newSrc = src + separator + 'enablejsapi=1';
                    if (newSrc.indexOf('autoplay=1') === -1) {
                        newSrc += '&autoplay=1';
                    }
                    $iframe.attr('src', newSrc);
                } else {
                    if (src.indexOf('autoplay=1') === -1) {
                        $iframe.attr('src', src + '&autoplay=1');
                    }
                }
            }
        }
        return $iframe;
    }

    // Botón Reproducir
    $playBtn.on('click', function () {
        // Mostrar el video
        $videoContainer.show();
        // Obtener y configurar el iframe
        var iframe = getIframe();
        if (iframe && iframe.length) {
            if (isPaused) {
                // Si estaba pausado, reanudar
                sendCommand('playVideo');
                isPaused = false;
                $playBtn.hide();
                $pauseBtn.show();
            } else {
                // Primera reproducción
                $playBtn.hide();
                $pauseBtn.show();
                $overlay.addClass('video-active');
            }
        }
    });

    // Botón Pausa
    $pauseBtn.on('click', function () {
        if ($iframe && $iframe.length) {
            sendCommand('pauseVideo');
            isPaused = true;
            $pauseBtn.hide();
            $playBtn.show();
        }
    });

})(jQuery);