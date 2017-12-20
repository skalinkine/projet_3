<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new PostManager(); 
    $posts = $postManager->getPosts(); 

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function modifyComment($postId, $commentId, $author=null, $comment=null)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    if ($author != null && $comment != null) {
        $affectedLines = $commentManager->updateComment($commentId, $author, $comment);

        if ($affectedLines === false) {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
    }
    

    $post = $postManager->getPost($postId);
    $comments = $commentManager->getComments($postId);
    
    require('view/frontend/postView.php');
}
