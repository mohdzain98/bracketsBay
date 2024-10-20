<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__. '/../');
$dotenv->load();

$uname = $_ENV['UNAME'];
$DB_NAME=$_ENV['DB_NAME'];
$DB_PASS=$_ENV['DB_PASS'];

$con=(mysqli_connect("localhost",$uname,$DB_PASS,$DB_NAME))
?>
