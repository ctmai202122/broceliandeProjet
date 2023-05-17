<?php
include_once(__DIR__ . '/viewHeader.php');
 //Inclure la vue de la nav admin
    include_once(__DIR__ . '/viewMenuAdmin.php');
?>

<div class="admin">
    <?php
   
    // Inclure la vue des commentaires 
    include_once(__DIR__ . '/viewCommentaires.php');
    ?>

</div>

<?php
include_once(__DIR__ . '/viewFooter.php');
?>