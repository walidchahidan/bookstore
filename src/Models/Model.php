<?php

namespace Bookstore\Models;

use Bookstore\helpers\Connection;
use PDO;

class Model
{
    public string $table;

    public function getAll(){
        $pdo = Connection::getConnection();
        $request = "select * from $this->table";
        $stmt = $pdo->prepare($request);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}