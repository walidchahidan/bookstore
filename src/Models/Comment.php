<?php

namespace Bookstore\Models;

use Bookstore\helpers\Connection;

class Comment extends Model
{
   public string $message;
   public string $authorName;
   public string $authorEmail;
   public string $commentDate;

   public function __construct(string $message,string $authorName,string $authorEmail,string $commentDate){
    $this->message=$message;
    $this->authorName=$authorName;
    $this->authorEmail=$authorEmail;
    $this->commentDate=$commentDate;
   }

   public static function createTable()
   {
       
       $pdo = Connection::getConnection();
       $request = "create table if not exists comment (
           id int auto_increment not null primary key,
           message text,
           authorName varchar(50) not null,
           authorEmail varchar(50) not null,
           commentDate date,
           id_book int not null,
           foreign key(id_book) references book(id)
       );";

       $stmt = $pdo->prepare($request);
       if ($stmt->execute()) {
           #echo "success";
       }else{
           #echo "error";
       }
   }
   
}