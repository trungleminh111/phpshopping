<?php
require_once '../../core/boot.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image_file = $_FILES["img"];
    $name = $_POST['name'];
    if (!isset($image_file) || $image_file['error'] != UPLOAD_ERR_OK) {
        $_SESSION['flash_message'] = 'vui lòng upload ảnh';
        header('Location: create.php');

        exit();
    }
    if (empty($name)) {
        $_SESSION['flash_message'] = 'vui lòng nhập tên';
        header('Location: create.php');

        exit();
    }
    $target_dir = '../../view/public/img/';
    $imgname = time() . '_' . basename($image_file["name"]);
    $target_file = $target_dir . $imgname;

    if (move_uploaded_file($image_file["tmp_name"], $target_file)) {
        var_dump($imgname);
        insert_category($name, $imgname);
        header('Location: index.php');

    } else {
        header('Location: create.php?error=file_move_failed');
        exit();
    }


}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $category_list = get_all_categories();
    include_once '../view/category/_create.php';
}