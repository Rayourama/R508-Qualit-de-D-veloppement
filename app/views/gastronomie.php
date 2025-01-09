<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastronomie</title>
    <link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/gastronomie.css">
</head>
<body>

<style>
    .table-container {
    margin: 100px auto;
    padding: 20px;
    max-width: 80%;
    background: rgba(0, 0, 0, 0.7); /* Fond semi-transparent */
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    color: black;
}

.table {
    width: 100%;
    margin: auto;
}

.table-img {
    max-width: 150px;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
}
</style>
    <!-- Inclure la navbar -->
    <?php require 'partials/navbar.php'; ?>

    <div class="container table-container">
    <h1 class="text-center text-white mb-5">Découvrez les plats emblématiques créoles</h1>
    <table class="table table-dark table-striped text-center">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Plat</th>
                <th>Histoire</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><img src="images/dombres.jpg" alt="Dombrés" class="table-img"></td>
                <td>Dombrés</td>
                <td>Les dombrés, petits boules de farine mijotées dans une sauce savoureuse, sont un pilier de la gastronomie antillaise. Ils symbolisent la simplicité et l'ingéniosité des recettes créoles.</td>
            </tr>
            <tr>
                <td><img src="images/bokit.png" alt="Bokit" class="table-img"></td>
                <td>Bokits</td>
                <td>Le bokit, un sandwich frit typiquement guadeloupéen, est né de l'ingéniosité des Antillais et s'est imposé comme un incontournable de la street food locale.</td>
            </tr>
            <tr>
                <td><img src="images/colombo.jpg" alt="Colombo" class="table-img"></td>
                <td>Colombo</td>
                <td>Le colombo, plat parfumé aux épices et inspiré de la cuisine indienne, incarne les influences multiculturelles de la cuisine caribéenne.</td>
            </tr>
            <tr>
                <td><img src="images/racines.jpg" alt="Racines" class="table-img"></td>
                <td>Racines</td>
                <td>Les racines, telles que les ignames et le manioc, sont des ingrédients de base dans de nombreux plats créoles. Elles sont souvent bouillies ou écrasées et accompagnent diverses viandes et sauces.</td>
            </tr>
            <tr>
                <td><img src="images/chodo.jpg" alt="Chodo" class="table-img"></td>
                <td>Chodo</td>
                <td>Le chodo est une boisson chaude et gourmande à la texture d’une crème anglaise. En Guadeloupe le chaudeau est servi lors des cérémonies (mariages, baptêmes, communions…) Il est accompagné du fameux gâteau fouetté, mais avec n’importe quel gâteau c’est très bon !</td>
            </tr>
            <tr>
                <td><img src="images/boudin.jpg" alt="Boudin" class="table-img"></td>
                <td>Boudin</td>
                <td>Le boudin créole, souvent préparé à base de viande de porc et d'épices, est un incontournable des fêtes et repas familiaux dans les îles des Caraïbes.</td>
            </tr>
            <tr>
                <td><img src="images/accras.jpg" alt="Accras" class="table-img"></td>
                <td>Accras</td>
                <td>Les accras sont de petites bouchées frites à base de morue, d'épices et de légumes. Ils sont servis en apéritif ou en snack dans la cuisine créole.</td>
            </tr>
        </tbody>
    </table>
</div>/

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
    <?php require 'partials/footer.php'; ?>
</html>