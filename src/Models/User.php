<?php

namespace Bookstore\Models;

use Bookstore\helpers\Connection;
use PDO;

class User
{
    private int $id;
    public string $name;
    public string $email;
    private string $password;
    public string $picture;
    private string $role;

    public function __construct(string $name, string $email,string $password, string $picture="", string $role = "User")
    {
        $this->name =$name;
        $this->email =$email;
        $this->password =password_hash($password, PASSWORD_BCRYPT);
        $this->picture =$picture;
        $this->role = $role;
    }

    public function setPassword(string $password){
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

   public function getPassword()
   {
    return $this->password;
   }

   public function setId(int $id)
   {
        $this->id = $id;
   }

   public function getId()
   {
    return $this->id;
   }

   public function setRole(string $role) {
    $this->role = $role;
   } 
   
   public function getRole() {
    return $this->role;
   }


   public static function createTable()
   {
       
       $pdo = Connection::getConnection();
       $request = "create  table if not exists user (
           id int auto_increment not null primary key,
           name varchar(50) not null,
           email varchar(50) not null,
           password text not null, 
           picture text ,
           role varchar(50) not null default 'User',
           id_admin int,
           foreign key(id_admin) references user(id)
       );";

       $stmt = $pdo->prepare($request);
       if ($stmt->execute()) {
           #echo "success";
       }else{
           #echo "error";
       }
   }

   public function insertUser():bool
   {
    
    $pdo = Connection::getConnection();

        $request = "insert into user (name, email, password, picture, role) values(:name, :email, :password, :picture, :role )";
        $params = [
            "name"=>$this->name,
            "email"=>$this->email,
            "password"=>$this->password,
            "picture"=>$this->picture,
            "role"=>$this->role
        ];
        $stmt = $pdo->prepare($request);
        return $stmt ->execute($params);
    }

    function getUserByEmail(){
        $pdo = Connection::getConnection();
        $request = "select * from user where email = :email";
        $stmt = $pdo->prepare($request);
        // $stmt->setFetchMode(PDO::FETCH_CLASS, 'User', ['','',''] );
        // $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $stmt->execute(["email"=>$this->email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        // $data = $stmt->fetch();
        
       if ($data == false) {
        return null;
       }else{
        return $data;
       }
        
    }

}