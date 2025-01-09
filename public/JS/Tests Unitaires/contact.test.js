// Importer la fonction à tester
const { validateForm } = require('../contact');

// Simuler un DOM pour Jest avec jsdom
document.body.innerHTML = `
    <form id="contactForm">
        <input id="mail" value="" />
        <span id="emailError"></span>
        <input id="name" value="" />
        <span id="nomError"></span>
        <input id="phone" value="" />
        <span id="telError"></span>
        <select id="contact-type">
            <option value="">Choisir un type de contact</option>
            <option value="email">Email</option>
            <option value="phone">Phone</option>
        </select>
        <span id="selectError"></span>
        <textarea id="message"></textarea>
        <span id="messageError"></span>
        <button type="submit">Submit</button>
    </form>
`;

// Tests pour validateForm
test('devrait afficher une erreur pour un nom vide', () => {
    document.getElementById('name').value = "";
    validateForm();
    const nomError = document.getElementById('nomError').innerText;
    expect(nomError).toBe("Ce champ est obligatoire.");
});

test('devrait afficher une erreur pour un nom invalide', () => {
    document.getElementById('name').value = "A"; // nom trop court
    validateForm();
    const nomError = document.getElementById('nomError').innerText;
    expect(nomError).toBe("Veuillez entrez un nom valide");
});

test('devrait afficher une erreur pour un email invalide', () => {
    document.getElementById('mail').value = "invalid-email";
    validateForm();
    const emailError = document.getElementById('emailError').innerText;
    expect(emailError).toBe("Email invalide. Exemple : exemple@mail.com");
});

test('devrait afficher une erreur pour un email vide', () => {
    document.getElementById('mail').value = "";
    validateForm();
    const emailError = document.getElementById('emailError').innerText;
    expect(emailError).toBe("Ce champ est obligatoire.");
});

test('devrait afficher une erreur pour un téléphone invalide', () => {
    document.getElementById('phone').value = "xyz"; // Numéro trop court
    validateForm();
    const telError = document.getElementById('telError').innerText;
    expect(telError).toBe("Numéro invalide");
});

test('devrait afficher une erreur pour un téléphone vide', () => {
    document.getElementById('phone').value = "";
    validateForm();
    const telError = document.getElementById('telError').innerText;
    expect(telError).toBe("Ce champ est obligatoire.");
});

test('devrait afficher une erreur pour une sélection vide', () => {
    document.getElementById('contact-type').value = "";
    validateForm();
    const selectError = document.getElementById('selectError').innerText;
    expect(selectError).toBe("Ce champ est obligatoire.");
});

test('devrait afficher une erreur pour un message vide', () => {
    document.getElementById('message').value = "";
    validateForm();
    const messageError = document.getElementById('messageError').innerText;
    expect(messageError).toBe("Ce champ est obligatoire.");
});

test('devrait soumettre le formulaire si tout est valide', () => {
    // Simuler des valeurs valides
    document.getElementById('name').value = "John Doe";
    document.getElementById('mail').value = "john.doe@example.com";
    document.getElementById('phone').value = "+123456789";
    document.getElementById('contact-type').value = "email";
    document.getElementById('message').value = "Ceci est un message.";

    // Espionner la méthode .submit() pour vérifier qu'elle est appelée
    const submitSpy = jest.spyOn(document.getElementById('contactForm'), 'submit').mockImplementation(() => {});

    validateForm();

    // Vérifier qu'aucune erreur n'est affichée
    expect(document.getElementById('emailError').innerText).toBe("");
    expect(document.getElementById('nomError').innerText).toBe("");
    expect(document.getElementById('telError').innerText).toBe("");
    expect(document.getElementById('selectError').innerText).toBe("");
    expect(document.getElementById('messageError').innerText).toBe("");

    // Vérifier que la méthode .submit() a bien été appelée
    expect(submitSpy).toHaveBeenCalled();

    // Restaurer la méthode .submit() originale après le test
    submitSpy.mockRestore();
});
