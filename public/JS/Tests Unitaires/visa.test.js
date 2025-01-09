// Importer la fonction à tester
const { validateForm } = require('../visa');

// Simuler un DOM pour Jest avec jsdom
document.body.innerHTML = `
    <form id="visaForm">
        <input id="mail" value="" />
        <span id="emailError"></span>
        <input id="nom" value="" />
        <span id="nomError"></span>
        <input id="prenom" value="" />
        <span id="prenomError"></span>
        <input id="telephone" value="" />
        <span id="telephoneError"></span>
        <input id="date_naissance" value="" />
        <span id="dateNaissanceError"></span>
        <input id="lieu_naissance" value="" />
        <span id="lieuNaissanceError"></span>
        <input id="nationalite" value="" />
        <span id="nationaliteError"></span>
        <input id="passeport" value="" />
        <span id="passeportError"></span>
        <input id="date_expiration_passeport" value="" />
        <span id="dateExpirationError"></span>
    </form>
`;

test('devrait afficher une erreur pour un email invalide', () => {
    document.getElementById('mail').value = "ryan";
    const submitSpy = jest.spyOn(document.getElementById('visaForm'), 'submit').mockImplementation(() => {});
    validateForm();
    const emailError = document.getElementById('emailError').innerText;
    expect(emailError).toBe("Email invalide. Exemple : exemple@mail.com");
    expect(submitSpy).not.toHaveBeenCalled();
    submitSpy.mockRestore();
});

test('devrait afficher une erreur si le champ email est vide', () => {
    document.getElementById('mail').value = "";
    const submitSpy = jest.spyOn(document.getElementById('visaForm'), 'submit').mockImplementation(() => {});
    validateForm();
    const emailError = document.getElementById('emailError').innerText;
    expect(emailError).toBe("Ce champ est obligatoire.");
    expect(submitSpy).not.toHaveBeenCalled();
    submitSpy.mockRestore();
});

test('devrait afficher une erreur si le nom est invalide', () => {
    document.getElementById('nom').value = "J@ne";
    const submitSpy = jest.spyOn(document.getElementById('visaForm'), 'submit').mockImplementation(() => {});
    validateForm();
    const nomError = document.getElementById('nomError').innerText;
    expect(nomError).toBe("Veuillez entrez un nom valide");
    expect(submitSpy).not.toHaveBeenCalled();
    submitSpy.mockRestore();
});

test('devrait afficher une erreur si le prénom est invalide', () => {
    document.getElementById('prenom').value = "J@ne";
    const submitSpy = jest.spyOn(document.getElementById('visaForm'), 'submit').mockImplementation(() => {});
    validateForm();
    const prenomError = document.getElementById('prenomError').innerText;
    expect(prenomError).toBe("Veuillez entrez un prénom valide");
    expect(submitSpy).not.toHaveBeenCalled();
    submitSpy.mockRestore();
});

test('devrait afficher une erreur pour un numéro de téléphone invalide', () => {
    document.getElementById('telephone').value = "abcd";
    const submitSpy = jest.spyOn(document.getElementById('visaForm'), 'submit').mockImplementation(() => {});
    validateForm();
    const phoneError = document.getElementById('telephoneError').innerText;
    expect(phoneError).toBe("Numéro invalide");
    expect(submitSpy).not.toHaveBeenCalled();
    submitSpy.mockRestore();
});

test('devrait afficher une erreur si la date de naissance est dans le futur', () => {
    document.getElementById('date_naissance').value = "2025-01-01";
    const submitSpy = jest.spyOn(document.getElementById('visaForm'), 'submit').mockImplementation(() => {});
    validateForm();
    const dateNaissanceError = document.getElementById('dateNaissanceError').innerText;
    expect(dateNaissanceError).toBe("Date de naissance invalide");
    expect(submitSpy).not.toHaveBeenCalled();
    submitSpy.mockRestore();
});

test('devrait afficher une erreur si la date d\'expiration du passeport est trop éloignée', () => {
    document.getElementById('date_expiration_passeport').value = "2050-01-01";
    const submitSpy = jest.spyOn(document.getElementById('visaForm'), 'submit').mockImplementation(() => {});
    validateForm();
    const dateExpirationError = document.getElementById('dateExpirationError').innerText;
    expect(dateExpirationError).toBe("Date d'expiration invalide");
    expect(submitSpy).not.toHaveBeenCalled();
    submitSpy.mockRestore();
});

test('devrait soumettre le formulaire si tous les champs sont valides', () => {
    document.getElementById('mail').value = "test@mail.com";
    document.getElementById('nom').value = "Dupont";
    document.getElementById('prenom').value = "Jean";
    document.getElementById('telephone').value = "+33 1 23 45 67 89";
    document.getElementById('date_naissance').value = "1990-01-01";
    document.getElementById('lieu_naissance').value = "Paris";
    document.getElementById('nationalite').value = "Française";
    document.getElementById('passeport').value = "123456789";
    document.getElementById('date_expiration_passeport').value = "2035-01-01";
    const submitSpy = jest.spyOn(document.getElementById('visaForm'), 'submit').mockImplementation(() => {});
    validateForm();
    expect(submitSpy).toHaveBeenCalled();
    submitSpy.mockRestore();
});
