<?php
//Formulaire gestion contrées et légendes
include_once(__DIR__ . '/viewHeader.php');
?>


<div class="admin">

<div class="container">
    <h2>Gestion d'une légende ou d'une contrée </h2>
    <section class="containerGestion ">
        <h3 class="ajouter mt-3">Ajouter une légende ou contrée</h3>
        <hr>
        <form method="post" action="?action=administration">
        <div class="form-gestion mt-5">
            <label for="type">Choix du thème concerné<span class="required">*</span></label>
            <select class="form-control" id="type" name="type" required>
                <option value="legende">Légende</option>
                <option value="contree">Contrée</option>
            </select>
        </div>
            <div class="form-gestion mt-5">
                <label for="title">Titre de la légende ou contrée<span class="required">*</span></label>
                <input type="text" id="titleAdd" name="title" class="form-control" required>
            </div>
            <div class="form-gestion mt-5">
                <label for="contenu">Contenu de la légende ou contrée<span class="required">*</span></label>
                <textarea id="contenuAdd" name="contenu" rows="9" class="form-control" required></textarea>
            </div>
            <div class="form-gestion mt-5">
                <label for="photo">Photo de la légende ou contrée<span class="required">*</span></label>
                <input type="file" class="form-control-file mt-3" id="photoAdd" required>
            </div>
            <div class="form-gestion mt-5 ">
                <label for="dateAdded">Date d'ajout<span class="required">*</span></label>
                <input type="text" id="dateAdd" name="date" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mt-3 mb-5 ">Ajouter la légende ou contrée</button>
        </form>
    </section>
    <section id="deleteContree" class="container mt-5">
        <h3>Supprimer la légende ou contrée</h3>
        <hr>
        <form action="adminController.php?action=deleteContree" method="post">
            <div class="form-gestion mt-5">
                <label for="idContree">Id de la légende ou contrée<span class="required">*</span></label>
                <input type="text" id="idContree" name="idContree" class="form-control" required>
            </div>
            <button type="submit" name="deleteContree" class="btn btn-primary mt-3">Supprimer la légende ou contrée</button>
        </form>
    </section>

    <h2>Modération d'un commentaire </h2>
    <section class="containerModeration ">

    </section>
</div>




    <?php
    // Inclusion du formulaire de gestion des commentaires
    include_once(__DIR__ . '/viewCommentaires.php');
    ?>
</div>


<?php
include_once(__DIR__ . '/viewFooter.php');
?>

