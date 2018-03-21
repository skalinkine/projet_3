<?php $title = htmlspecialchars($post['title']); ?>
<div class="text-center">
<?php ob_start(); ?>
<a href="index.php" class="btn btn-info">Retour aux chapitres</a>

<hr class="my-4">


<div>
    
    <h3>
    <p class="text-info"><?= htmlspecialchars($post['title']) ?></p>
    </h3>
    <img class="img-thumbnail" src="<?= $post['image'] ?>">
    <hr class="my-4">
    <p class="text-info"><?= nl2br($post['content']) ?></p>

</div>

<hr class="my-4">
    <h5 class="text-info">Les commentaires laissés par les lecteurs !</h5></p>
<?php

foreach ($comments as $comment)
{
?>
    
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <p><a href="index.php?action=modifyComment&amp;id=<?= $post['id'] ?>&amp;commentId=<?= $comment['id'] ?>" class="btn btn-info">modifier</a>
    <a href="index.php?action=signalComment&amp;id=<?= $post['id'] ?>&amp;commentId=<?= $comment['id'] ?>" class="btn btn-info">signaler</a>
    </p>

<?php
}
?>
<hr class="my-4">
<h5 class="text-info">Laissez un commentaire</h5>

<?php
if (isset($commentId))
{
   foreach ($comments as $comment)
    {
        if ($comment['id'] == $commentId)
        {
         ?>
        <div class="form-group">
            <form action="index.php?action=modifyComment&amp;id=<?= $post['id'] ?>&amp;commentId=<?= $commentId ?>" method="post" >
                <div class="form-group">
                    <label for="author">Auteur</label><br />
                    <input type="text" class="form-control" id="author" readonly name="author" value="<?= $comment['author'] ?>" />
                </div>
                <div class="form-group">
                    <label for="comment">Commentaire</label><br />
                    <textarea class="form-control" id="comment" name="comment"><?= $comment['comment'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-info">Envoyer</button>
            </form>
        </div>
    <?php
        }
    }
    
} else { ?>
    
        <div class="form-group">        
            <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                <div class="form-group">
                    <label for="author">Votre nom</label><br />
                    <input type="text" class="form-control" id="author" name="author" />
                </div>
                <div class="form-group">
                    <label for="comment">Votre commentaire</label><br />
                    <textarea class="form-control" id="comment" name="comment"></textarea>
                </div>
                <button type="submit" class="btn btn-info">Envoyer</button>
                
            </form>
        </div>
</div>
<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
</div>
</div>