// Importer les fonctions à tester
const { validateForm, togglePasswordVisibility } = require('../reinitialisation');

// Simuler un DOM pour Jest avec jsdom
document.body.innerHTML = `
    <form id="resetPasswordForm">
        <input id="mail" value="" />
        <span id="emailError"></span>
        <input id="nouveau_mot_de_passe" type="password" />
        <span id="passwordError"></span>
        <input id="confirmation_mot_de_passe" type="password" />
        <span id="confirmPasswordError"></span>
        <img id="eyeIcon" src="images/oeil.png" />
    </form>
`;

test('devrait afficher une erreur pour un email invalide', () => {
    document.getElementById('mail').value = "invalid-email";
    // Simuler la méthode .submit() pour éviter l'erreur
    const submitSpy = jest.spyOn(document.getElementById('resetPasswordForm'), 'submit').mockImplementation(() => {});
    validateForm();
    const emailError = document.getElementById('emailError').innerText;
    expect(emailError).toBe("Email invalide. Exemple : exemple@mail.com");
    // Vérifier que submit() n'a pas été appelé
    expect(submitSpy).not.toHaveBeenCalled();
    // Restaurer la méthode originale après le test
    submitSpy.mockRestore();
});

test('devrait afficher une erreur si le champ email est vide', () => {
    document.getElementById('mail').value = "";
    const submitSpy = jest.spyOn(document.getElementById('resetPasswordForm'), 'submit').mockImplementation(() => {});
    validateForm();
    const emailError = document.getElementById('emailError').innerText;
    expect(emailError).toBe("Ce champ est obligatoire.");
    // Vérifier que submit() n'a pas été appelé
    expect(submitSpy).not.toHaveBeenCalled();
    // Restaurer la méthode originale après le test
    submitSpy.mockRestore();
});

test('devrait afficher une erreur pour un mot de passe invalide', () => {
    document.getElementById('nouveau_mot_de_passe').value = "14546";
    const submitSpy = jest.spyOn(document.getElementById('resetPasswordForm'), 'submit').mockImplementation(() => {});
    validateForm();
    const passwordError = document.getElementById('passwordError').innerText;
    expect(passwordError).toBe("Le mot de passe doit contenir entre 8 et 12 caractères, une majuscule et un caractère spécial.");
    // Vérifier que submit() n'a pas été appelé
    expect(submitSpy).not.toHaveBeenCalled();
    // Restaurer la méthode originale après le test
    submitSpy.mockRestore();
});

test('devrait afficher une erreur si les mots de passe ne correspondent pas', () => {
    document.getElementById('nouveau_mot_de_passe').value = "Password1!";
    document.getElementById('confirmation_mot_de_passe').value = "Password2!";
    const submitSpy = jest.spyOn(document.getElementById('resetPasswordForm'), 'submit').mockImplementation(() => {});
    validateForm();
    const confirmPasswordError = document.getElementById('confirmPasswordError').innerText;
    expect(confirmPasswordError).toBe("Les mots de passe ne correspondent pas.");
    // Vérifier que submit() n'a pas été appelé
    expect(submitSpy).not.toHaveBeenCalled();
    // Restaurer la méthode originale après le test
    submitSpy.mockRestore();
});

test('devrait soumettre le formulaire si tout est valide', () => {
    document.getElementById('mail').value = "test@mail.com";
    document.getElementById('nouveau_mot_de_passe').value = "Password1!";
    document.getElementById('confirmation_mot_de_passe').value = "Password1!";
    const submitSpy = jest.spyOn(document.getElementById('resetPasswordForm'), 'submit').mockImplementation(() => {});
    validateForm();
    // Vérifier que submit() a été appelé
    expect(submitSpy).toHaveBeenCalled();
    // Restaurer la méthode originale après le test
    submitSpy.mockRestore();
});

test('devrait basculer la visibilité du mot de passe', () => {
    togglePasswordVisibility('nouveau_mot_de_passe', 'eyeIcon');
    const passwordField = document.getElementById('nouveau_mot_de_passe');
    const eyeIcon = document.getElementById('eyeIcon');
    expect(passwordField.type).toBe("text");
    expect(eyeIcon.src).toContain("images/cacher.png");
    
    // Bascule à nouveau pour tester la fermeture
    togglePasswordVisibility('nouveau_mot_de_passe', 'eyeIcon');
    expect(passwordField.type).toBe("password");
    expect(eyeIcon.src).toContain("images/oeil.png");
});
