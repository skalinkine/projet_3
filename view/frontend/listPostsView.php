<?php $title = 'Jean Forteroche'; ?>

<?php ob_start(); ?>
<em><a href="index.php?action=adminConnect">Administration</a></em>
<h1>Billet simple pour l'Alaska</h1>
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
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>