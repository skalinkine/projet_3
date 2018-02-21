<em><a href="index.php?action=dashboard">Administration</a></em>


<?php $title = 'Chapitre supprimé'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>

    
    <p>le chapitre est supprimé</p>
    
<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>
