<?php
require_once("model/Manager.php");
class UserManager extends Manager
{
    public function getUser($user)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, username, password, email FROM users WHERE username = ? ');
        $req->execute(array($user));
        $user = $req->fetch();
        return $user;
    }
    
}