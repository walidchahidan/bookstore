<?php

namespace Bookstore\Models;

use Bookstore\helpers\Connection;
use PDO;
use PDOException;

class Model
{
    public string $table;
    protected string $insertRequest;
    protected array $params;


    public function getAll(){
        $pdo = Connection::getConnection();
        $request = "select * from $this->table";
        $stmt = $pdo->prepare($request);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getOneById($id){
        $pdo = Connection::getConnection();
        $request = "select * from $this->table where id=:id";
        $stmt = $pdo->prepare($request);
        $stmt->execute(["id"=>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function execRequest($request, $params= []){
        try{
            $pdo = Connection::getConnection();
            $stmt = $pdo->prepare($request);
            return $stmt->execute($params);

        }catch(PDOException $e){
                echo $e->getMessage();
        }
    }

    
    // insert for all child classes, attributes must be redefined
    public function insert(){
        return $this->execRequest($this->insertRequest, $this->params);
    }

}