<?php
require_once 'core/boot.php';
require_once 'core/myFunction.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isLoginSuccess = true;

    if ($_POST['email'] && $_POST['password']) {
        $user = login($_POST['email'], $_POST['password']);

        if ($user == false) {
            $_SESSION['flash_message'] = 'Login failed';
            $isLoginSuccess = false;
            redirect('', BASE_URL . '/login.php');

        } else {
            $_SESSION['user'] = $user;
            $role = $user['role'];
            if ($role == 'admin') {
                redirect('Login succcessfuly', BASE_URL . '/admin/index.php');
            } else {
                redirect('Login succcessfuly', BASE_URL . '');

            }


        }
    }
   
    
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    //Kiem tra user da login. Ton tai session user
    if (isset($_SESSION['user']))
        header('Location: index.php');

    include_once './view/_login.php';
}