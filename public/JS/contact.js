function validateForm() {
    // Réinitialisation des messages d'erreur

    const emailError = document.getElementById("emailError");
    if (emailError) emailError.innerText = "";
    document.getElementById("nomError").innerText = "";
    document.getElementById("telError").innerText = "";
    document.getElementById("selectError").innerText = "";
    document.getElementById("messageError").innerText = "";

    // Récupération des valeurs des champs
    const mail = document.getElementById("mail").value;
    const nom = document.getElementById("name").value;
    const tel = document.getElementById("phone").value;
    const select = document.getElementById("contact-type").value;
    const message = document.getElementById("message").value;
    let isValid = true;

    const nameRegex = /^[A-Za-zÀ-ÖØ-öø-ÿ\- ]{2,50}$/;
    if (!nameRegex.test(nom)) {
        document.getElementById("nomError").innerText = "Veuillez entrez un nom valide";
        isValid = false;
    }
    // Validation du nom
    if (nom.trim() === "") {
        document.getElementById("nomError").innerText = "Ce champ est obligatoire.";
        isValid = false;
    }

    // Validation de l'email
    const emailRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
    if (!emailRegex.test(mail)) {
        document.getElementById("emailError").innerText = "Email invalide. Exemple : exemple@mail.com";
        isValid = false;
    }

    if (mail.trim() === "") {
        document.getElementById("emailError").innerText = "Ce champ est obligatoire.";
        isValid = false;
    }

    const phoneRegex = /^(\+?\d{1,4}[-.\s]?)?(\(?\d{2,4}\)?[-.\s]?)?[\d\s.-]{3,15}$/;
    if (!phoneRegex.test(tel)) {
        document.getElementById("telError").innerText = "Numéro invalide";
        isValid = false;
    }

    if (tel.trim() === "") {
        document.getElementById("telError").innerText = "Ce champ est obligatoire.";
        isValid = false;
    }

    if (select.trim() === "") {
        document.getElementById("selectError").innerText = "Ce champ est obligatoire.";
        isValid = false;
    }

    if (message.trim() === "") {
        document.getElementById("messageError").innerText = "Ce champ est obligatoire.";
        isValid = false;
    }

    // Si tous les champs sont valides, soumettre le formulaire
    if (isValid) {
        document.getElementById("contactForm").submit();
    }
}

module.exports = {
    validateForm
};