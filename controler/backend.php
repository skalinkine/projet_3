<?php
require_once('model/PostManager.php');
require_once('model/UserManager.php');

function connectUser()
{
    require('view/backend/loginView.php');
}
function getUser($user, $password)
{
        $userManager = new UserManager();
	$userbdd = $userManager->getUser($user, $password);
	if ($userbdd ['username'] !='') {
               if (password_verify($password, $userbdd['password'])){
                   $_SESSION ['userId'] = $userbdd['id'];
                   header ('Location: index.php?action=dashboard');
               }
               else {
                   $erreurMdp = 'Le mot de passe est incorrect';
                   require('view/backend/loginView.php');
               }
	} else {
		require('view/backend/loginView.php');
	}
}

function dashboardAdmin()
{
    $postManager = new PostManager(); 
    $posts = $postManager->getPosts(); 
    require('view/backend/AdminView.php');
    
}

function modifyPost($postId, $title=null, $content=null)
{
    $postManager = new PostManager();
    if ($title != null && $content != null) {
        $affectedLines = $postManager->updatePost($postId, $title, $content);
        if ($affectedLines === false) {
        throw new Exception('Impossible de modifier le chapitre !');
        }
        else {
        header('Location: index.php?action=dashboard');
        }
    }
    
    $post = $postManager->getPost($postId);
    
    require('view/backend/updatePostView.php');
}
function createPost()
{
   require('view/backend/newPostView.php');
}

function newPost($title, $content)
{
    $postManager = new PostManager();
    $posts = $postManager->addPost($title, $content); 
    require('view/backend/newPostView.php');
}

function deletePost($id)
{
    $postManager = new PostManager(); 
    $postManager->deletePost($id); 
    require('view/backend/deletePostView.php');
    
}
