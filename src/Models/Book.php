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
    public int $id_user = 0;
    

    public function __construct(string $title = "", string $author="", string $editionDate="", string $description = "", string $picture = "", string $filePath = "", int $id_user=0)
    {
        // overriding the Models attributs
        $this->table = "book";
        $this->insertRequest ="insert into $this->table (title, author, description, editionDate, picture, filePath, id_user) values (:title, :author, :description, :editionDate, :picture,:filePath, :id_user)" ;

        // get the values from contructor params
        $this->title = $title;
        $this->description = $description;
        $this->author = $author;
        $this->picture = $picture;
        $this->editionDate = $editionDate;
        $this->filePath = $filePath;
        $this->id_user = $id_user;
        
        // redefining the params of the parent class;
        $this->params = [
            "title"=>$this->title,
            "author"=>$this->author,
            "description"=>$this->description,
            "editionDate"=>$this->editionDate,
            "picture"=>$this->picture,
            "filePath"=>$this->filePath,
            "id_user"=>$this->id_user,
        ];
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




    // function create()
    // {
        
    // }

    function update()
    {
        $request = "update book set title=:title, author=:author, description=:description, editionDate=:editionDate, picture=:picture, filePath=:filePath, id_user=:id_user where id=:id";

        $params = [
            "title"=>$this->title,
            "author"=>$this->author,
            "description"=>$this->description,
            "editionDate"=>$this->editionDate,
            "picture"=>$this->picture,
            "filePath"=>$this->filePath,
            "id_user"=>$this->id_user,
            "id"=>$this->id,
        ];

       return $this->execRequest($request,$params);

    }

    public function  delete($id)
    {
        $request = "delete from book where id=:id";
        return $this->execRequest($request, ["id"=>$id]);
    }

    // function getAll()
    // {
    //     // $this->getAll();
    // }

    // function getOneById(int $id)
    // {
        
    // }



}