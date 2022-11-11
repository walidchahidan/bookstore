<?php

namespace Bookstore\Controllers;

use Bookstore\Models\User as ModelsUser;

class User
{

    function createUser() {
        
        if (isset($_POST['signup'])) {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $user = new ModelsUser($name, $email,$password );
            if ($user->insertUser()) {
                header("location:$baseUrl/auth");
            }else{
                echo "User Insertion Error";
            }
        }
    
    }
}