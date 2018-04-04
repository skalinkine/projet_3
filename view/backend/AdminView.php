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
<div class="row">
    <div class="col-lg-4 col-md-12">
   <img class="thumbnailarticle" src="<?= $data['image'] ?>" alt="Card image cap">
    </div>
   <div class="col-lg-8 col-md-12">
      <p class="text-info"><?= htmlspecialchars($data['title']) ?></p>
      <div>
        <small class="text-muted">le <?= $data['creation_date_fr'] ?></small>
      </div>
      

      <p><?= nl2br($data['content']) ?></p>
    </div>
    <div class="col-12 btnadmin">
    <a class="btn btn-info" href="index.php?action=updatepost&amp;id=<?= $data['id'] ?>" >Modifier ce chapitre</a>
    <a class="btn btn-info" href="index.php?action=deletepost&amp;id=<?= $data['id'] ?>" >Supprimer ce chapitre</a>
    </div>
</div>
<?php
    
    foreach ($comments as $comment){
        if ($comment['post_id'] == $data['id']) {
    ?>
        <div class="<?php if ($comment['is_signaled']){echo 'signaledcomment';}?> row">
            <div class="col-8">
                <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
            </div>
            <div class="col-4">
            <a class="btn btn-info" href="index.php?action=deletecomment&amp;id=<?= $comment['id'] ?>" >Supprimer ce commentaire</a>
            </div>
        </div>
        <hr class="my-4">
    <?php
        }
    }
}

?>

<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>