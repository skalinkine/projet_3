<p>Hello tu es connecté</p>
<!-- 
    Créer ici ce qui deviendra l'interface d'administration du blog
-->
<?php $title = 'Administration'; ?>

<?php ob_start(); ?>
<em><a href="index.php">Blog</a></em>

<!-- 
    bouton ecrire un nouveau chapitre qui va à une page avec le formulaire pour ajouter chapitre
    bouton pour modifier
    bouton pour supprimer


    liste des commentaires signalés avec un bouton pour les supprimer
    
-->






<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>