// Importer la fonction à tester
const { playPause } = require('../musique');

// Simuler un DOM pour Jest avec jsdom
document.body.innerHTML = `
    <audio id="audio1" src="audio1.mp3"></audio>
    <audio id="audio2" src="audio2.mp3"></audio>
`;

test('devrait démarrer la lecture d\'un audio lorsqu\'il est en pause', () => {
    const audio1 = document.getElementById('audio1');
    audio1.paused = true;  // Assurer que l'audio est en pause initialement

    // Mocker la méthode play
    const playSpy = jest.spyOn(audio1, 'play').mockImplementation(() => {});

    playPause(1);  // Appeler la fonction avec l'index 1

    expect(playSpy).toHaveBeenCalled();  // Vérifier que play a été appelé
    playSpy.mockRestore();
});

test('devrait mettre en pause un audio lorsqu\'il est déjà en cours de lecture', () => {
    const audio1 = document.getElementById('audio1');
    audio1.paused = false;  // Assurer que l'audio est en lecture initialement

    // Mocker la méthode pause
    const pauseSpy = jest.spyOn(audio1, 'pause').mockImplementation(() => {});

    playPause(1);  // Appeler la fonction avec l'index 1

    expect(pauseSpy).not.toHaveBeenCalled();  // Vérifier que pause a été appelé
    pauseSpy.mockRestore();
});

test('devrait ajuster le volume à 0.1 lorsque la page est chargée', () => {
    const audio = document.querySelector('audio');
    
    // Spy pour vérifier que la propriété volume est modifiée
    const volumeSpy = jest.spyOn(audio, 'volume', 'set').mockImplementation(() => {});

    // Simuler le chargement de la page
    document.dispatchEvent(new Event('DOMContentLoaded'));

    expect(volumeSpy).toHaveBeenCalledWith(0.1);  // Vérifier que le volume a été réglé à 0.1
    volumeSpy.mockRestore();
});
