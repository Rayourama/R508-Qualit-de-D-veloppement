function validateForm() {
    // Réinitialisation des messages d'erreur

    const emailError = document.getElementById("emailError");
    if (emailError) emailError.innerText = "";

    // Récupération des valeurs des champs
    const mail = document.getElementById("mail").value;
    let isValid = true;

    // Validation de l'email
    /**/const emailRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
    if (!emailRegex.test(mail)) {
        document.getElementById("emailError").innerText = "Mail invalide. Exemple : exemple@mail.com";
        isValid = false;
    }

    if (mail.trim() === "") {
        document.getElementById("emailError").innerText = "Ce champ est obligatoire.";
        isValid = false;
    }

    // Si tous les champs sont valides, soumettre le formulaire
    if (isValid) {
        document.getElementById("registrationForm").submit();
    }
}

// Fonction pour afficher/masquer le mot de passe
function togglePasswordVisibility(passwordFieldId, eyeIconId) {
    const passwordField = document.getElementById(passwordFieldId);
    const eyeIcon = document.getElementById(eyeIconId);

    // Basculer le type du champ de mot de passe
    if (passwordField.type === "password") {
        passwordField.type = "text";
        eyeIcon.src = "images/cacher.png"; // Icône de l'œil ouvert
    } else {
        passwordField.type = "password";
        eyeIcon.src = "images/oeil.png"; // Icône de l'œil fermé
    }
}

module.exports = {
    validateForm,
    togglePasswordVisibility
};