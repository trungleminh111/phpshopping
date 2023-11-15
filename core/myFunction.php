<?php

function redirect($message,$url)
{
    $_SESSION['message'] =$message;
    header('Location: ' . $url);
    die();
}

?>