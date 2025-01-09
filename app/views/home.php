<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/accueil.css">
</head>

<!-- Inclure la barre de navigation -->
<?php require 'partials/navbar.php'; ?>


<!-- Section de fond avec un message de bienvenue -->
<div class="background-image">

<div class="vertical-black-box">
    <h2>Fiche pratique</h2>
    <img src="images/ryan.jpg" alt="Président" class="center-image">
    <h2 class="desc-president">Ryan Ramassamy, actuel président</h2>
    <ul>
        <li>Monnaie : Euro</li>
        <li>Langues officielles : Français et créole</li>
        <li>Capitale : Basse-Terre</li>
        <li>Superficie : 1 628,43 km <sup>2</sup></li>
        <li>Nombre d'habitants : 378 561 (2024)</li>
    </ul>
</div>



    <div class="welcome-message">
        <h1 class="hello">Nou kontan vwè zot !</h1>
    </div>
    
    <div class="carousel-container">
    <span class="arrow arrow-left" onclick="prevSlide()">
        <button type="button" class="sr-only-focusable">&#9664;</button>
    </span>

    <div class="carousel-wrapper">
        <div class="slides">
            <div class="content-container">
            <a id="carousel-link" href="page_teddy_riner.php" target="_blank">
                <img id="carousel-image" src="images/back.jpg" alt="Image 1" class="carousel-image">
                <div class="text-container">
                    <h2 id="carousel-title">Retour de Teddy Riner après les JO 2024 : Il raconte son expérience olympienne</h2>
                </div></a>
            </div>
        </div>
    </div>

    <span class="arrow arrow-right" onclick="nextSlide()">
        <button type="button" class="sr-only-focusable">&#9654;</button>
    </span>
</div>

</div>

<?php require 'partials/footer.php'; ?>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Tableau contenant les données pour chaque slide (image, titre, description)
    const slides = [
    {
        image: "images/back.jpg",
        title: "Retour de Teddy Riner après les JO 2024 : Il raconte son expérience olympienne",
        description: "",
        url: "page_teddy_riner.php"
    },
    {
        image: "images/thuram.jpg",
        title: "Lilian Thuram se dit légitime à accéder au pouvoir",
        description: "",
        url: "page_lilian_thuram.php"
    },
    {
        image: "images/macron.jpg",
        title: "Emmanuel Macron : Que lui reproche t'on à lui ainsi qu'à la France ?",
        description: "",
        url: "page_macron.php"
    },
    {
        image: "images/barracuda.jpg",
        title: "Attaque de barracuda à Sainte-Anne : Que sait-on ?",
        description: "",
        url: "page_barracuda.php"
    },
    {
        image: "images/henry.jpg",
        title: "Thierry Henry revient sur le ballon d'or qu'il n'a jamais gagné.",
        description: "",
        url: "page_thierry_henry.php"
    }
];

let currentIndex = 0;

// Met à jour la slide en fonction de l'index actuel
function updateSlide() {
    const slide = slides[currentIndex];
    const carouselLink = document.getElementById("carousel-link")
    const carouselImage = document.getElementById("carousel-image");
    const carouselTitle = document.getElementById("carousel-title");
    const textContainer = document.querySelector(".text-container");

    // Met à jour l'image
    carouselImage.src = slide.image;
    carouselImage.alt = slide.title;

    // Met à jour le titre et la description
    carouselTitle.innerText = slide.title;

    // Rendre le slide cliquable via un lien
    carouselLink.href = slide.url;
    carouselLink.target = "_blank"; // Ouvrir dans un nouvel onglet (facultatif)
    carouselLink.style.textDecoration = "none"; // Supprimer le soulignement si appliqué au titre
}


// Passe à la slide précédente
function prevSlide() {
    currentIndex = (currentIndex === 0) ? slides.length - 1 : currentIndex - 1;
    updateSlide();
}

// Passe à la slide suivante
function nextSlide() {
    currentIndex = (currentIndex === slides.length - 1) ? 0 : currentIndex + 1;
    updateSlide();
}

// Initialiser la première slide
updateSlide();

// Ajouter un intervalle pour changer automatiquement de slide toutes les 7 secondes
setInterval(nextSlide, 7000);
</script>

</html>
