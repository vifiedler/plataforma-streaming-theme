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

    /* ===== Single: control de reproducción con timeout ===== */
    let $playBtn = $('#bd-play-btn');
    let $pauseBtn = $('#bd-pause-btn');
    let $videoContainer = $('#bd-single-video');
    let $overlay = $('#bd-overlay');
    let $iframe = null;
    let isPaused = false;
    let pauseTimeout = null;

    // --- Funciones para timeout ---
    function clearPauseTimeout() {
        if (pauseTimeout) {
            clearTimeout(pauseTimeout);
            pauseTimeout = null;
        }
    }

    function startPauseTimeout() {
        clearPauseTimeout();
        pauseTimeout = setTimeout(function() {
            if ($pauseBtn.is(':visible') && !$pauseBtn.data('hovering')) {
                $pauseBtn.hide();   // Solo oculta pausa, no muestra reproducir
                console.log('Botón de pausa ocultado por timeout (sin mostrar reproducir)');
            }
            pauseTimeout = null;
        }, 10000);
    }

    // --- Comandos para YouTube ---
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

    // --- Botón Reproducir ---
    $playBtn.on('click', function () {
        console.log('Click en Reproducir');
        $videoContainer.show();

        if (!$iframe) {
            $iframe = $('#video-container').find('iframe');
            console.log('iframe encontrado:', $iframe.length ? 'Sí (' + $iframe.attr('src') + ')' : 'No');
        }

        if ($iframe && $iframe.length) {
            let src = $iframe.attr('src');
            if (src && src.indexOf('autoplay=1') === -1) {
                let separator = src.indexOf('?') !== -1 ? '&' : '?';
                let newSrc = src + separator + 'autoplay=1';
                $iframe.attr('src', newSrc);
                console.log('Se forzó autoplay en la URL');
            }

            if (isPaused) {
                sendCommand('playVideo');
                isPaused = false;
                $playBtn.hide();
                $pauseBtn.show();
                startPauseTimeout();
            } else {
                $playBtn.hide();
                $pauseBtn.show();
                $overlay.addClass('video-active');
                startPauseTimeout();
            }
        } else {
            console.error('No se encontró el iframe.');
        }
    });

    // --- Botón Pausa (manual) ---
    $pauseBtn.on('click', function () {
        console.log('Click en Pausa');
        if ($iframe && $iframe.length) {
            sendCommand('pauseVideo');
            isPaused = true;
            $pauseBtn.hide();
            $playBtn.show();   // ← Sí muestra reproducir porque es pausa manual
            clearPauseTimeout();
        }
    });

    // --- Hover sobre el botón de pausa ---
    $pauseBtn.on('mouseenter', function () {
        $(this).data('hovering', true);
        clearPauseTimeout();
        console.log('Hover en pausa - timeout cancelado');
    });

    $pauseBtn.on('mouseleave', function () {
        $(this).data('hovering', false);
        if ($(this).is(':visible')) {
            startPauseTimeout();
            console.log('Hover fuera - timeout reiniciado');
        }
    });

})(jQuery);