<?php ob_start(); ?>


<?php $title = 'Nouveau chapitre'; ?>


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


    <h2 class="text-info">Ajouter un chapitre</h2>


         <form action="index.php?action=newpost" method="post" enctype="multipart/form-data">
            <div>
                <label for="title" class="text-info">Titre</label><br />
                <input type="text" id="title" name="title" value="" />
             </div>
            <div>
                <label for="content" class="text-info">Contenu</label><br />
                <textarea id="content" name="content" value="" ></textarea>
            </div>
             <div>
                 <label for="icone" >Téléchargez votre image (JPG, PNG ou GIF | max. 1 Mo | taille : 348 X 225 px) :</label><br>
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576"/>
                <input type="file" id="image" name="image" />
            </div>
            <div>
                <input class="mt-3 btn btn-info" type="submit" />
            </div>
        </form> 
   
<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php'); ?>
