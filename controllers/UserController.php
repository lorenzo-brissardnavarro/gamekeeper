<?php

namespace App\Controllers;

use App\Models\User;

class UserController {

    public function register(){
        if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm-password'])) {
            $user = new User($_POST['email'], $_POST['password']);
            $result = $user->sign_up($_POST['confirm-password']);
            if ($result === true) {
                header("Location: index.php");
                exit;
            } else {
                $error = $result;
            }
        }
        require 'views/register.php';
    }

    public function login(){
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $user = new User($_POST['email'], $_POST['password']);
            $result = $user->log_in();
            if ($result === true) {
                header("Location: index.php");
                exit;
            } else {
                $error = $result;
            }
        }
        require 'views/login.php';
    }

    public function logout(){
        session_destroy();
        header("Location: index.php");
    }

}



?>