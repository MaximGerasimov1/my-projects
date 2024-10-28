<?php 
$user = 'root';
$password = '';
$db = 'web-blog';
$host = 'MySQL-5.7';
$port = '3306';

$dsn = "mysql:host=$host;dbname=$db;port=$port";
$pdo = new PDO($dsn, $user, $password);