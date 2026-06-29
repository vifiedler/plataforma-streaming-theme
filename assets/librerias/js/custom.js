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

    /* ===== Single: control de reproducción ===== */
    let $playBtn = $('#bd-play-btn');
    let $pauseBtn = $('#bd-pause-btn');
    let $videoContainer = $('#bd-single-video');
    let $overlay = $('#bd-overlay');
    let $iframe = null;
    let isPaused = false;

    function sendCommand(command) {
        if (!$iframe) {
            console.warn('No hay iframe para enviar comando');
            return;
        }
        let message = JSON.stringify({
            event: 'command',
            func: command,
            args: ''
        });
        try {
            $iframe[0].contentWindow.postMessage(message, '*');
            console.log('Comando enviado:', command);
        } catch (e) {
            console.error('Error al enviar comando:', e);
        }
    }

    // Botón Reproducir
    $playBtn.on('click', function () {
        console.log('Click en Reproducir');
        
        // Mostrar el contenedor del video
        $videoContainer.show();
        console.log('Contenedor video mostrado');

        // Buscar el iframe dentro del contenedor
        if (!$iframe) {
            $iframe = $('#video-container').find('iframe');
            console.log('iframe encontrado:', $iframe.length ? 'Sí (' + $iframe.attr('src') + ')' : 'No');
        }

        if ($iframe && $iframe.length) {
            // Si el iframe no tiene autoplay en la URL, lo forzamos (por si acaso)
            let src = $iframe.attr('src');
            if (src && src.indexOf('autoplay=1') === -1) {
                let separator = src.indexOf('?') !== -1 ? '&' : '?';
                let newSrc = src + separator + 'autoplay=1';
                $iframe.attr('src', newSrc);
                console.log('Se forzó autoplay en la URL');
            }

            // Si estaba pausado, reanudar
            if (isPaused) {
                sendCommand('playVideo');
                isPaused = false;
                $playBtn.hide();
                $pauseBtn.show();
            } else {
                // Primera reproducción: ya tiene autoplay en la URL
                $playBtn.hide();
                $pauseBtn.show();
                $overlay.addClass('video-active');
                console.log('Overlay con clase video-active');
            }
        } else {
            console.error('No se encontró el iframe. Verifica que el campo oEmbed esté funcionando.');
        }
    });

    // Botón Pausa
    $pauseBtn.on('click', function () {
        console.log('Click en Pausa');
        if ($iframe && $iframe.length) {
            sendCommand('pauseVideo');
            isPaused = true;
            $pauseBtn.hide();
            $playBtn.show();
        }
    });

})(jQuery);