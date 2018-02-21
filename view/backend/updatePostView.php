<em><a href="index.php?action=dashboard">Administration</a></em>

<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>



    <h2>Modifier le chapitre</h2>


         <form action="index.php?action=updatepost&amp;id=<?= $post['id'] ?>" method="post">
            <div>
                <label for="title">Titre</label><br />
                <input type="text" id="title" name="title" value="<?= $post['title'] ?>" />
             </div>
            <div>
                <label for="content">Contenu</label><br />
                <textarea id="content" name="content"><?= $post['content'] ?></textarea>
            </div>
            <div>
                <input type="submit" />
            </div>
        </form> 
   
<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>