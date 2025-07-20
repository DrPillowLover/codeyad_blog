<?php

session_start();
require "../assets/connect_to_db.php";

$getID = $_GET["id"];
$sql = "DELETE FROM `posts` WHERE `id` = ?";

$DELETE = $conn -> prepare($sql);
$DELETE -> execute([$getID]);
header("location:search_users.php");