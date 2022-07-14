<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    session_start();

    require_once 'linkSQL.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM tb_users WHERE login = :login AND password = :password";
    $statement = $connection->prepare($sql); //подготовленный запрос
    // выполнение подготовленного запроса 
    $data=[
        'login' =>  $login,
        'password' => $password
    ];

    $statement->execute($data);
    $result =  $statement->fetchAll(PDO::FETCH_ASSOC);

    // при совпадение логина из БД
    if($login === $result[0]['login'] && $password === $result[0]['password']){
        $_SESSION['user'] = [
            "login" => $result[0]['login'],
            "telephone" => $result[0]['telephone'],
            "email" => $result[0]['email'],
            "img" => $result[0]['photo']
        ];
        header('Location: profile.php');
    }
    else{
        $_SESSION['message'] = "Не верный Логин или пароль";
        header('Location: index.php');
    }

}
