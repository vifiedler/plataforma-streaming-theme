/* ===== Single: control de reproducción ===== */
let $playBtn = $('#bd-play-btn');
let $pauseBtn = $('#bd-pause-btn');
let $videoContainer = $('#bd-single-video');
let $overlay = $('#bd-overlay');
let $iframe = null;
let isPaused = false;

function sendCommand(command) {
    if (!$iframe) return;
    let message = JSON.stringify({
        event: 'command',
        func: command,
        args: ''
    });
    $iframe[0].contentWindow.postMessage(message, '*');
}

$playBtn.on('click', function () {
    $videoContainer.show();
    
    if (!$iframe) {
        $iframe = $('#video-container').find('iframe');
    }
    
    if ($iframe && $iframe.length) {
        if (isPaused) {
            sendCommand('playVideo');
            isPaused = false;
            $playBtn.hide();
            $pauseBtn.show();
        } else {
            // Primera reproducción: el autoplay ya está en la URL
            $playBtn.hide();
            $pauseBtn.show();
            $overlay.addClass('video-active');
        }
    }
});

$pauseBtn.on('click', function () {
    if ($iframe && $iframe.length) {
        sendCommand('pauseVideo');
        isPaused = true;
        $pauseBtn.hide();
        $playBtn.show();
    }
});