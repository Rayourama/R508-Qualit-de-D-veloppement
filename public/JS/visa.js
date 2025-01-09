document.addEventListener('DOMContentLoaded', () => {
    // Obtenez la date actuelle
    const today = new Date();

    // Format de la date pour les champs input (YYYY-MM-DD)
    const formatDate = (date) => {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    };

    // Champ date de naissance : max = aujourd'hui
    const dateNaissanceInput = document.getElementById('date_naissance');
    dateNaissanceInput.setAttribute('max', formatDate(today));

    // Champ date d'expiration du passeport : max = aujourd'hui + 30 ans
    const dateExpirationInput = document.getElementById('date_expiration_passeport');
    const expirationDate = new Date(today);
    expirationDate.setFullYear(today.getFullYear() + 17);
    dateExpirationInput.setAttribute('max', formatDate(expirationDate));
});



function validateForm() {
    // Réinitialisation des messages d'erreur
    document.getElementById("emailError").innerText = "";
    document.getElementById("nomError").innerText = "";
    document.getElementById("prenomError").innerText = "";
    document.getElementById("telephoneError").innerText = "";
    document.getElementById("dateNaissanceError").innerText = "";
    document.getElementById("lieuNaissanceError").innerText = "";
    document.getElementById("nationaliteError").innerText = "";
    document.getElementById("passeportError").innerText = "";
    document.getElementById("dateExpirationError").innerText = "";

    // Récupération des valeurs des champs
    const mail = document.getElementById("mail").value;
    const nom = document.getElementById("nom").value;
    const prenom = document.getElementById("prenom").value;
    const tel = document.getElementById("telephone").value;
    const dateNaissance = document.getElementById("date_naissance").value;
    const lieuNaissance = document.getElementById("lieu_naissance").value;
    const nationalite = document.getElementById("nationalite").value;
    const passeport = document.getElementById("passeport").value;
    const dateExp = document.getElementById("date_expiration_passeport").value;

    const today = new Date();
    const naissance = new Date(dateNaissance);
    const expiration = new Date(dateExp);
    let isValid = true;

    // Validation du nom
    const nameRegex = /^[A-Za-zÀ-ÖØ-öø-ÿ\- ]{2,50}$/;
    if (!nameRegex.test(nom)) {
        document.getElementById("nomError").innerText = "Veuillez entrez un nom valide";
        isValid = false;
    }

    if (nom.trim() === "") {
        document.getElementById("nomError").innerText = "Ce champ est obligatoire.";
        isValid = false;
    }

    // Validation du prénom
    if (!nameRegex.test(prenom)) {
        document.getElementById("prenomError").innerText = "Veuillez entrez un prénom valide";
        isValid = false;
    }

    if (prenom.trim() === "") {
        document.getElementById("prenomError").innerText = "Ce champ est obligatoire.";
        isValid = false;
    }

    // Validation du téléphone
    const phoneRegex = /^(\+?\d{1,4}[-.\s]?)?(\(?\d{2,4}\)?[-.\s]?)?[\d\s.-]{3,15}$/;
    if (!phoneRegex.test(tel)) {
        document.getElementById("telephoneError").innerText = "Numéro invalide";
        isValid = false;
    }

    if (tel.trim() === "") {
        document.getElementById("telephoneError").innerText = "Ce champ est obligatoire.";
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

    // Date de naissance
    if (dateNaissance.trim() === "") {
        document.getElementById("dateNaissanceError").innerText = "Ce champ est obligatoire.";
        isValid = false;
    }

    if (naissance > today){
        document.getElementById("dateNaissanceError").innerText = "Date de naissance invalide";
        isValid = false;
    }

    // Lieu de naissance
    if (!nameRegex.test(lieuNaissance)) {
        document.getElementById("lieuNaissanceError").innerText = "Veuillez entrez un lieu valide";
        isValid = false;
    }

    if (lieuNaissance.trim() === "") {
        document.getElementById("lieuNaissanceError").innerText = "Ce champ est obligatoire.";
        isValid = false;
    }

    //Nationalité
    if (nationalite.trim() === "") {
        document.getElementById("nationaliteError").innerText = "Ce champ est obligatoire.";
        isValid = false;
    }

    //Passeport
    if (passeport.trim() === "") {
        document.getElementById("passeportError").innerText = "Ce champ est obligatoire.";
        isValid = false;
    }

    //Expiration Passeport
    if (dateExp.trim() === "") {
        document.getElementById("dateExpirationError").innerText = "Ce champ est obligatoire.";
        isValid = false;
    }

    const maxExpirationDate = new Date(today);
    maxExpirationDate.setFullYear(today.getFullYear() + 17);
    if(expiration > maxExpirationDate){
        document.getElementById("dateExpirationError").innerText = "Date d'expiration invalide";
        isValid = false;
    }


    // Si tous les champs sont valides, soumettre le formulaire
    if (isValid) {
        document.getElementById("visaForm").submit();
    }

}

module.exports = {
    validateForm
};