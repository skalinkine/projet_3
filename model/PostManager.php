<?php
require_once("model/Manager.php");
class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
        return $req->fetchAll();
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }
    
    public function addPost($title, $content)
    {
        //faire notre requete SQL pour ajouter le post
        $db = $this->dbConnect();
        $posts = $db->prepare('INSERT INTO posts (title, content, creation_date) VALUES (?,?,NOW())');
        $affectedLines = $posts->execute(array($title, $content));
        return $affectedLines;
    }
    
    // Fonction qui permet de modifier le contenu d'un article
    public function updatePost($id, $title, $content)
    {
        $db = $this->dbConnect();
        $posts = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $affectedLines = $posts->execute(array($title, $content, $id));
        return $affectedLines;
    }
    
    public function deletePost($id)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('DELETE FROM posts WHERE id = ?');
        $affectedLines = $post->execute(array($_GET['id']));
        return $affectedLines;
    }

}