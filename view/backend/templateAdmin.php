<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?= $title ?></title>
        <link href="public/css/bootstrap.css" rel="stylesheet">
        <link href="public/css/style.css" rel="stylesheet">
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
    </head>
        
    <body class='<?php if (isset($bodyClass)){ echo $bodyClass; } ?>'>
        <div class="container">
            <?= $content ?>
        </div>
      
    </body>
</html>