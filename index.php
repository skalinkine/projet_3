<?php
session_start();
//cette page est celle qui est appelée par l'utilisateur, elle va chercher dans la page frontend.php les informations nécessaires et vérifie si tout est ok ou envoie des messages d'alerte en cas de problème

require('controler/frontend.php');
require('controler/backend.php');

try {
    // on vérifie la présence du paramètre action dans l'url
    if (isset($_GET['action'])) {
        // s'il est égal à listPosts
        if ($_GET['action'] == 'listPosts') {
            // on execute la fonction listPosts qui se trouve dans le fichier frontend.php et qui prépare l'affichage de la liste des billets avec l'aide de listPostsView.php
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            // ou alors s'il est égal à post on vérifie la présence du paramètre id et qu'il soit > à 0
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                // et on execute la fonction post qui se trouve dans frontend.php et qui prépare l'affichage du billet sélectionné et ses commentaires
                post();
            }
            else {
                // sinon on affiche un message d'erreur 
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
         elseif ($_GET['action'] == 'modifyComment') {
            
            if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['commentId']) && $_GET['commentId'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    modifyComment($_GET['id'], $_GET['commentId'], $_POST['author'], $_POST['comment'] );
                }
                // et on execute la fonction post qui se trouve dans frontend.php et qui prépare l'affichage du billet sélectionné et ses commentaires
                else {
                    modifyComment($_GET['id'], $_GET['commentId']);
                }
            }
            else {
                // sinon on affiche un message d'erreur 
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
     
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
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
        elseif ($_GET['action'] == 'signalComment') {
                signalComment($_GET['commentId']);
                listPosts();
        } 
        //si l'utilisateur clique sur "administration"
        elseif ($_GET['action'] == 'adminConnect') {
            if (isset($_POST['username']) && ($_POST['password'])) {
               getUser($_POST['username'], $_POST['password']) ;
            } else {
                connectUser();
            }
        }
        // si l'administrateur est le bon
        elseif ($_GET['action'] == 'dashboard') {
                if (isset($_SESSION['userId'])) {
                    require('view/backend/AdminView.php');
                }       
        }
        elseif ($_GET['action'] == 'newpost') {
                if (isset($_SESSION['userId'])) {
                    require('view/backend/newPostView.php');
                }       
        }
        elseif ($_GET['action'] == 'updatepost') {
                if (isset($_SESSION['userId'])) {
                    require('view/backend/updatePostView.php');
                }       
        }
        elseif ($_GET['action'] == 'deletepost') {
                if (isset($_SESSION['userId'])) {
                    require('view/backend/deletePostView.php');
                }       
        }
        
        elseif ($_GET['action'] == 'generatepassword'){
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