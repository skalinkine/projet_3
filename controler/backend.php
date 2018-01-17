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
/*
function setPassword()
{
    $password = password_hash('jean', PASSWORD_DEFAULT);
    echo $password ;
}
*/
/*
$hash = password_hash($password, PASSWORD_BCRYPT); 

if (password_verify($password, $hash)) {
		// Valid 
	} else {
		// Invalid 
	}
 */
 