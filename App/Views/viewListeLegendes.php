<?php include_once(__DIR__ . '/viewHeader.php'); ?>

<main class="container">
   <div class='grid-legendes'>
      <?php foreach ($listeLegendes as $legende) { ?>
         <div class='legendes'>
            <!-- div pour englober titre en image zoom au survol -->
            <div class="containerZoom">
               <a href='./?action=detailsLegende&id=<?= $legende["Id_legende"] ?>'>
                  <h2><?= $legende["titre"] ?></h2>
                  <?php if (!empty($legende['photo']) && file_exists(__DIR__ . "/../../Data/images/" . $legende['photo'])) { ?>
                     <img class="zoomImage" src='Data/images/<?= $legende["photo"] ?>' alt='<?= $legende["titre"] ?>'>
                  <?php } ?>
               </a>
            </div>
         </div>
      <?php } ?>
   </div>
</main>


<?php include_once(__DIR__ . '/viewFooter.php'); 
?>