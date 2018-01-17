<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<h2><a href="index.php">Retour à la liste des chapitres</a></h2>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>


<h2>Commentaires</h2>

<?php

if (isset($commentId))
{

   foreach ($comments as $comment)
    {
        if ($comment['id'] == $commentId)
        {
         ?>  
         <form action="index.php?action=modifyComment&amp;id=<?= $post['id'] ?>&amp;commentId=<?= $commentId ?>" method="post">
            <div>
                <label for="author">Auteur</label><br />
                <input type="text" id="author" readonly name="author" value="<?= $comment['author'] ?>" />
             </div>
            <div>
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment"><?= $comment['comment'] ?></textarea>
            </div>
            <div>
                <input type="submit" />
            </div>
        </form> 
    <?php
        }
    }
    
} else { ?>

    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>
<?php
}

foreach ($comments as $comment)
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?><a href="index.php?action=modifyComment&amp;id=<?= $post['id'] ?>&amp;commentId=<?= $comment['id'] ?>"> (modifier)</a></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
</div>