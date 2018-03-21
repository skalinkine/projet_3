<?php $title = 'Administration';
$bodyClass = 'login';
?>

<?php ob_start(); ?>    

    <form action="index.php?action=adminConnect" method="post" class="form-signin">
      <div class="text-center mb-4">
        <img class="mb-4 img-thumbnail" src="public/images/image_plume.jpg" alt="" width="400" height="300">
        <h1 class="h3 mb-3 font-weight-normal text-info">Connexion à l'administration</h1>
        <p>Veuillez entrer votre login et votre mot de passe pour accéder à l'administration du blog</p>
      </div>

      <div class="form-label-group">
        <input type="text" id="username" name="username" class="form-control" placeholder="Login administrateur">
        <label for="username">Login administrateur</label>
      </div>

      <div class="form-label-group">
        <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe">
        <label for="password">Mot de passe</label>
      </div>

      <input class="btn btn-lg btn-info btn-block" type="submit" value="Valider"/>
      
    </form>
  

<?php
if (isset($erreurMdp)AND($erreurMdp != '')){
    echo $erreurMdp;
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>
