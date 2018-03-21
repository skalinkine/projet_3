<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new PostManager(); 
    $posts = $postManager->getPosts();
    $posts = createExtract($posts);

    require('view/frontend/listPostsView.php');
    
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $id = (int)$_GET['id'];
    if (isset($id) and $id > 0) {
        $post = $postManager->getPost($id);
        $comments = $commentManager->getComments($id);
    }
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
  // fonction pour signaler un commentaire
function signalComment($commentId)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->updateSignalComment($commentId);
}



function createExtract($posts) {
    $newPosts = array();
    foreach($posts as $post){
        $words = $post['ExtractString'];
        $wordsTable = explode(' ', $words);
        $length = count($wordsTable);
        $newWords = '';
        for ($i = 0; $i < $length - 1; $i++) {
            $newWords = $newWords .' ' . $wordsTable[$i];
        }
        $post['ExtractString'] = $newWords;
        array_push($newPosts, $post);
    }
    return $newPosts;
}

