<?php $title = 'Administration'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>

<h1 class="h3 mb-3 font-weight-normal">Veuillez entrer votre login et votre mot de passe pour accéder à l'administration du blog</h1>
        

        <form class="col-lg-6" action="index.php?action=adminConnect" method="post">
            <div class="form-group">
                <label for="text">Login : </label>
                <input type="text" class="form-control" name="username"/>
            </div>
            <div class="form-group">
                <label for="text">Mot de passe : </label>
                <input type="password " class="form-control" name="password"/>
            </div>
            <input type="submit" class="btn btn-primary btn-block" value="Valider" />
        </form>

<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>
<?php
if (isset($erreurMdp)AND($erreurMdp != '')){
    echo $erreurMdp;
}
?>