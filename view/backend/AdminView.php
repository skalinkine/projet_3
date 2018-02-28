<?php $title = 'dashboard'; ?>
<?php ob_start(); ?>


<header>
            <div class="navbar navbar-dark bg-dark box-shadow">
                <div class="container d-flex justify-content-between">
                <p class="accroche">Bienvenu sur l'administration du billet simple pour l'Alaska</p>
                </div>
            </div>
        </header>
            <p>
            <a href="index.php?action=dashboard" class="btn btn-primary my-2">Retour à l'administration</a>
            <a href="index.php?action=disconnect" class="btn btn-secondary my-2">Se déconnecter</a>
          </p>

<form action="index.php?action=newpost" method="post">
  <p><input class="btn btn-primary" type="submit" value="Ecrire un nouveau chapitre"></p>
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
            <form action="index.php?action=updatepost&amp;id=<?= $data['id'] ?>" method="post" >
                <p><input class="btn btn-primary" type="submit" value="Modifier ce chapitre"></p>
            </form>
            <form action="index.php?action=deletepost&amp;id=<?= $data['id'] ?>" method="post" >
                <p><input class="btn btn-primary" type="submit" value="Supprimer ce chapitre"></p>
            </form>
        </p>
    </div>
<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>