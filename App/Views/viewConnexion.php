<?php
include_once(__DIR__ . '/viewHeader.php');
?>

<main class="accueil">
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-success"><?php echo $_SESSION['message']; ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['erreur'])) : ?>
        <div class="alert alert-danger"><?php echo $_SESSION['erreur']; ?></div>
    <?php endif; ?>

    <form method="post" action="?action=connexion">
        <div class="champsSaisie text-center mb-3 ml-3">
            <h2> Connexion administrateur </h2>
            <label for="email">Email admin : </label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="champsSaisie text-center mb-3">
            <label for="motdepasse">Mot de passe :</label>
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