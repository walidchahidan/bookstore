<?php

namespace Bookstore\Models;

use Bookstore\helpers\Connection;

class Book extends Model
{
    private int $id;
    public string $title;
    public string $description;
    public string $author;
    public string $picture;
    private int $nbreView;
    private int $nbreDownload;
    public string $editionDate;
    public string $filePath;
    

    public function __construct(string $title = "", string $author="", string $editionDate="", string $description = "", string $picture = "", string $filePath = "")
    {
        $this->table = "book";
        $this->title = $title;
        $this->description = $description;
        $this->author = $author;
        $this->picture = $picture;
        $this->editionDate = $editionDate;
        $this->filePath = $filePath;
    }

    public function setNbreView(int $nbreView)
    {
        $this->nbreView = $nbreView;
    }


    public function getNbreView()
    {
        return $this->nbreView;
    }

    public function setNbreDownload(int $nbreDownload)
    {
        $this->nbreDownload = $nbreDownload;
    }

    public function getNbreDownload()
    {
        return $this->nbreDownload;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }


    public function getId()
    {
        return $this->id;
    }

    public static function createTable()
    {
        $pdo = Connection::getConnection();
        $request = "create table if not exists book (
            id int auto_increment not null primary key,
            title varchar(50) not null,
            description text , 
            author varchar(50) not null,
            picture text ,
            nbreView int,
            nbreDownload int,
            editionDate date,
            filePath text, 
            id_user int not null,
            foreign key(id_user) references user(id)
        );";

        $stmt = $pdo->prepare($request);
        if ($stmt->execute()) {
            #echo "success";
        }else{
            #echo "error";
        }
    }



}