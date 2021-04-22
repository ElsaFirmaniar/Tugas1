<?php
    // $host = 'localhost';
    // $db = 'attendance';
    // $user = 'root';
    // $pass = '';
    // $charset = 'utf8mb4';

    $host = 'remotemysql.com';
    $db = '3P6NKIRq6X';
    $user = '3P6NKIRq6X';
    $pass = 'byLEDGeEvC';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host; dbname=$db; charset=$charset";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    require_once 'user.php';
    $crud = new crud($pdo);
    $user = new user($pdo);

    $user->insertUser("admin", "password");
?>