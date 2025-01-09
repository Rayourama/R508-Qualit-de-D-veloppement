<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culture</title>
    <link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/culture.css">
</head>
<body>
    <!-- Inclure la navbar -->
    <?php include 'partials/navbar.php'; ?>

    <!-- Contenu principal -->
    <div class="Imageback">
        <h1 style="color: #fff;font-size: 75px;margin: 30px auto;width: 30%;text-align: center; margin-top: 90px;">Venez découvrir l'île papillon</h1>
    

    <!-- Contenu principal -->
    <div class="main-content">
        <p>
            Partez à la découverte de la culture antillaise ! Entre nourriture, musique, paysages et loisirs,
            plongez dans l’univers détendu et décontracté que vous offre l’île. Venez découvrir nos spécialités locales,
            vous détendre et profiter de nos magnifiques plages.
        </p>
    </div>
</div>
    <!-- Section des catégories -->
    <div class="vertical-blocks">
        <div class="block block1"><a style="color: white;" href="index.php?page=gastronomie"><img style="width: 100px;height: auto;margin-bottom: 10px;" src="images/gastronomie.png">Gastronomie</div></a>
        <div class="block block2"><a style="color: white;" href="index.php?page=musique"><img style="width: 100px;height: auto;margin-bottom: 10px;" src="images/musique.png">Musique</div></a>
        <div class="block block3"><a style="color: white;" href="index.php?page=loisirs"><img style="width: 80px;height: auto;margin-bottom: 10px;" src="images/loisirs.png"></a>Loisirs</div>
    </div>

    <?php require 'partials/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>