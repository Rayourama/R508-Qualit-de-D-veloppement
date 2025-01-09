<style>
/* Styles de la navbar */
.navbar {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Style de la marque */
.navbar-brand img {
    width: 50px;
    height: 40px;
}

.navbar-brand span {
    margin-left: 50px;
    font-size: 1.7rem;
    color: white;
}

/* Marges pour boutons */
.nav-link, .btn {
    margin-top: 12px;
}

/* Bouton burger */
.navbar-toggler {
    border: none;
    outline: none;
}

.navbar-toggler-icon {
    background-color: white;
    width: 25px;
    height: 3px;
    display: block;
    margin: 5px auto;
}

/* Responsive pour écrans 1920px et plus */
@media (min-width: 1920px) {
    .navbar-brand span {
        font-size: 2rem;
    }
}

/* Responsive pour écrans entre 920px et 1920px */
@media (max-width: 1920px) and (min-width: 920px) {
    .navbar-brand span {
        font-size: 1.8rem;
    }
}

/* Responsive pour écrans entre 768px et 920px */
@media (max-width: 920px) and (min-width: 768px) {
    .navbar-brand span {
        font-size: 1.5rem;
    }
    .navbar-nav .nav-link {
        font-size: 0.9rem;
    }
}

/* Responsive pour écrans 768px et plus petits */
@media (max-width: 768px) {
    .navbar-brand span {
        font-size: 1.3rem;
        margin-left: 10px;
    }
    .navbar-nav {
        text-align: center;
    }
    .navbar-nav .nav-item {
        margin: 5px 0;
    }
}

/* Responsive pour écrans 400px et plus petits */
@media (max-width: 400px) {
    .navbar-brand span {
        font-size: 1.2rem;
        margin-left: 5px;
    }
    .navbar-nav {
        text-align: center;
    }
    .navbar-nav .nav-link {
        font-size: 0.85rem;
    }
}
</style>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">
        <img src="images/flag.png" alt="Drapeau" style="width: 50px; height: 40px;">
        <span style="margin-left: 50px; font-size: 1.7rem; color: white;">Consulat de Guadeloupe</span>
    </a>
    <div class="collapse navbar-collapse justify-content-end">
        
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Actualités</a>
            </li>
            <?php if (!(isset($_SESSION['user']) && $_SESSION['user'] === "rayourama@hotmail.com")): ?>
                <!-- Si l'utilisateur n'est pas admin, afficher le lien vers Visa -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=visa">Visa</a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=culture">Culture</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=contact">Contact</a>
            </li>
            <?php if (isset($_SESSION['user']) && $_SESSION['user']==="rayourama@hotmail.com" ): ?>
                 <!-- Si l'utilisateur est admin, ajouter le lien vers la loterie -->
                 <li class="nav-item">
                        <a class="nav-link" href="index.php?page=loterie">Loterie</a>
            </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['user'])): ?>
                <!-- Si l'utilisateur est connecté -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=profil" style="margin-right: 40px;">Bonjour, <?= htmlspecialchars($_SESSION['prenom']) 
                    ; ?></a>
                </li>
            <?php else: ?>
                <!-- Si l'utilisateur n'est pas connecté -->
                <li class="nav-item">
                    <a class="btn btn-outline-light mx-2" href="index.php?page=login" style="margin-top: 12px;">Se connecter</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary" href="index.php?page=inscription" style="margin-top: 12px;">S'inscrire</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
