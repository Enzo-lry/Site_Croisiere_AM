<?php
define("HOST", "localhost");
define("DB_NAME", "inscription1");
define("USER", "root");
define("PASS", "");

try {
    $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS, $options);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
