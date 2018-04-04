<?php

function getConnection() {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=id5233021_ppadsdb;charset=utf8", "id5233021_admin", "senha");
        return $pdo;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
