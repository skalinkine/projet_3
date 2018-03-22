<?php $title = 'dashboard'; ?>
<?php ob_start(); ?>


<header>
    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
        <p class="accroche">Bienvenu sur l'administration du billet simple pour l'Alaska</p>
        <a href="index.php?action=disconnect" class="btn btn-secondary my-2">Se déconnecter</a>
        </div>
    </div>
</header>
<p>
    <form action="index.php?action=newpost" method="post">
      <p><input class="btn btn-info" type="submit" value="Ecrire un nouveau chapitre"></p>
    </form> 
</p>
<hr class="my-4">


<?php
foreach ($posts as $data)
{
?>

   <div>
      <p class="text-info"><?= htmlspecialchars($data['title']) ?></p>
      <div>
        <small class="text-muted">le <?= $data['creation_date_fr'] ?></small>
      </div>
      <img class="p-3 rounded float-left" src="<?= $data['image'] ?>" alt="Card image cap">

      <p><?= nl2br($data['content']) ?></p>
    </div>


    <?php
    foreach ($comments as $comment){
        if ($comment['post_id'] == $data['id']) {
    ?>

        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

    <?php
        }
    }
    ?>
    
    <form action="index.php?action=updatepost&amp;id=<?= $data['id'] ?>" method="post" >
        <p><input class="btn btn-info" type="submit" value="Modifier ce chapitre"></p>
    </form>
    <form action="index.php?action=deletepost&amp;id=<?= $data['id'] ?>" method="post" >
        <p><input class="btn btn-info" type="submit" value="Supprimer ce chapitre"></p>
    </form>
<hr class="my-4">
<?php
}

?>

<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>