<?php
include("../core/myFunction.php");

if (isset($_SESSION["user"])) {
    
    if ($_SESSION['user']['role'] !='admin') {
        redirect('Login Successfuly','../index.php');
    }
}else{
    redirect('Login to continue',BASE_URL. '/login.php');
}