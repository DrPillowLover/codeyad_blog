<?php

session_start();
require "../assets/connect_to_db.php";

$getID = $_GET["id"];


$stmt = $conn -> prepare("DELETE FROM `users`  WHERE `id` = ?");
$stmt-> execute([$getID]);
header("location:users_list.php");
//$stmt = $conn -> prepare("DELETE FROM `role_id`  WHERE `username` = ?");
//$stmt-> execute([$getID]);


