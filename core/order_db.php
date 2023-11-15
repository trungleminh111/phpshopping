<?php

require_once 'mysql.php';

$pdo = get_pdo();

//Insert order
function insert_order($code, $status, $user_id, $phone, $address)
{
    $sql = "INSERT INTO `ORDER`(ID, CODE, STATUS, `USER_ID`,phone,address) VALUES(NULL, :code, :status, :user_id,:phone,:address)";
    global $pdo;
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':address', $address);

    $stmt->execute();
}

//update order
function update_order($id, $status)
{
    $sql = "UPDATE `ORDER` SET STATUS=:status WHERE ID=:id";
    global $pdo;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':status', $status);
    $stmt->execute();
}

//delete order
function delete_order($id)
{
    $sql = "DELETE FROM `ORDER` WHERE ID=:id";
    global $pdo;
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id);

    $stmt->execute();
}

//Select data
function get_order_list()
{
    $sql = "SELECT * FROM `ORDER`";
    global $pdo;
    $stmt = $pdo->prepare($sql);


    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    // Lặp kết quả
    $order_list = [];

    foreach ($result as $row) {
        array_push(
            $order_list,
            array(
                'id' => $row['id'],
                'code' => $row['code'],
                'status' => $row['status'],
                'user_id' => $row['user_id'],
            )
        );
    }

    return $order_list;
}

function find_order($user_id)
{
    $sql = "SELECT * FROM `ORDER` WHERE USER_ID=:user_id";
    global $pdo;
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    // Lặp kết quả
    foreach ($result as $row) {
        return array(
            'id' => $row['id'],
            'code' => $row['code'],
            'status' => $row['status'],
            'user_id' => $row['user_id'],
        );
    }

    return null;
}

function find_order_by_code($code)
{
    $sql = "SELECT * FROM `ORDER` WHERE CODE=:code";
    global $pdo;
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':code', $code);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Lấy danh sách kết quả
    $result = $stmt->fetchAll();

    // Lặp kết quả
    foreach ($result as $row) {
        return array(
            'id' => $row['id'],
            'code' => $row['code'],
            'status' => $row['status'],
            'user_id' => $row['user_id'],
        );
    }

    return null;
}
function find_order_by_id($id)
{
    $sql = "SELECT * FROM `ORDER` WHERE id=:id";
    global $pdo;
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
            'code' => $row['code'],
            'status' => $row['status'],
            'user_id' => $row['user_id'],
        );
    }

    return null;
}
?>