<?php
session_start();
//cette page est celle qui est appelée par l'utilisateur, elle va chercher dans la page frontend.php les informations nécessaires et vérifie si tout est ok ou envoie des messages d'alerte en cas de problème

require('controler/frontend.php');
require('controler/backend.php');

try {
    // on vérifie la présence du paramètre action dans l'url
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        if (isset($_GET['id'])){
            $id = (int)$_GET['id'];
        }
        // s'il est égal à listPosts
        if ($action == 'listPosts') {
            // on execute la fonction listPosts qui se trouve dans le fichier frontend.php et qui prépare l'affichage de la liste des billets avec l'aide de listPostsView.php
            listPosts();
        }
        elseif ($action == 'post') {
            // ou alors s'il est égal à post on vérifie la présence du paramètre id et qu'il soit > à 0
            if (isset($id) && $id > 0) {
                // et on execute la fonction post qui se trouve dans frontend.php et qui prépare l'affichage du billet sélectionné et ses commentaires
                post();
            }
            else {
                // sinon on affiche un message d'erreur 
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
         elseif ($action == 'modifyComment') {
            
            if (isset($id) && $id > 0 && isset($_GET['commentId']) && $_GET['commentId'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    modifyComment($id, $_GET['commentId'], $_POST['author'], $_POST['comment'] );
                }
                // et on execute la fonction post qui se trouve dans frontend.php et qui prépare l'affichage du billet sélectionné et ses commentaires
                else {
                    modifyComment($id, $_GET['commentId']);
                }
            }
            else {
                // sinon on affiche un message d'erreur 
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
     
        elseif ($action == 'addComment') {
            if (isset($id) && $id > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($id, $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }   
        // Si l'utilisateur clique sur "Signaler"
        elseif ($action == 'signalComment') {
                signalComment($_GET['commentId']);
                listPosts();
        } 
        //si l'utilisateur clique sur "administration"
        elseif ($action == 'adminConnect') {
            if (isset($_POST['username']) && ($_POST['password'])) {
               getUser($_POST['username'], $_POST['password']) ;
            }
            else {
                connectUser();
            }
        }
        // si l'administrateur est le bon
        elseif ($action == 'dashboard') {
                if (isset($_SESSION['userId'])) {
                    dashboardAdmin();
                }       
        }
        elseif ($action == 'newpost') {
                if (isset($_SESSION['userId'])){
                    if (isset($_POST['title'])){
                       if (isset ($_FILES ['image']) and ($_FILES['image']['error'] == 0)) {
                         newPost ($_POST['title'], $_POST['content'], $_FILES['image']);
                       }
                       else {
                         newPost($_POST['title'], $_POST['content']);
                       }
                    }
                    else {
                    createPost();
                    }
                }  
        }
        
        elseif ($action == 'updatepost') {
                if (isset($_SESSION['userId'])) {
                    if ( $id > 0 ){
                        if (isset($_POST['title'])) {
                        modifyPost($id,$_POST['title'], $_POST['content']);
                        }
                        else {
                        modifyPost($id);
                        }
                    }
                    
                }
        }
        elseif ($action == 'deletepost') {
                if (isset($_SESSION['userId'])) {
                    deletePost($id);
                }      
        }
        elseif ($action == 'deletecomment') {
                if (isset($_SESSION['userId'])) {
                    deleteComment($id);
                }
        }
        elseif ($action == 'disconnect') {
            session_destroy();
            header('Location: index.php');
        }
        
        elseif ($action == 'generatepassword'){
            setPassword();
        }
        else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    } 
    else {
        listPosts();
        
    }

}

catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}