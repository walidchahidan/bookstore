<?php

namespace Bookstore\Models;

use Bookstore\helpers\Connection;

class Setting
{
    public string $name;
    public string $logo;
    public string $description;
    public string $contactinfo;

    public function __construct(string $name,string $logo , string $description , string $contactinfo)
    {
        $this->name = $name;
        $this ->logo = $logo;
        $this ->description = $description;
        $this -> contactinfo = $contactinfo;
    }

    public static function createTable()
    {
        $con = new Connection();
        $pdo = $con->getConnection();
        $request = "create table if not exists setting (
            id int auto_increment not null primary key,
            description text,
            logo text,
            name varchar(50) not null,
            contactInfo varchar(50) not null,
            id_admin int not null,
            foreign key(id_admin) references user(id)
        );";
 
        $stmt = $pdo->prepare($request);
        if ($stmt->execute()) {
            #echo "success";
        }else{
            #echo "error";
        }
    }

}