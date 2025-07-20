<?php
$serverName = 'localhost';
$userName = 'root';
$password = '';
$dbName = 'codeyad_blog';

$email = 'qolam@example.com';



try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName",$userName,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $err) {
    echo $err->getMessage();
}
