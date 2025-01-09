// Importer les fonctions à tester
const { validateForm, togglePasswordVisibility } = require('../connexion');

// Simuler un DOM pour Jest avec jsdom
document.body.innerHTML = `
    <form id="registrationForm">
        <input id="mail" value="" />
        <span id="emailError"></span>
        <input id="password" type="password" />
        <img id="eyeIcon" src="images/oeil.png" />
    </form>
`;

test('devrait afficher une erreur pour un email invalide', () => {
    document.getElementById('mail').value = "invalid-email";
    // Simuler la méthode .submit() pour éviter l'erreur
    const submitSpy = jest.spyOn(document.getElementById('registrationForm'), 'submit').mockImplementation(() => {});
    validateForm();
    const emailError = document.getElementById('emailError').innerText;
    expect(emailError).toBe("Mail invalide. Exemple : exemple@mail.com");
    // Vérifier que submit() n'a pas été appelé
    expect(submitSpy).not.toHaveBeenCalled();
    // Restaurer la méthode originale après le test
    submitSpy.mockRestore();
});

test('devrait afficher une erreur si le champ est vide', () => {
    document.getElementById('mail').value = "";
    const submitSpy = jest.spyOn(document.getElementById('registrationForm'), 'submit').mockImplementation(() => {});
    validateForm();
    const emailError = document.getElementById('emailError').innerText;
    expect(emailError).toBe("Ce champ est obligatoire.");
    // Vérifier que submit() n'a pas été appelé
    expect(submitSpy).not.toHaveBeenCalled();
    // Restaurer la méthode originale après le test
    submitSpy.mockRestore();
});

test('ne devrait pas afficher d\'erreur pour un email valide', () => {
    document.getElementById('mail').value = "test@mail.com";
    const submitSpy = jest.spyOn(document.getElementById('registrationForm'), 'submit').mockImplementation(() => {});
    validateForm();
    const emailError = document.getElementById('emailError').innerText;
    expect(emailError).toBe("");
    // Vérifier que submit() a été appelé
    expect(submitSpy).toHaveBeenCalled();
    // Restaurer la méthode originale après le test
    submitSpy.mockRestore();
});

test('devrait basculer la visibilité du mot de passe', () => {
    togglePasswordVisibility('password', 'eyeIcon');
    const passwordField = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    expect(passwordField.type).toBe("text");
    expect(eyeIcon.src).toContain("images/cacher.png");
    
    // Bascule à nouveau pour tester la fermeture
    togglePasswordVisibility('password', 'eyeIcon');
    expect(passwordField.type).toBe("password");
    expect(eyeIcon.src).toContain("images/oeil.png");
});
