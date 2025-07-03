<?php
require_once 'database.php';


try {
    $sql = 'SELECT * FROM inscription WHERE 1=1';
    $stmt = $db->query($sql);
    $results = $stmt->fetchAll();

    foreach ($results as $nom) {

        echo '<p>' . $nom['NOM'] . '</p>';
    }
    echo "hello world !";
} catch (PDOException $e) {
    die("Erreur lors de la requête : " . $e->getMessage());
}
