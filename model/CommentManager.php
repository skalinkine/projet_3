<?php

require_once("model/Manager.php");

class CommentManager extends Manager

{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, is_signaled FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        return $comments->fetchAll();
    }
    
    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
        return $affectedLines;
    }
    
    public function updateComment($commentId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET author = ?, comment = ? WHERE id = ?');
        $affectedLines = $comments->execute(array($author, $comment, $commentId));
        return $affectedLines;
    }
    // fonction qui contient la requête SQL qui met à jour le champ "is_signaled" de la BDD
    public function updateSignalComment($commentId) {
        $db = $this->dbConnect();
        $signal = true;
        $comments = $db->prepare('UPDATE comments SET is_signaled = ? WHERE id = ?');
        $affectedLines = $comments->execute(array($signal, $commentId));
        
        return $affectedLines;
    }
}