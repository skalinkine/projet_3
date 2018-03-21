

<?php $title = htmlspecialchars($post['title']); ?>

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
            <a href="index.php?action=dashboard" class="btn btn-info">Retour à l'administration</a>
          </p>



    <h2 class="text-info">Modifier le chapitre</h2>


         <form action="index.php?action=updatepost&amp;id=<?= $post['id'] ?>" method="post">
            <div>
                <label for="title" class="text-info">Titre</label><br />
                <input type="text" id="title" name="title" value="<?= $post['title'] ?>"/>
             </div>
            <div>
                <label for="content" class="text-info">Contenu</label><br />
                <textarea id="content" name="content"><?= $post['content'] ?></textarea>
            </div>
            <div>
                <input class="btn btn-info" type="submit" />
            </div>
        </form> 
    
    
   
<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>