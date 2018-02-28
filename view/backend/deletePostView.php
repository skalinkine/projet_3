<?php $title = 'Chapitre supprimé'; ?>

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


    
    <p>le chapitre est supprimé</p>
    
<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>
