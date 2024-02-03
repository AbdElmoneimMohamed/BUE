<?php

$host = 'db';
$dbn = 'php-app';
$user = 'USER';
$pass = 'PASS';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $sql = "INSERT INTO users (name,email,mobile) VALUES ('$name','$email','$mobile')";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbn", $user, $pass);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Added successfully";
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo "Added failed: " . $e->getMessage();
    }

    $conn = null;
}

