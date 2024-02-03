<?php

$host = 'db';
$dbn = 'php-app';
$user = 'USER';
$pass = 'PASS';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "Delete from users where id = :id";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbn", $user, $pass);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statm = $conn->prepare($sql);
        $statm->bindParam("id", $id);
        $statm->execute();
        echo "deleted successfully";

    } catch (PDOException $e) {
        echo "deleted failed: " . $e->getMessage();
    }

    $conn = null;
}

