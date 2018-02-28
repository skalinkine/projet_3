<?php $title = 'Jean Forteroche'; ?>

<?php ob_start(); ?>

<h2>Derniers chapitres du livre :</h2>

<div class="row">
<?php
foreach ($posts as $data)
{
?>
    <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="public/images/image_plume.jpg" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text"><?= nl2br(htmlspecialchars($data['content'])) ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary"><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></button>
                      
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