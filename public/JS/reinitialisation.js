function validateForm() {
    // Réinitialisation des messages d'erreur
    /*document.getElementById("emailError").innerText = "";*/

    const emailError = document.getElementById("emailError");
    if (emailError) emailError.innerText = "";

    
    document.getElementById("passwordError").innerText = "";
    document.getElementById("confirmPasswordError").innerText = "";

    // Récupération des valeurs des champs
    const mail = document.getElementById("mail").value;
    const motDePasse = document.getElementById("nouveau_mot_de_passe").value;
    const confirmerMotDePasse = document.getElementById("confirmation_mot_de_passe").value;
    let isValid = true;

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

    // Validation du mot de passe
    const passwordRegex = /^(?=.*[A-Z])(?=.*[!@#$%^&*"'-+,?;.:§^¨£<>])[A-Za-z\d!@#$%^&*"'-+,?;.:§^¨£<>]{8,12}$/;
    if (!passwordRegex.test(motDePasse)) {
        document.getElementById("passwordError").innerText = "Le mot de passe doit contenir entre 8 et 12 caractères, une majuscule et un caractère spécial.";
        isValid = false;
    }

    // Validation de la confirmation du mot de passe
    if (motDePasse !== confirmerMotDePasse) {
        document.getElementById("confirmPasswordError").innerText = "Les mots de passe ne correspondent pas.";
        isValid = false;
    }

    // Si tous les champs sont valides, soumettre le formulaire
    if (isValid) {
        document.getElementById("resetPasswordForm").submit();
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