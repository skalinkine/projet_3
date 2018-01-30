<p>Hello tu es connecté</p>
<!-- 
    Créer ici ce qui deviendra l'interface d'administration du blog
-->
<?php $title = 'Administration'; ?>

<?php ob_start(); ?>
<em><a href="index.php">Blog</a></em>


<form action="index.php?action=dashboard" method="post">
      <p><input type="submit" value="Ecrire un nouveau chapitre"></p>
      <p><input type="submit" value="Modifier un chapitre"></p>
      <p><input type="submit" value="Supprimer un chapitre"></p>
</form>
    
<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>