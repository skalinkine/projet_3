<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?= $title ?></title>
        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        
    </head>
        
    <body>
        
        <header>
            <div class="navbar navbar-dark bg-dark box-shadow">
                <div class="container d-flex justify-content-between">
                <p class="accroche">Jean Forteroche présente...</p>
                </div>
            </div>
        </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Billet simple pour l'Alaska</h1>
          <p class="lead text-muted">Mon premier roman en ligne !</p>
          <p>
            <a href="index.php?action=adminConnect" class="btn btn-primary my-2">Administration</a>
            <a href="index.php" class="btn btn-secondary my-2">Chapitres</a>
          </p>
        </div>
      </section>
        
      <div class="album py-5 bg-light">
        <div class="container">
        
        <?= $content ?>
            
    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Haut de la page</a>
        </p>
      </div>
    </footer>    
    </body>
</html>