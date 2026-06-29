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

    /* ===== Single: control de reproducción con superposición ===== */
    let $playBtn = $('#bd-play-btn');
    let $pauseBtn = $('#bd-pause-btn');
    let $videoContainer = $('#bd-single-video');
    let $overlay = $('#bd-overlay');
    let $iframe = null;
    let isPaused = false;

    // Función para enviar comandos al reproductor de YouTube
    function sendCommand(command) {
        if (!$iframe) return;
        let message = JSON.stringify({
            event: 'command',
            func: command,
            args: ''
        });
        $iframe[0].contentWindow.postMessage(message, '*');
    }

    // Obtener el iframe y configurar la URL con enablejsapi y autoplay
    function getIframe() {
        if (!$iframe) {
            $iframe = $('#video-container').find('iframe');
            if ($iframe.length) {
                let src = $iframe.attr('src');
                // Si no tiene los parámetros necesarios, los agregamos
                if (src.indexOf('enablejsapi=1') === -1) {
                    let separator = src.indexOf('?') !== -1 ? '&' : '?';
                    src = src + separator + 'enablejsapi=1';
                }
                if (src.indexOf('autoplay=1') === -1) {
                    src = src + '&autoplay=1';
                }
                $iframe.attr('src', src);
            }
        }
        return $iframe;
    }

    // Botón Reproducir
    $playBtn.on('click', function () {
        // Mostrar el contenedor del video
        $videoContainer.show();

        // Obtener iframe y configurar
        let iframe = getIframe();
        if (iframe && iframe.length) {
            // Si el video estaba pausado, reanudar
            if (isPaused) {
                sendCommand('playVideo');
                isPaused = false;
                $playBtn.hide();
                $pauseBtn.show();
            } else {
                // Primera reproducción: ya tiene autoplay, solo cambiamos botones
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

    // (Opcional) Resetear el estado cuando el video termina - no implementado por simplicidad

})(jQuery);