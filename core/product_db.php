<?php
require_once 'mysql.php';
$pdo = get_pdo();

function get_all_products()
{
    global $pdo;

    $sql = "SELECT * FROM PRODUCTS";
    $stmt = $pdo->prepare($sql);


    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    $product_list = array();

    // Lặp kết quả
    foreach ($result as $row) {
        $product_list[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'img' => $row['img'],
            'category_id' => $row['category_id']
        );
    }

    return $product_list;
}



/**
 * Get Product detail
 * host/product-detail.php?id=1
 * @id id of product
 */
function get_product($id)
{
    global $pdo;

    $sql = "SELECT * FROM PRODUCTS WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);


    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    // Lặp kết quả
    foreach ($result as $row) {
        return array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'img' => $row['img'],
            'category_id' => $row['category_id']
        );
    }

    return null;
}

/**
 * Get product list by category
 */
function get_products_by_categories($category_id)
{
    global $pdo;

    $sql = "SELECT * FROM PRODUCTS WHERE CATEGORy_ID=:category_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':category_id', $category_id);


    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    $product_list = array();

    // Lặp kết quả
    foreach ($result as $row) {
        $product_list[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
            'price' => $row['price'],
            'img' => $row['img'],
            'category_id' => $row['category_id']
        );
    }

    return $product_list;
}


/**
 * Get product by name
 */
function get_products_by_name($name)
{
    global $pdo;

    $sql = "SELECT * FROM PRODUCTS WHERE NAME LIKE :name";
    $stmt = $pdo->prepare($sql);

    $name = "%$name%";
    $stmt->bindParam(':name', $name);


    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    $product_list = array();

    // Lặp kết quả
    foreach ($result as $row) {
        $product_list[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'img' => $row['img'],
            'category_id' => $row['category_id']
        );
    }

    return $product_list;
}

/**
 * Get product related
 */
function get_products_related($product_id, $category_id)
{
    global $pdo;

    $sql = "SELECT * FROM PRODUCTS WHERE ID != :product_id AND CATEGORy_ID = :category_id LIMIT 4";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':category_id', $category_id);


    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    $product_list = array();

    // Lặp kết quả
    foreach ($result as $row) {
        $product_list[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'description' => $row['description'],
            'price' => $row['price'],
            'img' => $row['img'],
            'category_id' => $row['category_id']
        );
    }

    return $product_list;
}
function delete_product($id)
{
    global $pdo;

    $sql = "DELETE FROM PRODUCTS WHERE ID=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);

    $stmt->execute();
}

function insert_product($name, $img, $category_id,$price)
{
    global $pdo;
    $sql = "INSERT INTO PRODUCTS(ID, NAME, IMG, CATEGORy_ID, PRICE) VALUES(NULL, :name, :img, :category_id, :price)";
    $stmt = $pdo->prepare($sql);


    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':price', $price);
   
    $stmt->bindParam(':category_id', $category_id);


    $stmt->execute();
}
function update_product($id, $name, $img,$price)
{
    global $pdo;
    $sql = "UPDATE PRODUCTS SET NAME=:name, IMG=:img, PRICE=:price WHERE ID=:id";
    $stmt = $pdo->prepare($sql);


    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':price', $price);
   



    $stmt->execute();
}
