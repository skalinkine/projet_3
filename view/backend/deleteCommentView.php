<?php $title = 'Commentaire supprimé'; ?>

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
            <a href="index.php?action=dashboard" class="btn btn-info"">Retour à l'administration</a>
          </p>


    
    <p class="text-info">le commentaire est supprimé</p>
    
<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>
