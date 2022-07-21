<?php
$server = '127.0.0.1'; //127.0.0.1
$port = '3306'; 
$username = 'root';
$password = '368la1996';
$db_name = 'sql_lessons';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

$connection = new PDO("mysql:host=$server;port=$port;dbname=$db_name",$username,$password,$options);

$tb_users = 'CREATE TABLE IF NOT EXISTS tb_usersJS(
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(200) ,
    password VARCHAR(100),
    email VARCHAR(100),
    telephone VARCHAR(20),
    photo VARCHAR(100)
 );';
$result = $connection->exec($tb_users);

// if($connection->exec($tb_users) !== false) echo"Таблица  успешно создана";
?>