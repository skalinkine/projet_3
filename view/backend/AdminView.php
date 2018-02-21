<?php ob_start(); ?>
<?php $title = 'dashboard'; ?>
<p>Bienvenu sur l'administration</p>
<em><a href="index.php">Retour au blog</a></em>
<h1>Billet simple pour l'Alaska</h1>

<form action="index.php?action=newpost" method="post">
  <p><input type="submit" value="Ecrire un nouveau chapitre"></p>
</form>


<h2>Derniers chapitres du livre :</h2>


<?php
foreach ($posts as $data)
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <form action="index.php?action=updatepost&amp;id=<?= $data['id'] ?>" method="post">
                <p><input type="submit" value="Modifier ce chapitre"></p>
            </form>
            <form action="index.php?action=deletepost&amp;id=<?= $data['id'] ?>" method="post">
                <p><input type="submit" value="Supprimer ce chapitre"></p>
            </form>
        </p>
    </div>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>