<!-- footer.php -->
 <style>
    /* Style pour le footer */
.footer {
    background-color: #000;
    color: white;
    padding: 20px 0;
    text-align: center;
    font-size: 0.9rem;
    position: relative;
    width: 100%;
}

.footer-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
}

.footer-links {
    display: flex;
    gap: 15px;
    margin-bottom: 10px;
}

.footer-links a {
    color: #aaa;
    text-decoration: none;
}

.footer-links a:hover {
    color: #fff;
}

.footer-contact {
    font-size: 0.85rem;
    color: #aaa;
}

.footer-contact p {
    margin: 5px 0;
}

.footer p {
    margin: 5px 0;
    font-size: 0.8rem;
    color: #aaa;
}

 </style>
<footer class="footer">

    <div class="footer-container">

        <div class="footer-links">

            <a href="index.php?page=actualites">Actualités</a>
            <?php if (!(isset($_SESSION['user']) && $_SESSION['user'] === "rayourama@hotmail.com")): ?>
                    <a href="index.php?page=visa">Visa</a>
            <?php endif; ?>
            <a href="index.php?page=culture">Culture</a>
            <a href="index.php?page=contact">Contact</a>
            <?php if (isset($_SESSION['user']) && $_SESSION['user']==="rayourama@hotmail.com" ): ?>
                <a href="index.php?page=loterie">Loterie</a>
            <?php endif; ?>
            <?php if (isset($_SESSION['user'])): ?>
                <a href="index.php?page=profil">Profil</a>
            <?php else: ?>
                <a href="index.php?page=login">Se connecter</a>
                <a href="index.php?page=inscription">S'inscrire</a>
            <?php endif; ?>
            
        </div>
        
        <div class="footer-contact">
            <p>Contactez-nous : rayourama@hotmail.com</p>
            <p>Téléphone : +6 76 68 29 00</p>
        </div>
        
        <div class="footer-copyright">
            <p>&copy; <?php echo date("Y"); ?> Tous droits réservés.</p>
        </div>
    </div>
</footer>
