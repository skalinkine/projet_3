<?php ob_start(); ?>
<em><a href="index.php?action=dashboard">Administration</a></em>

<?php $title = 'Nouveau chapitre'; ?>


<h1>Billet simple pour l'Alaska</h1>


    <h2>Ajouter un chapitre</h2>


         <form action="index.php?action=newpost" method="post">
            <div>
                <label for="title">Titre</label><br />
                <input type="text" id="title" name="title" value="" />
             </div>
            <div>
                <label for="content">Contenu</label><br />
                <textarea id="content" name="content" value="" ></textarea>
            </div>
            <div>
                <input type="submit" />
            </div>
        </form> 
   
<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>
