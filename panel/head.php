<?php session_start(); if (!$_SESSION['logged']){header("location:../login.php");} ?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.rtl.min.css"
          integrity="sha384-beJoAY4VI2Q+5IPXjI207/ntOuaz06QYCdpWfWRv4lSFDyUSqsM0W+wiAMr2I185" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./css/main.css">

    <title>codeyad blog</title>
</head>