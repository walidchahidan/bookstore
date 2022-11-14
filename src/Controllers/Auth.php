<?php

namespace Bookstore\Controllers;

use Bookstore\Models\User;

class Auth
{
        function __construct()
        {
            
        }


        function index(){
            $this->loginpage();
        }

        function loginpage(){
            include_once "views/login.php";
        } 
        
        function signuppage(){
            include_once "views/signup.php";
        }

        
        

        public function login()
        {
            global $baseUrl;
            // echo "test login";
            if (isset($_SESSION["user"])) {
                header("location:$baseUrl/home");
            }
            
            if (isset($_POST['login'])) {
                // header("location:$baseUrl/home");
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                $user = new User("", $email, $password);

                $newUser = $user->getUserByEmail();
                // echo "user";
                // var_dump($newUser);
                // die();
                if ($newUser) {
                    if (password_verify($password, $newUser['password'])) {
                        
                        $_SESSION["user"]= $newUser;
                       if ($newUser['role']=="Admin") {
                        header("location:$baseUrl/admin");
                       }else{
                        header("location:$baseUrl/home");
                       }
                        
                    }else{
                        $_SESSION['error'] = "wrong password";
                        header("location:$baseUrl/auth/loginpage");
                    }
                }else{
                    $_SESSION['error'] = "wrong credentials";
                    header("location:$baseUrl/auth/loginpage");
                }
            
            }
        }


        function signup() {
            global $baseUrl;
            if (isset($_POST['signup'])) {
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                $user = new User($name, $email,$password );
                if ($user->insertUser()) {
                    header("location:$baseUrl/auth");
                }else{
                    echo "User Insertion Error";
                }
            }
        
        }

        function logout(){
            global $baseUrl;
            if (isset($_SESSION['user'])) {
                unset($_SESSION['user']);
                session_destroy();
                header("location:$baseUrl/auth");
            }
        }

}