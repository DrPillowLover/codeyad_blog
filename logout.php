<?php

session_start();
require "./assets/connect_to_db.php";
session_destroy();
header("Location:login.php");
