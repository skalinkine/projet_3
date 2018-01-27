<p>Hello tu es connecté</p>

<?php $title = 'Administration'; ?>

<?php ob_start(); ?>
<p><em><a href="index.php">Blog</a></em></p>

<h1>Billet simple pour l'Alaska</h1>

<form name="x" action="newPostView.php" method="post">
<input type="submit" value="Ecrire un nouveau chapitre">
</form>

<form name="x" action="updatePostView.php" method="post">
<input type="submit" value="Modifier le chapitre">
</form>

<form name="x" action="deletePostView.php" method="post">
<input type="submit" value="Supprimer le chapitre">
</form>

<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>