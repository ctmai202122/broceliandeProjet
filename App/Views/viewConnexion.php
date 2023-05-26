<?php
include_once(__DIR__ . '/viewHeader.php');
?>

<main class="accueil">
    <form method="post" action="?action=connexion">
     
        <div class="champsSaisie text-center mb-3 ml-3">
            <h2> Connexion administrateur </h2>
            <label for="email">Email admin : </label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="champsSaisie text-center mb-3">
            <label for="motdepasse">Mots de passe :</label>
            <input type="password" id="motdepasse" name="motdepasse" required>
        </div>
        <div class="champsSaisie text-center">
            <button type="submit" name="envoyer">Envoyer</button>
        </div>
    </form>
</main>

<?php
include_once(__DIR__ . '/viewFooter.php');
?>