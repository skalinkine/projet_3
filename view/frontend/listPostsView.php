<?php $title = 'Jean Forteroche'; ?>

<?php ob_start(); ?>
<hr class="my-4">
<h4 class="text-info">Derniers chapitres du livre</h4>
<hr class="my-4">

<div class="row">
<?php
foreach ($posts as $data)
{

?>
    <div class="col-md-4">
        <div class="card mb-4 box-shadow">
            <img src="<?= $data['image'] ?>" alt="Card image cap">
                <div class="card-body">
                  <p class="text-info"><?= htmlspecialchars($data['title']) ?></p>
                  <p class="card-text"><?= nl2br($data['ExtractString']) . " ..." ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-info"><a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="text-white">Lire la suite</a></button>
                    </div>
                    <small class="text-muted">le <?= $data['creation_date_fr'] ?></small>
                  </div>
                </div>
        </div>
    </div>
<?php
}
?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>