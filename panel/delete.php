<?php

session_start();
require "../assets/connect_to_db.php";

$getUsername = $_GET["username"];


$stmt = $conn -> prepare("DELETE FROM `users`  WHERE `username` = ?");
$stmt-> execute([$getUsername]);
header("location:users_list.php");
//$stmt = $conn -> prepare("DELETE FROM `role_id`  WHERE `username` = ?");
//$stmt-> execute([$getID]);


