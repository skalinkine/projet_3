<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?= $title ?></title>
        <link href="public/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
    </head>
        
    <body>
        <div class="container">
        <em><a href="index.php?action=disconnect">Se déconnecter</a></em>
        <?= $content ?>
        </div>
    </body>
</html>