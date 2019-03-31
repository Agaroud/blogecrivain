<?php

namespace App\src\model\DAO;

use App\src\model\Comment;

class CommentDAO extends DAO
{
    public function getCommentsFromBillet($idBillet)
    {
        $sql = 'SELECT id, pseudo, content, date_added FROM comment  WHERE billet_id = ? ORDER BY id DESC';
        $result = $this->sql($sql, [$idBillet]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        return $comments;
    }

    public function addComment($comment,$idBillet)
    {
        extract($comment);
        $sql = 'INSERT INTO comment (pseudo, content, date_added, billet_id) VALUES (?, ?, NOW(), ?)';
        $this->sql($sql, [$pseudo, $content, $idBillet]);
    }

    public function signalComment($idComment)
    {
        $sql = 'UPDATE comment SET signalement= signalement+1 WHERE id = ?' ;
        $this->sql($sql,[$idComment]);
    }
    
    public function supprimeComment($idComment)    
    {       
        $sql = 'DELETE FROM comment WHERE id = ?' ;
        $this->sql($sql,[$idComment]);
    }

    public function getSignalComments()
    {
        $sql = 'SELECT id, pseudo, content, date_added FROM comment  WHERE signalement > 0 ORDER BY signalement DESC';
        $result = $this->sql($sql);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        return $comments;
    }
    
    public function getSignalNumber()
    {
        $sql = 'SELECT COUNT(*) AS nbsignal FROM comment WHERE signalement>0';
        $result = $this->sql($sql);
        $comments = $result->fetch();
        $nb = $comments['nbsignal'];
        return $nb;        
    }

    private function buildObject(array $row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setDateAdded($row['date_added']);
        //$comment->setSignalement($row['signalement']);
        return $comment;
    }
}
