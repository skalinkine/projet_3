<?php

// Chargement des classes
require_once('model/PostManager.php');

function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet instance de la classe PostManager
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $post = $postManager->getPost($_GET['id']);

    require('view/frontend/postView.php');
}
