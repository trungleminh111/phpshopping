<?php
require_once '../../core/boot.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $img = $_POST['img'];
    $image_file = $_POST['img'];


    if (isset($image_file)) {
        $target_dir = '../../view/public/img/';
        $imgname = time() . '_' . basename($_FILES['img']["name"]);
        $target_file = $target_dir . $imgname;
        if (move_uploaded_file($_FILES['img']["tmp_name"], $target_file)) {
            update_category($category_id, $name, $imgname);

            header('Location: index.php');
        }else {
            update_category($category_id, $name, $img);
    
            header('Location: index.php');
        }
       


    } 



}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $category_id = $_GET['category_id'];
    $category = get_category($category_id);

    include_once '../view/category/_edit.php';
}