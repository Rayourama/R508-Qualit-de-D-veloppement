<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musique</title>
    <link href='https://fonts.googleapis.com/css?family=Chewy' rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/musique.css">
</head>
<style>
    .button-primary {
    background-color: #007bff;
    border: none;
    padding: 10px 20px;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

.button-primary:hover {
    background-color: #0056b3;
}
</style>
<body>
    <!-- Inclure la navbar -->
    <?php require 'partials/navbar.php'; ?>

    <!-- Contenu principal -->
    <div class="container">
        <h1>Découvrez l'univers musical créole</h1>
        <p>La culture musicale en Guadeloupe est un véritable mélange de rythmes et d’influences, 
            reflet de son histoire et de sa diversité. Le zouk, né dans les années 1980 grâce à des 
            groupes emblématiques comme Kassav', est sans doute le style le plus emblématique de l’archipel, 
            mariant rythmes caribéens, mélodies entraînantes et paroles souvent en créole. À côté de cela, le bouyon, 
            importé de la Dominique voisine, a gagné en popularité grâce à ses beats percutants et son énergie festive, 
            séduisant particulièrement les jeunes générations. La Guadeloupe entretient également une relation musicale 
            étroite avec Haïti, notamment à travers le kompa, qui a influencé et été influencé par le zouk. Cette connexion 
            illustre les liens profonds entre les cultures caribéennes, où les échanges musicaux nourrissent une créativité 
            sans cesse renouvelée, renforçant l’identité culturelle de la région.</p>
    </div>

    <div class="table-container">
    <h1 class="text-center text-white mb-5">Découvrez les morceaux créoles</h1>
    <div class="table-responsive">
        <table class="table table-dark table-bordered table-striped mt-5 text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Titre</th>
                    <th>Artiste</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Zouk La Sé Sèl Médikaman Nou Ni</td>
                    <td>Kassav'</td>
                    <td>
                        <button class="btn button-primary" onclick="playPause(0)">Lecture/Pause</button>
                        <audio id="audio0" src="audio/Zouk La Sé Sel Médikaman Nou Ni.mp3"></audio>
                    </td>
                </tr>
                <tr>
                    <td>Inmew en secret</td>
                    <td>Leila Chicot</td>
                    <td>
                        <button class="btn button-primary" onclick="playPause(8)">Lecture/Pause</button>
                        <audio id="audio8" src="audio/15 Inmew En Secret(Leila Chicot).mp3"></audio>
                    </td>
                </tr>
                <tr>
                    <td>Tu es mon soleil</td>
                    <td>Princesse Lover</td>
                    <td>
                        <button class="btn button-primary" onclick="playPause(2)">Lecture/Pause</button>
                        <audio id="audio2" src="audio/Tu Es Mon Soleil.mp3"></audio>
                    </td>
                </tr>
                <tr>
                    <td>Okay</td>
                    <td>Fanny J</td>
                    <td>
                        <button class="btn button-primary" onclick="playPause(3)">Lecture/Pause</button>
                        <audio id="audio3" src="audio/faany j - okay.mp3"></audio>
                    </td>
                </tr>
                <tr>
                    <td>Je l'aime</td>
                    <td>Fanny J</td>
                    <td>
                        <button class="btn button-primary" onclick="playPause(4)">Lecture/Pause</button>
                        <audio id="audio4" src="audio/je l'aime.mp3"></audio>
                    </td>
                </tr>
                <tr>
                    <td>Ghetto face à face</td>
                    <td>Jim Rama ft Patrick Andrey</td>
                    <td>
                        <button class="btn button-primary" onclick="playPause(9)">Lecture/Pause</button>
                        <audio id="audio9" src="audio/ghetto face a face.mp3"></audio>
                    </td>
                </tr>
                <tr>
                    <td>Comme avant</td>
                    <td>Jocelyne Labille</td>
                    <td>
                        <button class="btn button-primary" onclick="playPause(11)">Lecture/Pause</button>
                        <audio id="audio11" src="audio/jocelyne labille - comme avant.mp3"></audio>
                    </td>
                </tr>
                <tr>
                    <td>Stop</td>
                    <td>Jim Rama</td>
                    <td>
                        <button class="btn button-primary" onclick="playPause(5)">Lecture/Pause</button>
                        <audio id="audio5" src="audio/Stop.mp3"></audio>
                    </td>
                </tr>
                <tr>
                    <td>Tu m'en veux</td>
                    <td>Njie</td>
                    <td>
                        <button class="btn button-primary" onclick="playPause(6)">Lecture/Pause</button>
                        <audio id="audio6" src="audio/njie - tu m en veux.mp3"></audio>
                    </td>
                </tr>
                <tr>
                    <td>Ferme les yeux</td>
                    <td>Wayz</td>
                    <td>
                        <button class="btn button-primary" onclick="playPause(7)">Lecture/Pause</button>
                        <audio id="audio7" src="audio/wayz - ferme les yeux.mp3"></audio>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="JS/musique.js"></script>
    <?php require 'partials/footer.php'; ?>
</html>