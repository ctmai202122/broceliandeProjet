<?php
// namespace Broceliande\Views;
include_once(__DIR__ . '/viewHeader.php');
?>
<!-- Début du formulaire de contact -->
<main class="container">
  <h2>Nous contacter </h2>
  <div class="contact">
    <form method="post" action=>
      <p>Veuillez remplir tous les champs</p>
      <div class="champsSaisie">
        <label for="nom">Nom </label>
        <input type="text" id="nom" name="nom" required>
      </div>
      <div class="champsSaisie">
        <label for="prenom">Prénom </label>
        <input type="text" id="prenom" name="prenom" required>
      </div>
      <div class="champsSaisie">
        <label for="email">Email </label>
        <input type="text" name="email" id="email" required>
      </div>
      <div class="champsSaisie">
        <label for="objet">Objet </label>
        <input type="text" id="objet" name="objet" required>
      </div>
      <div class="champsSaisie">
        <label for="message">Message </label>
        <textarea id="message" name="message" required></textarea>
      </div>
      <div class="champsSaisie">
        <button type="submit" name="envoyer">Envoyer</button>
      </div>
    </form>
  </div>
  <!-- Fin du formulaire de contact -->
</main>
<?php
include_once(__DIR__ . '/viewFooter.php'); 
?>