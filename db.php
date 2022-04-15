<?php

$hostname = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "whole_systems";

$connection = mysqli_connect($hostname, $username, $password, $dbname) or die("Database connection not established")
?>