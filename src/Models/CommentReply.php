<?php

namespace Bookstore\Models;

use Bookstore\helpers\Connection;

class CommentReply
{
    public string $message;
    public string $datereply;

    public function __construct(string $message , string $datereply){
        $this->message=$message;
        $this->datereply=$datereply;
    }

    public static function createTable()
    {
        
        $pdo = Connection::getConnection();
        $request = "create table if not exists commentReply (
            id int auto_increment not null primary key,
            message text,
            authorName varchar(50) not null,
            authorEmail varchar(50) not null,
            commentDate date,
            id_comment int not null,
            id_author int not null,
            foreign key(id_comment) references comment(id),
            foreign key(id_author) references user(id)
        );";
 
        $stmt = $pdo->prepare($request);
        if ($stmt->execute()) {
            #echo "success";
        }else{
            #echo "error";
        }
    }
    
   
}