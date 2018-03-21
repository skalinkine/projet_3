<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?= $title ?></title>
        <link href="public/css/bootstrap.css" rel="stylesheet">
        <link href="public/css/style.css" rel="stylesheet">
    </head>
        
    <body class='<?php if (isset($bodyClass)){ echo $bodyClass; } ?>'>
        <div class="container">    
            <header>
                <div class="navbar navbar-dark bg-dark box-shadow">
                    <div class="container d-flex justify-content-between">
                    <p class="accroche">Jean Forteroche présente...</p>
                    <a href="index.php?action=adminConnect" class="btn btn-info">Administration</a>
                    </div>
                </div>
            </header>

            <div class="text-center">
            <div class="p-3 mb-2 bg-info text-white">
            <section>
              <div class="container">

                <h1 class="jumbotron-heading">Billet simple pour l'Alaska</h1>
                <p class="text-dark">Mon premier roman en ligne !</p>
              </div>
            </section>
            </div>
            </div>


              <?= $content ?>

            </div>
        </div>
      
        
    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#" class="text-info">Haut de la page</a>
        </p>
      </div>
    </footer>    
    </body>
</html>