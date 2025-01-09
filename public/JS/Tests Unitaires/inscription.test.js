// Importer les fonctions à tester
const { validateForm, togglePasswordVisibility } = require('../inscription');

// Simuler un DOM pour Jest avec jsdom
document.body.innerHTML = `
    <form id="registrationForm">
        <input id="mail" value="" />
        <span id="emailError"></span>
        <input id="nom" value="" />
        <span id="nomError"></span>
        <input id="prenom" value="" />
        <span id="prenomError"></span>
        <input id="mot_de_passe" type="password" />
        <span id="passwordError"></span>
        <input id="confirmer_mot_de_passe" type="password" />
        <span id="confirmPasswordError"></span>
        <button type="submit">Submit</button>
    </form>
`;

// Tests pour validateForm
test('devrait afficher une erreur pour un email invalide', () => {
    document.getElementById('mail').value = "invalid-email";
    validateForm();
    const emailError = document.getElementById('emailError').innerText;
    expect(emailError).toBe("Mail invalide. Exemple : exemple@mail.com");
});

test('devrait afficher une erreur pour un email vide', () => {
    document.getElementById('mail').value = "";
    validateForm();
    const emailError = document.getElementById('emailError').innerText;
    expect(emailError).toBe("Ce champ est obligatoire.");
});

test('devrait afficher une erreur pour un nom vide', () => {
    document.getElementById('nom').value = "";
    validateForm();
    const nomError = document.getElementById('nomError').innerText;
    expect(nomError).toBe("Ce champ est obligatoire.");
});

test('devrait afficher une erreur pour un nom invalide', () => {
    document.getElementById('nom').value = "A"; // nom trop court
    validateForm();
    const nomError = document.getElementById('nomError').innerText;
    expect(nomError).toBe("Veuillez entrez un nom valide");
});

test('devrait afficher une erreur pour un prénom vide', () => {
    document.getElementById('prenom').value = "";
    validateForm();
    const prenomError = document.getElementById('prenomError').innerText;
    expect(prenomError).toBe("Ce champ est obligatoire.");
});

test('devrait afficher une erreur pour un prénom invalide', () => {
    document.getElementById('prenom').value = "1234"; // prénom trop court
    validateForm();
    const prenomError = document.getElementById('prenomError').innerText;
    expect(prenomError).toBe("Veuillez entrez un prénom valide");
});

test('devrait afficher une erreur pour un mot de passe vide', () => {
    document.getElementById('mot_de_passe').value = "";
    validateForm();
    const passwordError = document.getElementById('passwordError').innerText;
    expect(passwordError).toBe("Ce champ est obligatoire.");
});

test('devrait afficher une erreur pour un mot de passe invalide', () => {
    document.getElementById('mot_de_passe').value = "password"; // Pas assez sécurisé
    validateForm();
    const passwordError = document.getElementById('passwordError').innerText;
    expect(passwordError).toBe("Le mot de passe doit contenir entre 8 et 12 caractères, une majuscule et un caractère spécial.");
});

test('devrait afficher une erreur si les mots de passe ne correspondent pas', () => {
    document.getElementById('mot_de_passe').value = "Password1!";
    document.getElementById('confirmer_mot_de_passe').value = "Password2!";
    validateForm();
    const confirmPasswordError = document.getElementById('confirmPasswordError').innerText;
    expect(confirmPasswordError).toBe("Les mots de passe ne correspondent pas.");
});

test('devrait soumettre le formulaire si tout est valide', () => {
    // Simuler des valeurs valides
    document.getElementById('mail').value = "valid.email@example.com";
    document.getElementById('nom').value = "John";
    document.getElementById('prenom').value = "Doe";
    document.getElementById('mot_de_passe').value = "Password1!";
    document.getElementById('confirmer_mot_de_passe').value = "Password1!";

    // Espionner la méthode .submit() pour vérifier qu'elle est appelée
    const submitSpy = jest.spyOn(document.getElementById('registrationForm'), 'submit').mockImplementation(() => {});

    validateForm();

    // Vérifier qu'aucune erreur n'est affichée
    expect(document.getElementById('emailError').innerText).toBe("");
    expect(document.getElementById('nomError').innerText).toBe("");
    expect(document.getElementById('prenomError').innerText).toBe("");
    expect(document.getElementById('passwordError').innerText).toBe("");
    expect(document.getElementById('confirmPasswordError').innerText).toBe("");

    // Vérifier que la méthode .submit() a bien été appelée
    expect(submitSpy).toHaveBeenCalled();

    // Restaurer la méthode .submit() originale après le test
    submitSpy.mockRestore();
});

// Tests pour togglePasswordVisibility
test('devrait basculer la visibilité du mot de passe', () => {
    document.body.innerHTML += `
        <input id="mot_de_passe" type="password" />
        <img id="eyeIcon" src="images/oeil.png" />
    `;
    togglePasswordVisibility('mot_de_passe', 'eyeIcon');
    const passwordField = document.getElementById('mot_de_passe');
    const eyeIcon = document.getElementById('eyeIcon');
    expect(passwordField.type).toBe("text");
    expect(eyeIcon.src).toContain("images/cacher.png");

    togglePasswordVisibility('mot_de_passe', 'eyeIcon');
    expect(passwordField.type).toBe("password");
    expect(eyeIcon.src).toContain("images/oeil.png");
});
