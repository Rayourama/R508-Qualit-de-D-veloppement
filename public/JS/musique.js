document.addEventListener('DOMContentLoaded', function () {
    const audio = document.querySelector('audio');
    audio.volume = 0.1;
});

function playPause(index) {
    const audio = document.getElementById(`audio${index}`);
    if (audio.paused) {
        audio.play();
    } else {
        audio.pause();
    }
}

module.exports = {
    playPause
};